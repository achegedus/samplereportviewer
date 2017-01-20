<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Image;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
    public function index($id)
    {
        $response = null;
        try {
            $report = Report::findOrFail($id);

            $images = $report->images;
            $response['data'] = $images;
            $statusCode = 200;
        } catch (\Exception $ex) {
            $statusCode = 400;
            $response['status'] = 'listing failed';
        } finally {
            return response()->json($response, $statusCode);
        }
    }


    public function store(Request $request, $id)
    {
        $response = null;
        try {
            $report = Report::findOrFail($id);

            // upload the file to s3
            $file = $request->file('filefield');

            if ($file != null) {
                $filename = $file->store($report->code, 's3');

                // save file info in db
                $image = new Image();
                $image->mime = $file->getClientMimeType();
                $image->original_filename = $file->getClientOriginalName();
                $image->filename = $filename;
                $image->report_id = $report->id;
                $image->save();

                $statusCode = 200;

                $response['data'] = $image;
                $response['url'] = Storage::url($filename);
            } else {
                $statusCode = 400;
            }
        } catch (\Exception $e) {
            $statusCode = 400;
            $response['status'] = 'create failed';
            $response['error'] = $e->getMessage();
        } finally {
            return response()->json($response, $statusCode);
        }
    }


    public function destroy($report_id, $image_id)
    {
        $response = null;
        try {
            $report = Report::find($report_id);
            $image = $report->images->where('id', $image_id)->first();

            if ($image) {
                // delete from db
                $image->delete();

                // delete from s3
                Storage::delete($image->filename);
            }
            $response['status'] = 'success';
            $statusCode = 200;
        } catch (\Exception $e) {
            $statusCode = 500;
            $response['status'] = 'delete failed';
            $response['error'] = $e->getMessage();
        } finally {
            return response()->json($response, $statusCode);
        }
    }
}

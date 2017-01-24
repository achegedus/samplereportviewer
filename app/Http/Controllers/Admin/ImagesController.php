<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Report;
use App\Models\ReportImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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
                $filename = time() . '.' . $file->getClientOriginalExtension();

                $tn = Image::make($file);
                $thumb = $tn->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbImage = $thumb->stream();
                Storage::disk('s3')->put('thumbnails/'. $filename, $thumbImage->__toString(), 'public');

                $large = Image::make($file)->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $largeImage = $large->stream();
                Storage::disk('s3')->put($filename, $largeImage->__toString(), 'public');

                // save file info in db
                $image = new ReportImage();
                $image->mime = $file->getClientMimeType();
                $image->original_filename = $file->getClientOriginalName();
                $image->filename = $filename;
                $image->report_id = $report->id;
                $image->url = Storage::disk('s3')->url($filename);
                $image->thumbnail_url = Storage::disk('s3')->url('thumbnails/'. $filename);
                $image->save();

                $statusCode = 200;
                $response['data'] = $image;
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


    public function destroy($report_id = null, $image_id = null)
    {
        $response = null;
        if (!$report_id || !$image_id) {
            $statusCode = 500;
            $response['status'] = 'File not found';
            return response()->json($response, $statusCode);
        } else {
            try {
                $report = Report::find($report_id);
                $image = $report->images->where('id', $image_id)->first();

                if ($image) {
                    // delete from db
                    $image->delete();

                    // delete from s3
                    Storage::disk('s3')->delete($image->filename);
                    Storage::disk('s3')->delete('thumbnails/' . $image->filename);

                    $response['status'] = 'success';
                    $statusCode = 200;
                } else {
                    $response['status'] = 'File not found';
                    $statusCode = 500;
                }
            } catch (\Exception $e) {
                $statusCode = 500;
                $response['status'] = 'delete failed';
                $response['error'] = $e->getMessage();
            } finally {
                return response()->json($response, $statusCode);
            }
        }
    }
}

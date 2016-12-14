<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('Laravel');

        $data = [
            'iat'  => new DateTime(),         // Issued at: time when the token was generated
            'jti'  => hash('sha256', 'TestKey'),          // Json Token Id: an unique identifier for the token
//            'exp'  => $expire,           // Expire
            'data' => [                  // Data related to the signer user
                'userId'   => 1, // userid from the users table
                'userName' => 'achegedus', // User name
            ]
        ];

        $jwt = \Firebase\JWT\JWT::encode(
            $data,      //Data to be encoded in the JWT
            '8Q49h8LV9vo73_6vNmPM3T5pjHW8rYuHSIwDJfePU9RfPMpdm9r1v13ko8H6ztXC', // The signing key
            'HS512'     // Algorithm used to sign the token, see https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40#section-3
        );

        dd($jwt);
    }
}

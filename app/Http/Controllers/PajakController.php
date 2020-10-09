<?php

namespace App\Http\Controllers;

use App\Models\PajakModel;
use Illuminate\Http\Request;

class PajakController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
    function index(Request $request)
    {
        //dd(json_decode($request->getContent(), true)); 
        $hit = json_decode($request->getContent(), true);
        if ($hit != '') {
            // App::autentikasi
            if ($hit['username'] == 'rian' && $hit['password'] == '123') {
                $data = PajakModel::get();
                return response()->json([
                    'status' => 200,
                    'data' => $data
                ], 200, [
                    JSON_PRETTY_PRINT
                ]);
            } else {
                return response()->json([
                    'msg' => 'username dan password salah'
                ], 403);
            }
        } else {
            return response()->json([
                'status' => 404
            ], 404);
        }
    }


    //test 
    function test()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://localhost/rest_api/public/pajak",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "{\r\n    \"username\":\"rian\",\r\n    \"password\":123\r\n}",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

    //
}

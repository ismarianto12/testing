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
                ],403);
            }
        } else {
            return response()->json([
                'status' => 404
            ], 404);
        }
    }
   
    //
}

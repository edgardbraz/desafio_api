<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestController extends Controller
{
    const SUCCESS = 200; 
    const CREATED = 201;
    const NOT_FOUND = 404;
    const NOT_PROCESSED = 422;
    
    public function success($code, $data = null, $message = null) {
        $response = [
            'success' => true, 
            'data' => $data ?? '',
            'message' => $message ?? 'Operation successful.'
        ];
        return response()->json($response, $code);
    }

    public function error($code, $data = null, $message = null) {
        $response = [
            'success' => true, 
            'data' => $data ?? '',
            'message' => $message ?? "Something's wrong. Try again."
        ];
        return response()->json($response, $code);
    }
}

<?php

namespace App\Classes;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\DB;

class ApiResponse
{

    public static function rollback(
        $e,
        $message = "Something went wrong! Process not completed.",
    )
    {
        DB::rollback();
        self::throw($e, $message);
    }

    public static function throw(
        $e,
        $message = "Something went wrong! Process not completed.",
    )
    {
        Log::error($e);
        throw new HttpResponseException(
            response()->json(["message" => $message,], 500)
        );
    }

    public static function sendResponse(
        $result,
        $message,
        $code = 200
    )
    {
        // Need to respond FALSE when an action is not completed
        $response = [
          'success'=>true,
          'message'=>$message ?? null,
          'data'=>$result,
        ];

        return response()->json($response);
    }

    public static function success(
        $result,
        $message,
        $code = 200
    )
    {
        return self::sendResponse($result,$message,$code);
    }

    public static function error(
        $result,
        $message,
        $code = 500
    )
    {
        $result['success']=false;
        return self::sendResponse($result,$message,$code);
    }
}

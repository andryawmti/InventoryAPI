<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 12/14/18
 * Time: 9:19 AM
 */

namespace App\Classes;


class ApiResponse
{
    public static function success($message, $body = null)
    {
        $return = [
            'success' => true,
            'message' => $message
        ];

        if ($body) {
            $return = array_merge($return, $body);
        }

        return response()->json($return);
    }

    public static function error($message, $body = null)
    {
        $return = [
            'success' => false,
            'message' => $message
        ];

        if ($body) {
            $return = array_merge($return, $body);
        }

        return response()->json($return);
    }

    public static function data(array $data)
    {
        return response()->json($data);
    }
}
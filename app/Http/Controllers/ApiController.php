<?php

namespace App\Http\Controllers;

class ApiController extends controller
{

  protected function successResponse
  ($posts, $message = "Success", $status = 200, $token = null)
  {

    return response()->json([
      'message' => $message,
      'post' => $posts,
      'token' => $token,
    ], $status);

  }

  protected function errorResponse
  ($message = "Error", $status = 500)
  {

    return response()->json([
      'message' => $message,
    ], $status);

  }

}

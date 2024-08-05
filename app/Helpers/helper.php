<?php

function successResponse
  ($posts, $message = "Success", $status = 200)
  {


    return response()->json([
      'message' => $message,
      'post' => $posts
    ], $status);

  }

<?php

function ResponseJson($status, $message="", $data=""){
        $response = [
          'status' => $status,
          'message' => $message,
          'data' => $data
        ];
        return response()->json($response);
    }
    function uploadImage($upload, $resize_width = 495, $resize_height = 750){
      $filename = rand().time().'.'.$upload->getClientOriginalExtension();
      $upload->move('uploads/', $filename);
      return $filename;
}
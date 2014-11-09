<?php

class FileController extends BaseController {

  public static function generateRandomKey($len) {
    $randomChars = 'abcdefghijklmnopqrstuvwxyz1234567890';
    $str = "";
    for ($i = 0; $i < $len; $i++) {
      $char = $randomChars[mt_rand(0, $len-1)];
      $str .= mt_rand(0, 1) == 0 ? strtoupper($char) : strtolower($char);
    }
    return $str;
  }

  public function uploadFile() {
    $validator = Validator::make(Input::all(), [
      'file' => 'required|max:200000|mimes:jpeg,bmp,png,txt,aif,aiff,mp2,mp2a,mp21,mp3,mp4,mp4a,mp4s,mp4v,mpe,mpeg,mpeg4,mpga,zip,7z,gtar,swf'
    ]);
    if ($validator->fails()) {
      return ['error' => true, 'cause' => $validator->messages()];
    }
    $file = Input::file('file');
    $upload = new Upload;
    $upload->url = FileController::generateRandomKey(12);
    $fileName = FileController::generateRandomKey(36);
    $upload->filename = $fileName;
    $upload->type = $file->getMimeType();
    $file->move(storage_path() . '/files', $fileName);
    App::make('ApiKey')->uploads()->save($upload);
    return Redirect::to($upload->url);
  }

  public function getFile($file) {
    $upload = Upload::where('url' , '=', $file)->first();
    if ($upload == null) {
      return Response::make('The requested file was not found!', 400);
    }
    $filePath = storage_path() . '/files/' . $upload->filename;
    if (!File::exists($filePath)) {
      return Response::make('The requested file was missing from the location it should be in!', 500);
    }
    $response = Response::make(file_get_contents($filePath), 200);
    $response->header('Content-Type', $upload->type);
    return $response;
  }

  public function deleteFile($file) {
    $upload = Upload::where('url', '=', $file)->first();
    if ($upload == null) {
      return ['error' => true, 'cause' => ['File not found!']];
    }
    $filePath = storage_path . '/' . $upload->fileName;
    if (File::exists($filePath)) {
      File::delete($filePath);
    }
    $upload->delete();
    return ['success' => true];
  }

  public function getInfoFor($file) {
    $upload = Upload::find('url', '=', $file);
    if ($upload == null) {
      return ['error' => true, 'cause' => ['File not found!']];
    }
    return $upload;
  }
}

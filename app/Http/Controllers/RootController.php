<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use Illuminate\Support\Facades\Auth;

class RootController extends Controller
{
  public function root(ImageUploadHandler $uploader){
      return view('pages.root');
  }
}

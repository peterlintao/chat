<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use Illuminate\Support\Facades\Auth;

class RootController extends Controller
{
  public function root(){
      return view('pages.root');
  }
}

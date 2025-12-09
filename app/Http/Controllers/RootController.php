<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class RootController extends Controller
{
  public function root(){
      return view('pages.root');
  }
}

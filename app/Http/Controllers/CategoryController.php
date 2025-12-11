<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
  public function show(Category $category){
      $topics = $category->topics()->with('user','category')->paginate(10);
      return view('topics.index', compact('topics','category'));
  }
}

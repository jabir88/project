<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Carbon\Carbon;
use Image;

class CategoryController extends Controller
{
    public function index()
    {
        $main_category = Category::where('parent_id', 0)->get();
      
        return view('admin.category.addcategory', compact('main_category'));
    }
    public function create(Request $req)
    {
        if ($req->cate_img) {
            $image = $req->file('cate_img');
            $img = time().rand(23, 2000). ".".$image->getClientOriginalExtension();
            $location = public_path('images/category/'.$img);
            Image::make($image)->save($location);
        }
        Category::insert([
        'cate_name'=> $_POST['cate_name'],
        'cate_des'=> $_POST['cate_des'],
        'cate_img'=> $img,
        'parent_id'=> $_POST['parent_id'],
        'created_at'=> Carbon::now(),
      ]);
        return redirect()->route('category.add')->with('status', 'Category Add Successfully');
    }
}

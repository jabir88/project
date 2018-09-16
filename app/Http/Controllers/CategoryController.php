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
        $insertcate = Category::insert([
        'cate_name'=> $_POST['cate_name'],
        'cate_des'=> $_POST['cate_des'],
        'cate_img'=> $img,
        'parent_id'=> $_POST['parent_id'],
        'created_at'=> Carbon::now(),
      ]);
        if ($insertcate) {
            return redirect()->route('category.add')->with('status', 'Category Add Successfully');
        } else {
            return redirect()->route('category.add')->with('error', 'Something is worng');
        }
    }
    public function manage()
    {
        $all_cate = Category::get();
        return view('admin.category.managecategory', compact('all_cate'));
    }


    public function view($id)
    {
        $view_cate = Category:: findOrFail($id);
        return view('admin.category.viewcategory', compact('view_cate'));
        // echo "<pre>";
        // print_r($view_cate);
        // echo "</pre>";
    }

    public function edit($id)
    {
        $edit_cate = Category:: findOrFail($id);
        $all_cate = Category::get();
        return view('admin.category.editcategory', compact('edit_cate', 'all_cate'));
    }
    public function editsubmit(Request $req)
    {
        $all_det =  Category::findOrFail($req->cate_id);
        if ($req->cate_new_img) {
            $image = $req->file('cate_new_img');
            $img = time().rand(23, 2000).".".$image->getClientOriginalExtension();
            $location = public_path('images/category/'.$img);
            Image::make($image)->save($location);
        } else {
            $img = $all_det->cate_img;
        }
        $update_done =  Category::findOrFail($req->cate_id)->update([
          'cate_name'=> $_POST['cate_name'],
          'cate_des'=> $_POST['cate_des'],
          'cate_img'=> $img,
          'parent_id'=> $_POST['parent_id'],
        ]);

        if ($update_done) {
            return redirect()->route('category.manage')->with('status', 'Category Updated Successfully');
        } else {
            return redirect()->route('category.manage')->with('error', 'Unfortunately Category Not Updated');
        }
    }


    public function delete($id)
    {
        $all_cate = Category::where('cate_id', $id)->first()->delete();
        return back()->with('status', 'Category Deleted Successfully');
    }
}

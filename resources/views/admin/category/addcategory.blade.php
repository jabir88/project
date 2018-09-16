@extends('layouts.adminmaster')
@section('bread')
All Users Information
@endsection
@section('myContent')


  <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="{!! route('category.add.sumbit') !!}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 card_header_text">
                            <i class="fa fa-th"></i> Add Category
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{!! route('category.manage') !!}" class="btn btn-dark btn-sm card_button"><i class="fa fa-th"></i> All Categories</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-9 card_form_part">
                          <div class="form-group row">
                              <label for="" class="col-sm-3 col-form-label">Category Name:</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="cate_name" id="" placeholder="Category Name">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="" class="col-sm-3 col-form-label">Category Description:</label>
                              <div class="col-sm-9">
                            <textarea name="cate_des" rows="8" cols="80" placeholder="Category Description" ></textarea>
                              </div>
                            </div>
                          <div class="form-group row">
                              <label for="" class="col-sm-3 col-form-label">Category Image:</label>
                              <div class="col-sm-9">
                                <input type="file" name="cate_img">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="" class="col-sm-3 col-form-label">Parent Category:</label>
                              <div class="col-sm-5">
                                <select id="" class="form-control select_box" name="parent_id">
                                  <option value="0" selected>Select Role</option>

                                @foreach ($main_category as $main_cates)
                                  <option value="{{$main_cates->cate_id}}">{{ $main_cates->cate_name }}</option>
                                @endforeach
                                </select>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" name="button" class="btn btn-info btn-lg">Add Category</button>
                    {{-- <a href="#" class="btn btn-info btn-sm">REGISTRATION</a> --}}
                </div>
             </form>
          </div>
        </div>
      </div>
  </div>
@endsection

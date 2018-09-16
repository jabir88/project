@extends('layouts.adminmaster')
@section('bread')
Edit Category
@endsection
@section('myContent')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
            <form action="{!! route('category.edit.submit') !!}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-8 card_header_text">
                          <i class="fa fa-th"></i> Category Update
                      </div>
                      <div class="col-md-4 text-right">
                          <a href="{!! route('category.manage') !!}" class="btn btn-dark btn-sm card_button"><i class="fa fa-th"></i> All Category</a>
                      </div>
                      <div class="clearfix"></div>
                  </div>
              </div>
              <div class="card-body">
                  <div class="row">
                      <div class="col-md-1"></div>
                      <div class="col-md-9 card_form_part">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Name:</label>
                            <div class="col-sm-9">
                              <input type="hidden" name="cate_id" class="form-control" value="{{ $edit_cate->cate_id }}" id="" placeholder="">
                              <input type="text" name="cate_name" class="form-control" value="{{ $edit_cate->cate_name }}" id="" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Description:</label>
                            <div class="col-sm-9">
                            <textarea name="cate_des" rows="8" cols="80">{{ $edit_cate->cate_des }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Photo:</label>
                            <div class="col-sm-9">
                              @if ($edit_cate->cate_img == '')
                                <b>No Image Here</b>
                              @else
                            <img src="{!! asset('images/category/'.$edit_cate->cate_img) !!}" height="200"alt="">
                            @endif

                            </div>
                        </div>
                        <div class="form-group row">

                            <div class="col-sm-3">
                            </div>
                            <div class="col-sm-9">
                              <div class="col-sm-9">
                                <input type="file" name="cate_new_img">
                              </div>

                            </div>
                        </div>



                         {{-- @phps

                        print_r($edit_cate);
                      @endphp --}}
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Parent Category:</label>
                            <div class="col-sm-5">
                              <select id="" class="form-control select_box" name="parent_id">
                                <option value="0" selected>Selete a Parent Category</option>
                              @foreach($all_cate as $edit_cat)
                                  {{ $edit_cat->parent_id }}
                                  <option value="{{$edit_cat->cate_id}} " {{  $edit_cate->parent_id == $edit_cat->cate_id ? 'selected' : ''}}>{{ $edit_cat->cate_name }}</option>
                              @endforeach
                              </select>
                            </div>
                        </div>
                      </div>
                      <div class="col-md-2"></div>
                  </div>
              </div>
              <div class="card-footer text-center">
                  <button type="submit" name="button" class="btn btn-info btn-md w-100" >Update</button>

              </div>
           </form>
        </div>
      </div>
    </div>
</div>
@endsection

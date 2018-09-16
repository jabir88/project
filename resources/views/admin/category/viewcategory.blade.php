@extends('layouts.adminmaster')
@section('bread')
View Category
@endsection
@section('myContent')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_header_text">
                        <i class="fa fa-th"></i> View Category Details
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{!! route('contact.manage') !!}" class="btn btn-dark btn-sm card_button"><i class="fa fa-th"></i> All Messages</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 card_view_part">
                      <table class="table table-striped table-bordered view_data_table">

                          <tr>
                            <td>Category Image</td>
                            <td>:</td>
                            <td>
                                <img src="{!! asset('images/category/'.$view_cate['cate_img']) !!}" height="150" alt="">
                            </td>
                          </tr>
                          <tr>
                            <td>Category Name</td>
                            <td>:</td>
                            <td>
                                {{$view_cate['cate_name']}}
                            </td>
                          </tr>
                          <tr>
                            <td>Category Description</td>
                            <td>:</td>
                            <td>
                                {{$view_cate['cate_des']}}
                            </td>
                          </tr>
                          <tr>
                            <td>Parent Category</td>
                            <td>:</td>
                            <td>
                              @if (!empty($view_cate->parent->cate_name))
                                @if ($view_cate->parent_id==0)
                                   Primary Category
                                @else
                                  {{ $view_cate->parent->cate_name }}
                                @endif
                              @else
                                @if ($view_cate->parent_id==0)
                                   Primary Category
                                @else
                                  Parent Category Deleted
                                @endif
                              @endif
                            </td>
                          </tr>



                      </table>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="#" class="btn btn-info btn-sm">REGISTRATION</a>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection

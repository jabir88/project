@extends('layouts.adminmaster')
@section('bread')
All Categories Information
@endsection
@section('myContent')

<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        @if (session('status'))
          <div class="alert alert-info">
              {{ session('status') }}
          </div>
        @endif
        @if (session('error'))
          <div class="alert alert-danger">
              {{ session('error') }}
          </div>
        @endif
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_header_text">
                        <i class="fa fa-th"></i> All Category
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{!! route('category.add') !!}" class="btn btn-dark btn-sm card_button"><i class="fa fa-plus-circle"></i> Add Category</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>


            <div class="card-body">
                <div class="table-responsive">

                    <table id="allTable" class="table table-bordered table-striped table-hover customize_table">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Category Name</th>
                                <th>Category Description</th>
                                <th>Parent Category</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($all_cate as $data)

                            <tr>
                              <td>
                                <img src="{!! asset('images/category/'.$data->cate_img) !!}" height="80" alt="">
                              </td>
                                <td>{{$data->cate_name}}</td>
                                <td>{{$data->cate_des}}</td>

                                <td>
                                @if (!empty($data->parent->cate_name))
                                  @if ($data->parent_id==0)
                                     Primary Category
                                  @else
                                    {{ $data->parent->cate_name }}
                                  @endif
                                @else
                                  @if ($data->parent_id==0)
                                     Primary Category
                                  @else
                                    Parent Category Deleted
                                  @endif
                                @endif
                                </td>
                                <td>
                                  <a href="{!! route('category.view', ['id'=>$data->cate_id]) !!}"><i class="fa fa-plus-square"></i></a>
                                  <a href="{!! route('category.edit', ['id'=>$data->cate_id]) !!}"><i class="fa fa-pencil-square"></i></a>
                                  <a href="{!! route('category.delete', ['id'=>$data->cate_id]) !!}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-info btn-sm">Print</a>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection

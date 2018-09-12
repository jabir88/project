@extends('layouts.adminmaster')
@section('bread')
Add User
@endsection
@section('myContent')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
            <form action="{{ url('admin/user/edit/update') }}" method="post">
              @csrf
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-8 card_header_text">
                          <i class="fa fa-th"></i> User Update
                      </div>
                      <div class="col-md-4 text-right">
                          <a href="{{url('admin/user')}}" class="btn btn-dark btn-sm card_button"><i class="fa fa-th"></i> All User</a>
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
                              <input type="hidden" name="id" class="form-control" value="{{ $editUser->id }}" id="" placeholder="">
                              <input type="text" name="name" class="form-control" value="{{ $editUser->name }}" id="" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Email:</label>
                            <div class="col-sm-9">
                              <input type="email" name="email" disabled class="form-control" id=""  value="{{ $editUser->email }}" placeholder="">
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">User Role:</label>
                            <div class="col-sm-5">
                              <select id="" class="form-control select_box" name="">
                                <option value="" selected>Select Role</option>
                                <option value="1">1</option>
                              </select>
                            </div>
                        </div>
                      </div>
                      <div class="col-md-2"></div>
                  </div>
              </div>
              <div class="card-footer text-center">
                  <button type="submit" name="button" class="btn btn-info btn-sm" >Update</button>

              </div>
           </form>
        </div>
      </div>
    </div>
</div>
@endsection

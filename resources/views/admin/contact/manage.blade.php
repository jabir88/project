@extends('layouts.adminmaster')
@section('bread')
All Users Information
@endsection
@section('myContent')

<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_header_text">
                        <i class="fa fa-th"></i> All Contact Messages
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{url('admin/user/add')}}" class="btn btn-dark btn-sm card_button"><i class="fa fa-plus-circle"></i> All Messages</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="allTable" class="table table-bordered table-striped table-hover customize_table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Time</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($all_con as $data)

                            <tr>
                                <td>{{$data->name}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->subject}}</td>
                                <td>{{str_limit($data->message,20)}}</td>
                                @php
                                  $date = $data->created_at;
                                @endphp

                                <td>{{Carbon\Carbon::parse($date)->diffForHumans()}}</td>


                                <td>
                                  <a href="{!! route('contact.view',['id' => $data->id]) !!}"><i class="fa fa-pencil-square"></i></a>
                                  <a href="{!! route('contact.mark',['id' => $data->id]) !!}"><i class="fas fa-check-circle"></i></a>
                                  <a href="{!! route('contact.delete',['id' => $data->id]) !!}"><i class="fa fa fa-trash"></i></a>
                                  {{-- <a href="{{ url('admin/contact/manage/mark/'.$data->id) }}"><i class="fa fa-pencil-square"></i></a> --}}
                                  {{-- <a href="{{ url('admin/contact/manage/delete/'.$data->id) }}"><i class="fa fa-trash"></i></a> --}}
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

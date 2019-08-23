@extends('administrator.master_admin')
@section('title','List banners')
@section('page-title')
<div class="page-title">
  <div class="title_left">
    <h3>List Banners</h3>
  </div>
  <form action="" method="get">
    <div class="title_right">
      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
        <div class="input-group">
          <input type="text" name="keyword" class="form-control" placeholder="Search products..." required>
          <span class="input-group-btn">
            <button class="btn btn-default" type="submit">Search</button>
          </span>
        </div>
      </div>
    </div>
  </form>
</div>
<div class="clearfix"></div>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <a href="{{route('add.banner')}}" class="btn btn-success">Add banner</a>
        @if(session('alert_success'))
        <div class="alert alert-success" style="margin-bottom: 0px" role="alert">
          {{session('alert_success')}}
        </div>
        @endif
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Image</th>
              <th>Status</th>
              <th colspan="2">Setting</th>
            </tr>
          </thead>
          <tbody>
            @if(isset($banners))
            @foreach($banners as $banner)
            <tr>
              <th scope="row">{{$banner->id}}</th>
              <td>{{$banner->title}}</td>
              <th scope="row">
                <img src="{{$banner->images}}" class="img-responsive" width="200px">
              </th>
              <td>@if($banner->status==1) {{'No'}} @else {{'Yes'}} @endif</td>
              <td>
                <a href="{{route('edit.banner',['id'=>$banner->id])}}" class="btn btn-default btn-sm">
                  <i class="fa fa-wrench"></i>
                  Detail
                </a>
              </td>
            </tr>
            @endforeach
            @endif
            <tr>
              <td colspan="5">{{$banners->links()}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

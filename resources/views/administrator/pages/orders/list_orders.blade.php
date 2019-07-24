@extends('administrator.master_admin')
@section('title','List Orders')
@section('page-title')
<div class="page-title">
  <div class="title_left">
    <h3>List Orders</h3>
  </div>
  <form action="" method="get">
    <div class="title_right">
      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
        <div class="input-group">
          <input type="text" name="keyword" value="@if($keyword) {{$keyword}} @endif" class="form-control" placeholder="Search...">
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
              <th>Customer</th>
              <th>Total price</th>
              <th>Shipping address</th>
              <th>Payment method</th>
              <th>status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $items)
            <tr>
              <th scope="row">{{$items->id}}</th>
              <td>{{$items->RelationshipUsers->name}}</td>
              <td>{{$items->total_price}}</td>
              <td>{{$items->shipping_address}}</td>
              <td>{{$items->payment_method}}</td>
              <td>{{$items->RelationshipOrderStatus->title}}</td>
              <td>
                <a href="{{route('edit.order',['id'=>$items->id])}}" class="btn btn-default btn-sm">
                  <i class="fa fa-wrench"></i>
                  Detail
                </a>
              </td>
            </tr>
            @endforeach
            <tr>
              <td class="text-center" colspan="8">{{$orders->links()}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
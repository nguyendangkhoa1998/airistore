@extends('administrator.master_admin')
@section('title','Manage Banner')
@section('page-title')
<div class="page-title">
  <div class="title_left">
    <h3>Manage Banner</h3>
  </div>
</div>
<div class="clearfix"></div>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <a href="{{route('index.banner')}}" class="btn btn-default">Back</a>
        @if(isset($banner))
        <a href="{{route('delete.banner',['id'=>$banner->id])}}" class="btn btn-danger">Delete</a>
        @endif
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <ul>
          @if(count($errors)>0)
          @foreach($errors->all() as $er)
          <li class="alert alert-danger">{{$er}}</li></br>
          @endforeach
        </ul>
        @endif
        @if(session('alert_success'))
        <div class="alert alert-success" style="margin-bottom: 0px" role="alert">
          {{session('alert_success')}}
        </div>
        @endif
        <br />
        <form action="{{route('post.save.banner')}}" method="post" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
          @csrf
          @if(isset($banner)) 
            <input type="hidden" name="idBanner" value="{{$banner->id}}" />
           @endif
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Title <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="title" id="" required="required" class="form-control col-md-7 col-xs-12" placeholder="Title..." value="@if(isset($banner)) {{$banner->title}} @endif">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="select2_group form-control" name="status">
                <option value="">Choose status</option>
                <option value="1" @if(isset($banner)) @if($banner->status==1) {{'selected'}} @endif @endif >Disable</option>
                <option value="2" @if(isset($banner)) @if($banner->status==2) {{'selected'}} @endif @endif>Enable</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Image <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="image" id="inputFileToLoad" type="file" accept="image/*" onchange="loadFile(event)" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12" id="review-image">
              <img src="@if(isset($banner)) {{$banner->images}} @endif" alt="" id="output" style="max-width:400px;max-height: 200px ">
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button class="btn btn-default" type="reset">Reset</button>
              <button type="submit" class="btn btn-success">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>
@endsection

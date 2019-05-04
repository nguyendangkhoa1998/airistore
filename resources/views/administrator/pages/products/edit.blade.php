@extends('admin.master_admin')
@section('title','Edit product')
@section('page-title')
<div class="page-title">
    <div class="title_left">
      <h3>Chỉnh sửa sản phẩm</h3>
  </div>
</div>
<div class="clearfix"></div>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <a href="{{route('list.product')}}" class="btn btn-danger">Quay lại danh sách</a>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @if(count($errors)>0)
        <br>

        @foreach($errors->all() as $er)
        <li class="alert alert-danger">{{$er}}</li></br>
        @endforeach

    </ul>
    @endif
    @if(session('alert'))
    <div class="alert alert-success" style="margin-bottom: 0px" role="alert">
        {{session('alert')}}
    </div>
    @endif
    <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
            <li role="presentation" class="active"><a href="#tab_content1" id="content-tab" role="tab" data-toggle="tab" aria-expanded="true">Content</a>
            </li>
            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="galery-tab" data-toggle="tab" aria-expanded="false">Galery</a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="content-tab">
                <form action="" method="post" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Category <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="category" id="category" class="form-control" required="required" >
                                    @foreach($category as $cate)
                                    <option value="{{$cate->id}}"

                                        @if($model->category_child->cate_id==$cate->id)
                                        selected
                                        @endif

                                        >{{$cate->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Category Child <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="cate_child_id" id="category_child" class="form-control" required="required">
                                        @foreach($category_child as $cate_child)
                                        <option value="{{$cate_child->id}}"
                                            @if($model->cate_child_id==$cate_child->id)
                                            selected
                                            @endif >{{$cate_child->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="name" value="{{$model->name}}" id="" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Unit price <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="{{$model->unit_price}}" name="unit_price" id="" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Quantity <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="{{$model->quantity}}" name="quantity" id="" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">New <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="new" required="required" class="form-control">
                                            <option value="1">Có</option>
                                            <option value="0">Không</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Desc <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea id="editor2" rows="10" name="desc" class="form-control">
                                            {{$model->desc}}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Detail <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea id="editor1" rows="10" name="detail" class="form-control">
                                            {{$model->detail}}
                                        </textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-4">
                                <div class="row">
                                    <div class="form-group">
                                        <div class="preview-img col-md-8 col-sm-8 col-xs-8">
                                            <div id="imgTest" style="overflow:hidden;max-width:400px;max-height: 200px ">
                                                <img src="{{$model->symbolic_image}}" class="img-responsive" style="max-height:400px;max-width: 200px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-5 col-sm-5 col-xs-5">
                                        <label for="">Symbolic image</label><span class="required">*</span>
                                        <input type="file" id="inputFileToLoad" name="symbolic_image" class="form-control" onchange="encodeImageFileAsURL();">
                                    </div>
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-primary" type="button">Cancel</button>
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="galery-tab">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            @if(count($errors)>0)
                            <br>

                            @foreach($errors->all() as $er)
                            <li class="alert alert-danger">{{$er}}</li></br>
                            @endforeach

                        </ul>
                        @endif

                        <table class="table table-active">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product id</th>
                                    <th>URL</th>
                                    <th>
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalAddGalery">Add galery</button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="ModalAddGalery" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Add Galery</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{--<div class="row">--}}
                                                            {{--<div>--}}
                                                                {{--<img src="" class="img-preview">--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                        <form action=" {{route('add.galery')}} " method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="product_id" value="{{$model->id}}">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Galery<span class="required">*</span></label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <input type="file" name="galery_edit" required="required">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer text-center">
                                                                <button type="submit" class="btn btn-info btn-sm">
                                                                    Add
                                                                </button>
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $stt=0;
                            @endphp
                            @foreach($model->product_galery as $items)
                            <tr>
                                <th scope="row">{{$items->id}}</th>
                                <td>{{$items->product_id}}</td>
                                <td>{{$items->img_url}}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal{{$items->id}}"><i class="fa fa-trash"></i>Delete</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal{{$items->id}}" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Warning</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <h3>Do you want to delete it ? !</h3>
                                                </div>
                                                <div class="modal-footer text-center">
                                                    <a href="{{route('delete.galery',['id'=>$items->id])}}" id="btn_delete" class="btn btn-info btn-sm">
                                                        Delete
                                                    </a>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>


            </div>
        </div>
    </div>
    <br />

</div>
</div>
</div>
</div>
@endsection
@section('script')
<script src="admin/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor1' );
    CKEDITOR.replace( 'editor2' );

    $(document).ready(function(){


        $("#category").change(function(){
            var id_category=$(this).val();
            $.get("admin/ajax/ajax_category/"+id_category,function(data){
                $("#category_child").html(data);
            });
        });

    });
</script>

<script>
  function encodeImageFileAsURL() {

    var filesSelected = document.getElementById("inputFileToLoad").files;
    if (filesSelected.length > 0) {
      var fileToLoad = filesSelected[0];

      var fileReader = new FileReader();

      fileReader.onload = function(fileLoadedEvent) {
        var srcData = fileLoadedEvent.target.result; // <--- data: base64

        var newImage = document.createElement('img');
        newImage.src = srcData;

        document.getElementById("imgTest").innerHTML = newImage.outerHTML;
        // alert("Converted Base64 version is " + document.getElementById("imgTest").innerHTML);
        console.log("Converted Base64 version is " + document.getElementById("imgTest").innerHTML);
    }
    fileReader.readAsDataURL(fileToLoad);
}
}
</script>
@endsection

@extends('administrator.master_admin')
@section('title','Edit product')
@section('page-title')
<div class="page-title">
    <div class="title_left">
      <h3>Edit product</h3>
  </div>
</div>
<div class="clearfix"></div>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <a href="{{route('index.products')}}" class="btn btn-danger">Quay lại danh sách</a>
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
    @if(session('alert_success'))
    <div class="alert alert-success" style="margin-bottom: 0px" role="alert">
        {{session('alert_success')}}
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
                    <input type="hidden" name="product_id" value="{{$product->id}}" />
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Category <span class="required">*</span>
                          </label>
                          <div class="col-md-8 col-sm-8 col-xs-12">
                            <select name="category_id" id="category" class="form-control" required="required" >
                                <option value="0">Please Select Category</option>
                                @foreach($categorys as $category)
                                    <option value="{{ $category->id }}" @if($category->id==$product->category_id) {{'selected'}} @endif>{{$category->name}}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Category Child <span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                          <select name="categories_child_id" id="categories_child" class="form-control" required="required">
                            <option value="">Please Select Categories Child</option>
                            @foreach($categoriesChilds as $categorieschild)
                                <option value="{{ $categorieschild->id }}" @if($categorieschild->id==$product->categories_child_id) {{'selected'}} @endif>{{$categorieschild->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Name <span class="required">*</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" name="name" required="required" value="{{$product->name}}" class="form-control col-md-7 col-xs-12">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Unit price <span class="required">*</span>
              </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                  <input type="text" name="unit_price" required="required" value="{{$product->unit_price}}" class="form-control col-md-7 col-xs-12">
              </div>
          </div>
          <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Quantity <span class="required">*</span>
              </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                  <input type="text" name="quantity" required="required" value="{{$product->quantity}}" class="form-control col-md-7 col-xs-12">
              </div>
          </div>
          <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">New <span class="required">*</span>
              </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                  <select name="is_new" required="required" class="form-control">
                      <option @if($product->is_new==1) {{'selected'}} @endif value="1">Có</option>
                      <option @if($product->is_new==0) {{'selected'}} @endif value="0">Không</option>
                  </select>
              </div>
          </div>
          <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Status <span class="required">*</span>
              </label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                  <select name="status" required="required" class="form-control">
                      <option @if($product->status==1) {{'selected'}} @endif value="1">Enable</option>
                      <option @if($product->is_new==0) {{'selected'}} @endif value="0">Disable</option>
                  </select>
              </div>
          </div>
          <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                  <textarea id="editor2" rows="10" name="desciption" class="form-control">
                    {{$product->desciption}}
                  </textarea>
              </div>
          </div>
          <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Short Description</label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                  <textarea id="editor1" rows="10" name="short_desciption" class="form-control">
                    {{$product->short_desciption}}
                  </textarea>
              </div>
          </div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-4">
          <label>Symbolic image</label>
          <div class="form-group">
              <div class="preview-img col-md-8 col-sm-8 col-xs-8">
                  <div id="imgTest" style="overflow:hidden;max-width:400px;max-height: 200px ">
                    <img src="{{$product->symbolic_image}}" class="img-responsive" id="output">
                </div>
            </div>
        </div>

        <div class="form-group">
          <div class="col-md-8 col-sm-8 col-xs-8">
            <input type="file"  name="symbolic_image" @if($product->symbolic_image) {{'value="'.$product->symbolic_image,'"'}}  @endif class="form-control" accept="image/*" onchange="loadFile(event)">
        </div>
    </div>
</div>
<div class="ln_solid"></div>
<div class="form-group">
  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
    <button class="btn btn-warning" type="reset">Reset</button>
    <button type="submit" class="btn btn-success">Save</button>
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
                <th>Image</th>
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
                                    <form action=" {{route('add.galery')}} " method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Galery<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="file" name="galery_edit" required="required">
                                            </div>
                                        </div>
                                        <div class="modal-footer text-center">
                                            <button type="submit" class="btn btn-info btn-sm">
                                                Save
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
        @if(count($product->RelationshipProductGalery)>0)
            @foreach($product->RelationshipProductGalery as $items)
            <tr>
                <th scope="row">{{$items->id}}</th>
                <td>{{$items->product_id}}</td>
                <td><img src="{{$items->image_url}}" style="max-width: 90px;max-height: 90px" /></td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal{{$items->id}}"><i class="fa fa-trash"></i>Delete</button>
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
                                    <a href="{{route('delete.galery',['id'=>$items->id])}}" id="btn_delete" class="btn btn-danger btn-sm">
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
        @else
            {{'Null'}}
        @endif
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

    $("#category").change(function(){

        var id_category = $(this).val();

        $.ajax({

          url: 'administrator/products/ajax_categorieschild/'+id_category,
          type: 'GET',
          dataType: 'json',
          success:function(data){

            $("select#categories_child").html(data.categories);

            if (data.disabled) {

              if (data.disabled=='yes') {

                $('select#categories_child').attr('disabled', 'disabled');

            }else if(data.disabled=='no'){

               $('select#categories_child').removeAttr('disabled');

           }

       }

   }

})

    });
</script>

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

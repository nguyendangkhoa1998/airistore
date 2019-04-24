@extends('admin.master_admin')
@section('title','Add product')
@section('page-title')
<div class="page-title">
        <div class="title_left">
          <h3>Thêm sản phẩm mới</h3>
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
              <br />
              <form action="" method="post" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                @csrf
                <div class="col-md-8 col-sm-8 col-xs-8">
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Category <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="category" id="category" class="form-control" required="required" >
                        @foreach($category as $cate)
                        <option value="{{$cate->id}}">{{$cate->name}}</option>
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
                                  <option value="{{$cate_child->id}}">{{$cate_child->name}}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Name <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="name" id="" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Unit price <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="unit_price" id="" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Quantity <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="quantity" id="" required="required" class="form-control col-md-7 col-xs-12">
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
                          </textarea>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Detail <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="editor1" rows="10" name="detail" class="form-control">
                          </textarea>
                      </div>
                  </div>
                </div>
                  <div class="col-md-4 col-sm-4 col-xs-4">
                      <label>Symbolic image<span class="required">*</span>
                      </label>
                      <div class="form-group">
                          <div class="preview-img col-md-8 col-sm-8 col-xs-8">
                              <div id="imgTest" style="overflow:hidden;max-width:400px;max-height: 200px ">
                                    <img src="images/default-image.png" class="img-responsive" style="max-height:400px;max-width: 200px">
                              </div>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-8 col-sm-8 col-xs-8">
                          <input type="file"  name="symbolic_image" id="inputFileToLoad" class="form-control" onchange="encodeImageFileAsURL();">
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-8 col-sm-8 col-xs-8">
                          <label for="">image(multiple)</label><span class="required">*</span>
                          <input type="file" name="galery[]" class="form-control" multiple>
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


            function encodeImageFileAsURL(element) {
                var file = element.files[0];
                var reader = new FileReader();
                reader.onloadend = function() {
                    // console.log('RESULT', reader.result)
                    $('#preview').attr('src', reader.result);
                }
                reader.readAsDataURL(file);

              }




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

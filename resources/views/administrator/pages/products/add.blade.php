@extends('administrator.master_admin')
@section('title','Add product')
@section('page-title')
<div class="page-title">
        <div class="title_left">
          <h3>Add product</h3>
        </div>
</div>
      <div class="clearfix"></div>
@endsection
@section('content')
<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <a href="{{route('index.products')}}" class="btn btn-danger">Back</a>
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
                  <div class="col-md-8 col-sm-8 col-xs-12">
                    <select name="category_id" id="category" class="form-control" required="required" >
                        <option value="0">Please Select Category</option>

                        @foreach($category as $cate)
                          <option value="{{$cate->id}}">{{$cate->name}}</option>
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
                          </select>
                      </div>
                  </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Name <span class="required">*</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                    <input type="text" name="name" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Unit price <span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" name="unit_price" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Quantity <span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" name="quantity" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">New <span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                          <select name="is_new" required="required" class="form-control">
                              <option value="1">Có</option>
                              <option value="0">Không</option>
                          </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Status <span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                          <select name="status" required="required" class="form-control">
                              <option value="1">Enable</option>
                              <option value="0">Disable</option>
                          </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                          <textarea id="editor2" rows="10" name="desciption" class="form-control">
                          </textarea>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Short Description</label>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                          <textarea id="editor1" rows="10" name="short_desciption" class="form-control">
                          </textarea>
                      </div>
                  </div>
                </div>
                  <div class="col-md-4 col-sm-4 col-xs-4">
                      <label>Symbolic image</label>
                      <div class="form-group">
                          <div class="preview-img col-md-8 col-sm-8 col-xs-8">
                              <div id="imgTest" style="overflow:hidden;max-width:400px;max-height: 200px ">
                                    <img src="images/default-image.jpg" class="img-responsive" id="output">
                              </div>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="file"  name="symbolic_image" class="form-control" accept="image/*" onchange="loadFile(event)">
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-8 col-sm-8 col-xs-8">
                          <label for="">Images(multiple)</label>
                          <input type="file" name="galery[]" class="form-control" multiple>
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

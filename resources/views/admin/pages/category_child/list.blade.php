@extends('admin.master_admin')
@section('title','List category child')
@section('page-title')
<div class="page-title">
  <div class="title_left">
    <h3>List category child</h3>
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
        <a href="{{route('add.category_child')}}" class="btn btn-success">Add category child</a>
        @if(session('alert'))
        <div class="alert alert-success" style="margin-bottom: 0px" role="alert">
          {{session('alert')}}
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
              <th>ID category</th>
              <th>Name</th>
              <th colspan="2">Setting</th>
            </tr>
          </thead>
          <tbody>
            @foreach($category_child as $items)
            <tr>
              <th scope="row">{{$items->id}}</th>
              <th scope="row">{{$items->category->id}}</th>
              <td>{{$items->name}}</td>
              <td>
                <a href="{{route('edit.category_child',['id'=>$items->id])}}" class="btn btn-info btn-sm">
                  <i class="fa fa-wrench"></i>
                  Edit
                </a>
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
                                      <a href="{{route('delete.category_child',['id'=>$items->id])}}" id="btn_delete" class="btn btn-info btn-sm">
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
                        <tr>
                          <td class="text-center" colspan="8">{{$category_child->links()}}</td>
                        </tr>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
            @endsection
            @section('script')

            <script>
                // $(document).ready(function(){
                //     $("#btn_delete").change(function(){
                //         var id_product=$(this).val();
                //         $.get("admin/product/delete/"+id_product,function(data){
                //             $("#category_child").html(data);
                //         });
                //     });
                // });
            </script>

            @endsection

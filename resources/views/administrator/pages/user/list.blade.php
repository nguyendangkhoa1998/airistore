@extends('admin.master_admin')
@section('title','List user')
@section('page-title')
<div class="page-title">
	<div class="title_left">
		<h3>List User</h3>
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
	<div class="col-md-12">
		<div class="x_panel">
			<div class="x_content">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 text-center">
						<ul class="pagination pagination-split">
							{{$user->links()}}
						</ul>
					</div>

					<div class="clearfix"></div>
					@foreach($user as $us)
					<div class="col-md-4 col-sm-4 col-xs-12 profile_details">
						<div class="well profile_view">
							<div class="col-sm-12">
								<h4 class="brief"><i>ID: {{$us->id}}</i></h4>
								<div class="left col-xs-7">
									<h2>Name: {{$us->name}}</h2>
									<p><strong>About: </strong> {{$us->email}} </p>
									<ul class="list-unstyled">
										<li><i class="fa fa-building"></i> Address: {{$us->address}}</li>
										<li><i class="fa fa-phone"></i> Phone: {{$us->phone_number}}</li>
									</ul>
								</div>
								<div class="right col-xs-5 text-center">
									<img src="images/user/default-avatar.png" alt="" style="max-width:150px" class="img-circle img-responsive">
								</div>
							</div>
							<div class=" right col-xs-12 bottom text-center">
								<div class="col-xs-12 col-sm-6 emphasis">
									<!-- <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
									</i> <i class="fa fa-comments-o"></i> </button> -->
									<a href="{{route('detail.user',['id'=>$us->id])}}" class="btn btn-primary btn-xs">
										<i class="fa fa-user"> </i> View Profile
									</a>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

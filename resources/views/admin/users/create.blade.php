@extends('layout.master')

@section('content')
  <div class="content">
	<div class="container-fluid">
			<div class="card">
				<div class="card-body">
					<form method="POST" action="{{action('Admin\UsersController@store')}}" enctype="multipart/form-data">
					{{csrf_field()}}
						@include('admin.users._form')
					<div class="text-center">
						<button type="submit" class="btn btn-success">Добавить Пользователя</button>
					</div>
					</form>
				</div>
			</div>
		</div>  	
  </div>
@endsection
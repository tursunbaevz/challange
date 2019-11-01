@extends('layout.master')
@section('title', 'Список пользователей')
@section('content')
  <div class="content">
  	<div class="card">
  		<div class="card-body">
  			<a class="btn btn-success" href="{{route('admin.create.user')}}">Создать пользователя</a>
  		</div>
  	</div>

    <div class="row">
      <div class="col-md-10">
         <table class="table">
              <thead>
                <tr>
                  <th>Имя</th>
                  <th>Email</th>

                  <td class="text-center"><i class="nc-icon nc-settings-gear-65"></i></td>
                </tr>
              </thead>

             <tbody>
              @foreach($users as $user)
                <tr>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                    {{ Form::open(array('route' => array('user', $user->id), 'role'=>'form', 'class' => 'delete')) }}
                  <td>
                      <button type="submit" value="Delete" class="btn btn-danger btn-sm delete">
                        <i class="fa fa-trash"></i>
                      </button>

                    {{ Form::close() }}
                      <a class="btn btn-success btn-sm" href="{{ action('Admin\UsersController@edit', $user->id) }}">
                        <i class="nc-icon nc-ruler-pencil"></i>
                      </a>
                  </td>
                </tr>
              @endforeach
             </tbody>
         </table>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript">
    $(".delete").on("submit", function(){
        return confirm("Удалить пользователя?");
    });
  </script>
@endsection



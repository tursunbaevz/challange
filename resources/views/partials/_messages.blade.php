@if(Session::has('success'))

<div class="alert alert-success alert-dismissible fade show">
  <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
    <i class="nc-icon nc-simple-remove"></i>
  </button>
  <span>
    <b> Статус - </b>{{ Session::get('success') }}
  </span>
</div>
@endif


@if(Session::has('danger'))

  
<div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>Статус:</strong> {{ Session::get('danger') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
  

@endif


@if (count($errors) > 0)

<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Упс!</strong> 
  	<ul>
	  	@foreach ($errors->all() as $error)

	  		<li>{{ $error  }}</li>

	  	@endforeach
   </ul>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif
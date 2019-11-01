<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

  	<link rel="icon" type="image/png" href="/img/favicon-challenge.kg.png">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>@yield('title')</title>
	<!-- CSRF Token -->
 	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script src="{{asset('js/app.js')}}" defer></script>

	<link rel="stylesheet" href="{{asset('css/app.css')}}">
    {{-- own admin css --}}
    <link rel="stylesheet" href="/css/admin-css/admin-own.css">
	<link rel="stylesheet" href="/css/admin-css/admin_master.css">

  	<!--     Fonts and icons     -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
	<link href="/css/admin-paperkit2/bootstrap.min.css" rel="stylesheet" />
	<link href="/css/admin-paperkit2/paper-dashboard.css" rel="stylesheet" />

</head>

<body onload="timeCounter();">
<div id="app">
  	<div class="wrapper">
		{{----------------------- include sidebar ---------------------}}
		<div class="sidebar" data-color="white" data-active-color="danger">
			<div class="logo">
				<a href="#" class="simple-text logo-mini">
					<div class="logo-image-small">
						<img src="/img/challenge-logo.png">
					</div>
				</a>
				<a href="#" class="simple-text logo-normal">
					@isset(auth()->user()->name)
						{{auth()->user()->name}}
					@endisset
				</a>
			</div>
			<div class="sidebar-wrapper">
				<ul class="nav">
					@can('isAdmin')
						<li class="{{ (request()->is('admin/users')) ? 'active' : '' }}">
							<a href="{{route('admin.users.list')}}">
								<i class="nc-icon nc-badge"></i>
								<p>Пользователи</p>
							</a>
						</li>
					@endcan
					<li class="{{ (request()->is('my-goals')) ? 'active' : '' }}">
						<a href="/goals">
							<i class="nc-icon nc-bulb-63"></i>
							<p>Доска целей</p>
						</a>
					</li>

					<li class="{{ (request()->is('user/board')) ? 'active' : '' }}">
						<a href="{{route('user.board')}}">
							<i class="nc-icon nc-paper"></i>
							<p>Личный кабинет</p>
						</a>
					</li>

				</ul>
				<div style="position: absolute; left: 50%; bottom: 5px;">
					<div class="timer-mob-div">
						<div id="timecounterdiv" class="timer-mob"></div>
					</div>
				</div>
			</div>

		</div>
		{{----------------------- END include sidebar ---------------------}}

		<div class="main-panel">
			@include('layout.nav')
			<div class="col-md-4" style="position: absolute;top: 68px;right: 15px;z-index: 20;">
         		@include('partials._messages')
      		</div>
			{{-- content --}}
				@yield('content')
		 	<!-- Sticky Footer -->
			{{----------------------- include footer ---------------------}}
				<footer class="footer footer-black  footer-white ">
					<div class="container-fluid">
						<div class="row">
							<div class="credits ml-auto">
								  <span class="copyright">
									©
									{{--<script>--}}
									  {{--document.write(new Date().getFullYear()) --}}
										{{----}}
									{{--</script>--}}
									2019, made with <i class="fa fa-heart heart"></i>
								  </span>
							</div>
						</div>
					</div>
				</footer>
			{{----------------------- END include sidebar ---------------------}}
		</div>
	</div>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby=" exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Выход</h5>
			<button class="close" type="button" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">×</span>
			</button>
		  </div>
		  <div class="modal-body">Выход из панели.</div>
		  <div class="modal-footer">
			<button class="btn btn-secondary" type="button" data-dismiss="modal">назад</button>
			<a class="btn btn-danger" href="{{ route('logout') }}"
			 onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
			 {{ __('Logout') }}>Выйти</a>
			 <form id="logout-form" action="{{ route('logout') }}"
				method="POST" style="display: none;">@csrf
			 </form>
		  </div>
		</div>
	  </div>
	</div>

</div>

<script>
	window.Laravel = <?php echo json_encode([
		'csrfToken' => csrf_token(),
	]) ?>
</script>

    <!--   Core JS Files   -->
  	<script src="/js/admin-paperkit2/core/jquery.min.js"></script>
  	<script src="/js/admin-paperkit2/core/popper.min.js"></script>
  	<script src="/js/admin-paperkit2/core/bootstrap.min.js"></script>
	<script src="/js/admin-paperkit2/plugins/perfect-scrollbar.jquery.min.js"></script>
	<script src="/js/admin-paperkit2/plugins/moment.min.js "></script>
  	<!--  Google Maps Plugin    -->
  	{{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
  	<!-- Chart JS -->
  	<script src="/js/admin-paperkit2/plugins/chartjs.min.js"></script>
	<!--  datepicker    -->
	{{--<script src="/js/admin-paperkit2/plugins/bootstrap-datetimepicker.js"></script>--}}
	<!--  Notifications Plugin    -->
  	<script src="/js/admin-paperkit2/plugins/bootstrap-notify.js"></script>
  	<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  	<script src="/js/admin-paperkit2/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
	{{--<script src="/js/admin-paperkit2/plugins/fullcalendar.min.js"></script>--}}



  @yield('scripts')

	<script>
		// timer script

        function timeCounter()
        {
            var now = new Date();
            var h = now.getHours();
            var s = now.getSeconds();
            var m = now.getMinutes();

            if(h >= 6 && h < 23)
            {
                var day = now.getDate();
                var month = now.getMonth();
                var year = now.getFullYear();

                var end = new Date(year, month, day, 23, 59, 59);

                var diff = end - now;
                var hoursdiff = Math.floor(diff/3600000);
                var minutesdiff = Math.floor((diff - hoursdiff*3600000)/60000);
                var secondsdiff = Math.floor((diff - hoursdiff*3600000 - minutesdiff*60000)/1000);

                if(minutesdiff < 10)
                {
                    minutesdiff = '0'+minutesdiff;
                }

                if(secondsdiff < 10)
                {
                    secondsdiff = '0'+secondsdiff;
                }

                var out = 'Осталось '+hoursdiff+' : '+minutesdiff+' : '+secondsdiff+'';
                document.getElementById('timecounterdiv').innerHTML = out;
                setTimeout(function(){timeCounter();}, 1000);
            }
            else
            {
                var out = 'Комендантский час!';
                document.getElementById('timecounterdiv').innerHTML = out;

                var tm = 600000;

                if(h == 5 && m >= 49)
                {
                    tm = 1000;
                }

                setTimeout(function(){timeCounter();}, tm);
            }
        }

        // delete timer on mobile if screen greater then 414px else delete on desktop version
        function checkPosition() {
            if (window.matchMedia('(max-width: 414px)').matches) {
               $('.timer-desk-div').remove();
            } else {
                $('.timer-mob-div').remove();
            }
        }

        checkPosition();
	</script>

</body>
</html>
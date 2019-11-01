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
        <a href=" {{route('goals')}} ">
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
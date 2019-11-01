@extends('layout.master')
@section('title', 'Личный кабинет')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="/img/bg5.jpg" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="javascript:void(0)">
                                @if($currentUser->avatar == null)
                                    <img src="/img/default-avatar.png" alt="" class="avatar border-gray" />
                                @else
                                    <img src="{{  asset('storage/'. $currentUser->avatar)  }}" alt="{{$currentUser->name}}" class="avatar border-gray">
                                @endif
                                <h5 class="title">{{$currentUser->name}}</h5>
                            </a>
                            <p class="description">
                                <a href="https://www.instagram.com/{{ $currentUser->instagram }}" target="_blank" style="font-weight: 700;">@ {{ $currentUser->instagram }}</a>
                            </p>
                        </div>
                        <p class="description text-center" style="font-weight: 500;">
                           {{ $currentUser->about }}
                        </p>
                    </div>
                    <div class="card-footer">
                        <hr>
                        <div class="button-container">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-6 ml-auto">
                                    <h5>{{$totalGoals}}
                                        <br>
                                        <small>Учавствую дней</small>
                                    </h5>
                                </div>
                                <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                                    <h5>{{$yourPoint}}
                                        <br>
                                        <small>Всего очков</small>
                                    </h5>
                                </div>
                                {{--<div class="col-lg-3 mr-auto">--}}
                                    {{--<h5>{{$yourPoint}}--}}
                                        {{--<br>--}}
                                        {{--<small>Всего очков</small>--}}
                                    {{--</h5>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Топ участники</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled team-members">
                            @foreach($users as $user)
                                <li>
                                    <div class="row">

                                        <div class="col-md-2 col-2">
                                            <div class="avatar">
                                                @if($user->avatar == null)
                                                    <img src="/img/default-avatar.png" alt="" class="img-circle img-no-padding img-responsive" />
                                                @else
                                                    <img src="{{  asset('storage/' . $user->avatar)  }}" alt="{{$user->name}}" class="img-circle img-no-padding img-responsive">
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-7 col-7">
                                    
                                            <a href="{{route('user.guest.details', $user->id)}}" style="color: #000;">
                                                {{$user->name . ' ' . $user->last_name}}
                                            </a>
                                          
                                            <br />
                                            <span class="text-muted">
                                              <small>@if($user == $currentUser) Online @else Offline @endif </small>
                                            </span>
                                        </div>
                                        <div class="col-md-3 col-3 text-right">
                                            <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Редактировать профиль</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.update', $currentUser) }}" method="POST"  enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-4 pl-1">
                                    <label>Аватар</label>
                                    <input type="file" name="avatar" style="    border: 10px solid;
                                    border-image-source: linear-gradient(45deg, rgb(201, 206, 212), rgb(232, 226, 214));
                                    border-image-slice: 1;">
                                </div>
                            </div>
                            <br>
                            <h5 class="text-center form-part">Обязательные поля</h5>
                            <div class="row">
                                <div class="col-md-6 pr-1 pr-mob">
                                    <div class="form-group">
                                        <label>Имя</label>
                                        <input type="text" name="name" class="form-control" placeholder="Имя" value="{{ old('name') ?? $currentUser->name }}">
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1 pl-mob">
                                    <div class="form-group">
                                        <label>Фамилия</label>
                                        <input type="text" name="last_name" class="form-control" placeholder="Фамилия" value="{{ old('last_name') ?? $currentUser->last_name }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 pr-1 pr-mob">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') ?? $currentUser->email }}">
                                    </div>
                                </div>

                                <div class="col-md-6 pl-1 pl-mob">
                                    <div class="form-group">
                                        <label>Год рождения</label>
                                        <input type="date" name="age" class="form-control" placeholder="Год рождения" value="{{ old('age') ?? $currentUser->age }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 pr-1 pr-mob">
                                    <div class="form-group">
                                        <label>Пароль</label>
                                        <input type="password" name="password" class="form-control" placeholder="Пароль" value="{{ old('password')}}">
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1 pl-mob">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Подвердите пароль</label>
                                        <input type="password" disabled name="password_confirmation" class="form-control" placeholder="Подвердите пароль" value="{{ old('password_confirmation') }}">
                                    </div>
                                </div>
                            </div>

                            <h5 class="text-center form-part">Дополнительные поля</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Адрес</label>
                                        <input type="text" name="adress" class="form-control" placeholder="Адрес" value="{{ old('adress') ?? $currentUser->adress }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 pr-1 pr-mob">
                                    <div class="form-group">
                                        <label>Город</label>
                                        <input type="text" name="city" class="form-control" placeholder="Город" value="{{ old('city') ?? $currentUser->city }}">
                                    </div>
                                </div>
                                <div class="col-md-4 px-1">
                                    <div class="form-group">
                                        <label>Регион</label>
                                        <input type="text" name="region" class="form-control" placeholder="Регион" value="{{ old('region') ?? $currentUser->region }}">
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1 pl-mob">
                                    <div class="form-group">
                                        <label>ZIP Code</label>
                                        <input type="number" name="zipcode" class="form-control" placeholder="ZIP Code" value="{{ old('zipcode') ?? $currentUser->zipcode }}">
                                    </div>
                                </div>
                            </div>
                            <h5 class="text-center form-part">Социальные сети</h5>
                            <div class="row">
                                <div class="col-md-6 pr-1 pr-mob">
                                    <div class="form-group">
                                        <label>Instagram</label>
                                        <input type="text" name="instagram" class="form-control" placeholder="instagram" value="{{ old('instagram') ?? $currentUser->instagram }}">
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1 pl-mob">
                                    <div class="form-group">
                                        <label>Facebook</label>
                                        <input type="text" name="facebook" class="form-control" placeholder="facebook" value="{{ old('facebook') ?? $currentUser->facebook }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Обо мне</label>
                                        <textarea class="form-control textarea" name="about">{{ old('about') ?? $currentUser->about }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary btn-round">Сохранить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layout.master')
@section('title', $user->name)
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="/img/bg5.jpg" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="javascript:void(0)">
                                @if($user->avatar == null)
                                    <img src="/img/default-avatar.png" alt="" class="avatar border-gray" />
                                @else
                                    <img src="{{  asset('storage/'. $user->avatar)  }}" alt="{{$user->name}}" class="avatar border-gray">
                                @endif
                                <h5 class="title">{{$user->name}}</h5>
                            </a>
                            <p class="description">
                                <a href="https://www.instagram.com/{{ $user->instagram }}" target="_blank" style="font-weight: 700;">@ {{ $user->instagram }}</a>
                            </p>
                        </div>
                        <p class="description text-center" style="font-weight: 500;">
                            {{ $user->about }}
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
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

@endsection
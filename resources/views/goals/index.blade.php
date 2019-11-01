@extends('layout.master')
@section('title', 'Доска целей')
@section('content')
	<div class="content">


        {{--  if the time is over 12 oclock then hide it  --}}
        {{--<div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto goal-info-notif">--}}
            {{--@if (!$isTwelveClock && !auth()->user()->hasRecordToday())--}}
                {{--<div class="alert alert-info text-center">--}}
                    {{--<span style="font-size: 16px;"><b>Успей добавить цель до 12 часов дня!</b></span>--}}
                {{--</div>--}}
            {{--@else--}}
                {{-- для цитатов --}}

                {{--<div class="alert alert-success text-center">--}}
                    {{--<span style="font-size: 16px;"><b>Возможности не приходят сами — вы создаете их!</b></span>--}}
                {{--</div>--}}
            {{--@endif--}}
        {{--</div>--}}
        {{----}}


        <router-view></router-view>

    </div>
@endsection

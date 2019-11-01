@extends('layout.master')
@section('content')
    <div class="content" >
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <div class="title">
                            <h2>Мои цели на сегодня</h2>
                        </div>
                    </div>
                    <div class="col-md-4">
                        {{--@if(!count($goals) > 0)--}}
                            {{--<a href="{{route('goals.create')}}" class="btn btn-success">--}}
                                {{--<span>Добавить цель</span>--}}
                            {{--</a>--}}
                        {{--@endif--}}
                    </div>
                </div>
            </div>
        </div>
        {{--  уведомление  --}}
        <div class="text-center alert-notice-style">
            <div class="alert alert-danger" id="fadein-alert" style="display: none;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Вы удалили цель!</strong>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">

                        <form action="{{ route('updateGoal', $goal) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            @include('goals._form')
                            <button type="submit" class="btn btn-success">Сохранить</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

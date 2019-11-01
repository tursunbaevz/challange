@extends('layout.master')
@section('title', 'Цели участника ' . $goal->user->name)
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="add-goal-button">
                        <a href="{{route('goals')}}"  class="btn btn-primary">Назад</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                    <div class="title text-center">
                        <h3 class="desk-title">Цели участника {{$goal->user->name}}</h3>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('updateGoal', $goal) }}" method="POST">
                        @csrf
                        @include('goals._form')
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

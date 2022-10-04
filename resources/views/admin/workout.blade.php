@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 50px;">

<h3 class="text-center">Workouts</h3>
    <div class="row my-3">
        @foreach ($workoutview as $workout)
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    {{$workout->plan_type}}
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{$workout->workout_name}}</h5>
                  <p class="card-text">{{$workout->workout_level}}</p>
                  <p class="card-text">{{$workout->calories}}</p>
                  <p class="card-text">{{$workout->time}}</p>
                  <a href="{{route('workoutedit',[$workout->id])}}" class="btn btn-primary">Edit</a>
                  <a href="{{route('workoutdelete',[$workout->id])}}" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
        @endforeach

    </div>

  </div>


@endsection


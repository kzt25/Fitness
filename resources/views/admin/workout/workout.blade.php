@extends('layouts.app')

@section('content')
@if (Session::has('success'))
<div class="d-flex justify-content-center">
    <div class="alert alert-success alert-dismissible fade show " role="alert" style="width:300px;">
        <strong>{{Session::get('success')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif
<div class="container" style="margin-top: 50px;">

<h3 class="text-center">Workouts</h3>
    <div class="row my-3">
        @foreach ($workoutview as $workout)
        <div class="col-md-6 my-2">
            <div class="card">
                <div class="card-header">
                    {{$workout->plan_type}}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col md-6">
                            <p class="card-text">Workout Name: {{$workout->workout_name}}</p>
                            <p class="card-text">Gender Type: {{$workout->gender_type}}</p>
                            <p class="card-text">Level: {{$workout->workout_level}}</p>
                            <p class="card-text">Burn Calories: {{$workout->calories}} Calories</p>
                            <p class="card-text">Duration: {{$workout->time}} Minutes</p>
                            <a href="{{route('workoutedit',[$workout->id])}}" class="btn btn-primary">Edit</a>
                            <a href="{{route('workoutdelete',[$workout->id])}}" class="btn btn-danger ms-2">Delete</a>
                        </div>
                        <div class="col-md-6" style="border: solid 2px black;">
                            <video width="100%" height="100%" controls>
                                <source src="{{asset('/upload/'.$workout->video)}}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

    </div>

  </div>


@endsection

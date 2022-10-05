@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 50px;">


    <div class="referee-remark-popup-parent-container">
        <div class="referee-remark-popup-container ">
            <div class="referee-remark-popup">
                <div class="referee-remark-popup-header">
                    <p>Edit Workouts</p>
                </div>

                <form class="referee-remark-input-container" action="{{route('workoutupdate',[$data->id])}}" enctype="multipart/form-data" method = "POST">
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Workout Name" name="workoutname" value="{{$data->workout_name}}">
                        <label for="floatingInput">Workout Name</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingPassword" placeholder="Workout level" name="workoutlevel" value="{{$data->workout_level}}">
                        <label for="floatingPassword">Workout level</label>
                      </div>
                      <div class="row g-3 mb-3">
                            <div class="col-md-6 form-floating">
                                <input type="number" class="form-control" id="floatingPassword" placeholder="Calories" name="calories" value="{{$data->calories}}">
                                <label for="floatingPassword">Calories</label>
                            </div>
                            <div class="col-md-6 form-floating">
                                <input type="time" class="form-control" id="floatingPassword" placeholder="Time" name="time" value="{{$data->time}}">
                                <label for="floatingPassword">Time</label>
                            </div>
                      </div>
                      <div class="input-group mb-3">

                        <label class="input-group-text" for="inputGroupFile01">Upload photo</label>
                        <input type="file" class="form-control" id="inputGroupFile01" name="image" >
                        <input type="input-group-text" value="{{$data->image}}" disabled>
                      </div>

                      <div class="input-group mb-3">

                        <label class="input-group-text" for="inputGroupFile01">Upload video</label>
                        <input type="file" class="form-control" id="inputGroupFile01" name="video">
                        <input type="input-group-text" value="{{$data->video}}" disabled>
                      </div>

                    <div class="referee-remark-input-btns-container">
                        <button type ="submit" class="btn btn-primary">Create</button>
                        {{-- <button class="referee-remark-cancel-btn">Cancel</button> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>

  </div>


@endsection


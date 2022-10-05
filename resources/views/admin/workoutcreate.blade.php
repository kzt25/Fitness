@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
        <div class="card my-3 shadow rounded" style="max-width: 60%">
            <div class="card-header text-center"><h3>Create Workout</h3></div>
            <div class="card-body">
              {{-- <h5 class="card-title">Primary card title</h5> --}}
              <form class="referee-remark-input-container" action="{{route('createworkout')}}" enctype="multipart/form-data" method = "POST">
                @csrf
                <input type="hidden" name="workoutplanId" value="{{$workoutplanId}}">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Workout Name" name="workoutname">
                    <label for="floatingInput">Workout Name</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingPassword" placeholder="Workout level" name="workoutlevel">
                    <label for="floatingPassword">Workout level</label>
                  </div>
                  <div class="row g-3 mb-3">
                        <div class="col-md-6 form-floating">
                            <input type="number" class="form-control" id="floatingPassword" placeholder="Calories" name="calories">
                            <label for="floatingPassword">Calories</label>
                        </div>
                        <div class="col-md-6 form-floating">
                            <input type="number" class="form-control" id="floatingPassword" placeholder="Time" title="Minutes" name="time">
                            <label for="floatingPassword">Time</label>
                        </div>
                  </div>
                  <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupFile01">Upload photo</label>
                    <input type="file" class="form-control" id="inputGroupFile01" name="image">
                  </div>

                  <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupFile01">Upload video</label>
                    <input type="file" class="form-control" id="inputGroupFile01" name="video">
                  </div>

                <div class="referee-remark-input-btns-container">
                    <button type ="submit" class="btn btn-primary">Create</button>
                    {{-- <button class="referee-remark-cancel-btn">Cancel</button> --}}
                </div>
            </form>
            </div>
          </div>


  </div>


@endsection


@extends('layouts.app')
@section('workoutplan-active','active')

@section('content')

<a href="{{route('workoutplane')}}" class="btn btn-sm btn-primary"><i class="fa-solid fa-arrow-left-long"></i>&nbsp; Back</a>

<div class="container d-flex justify-content-center">

        <div class="card my-3 shadow rounded" style="max-width: 60%">
            <div class="card-header text-center"><h3>Create Workout</h3></div>
            <div class="card-body">
              {{-- <h5 class="card-title">Primary card title</h5> --}}
              <form class="referee-remark-input-container" action="{{route('createworkout')}}" enctype="multipart/form-data" method = "POST" id="create-workout">
                @csrf
                <input type="hidden" name="workoutplanId" value="{{$workoutplanId}}">

                <div class="offset-1 col-md-10" class="previewvideo">
                    <video width="100%" height="200px" controls>
                        Your browser does not support the video tag.
                    </video>
                </div>

                <div class="row g-3 mb-3">
                    <div class="form-floating col-md-6">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Workout Name" name="workoutname">
                        <label for="floatingInput">Workout Name</label>
                    </div>
                    <div class="form-floating col-md-6">
                        <select class="form-select" aria-label="Default select example" placeholder="Workout level select" name="memberType">
                            <option value=""></option>
                            @foreach ($member as $members)
                            <option value="{{$members->member_type}}">{{$members->member_type}}</option>
                            @endforeach

                        </select>
                        <label for="floatingInput">Workout level select</label>
                    </div>
                </div>

                  <div class="row g-3 mb-3">
                        <div class="col-md-6 form-floating">
                            <input type="number" class="form-control" id="floatingPassword" placeholder="Calories" name="calories">
                            <label for="floatingPassword">Calories</label>
                        </div>
                        <div class="form-floating col-md-6">
                            <select class="form-select" aria-label="Default select example" placeholder="Workout level select" name="workoutlevel">
                                <option value=""></option>
                                <option value="Beginner">Beginner</option>
                                <option value="Advance">Advance</option>
                                <option value="Professional">Professional</option>
                            </select>
                            <label for="floatingInput">Workout level select</label>
                        </div>
                  </div>

                  <div class="d-flex justify-content mb-3">
                        <label for="">Gender Type : &nbsp;</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gendertype" id="inlineRadio1" value="male">
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gendertype" id="inlineRadio2" value="female">
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gendertype" id="inlineRadio3" value="both">
                            <label class="form-check-label" for="inlineRadio3">Both</label>
                        </div>
                  </div>

                  <div class="row g-3 mb-3">
                        <div class="form-floating col-md-6">
                                <select class="form-select" aria-label="Default select example" placeholder="Select workout day" name="workoutday">
                                    <option value=""></option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="Sunday">Sunday</option>
                                </select>
                                <label for="floatingInput">Select Workout day</label>
                        </div>
                        <div class="form-floating col-md-6">
                                <select class="form-select" aria-label="Default select example" placeholder="Select workout place" name="workoutplace">
                                    <option value=""></option>
                                    <option value="Gym">Gym</option>
                                    <option value="Home">Home</option>
                                </select>
                                <label for="floatingInput">Select Workout Place</label>
                        </div>
                  </div>

                  <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupFile01">Upload photo</label>
                    <input type="file" class="form-control" id="inputGroupFile01" name="image">
                  </div>

                  <div class="input-group mb-3">
                    <label class="input-group-text"> Upload video
                    <input type="file" class="form-control" name="video" id="videoUpload">
                    <input type="hidden" name="videoTime" value="" class="video-duration">
                   </label>
                  </div>


                <div class="referee-remark-input-btns-container">
                    <button type ="submit" class="btn btn-primary">Create</button>
                    <a href="{{route('workoutplane')}}" class="btn btn-secondary text-primary ms-2">Cancel</a>

                </div>
            </form>
            </div>
        </div>


  </div>
  <script>

    document.getElementById("videoUpload")
    .onchange = function(event) {
      var file = event.target.files[0];
      console.log(file);
      var blobURL = URL.createObjectURL(file);
      var video = document.querySelector("video");
      video.src = blobURL;
      video.addEventListener('loadedmetadata', function () {
        var minutes = Math.floor(video.duration / 60) %60;
        var seconds = Math.floor(video.duration % 60);
        document.querySelector('.video-duration').value = minutes
        });

    }

// var videolength = document.querySelector('video');
// videolength.addEventListener('loadedmetadata', function () {
// var minutes = Math.floor(videolength.duration / 60) %60;
// var seconds = Math.floor(videolength.duration % 60);
// document.querySelector('.video-duration').innerHTML = "Duration : " + minutes +" : "+ seconds +" Minutes"
// });
    </script>

  {{-- <script>
    function filedetails(){
    var Name = document.getElementById('myfile').files[0].name;
    var Time = document.getElementById('myfile').files[0].duration;
    var Size = document.getElementById('myfile').files[0].size;
    var ModificationDate = document.getElementById('myfile').files[0].lastModifiedDate;
    var Type = document.getElementById('myfile').files[0].type;
    var output_file_informations = Name+"\n"+Size+"\n"+ModificationDate+"\n"+Type+"\n"+Time;
    alert(output_file_informations);
}
  </script> --}}


@endsection

@push('scripts')
{!! JsValidator::formRequest('App\Http\Requests\WorkoutRequest', '#create-workout') !!}
@endpush

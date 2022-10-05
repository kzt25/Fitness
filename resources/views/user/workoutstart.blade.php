@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 50px; max-width: 1000px;">
    <h3 class="text-center">Get Learn At Home</h3>
    <div class="d-flex flex-row justify-content-center">
      <div class="mx-3">
          <i class="fa-solid fa-burger"></i>
          <span>Calories:50</span>
      </div>
      <div class="mx-3">
          <i class="fa-regular fa-clock"></i>
          <span>Minutes:16</span>
      </div>
    </div>
    <button class="btn btn-dark">Let's Go</button>
    <div class="card mb-3 mx-auto">
      <h4 class="mx-3">Equipments</h4>
      <div class="row g-0">
          <div class="col-md-3 my-3" style="margin-left: 20px;">
              <img src="gym1.jpg" class=" float-start" alt="" style="width: 100px; height: 100px; margin-right: 10px; border-radius: 50%;">
              <p class="card-text my-5">Training 1</p>
          </div>
      </div>

      <div class="row g-0">
          <div class="col-md-3 my-3" style="margin-left: 20px;">
              <img src="gym1.jpg" class=" float-start" alt="" style="width: 100px; height: 100px; margin-right: 10px; border-radius: 50%;">
              <p class="card-text my-5">Training 1</p>
          </div>
      </div>

      <div class="row g-0">
          <div class="col-md-3 my-3" style="margin-left: 20px;">
              <img src="gym1.jpg" class=" float-start" alt="" style="width: 100px; height: 100px; margin-right: 10px; border-radius: 50%;">
              <p class="card-text my-5">Training 1</p>
          </div>
      </div>
      <h4 class="mx-3">Workouts</h4>
      <div class="row">
          <div class="col-md-3 my-3" style="margin-left: 20px;">
              <img src="gym1.jpg" class="rounded float-start" alt="" style="width: 100px; height: 100px; margin-right: 10px;">
              <p class="card-text">Training 1</p>
              <small class="text-muted">35 mins</small>
          </div>
          <div class="col-md-3 my-3">
              <img src="gym1.jpg" class="rounded float-start" alt="" style="width: 100px; height: 100px; margin-right: 10px;">
              <p class="card-text">Training 2</p>
              <small class="text-muted">35 mins</small>
          </div>
          <div class="col-md-3 my-3">
              <img src="gym1.jpg" class="rounded float-start" alt="" style="width: 100px; height: 100px; margin-right: 10px;">
              <p class="card-text">Training 3</p>
              <small class="text-muted">35 mins</small>
          </div>
      </div>
    </div>


  </div>

@endsection

@extends('layouts.app')

@section('styles')
    <style>
        .swal2-popup {
            display: none;
            position: relative;
            box-sizing: border-box;
            grid-template-columns: minmax(0, 100%);
            width: 40em !important;
            max-width: 100%;
            padding: 0 0 1.25em;
            border: none;
            border-radius: 5px;
            background: #fff;
            color: #545454;
            font-family: inherit;
            font-size: 1rem;
        }

        .form-label {
            font-size: 14px;
        }
    </style>
@endsection
@section('member-active', 'active')
@section('content')
    {{-- @if (Session::has('success'))
        <script>
    Toast.fire({
        icon: 'success',
        title: '{{ Session::get('success') }}'
    })
        </script>
    @endif --}}
    <div class="col-md-11 mx-auto">
        <div class="d-flex justify-content-between mb-3">
            <h2 class="text-center mb-0">Edit Member</h2>
        </div>

        <div class="col-12 card p-4 mb-5">
            <form action="{{route('member.user_member.update',$user->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$user->name}}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="integer" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{$user->phone}}">
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{$user->address}}">
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{$user->email}}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="member_type" class="form-label">Member Type</label>
                    <input type="text" class="form-control @error('member_type') is-invalid @enderror" id="member_type" name="member_type" value="{{$user->member_type}}">
                    @error('member_type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="membertype_level" class="form-label">Member Type Level</label>
                    <input type="text" class="form-control @error('membertype_level') is-invalid @enderror" id="membertype_level" name="membertype_level" value="{{$user->membertype_level}}">
                    @error('membertype_level')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="average_night" class="form-label">Average Night</label>
                    <input type="text" class="form-control @error('average_night') is-invalid @enderror" id="average_night" name="average_night" value="{{$user->average_night}}">
                    @error('average_night')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="physical_activity" class="form-label">Physical Activity</label>
                    <input type="text" class="form-control @error('physical_activity') is-invalid @enderror" id="physical_activity" name="physical_activity" value="{{$user->physical_activity}}">
                    @error('physical_activity')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="diet_type" class="form-label">Diet Type</label>
                    <input type="text" class="form-control @error('diet_type') is-invalid @enderror" id="diet_type" name="diet_type" value="{{$user->diet_type}}">
                    @error('diet_type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="daily_life" class="form-label">Daily Life</label>
                    <input type="text" class="form-control @error('daily_life') is-invalid @enderror" id="daily_life" name="daily_life" value="{{$user->daily_life}}">
                    @error('daily_life')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="energy_level" class="form-label">Energy Level</label>
                    <input type="text" class="form-control @error('energy_level') is-invalid @enderror" id="energy_level" name="energy_level" value="{{$user->energy_level}}">
                    @error('energy_level')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="body_type" class="form-label">Body Type</label>
                    <input type="text" class="form-control @error('body_type') is-invalid @enderror" id="body_type" name="body_type" value="{{$user->body_type}}">
                    @error('body_type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input type="text" class="form-control @error('age') is-invalid @enderror" id="age" name="age" value="{{$user->age}}">
                    @error('age')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="goal" class="form-label">Goal</label>
                    <input type="text" class="form-control @error('goal') is-invalid @enderror" id="goal" name="goal" value="{{$user->goal}}">
                    @error('goal')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                        <label for="height" class="col-form-label">Height</label>
                        </div>
                        <div class="col-auto">
                        <input type="integer @error('height') is-invalid @enderror" id="height" class="form-control" name="height"  value="{{$user->height}}">
                            @error('height')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-auto">
                            <label for="weight" class="col-form-label">Weight</label>
                        </div>
                        <div class="col-auto">
                            <input type="integer @error('weight') is-invalid @enderror" id="weight" class="form-control" name="weight"  value="{{$user->weight}}">
                            @error('weight')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-auto">
                            <label for="ideal_weight" class="col-form-label">Ideal Weight</label>
                        </div>
                        <div class="col-auto">
                            <input type="integer" id="ideal_weight" class="form-control" name="ideal_weight"  value="{{$user->ideal_weight}}">
                            @error('ideal_weight')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <br>
                <div class="mb-3">
                    <label for="bad_habits" class="form-label">Bad Habits : </label>

                    @foreach (json_decode($user->bad_habits); as $s)

                    <input class="form-check-input" type="checkbox" id="{{$s}}" name="bad_habits[]" value="{{$s}}" checked/>
                    <label class="form-check-label" for="{{$s}}">{{$s}}</label>
                    @endforeach
                    <hr style="width:50%">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="i don't rest enough" name="most_attention_areas[]" value="i don't rest enough"  />
                        <label class="form-check-label" for="i don't rest enough">i don't rest enough</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="sweet tooth" name="most_attention_areas[]" value="sweet tooth" />
                        <label class="form-check-label" for="sweet tooth">sweet tooth</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="too much soda" name="most_attention_areas[]" value="too much soda" />
                        <label class="form-check-label" for="too much soda">too much soda</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="a lot of salty foods" name="most_attention_areas[]" value="a lot of salty foods" />
                        <label class="form-check-label" for="a lot of salty foods">a lot of salty foods</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="lat night snacks" name="most_attention_areas[]" value="lat night snacks" />
                        <label class="form-check-label" for="lat night snacks">late night snacks</label>
                    </div>

                    @error('bad_habits')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <br>
                <div class="mb-3">
                    <label for="most_attention_areas" class="form-label">Most Attention Areas : </label>

                    @foreach (json_decode($user->most_attention_areas); as $s)

                    <input class="form-check-input" type="checkbox" id="{{$s}}" name="most_attention_areas[]" value="{{$s}}" checked/>
                    <label class="form-check-label" for="{{$s}}">{{$s}}</label>
                    @endforeach
                    <hr style="width:50%">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="back" name="bad_habits[]" value="back"  />
                        <label class="form-check-label" for="back">back</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="chest" name="bad_habits[]" value="chest" />
                        <label class="form-check-label" for="chest">chest</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="arms" name="bad_habits[]" value="arms" />
                        <label class="form-check-label" for="arms">arms</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="belly" name="bad_habits[]" value="belly" />
                        <label class="form-check-label" for="belly">belly</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="butt" name="bad_habits[]" value="butt" />
                        <label class="form-check-label" for="butt">butt</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="legs" name="bad_habits[]" value="legs" />
                        <label class="form-check-label" for="legs">legs</label>
                    </div>
                    @error('most_attention_areas')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <br>
                <div class="mb-3">
                    <label for="physical_limitation" class="form-label">Physical Limitation : </label>

                    @foreach (json_decode($user->physical_limitation); as $s)

                    <input class="form-check-input" type="checkbox" id="{{$s}}" name="physical_limitation[]" value="{{$s}}" checked/>
                    <label class="form-check-label" for="{{$s}}">{{$s}}</label>
                    @endforeach
                    <hr style="width:50%">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="none" name="bad_habits[]" value="none"  />
                        <label class="form-check-label" for="none">none</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="back pain" name="bad_habits[]" value="back pain" />
                        <label class="form-check-label" for="back pain">back pain</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="knee pain" name="bad_habits[]" value="knee pain" />
                        <label class="form-check-label" for="knee pain">knee pain</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="limited mobility" name="bad_habits[]" value="limited mobility" />
                        <label class="form-check-label" for="limited mobility">limited mobility</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="other" name="bad_habits[]" value="other" />
                        <label class="form-check-label" for="other">other</label>
                    </div>
                    @error('physical_limitation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{url()->previous()}}" class="btn btn-secondary" >Cancel</a>
            </form>
        </div>
    </div>
@endsection

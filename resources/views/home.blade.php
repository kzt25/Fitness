<h1>Customer view</h1>
@foreach ($users as $u)
   {{-- User Name - {{$u->name}} --}}
   {{-- {{}} --}}
     @foreach ($u->members as $hist)
        {{-- {{$hist}} --}}
        UserID - {{$u->name}} <br>
        Level - {{$hist->member_type}} <br>
        {{-- Member_id - {{$hist->member->id}} <br> --}}
        {{-- Type - {{$hist->member->member_type}} <br> --}}

        <hr>
    @endforeach
    {{-- @foreach ($membHist as $latest)
    Current Type - {{$latest->user->name}} <br>
    Current Type - {{$latest->member->id}} <br>
    Current Type - {{$latest->member_type_level}} <br> <hr>

    @endforeach --}}
@endforeach





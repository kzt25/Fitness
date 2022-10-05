<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    {{-- fontawasome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />

    <!-- Datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href=" https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

    {{-- workout css --}}
    <link rel="stylesheet" href="{{asset('css/workout.css')}}">
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    @yield('styles')

</head>

<body id="body-pd">
    <div id="app">
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>


            <div class="dropdown">
                <button
                class="btn btn-secondary dropdown-toggle"
                type="button"
                id="dropdownMenuButton"
                data-mdb-toggle="dropdown"
                aria-expanded="false"
                >
                <i class="fa-solid fa-user"></i>&nbsp;&nbsp; {{Auth()->user()->name}}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li>
                        <a class="dropdown-item" href="#">
                        <i class="fa-solid fa-user"></i>
                        <span class="nav_name">Profile</span>
                        </a>
                    </li>
                  <li>
                    <a href="#" class="dropdown-item sign_out">
                    <i class='bx bx-log-out nav_icon'></i>
                    <span class="nav_name">SignOut</span>
                    </a>
                </li>
                </ul>
              </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="#" class="nav_logo">
                        <i class='bx bx-layer nav_logo-icon'></i>
                        <span class="nav_logo-name">GYM</span>
                    </a>
                    <div class="nav_list">
                        <a href="#" class="nav_link active">
                            <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Dashboard</span>
                        </a>
                        <a href="" class="nav_link">
                            <i class='bx bx-user nav_icon'></i>
                            <span class="nav_name">Users</span>
                        </a>
                        <a href="{{ route('trainer.index') }}" class="nav_link">
                            <i class='bx bx-dumbbell nav_icon'></i>
                            <span class="nav_name">Trainers</span>
                        </a>
                        <a href="{{ route('permission.index') }}" class="nav_link">
                            <i class="fa-solid fa-shield-halved"></i>
                            <span class="nav_name">Permissions</span>
                        </a>
                        <a href="{{ route('role.index') }}" class="nav_link">
                            <i class="fa-solid fa-user-shield"></i>
                            <span class="nav_name">Roles</span>
                        </a>
                        <a href="#" class="nav_link">
                            <i class='bx bx-message-square-detail nav_icon'></i>
                            <span class="nav_name">Messages</span>
                        </a>
                        <a href="{{route('member.index')}}" class="nav_link ">
                            <i class="fa-solid fa-user-group"></i>
                            <span class="nav_name">Member</span>
                        </a>
                        <a href="{{route('mealplan.index')}}" class="nav_link ">
                            <i class="fa-solid fa-utensils"></i>
                            <span class="nav_name">Meal Plan</span>
                        </a>
                        <a href="{{route('meal.index')}}" class="nav_link ">
                            <i class="fa-solid fa-burger"></i>
                            <span class="nav_name">Meal</span>
                        </a>

                        <a href="{{route('meal.index')}}" class="nav_link ">
                            <i class="fa-solid fa-burger"></i>
                            <span class="nav_name">Meal</span>
                        </a>
                        <a href="{{route('meal.index')}}" class="nav_link ">
                            <i class="fa-solid fa-burger"></i>
                            <span class="nav_name">Meal</span>
                        </a>
                        <a href="{{route('meal.index')}}" class="nav_link ">
                            <i class="fa-solid fa-burger"></i>
                            <span class="nav_name">Meal</span>
                        </a>

                    </div>
                </div>
                {{-- <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit" class="btn btn-secondary" onclick="return confirm('Are you sure you want to logout this ?')">
                        <i class='bx bx-log-out nav_icon'></i>
                    </button>
                </form> --}}
            </nav>
        </div>
        <!--Container Main start-->
        <div class="height-100">
            @yield('content')
        </div>
        <!--Container Main end-->

    </div>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
    <!-- Datatable -->
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Select 2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>

    <script src="{{ asset('js/sidebar.js') }}"></script>

    @stack('scripts')

    <script>

       $(document).ready(function() {
        $(document).on('click','.sign_out', function (e) {
                e.preventDefault();

                swal({
                        text: "Are you sure you want to sign out?",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                method: "POST",
                                url: `/logout`
                            })
                            location.reload();
                        } else {
                            swal("Your imaginary file is safe!");
                        }
                    });

                })

        $(document).on('submit', 'form', function() {

            $('button').attr('disabled', 'disabled');
        });

            let token = document.head.querySelector('meta[name="csrf-token"]');
            if (token) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': token.content
                    }
                });
            } else {
                console.error('CSRF TOKEN not found!');
            }
            $(document).on('click', '.previousLink', function(e) {
                e.preventDefault();
                window.history.back();
            })
            $(".ninja-select").select2();
        })
    </script>
</body>

</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />

    <!-- Datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href=" https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}"> --}}

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{asset('css/workout.css')}}">
    @yield('styles')

</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="index.html">
                    <span class="align-middle">GYM</span>
                </a>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Pages
                    </li>

                    <li class="sidebar-item @yield('dashboard-active')">
                        <a class="sidebar-link" href="{{ route('admin-home') }}">
                            <i class="fa-solid fa-layer-group align-middle "></i>
                            <span class="align-middle">Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item @yield('trainer-active') ">
                        <a class="sidebar-link" href="{{ route('trainer.index') }}">
                            <i class="fa-solid fa-dumbbell align-middle "></i> <span
                                class="align-middle">Trainers</span>
                        </a>
                    </li>

                    <li class="sidebar-item @yield('member-active')">
                        <a class="sidebar-link" href="{{ route('member.index') }}">
                            <i class="fa-solid fa-user-group  align-middle"></i> <span
                                class="align-middle">Members</span>
                        </a>
                    </li>

                    <li class="sidebar-item @yield('mealplan-active')">
                        <a class="sidebar-link" href="{{ route('mealplan.index') }}">
                            <i class="fa-solid fa-utensils  align-middle"></i> <span class="align-middle">Meal
                                Plans</span>
                        </a>
                    </li>

                    <li class="sidebar-item @yield('meal-active')">
                        <a class="sidebar-link" href="{{ route('meal.index') }}">
                            <i class="fa-solid fa-burger  align-middle"></i> <span class="align-middle">Meals</span>
                        </a>
                    </li>


                    <li class="sidebar-item @yield('permission-active')">
                        <a class="sidebar-link" href="{{ route('permission.index') }}">
                            <i class="fa-solid fa-shield-halved  align-middle"></i> <span
                                class="align-middle">Permissions</span>
                        </a>
                    </li>

                    <li class="sidebar-item @yield('role-active')">
                        <a class="sidebar-link" href="{{ route('role.index') }}">
                            <i class="fa-solid fa-user-shield  align-middle"></i> <span
                                class="align-middle">Roles</span>
                        </a>
                    </li>



                    <li class="sidebar-item @yield('workoutplan-active')">
                        <a class="sidebar-link" href="{{ route('workoutplane') }}">
                            <i class="fa-solid fa-layer-group align-middle "></i>
                            <span class="align-middle">Workout Plan</span>
                        </a>
                    </li>



                </ul>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg d-flex justify-content-between">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="dropdown">
                    <img src="{{ asset('img/avatar.jpg') }}" style="cursor: pointer;" class="rounded-circle me-2" width="35" alt="">
                    <span class="mb-0 me-4 dropdown-toggle" style="cursor: pointer;" data-mdb-toggle="dropdown">{{ auth()->user()->name }} <i class="fa-solid fa-angle-down fa-sm"></i></span>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <li><a class="dropdown-item" href="{{ route('admin-profile') }}">Profile</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item logout-btn" href="">Logout</a></li>
                    </ul>
                  </div>
            </nav>

            <main class="content">
                <div class="container-fluid p-0">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>

    <!-- Datatable -->
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap.min.js"></script>

    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Select 2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>

    @stack('scripts')

    <script>
        $(document).ready(function() {
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


            $(document).on('click', '.logout-btn', function(e) {
                e.preventDefault();

                swal({
                        text: "Are you sure you want to Logout?",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                method: "POST",
                                url: `/admin/logout`
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
            $(".ninja-select").select2();
        })
    </script>
</body>

</html>

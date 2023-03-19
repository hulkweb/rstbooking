<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex">
    <meta name="server" content="app.spp.co">
    <!-- Favicon -->
    <link rel="icon" href="/assets/img/favicon.ico">

    <title>
        Admin </title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://use.typekit.net/qhc0gdo.css">
    <link rel="stylesheet" href="/css/19-10/spp_clients.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/51761b1c6c.js"></script>
    <script src="https://kit.fontawesome.com/51761b1c6c.js"
        integrity="sha384-TkHCDK2R4IB93mPBtcXB9TEEMBrgr+TauHljGd1FRtIUOlP3bzlwhereXI2hOKjr" crossorigin="anonymous">
    </script>

    <style type="text/css" data-css-vars>
        :root {}

        #data .card,
        #data a {
            height: 200px;
            width: 200px;
            text-align: center;
            justify-content: center;
            align-items: center;
            background: white;
        }
    </style>

</head>

<body class="">
    <div id="loading" class="ajax-loader">Loading...</div>

    <div class="container-fluid">
        <div class="row">
            <aside class="col sidebar"
                style="background: rgb(86,86,88);
            background: linear-gradient(180deg,#5533ff -20%, #3358ff 59%,#FF9933 100%);">
                <div class="sidebar-sticky">
                    <img src="/logo.png" height="60" alt="">

                    <ul class="nav flex-column" role="navigation">
                        <li class="nav-item title">Activity</li>
                        <li class="nav-item">
                            <a href="/admin" class="nav-link" title="Dashboard" data-pjax>

                                <span>
                                    <i class="fas fa-home fa-fw"></i>

                                    Home
                                </span>
                            </a>
                        </li>


                        
                        <li class="nav-item title">Restaurants</li>
                        <li class="nav-item">
                            <a href="{{ route('restaurants.index') }}" class="nav-link" title="Orders">

                                <span>
                                    <i class="fas fa-inbox fa-fw"></i>
                                    restaurants </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('restaurants.create') }}" class="nav-link" title="Orders">

                                <span>
                                    <i class="fas fa-inbox fa-fw"></i>
                                    Create restaurants </span>
                            </a>
                        </li>


                        <li class="nav-item title">bookings</li>
                        <li class="nav-item">
                            <a href="{{ route('bookings.index') }}" class="nav-link" title="Orders">

                                <span>
                                    <i class="fas fa-inbox fa-fw"></i>
                                    bookings </span>
                            </a>
                        </li>
                       


                        
                       



                        {{-- <li class="nav-item title">Account</li>
                        <li class="nav-item">
                            <a href="profile" class="nav-link " title="Profile" data-pjax>

                                <span>
                                    <i class="fas fa-user fa-fw"></i>

                                    Profile
                                </span>
                            </a>
                        </li> --}}
                    </ul>
                </div>

                <footer></footer>
            </aside>
            <main class="col">

                <nav class="navbar navbar-light navbar-expand">

                    <button id="sidebar-collapse" class="navbar-toggler d-block d-lg-none mr-2" type="button">

                        <span class="navbar-toggler-icon"></span>
                    </button>


                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item d-flex align-items-center mr-3">
                        </li>

                        <li class="nav-item dropdown notifications" id="notification-menu"></li>




                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle d-flex align-items-center"
                                data-toggle="dropdown">
                                <div class="avatar css-avatar"><span>{{ auth()->user()->name[0] }} </span></div>

                                <span class="d-none d-lg-block ml-1">{{ auth()->user()->name }}</span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                {{-- <a href="/profile" class="dropdown-item" data-pjax>Your
                                    account</a> --}}
                                <a href="/logout_user" class="dropdown-item">
                                    Sign out
                                </a>
                            </div>
                        </li>



                    </ul>
                </nav>
                @yield('content')
            </main>
        </div>
    </div>

    <footer class="pt-3">&nbsp;</footer>

    <div class="modal" id="spp-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content"></div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    @if ($success = Session::get('success'))
        <script>
            swal("Success", "{{ $success }}!", "success");
        </script>
    @endif

    @if ($errore = Session::get('errore'))
        <script>
            swal("Success", "{{ $errore }}!", "error");
        </script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>



    <script src="/js/jquery.pjax.js?v=08-10"></script>
    <script src="/js/27-10/spp_clients.js"></script>






</body>

</html>

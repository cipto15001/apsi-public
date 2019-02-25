<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>APSI</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('vendors/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    {{-- <link href="{{ asset('vendors/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet"> --}}

    <!-- Waves Effect Css -->
    <link href="{{ asset('vendors/node-waves/waves.css') }}" rel="stylesheet"/>

    <!-- Animation Css -->
    <link href="{{ asset('vendors/animate-css/animate.css') }}" rel="stylesheet"/>

    <!-- Morris Chart Css-->
    <link href="{{ asset('vendors/morrisjs/morris.css') }}" rel="stylesheet"/>

    <!-- Custom Css -->
    <link href="{{ asset('styles/style.css') }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('styles/themes/all-themes.css') }}" rel="stylesheet"/>

    @stack('styles')
</head>

<body class="theme-amber">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>
            @php
                $texts = [
                    'Will Be Landing Soon',
                    'Harvesting Eggs',
                    'Summoning Phantoms',
                    'Howling at the Moon',
                    'Purging Heretics',
                    'Almost There'
                ];
            @endphp
            {{ array_random($texts) }}
        </p>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->

<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="{{ route('workspaces.index') }}">APSI</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Call Search -->
                <!-- <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li> -->
                <!-- #END# Call Search -->
                <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- #Top Bar -->

<section>
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right">
        </ul>
        <div class="tab-content">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-12">
                        <div class="profile-card">
                            <div class="profile-header">&nbsp;</div>
                            <div class="profile-body">
                                <div class="image-area">
                                    <img src="{{ asset('img/user-lg.jpg') }}" alt="AdminBSB - Profile Image" />
                                </div>
                                <div class="content-area">
                                    <h3>{{ auth()->user()->name }}</h3>
                                    <p>{{ auth()->user()->email }}</p>
                                    <p>{{ ucfirst(auth()->user()->role) }}</p>
                                </div>
                            </div>
                            <div class="profile-footer">
                                <form method="POST" action="{{ route('logout') }}">
                                    <!-- <div class="pink"></div> -->
                                    {{ csrf_field() }}
                                    <button class="btn btn-success btn-block" type="button" data-toggle="modal"
                                    data-target="#changeEmail">Change Email</button>
                                    <button class="btn btn-primary btn-block" type="button" data-toggle="modal"
                                    data-target="#changePassword">Change Password</button>
                                    <button class="btn btn-danger btn-block" type="submit">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div role="tabpanel" class="tab-pane fade in active in active">
                <ul class="demo-choose-skin">
                    <li data-theme="pink">
                        <form method="POST" action="{{ route('logout') }}">
                            <!-- <div class="pink"></div> -->
                            {{ csrf_field() }}
                            <button class="btn btn-primary btn-sm" type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div> --}}
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</section>

<section class="content">
    @yield('main-content')
</section>
<!-- #END# Page Loader -->
@yield('non-main-content')
    <div class="modal fade" id="changeEmail" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-blue-grey">
                    <h3>
                        Edit Email
                    </h3>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="body">
                            <div id="error-email" style="display: none;" class="alert alert-danger"></div>
                            <div id="success-email" style="display: none;" class="alert alert-success">Your email has been successfully changed!</div>
                            {{ csrf_field() }}
                            <label for="title">New Email</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="newEmail" class="form-control" required
                                        placeholder="Input new email">
                                </div>
                            </div>
                            <label for="description">Confirm New Email</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="confirmEmail" class="form-control" required
                                        placeholder="Input confirmation email">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect bg-amber change-email">Change
                    </button>
                    <button type="button" class="btn btn-danger waves-effect bg-red" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="changePassword" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-blue-grey">
                    <h3>
                        Edit Password
                    </h3>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="body">
                            <label for="title">Old Password</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="oldPassword" class="form-control" required
                                        placeholder="Input old password">
                                </div>
                            </div>
                            <label for="description">New Password</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="confirmNewPassword" class="form-control" required
                                        placeholder="Input new password">
                                </div>
                            </div>
                            <label for="description">Confirmation Password</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="confirmPasword" class="form-control" required
                                        placeholder="Input confirmation password">
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="form-workspaces-create" class="btn btn-success waves-effect bg-amber">Change
                    </button>
                    <button type="button" class="btn btn-danger waves-effect bg-red" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


<!-- Jquery Core Js -->
<script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap Core Js -->
<script src="{{ asset('vendors/bootstrap/js/bootstrap.js') }}"></script>

<!-- Select Plugin Js -->
{{-- <script src="{{ asset('vendors/bootstrap-select/js/bootstrap-select.js') }}"></script> --}}

<!-- Slimscroll Plugin Js -->
<script src="{{ asset('vendors/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset('vendors/node-waves/waves.js') }}"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="{{ asset('vendors/jquery-countto/jquery.countTo.js') }}"></script>

<!-- Custom Js -->
<script src="{{ asset('scripts/admin.js') }}"></script>
{{--<script src="{{ asset('scripts/pages/index.js') }}"></script>--}}

<!-- Demo Js -->
<script src="{{ asset('scripts/demo.js') }}"></script>
<script src="{{ asset('scripts/material.min.js') }}"></script>
<script src="{{ asset('vendors/lodash/lodash.min.js') }}"></script>
@stack('scripts')
<script>
    $(document).ready(function() {
        $("button.change-email").click(function() {
            let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            let newEmail = $('#newEmail').val()
            let confirmEmail = $('#confirmEmail').val()
            let _token = $("input[name='_token']").val()
            
            if (newEmail == '' || confirmEmail == '') {
                $('#error-email').text('Fields cannot be empty!')
                $('#error-email').show('blind')
            } else if (!re.test(String(newEmail).toLowerCase()) || !re.test(String(confirmEmail).toLowerCase())) {
                $('#error-email').text('Invalid email format! Please use standard email format!')
                $('#error-email').show('blind')
            } else {
                if (newEmail != confirmEmail) {
                    $('#error-email').html('<strong>New Email</strong> field and <strong>Confirm New Email</strong> field didn\'t match!')
                    $('#error-email').show('blind')
                } else {
                    $('#error-email').hide('blind')
                    let baseUrl = 'http://127.0.0.1:8000'
                    $.ajax({
                        method: 'PUT',
                        data: {
                            email: newEmail,
                            _token: _token
                        },
                        dataType: 'json',
                        url: baseUrl + '/user/change_email',
                        success: function(data) {
                            $('#success-email').show('blind')
                            window.setTimeout(function() {
                                window.location.reload()
                            }, 2000);
                        },
                        error: function(error) {
                            console.error(error)
                        }
                    })
                }
            }
        })
    })
</script>
</body>
</html>

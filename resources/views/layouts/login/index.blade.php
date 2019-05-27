<!doctype html>
<html class="fixed">
    <head>

        <!-- Basic -->
        <meta charset="UTF-8">

        <meta name="keywords" content="HTML5 Admin Template" />
        <meta name="description" content="Porto Admin - Responsive HTML5 Template">
        <meta name="author" content="okler.net">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="template_admin/assets/vendor/bootstrap/css/bootstrap.css" />

        <link rel="stylesheet" href="template_admin/assets/vendor/font-awesome/css/font-awesome.css" />
        <link rel="stylesheet" href="template_admin/assets/vendor/magnific-popup/magnific-popup.css" />
        <link rel="stylesheet" href="template_admin/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

        <!-- Theme CSS -->
        <link rel="stylesheet" href="template_admin/assets/stylesheets/theme.css" />

        <!-- Skin CSS -->
        <link rel="stylesheet" href="template_admin/assets/stylesheets/skins/default.css" />

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="template_admin/assets/stylesheets/theme-custom.css">

        <!-- Head Libs -->
        <script src="template_admin/assets/vendor/modernizr/modernizr.js"></script>

        <style type="text/css">
            input[type="email"]
            {
                background: transparent;
                border: none;
            }

            input[type="text"]
            {
                background: transparent;
                border: none;
            }

            input[type="password"]
            {
                background: transparent;
                border: none;
            }
        </style>

    </head>
    <body>
        <!-- start: page -->
        <section class="body-sign">
            <div class="center-sign">
                {{-- <a href="/" class="logo pull-left">
                    <img src="template/images/header/logo-tni-au-dark.png" height="54" alt="Porto Admin" />
                </a> --}}

                <form method="POST" action="{{ url('userin') }}">
                    {{ csrf_field() }}

                    <div class="panel">

                        <div class="panel-body-login">
                            @if (Session::has('alert'))
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <strong>Gagal ! </strong> {{ Session::get('alert') }}
                                </div>
                            @endif
                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="success" aria-hidden="true">×</button>
                                    <strong>Berhasil ! </strong> {{ Session::get('success') }}
                                </div>
                            @endif
                            <form action="index.html" method="post">
                                <div class="form-group mb-lg">
                                    <div class="clearfix">
                                        <h2 class="panel-title">Username</h2>
                                    </div>
                                    <div class="input-group input-group-icon">
                                        <input name="email" type="text" class="form-control input-lg" placeholder="Username" required />
                                        <span class="input-group-addon">
                                            <span class="icon icon-lg">
                                                <i class="fa fa-user"></i>
                                            </span>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group mb-lg">
                                    <div class="clearfix">
                                        <h2 class="panel-title">Password</h2>
                                    </div>
                                    <div class="input-group input-group-icon">
                                        <input id="password" name="password" type="password" class="form-control input-lg" placeholder="Password" required />
                                        <span class="input-group-addon">
                                            <span class="icon icon-lg">
                                                <i class="fa fa-lock"></i>
                                            </span>
                                        </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-8">
                                    </div>
                                    <div class="col-sm-4 text-right">
                                        <button type="submit" class="btn btn-default hidden-xs">Sign In</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                    <p class="text-center text-muted mt-md mb-md">&copy; Copyright {{ date('Y') }}. All Rights Reserved.</p>
            </div>
        </section>
        <!-- end: page -->

        <!-- Vendor -->
        <script src="template_admin/assets/vendor/jquery/jquery.js"></script>
        <script src="template_admin/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
        <script src="template_admin/assets/vendor/bootstrap/js/bootstrap.js"></script>
        <script src="template_admin/assets/vendor/nanoscroller/nanoscroller.js"></script>
        <script src="template_admin/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="template_admin/assets/vendor/magnific-popup/jquery.magnific-popup.js"></script>
        <script src="template_admin/assets/vendor/jquery-placeholder/jquery-placeholder.js"></script>
        
        <!-- Theme Base, Components and Settings -->
        <script src="template_admin/assets/javascripts/theme.js"></script>
        
        <!-- Theme Custom -->
        <script src="template_admin/assets/javascripts/theme.custom.js"></script>
        
        <!-- Theme Initialization Files -->
        <script src="template_admin/assets/javascripts/theme.init.js"></script>

    </body>
</html>
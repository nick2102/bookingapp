<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Booking App</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <link href="/assets/css/style.min.css" rel="stylesheet">
    <link href="/assets/css/custom.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="{{route('app.home')}}">Booking App</a>
    </div>
</nav>

<div class="container main_body">
    <div class="row">
        @yield('content')
    </div>
</div>


<footer class="text-center">
    <div class="footer-below">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    Copyright © Booking App 2017
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript" src="/assets/moment/min/moment.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="/assets/js/jqBootstrapValidation.js"></script>

<!-- Custom scripts for this template -->
<script src="/assets/js/custom.min.js"></script>
<script src="/assets/js/payments.js"></script>
<div class="backgrond-shade"></div>
@yield('footer_code')

</body>

</html>

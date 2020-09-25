<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/mdb.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
</head>
<body>
<div class="row">
    <div class="col col-md-2">
        <div class="sidebar">
            <header>DASHBOARD</header>
            <ul class="list-ul">
                <li><a href="{{url('/')}}"><i class="fas fa-home"></i>HOME</a></li>
                <li><a href="{{url('/visitors')}}"><i class="fas fa-users"></i>VISITORS</a></li>
                <li><a href="{{url('/services')}}"><i class="fas fa-globe"></i>SERVICES</a></li>
                <li><a href=""><i class="fas fa-calendar-week"></i>DASHBOARD</a></li>
                <li><a href=""><i class="far fa-question-circle"></i>DASHBOARD</a></li>
                <li><a href=""><i class="far fa-envelope"></i>DASHBOARD</a></li>
            </ul>
        </div>
    </div>

    <div class="col col-md-10 mw-100">
        @yield('content')
        <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/customJs.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/axios.min.js')}}"></script>
        <script src="https://kit.fontawesome.com/9216278261.js" crossorigin="anonymous"></script>
        @yield('script')
    </div>
</div>
</body>
</html>

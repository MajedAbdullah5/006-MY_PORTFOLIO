<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">

</head>
<body>
@include('Layout.menu')
@yield('content')

<script type="text/javascript" src="{{asset("js/bootstrap.min.js")}}"> </script>
<script type="text/javascript" src="{{asset("js/custom.js")}}"> </script>
<script type="text/javascript" src="{{asset("js/jquery-3.5.1.slim.min.js")}}"> </script>
<script type="text/javascript" src="{{asset("js/popper.min.js")}}"> </script>
<script type="text/javascript" src="{{asset("js/mdb.min.js")}}"> </script>
<script src="https://kit.fontawesome.com/9216278261.js" crossorigin="anonymous"></script>

</body>
</html>
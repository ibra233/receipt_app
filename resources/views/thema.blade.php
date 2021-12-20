<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="content/css/style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="{{asset('library/css/style.css')}}">
    <title>Fiş Uygulaması</title>
</head>

<body>
    <script src="{{asset('library/js/notification.min.js')}}"></script>
    <nav class="navbar">
        <ul class="navbox">
           <a href="{{route('product')}}"><li>Ürün Girdileri</li></a>
           <a href="{{route('receipt')}}"><li>Fiş Girdileri</li></a>
        </ul>
    </nav>

    @yield('content')

</body>

</html>

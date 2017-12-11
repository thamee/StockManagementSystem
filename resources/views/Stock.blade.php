{{--<style>--}}
{{--.modal-content {--}}
{{--padding: 100px;--}}
{{--}--}}
{{--</style>style--}}
        <!doctype html>
<html lang="{{ config('app.locale') }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ajax CRUD in laravel - justlaravel.com</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
    <link rel="stylesheet" href="{{asset('css/styleC.css')}}">
    <link rel="stylesheet" href="{{('assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{('https://fonts.googleapis.com/css?family=Josefin+Sans:300,400|Roboto:300,400,500')}}">
    <link rel="stylesheet" href="{{('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{('assets/font-awesome/css/font-awesome.min.css')}}">

</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top navbar-no-bg" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Bootstrap Navbar Menu Template</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="top-navbar-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{URL::to('homepage')}}">Home</a></li>
                <li><a href="{{URL::to('stock')}}">Stock</a></li>
                <li><a href="{{URL::to('stockin')}}">Add stock</a></li>
                <li><a href="{{URL::to('stockout')}}">Stock out</a></li>
                {{--<li><a href="#">Plans</a></li>--}}
                {{--<li><a href="#">Faq</a></li>--}}
                {{--<li><a class="btn btn-link-3" href="#">Button</a></li>--}}
            </ul>
        </div>
    </div>
</nav>
<br>
<div class="container">
    <h3>STOCK TABLE</h3><br>

    {{ csrf_field() }}
    <div class="table-responsive text-center">
        <div id="table-scroll">
        <table class="table table-borderless" id="table">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Stock Number</th>
                <th class="text-center">Stock Name</th>
                <th class="text-center">Stock Unit</th>
                <th class="text-center">Stock Amount </th>
                <th class="text-center">Min Stock Level </th>
                <th class="text-center">Part_type</th>
            </tr>
            </thead>
            @foreach($data as $item)
                <tr class="item{{$item->id}}">
                    <td>{{$item->id}}</td>
                    <td>{{$item->stock_no}}</td>
                    <td>{{$item->stock_name}}</td>
                    <td>{{$item->stock_unit}}</td>
                    <td>{{$item->stock_amount}}</td>
                    <td>{{$item->Min_stock_level}}</td>
                    <td>{{$item->part_type}}</td>


                </tr>
            @endforeach
        </table>
        </div>
    </div>
</div>


</body>
</html>


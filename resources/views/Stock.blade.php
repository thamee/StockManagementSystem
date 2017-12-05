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
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
    <ul class="nav navbar-nav">
        <li><a href="http://justlaravel.com/">justlaravel.com</a></li>
        <li><a href="http://justlaravel.com/demos/">Demos home</a></li>
    </ul>
</nav>
<br><br><br><br>
<div class="container">
    <h3>STOCK TABLE</h3>

    {{ csrf_field() }}
    <div class="table-responsive text-center">
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




<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>

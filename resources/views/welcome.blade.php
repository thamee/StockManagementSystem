@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-success">
                    <div class="panel-heading">List of Game of Thrones Characters</div>




<<<<<<< HEAD
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
</head>
<body>

<div class="topnav" id="myTopnav">
    <a href="#home" class="active">Home</a>
    <a href="#news">News</a>
    <a href="#contact">Contact</a>
    <a href="#about">About</a>
    <a href="#about" class="pull-right" >Logout</a>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
<br><br><br><br>
<div class="container">
    <h3> PRODUCT DETAILS</h3>
    <button id="btn_add" name="btn_add" class="button button2 pull-right" >Add New Stock</button>
    {{ csrf_field() }}
    <div class="table-responsive text-center">
        <table class="table table-borderless" id="table">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Product Name</th>
                <th class="text-center">Product category</th>
                <th class="text-center">Product image</th>
                <th class="text-center">Product unit</th>
            </tr>
            </thead>
            @foreach($data as $item)
                <tr class="item{{$item->id}}">
                    <td>{{$item->id}}</td>
                    <td>{{$item->pro_name}}</td>
                    <td>{{$item->pro_cat}}</td>
                    <td>{{$item->pro_img}}</td>
                    <td>{{$item->unit}}</td>
                    <td><button class="edit-modal btn btn-info" data-id="{{$item->id}}"
                                data-pro_name="{{$item->pro_name}}"  data-pro_cat="{{$item->pro_cat}}"  data-pro_img="{{$item->pro_img}}"  data-unit="{{$item->unit}}">
                            <span class="glyphicon glyphicon-edit"></span> Edit
                        </button>
                        <button class="delete-modal btn btn-danger"
                                data-id="{{$item->id}}" data-name="{{$item->pro_name}}">
                            <span class="glyphicon glyphicon-trash"></span> Delete
                        </button></td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id">ID:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fid" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pro_name">Product Name:</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="n">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pro_cat">Product Category:</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="cid">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pro_img">Product Image:</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="gid" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="unit">Product Unit</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="uid">
                        </div>
                    </div>
                </form>
                <div class="deleteContent">
                    Are you Sure you want to delete <span class="dname"></span> ? <span
                            class="hidden did"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn actionBtn" data-dismiss="modal">
                        <span id="footer_action_button" class='glyphicon'> </span>
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Close
                    </button>
=======
>>>>>>> b4dd2ac4fcce2d0f4fb357f6da8a5f899109ad1f
                </div>
                @if(Auth::guest())
                    <a href="/login" class="btn btn-info"> You need to login to see the list 😜😜 >></a>
                @endif
            </div>
        </div>
    </div>
@endsection
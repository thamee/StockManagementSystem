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

<div class="topnav" id="myTopnav">
    <a href="#home" class="active">Home</a>
    <a href="#news">News</a>
    <a href="#contact">Contact</a>
    <a href="#about">About</a>
    <a href="#about" class="pull-right" >Logout</a>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
<br>
<div class="container">
    <h3> PRODUCT DETAILS</h3><br>
    <button id="btn_add" name="btn_add" class="btn btn-default pull-right">Add New Product</button>
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
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="bt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h3 class="modal-tit" id="myModalLabel">Product</h3>
            </div>
            <div class="modal-body">
                <form id="frmProducts" name="frmProducts" class="form-horizontal" novalidate="">
                    <div class="form-group row add">
                        <label class="control-label col-sm-2" >Product Name:</label>
                        <div class="col-sm-10">

                            <input type="text" class="form-control" id="pro_name" name="pro_name"
                                   placeholder="Enter some name" required>
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                    <div class="form-group row add">
                        <label class="control-label col-sm-2" >Product Category:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pro_cat" name="pro_cat"
                                   placeholder="Enter some name" required>
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                    <div class="form-group row add">
                        <label class="control-label col-sm-2" >Product Image</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pro_img" name="pro_img"
                                   placeholder="Enter some name" required>
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group row add">
                        <label class="control-label col-sm-2" >Product Unit:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="unit" name="unit"
                                   placeholder="Enter some name" required>
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                </form>
            </div>


            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="add" value="add">Save changes</button>

            </div>

        </div>

    </div>
</div>




<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>


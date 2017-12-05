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
    <button id="btn_add" name="btn_add" class="btn btn-default pull-right">Add New Product</button>
    {{ csrf_field() }}
    <div class="table-responsive text-center">
        <table class="table table-borderless" id="table">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Supplier ID</th>
                <th class="text-center">Supplier Name</th>
                <th class="text-center">Address</th>
                <th class="text-center">Contact No</th>
                <th class="text-center">Email</th>
            </tr>
            </thead>
            @foreach($data as $item)
                <tr class="item{{$item->id}}">
                    <td>{{$item->id}}</td>
                    <td>{{$item->sup_id}}</td>
                    <td>{{$item->sup_name}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->contact_no}}</td>
                    <td>{{$item->email}}</td>
                    <td><button class="edit-modal btn btn-info" data-id="{{$item->id}}"
                                data-sup_id="{{$item->sup_id}}"  data-sup_name="{{$item->sup_name}}"  data-address="{{$item->address}}"  data-contact_no="{{$item->contact_no}}">
                            <span class="glyphicon glyphicon-edit"></span> Edit
                        </button>
                        <button class="delete-modal btn btn-danger"
                                data-id="{{$item->id}}" data-name="{{$item->sup_id}}">
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
                        <label class="control-label col-sm-2" for="sup_id">Supplier Id:</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="n">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="sup_name">Supplier Name:</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="cid">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="address">Address:</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="gid" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="contact_no">Contact No:</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="uid">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="pid">
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
                <h3 class="modal-tit" id="myModalLabel">Supplier</h3>
            </div>
            <div class="modal-body">
                <form id="frmProducts" name="frmProducts" class="form-horizontal" novalidate="">
                    <div class="form-group row add">
                        <label class="control-label col-sm-2" >Supplier ID:</label>
                        <div class="col-sm-10">

                            <input type="text" class="form-control" id="sup_id" name="sup_id"
                                   placeholder="Enter supplier id" required>
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                    <div class="form-group row add">
                        <label class="control-label col-sm-2" >Supplier Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="sup_name" name="sup_name"
                                   placeholder="Enter supplier name" required>
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                    <div class="form-group row add">
                        <label class="control-label col-sm-2" >Address:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="address" name="address"
                                   placeholder="Enter address" required>
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group row add">
                        <label class="control-label col-sm-2" >Contact No:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="contact_no" name="contact_no"
                                   placeholder="Enter contact number" required>
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group row add">
                        <label class="control-label col-sm-2" >Email:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email"
                                   placeholder="Enter email" required>
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
<script src="{{ asset('js/supplier.js') }}"></script>
</body>
</html>


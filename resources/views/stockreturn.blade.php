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
    <a href="{{URL::to('homepage')}}" class="">Home</a>
    <a href="{{URL::to('stockreturn')}}" class="active">Stock Return</a>
    {{--<a href="{{URL::to('stockin')}}" class="active">Add Stock</a>--}}
    {{--<a href="{{URL::to('stockout')}}">Stock Out</a>--}}
    <a href="#about" class="pull-right" >Logout</a>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
<br>
<div class="container">
    <h3> STOCK RETURN TABLE</h3><br>
    <button id="btn_add" name="btn_add" class="btn btn  pull-right" >Add return Stock</button>
    {{ csrf_field() }}
    <div class="table-responsive text-center">
        <div id="table-scroll">
        <table class="table table-borderless" id="table">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Stock No</th>
                <th class="text-center">Stock Name</th>
                <th class="text-center">Supplier ID</th>
                <th class="text-center">Supplier Name</th>
                <th class="text-center">Received Date</th>
                <th class="text-center">Return Date</th>
                <th class="text-center">Stock Amount</th>
            </tr>
            </thead>
            @foreach($data as $item)
                <tr class="item{{$item->id}}">
                    <td>{{$item->id}}</td>
                    <td>{{$item->stock_no}}</td>
                    <td>{{$item->stock_name}}</td>
                    <td>{{$item->sup_id}}</td>
                    <td>{{$item->sup_name}}</td>
                    <td>{{$item->received_date}}</td>
                    <td>{{$item->return_date}}</td>
                    <td>{{$item->stock_amount}}</td>
                    <td><button class="edit-modal btn btn-info" data-id="{{$item->id}}"
                                data-stock_no="{{$item->stock_no}}"  data-stock_name="{{$item->stock_name}}"  data-sup_id="{{$item->sup_id}}" data-received_date="{{$item->received_date}}"  data-return_date="{{$item->return_date}}" data-stock_amount="{{$item->stock_amount}}">
                            <span class="glyphicon glyphicon-edit"></span> Edit
                        </button>
                        <button class="delete-modal btn btn-danger"
                                data-id="{{$item->id}}" data-name="{{$item->stock_no}}">
                            <span class="glyphicon glyphicon-trash"></span> Delete
                        </button></td>
                </tr>
            @endforeach
        </table>
        </div>
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
                        <label class="control-label col-sm-2" for="stock_no">Stock No:</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="n">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="stock_name">Stock Name:</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="cid">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="sup_id">Supplier ID:</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="gid" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="sup_name">Supplier Name:</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="uid">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="received_date">Received date:</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="pid">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="return_date">Return date:</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="lid">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="stock_amount">Stock Amount:</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="mid">
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
                <h3 class="modal-tit" id="myModalLabel">StockReturn</h3>
            </div>
            <div class="modal-body">
                <form id="frmProducts" name="frmProducts" class="form-horizontal" novalidate="">
                    <div class="form-group row add">
                        <label class="control-label col-sm-2" >Stock No:</label>
                        <div class="col-sm-10">

                            <input type="text" class="form-control" id="stock_no" name="stock_no"
                                   placeholder="Enter stock no" required>
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                    <div class="form-group row add">
                        <label class="control-label col-sm-2" >Stock Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="stock_name" name="stock_name"
                                   placeholder="Enter stock name" required>
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
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
                        <label class="control-label col-sm-2" >Received date:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="received_date" name="received_date"
                                   placeholder="Enter received date" required>
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group row add">
                        <label class="control-label col-sm-2" >Return date:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="return_date" name="return_date"
                                   placeholder="Enter return date" required>
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group row add">
                        <label class="control-label col-sm-2" >Stock Amount:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="stock_amount" name="stock_amount"
                                   placeholder="Enter stock amount" required>
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
<script src="{{ asset('js/stockreturn.js') }}"></script>
</body>
</html>


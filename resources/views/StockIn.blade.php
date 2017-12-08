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

    <title>Stock management System-Stock in table</title>

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
    <h3>STOCK IN TABLE</h3><br>
    <button id="btn_add" name="btn_add" class="button button2 pull-right" >Add New Stock</button>
    {{ csrf_field() }}
    <div class="table-responsive text-center">
        <div id="table-scroll">
        <table class="table table-borderless" id="table">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Order Number</th>
                <th class="text-center">Supplier Id</th>
                <th class="text-center">Order Date</th>
                <th class="text-center">Stock Number </th>
                <th class="text-center">Stock Name </th>
                <th class="text-center">Stock unit </th>
                <th class="text-center">Stock Amount</th>
            </tr>
            </thead>
            @foreach($data as $item)
                <tr class="item{{$item->id}}">
                    <td>{{$item->id}}</td>
                    <td>{{$item->order_no}}</td>
                    <td>{{$item->sup_id}}</td>
                    <td>{{$item->order_date}}</td>
                    <td>{{$item->stock_no}}</td>
                    <td>{{$item->stock_name}}</td>
                    <td>{{$item->stock_unit}}</td>
                    <td>{{$item->stock_amount}}</td>


                </tr>
            @endforeach

        </table>
        </div>
    </div>
</div>

<div class="modal fade" id="bt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h3 class="modal-tit" id="myModalLabel">StockIN</h3>
            </div>
            <div class="modal-body">
                <form id="frmProducts" name="frmProducts" class="form-horizontal" novalidate="">
                    <div class="form-group row add">
                        <label class="control-label col-sm-2" > Order Number:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="order_no" name="order_no"
                                   placeholder="Enter supplier name" required>
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                    <div class="form-group row add">
                        <label class="control-label col-sm-2" >Suppplier ID:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="sup_id" name="sup_id"
                                   placeholder="Enter address" required>
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group row add">
                        <label class="control-label col-sm-2" >Order Date:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="order_date" name="order_date"
                                   placeholder="Enter contact number" required>
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                    <div class="form-group row add">
                        <label class="control-label col-sm-2" >stock Number:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="stock_no" name="stock_no"
                                   placeholder="Enter contact number" required>
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                    <div class="form-group row add">
                        <label class="control-label col-sm-2" >stock Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="stock_name" name="stock_name"
                                   placeholder="Enter contact number" required>
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                    </div>



                    <div class="form-group row add">
                        <label class="control-label col-sm-2" >stock Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="stock_unit" name="stock_unit"
                                   placeholder="Enter contact number" required>
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group row add">
                        <label class="control-label col-sm-2" >Stock Amount:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="stock_amount" name="stock_amount"
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
<script src="{{ asset('js/stockIn.js') }}"></script>
</body>
</html>


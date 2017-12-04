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
    {{--<link rel="stylesheet" href="{{ asset('css/master.css') }}">--}}
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
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
    <div class="form-group row add">
        <div class="col-md-8">
            <input type="text" class="form-control" id="name" name="name"
                   placeholder="Enter some name" required>
            <p class="error text-center alert alert-danger hidden"></p>
        </div>
        <div class="col-md-4">
            <button class="btn btn-primary" type="submit" id="add">
                {{--<span class="glyphicon glyphicon-plus"></span> ADD--}}
            </button>
        </div>
    </div>
    {{ csrf_field() }}


    <select class="form-control" name="name" id="name" data-parsely-required="true">
    <option value="">---select--</option>

    @foreach($data as $item)
        <option value="{{$item->name}}">{{$item->name}}</option>
        @endforeach
        </select>

    <div class="table-responsive text-center">
        <table class="table table-borderless" id="table">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Name</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <label for="name">Name</label>

            @foreach($data as $item)
                <tr class="item{{$item->id}}">
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td><button class="edit-modal btn btn-info" data-id="{{$item->id}}"
                                data-name="{{$item->name}}">
                            {{--<span class="glyphicon glyphicon-edit"></span> Edit--}}
                        </button>
                        <button class="delete-modal btn btn-danger"
                                data-id="{{$item->id}}" data-name="{{$item->name}}">
                            {{--<span class="glyphicon glyphicon-trash"></span> Delete--}}
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
                        <label class="control-label col-sm-2" for="name">Name:</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="n">
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
    <script language="JavaScript" type="text/javascript" >
        $("#add").click(function() {

            $.ajax({
                type: 'post',
                url: '/addItem',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'name': $('input[name=name]').val()
                },
                success: function(data) {
                    if ((data.errors)) {
                        $('.error').removeClass('hidden');
                        $('.error').text(data.errors.name);
                    } else {
                        $('.error').remove();
                        $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                    }
                },
            });
            $('#name').val('');
        });
    </script>
    {{--<script src="{{ asset('js/app.js') }}"></script>--}}
    {{--<script src="{{ asset('js/script.js') }}"></script>--}}
</body>
</html>
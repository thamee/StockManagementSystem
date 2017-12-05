<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\stock;
use Validator;
use Response;

class stockController extends Controller
{
    public function stock(Request $req)
    {
        $data = stock::all();

        return view('Stock')->withData($data);
    }
}

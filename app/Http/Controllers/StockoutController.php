<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\stock_out;
use App\stock;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;


class StockoutController extends Controller
{
    public function addStockout(Request $request)
    {
        $rules = array(
            'stock_no' => 'required|alpha_num',
            'stock_name' => 'required|alpha_num',
            'date' => 'required|alpha_num',
            'stock_amount' => 'required|alpha_num',
            'stock_unit' => 'required|alpha_num',
//            'stock_unit' => 'required|alpha_num',
//            'stock_amount' => 'required|alpha_num',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(

                'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $data = new stock_out();
            $st = new stock();
            $data->stock_no = $request->stock_no;
            $data->stock_name = $request->stock_name;
            $data->date = $request->date;
            $data->stock_amount = $request->stock_amount;
            $data->stock_unit = $request->stock_unit;
//            $data->stock_unit = $request->stock_unit;
//            $data->stock_amount = $request->stock_amount;
            $data->save();


            return response()->json($data);
        }
    }
    public function stockout(Request $req)
    {
        $data = stock_out::all();

        return view('Stockout')->withData($data);
    }
}

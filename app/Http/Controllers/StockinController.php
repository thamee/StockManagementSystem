<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Auth;
use View;
use App\stock_in;
use App\stock;
use App\units;
use Validator;
use Response;

use Illuminate\Support\Facades\Input;


class StockinController extends Controller
{
    private $var;
    public function addStockin(Request $request)
    {

        $rules = array(
            'order_no' => 'required|alpha_num',
            'sup_id' => 'required|alpha_num',
            'order_date' => 'required|alpha_num',
            'stock_no' => 'required|alpha_num',
            'stock_name' => 'required|alpha_num',
            'stock_unit' => 'required',
            'stock_amount' => 'required|alpha_num',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(

                'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $data = new stock_in();
            $data->order_no = $request->order_no;
            $data->sup_id = $request->sup_id;
            $data->order_date = $request->order_date;
            $data->stock_no = $request->stock_no;
//            $tag->stock_no = $request->stock_no;
//            $tag->stock_amount = $request->stock_amount;


            $data->stock_name = $request->stock_name;
           // $data->stock_unit = implode(',', Input::get('tsubject'));

            $data->stock_amount = $request->stock_amount;
            //$data->stock_unit = implode(',', Input::get('tsubject'));
           $data->stock_unit = $request->stock_unit;
            $data->save();
            $stockNo= stock::all();

            foreach ($stockNo as $st) {
                if ($st->stock_no == $data->stock_no) {
                    if($data->stock_unit=='g')
                    {
                        $val=(($data->stock_amount)/1000);
                    }
                    $st->stock_amount=($st->stock_amount+$val);
//                    $st->stock_amount = $request->stock_amount;
                    $st->save();
                }
            }

//            $tag->save();



            return response()->json($data);
        }
    }
    public function stockin(Request $req)
    {
        $data = stock_in::all();
        //$unit=units::all();

        return view('StockIn')->withData($data);


    }


}

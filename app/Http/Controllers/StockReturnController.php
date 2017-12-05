<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\stockreturn;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
class StockReturnController extends Controller
{
    public function stockadd(Request $request)
    {
        $rules = array(
            'stock_no' => 'required|alpha_num',
            'stock_name' => 'required|alpha_num',
            'sup_id' => 'required|alpha_num',
            'sup_name' => 'required|alpha_num',
            'received_date' => 'required|alpha_num',
            'return_date' => 'required|alpha_num',
            'stock_amount' => 'required|alpha_num',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(

                'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $data = new stockreturn();
            $data->stock_no = $request->stock_no;
            $data->stock_name = $request->stock_name;
            $data->sup_id = $request->sup_id;
            $data->sup_name = $request->sup_name;
            $data->received_date = $request->received_date;
            $data->return_date = $request->return_date;
            $data->stock_amount = $request->stock_amount;
            $data->save();

            return response()->json($data);
        }
    }
    public function readItems(Request $req)
    {
        $data = stockreturn::all();

        return view('stockreturn')->withData($data);
    }
    public function stockedit(Request $req)
    {
        $data = stockreturn::find($req->id);
        $data->stock_no = $req->stock_no;
        $data->stock_name = $req->stock_name;
        $data->sup_id = $req->sup_id;
        $data->sup_name = $req->sup_name;
        $data->received_date = $req->received_date;
        $data->return_date = $req->return_date;
        $data->stock_amount = $req->stock_amount;
        $data->save();

        return response()->json($data);
    }
    public function stockdelete(Request $req)
    {
        stockreturn::find($req->id)->delete();

        return response()->json();
    }
}

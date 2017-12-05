<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\wastage;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
class WastageController extends Controller
{
    public function wasadd(Request $request)
    {
        $rules = array(
            'stock_no' => 'required|alpha_num',
            'stock_name' => 'required|alpha_num',
            'stock_unit' => 'required|alpha_num',
            'amount_of_wastage' => 'required|alpha_num',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(

                'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $data = new wastage();
            $data->stock_no = $request->stock_no;
            $data->stock_name = $request->stock_name;
            $data->stock_unit = $request->stock_unit;
            $data->amount_of_wastage = $request->amount_of_wastage;
            $data->save();

            return response()->json($data);
        }
    }
    public function readItems(Request $req)
    {
        $data = wastage::all();

        return view('wastage')->withData($data);
    }
    public function wasedit(Request $req)
    {
        $data = wastage::find($req->id);
        $data->stock_no = $req->stock_no;
        $data->stock_name = $req->stock_name;
        $data->stock_unit = $req->stock_unit;
        $data->amount_of_wastage = $req->amount_of_wastage;
        $data->save();

        return response()->json($data);
    }
    public function wasdelete(Request $req)
    {
        wastage::find($req->id)->delete();

        return response()->json();
    }
}

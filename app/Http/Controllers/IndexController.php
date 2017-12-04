<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\data;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
class IndexController extends Controller
{
    public function addItem(Request $request)
    {
        $rules = array(
            'pro_name' => 'required|alpha_num',
            'pro_cat' => 'required|alpha_num',
            'pro_img' => 'required|alpha_num',
            'unit' => 'required|alpha_num',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(

                'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $data = new data();
            $data->pro_name = $request->pro_name;
            $data->pro_cat = $request->pro_cat;
            $data->pro_img = $request->pro_img;
            $data->unit = $request->unit;
            $data->save();

            return response()->json($data);
        }
    }
    public function readItems(Request $req)
    {
        $data = data::all();

        return view('welcome')->withData($data);
    }
    public function editItem(Request $req)
    {
        $data = data::find($req->id);
        $data->pro_name = $req->pro_name;
        $data->pro_cat = $req->pro_cat;
        $data->pro_img = $req->pro_img;
        $data->unit = $req->unit;
        $data->save();

        return response()->json($data);
    }
    public function deleteItem(Request $req)
    {
        Data::find($req->id)->delete();

        return response()->json();
    }
}

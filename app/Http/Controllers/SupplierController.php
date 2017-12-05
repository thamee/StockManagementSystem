<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\supplier;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
class SupplierController extends Controller
{
    public function supadd(Request $request)
    {
        $rules = array(
            'sup_id' => 'required|alpha_num',
            'sup_name' => 'required|alpha_num',
            'address' => 'required|alpha_num',
            'contact_no' => 'required|alpha_num',
            'email' => 'required|alpha_num',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(

                'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $data = new supplier();
            $data->sup_id = $request->sup_id;
            $data->sup_name = $request->sup_name;
            $data->address = $request->address;
            $data->contact_no = $request->contact_no;
            $data->email = $request->email;
            $data->save();

            return response()->json($data);
        }
    }
    public function readItems(Request $req)
    {
        $data = supplier::all();

        return view('supplier')->withData($data);
    }
    public function supedit(Request $req)
    {
        $data = supplier::find($req->id);
        $data->sup_id = $req->sup_id;
        $data->sup_name = $req->sup_name;
        $data->address = $req->address;
        $data->contact_no = $req->contact_no;
        $data->email = $req->email;
        $data->save();

        return response()->json($data);
    }
    public function supdelete(Request $req)
    {
        Supplier::find($req->id)->delete();

        return response()->json();
    }
}

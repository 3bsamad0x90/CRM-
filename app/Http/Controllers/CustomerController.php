<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Response;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::all();
        return response()->json(['status' => 'Success', 'data' => $customers]);
    }

    public function show($id){
        $customer = Customer::find($id);
        if(!$customer){
            return response()->json(['status' => 'Error'], Response::HTTP_NOT_FOUND);
        }else{
            return response()->json(['status' => 'Success', 'data' => $customer]);
        }
    }

    public function store(Request $request){
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->save();
        return response()->json(['status' => 'Success', 'data' => $customer]);

    }

    public function update(Request $request, $id){
        $customer = Customer::find($id);
        if(!$customer){
            return response()->json(['status' => 'Error'], Response::HTTP_NOT_FOUND);
        }else{
            $customer->name = $request->name;
            $customer->save();
            return response()->json(['status' => 'Success', 'data' => $customer]);
        }
    }

    public function destroy($id){
        $customer = Customer::find($id);
        if(!$customer){
            return response()->json(['status' => 'Error'], Response::HTTP_NOT_FOUND);
        }else{
            $customer->delete();
            return response()->json(['status' => 'Success', 'data' => $customer]);
        }
    }
}

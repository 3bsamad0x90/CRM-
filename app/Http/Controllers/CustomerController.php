<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Response;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
    public function index(){
        // $customers = Customer::all();
        $customers = Customer::with('notes')->get();
        // return response()->json(['status' => 'Success', 'data' => $customers]);
        // return response()->json(CustomerResource::collection($customers), Response::HTTP_OK);
        return CustomerResource::collection($customers);
    }

    public function show(Customer $customer){
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

    public function destroy(Customer $customer){
        if(!$customer){
            return response()->json(['status' => 'Error'], Response::HTTP_NOT_FOUND);
        }else{
            $customer->delete();
            return response()->json(['status' => 'Success', 'data' => $customer]);
        }
    }
}

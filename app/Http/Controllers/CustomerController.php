<?php

namespace App\Http\Controllers;

use App\Http\Requests\customers\CustomerStoreRequest;
use App\Http\Resources\CustomerResource;
use Crm\Customer\Models\Customer;
use Crm\Customer\Services\CustomerService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerController extends Controller
{
    private CustomerService $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index(Request $request)
    {
        // $customers = Customer::all();
        // $customers = Customer::with('notes')->get();
        // return response()->json(['status' => 'Success', 'data' => $customers]);
        // return response()->json(CustomerResource::collection($customers), Response::HTTP_OK);
        // return CustomerResource::collection($customers);
        // using service
        return  $this->customerService->index($request);
    }

    public function show(Customer $customer){
        return $this->customerService->show($customer);
    }

    public function store(CustomerStoreRequest $request){
        $customer = $request->validated();
        return $this->customerService->store($customer);
    }

    public function update(CustomerStoreRequest $request, Customer $customer){
        $data = $request->validated();
        return $this->customerService->update($data, $customer);
    }

    public function destroy(Customer $customer){
        if($this->customerService->delete($customer)){
            return response()->json(['status' => 'Success', 'message' => 'Deleted Successfully']);
        }
        return response()->json(['status' => 'Failed', 'message' => 'Failed to delete']);
    }
}

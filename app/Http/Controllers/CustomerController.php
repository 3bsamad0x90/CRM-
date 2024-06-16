<?php

namespace App\Http\Controllers;

use Crm\Customer\Models\Customer;
use Crm\Customer\Requests\CustomerStoreRequest;
use Crm\Customer\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private CustomerService $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index()
    {
        return  $this->customerService->index();
    }

    public function show(Customer $customer)
    {
        return $this->customerService->show($customer);
    }

    public function store(CustomerStoreRequest $request)
    {
        $customer = $request->validated();
        return $this->customerService->store($customer);
    }

    public function update(CustomerStoreRequest $request, Customer $customer)
    {
        $data = $request->validated();
        return $this->customerService->update($data, $customer);
    }

    public function destroy(Customer $customer)
    {
        return $this->customerService->delete($customer);
    }
}

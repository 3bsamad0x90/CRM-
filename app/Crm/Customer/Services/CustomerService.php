<?php

namespace Crm\Customer\Services;

use App\Http\Resources\CustomerResource;
use Crm\Base\Response\traitResponse;
use Crm\Customer\Models\Customer;

class CustomerService
{
    use traitResponse;

    public function index($request)
    {
        $customers = Customer::with('notes')->get();
        return $this->successfully('Success', [
            'customers' => CustomerResource::collection($customers)
        ]);
    }

    public function show($customer)
    {
        return $this->successfully('Success', [
            'customer' => new CustomerResource($customer)
        ]);
    }

    public function store(array $data)
    {
        $customer = Customer::firstOrCreate($data);
        return $this->successfully('Created Successfully', [
            'customer' => new CustomerResource($customer)
        ]);
    }

    public function update($data, Customer $customer)
    {
        $customer->update($data);
        return $this->successfully('Updated Successfully', [
            'customer' => new CustomerResource($customer)
        ]);
    }

    public function delete(Customer $customer): bool
    {
        return $customer->delete();
    }
}

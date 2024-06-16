<?php

namespace Crm\Customer\Services;

use Crm\Base\Response\traitResponse;
use Crm\Customer\Events\CustomerCreation;
use Crm\Customer\Models\Customer;
use Crm\Customer\Repositories\CustomerRepository;
use Crm\Customer\Resources\CustomerResource;

class CustomerService
{
    use traitResponse;
    private CustomerRepository $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index()
    {
        $customers = $this->customerRepository->index();
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

        event(new CustomerCreation($customer));

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

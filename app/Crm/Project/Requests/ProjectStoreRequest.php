<?php

namespace Crm\Project\Requests;

use Crm\Base\Requests\ApiRequest;

class ProjectStoreRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'project_name' => ['required', 'string', 'max:255'],
            'status' => ['required', 'boolean'],
            'project_cost' => ['required', 'numeric'],
            'customer_id' => ['required', 'exists:customers,id'],
        ];
    }
}

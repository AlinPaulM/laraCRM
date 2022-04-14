<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $id = $this->route('employee')->id;

        return [
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'email' => ['email', 'nullable', Rule::unique('employees')->ignore($id)],
            'phone' => ['string', 'max:20', 'nullable', Rule::unique('employees')->ignore($id)]
        ];
    }
}

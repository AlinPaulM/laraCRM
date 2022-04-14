<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCompanyRequest extends FormRequest
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
        // see https://laravel.com/docs/9.x/validation#rule-unique Forcing A Unique Rule To Ignore A Given ID:
        
        $id = $this->route('company')->id;

        return [
            'name' => 'required|max:100',
            'email' => ['email', 'nullable', Rule::unique('companies')->ignore($id)],
            'website' => ['url', 'nullable', Rule::unique('companies')->ignore($id)],
            'logo' => 'file|image|dimensions:min_width=100,min_height=100'
        ];
    }
}

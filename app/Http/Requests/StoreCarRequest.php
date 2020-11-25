<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
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
        return [
            'visitor_surname' => 'required|alpha',
            'visitor_name' => 'required',
            'visitor_patronymic' => 'required',
            'visitor_phone' => 'required',
            'visitor_firm' => 'required',
            'visitor_category' => 'required',
            'visitor_security' => 'required',
            'visitor_employee_surname' => 'required',
            'visitor_employee_name' => 'required',
            'visitor_employee_patronymic' => 'required',
        ];
    }
}

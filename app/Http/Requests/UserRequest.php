<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\FiveCharacters;

class UserRequest extends FormRequest
{
    protected $rules = [
        'name'             => 'required|min:2|max:50',
        'surname'          => 'required|min:2|max:50',
        'mobile'           => 'required|min:10|numeric',
        //'email'            => 'required|email|unique:users'
    ];

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
        switch ($this->method()) {
            case 'POST':
                return $this->getPostRules();
            case 'PUT':
                return $this->getPutRules();
            default:
                return $this->rules;
        }
    }

    public function messages()
    {
         return [
             'name.required' => 'Name is required',
             'name.max' => 'Name should not be greater than 50 characters.'
        ];
    }

    private function getPostRules()
    {
        $rules = $this->rules;
        //Change for Update (POST Method)
        $rules['email']         = 'required|email|unique:users';
        $rules['password']         = 'required|min:6|max:20';
        $rules['confirm_password'] = 'required|min:6|max:20|same:password';

        return $rules;
    }

    private function getPutRules()
    {
        $rules = $this->rules;
        //Change for Update (PUT Method)
        //$rules['name']  =  'required|min:1';
        $rules['name'] =  ['required', new FiveCharacters($this->name)];

        return $rules;
    }
}

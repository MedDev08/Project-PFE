<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
        $rules= [
            'phone'=>'required',
            'location'=>'required',
            'description'=>'required|min:50'
        ];
        if($this->route()->getActionMethod()==='store'){
            $rules['img']='required';
            $rules['name']=['required',Rule::unique('companies','name')];
        }
        elseif ($this->route()->getActionMethod()==='update') {
            $rules['name']='required';
        }
        return $rules;
    }
}

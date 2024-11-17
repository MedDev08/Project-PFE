<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicesRequest extends FormRequest
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
            'name'=>'required|min:5',
            'description'=>'required|min:50'
        ];
        if($this->route()->getActionMethod()==='store'){
            $rules['img']='required';
        }
        return $rules;
    }
}

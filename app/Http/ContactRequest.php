<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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


            'idParalax'=> 'required|min:5|max:6',
            'name' => 'required|min:3|max:255',
            'fixedSalary' => 'required|min:3|max:6',
            'idPost' => 'required',
            'idOffice' => 'required'

        ];
    }

    public function attributes(){
        return[
            'name'=>'Имя'
        ];
    }

    public function messages(){
        return[
            'idParalax.required'=>'Введите id Paralax',
            'name.required'=>'Введите Имя',
            'fixedSalary.required'=>'Введите Зарплату',
            'idPost.required'=>'Выберите Должность',
            'idOffice.required'=>'Выберите Офис'
        ];
    }
}

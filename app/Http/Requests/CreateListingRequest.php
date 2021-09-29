<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateListingRequest extends FormRequest
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
            //
            'title'=>'required',
            'description'=>'required',
            'skill_required'=>'required',
            'work_per_week'=>'required|integer|min:0',
            'platform'=>'max:200',
            'assets'=>'required'
        ];
    }
}

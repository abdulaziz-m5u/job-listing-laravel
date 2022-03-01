<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'title'        => ['required'],
            'company_id'   => ['required','integer'],
            'location_id'  => ['required','integer'],
            'categories.*' => ['integer'],
            'categories'   => ['array'],
            'salary'       => ['required'],
            'short_description' => 'max:1000',
            'full_description' => 'max:1000',
            'requirements' => 'max:1000',
            'job_nature' => 'max:255',
            'address' => 'max:1000',
            'salary' => 'numeric',
            'top_rated' => 'boolean',
        ];
    }
}

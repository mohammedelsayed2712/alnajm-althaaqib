<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CVRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'country_id' => 'required|exists:countries,id',
            'job_id' => 'required|exists:jobs,id',
            'religion_id' => 'required|exists:religions,id',
            'experience_id' => 'required|exists:experiences,id',
            'status_id' => 'required|exists:statuses,id',
            'salary' => 'required|numeric',
            'photo'=> 'required|mimes:jpeg,png,jpg,gif,pdf',
        ];
    }
}

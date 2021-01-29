<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use App\Exceptions\UnprocessableEntityException;

class TaskRequest extends FormRequest
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
            'name' => 'required|max:20',
            'content' => 'required|max:200',
            'expected_date' => 'required|date|date_format:Y-m-d',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $data = [
            'module' => 'task',
            'errorType' => 'TASK_PARAMETER_ERROR',
            'data' => [
                'errors' => $validator->errors()
            ]
        ];
        throw new UnprocessableEntityException($data);
    }
    
}

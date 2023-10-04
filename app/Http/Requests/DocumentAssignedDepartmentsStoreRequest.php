<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentAssignedDepartmentsStoreRequest extends FormRequest
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
            'department' => ['required','array','min:1'],
            'department.*' => ['required','exists:departments,id'],
            'attachments' => ['file','max: 50000'],
            'deadline' => ['required','date'],
            'supervisor_decision' => ['required','string']
        ];
    }
}

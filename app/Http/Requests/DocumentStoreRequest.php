<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentStoreRequest extends FormRequest
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
            "document_no" => ['required', 'numeric','min:1','max:1000000'],
            "title" => ['required','string','between:3,122'],
            "requested_from_to_source" => ['required','exists:requested_from_to_sources,id'],
            "startup_department" => ['nullable','string','between:3,122'],
            "details" => ['required','string','min:3'],
            "received_date" => ['required','date'],
            'attachments' => ['file','mimes:pdf,jpg,jpeg,png,docx,doc']
        ];
    }
}

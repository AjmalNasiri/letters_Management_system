<?php

namespace App\Http\Requests;

use App\Http\Controllers\ReportController;
use App\Models\Document;
use Illuminate\Foundation\Http\FormRequest;

class ReportPrintRequest extends FormRequest
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
            "reportType" => [
                'required', 'in:' .
                    ReportController::DAILY_REPORT . ',' .
                    ReportController::MONTLY_REPORT . ',' .
                    ReportController::QUARTERLY_REPORT . ',' .
                    ReportController::WEEKLY_REPORT . ',' .
                    ReportController::YEARLY_REPORT
            ],
            "startDate" => ['required', 'date'],
            "endDate" => ['required', 'date', 'after_or_equal:startDate'],
            'documentStatus' => [
                'required', 'in:' .
                    Document::NEW_DOCUMENT . ',' .
                    Document::COMPLETED_DOCUMENT . ',' .
                    Document::ARCHIVE_DOCUMENT . ',' .
                    Document::ON_GOING_DOCUMENT . ',' .
                    Document::REJECTED_DOCUMENT
            ]
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute ضروری ده',
            'in' => ':attribute شتون نه لری',
            'date' => ':attribute باید تاریخ وی',
            'after_or_equal' => ':attribute باید مساوی یا وروسته له :date نه وی'
        ];
    }

    public function attributes()
    {
        return [
            'reportType' => 'د راپور نوعیت',
            'startDate' => 'شروع نیټه',
            'endDate' => 'ختم نیټه',
            'documentStatus' => 'د مکتوب حالات'
        ];
    }
}

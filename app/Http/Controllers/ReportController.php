<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportPrintRequest;
use App\Models\Car;
use App\Models\CarCodr;
use App\Models\Document;
use App\View\Components\PrintComponent;
use App\View\Components\ShowReportComponent;
use Illuminate\Http\Request;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    const DAILY_REPORT = 1;
    const WEEKLY_REPORT = 2;
    const QUARTERLY_REPORT = 3;
    const MONTLY_REPORT = 4;
    const YEARLY_REPORT = 5;
    const DOWNLOAD_LOCATION = "public/pdf/";
    const FILE_STORAGE_LOCATION = "app/public/pdf/";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd("skdjfkldsjfkldsjfljfkljdskfjdskljd");
        return view('report.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function print(Request $request)
    {
        $mpdf = new \Mpdf\Mpdf(['mode' => 'UTF-8', 'format' => "A4-P", 'autoScriptToLang' => true, 'autoLangToFont' => true]);
        $mpdf->allow_charset_conversion = true;
        $mpdf->SetDirectionality('rtl');

        $reportType = $this->getReportTitle($request->reportType);

        if ($request->documentStatus == Document::NEW_DOCUMENT || $request->documentStatus == Document::ARCHIVE_DOCUMENT)
            $documents = Document::join('requested_from_to_sources as rfts', 'rfts.id', 'documents.requested_from_to_source_id')
                ->whereBetween('created_at', [$request->startDate, $request->endDate])->where('status', $request->documentStatus)->get();
        else
            $documents = Document::join('docment_assigned_departments as dad', 'dad.document_id', 'documents.id')
                ->join('requested_from_to_sources as rfts', 'rfts.id', 'documents.requested_from_to_source_id')
                ->whereBetween('documents.created_at', [$request->startDate, $request->endDate])->where('dad.status', $request->documentStatus)->get();
        //return view('test',compact("employee",'employees'));

        $printComponent = new PrintComponent($documents, $reportType);
        $mpdf->WriteHTML("");
        $mpdf->WriteHTML($printComponent->resolveView()->render());
        $mpdf->SetFont('freeserif', '', 10);
        $mpdf->Output("$reportType.pdf", 'I');

        // return response()->json(['success' => ],200);
    }

    private function getReportTitle($reportType)
    {
        switch ($reportType) {
            case 1:
                return 'راپور روزانه';
                break;

            case 2:
                return 'راپور هفته وار ';
                break;
            case 3:
                return 'راپور ربع وار وار ';
                break;
            case 4:
                return 'راپور ماهوار ';
                break;
            case 5:
                return 'راپور سالانه وار ';
                break;
            default:
                return 'نوعیت راپور بیدا نشد';
                break;
        }
    }

    public function show(ReportPrintRequest $request)
    {
        $reportType = $this->getReportTitle($request->reportType);

        if ($request->documentStatus == Document::NEW_DOCUMENT || $request->documentStatus == Document::ARCHIVE_DOCUMENT)
            $documents = Document::join('requested_from_to_sources as rfts', 'rfts.id', 'documents.requested_from_to_source_id')
                ->whereBetween('created_at', [$request->startDate, $request->endDate])->where('status', $request->documentStatus)->get();
        else
            $documents = Document::join('docment_assigned_departments as dad', 'dad.document_id', 'documents.id')
                ->join('requested_from_to_sources as rfts', 'rfts.id', 'documents.requested_from_to_source_id')
                ->whereBetween('documents.created_at', [$request->startDate, $request->endDate])->where('dad.status', $request->documentStatus)->get();

        $showReportComponent = new ShowReportComponent($documents, $reportType);

        return response()->json(['success' => $showReportComponent->resolveView()->render()]);
    }
}

<?php

namespace App\Http\Traits;

use App\Models\Car;
use App\Models\CarCodr;
use App\View\Components\OrderDocumentFirstPageComponent;
use App\View\Components\OrderUsedPartsFormComponent;
use App\View\Components\WorkOrderRequestFormComponent;
use Elibyy\TCPDF\Facades\TCPDF;
use Morilog\Jalali\Jalalian;

/**
 * print Order Trait
 */
trait PrintOrder
{
    public function printUsedPartsForm($carCoderId)
    {
        $carCodr = CarCodr::with(['relevantRepairingWorkshop.part'])->find($carCoderId);
        $workshops = CarCodr::with(['relevantRepairingWorkshop' => function ($query) {
            $query->with('workshop')->groupby('workshop_id');
        }])->find($carCoderId);

        $printUsedPartsComponents = new OrderUsedPartsFormComponent($carCodr, $workshops->relevantRepairingWorkshop);
        $view = $printUsedPartsComponents->resolveView()->render();
        $this->print('فورم درخواست قطعات', $view);
    }

    private function print($title, ...$views)
    {
        $pdf = new \Mpdf\Mpdf(['mode' => 'UTF-8', 'format' => 'A4-P', 'autoScriptToLang' => true, 'autoLangToFont' => true]);
        $pdf->SetDirectionality('rtl');
        $pdf->showImageErrors = true;
        $pdf->setFooter('{PAGENO}');
        if (!is_array($views[0])) {
            $pdf->WriteHTML($views[0]);
        } else {
            $sizeOfPages = count($views[0]);

            foreach ($views[0] as $key => $view) {
                $pdf->WriteHTML($view);
                if ($sizeOfPages - 1 === $key)
                    break;
                if (!empty($view))
                    $pdf->AddPage();
            }
        }
        $pdf->Output("$title.pdf", "I");
    }

    public function printOrderDocument($carCodrId)
    {
        $carCodr = CarCodr::with('car')->find($carCodrId);
        $this->carRepairingFinished($carCodr);


        $orderDocumentFirstPageComponent = new OrderDocumentFirstPageComponent($carCodr);
        $firstPage = $orderDocumentFirstPageComponent->resolveView()->render();

        $carCodr = CarCodr::with(['relevantRepairingWorkshop.part'])->find($carCodrId);
        $workshops = CarCodr::with(['relevantRepairingWorkshop' => function ($query) {
            $query->with('workshop')->groupby('workshop_id');
        }])->find($carCodrId);
        $usedPartsComponents = new OrderUsedPartsFormComponent($carCodr, $workshops->relevantRepairingWorkshop);
        $partPage = $usedPartsComponents->resolveView()->render();

        $carCodr = CarCodr::with([
            'qataaDistrict.qataa',
            'qataaDistrict.district.province', 'setHolder', 'driver', 'car',
            'reportedFaults', 'existingParts'
        ])->find($carCodrId);
        $workOrderRequestFormComponent = new WorkOrderRequestFormComponent($carCodr, true);
        $workOrderPage = $workOrderRequestFormComponent->resolveView()->render();
        $this->print('جاب کارت', [$firstPage, $partPage, $workOrderPage]);
    }

    public function workOrderRequestForm($carCodrId)
    {
        $carCodr = CarCodr::with([
            'qataaDistrict.qataa',
            'qataaDistrict.district.province', 'setHolder', 'driver', 'car',
            'reportedFaults', 'existingParts'
        ])->find($carCodrId);
        $workOrderRequestFormComponent = new WorkOrderRequestFormComponent($carCodr);
        $workOrderPage = $workOrderRequestFormComponent->resolveView()->render();
        $this->print('فورم درخواست درستور کار', ["", $workOrderPage]);
    }

    private function carRepairingFinished(&$carCodr)
    {
        $status = (bool) CarCodr::where('car_id', $carCodr->car_id)->where('status', Car::COMPLETE)->first();
        if ($carCodr->status != Car::COMPLETE || !$status) {
            $carCodr->exit_date = Jalalian::now()->format("Y-m-d");
            $carCodr->exit_time = now()->toTimeString();
            $carCodr->status = Car::COMPLETE;
            $carCodr->update();
        }
    }
}

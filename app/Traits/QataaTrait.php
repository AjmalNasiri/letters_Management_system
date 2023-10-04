<?php

namespace App\Http\Traits;

use App\Models\District;
use App\Models\QataasDistrict;
use App\View\Components\AddSearchResultToQataaTable;
use Illuminate\Http\Request;

/**
 * Trait for Qataa Search Results
 */
trait QataaTrait
{
    private $qataasDistricts;

    private function searchQataa(Request $request)
    {
        dd($request->all());
        if ($this->provinceNotNull($request->province) && $this->districtNotNull($request->district) && $this->qataaNotNull($request->qataa)) {
            $districts = District::where('province_id', $request->province)->where('id', $request->district)->pluck('id')->toArray();
            $this->qataasDistricts = QataasDistrict::with('qataa.districts.province')->where('qataa_id', $request->qataa)->whereIn('district_id', $districts)->paginate(7);
        } else if ($this->provinceNotNull($request->province) && $this->districtNotNull($request->district)) {
            $districts = District::where('province_id', $request->province)->where('id', $request->district)->pluck('id')->toArray();
            $this->qataasDistricts = QataasDistrict::with('qataa.districts.province')->whereIn('district_id', $districts)->paginate(7);
        } else if ($this->provinceNotNull($request->province)) {
            $districts = District::where('province_id', $request->province)->pluck('id')->toArray();
            $this->qataasDistricts = QataasDistrict::with('qataa.districts.province')->whereIn('district_id', $districts)->groupBy(['district_id'])->paginate(7);
        } else {
            $this->qataasDistricts = QataasDistrict::with('qataa.districts.province')->paginate(7);
        }

        return $this->addsearchResultToQataaTable($this->qataasDistricts);
    }

    private function provinceNotNull($province)
    {
        return ($province != "null" && $province != "انتخاب کنید");
    }

    private function qataaNotNull($qataa)
    {
        return ($qataa != "null" && $qataa != "انتخاب کنید");
    }

    private function districtNotNull($district)
    {
        return ($district != "null" && $district != "انتخاب کنید");
    }

    private function addsearchResultToQataaTable($result)
    {
        $searchResultComponent = new AddSearchResultToQataaTable($result);
        return $searchResultComponent->resolveView()->render();
    }
}

<?php

namespace App\Http\Traits;

use App\Models\CarCodr;

/**
 * car history search trait
 */
trait CarHistorySearchTrait
{
    private function returnCarHistorySearchData($request, $carId)
    {

        if ($this->isEntryDateNotNull($request->entryDate) && $this->isExitDateNotNull($request->exitDate) && $this->isDrNameNotNull($request->driverName)) {
            $driverName = $request->driverName;
            return CarCodr::whereHas('driver', function ($query) use ($driverName) {
                $query->where('name', $driverName);
            })->with([
                'qataaDistrict.qataa',
                'setHolder',
                'driver',
                'car'
            ])
                ->where('car_id', $carId)
                ->where('entry_date', $request->entryDate)
                ->where('exit_date', $request->exitDate)
                ->orderBy('status', 'DESC')
                ->paginate(6);
        }
        if ($this->isEntryDateNotNull($request->entryDate) && $this->isExitDateNotNull($request->exitDate)) {
            return CarCodr::with([
                'qataaDistrict.qataa',
                'setHolder',
                'driver',
                'car'
            ])
                ->where('car_id', $carId)
                ->where('entry_date', $request->entryDate)
                ->where('exit_date', $request->exitDate)
                ->orderBy('status', 'DESC')
                ->paginate(6);
        }
        if ($this->isDrNameNotNull($request->driverName)) {
            $driverName = $request->driverName;
            return CarCodr::whereHas('driver', function ($query) use ($driverName) {
                $query->where('name', $driverName);
            })->with([
                'qataaDistrict.qataa',
                'setHolder',
                'driver',
                'car'
            ])
                ->where('car_id', $carId)
                ->orderBy('status', 'DESC')
                ->paginate(6);
        }
        if ($this->isEntryDateNotNull($request->entryDate)) {
            return CarCodr::with([
                'qataaDistrict.qataa',
                'setHolder',
                'driver',
                'car'
            ])
                ->where('car_id', $carId)
                ->Where('entry_date', $request->entryDate)
                ->orderBy('status', 'DESC')
                ->paginate(6);
        }
        if ($this->isExitDateNotNull($request->exitDate)) {
            return CarCodr::with([
                'qataaDistrict.qataa',
                'setHolder',
                'driver',
                'car'
            ])
                ->where('car_id', $carId)
                ->where('exit_date', $request->exitDate)
                ->orderBy('status', 'DESC')
                ->paginate(6);
        }
        return CarCodr::with(['qataaDistrict.qataa', 'setHolder', 'driver', 'car'])->where('car_id', $carId)->orderBy('status', 'DESC')->paginate(6);
    }
}

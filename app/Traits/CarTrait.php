<?php

namespace App\Http\Traits;

use App\Http\Requests\CarRepairingTypeRequest;
use App\Models\Car;
use App\Models\CarCodr;
use App\Models\QataasDistrict;
use App\Models\SetHolderAndDriver;
use App\View\Components\searchCarCodr;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Morilog\Jalali\Jalalian;

/**
 * Trait for Car
 */
trait CarTrait
{
    public function changeServiceType(Request $request, $carCodrId)
    {
        DB::beginTransaction();
        try {
            $carCodr = CarCodr::find($carCodrId);
            $carCodr->service_type = $request->service_type;
            $carCodr->update();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
    private function carCodrInfoTable($carCodr)
    {
        return view('partialViews.carCodrInfoTable', compact('carCodr'))->render();
    }

    public function carRepairingType(CarRepairingTypeRequest $request, $carCodrId)
    {
        DB::beginTransaction();
        try {
            $carCodr = CarCodr::find($carCodrId);
            $carCodr->repair_type = $request->repairType;
            $carCodr->update();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return response()->json(route('print.order.document', Session::get('carCodrId')), Response::HTTP_OK);
    }

    public function storeCarCodrInfo($request)
    {
        DB::beginTransaction();
        try {
            $driver = false;
            // Driver Info
            if ($request->drName) $driver = $this->storeDriverInfo($request);

            // Set Holder Info
            $setHolder = $this->storeStoreSetHolderInfo($request);

            $car = $this->storeCarInfo($request);

            $districtsQataa = QataasDistrict::where('district_id', $request->district)->where('qataa_id', $request->qataa)->first();
            if (!$districtsQataa) return ValidationException::withMessages(['district' => 'ولسوالی درست نیست', 'qataa' => 'قطعه درست نیست']);

            $carCodr = CarCodr::create([
                'driver_id' => $driver != false ? $driver->id : null,
                'set_holder_id' => $setHolder->id,
                'car_id' => $car->id,
                'qataas_district_id' => $districtsQataa->id,
                'entry_date' => Jalalian::now()->format("Y-m-d"),
                'entry_time' => now()->toTimeString(),
                'status' => Car::NEW_ARRIVED,
                'currentKelometer' => $request->currentKM ?? null,
                'fuelPercentage' => $request->fuelPercentage ?? null
            ]);

            DB::commit();
        } catch (QueryException $e) {
            DB::rollBack();
            throw $e;
        }

        return $carCodr->id;
    }

    private function storeCarInfo($request): Car
    {
        return Car::create([
            'VINNumber' => $request->VIN,
            'palet' => $request->paletNumber ?? null,
            'name' => $request->vType,
            'model' => $request->model ?? null,
            'brand' => $request->make,
            'color' => $request->color,
            'engineNumber' => $request->engineNumber ?? null
        ]);
    }

    private function storeDriverInfo($request): SetHolderAndDriver
    {
        return SetHolderAndDriver::create([
            'name' => $request->drName,
            'contactNumber' => $request->drContact,
            'type' => SetHolderAndDriver::DRIVER
        ]);
    }

    private function storeStoreSetHolderInfo($request): SetHolderAndDriver
    {
        return SetHolderAndDriver::create([
            'name' => $request->shName,
            'contactNumber' => $request->shContact,
            'type' => SetHolderAndDriver::SET_HOLDER
        ]);
    }

    private function addCarCodrToInputs(CarCodr $carCodr)
    {
        return view('partialViews.addCarCodToInputs', compact('carCodr'))->render();
    }

    public function carCodrSearch(Request $request)
    {
        $carCodr = $this->returnSearchedCarCodrData($request);

        return response()->json(['success' => $this->addCarCodrToTable($carCodr)], Response::HTTP_OK);
    }

    private function returnSearchedCarCodrData(Request $request)
    {
        $carCodr = '';
        if ($this->isQataaNotNull($request->qataa) && $this->isDrNameNotNull($request->driverName) && $this->isSetHolderNameNotNull($request->setHolder) && $this->isVINNotNull($request->vin)) {
            $drivers = SetHolderAndDriver::where('name', $request->driverName)->where('type', SetHolderAndDriver::DRIVER)->pluck('id')->toArray();
            $setHolders = SetHolderAndDriver::where('name', $request->setHolder)->where('type', SetHolderAndDriver::SET_HOLDER)->pluck('id')->toArray();
            $car = Car::where('VIN', $request->vin)->first();
            $qataasDistrict = QataasDistrict::where('qataa_id', $request->qataa)->select('id')->pluck('id')->toArray();
            $carCodr = CarCodr::with(['QataasDistrict.qataa', 'setHolder', 'driver', 'car'])
                ->whereIn('qataas_district_id', $qataasDistrict)
                ->whereIn('driver_id', $drivers)
                ->whereIn('set_holder_id', $setHolders)
                ->where('VIN', $request->vin)
                ->groupBy('car_id')
                ->paginate(6);
        } else if ($this->isVINNotNull($request->vin)) {
            $cars = Car::where('VINNumber', $request->vin)->pluck('id')->toArray();
            $carCodr = CarCodr::with(['qataaDistrict.qataa', 'setHolder', 'driver', 'car'])
                ->whereIn('car_id', $cars)
                ->groupBy('car_id')
                ->paginate(6);
        } else if ($this->isDrNameNotNull($request->driverName)) {
            $drivers = SetHolderAndDriver::where('name', 'like', "%$request->driverName%")->where('type', SetHolderAndDriver::DRIVER)->pluck('id')->toArray();
            $carCodr = CarCodr::with(['qataaDistrict.qataa', 'setHolder', 'driver', 'car'])
                ->whereIn('driver_id', $drivers)
                ->groupBy('car_id')
                ->paginate(6);
        } else if ($this->isSetHolderNameNotNull($request->setHolder)) {
            $setHolders = SetHolderAndDriver::where('name', 'like', "%$request->setHolder%")->where('type', SetHolderAndDriver::SET_HOLDER)->pluck('id')->toArray();
            $carCodr = CarCodr::with(['qataaDistrict.qataa', 'setHolder', 'driver', 'car'])
                ->whereIn('set_holder_id', $setHolders)
                ->groupBy('car_id')
                ->paginate(6);
        } else if ($this->isQataaNotNull($request->qataa)) {
            $qataasDistrict = QataasDistrict::where('qataa_id', $request->qataa)->select('id')->pluck('id')->toArray();
            $carCodr = CarCodr::with(['qataaDistrict.qataa', 'setHolder', 'driver', 'car'])
                ->whereIn('qataas_district_id', $qataasDistrict)
                ->groupBy('car_id')
                ->paginate(6);
        } else {
            $carCodr =  CarCodr::with(['qataaDistrict.qataa', 'setHolder', 'driver', 'car'])->groupBy('car_id')->paginate(6);
        }

        return $carCodr;
    }

    private function addCarCodrToTable($carCodr)
    {
        $searchCarComponent = new searchCarCodr($carCodr);
        return $searchCarComponent->resolveView()->render();
    }

    private function isVINNotNull($VIN)
    {
        return ($VIN != null);
    }

    private function isDrNameNotNull($driver)
    {
        return ($driver != null);
    }

    private function isSetHolderNameNotNull($setHolder)
    {
        return ($setHolder != null);
    }

    private function isQataaNotNull($qataa)
    {
        return ($qataa != null && $qataa != 'انتخاب کنید');
    }

    private function isEntryDateNotNull($entryDate)
    {
        return ($entryDate != null);
    }

    private function isExitDateNotNull($exitDate)
    {
        return ($exitDate != null);
    }
}

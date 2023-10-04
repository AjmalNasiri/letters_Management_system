<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $totalCarInWorkshop = CarCodr::whereNull('exit_date')->count();
        // $totalCarsUnderRepairCars = CarCodr::where('status',Car::UNDER_REPAIR)->count();
        // $totalFinishingParts = Balance::where('qty','<',5)->count();
        // $totalCompletedRepairingCars = CarCodr::where('status', Car::COMPLETE)->count();
        // $totalAvailableParts = Balance::sum('qty');
        return view('index');
    }
}

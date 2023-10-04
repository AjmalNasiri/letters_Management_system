<?php

namespace App\Http\Traits\Stock;

use App\Models\Balance;

/**
 * trait for adding QTY to Balance
 */
trait StockQtyToBalanceTrait
{
    private function addQtyToBalance($partId, $qty)
    {
        $balance = Balance::where('part_id', $partId)->first();

        if ($balance) {
            $balance->qty += $qty;
            $balance->update();
        } else {
            $balance = Balance::create([
                'part_id' => $partId,
                'qty' => $qty
            ]);
        }
        // $stock = Stock::select('qty')->where('part_id', $partId)->where('action', Stock::ADDED)->get();
        // if ($stock->isNotEmpty()) {
        //     foreach ($stock as $key => $part) {
        //         $balance = $part->qty
        //     }
        // }
    }
}

?>
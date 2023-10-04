<?php

namespace App\Http\Traits\Stock;

use App\Models\Block;

/**
 * Trait for Adding Parts to Inputs
 */
trait StockPartToInputsTrait
{
    private function addStockPartToInputs($stock)
    {
        $blocks = Block::all();
        return view('stock.partialViews.addStockToInputs',compact('stock','blocks'))->render();
    }
}

?>
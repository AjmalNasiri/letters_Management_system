<?php

namespace App\Http\Traits;

use App\Models\Part;
use App\Models\PartBlock;
use App\Models\Stock;
use App\View\Components\StockComponent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * trait for Stock 
 */
trait StockTrait
{
    public function searchInStock(Request $request)
    {
        $stockData = $this->returnStockData($request);
        return response()->json(['success' => $this->addStockDataToTable($stockData)], Response::HTTP_OK);
    }

    private function addStockDataToTable($stockData){
        $stockComponent = new StockComponent($stockData);
        return $stockComponent->resolveView()->render();
    }

    private function returnStockData(Request $request)
    {
        $stocks = '';
        if ($this->isBlockIdNotNull($request->block) && $this->isPartNameNotNull($request->partName)) {
            $parts = Part::where('part_name', 'like', "%$request->partName%")->pluck('id')->toArray();
            $blocks = PartBlock::where('block_id',$request->block)->selectRaw('part_id as id')->pluck('id')->toArray();
            array_merge($parts,$blocks);
            $stocks = Stock::with('parts.balance', 'parts.blocks')
                ->whereIn('part_id', $parts)
                ->select('part_id')
                ->groupBy('part_id')
                ->paginate(10);
        } else if ($this->isBlockIdNotNull($request->block) ) {
            $parts = PartBlock::where('block_id',$request->block)->pluck('part_id')->toArray();
            $stocks = Stock::with('parts.balance', 'parts.blocks')->whereIn('part_id',$parts)->select('part_id')->groupBy('part_id')->paginate(10);
        } else if ($this->isPartNameNotNull($request->partName)) {
            $parts = Part::where('part_name', 'like', "%$request->partName%")->pluck('id')->toArray();
            $stocks = Stock::with('parts.balance', 'parts.blocks')->whereIn('part_id', $parts)->select('part_id')->groupBy('part_id')->paginate(10);
        } else {
            $stocks = Stock::with('parts.balance', 'parts.blocks')->select('part_id')->groupBy('part_id')->paginate(10);
        }
        return $stocks;
    }

    private function isPartNameNotNull($partName)
    {
        return ($partName != null);
    }

    private function isBlockIdNotNull($blockId)
    {
        return ($blockId != null && $blockId != "انتخاب کنید");
    }
}

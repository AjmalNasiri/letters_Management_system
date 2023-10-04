<?php

namespace App\Http\Traits;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Correcting Actions Traits
 */
trait CorrectingActionsRulesTrait
{
    private function correctingActionRules()
    {
        return [
            'correctingAction' => ['required', 'array', 'min:1'],
            'correctingAction.*' => ['required', 'string', 'min:5']
        ];
    }

    private function correctingActionCustomMessages()
    {
        return [
            'required' => ':attribute ضروری میباشد',
            'min' => ':attribute باید از :min حرف کم نباشد'
        ];
    }

    private function correctingActionCustomAttributes()
    {
        return [
            'correctingAction' => 'عملکرد اصلاحی',
            'correctingAction.*' => 'عملکرد اصلاحی',
        ];
    }

    private function storeCorrectingActions(Request $request)
    {
        try {
            DB::beginTransaction();

            $correctingActions = $request->all()['correctingAction'];
            foreach ($correctingActions as $key => $correctingAction) {
                if (empty($correctingAction)) continue;

                $this->update($correctingAction, $key);
            }

            DB::commit();
        } catch (QueryException $e) {
            DB::rollBack();
            throw $e;
        }
    }
}

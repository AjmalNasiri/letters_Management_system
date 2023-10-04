<?php

namespace App\Http\Traits;

use App\View\Components\ExistingItems;

/**
 * Traits for Existing Items
 */
trait ExistingItemsTrait
{
    private function existingItemsInCar($existingParts)
    {
        $existingPartsArray  = $existingParts->pluck('part_name')->toArray();
        $allExistingPartsArray = array('Jack', 'Jack Handle', 'Fire Extinguisher', 'Fuel Tank', 'Spare Tire', 'Tool Kit', 'Spare Wheel Handle', 'Tow Bar', 'Codon', 'Metrola');
        $differenceArray = array_diff($allExistingPartsArray, $existingPartsArray);

        $existingItem = new ExistingItems($existingParts,$differenceArray);

        return $existingItem->resolveView()->render();
    }

    private static function existsParts($existingPart, &$rowNumber)
    {
        switch ($existingPart->part_name) {
            case 'Jack':
                return '<tr>
                        <td>
                            <input type="checkbox" checked=true class="form-control">
                        </td>
                        <td>
                            <input type="number" name="qty[' . $existingPart->part_name . ']" value="' . $existingPart->qty . '" class="form-control">
                        </td>
                        <td>Jack</td>
                        <td>' . $rowNumber++ . '</td>
                    </tr>';
                break;
            case 'Jack Handle':
                return '<tr>
                        <td>
                        <input type="checkbox" checked=true class="form-control">
                        </td>
                        <td>
                        <input type="number" name="qty[' . $existingPart->part_name . ']" value="' . $existingPart->qty . '" class="form-control">
                        </td>
                        <td>Jack Handle</td>
                        <td>' . $rowNumber++ . '</td>
                    </tr>';
                break;
            case 'Fire Extinguisher':
                return '<tr>
                        <td>
                            <input type="checkbox" checked=true class="form-control">
                        </td>
                        <td>
                            <input type="number" name="qty[' . $existingPart->part_name . ']" value="' . $existingPart->qty . '" class="form-control">
                        </td>
                        <td>Fire Extinguisher</td>
                        <td>' . $rowNumber++ . '</td>
                    </tr>';
                break;
            case 'Fuel Tank':
                return '<tr>
                        <td>
                        <input type="checkbox" checked=true class="form-control">
                        </td>
                        <td>
                        <input type="number" name="qty[' . $existingPart->part_name . ']" value="' . $existingPart->qty . '" class="form-control">
                        </td>
                        <td>Fuel Tank</td>
                        <td>' . $rowNumber++ . '</td>
                    </tr>';
                break;
            case 'Spare Tire':
                return '<tr>
                        <td>
                            <input type="checkbox" checked=true class="form-control">
                        </td>
                        <td>
                            <input type="number" name="qty[' . $existingPart->part_name . ']" value="' . $existingPart->qty . '" class="form-control">
                        </td>
                        <td>Spare Tire</td>
                        <td>' . $rowNumber++ . '</td>
                </tr>';
                break;
            case 'Tool Kit':
                return '<tr>
                        <td>
                        <input type="checkbox" checked=true class="form-control">
                        </td>
                        <td>
                        <input type="number" name="qty[' . $existingPart->part_name . ']" value="' . $existingPart->qty . '" class="form-control">
                        </td>
                        <td>Tool Kit</td>
                        <td>' . $rowNumber++ . '</td>
                    </tr>';
                break;
            case 'Spare Wheel Handle':
                return '<tr>
                        <td>
                            <input type="checkbox" checked=true class="form-control">
                        </td>
                        <td>
                            <input type="number" name="qty[' . $existingPart->part_name . ']" value="' . $existingPart->qty . '" class="form-control">
                        </td>
                        <td>Spare Wheel Handle</td>
                        <td>' . $rowNumber++ . '</td>
                    </tr>';
                break;
            case 'Tow Bar':
                return '<tr>
                        <td>
                        <input type="checkbox" checked=true class="form-control">
                        </td>
                        <td>
                        <input type="number" name="qty[' . $existingPart->part_name . ']" value="' . $existingPart->qty . '" class="form-control">
                        </td>
                        <td>Tow Bar</td>
                        <td>' . $rowNumber++ . '</td>
                    </tr>';
                break;
            case 'Codon':
                return '<tr>
                        <td>
                            <input type="checkbox" checked=true class="form-control">
                        </td>
                        <td>
                            <input type="number" name="qty[' . $existingPart->part_name . ']" value="' . $existingPart->qty . '" class="form-control">
                        </td>
                        <td>Codon</td>
                        <td>' . $rowNumber++ . '</td>
                    </tr>';
                break;
            case 'Metrola':
                return '<tr>
                        <td>
                        <input type="checkbox" checked=true class="form-control">
                        </td>
                        <td>
                        <input type="number" name="qty[' . $existingPart->part_name . ']" value="' . $existingPart->qty . '" class="form-control">
                        </td>
                        <td>Metrola</td>
                        <td>' . $rowNumber++ . '</td>
                    </tr>';
                break;
            default:
                break;
        }
    }

    private static function notExistingParts($partName, &$rowNumber)
    {
        switch ($partName) {
            case 'Jack':
                return '<tr>
                        <td>
                            <input type="checkbox" class="form-control">
                        </td>
                        <td>
                        <input type="number" class="form-control">
                        </td>
                        <td>Jack</td>
                        <td>' . $rowNumber++ . '</td>
                    </tr>';
                break;
            case 'Jack Handle':
                return '<tr>
                        <td>
                        <input type="checkbox"  class="form-control">
                        </td>
                        <td>
                        <input type="number" class="form-control">
                        </td>
                        <td>Jack Handle</td>
                        <td>' . $rowNumber++ . '</td>
                    </tr>';
                break;
            case 'Fire Extinguisher':
                return '<tr>
                        <td>
                            <input type="checkbox"  class="form-control">
                        </td>
                        <td>
                        <input type="number" class="form-control">
                        </td>
                        <td>Fire Extinguisher</td>
                        <td>' . $rowNumber++ . '</td>
                    </tr>';
                break;
            case 'Fuel Tank':
                return '<tr>
                        <td>
                        <input type="checkbox"  class="form-control">
                        </td>
                        <td>
                        <input type="number" class="form-control">
                        </td>
                        <td>Fuel Tank</td>
                        <td>' . $rowNumber++ . '</td>
                    </tr>';
                break;
            case 'Spare Tire':
                return '<tr>
                        <td>
                            <input type="checkbox"  class="form-control">
                        </td>
                        <td>
                        <input type="number" class="form-control">
                        </td>
                        <td>Spare Tire</td>
                        <td>' . $rowNumber++ . '</td>
                </tr>';
                break;
            case 'Tool Kit':
                return '<tr>
                        <td>
                        <input type="checkbox"  class="form-control">
                        </td>
                        <td>
                        <input type="number" class="form-control">
                        </td>
                        <td>Tool Kit</td>
                        <td>' . $rowNumber++ . '</td>
                    </tr>';
                break;
            case 'Spare Wheel Handle':
                return '<tr>
                        <td>
                            <input type="checkbox"  class="form-control">
                        </td>
                        <td>
                        <input type="number" class="form-control">
                        </td>
                        <td>Spare Wheel Handle</td>
                        <td>' . $rowNumber++ . '</td>
                    </tr>';
                break;
            case 'Tow Bar':
                return '<tr>
                        <td>
                        <input type="checkbox"  class="form-control">
                        </td>
                        <td>
                        <input type="number" class="form-control">
                        </td>
                        <td>Tow Bar</td>
                        <td>' . $rowNumber++ . '</td>
                    </tr>';
                break;
            case 'Codon':
                return '<tr>
                        <td>
                            <input type="checkbox"  class="form-control">
                        </td>
                        <td>
                            <input type="number" class="form-control">
                        </td>
                        <td>Codon</td>
                        <td>' . $rowNumber++ . '</td>
                    </tr>';
                break;
            case 'Metrola':
                return '<tr>
                        <td>
                        <input type="checkbox"  class="form-control">
                        </td>
                        <td>
                        <input type="number" class="form-control">
                        </td>
                        <td>Metrola</td>
                        <td>' . $rowNumber++ . '</td>
                    </tr>';
                break;
            default:
                break;
        }
    }
}

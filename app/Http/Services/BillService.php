<?php

namespace App\Http\Services;

use App\Interfaces\BillServiceInterface;

class BillService implements BillServiceInterface {

    public function calculateBill($units): string
    {
        $units80_price=0;
        $units80_280_price=0;
        $units280_480_price=0;
        $units480_up_price=0;

        list($units80_price, $units80_280_price, $units280_480_price, $units480_up_price) = $this->calculateUnitRangeBill($units, $units80_price, $units80_280_price, $units280_480_price, $units480_up_price);
        $total=number_format($units80_price+$units80_280_price+$units280_480_price+$units480_up_price,2);
        return $total;
    }


    /**
     * @param $units
     * @param float $units80_price
     * @param float $units80_280_price
     * @param float $units280_480_price
     * @param float $units480_up_price
     * @return float[]
     */
    private function calculateUnitRangeBill($units, float $units80_price, float $units80_280_price, float $units280_480_price, float $units480_up_price): array
    {
        foreach (range(1, $units) as $unit) {
            if ($unit <= 80) {
                $units80_price = ($unit * 2.50);
            }
            if ($unit > 80 && $unit <= 280) {
                $units80_280_price = (($unit-80) * 6.00);
            }
            if ($unit > 280 && $unit <= 480) {
                $units280_480_price = (($unit-280) * 7.20);
            }
            if ($unit > 480) {
                $units480_up_price = (($unit-480) * 8.50);
            }

        }
        return array($units80_price, $units80_280_price, $units280_480_price, $units480_up_price);
    }
}

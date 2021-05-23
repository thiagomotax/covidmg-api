<?php

namespace App\Classes;

use App\Models\CaseReport;
use App\Models\VaccineReport;
use App\Models\BedReport;

class MorphRelation
{
    const CASE_REPORT = 'cases';
    const VACCINE_REPORT = 'vaccines';
    const BED_REPORT = 'beds';

    /**
     * @return array
     */
    public static function morphMap(): array
    {
        return [
            self::CASE_REPORT => CaseReport::class,
            self::VACCINE_REPORT => VaccineReport::class,
            self::BED_REPORT => BedReport::class,
        ];
    }
}


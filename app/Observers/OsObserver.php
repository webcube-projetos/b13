<?php

namespace App\Observers;

use App\Models\Financial;
use App\Models\FinancialEntry;
use App\Models\FinancialItem;
use App\Models\OS;
use App\Models\OsExecution;
use App\Traits\FinancialTrait;
use Carbon\Carbon;

class OsObserver
{
    use FinancialTrait;

    public function created(OS $Os) {}

    public function updated(OS $Os)
    {
        if ($Os->isDirty('id_payment_method')) {
            $Os->financialEntries()->delete();
            $this->generateFinancialEntries($Os->id);
        }
    }
}

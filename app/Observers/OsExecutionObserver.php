<?php

namespace App\Observers;

use App\Models\OsExecution;
use Carbon\Carbon;

class OsExecutionObserver
{
    public function created(OsExecution $osExecution)
    {
        $this->recalculateDays($osExecution->motorista->id_os);
    }

    public function updated(OsExecution $osExecution)
    {
        if ($osExecution->isDirty('date')) {
            $this->recalculateDays($osExecution->motorista->id_os);
        }
    }

    public function deleted(OsExecution $osExecution)
    {
        $this->recalculateDays($osExecution->motorista->id_os);
    }

    private function recalculateDays($idOs)
    {
        // Buscar execuções ordenadas pela data e relacionadas à OS
        $executions = OsExecution::whereRelation('motorista', 'id_os', $idOs)
            ->orderBy('date')
            ->get();

        $currentDay = 0;
        $previousDate = null;

        foreach ($executions as $execution) {
            if ($execution->date !== $previousDate) {
                $previousDate = $execution->date;
                $currentDay++;
            }

            if ($execution->day !== $currentDay) {
                $execution->day = $currentDay;
                $execution->save();
            }
        }
    }

    public function saving(OsExecution $execution)
    {
        if ($execution->start_time && $execution->end_time) {
            $startTime = Carbon::parse($execution->start_time);
            $endTime = Carbon::parse($execution->end_time);

            if ($endTime->lt($startTime)) {
                $endTime->addDay();
            }

            $execution->total_time = $startTime->diffInMinutes($endTime);

            $horasRestantes = $execution->motorista->OsService->time * 60 - $execution->total_time;
            $execution->exceed_time = max(0, -$horasRestantes);
        }

        if ($execution->km_start && $execution->km_end) {
            $execution->km_total = abs($execution->km_end - $execution->km_start);

            $KMRestantes = $execution->motorista->OsService->km - $execution->km_total;
            $execution->km_exceed = $KMRestantes > 0 ? 0 : $KMRestantes * -1;
        }
    }
}

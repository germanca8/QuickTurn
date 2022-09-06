<?php

namespace App\Exports;

use App\Models\Seccion;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TurnosExport implements FromCollection, WithHeadings
{
    use Exportable;

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Seccion::all();
    }

    public function headings(): array
    {
        return ["id", "seccion_id", "invitado_id", "numTurno", "fechaTurno", "deleted_at", "created_at", "updated_at"];
    }
}

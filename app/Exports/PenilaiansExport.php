<?php

namespace App\Exports;

use App\Models\Penilaian;
use App\Models\Pendaftar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PenilaiansExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Sesuaikan data yang akan diekspor di sini
        return Pendaftar::select('nama_lengkap', 'no_tps')->get();
        return Penilaian::select('n_k1', 'n_k2', 'n_k3', 'n_k4')->get();
    }

    public function headings(): array
    {
        return [
            'Nama Lengkap',
            'No TPS',
            'n_k1',
            'n_k2',
            'n_k3',
            'n_k4'
            // Tambahkan kolom lain jika diperlukan
        ];
    }
}

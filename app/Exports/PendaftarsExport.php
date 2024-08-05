<?php

namespace App\Exports;

use App\Models\Pendaftar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PendaftarsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pendaftar::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Jenis Identitas',
            'NIK',
            'Nama Lengkap',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Usia',
            'Pendidikan Terakhir',
            'Pekerjaan',
            'Alamat',
            'no_tps',
            'email',
            // Tambahkan kolom lain jika diperlukan
        ];
    }
}

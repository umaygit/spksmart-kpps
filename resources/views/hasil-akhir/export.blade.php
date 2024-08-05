<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
    <div class="logo" style="text-align: center; ">
        <img src="{{ asset('img/kop_pps.png') }}" alt="Logo KPU">
    </div>

    <p style="text-align: center; font-family: 'Bookman Old Style', serif;">BERITA ACARA</p>
    <p style="text-align: center; font-family: 'Bookman Old Style', serif;">NOMOR: 01/PPS.01-BA/5203132001/2024</p>


    <p style="text-align: center; 'Bookman Old Style', serif;">TENTANG</p>
    <p style="text-align: center; 'Bookman Old Style', serif;">PENETAPAN ANGGOTA KELOMPOK PENYELENGGARA PEMUNGUTAN SUARA DESA ANJANI
        PADA PENYELENGGARA PEMILIHAN UMUM TAHUN 2024
    </p>

    <p style="font-family: 'Bookman Old Style', serif;">
        Pada hari Ahad tanggal dua puluh enam bulan Mei tahun Dua Ribu Dua Puluh Empat, bertempat di Photo Sintesis Studio Selong,
        telah dilaksanakan Rapat Pleno Panitia Pemungutan Suara (PPS) Desa Anjani, Kecamatan Suralaga, Kabupaten Lombok Timur,
        pada Pemilihan Umum tahun 2024, tentang pemilihan Ketua
        Panitia Pemungutan Suara (PPS) Desa Anjani.
    </p>

    <p style="font-family: 'Bookman Old Style', serif;">
        Rapat Pleno dihadiri oleh seluruh Anggota Panitia Pemungutan Suara Desa Anjani, rapat dimulai pada pukul 16.00 wita dengan
        memutuskan Sdr. Agus Safariadi sebagai Ketua Panitia Pemungutan Suara (PPS) Desa Anjani, pada Pemilihan Kepala Daerah Gubernur
        dan Wakil Gubernur serta Bupati dan Wakil Bupati tahun 2024.
    </p>

    <p style="font-family: 'Bookman Old Style', serif;">
        Demikian Berita Acara ini dibuat, untuk dapat digunakan sebagaimana mestinya. Jika terdapat kekeliruan
        maka akan diperbaiki dikemudian hari.
    </p>

    <p style="text-align: center; font-family: 'Bookman Old Style', serif;">KELOMPOK PENYELENGGARA PEMUNGUTAN SUARA DESA ANJANI</p>

    </div>
        <div class="card-body">
            <table class="table table-bordered" style="font-family: 'Bookman Old Style', serif;">
                <thead>
                    <tr>
                        <th style="text-align: center;">No</th>
                        <th style="text-align: center;">Nama Lengkap</th>
                        <th style="text-align: center;">Nomor TPS</th>
                        {{-- <th style="text-align: center;">Skor Akhir</th> --}}
                        <th style="text-align: center;">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $groupedPenilaians = $penilaians->groupBy('pendaftar.no_tps');
                    @endphp

                    @foreach($groupedPenilaians as $no_tps => $group)
                        @php
                            $sortedGroup = $group->sortByDesc(function($penilaian) use ($finalScores) {
                                return $finalScores[$penilaian->id] ?? 0; // Default to 0 if not set
;
                            });
                        @endphp

                        @foreach($sortedGroup as $penilaian)
                            <tr>
                                <td style="text-align: center;">{{ $loop->parent->iteration }}.{{ $loop->iteration }}</td>
                                <td style="text-align: left;">{{ strtoupper($penilaian->pendaftar->nama_lengkap) }}</td>
                                <td style="text-align: center;">{{ $penilaian->pendaftar->no_tps }}</td>
                                {{-- <td style="text-align: center;">{{ $finalScores[$penilaian->id] }}</td> --}}
                                <td style="text-align: center;">
                                    @if(isset($finalScores[$penilaian->pendaftar_id]))
                                        @if($finalScores[$penilaian->pendaftar_id] >= 60)
                                            <span class="badge bg-success text-white">TERPILIH</span>
                                        @elseif($finalScores[$penilaian->pendaftar_id] >= 40)
                                            <span class="badge bg-danger text-white">PENGGANTI</span>
                                        @else
                                            <span class="badge bg-danger text-white">TIDAK TERPILIH</span>
                                        @endif
                                    @else
                                        <span class="badge bg-danger text-white">BELUM DI NILAI</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- buat tanda tangan --}}
        <div style="margin-top: 50px; font-family: 'Bookman Old Style', serif;">
            <p style="text-align: right;">Anjani, {{ date('d F Y') }}</p>
            <p style="text-align: center;">Ketua Panitia Pemungutan Suara</p>
            <p style="text-align: center;">Desa Anjani</p>

            <br><br><br><br>

            <p style="text-align: center;">_____________________________</p>
            <p style="text-align: center;">(Sdr. Agus Safariadi)</p>
        </div>

    </div>

    {{-- tampilkan popup cetak data --}}
    <script type="text/javascript">
        window.print();
    </script>

</body>
</html>

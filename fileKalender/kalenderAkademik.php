<?php
require '../vendor/autoload.php'; // Dompdf autoload
use Dompdf\Dompdf;

// Koneksi ke database
include('../db/koneksi.php');
// Ambil bulan dan tahun awal serta akhir dari database
$stmt = $conn->query("SELECT MIN(start_date) AS start_date, MAX(end_date) AS end_date FROM events");
$result = mysqli_fetch_array($stmt);

$startDate = new DateTime($result['start_date']);
$endDate = new DateTime($result['end_date']);

// Data Kalender Akademik
$dataKalender = [];
while ($startDate <= $endDate) {
    $bulan = $startDate->format('F Y'); // Format bulan dan tahun
    $daysInMonth = $startDate->format('t'); // Jumlah hari dalam bulan

    $minggu = $senin = $selasa = $rabu = $kamis = $jumat = $sabtu = [];

    for ($day = 1; $day <= $daysInMonth; $day++) {
        $currentDate = DateTime::createFromFormat('Y-m-d', $startDate->format('Y-m-') . $day);
        $dayOfWeek = $currentDate->format('w'); // 0 = Minggu, 1 = Senin, ..., 6 = Sabtu

        switch ($dayOfWeek) {
            case 0: $minggu[] = $day; break;
            case 1: $senin[] = $day; break;
            case 2: $selasa[] = $day; break;
            case 3: $rabu[] = $day; break;
            case 4: $kamis[] = $day; break;
            case 5: $jumat[] = $day; break;
            case 6: $sabtu[] = $day; break;
        }
    }

    $dataKalender[] = [
        'bulan' => $bulan,
        'minggu' => $minggu,
        'senin' => $senin,
        'selasa' => $selasa,
        'rabu' => $rabu,
        'kamis' => $kamis,
        'jumat' => $jumat,
        'sabtu' => $sabtu,
    ];

    // Pindah ke bulan berikutnya
    $startDate->modify('+1 month');
}

// Warna Kategori
$kategoriWarna = [
    'kuliah' => '#d9e2f3',
    'ujian' => '#a8d08d',
    'libur' => '#f4cccc',
    'minggu_tenang' => '#ffe599',
    'nilai_masuk' => '#c9daf8',
    'minggu' => '#ffcccc',  // Tambahkan warna merah untuk hari Minggu
];

// Buat Tabel Kalender dalam HTML
$html = "<html><head><style>
    table {
        border-collapse: collapse;
        width: 100%;
        font-family: Arial, sans-serif;
    }
    th, td {
        border: 1px solid #000;
        text-align: center;
        padding: 5px;
    }
    th {
        background-color: #d9d9d9;
    }
    .kuliah { background-color: {$kategoriWarna['kuliah']}; }
    .ujian { background-color: {$kategoriWarna['ujian']}; }
    .libur { background-color: {$kategoriWarna['libur']}; }
    .minggu_tenang { background-color: {$kategoriWarna['minggu_tenang']}; }
    .nilai_masuk { background-color: {$kategoriWarna['nilai_masuk']}; }
    .minggu { background-color: {$kategoriWarna['minggu']}; } /* Warna merah untuk hari Minggu */
</style></head><body>";

$html .= "<h2 style='text-align: center;'>Kalender Akademik</h2>";

foreach ($dataKalender as $bulan) {
    $html .= "<h3>{$bulan['bulan']}</h3>";

    $html .= "<table>
        <tr>
            <th>Minggu</th>
            <th>Senin</th>
            <th>Selasa</th>
            <th>Rabu</th>
            <th>Kamis</th>
            <th>Jumat</th>
            <th>Sabtu</th>
        </tr>";

    $maxRows = max(count($bulan['minggu']), count($bulan['senin']), count($bulan['selasa']), count($bulan['rabu']), count($bulan['kamis']), count($bulan['jumat']), count($bulan['sabtu']));
    
    for ($i = 0; $i < $maxRows; $i++) {
        $html .= "<tr>";
        $html .= "<td class='minggu'>" . (isset($bulan['minggu'][$i]) ? $bulan['minggu'][$i] : '') . "</td>"; // Hari Minggu dengan warna merah
        $html .= "<td>" . (isset($bulan['senin'][$i]) ? $bulan['senin'][$i] : '') . "</td>";
        $html .= "<td>" . (isset($bulan['selasa'][$i]) ? $bulan['selasa'][$i] : '') . "</td>";
        $html .= "<td>" . (isset($bulan['rabu'][$i]) ? $bulan['rabu'][$i] : '') . "</td>";
        $html .= "<td>" . (isset($bulan['kamis'][$i]) ? $bulan['kamis'][$i] : '') . "</td>";
        $html .= "<td>" . (isset($bulan['jumat'][$i]) ? $bulan['jumat'][$i] : '') . "</td>";
        $html .= "<td>" . (isset($bulan['sabtu'][$i]) ? $bulan['sabtu'][$i] : '') . "</td>";
        $html .= "</tr>";
    }

    $html .= "</table><br>";
}

$html .= "<p>Keterangan Warna:</p>
<ul>
    <li><span style='background-color: {$kategoriWarna['kuliah']}; padding: 0 10px;'>&nbsp;</span> Kuliah</li>
    <li><span style='background-color: {$kategoriWarna['ujian']}; padding: 0 10px;'>&nbsp;</span> Ujian</li>
    <li><span style='background-color: {$kategoriWarna['libur']}; padding: 0 10px;'>&nbsp;</span> Libur</li>
    <li><span style='background-color: {$kategoriWarna['minggu_tenang']}; padding: 0 10px;'>&nbsp;</span> Minggu Tenang</li>
    <li><span style='background-color: {$kategoriWarna['nilai_masuk']}; padding: 0 10px;'>&nbsp;</span> Proses Nilai Masuk</li>
    <li><span style='background-color: {$kategoriWarna['minggu']}; padding: 0 10px;'>&nbsp;</span> Hari Minggu</li> <!-- Keterangan untuk hari Minggu -->
</ul>";

$html .= "</body></html>";

// Inisialisasi Dompdf
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();

// Output PDF
$dompdf->stream('kalender_akademik.pdf', ['Attachment' => false]);
?>

<!DOCTYPE html>
<html>

<head>
    <title><?php echo $title ?></title>
    <style type="text/css">
        body {
            font-family: Arial;
            color: black;
        }
    </style>
</head>

<body>
    <center>
        <h1>PT. RIMBA BESAR</h1>
        <h2>Laporan Absensi Karyawan</h2>
    </center>

    <?php
    if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
        $bulantahun = $bulan . $tahun;
    } else {
        $bulan = date('m');
        $tahun = date('Y');
        $bulantahun = $bulan . $tahun;
    }
    ?>

    <table>
        <tr>
            <td>Bulan</td>
            <td>:</td>
            <td><?php echo $bulan ?></td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td>:</td>
            <td><?php echo $tahun ?></td>
        </tr>
    </table>

    <table class="table table-bordered table-striped">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">NIK</th>
            <th class="text-center">Nama Karyawan</th>
            <th class="text-center">Jenis Kelamin</th>
            <th class="text-center">Jabatan</th>
            <th class="text-center">Hadir</th>
            <th class="text-center">Sakit</th>
            <th class="text-center">Alpha</th>
        </tr>

        <?php $no = 1;
        foreach ($lap_kehadiran as $l) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $l->nik ?></td>
                <td><?php echo $l->nama_karyawan ?></td>
                <td><?php echo $l->jenis_kelamin ?></td>
                <td><?php echo $l->nama_jabatan ?></td>
                <td><?php echo $l->hadir ?></td>
                <td><?php echo $l->sakit ?></td>
                <td><?php echo $l->alpha ?></td>
            </tr>
        <?php endforeach; ?>

    </table>

    <table width="98%">
        <tr>
            <td></td>
            <td width="200px">
                <p>Semarang, <?php echo date("d M Y") ?> <br> Sekretaris</p><br><br>
                <p>_________________________</p>
            </td>
        </tr>
    </table>

</body>

</html>

<script type="text/javascript">
    window.print();
</script>
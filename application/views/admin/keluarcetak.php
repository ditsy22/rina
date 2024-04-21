<?php
function rupiah($angka)
{
    $hasilrupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasilrupiah;
}
function tanggal($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}
function getBulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}
?>
<html>

<head>
    <title>Nota</title>
    <style>
        @page {
            margin: 3mm;
        }
    </style>
    <style>
        hr {
            display: block;
            margin-top: 0.5em;
            margin-bottom: 0.5em;
            margin-left: auto;
            margin-right: auto;
            border-style: inset;
            border-width: 1px;
        }
    </style>
</head>

<body style='font-family:tahoma; font-size:8pt;padding-top:50px'>
    <center>
        <br>
        <br>
        <h2>NOTA</h2>
        <br>
        <table style='width:550px; font-size:16pt; font-family:calibri; border-collapse: collapse;' border='0'>
            <tr>
                <td width="100px">
                    <span style="font-size:11pt">No. Nota</span>
                </td>
                <td>
                    <span style="font-size:11pt"> : <?= $keluar->kodekeluar ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <span style="font-size:11pt">Tanggal</span>
                </td>
                <td>
                    <span style="font-size:11pt"> : <?= tanggal($keluar->tanggalkeluar) ?></span>
                </td>
            </tr>
        </table>
        <br><br>
        <table cellspacing='0' cellpadding='0' style='width:550px; font-size:12pt; font-family:calibri; border-collapse: collapse;' border='1'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nobelanja = 1;
                $grandtotal = 0;
                $daftarbarang = $this->Admin_model->getresult(array('kodekeluar' => $keluar->kodekeluar), 'tb_keluar');
                foreach ($daftarbarang as $daftar) {
                ?>
                    <tr>
                        <td style="padding:5px;margin:5px"><?php echo $nobelanja; ?></td>
                        <td style="padding:5px;margin:5px"><?php echo $daftar['namabarang'] ?></td>
                        <td style="padding:5px;margin:5px"><?php echo rupiah($daftar['harga']); ?></td>
                        <td style="padding:5px;margin:5px"><?php echo $daftar['jumlah'] ?></td>
                        <td style="padding:5px;margin:5px"><?php echo rupiah($daftar['total']) ?></td>
                    </tr>
                <?php
                    $grandtotal += $daftar['total'];
                    $nobelanja++;
                } ?>
                <tr>
                    <td colspan="4" style="text-align:right">Grand Total : &nbsp;</b></em></td>
                    <td class="text-success" style="padding:5px;margin:5px"><?php echo rupiah($grandtotal) ?></td>
                </tr>
            </tbody>
        </table>
        <br><br>
        <table cellspacing='0' cellpadding='0' style='width:550px; font-size:11pt; font-family:calibri; border-collapse: collapse;'>
            <tr>
                <td width="60"><br><br><br><br></td>
                <?php
                $now = date("Y-m-d");

                ?>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;Penerima <br><br><br><br><br>(.....................)</td>
                <td width="130"><br><br><br><br></td>
                <?php
                $now = date("Y-m-d");

                ?>
                <td>Hormat Kami, <br><br><br><br><br>(.....................)</td>
            </tr>
        </table>
    </center>
</body>

</html>
<script>
    window.print();
</script>
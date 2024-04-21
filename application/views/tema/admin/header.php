<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title><?php echo $title; ?> - Inventori Marshellamart</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_admin/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/lineicons/lineicons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/jquery.datepicker.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/flatweather.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/nice-select.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/color.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/responsive.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/pnotify/dist/pnotify.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/pnotify/dist/pnotify.buttons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/pnotify/dist/pnotify.nonblock.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css" rel="stylesheet" /> -->
    <?php  ?>
    <style>
        .modal-backdrop {
            display: none;
            z-index: 999 !important;
            position: fixed;
        }

        .select--wrapper {
            max-width: 200px;
            width: 100%
        }

        .selection {
            width: 100%;
        }
    </style>
</head>
<?php
$link = $this->uri->segment(2);
$this->db->where('admin_id', $this->session->userdata('adminid'));
$admin = $this->db->get('tb_admin')->row();
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
$warna = "";
?>

<body>
    <!-- <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div> -->
    <div class="panel-layout">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="main-page" style="background-color: red">
                        <header>
                            <div class="side-menus">
                                <div class="side-header">
                                    <div class="logo"><a title="" href="<?php echo base_url(); ?>admin"><img alt="" src="<?php echo base_url(); ?>assets_admin/images/logo-dash-admin.png"></a></div>
                                    <nav class="slide-menu">
                                        <ul class="parent-menu">
                                            <li class="<?php if ($link == 'dashboard') {
                                                            echo 'active';
                                                        } ?>"><a href="<?php echo base_url(); ?>admin" title="Home"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                                            </li>
                                            <li class="<?php if ($link == 'barangdaftar' or $link == 'barangtambah' or $link == 'barangedit') {
                                                            echo 'active';
                                                        } ?>"><a href="<?php echo base_url(); ?>admin/barangdaftar"><i class="fa fa-laptop"></i><span>Barang</span></a>
                                            </li>
                                            <li class="<?php if ($link == 'masukdaftar' or $link == 'masuktambah') {
                                                            echo 'active';
                                                        } ?>"><a href="<?php echo base_url(); ?>admin/masukdaftar"><i class="fa fa-download"></i><span>Barang Masuk</span></a>
                                            </li>
                                            <li class="<?php if ($link == 'keluardaftar' or $link == 'keluartambah') {
                                                            echo 'active';
                                                        } ?>"><a href="<?php echo base_url(); ?>admin/keluardaftar"><i class="fa fa-upload"></i><span>Barang Keluar</span></a>
                                            </li>
                                            <li><a href="<?php echo base_url(); ?>auth/logout"><i class="fa fa-sign-out"></i><span>Logout</span></a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </header>

                        <div class="topbar">
                            <div class="container-fluid" <?= $warna ?>>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="logo">
                                            <h3 class="text-white"><?= $admin->level ?></h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <ul class="notify-area">
                                            <li>
                                                <div class="nav-icon3"> <span></span> <span></span> <span></span> <span></span> </div>
                                                <i class="fa fa-navicon nav-icon3"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="user-head">
                                            <div class="admin">
                                                <div class="admin-avatar"><img src="<?= base_url('assets_admin/images/resources/' . $admin->admin_foto) ?>" style="object-fit: contain;" width="40px" height="40px"> <i class="online"></i> </div>
                                            </div>
                                            <div class="drop setting"> <span class="drop-head"><?php echo $admin->admin_nama; ?> <i></i></span>
                                                <ul class="drop-meta">
                                                    <li> <a href="<?php echo base_url(); ?>admin/edit_profil"><i class="fa fa-eyedropper"></i>Edit Profil</a> </li>
                                                    <li> <a href="<?php echo base_url(); ?>admin/edit_sandi"><i class="fa fa-lock"></i>Ganti Password</a> </li>
                                                </ul>
                                                <span class="drop-bottom"><a href="<?php echo base_url(); ?>auth/logout"><i class="fa fa-sign-out"></i>Keluar</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main-content">
                            <div class="responsive-header">
                                <div class="logo-area">
                                    <ul class="notify-area">
                                        <li>
                                            <div class="nav-icon3"> <span></span> <span></span> <span></span> <span></span> </div>
                                        </li>
                                    </ul>
                                    <div class="user-head">
                                        <div class="admin">
                                            <div class="admin-avatar"> <img src="<?= base_url('assets_admin/images/resources/' . $admin->admin_foto) ?>" width="40px" height="40px"> <i class="online"></i> </div>
                                        </div>
                                        <div class="drop setting"> <span class="drop-head"><?php echo $this->session->userdata('nama'); ?> <i></i></span>
                                            <ul class="drop-meta">
                                                <li> <a href="<?php echo base_url(); ?>admin/edit_profil"><i class="fa fa-eyedropper"></i>Edit Profile</a> </li>
                                                <li> <a href="<?php echo base_url(); ?>admin/edit_sandi"><i class="fa fa-lock"></i>Ganti Password</a> </li>
                                                <li> <a href="<?php echo base_url(); ?>laporan/transaksi"><i class="fa fa-align-right"></i>Laporan Transaksi</a> </li>
                                            </ul>
                                            <span class="drop-bottom"><a href="<?php echo base_url(); ?>auth/logout"><i class="fa fa-sign-out"></i>Keluar</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="content-area">
                                    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
                                    <div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
                                    <div class="sub-bar">
                                        <div class="sub-title">
                                            <h4><?php echo $title; ?>:</h4>
                                            <br>
                                        </div>
                                        <ul class="bread-crumb">
                                            <li><a href="<?php echo base_url(); ?>admin" title="">Home</a></li>
                                            <li><?php echo $title; ?></li>
                                        </ul>
                                    </div>
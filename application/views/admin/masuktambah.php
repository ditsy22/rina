<div class="gap no-gap">
    <div class="inner-bg">
        <div class="element-title">
            <h4><?php echo $title; ?></h4>
            <form action="<?= base_url('admin/masuktambah') ?>" method="post" enctype="multipart/form-data">

                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tanggal Masuk</label>
                            <input class="form-control" name="tanggalmasuk" type="date" required value="<?= date('Y-m-d') ?>" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama Supplier / Nama Pemasok</label>
                            <input type="text" name="nama" class="form-control nama" required>
                        </div>
                    </div>
                </div>
                <br>
                <table class="table table-bordered table-striped" id="dynamic_field">
                    <tr>
                        <td width="30%">
                            <div class="form-group namabarangharga">
                                <label>Nama Barang</label>
                                <select name="namabarang[]" class="form-control namabarang selectcari" data-container="body" data-width="100%" required>
                                    <option value="">Pilih Barang</option>
                                    <?php foreach ($databarang as $barang) : ?>
                                        <option value="<?php echo $barang['barang_nama']; ?>" data-harga="<?= $barang['barang_harga'] ?>"><?php echo $barang['barang_nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="text" id="harga1" name="harga[]" oninput="check()" onchange="check()" class="form-control harga" value="0" required>
                            </div>
                        </td>
                        <td width="15%">
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" value="1" min="0" id="jumlah1" name="jumlah[]" oninput="check()" onchange="check()" class="form-control jumlah" required>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label>Total</label>
                                <input type="text" id="total1" name="total[]" value="0" class="form-control total" readonly>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <button type="button" name="add" id="tambahdinamis" class="btn btn-success mt-4">+</button>
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Grand Total</label>
                            <input class="form-control" id="grandtotal" name="grandtotal" type="text" readonly>
                            <input class="form-control" id="grandtotalnon" name="grandtotalnon" type="hidden">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        <div class="text-right">
                            <button type="submit" name="simpan" value="simpan" class="btn btn-success pull-right mt-3">
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="gap inner-bg">
    <div class="element-title">
        <div class="table-styles">
            <?php if ($this->session->userdata('level') == 'Admin') { ?>
                <a href="<?php echo base_url(); ?>admin/keluartambah" class="btn-st grn-clr"><i class="fa fa-plus"></i> Tambah Keluar</a>
            <?php } ?>
            <div class="widget">
                <table class="prj-tbl striped bordered table-responsive" id="tabel">
                    <thead>
                        <tr>
                            <th><em>No</em></th>
                            <th><em>Nama Pembeli</em></th>
                            <th><em>Tanggal Keluar</em></th>
                            <th><em>Total Belanja</em></th>
                            <th><em>Daftar Belanja</em></th>
                            <?php if ($this->session->userdata('level') == 'Admin') { ?>
                                <th><em>Opsi</em></th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        $grandtotal = 0;
                        foreach ($keluar as $pro) : ?>
                            <tr>
                                <td><?php echo $i . '.'; ?></td>
                                <td><span><?php echo $pro['nama']; ?></span></td>
                                <td><i><?php echo date('d-m-Y', strtotime($pro['tanggalkeluar'])); ?></i></td>
                                <td><i><?php echo rupiah($pro['grandtotal']); ?></i></td>
                                <td><a class="btn-st drk-blu-clr text-white" data-toggle="modal" data-target="#lihat<?= $i ?>">Lihat</a></td>
                                <?php if ($this->session->userdata('level') == 'Admin') { ?>
                                    <td>
                                        <a href="<?php echo base_url(); ?>admin/keluarcetak/<?php echo $pro['kodekeluar']; ?>" class="btn btn-success btn-xs" target="_blank">Cetak Nota</a>
                                        <a href="<?php echo base_url(); ?>admin/keluarhapus/<?php echo $pro['kodekeluar']; ?>" class="btn btn-danger bdel">Hapus</a>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php
                            $grandtotal += $pro['grandtotal'];
                            $i++;
                        endforeach; ?>
                    </tbody>
                    <tfoot class="bg-secondary text-white">
                        <th colspan="2"></th>
                        <th><em>Grandtotal</em></th>
                        <?php if ($this->session->userdata('level') == 'Admin') { ?>
                            <th colspan="3"><em><?php echo rupiah($grandtotal); ?></em></th>
                        <?php } else { ?>
                            <th colspan="2"><em><?php echo rupiah($grandtotal); ?></em></th>
                        <?php } ?>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<?php $no = 1; ?>
<?php foreach ($keluar as $pro) : ?>
    <div class="modal fade" id="lihat<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-backdrop="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Daftar Keluar Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped" id="table2">
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
                            $pengeluaran = 0;
                            $daftarbarang = $this->Admin_model->getresult(array('kodekeluar' => $pro['kodekeluar']), 'tb_keluar');
                            foreach ($daftarbarang as $daftar) { ?>
                                <tr>
                                    <td><?php echo $nobelanja; ?></td>
                                    <td><?php echo $daftar['namabarang'] ?></td>
                                    <td><?php echo rupiah($daftar['harga']); ?></td>
                                    <td><?php echo $daftar['jumlah'] ?></td>
                                    <td><?php echo rupiah($daftar['total']) ?></td>
                                </tr>
                            <?php
                                $pengeluaran += $daftar['total'];
                                $nobelanja++;
                            } ?>
                            <tr class="bg-secondary text-white">
                                <th colspan="3"></th>
                                <th><em>Grand Total</em></th>
                                <th><em>:<?php echo rupiah($pengeluaran); ?></em></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <?php $no++; ?>
<?php endforeach; ?>
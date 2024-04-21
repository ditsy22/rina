<div class="gap inner-bg">
  <div class="element-title">
    <div class="table-styles">
      <?php if ($this->session->userdata('level') == 'Admin') { ?>
        <a href="<?php echo base_url(); ?>admin/barangtambah" class="btn-st grn-clr"><i class="fa fa-plus"></i> Tambah Barang</a>
      <?php } ?>
      <div class="widget">
        <table class="prj-tbl striped bordered table-responsive" id="myTable">
          <thead class="">
            <tr>
              <th><em>No</em></th>
              <th><em>Nama Barang</em></th>
              <th><em>Harga</em></th>
              <th><em>Stok</em></th>
              <th><em>Foto</em></th>
              <?php if ($this->session->userdata('level') == 'Admin') { ?>
                <th><em>Opsi</em></th>
              <?php } ?>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($barang as $pro) : ?>
              <tr>
                <td><?php echo $i . '.'; ?></td>
                <td><span><?php echo $pro['barang_nama']; ?></span></td>
                <td><i><?php echo rupiah($pro['barang_harga']); ?></i></td>
                <td><i><?php echo $pro['barang_stok']; ?></i></td>
                <td><i><img src="<?php echo base_url(); ?>upload/barang/<?php echo $pro['barang_foto']; ?>" width="40" alt="<?php echo $pro['barang_nama']; ?>"></i></td>
                <?php if ($this->session->userdata('level') == 'Admin') { ?>
                  <td>
                    <a href="<?php echo base_url(); ?>admin/barangedit/<?php echo $pro['barang_id']; ?>" class="btn-st drk-blu-clr"><i class="fa fa-edit"></i></a>
                    <a href="<?php echo base_url(); ?>admin/baranghapus/<?php echo $pro['barang_id']; ?>" class="btn-st rd-clr bdel"><i class="fa fa-trash"></i></a>
                  </td>
                <?php } ?>
              </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
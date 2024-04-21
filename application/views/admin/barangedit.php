<div class="gap no-gap">
  <div class="inner-bg">
    <div class="element-title">
      <h4><?php echo $title; ?></h4>
      <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="barang_id" value="<?php echo $barangid['barang_id']; ?>">

        <div class="add-prod-from">
          <div class="row">
            <div class="col-md-12">
              <label>Nama Barang</label>
              <input type="text" name="barang_nama" value="<?php echo $barangid['barang_nama']; ?>" placeholder="" required>
              <small class="text-danger"><?php echo form_error('barang_nama'); ?></small>
            </div>
            <div class="col-md-12">
              <label>Harga Barang</label>
              <input type="text" name="barang_harga" value="<?php echo $barangid['barang_harga']; ?>" placeholder="" required>
              <small class="text-danger"><?php echo form_error('barang_harga'); ?></small>
            </div>
            <div class="col-md-12">
              <label>Stok</label>
              <input type="text" name="barang_stok" value="<?php echo $barangid['barang_stok']; ?>" placeholder="" required>
              <small class="text-danger"><?php echo form_error('barang_stok'); ?></small>
            </div>
            <div class="col-md-12">
              <label>Dekripsi Barang</label>
              <textarea cols="30" name="barang_deskripsi" rows="10" placeholder="" required><?php echo $barangid['barang_deskripsi']; ?></textarea>
              <small class="text-danger"><?php echo form_error('barang_deskripsi'); ?></small>
            </div>
            <div class="col-md-12">
              <label>Upload Gambar</label>
              <input type="file" name="gambar" />
              <input type="hidden" name="gambar_old" value="<?php echo $barangid['barang_foto']; ?>">
            </div>
            <div class="col-md-12">
              <div class="buttonz">
                <button type="submit">Simpan</button>
                <button onclick="goBack()">Batal</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
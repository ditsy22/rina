<div class="inner-bg">
  <div class="element-title">
    <h4>Edit Profil</h4>


  </div>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="pnl-bdy billing-sec">
      <div class="row">
        <div class="col-md-12 col-sm-12 field">
          <label>Nama Lengkap</label>
          <input value="<?php echo $profilsaya['admin_nama']; ?>" name="nama" type="text">
          <small class="text-danger"><?php echo form_error('nama'); ?></small>
        </div>
        <div class="col-md-12 col-sm-12 field">
          <label>Email</label>
          <input value="<?php echo $profilsaya['admin_email']; ?>" name="email" type="text">
          <small class="text-danger"><?php echo form_error('email'); ?></small>
        </div>
        <div class="col-md-12 col-sm-12 field">
          <label>No. HP Pengguna</label>
          <input type="text" name="nohp" value="<?php echo $profilsaya['nohp']; ?>" placeholder="" required>
          <small class="text-danger"><?php echo form_error('nohp'); ?></small>
        </div>
        <div class="col-md-12 col-sm-12 field">
          <label>Username</label>
          <input value="<?php echo $profilsaya['admin_username']; ?>" name="username" type="text">
          <small class="text-danger"><?php echo form_error('username'); ?></small>
        </div>
        <div class="col-md-12 col-sm-12 mb-3">
          <div class="form-group">
            <label class="upload-image">Upload Foto</label>
            <input type="file" name="gambar" class="form-control">
            <input type="hidden" name="gambar_old" value="<?php echo $profilsaya['admin_foto']; ?>">
          </div>
        </div>
        <div class="col-md-12 col-sm-12 field">
          <label>Konfirmasi Password</label>
          <input name="sandi" type="password">
          <small class="text-danger"><?php echo form_error('sandi'); ?></small>
        </div>
        <div class="col-md-12 col-sm-12">
          <button type="submit">Simpan</button>
        </div>
      </div>
    </div>
  </form>
</div>
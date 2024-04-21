<div class="inner-bg">
  <div class="element-title">
    <h4>Edit password</h4>
    <span>Edit your password</span>


  </div>
  <form action="" method="post">
    <div class="pnl-bdy billing-sec">
      <div class="row">
        <div class="col-md-12 col-sm-12 field">
          <label>Sandi Baru</label>
          <input name="sandi2" type="password">
          <small class="text-danger"><?php echo form_error('sandi2'); ?></small>
        </div>
        <div class="col-md-12 col-sm-12 field">
          <label>Konfirmasi Sandi Baru</label>
          <input name="sandi1" type="password">
          <small class="text-danger"><?php echo form_error('sandi1'); ?></small>
        </div>
        <div class="col-md-12 col-sm-12 field">
          <label>Konfirmasi Sandi Lama</label>
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
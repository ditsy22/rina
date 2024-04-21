<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <title><?php echo $title; ?> - Inventori Marshellamart</title>
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets_admin/images/fav.png">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_admin/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/animate.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/color.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/css/responsive.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_home/css/font-awesome.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
</head>

<body>
  <div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div>
  <div class="panel-layout">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="admin-lock vh100">
            <div class="admin-form">
              <br>
              <h4>Login</h4>
              <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
              <div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
              <form action="" method="post" autocomplete="off">
                <div>
                  <label class="form-label">Email</label>
                  <div class="input-group">
                    <input class="form-control" id="email" class="block mt-1 w-full" type="text" name="email" required value="" autocomplete="off" />
                  </div>
                </div>
                <p><small class="text-danger"><?php echo form_error('email'); ?></small></p>
                <br>
                <div>
                  <label class="form-label">Password</label>
                  <div class="input-group">
                    <input class="form-control password" id="password" class="block mt-1 w-full" type="password" name="sandi" value="" autocomplete="off" required />
                    <span class="input-group-text togglePassword">
                      <i data-feather="eye" style="cursor: pointer;padding-top:5px"></i>
                    </span>
                  </div>
                </div>
                <p><small class="text-danger"><?php echo form_error('sandi'); ?></small></p>
                <button type="submit">Login</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo base_url(); ?>assets_admin/js/jquery.js"></script>
  <script src="<?php echo base_url(); ?>assets_admin/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets_admin/js/custom.js"></script>
  <script src="<?php echo base_url(); ?>assets_home/js/sweetalert2.all.min.js"></script>
  <script>
    const flashData = $('.flash-data').data('flashdata');
    // console.log(flashData);
    if (flashData) {
      Swal.fire({
        // position: 'top-end',
        title: 'Berhasil !',
        text: '' + flashData,
        icon: 'success',
        showConfirmButton: false,
        timer: 3500
      });
    }
  </script>
  <script>
    const flashDataError = $('.flash-data-error').data('flashdata');
    // console.log(flashData);
    if (flashDataError) {
      Swal.fire({
        // position: 'top-end',
        title: 'Gagal !',
        text: '' + flashDataError,
        icon: 'error',
        showConfirmButton: false,
        timer: 3500
      });
    }
  </script>
  <script>
    $('.bdel').on('click', function(e) {
      e.preventDefault();
      const href = $(this).attr('href');
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      });
      swalWithBootstrapButtons.fire({
        position: 'top-end',
        title: 'Yakin data ini akan dihapus?',
        text: "Data tidak akan bisa dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Dibatalkan',
            '',
            'error'
          )
        }
      });
    });
  </script>
  <script>
    function goBack() {
      window.history.back();
    }
    feather.replace({
      'aria-hidden': 'true'
    });

    $(".togglePassword").click(function(e) {
      e.preventDefault();
      var type = $(this).parent().parent().find(".password").attr("type");
      console.log(type);
      if (type == "password") {
        $("svg.feather.feather-eye").replaceWith(feather.icons["eye-off"].toSvg());
        $(this).parent().parent().find(".password").attr("type", "text");
      } else if (type == "text") {
        $("svg.feather.feather-eye-off").replaceWith(feather.icons["eye"].toSvg());
        $(this).parent().parent().find(".password").attr("type", "password");
      }
    });
  </script>
</body>

</html>
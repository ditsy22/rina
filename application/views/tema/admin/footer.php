</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
<script src="<?php echo base_url(); ?>assets_admin/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/perfect-scrollbar.jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/chart.min.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/echart.min.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/chat-init.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/flatweather.min.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/html5lightbox.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/custom.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/pnotify/dist/pnotify.js"></script>
<script src="<?php echo base_url(); ?>assets/pnotify/dist/pnotify.buttons.js"></script>
<script src="<?php echo base_url(); ?>assets/pnotify/dist/pnotify.nonblock.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $(".selectcari").select2({
      // dropdownParent: $(".modal"),
      theme: "bootstrap4",
      width: 'style',
      allowClear: true
    });
  });
  $(document).ready(function() {
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if (month < 10)
      month = '0' + month.toString();
    if (day < 10)
      day = '0' + day.toString();

    var minDate = year + '-' + month + '-' + day;

    $('#tanggalsebelum').attr('min', minDate);
  });
</script>
<script>
  $(document).ready(function() {
    // $('#myTable').DataTable();
    $('#myTable').DataTable({
      scrollY: '500px',
      scrollCollapse: true,
      // paging: false,
    });
  });
</script>
<script src="<?php echo base_url(); ?>assets_admin/js/peity-circle.js"></script>
<script src="<?php echo base_url(); ?>assets_admin/js/custom2.js"></script>
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
        confirmButton: 'btn btn-success m-3',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    });
    swalWithBootstrapButtons.fire({
      // position: 'top-end',
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

  function addlist(obj, out) {
    var grup = obj.form[obj.name];
    var len = grup.length;
    var list = new Array();

    if (len > 1) {
      for (var i = 0; i < len; i++) {
        if (grup[i].checked) {
          list[list.length] = grup[i].value;
        }
      }
    } else {
      if (grup.checked) {
        list[list.length] = grup.value;
      }
    }

    document.getElementById(out).value = list.join(', ');

    return;
  }
</script>
<script>
  $(document).ready(function() {
    $('#tabel').DataTable();
  });
  $(function() {
    setInterval(hitungtotalku, 200);
  });


  function hitungtotalku() {
    $("#plan").each(function() {
      var plan = document.getElementById('plan').value;
      var kelaspt = document.getElementById('kelaspt').value;
      if (kelaspt == '') {
        var harga = 135000;
      } else if (kelaspt == '-') {
        var harga = 135000;
      } else {
        var harga = 800000;
      }
      var total = (harga * plan);
      const format = total.toString().split('').reverse().join('');
      const convert = format.match(/\d{1,3}/g);
      const rupiah = 'Rp ' + convert.join('.').split('').reverse().join('')
      document.getElementById('harga').value = total;
      document.getElementById('rupiah').value = rupiah;
    });
  }
</script>
<script>
  $(document).ready(function() {
    var i = 1;
    $('#tambahdinamis').click(function() {

      i++;
      html = "";
      html += '<tr id="row' + i + '">' +

        '<td width="30%">' +
        '<div class="form-group namabarangharga">' +
        '<label>Nama Barang</label>' +
        '<select name="namabarang[]" class="form-control namabarang selectcari" data-container="body" data-width="100%" required>' +
        '<option value="">Pilih Barang</option>' +
        '<?php foreach ($databarang as $barang) : ?>' +
        '<option value="<?php echo $barang['barang_nama']; ?>" data-harga="<?= $barang['barang_harga'] ?>" data-stok="<?= $barang['barang_stok'] ?>"><?php echo $barang['barang_nama']; ?></option>' +
        '<?php endforeach; ?>' +
        '</select>' +
        '</div>' +
        '</td>' +
        '<td>' +
        '<div class="form-group">' +
        '<label>Harga</label>' +
        '<input type="hidden" id="stok" name="stok[]" oninput="check()" onchange="check()" class="form-control stok" value="10000" readonly required>' +
        '<input type="text" id="harga' + i + '" name="harga[]" class="form-control harga" oninput="check()" onchange="check()" value="0" required>' +
        '</div>' +
        '</td>' +

        '<td width="15%">' +
        '<div class="form-group">' +
        '<label>Jumlah</label>' +
        '<input type="number" value="1" min="0" id="jumlah' + i + '" name="jumlah[]" class="form-control jumlah" oninput="check()" onchange="check()" required>' +
        '</div>' +
        '</td>' +

        '<td>' +
        '<div class="form-group">' +
        '<label>Total</label>' +
        '<input type="text" id="total' + i + '" name="total[]" class="form-control total" value="0" readonly>' +
        '</div>' +
        '</td>' +

        '<td>' +
        '<div class="form-group">' +
        '<button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove mt-4">X</button>' +
        '</div>' +
        '</td>' +


        '</tr>';

      $('#dynamic_field').append(html);
      $(".selectcari").select2({
        theme: "bootstrap4",
        width: 'style',
        allowClear: true
      });
    });

  });
</script>
<script>
  var $submit = $('#btn_simpan');

  // pengeluaran
  $(document).ready(function() {
    var i = 1;
    $('#tambahpengeluaran').click(function() {

      i++;
      html = "";
      html += '<tr id="row' + i + '">' +

        '<td width="30%">' +
        '<div class="form-group namabarangharga">' +
        '<label>Nama Barang / Jasa</label>' +
        '<input name="namabarang[]" class="form-control namabarang" required>' +
        '</div>' +
        '</td>' +
        '<td>' +
        '<div class="form-group">' +
        '<label>Biaya</label>' +
        '<input type="text" id="harga' + i + '" name="harga[]" class="form-control harga" oninput="check()" onchange="check()" value="0" required>' +
        '</div>' +
        '</td>' +

        '<td width="15%">' +
        '<div class="form-group">' +
        '<label>Jumlah</label>' +
        '<input type="number" value="1" min="0" id="jumlah' + i + '" name="jumlah[]" class="form-control jumlah" oninput="check()" onchange="check()" required>' +
        '</div>' +
        '</td>' +

        '<td>' +
        '<div class="form-group">' +
        '<label>Total</label>' +
        '<input type="text" id="total' + i + '" name="total[]" class="form-control total" value="0" readonly>' +
        '</div>' +
        '</td>' +

        '<td>' +
        '<div class="form-group">' +
        '<button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove mt-4">X</button>' +
        '</div>' +
        '</td>' +


        '</tr>';

      $('#tabelpengeluaran').append(html);
    });

  });

  // 
  $(document).on('click', '.btn_remove', function() {
    var button_id = $(this).attr("id");
    $('#row' + button_id + '').remove();
  });

  $(document).ready(function() {
    setInterval(hitungtotal, 200);
    $(".total").each(function() {
      setInterval(hitunggrandtotal, 200);
    });

  });

  function hitunggrandtotal() {
    var sum = 0;
    $(".total").each(function() {
      if (!isNaN(this.value) && this.value.length != 0) {
        sum += parseFloat(this.value);
      }
    });
    const format = sum.toString().split('').reverse().join('');
    const convert = format.match(/\d{1,3}/g);
    const rupiah = 'Rp ' + convert.join('.').split('').reverse().join('')
    // document.getElementById('grandtotal').value = sum.toFixed(2);
    document.getElementById('grandtotal').value = rupiah;
    document.getElementById('grandtotalnon').value = sum;
  }

  function hitungtotal() {

    $(".jumlah").each(function() {
      var $row = $(this).closest('tr');
      var jumlah = parseInt($row.find('.jumlah').val());
      var harga = parseInt($row.find('.harga').val());
      var total = (harga * jumlah);
      $row.find('.total').val(total);
    });
  }

  $('#dynamic_field').on('change', '.namabarang', function() {
    var $select = $(this);
    var namabarang = $select.val();
    var $row = $(this).closest('tr');
    $row.find('.harga')
      .val(
        $(this).find(':selected').data('harga')
      );
    $row.find('.stok')
      .val(
        $(this).find(':selected').data('stok')
      );
  });

  $('#tabelpengeluaran').on('change', '.namabarang', function() {
    var $select = $(this);
    var namabarang = $select.val();
    var $row = $(this).closest('tr');
    $row.find('.harga')
      .val(
        $(this).find(':selected').data('harga')
      );
  });
</script>
<script>
  $(function() {
    setInterval(cekstok, 300);
  });



  function cekstok() {
    $(".jumlah").each(function() {
      var $row = $(this).closest('tr');
      var unitStock = parseInt($row.find('.stok').val());
      var unitCount = parseInt($row.find('.jumlah').val());
      if (unitCount > unitStock) {
        $row.find('.jumlah').val(unitStock);
        new PNotify({
          title: 'Jumlah Melebihi Stok',
          text: '',
          type: 'danger',
          hide: true,
          styling: 'bootstrap3',
          nonblock: {
            nonblock: true,
            nonblock_opacity: .2
          },
          styling: "bootstrap3",
          delay: 1500,
          addclass: "stack-topright",
        });

      } else if (unitCount < 0) {
        $row.find('.jumlah').val(0);
      } else {
        $row.find('.jumlah').val(unitCount);
      }
    });

  }
</script>
</body>

</html>
<?php
$this->load->view('admin/head');
?>
<!--tambahkan custom css disini-->

<?php
$this->load->view('admin/topbar');
$this->load->view('admin/sidebar');
?>



<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
    </div>
    <?php foreach ($peserta as $p); { ?>
      <div class="col-md-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <center>
              <h3 class="box-title">Edit Data Peserta</h3>
            </center>
            <p>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form class="form-horizontal" action="<?= base_url('peserta/edit_materi_peserta'); ?>" method="post">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama peserta</label>
                <input type="hidden" name="id" value="<?= $p->id_user ?>">
                <div class="col-sm-10">
                  <!-- <select class="select2 form-control" name="peserta" required>
                    <option selected="selected" disabled="">- Pilih peserta Ujian -</option>
                    <?php foreach ($user as $a) { ?>
                      <option value="<?= $a->id_user ?>" <?php if ($a->nama_user == $p->nama_user) {echo "selected='selected'";} ?>><?= $a->nama_user; ?></option>
                    <?php } ?>
                  </select> -->
                  <input type="text" value="<?= $p->nama_user ?>" readonly disabled>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Materi</label>

                <div class="col-sm-10">
                  <select class="select2 form-control" name="materi" required>
                    <option selected="selected" disabled="">- Pilih Materi Kursus -</option>
                    <?php foreach ($materi as $a) : ?>
                      <option value="<?= $a->kode_materi ?>" <?php if (isset($p->nama_materi) && $p->nama_materi == $a->nama_materi) : ?> selected="selected" <?php endif; ?>>
                        <?= $a->kode_materi; ?> | <?= $a->nama_materi; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                  <button type="button" class="btn btn-default btn-flat" onclick="return history.go(-1)" title="Kembali ke halaman sebelumnya"><span class="fa fa-arrow-left"></span> Kembali</button>
                  <button type="submit" class="btn btn-primary btn-flat" title="Update peserta"><span class="fa fa-save"></span> Simpan</button>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">

            </div>
            <!-- /.box-footer -->
          <?php } ?>
          </form>
        </div>
      </div>
      <!-- /.col-->

  </div>
  <!-- ./row -->
</section><!-- /.content -->

<?php
$this->load->view('admin/js');
?>

<!--tambahkan custom js disini-->

<script type="text/javascript">
  $(function() {
    $('#data-tables').dataTable();
  });
  $('#datepicker').datepicker({
    autoclose: true,
    todayHighlight: true,
    orientation: "bottom auto",
    format: 'yyyy-mm-dd'
  });
  $('#date').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });
  $('#timepicker').timepicker({
    showInputs: false,
    showMeridian: false
  });
  $('#time').timepicker({
    showInputs: false,
    showMeridian: false
  });

  $('.select2').select2();

  $('.alert-dismissible').alert().delay(3000).slideUp('slow');
</script>


<?php
$this->load->view('admin/foot');
?>
?>
```
</rewritten_file>
<|eot_id|>
  ?>
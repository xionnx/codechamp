<?php
$this->load->view('admin/head');
?>
<!--tambahkan custom css disini-->

<?php
$this->load->view('admin/topbar');
$this->load->view('admin/sidebar');
?>
<!-- Content Header (Page header) -->


<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <?= $this->session->flashdata('message'); ?>
      <!-- Default box -->
      <div class="box box-success" style="overflow-x: scroll;">
        <div class="box-header">
          <center>
            <h3 class="box-title">Data Materi</h3>
          </center>
          <p>
            <a href="<?= base_url('soal_materi') ?>" class="btn btn-default"><span class="fa fa-arrow-left"></span> Kembali</a>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><span class="fa fa-plus"></span> Tambah</button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="data" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="1%">No</th>
                <th>Kode</th>
                <th>Nama Materi</th>
                <th width="12%"></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($materi as $m) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $m->kode_materi; ?></td>
                  <td><?php echo $m->nama_materi; ?></td>
                  <td>
                    <a href="<?= base_url() . 'materi/edit/' . $m->id_materi; ?>" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-edit" title="Ubah"></span></a> |
                    <a href="<?= base_url() . 'materi/hapus/' . $m->id_materi; ?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash" onclick="return confirm('Apakah yakin ingin menghapus data materi dengan nama <?= $m->nama_materi; ?> ?')" title="Hapus"></span></a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <?= $this->session->unset_userdata('message') ?>
    </div>
  </div>
</section><!-- /.content -->

<!-- /. modal  -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center>
          <h4 class="modal-title">Tambah Data Materi</h4>
        </center>
      </div>
      <!-- /.form dengan modal -->
      <form method="post" action="<?php echo base_url() . 'materi/materi_aksi'; ?>">
        <div class="modal-body">
          <div class="form-group">
            <label class="font-weight-bold">Kode Materi </label>
            <input type="text" class="form-control" name="kode" placeholder="Masukkan Kode Materi" required="">
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Nama Materi</label>
            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Materi" required="">
          </div>
        </div>
        <div class="modal-footer">

          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
      <!-- /.tutup form dengan modal  -->
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php
$this->load->view('admin/js');
?>
<!--tambahkan custom js disini-->

<script type="text/javascript">
  $(document).ready(function() {
    $('#data').dataTable();
  });

  $('.alert-message').alert().delay(3000).slideUp('slow');
</script>

<?php
$this->load->view('admin/foot');
?>
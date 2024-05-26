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
            <h4 class="box-title">Data Tutor</h4>
          </center>
          <p>
          <h3 class="box-title"></h3>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"> <span class="fa fa-plus"></span> Tambah</button>
        </div>
        <!-- /.box-header -->

        <div class="box-body">
          <table id="data" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="1%">No</th>
                <th>ID Tutor</th>
                <th>Nama Tutor</th>
                <th>Username</th>
                <th width="12%"></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($tutor as $m) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $m->id_tutor; ?></td>
                  <td><?php echo $m->nama_tutor; ?></td>
                  <td><?php echo $m->username; ?></td>
                  <td>
                    <a href="<?= base_url('tutor/edit/') . $m->id_tutor; ?>" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-edit" title="Ubah Data"></span></a> |
                    <a href="<?= base_url('tutor/hapus/') . $m->id_tutor; ?>" class="btn btn-xs btn-danger">
                        <span class="glyphicon glyphicon-trash" onclick="return confirm('Apakah yakin ingin menghapus tutor dengan nama <?= $m->nama_tutor; ?>?')"></span>
                    </a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
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
          <h4 class="modal-title">Tambah Data Tutor</h4>
        </center>
      </div>
      <!-- /.form dengan modal -->
      <form method="post" action="<?php echo base_url() . 'tutor/tutor_aksi'; ?>">
        <div class="modal-body">
          <div class="form-group">
            <!-- <label class="font-weight-bold">ID Tutor</label> -->
            <input type="hidden" class="form-control" name="id_tutor" placeholder="Masukkan ID Tutor" required="">
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Nama Tutor</label>
            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Tutor" required="">
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required="">
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required="">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Simpan</button>
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
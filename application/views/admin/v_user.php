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
            <h4 class="box-title">Data Pengguna</h4>
          </center>
          <p>
          <h3 class="box-title"></h3>
          <?php echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-data" onclick="$(\'#modal-data-body\').load(\'' . base_url('user/create') . '\')"><span class="fa fa-plus"></span> Tambah</button>' ?>

        </div>
        <!-- /.box-header -->

        <div class="box-body">
          <table id="data" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="1%">No</th>
                <th>ID Pengguna</th>
                <th>Nama Pengguna</th>
                <th>Username</th>
                <th width="12%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($user as $m) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $m->id_user; ?></td>
                  <td><?php echo $m->nama_user; ?></td>
                  <td><?php echo $m->username; ?></td>
                  <td>
                    <a href="<?= base_url('user/edit/') . $m->id_user; ?>" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-edit" title="Ubah Data"></span></a> |
                    <a href="<?= base_url('user/hapus/') . $m->id_user; ?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash" onclick="return confirm('Apakah yakin ingin menghapus user <?= $m->nama_user; ?>?')" title="Hapus"></span></a>
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

<!-- /. modal tambah data pengguna  -->
<div class="modal fade" id="modal-data">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center>
          <h4 class="modal-title">Tambah Data Pengguna</h4>
        </center>
      </div>
      <!-- /.form dengan modal -->
      <form method="post" action="<?php echo base_url() . 'user/user_aksi'; ?>">
        <div class="modal-body">
          <div class="form-group">
            <label class="font-weight-bold">Nama Pengguna</label>
            <input type="text" class="form-control" name="nama_user" placeholder="Masukkan Nama Pengguna" required="">
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
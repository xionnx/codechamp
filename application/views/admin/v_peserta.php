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

            <?= $this->session->flashdata('message'); ?>

             <!-- Default box -->
      <div class="box box-success" style="overflow-x: scroll;">
        <div class="box-header">
          <center><h4 class="box-title">Daftar Peserta Kursus</h4></center><p>
          <h3 class="box-title"></h3>
          <a href="<?php echo base_url('peserta_tambah'); ?>"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#peserta_tambah" ><span class="fa fa-plus"></span> Tambah </button></a>

        </div>
        <!-- /.box-header -->
                
                <div class="box-body" style="overflow-x: scroll;">
                    <table id="data" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Nama Pengguna</th>
                                <th>Materi</th>
                                <th width="7%">Aksi</th>
                                <th>Status </th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($peserta as $d) { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d->nama_user; ?></td>
                                    <td><?php echo $d->nama_materi; ?></td>
                                    <td>
                                        <?php if ($d->skor == null) { ?>
                                            <a href="<?= base_url('peserta/edit/') . $d->id_peserta; ?>" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-edit" title="Ubah Data"></span></a> |
                                            <a href="<?= base_url('peserta/hapus/') . $d->id_peserta; ?>" class="btn btn-xs btn-danger">
                                                <span class="glyphicon glyphicon-trash" onclick="return confirm('Apakah yakin ingin menghapus peserta kursus dengan nama <?= $d->nama_user; ?>?')"></span>
                                            </a>
                                        <?php } else {
                                            echo '-';
                                        }
                                         ?>
                                        
                                    </td>
                                    <td>
                                        <?php if ($d->status_kursus_selesai == "1") {
                                                echo "<span class='btn btn-xs btn-default'> Belum Dikerjakan </span>";
                                            } else if ($d->status_kursus_selesai == "2") {
                                                echo "<span class='btn btn-xs btn-success'> Sudah Dikerjakan </span>";
                                            }
                                            ?>
                                    </td>
                                    
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.col-->

           

            <!-- MODAL CETAK DAFTAR HADIR -->
        </div>
        <!-- ./row -->
</section><!-- /.content -->

<?php
$this->load->view('admin/js');
?>
<!--tambahkan custom js disini-->
<script type="text/javascript">
    $(document).ready(function() {
        $('#data').DataTable({
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    });

    $('.select2').select2();

    $('.alert-message').alert().delay(3000).slideUp('slow');
</script>
<?php
$this->load->view('admin/foot');
?>
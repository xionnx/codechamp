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
            <div class="box box-success" style="overflow-x: scroll;">
                <div class="box-header">
                    <center><h4 class="box-title">Daftar Berita</h4></center>
                </div>
                <form action="" method="get" class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Materi</label>
                            <div class="col-sm-8">
                                <select class="select2 form-control" name="id" required="">
                                    <option selected="selected" disabled="">- Pilih Materi -</option>
                                    <?php foreach ($materi as $mat) { ?>
                                        <option value="<?= $mat->id_materi ?>"><?= $mat->kode_materi; ?> | <?= $mat->nama_materi; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <a href="<?= base_url('soal'); ?>" class="btn btn-default"><span class="fa fa-refresh"></span> Refresh</a>
                                <button type="submit" class="btn btn-primary" title="Filter Data Soal Kursus"><span class="fa fa-filter"></span> Filter</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">

                    </div>
                    <!-- /.box-footer -->
                </form>

            </div>
            <?= $this->session->flashdata('message'); ?>
            <!-- Default box -->
             <div class="box box-success" >
                <div class="box-header">
                <h3 class="box-title"></h3>
                
                <a href="<?= base_url('artikel/v_tambah_artikel') ?>"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><span class="fa fa-plus"></span> Tambah</button></a>
                <a href="<?= base_url('artikel') ?>"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Lihat Artikel</button></a>
            </div>
                    <table id="data" class="table table-bordered table-striped" style="padding: 5px;">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th width="20%">Judul Artikel</th>
                                <th width="20%">Gambar Artikel</th>
                                <th>Isi Artikel</th>
                                <th width="13%">Author</th>
                                <th width="8%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($artikel as $art) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $art->judul_artikel; ?></td>
                                    <td><img src="<?= base_url() . 'assets/dist/img/img_artikel/' . $art->gambar_artikel; ?>" alt="Gambar Artikel" width="150" height="150"></td>
                                    <td><?= $art->isi_artikel; ?></td>
                                    <td><b><?= $art->nama_user; ?></b></td>
                                    <td>
                                        <a href="<?= base_url() . 'artikel/info/' . $art->id_artikel; ?>" class="btn btn-xs btn-success">Lihat</a> |
                                        <a href="<?= base_url() . 'artikel/edit/' . $art->id_artikel; ?>" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-edit" title="Ubah"></span></a> |
                                        <a href="<?= base_url() . 'artikel/hapus/' . $art->id_artikel; ?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash" onclick="return confirm('Apakah yakin ingin menghapus artikel dengan judul <?= $art->judul_artikel; ?>?')" title="Hapus"></span></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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
        $('#data').dataTable();
    });
    $('.select2').select2();
    $('.alert-message').alert().delay(3000).slideUp('slow');
    $('.alert-dismissible').alert().delay(3000).slideUp('slow');
</script>
<?php
$this->load->view('admin/foot');
?>
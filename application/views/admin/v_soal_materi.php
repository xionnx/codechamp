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
                    <center><h4 class="box-title">Daftar Soal Materi</h4></center>
                </div>
                <form action="" method="get" class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Materi</label>
                            <div class="col-sm-8">
                                <select class="select2 form-control" name="id" required="">
                                    <option selected="selected" disabled="">- Pilih Materi -</option>
                                    <?php foreach ($kelas as $a) { ?>
                                        <option value="<?= $a->id_materi ?>"><?= $a->kode_materi; ?> | <?= $a->nama_materi; ?></option>
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
                
                <a href="<?= base_url('soal') ?>"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><span class="fa fa-plus"></span> Tambah</button></a>

                <a href="<?php echo base_url('materi'); ?>"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#" ><span ></span>Data Materi</button></a>
            </div>
                    <table id="data" class="table table-bordered table-striped" style="padding: 5px;">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th width="10%">Kode Materi</th>
                                <th width="20%">Nama Materi</th>
                                <th>Soal Materi</th>
                                <th width="13%">Jawaban Benar</th>
                                <th width="8%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($soal_materi as $d) { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d->kode_materi; ?></td>
                                    <td><?php echo $d->nama_materi; ?></td>
                                    <td>
                                        <?php echo $d->pertanyaan; ?>

                                        <ol type="A">
                                            <li>
                                                <?php if ('A'== $d->kunci_jawaban) {
                                                    echo "<b>";
                                                    echo $d->jwb_a;
                                                    echo "</b>";
                                                } else {
                                                    echo $d->jwb_a;
                                                }?>
                                            </li>
                                            <li>
                                                <?php if ('B'== $d->kunci_jawaban) {
                                                    echo "<b>";
                                                    echo $d->jwb_b;
                                                    echo "</b>";
                                                } else {
                                                    echo $d->jwb_b;
                                                }?>
                                            </li>
                                            <li>
                                                <?php if ('C'== $d->kunci_jawaban) {
                                                    echo "<b>";
                                                    echo $d->jwb_c;
                                                    echo "</b>";
                                                } else {
                                                    echo $d->jwb_c;
                                                }
                                                 ?>    
                                            </li>
                                            <li>
                                                <?php if ('D'== $d->kunci_jawaban) {
                                                    echo "<b>";
                                                    echo $d->jwb_d;
                                                    echo "</b>";
                                                } else {
                                                    echo $d->jwb_d;
                                                }
                                                 ?>    
                                            </li>
                                        </ol>
                                    </td>
                                    <td><b><?php echo $d->kunci_jawaban; ?></b></td>
                                    <td>
                                        <a href="<?= base_url() . 'soal_materi/edit/' . $d->id_soal_materi; ?>" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-edit" title="Ubah"></span></a> |
                                        <a href="<?= base_url() . 'soal_materi/hapus/' . $d->id_soal_materi; ?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash" onclick="return confirm('Apakah yakin data soal ini akan di hapus?')" title="Hapus"></span></a>
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
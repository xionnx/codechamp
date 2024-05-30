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

            <div class="box box-success" style="overflow-x: scroll;">
                <div class="box-header">



                    <!-- /. modal  -->
                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <center>
                                        <h4 class="modal-title">Tambah Materi</h4>
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
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
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

                    <center>
                        <div class="box-title">Tambah Artikel</div>
                    </center>

                </div><!-- /.box-header -->
                <form action="<?= base_url('artikel/tambah_artikel'); ?>" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Materi</label>
                                <div class="col-sm-8">
                                    <select class="select2 form-control" name="nama_materi" required="">
                                        <option selected="selected" disabled="" value="">- Pilih Materi -</option>
                                        <?php foreach ($materi as $a) { ?>
                                            <option value="<?= $a->id_materi ?>"><?= $a->kode_materi; ?> | <?= $a->nama_materi; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Gambar Artikel</label>
                                <div class="col-sm-9">
                                    <input type="file" name="gambar_artikel" class="form-control" required></input>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pengunggah</label>
                                <div class="col-sm-9">
                                    <input type="text" value="<?= $this->session->userdata('nama'); ?>" disabled readonly></input>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Judul Artikel</label>
                                <div class="col-sm-8">
                                    <input type="text" style="width: 100%" name="judul_artikel" required></input>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tulis Isi Artikel</label>
                                <div class="col-sm-9">
                                    <textarea name="isi_artikel" class="soal" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tanggal Unggah</label>
                                <div class="col-sm-10">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="date" name="tanggal_unggah" placeholder="2024-05-30" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10">
                                    <button type="button" class="btn btn-dark btn-flat" onclick="return history.go(-1)" title="Kembali ke halaman sebelumnya"><span class="fa fa-arrow-left"></span> Kembali</button>
                                    <button type="submit" class="btn btn-primary btn-flat" title="Tambah Data Artikel"><span class="fa fa-save"></span> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
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

    $('.select2').select2();

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

    $('.alert-message').alert().delay(3000).slideUp('slow');
</script>


<?php
$this->load->view('admin/foot');
?>
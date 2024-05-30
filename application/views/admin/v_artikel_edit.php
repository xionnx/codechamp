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
            <!-- Tampilan untuk alert -->


            <?php foreach ($artikel as $art) { ?>
                <!-- TUTUP Tampilan untuk alert -->
                <div class="box box-success" style="overflow-x: scroll;">
                    <form action="<?= base_url('artikel/update_artikel'); ?>" method="post" enctype="multipart/form-data">
                        <div class="box-header">
                            <center>
                                <h4 class="box-title">Edit Data Artikel</h4>
                            </center>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Materi</label>
                                    <input type="hidden" name="id" value="<?= $art->id_artikel ?>">
                                    <div class="col-sm-9">
                                        <select class="select2 form-control" name="nama_materi" required="">
                                            <option selected="selected" disabled="">- Pilih Materi -</option>
                                            <?php foreach ($materi as $a) { ?>
                                                <option value="<?= $a->id_materi ?>" <?php if ($art->nama_materi == $a->nama_materi) {
                                                                                            echo "selected='selected'";
                                                                                        } ?>><?= $a->kode_materi; ?> | <?= $a->nama_materi; ?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Judul Artikel</label>
                                    <div class="col-sm-9">
                                        <input type="text" style="width: 100%" name="judul_artikel" value="<?= $art->judul_artikel; ?>" required></input>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Gambar Artikel</label>
                                    <div class="col-sm-9">
                                        <a href="<?= base_url() . 'assets/dist/img/img_artikel/' . $art->gambar_artikel; ?>" target="_blank">
                                            <img src="<?= base_url() . 'assets/dist/img/img_artikel/' . $art->gambar_artikel; ?>" width="150" height="150" style="border-radius: 10px;">
                                        </a>
                                        <input type="file" name="gambar_artikel" class="form-control" style="margin-top: 5px;"></input>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Pengunggah</label>
                                    <div class="col-sm-9">
                                        <input type="text" style="width: 70%" value="<?= $this->session->userdata('nama'); ?>" disabled></input>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tulis Isi Artikel</label>
                                    <div class="col-sm-10">
                                        <textarea name="isi_artikel" class="soal"><?= $art->isi_artikel; ?></textarea>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label class="col-sm-2 control-label">Tulis Isi Artikel</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="isi_artikel" class="isi_artikel" value="<?= $art->isi_artikel; ?>" required></input>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tanggal Unggah</label>
                                    <div class="col-sm-10">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="date" name="tanggal_unggah" value="<?= $art->tanggal_unggah; ?>" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"></label>
                                    <div class="col-sm-10">
                                        <button type="button" class="btn btn-default" onclick="return history.go(-1)" title="Kembali ke halaman sebelumnya"><span class="fa fa-arrow-left"></span> Kembali</button>
                                        <button type="submit" class="btn btn-primary" title="Tambah Data Artikel"><span class="fa fa-save"></span> Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-footer -->
                        <div class="box-footer">

                        </div>
                    </form>
                </div>
            <?php } ?>
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
    $('.alert-message').alert().delay(3000).slideUp('slow');
</script>


<?php
$this->load->view('admin/foot');
?>
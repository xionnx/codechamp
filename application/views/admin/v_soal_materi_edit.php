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


            <?php foreach ($soal as $s) { ?>
                <!-- TUTUP Tampilan untuk alert -->
                <div class="box box-success" style="overflow-x: scroll;">
                    <form action="<?= base_url('soal_materi/update'); ?>" method="post" enctype="multipart/form-data">
                        <div class="box-header">
                            <center>
                                <h4 class="box-title">Edit Data Soal Materi</h4>
                            </center>
                            <p>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Materi</label>
                                    <input type="hidden" name="id" value="<?= $s->id_soal_materi ?>">
                                    <div class="col-sm-10">
                                        <select class="select2 form-control" name="nama_materi" required="">
                                            <option selected="selected" disabled="">- Pilih Materi -</option>
                                            <?php foreach ($materi as $a) { ?>
                                                <option value="<?= $a->id_materi ?>" <?php if ($s->nama_materi == $a->nama_materi) {
                                                                                            echo "selected='selected'";
                                                                                        } ?>><?= $a->kode_materi; ?> | <?= $a->nama_materi; ?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tulis Soal Materi</label>
                                    <div class="col-sm-10">
                                        <textarea name="soal" class="soal" required><?= $s->pertanyaan; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Jawaban A</label>
                                    <div class="col-sm-10">
                                        <textarea rows="2" style="width: 100%" name="jwb_a" required><?= $s->jwb_a; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Jawaban B</label>
                                    <div class="col-sm-10">
                                        <textarea rows="2" style="width: 100%" name="jwb_b" required><?= $s->jwb_b; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Jawaban C</label>
                                    <div class="col-sm-10">
                                        <textarea rows="2" style="width: 100%" name="jwb_c" required><?= $s->jwb_c; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Jawaban D</label>
                                    <div class="col-sm-10">
                                        <textarea rows="2" style="width: 100%" name="jwb_d" required><?= $s->jwb_d; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Jawaban Benar</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="kunci">
                                            <option <?php if ($s->kunci_jawaban == 'A') {
                                                        echo "selected='selected'";
                                                    } ?>>A</option>
                                            <option <?php if ($s->kunci_jawaban == 'B') {
                                                        echo "selected='selected'";
                                                    } ?>>B</option>
                                            <option <?php if ($s->kunci_jawaban == 'C') {
                                                        echo "selected='selected'";
                                                    } ?>>C</option>
                                            <option <?php if ($s->kunci_jawaban == 'D') {
                                                        echo "selected='selected'";
                                                    } ?>>D</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"></label>
                                    <div class="col-sm-10">
                                        <button type="button" class="btn btn-default btn-flat" onclick="return history.go(-1)" title="Kembali ke halaman sebelumnya"><span class="fa fa-arrow-left"></span> Kembali</button>
                                        <button type="submit" class="btn btn-primary btn-flat" title="Tambah Data Soal Kursus"><span class="fa fa-save"></span> Simpan</button>
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
    $('.select2').select2();
    $('.alert-message').alert().delay(3000).slideUp('slow');
</script>


<?php
$this->load->view('admin/foot');
?>
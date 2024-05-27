<?php
$this->load->view('kursus/head');
?>

<?php
$this->load->view('kursus/topbar');
?>
<!-- Content Header (Page header) -->


<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
               <center> <h3 class="box-title">Soal Materi</h3> </center>
            </div><!-- /.box-header -->
            <div class="box-body" style="overflow-y: scroll;height: 525px;">
                <form id="formSoal" role="form" action="" method="post">

                    <input type="hidden" name="id_peserta" value="<?php echo $id['id_peserta']; ?>">
                    <input type="hidden" name="jumlah_soal" value="<?php echo $total_soal; ?>">

                    <?php $no = 0;
                    foreach ($soal as $s) {
                        $no++ ?>
                        <div class="form-group">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <td width="1%"><?php echo $no; ?>.</td>
                                        <td><?php echo $s->pertanyaan; ?>
                                            <input type='hidden' name='soal[]' value='<?php echo $s->id_soal_materi; ?>' />
                                            A. <?php echo $s->jwb_a; ?><br>
                                            B. <?php echo $s->jwb_b; ?><br>
                                            C. <?php echo $s->jwb_c; ?><br>
                                            D. <?php echo $s->jwb_d; ?><br>
                                            <p>Jawaban Benar : <?= $s->kunci_jawaban ?></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    <?php } ?>
                </form>

                <a href="<?= base_url('jadwal_kursus'); ?>" class="btn btn-primary btn-flat pull-right">Kembali</a>

                <div class="box-footer">

                </div>
            </div><!-- /.box-body -->
        </div>
    </div>    
</div>
    

</section><!-- /.content -->

<?php
$this->load->view('kursus/js');
?>

<?php
$this->load->view('kursus/foot');
?>
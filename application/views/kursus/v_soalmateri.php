<?php
$this->load->view('kursus/head');
?>

<!--tambahkan custom css disini-->
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
                <form id="formSoal" role="form" action="<?php echo base_url(); ?>ruang_kursus/jawab_aksi" method="post" onsubmit="return confirm('Anda Yakin ?')">

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
                                            <input type="radio" name="jawaban[<?php echo $s->id_soal_materi; ?>]" value="A" required /> <?php echo $s->a; ?><br>
                                            <input type="radio" name="jawaban[<?php echo $s->id_soal_materi; ?>]" value="B" required /> <?php echo $s->b; ?><br>
                                            <input type="radio" name="jawaban[<?php echo $s->id_soal_materi; ?>]" value="C" required /> <?php echo $s->c; ?><br>
                                            <input type="radio" name="jawaban[<?php echo $s->id_soal_materi; ?>]" value="D" required /> <?php echo $s->d; ?><br>
                                            <input type="radio" name="jawaban[<?php echo $s->id_soal_materi; ?>]" value="E" required /> <?php echo $s->e; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    <?php } ?>
                    <button type="submit" class="btn btn-primary btn-flat pull-right">Simpan</button>
                </form>
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

<!--tambahkan custom js disini-->

<script type="text/javascript">
    function waktuHabis(){
        alert('Waktu Anda telah habis, Jawaban anda akan disimpan secara otomatis.');
        var formSoal = document.getElementById("formSoal"); 
        formSoal.submit(); 
    }
    function hampirHabis(periods){
        if($.countdown.periodsToSeconds(periods) == 60){
            $(this).css({color:"red"});
        }
    }
    $(function(){
        var waktu = '<?= $max_time; ?>'; 
        var sisa_waktu = waktu - <?php echo $lewat ?>;
        var longWayOff = sisa_waktu;
        $("#counter").countdown({
            until: longWayOff,
            compact:true,
            onExpiry:waktuHabis,
            onTick: hampirHabis
        });
    });


window.location.hash="no-back-button";
window.location.hash="Again-No-back-button";
window.onhashchange=function(){window.location.hash="no-back-button";}
</script>


<?php
$this->load->view('kursus/foot');
?>
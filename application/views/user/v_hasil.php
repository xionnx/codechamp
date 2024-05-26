<?php 
$this->load->view('user/head');
?>

<!--tambahkan custom css disini-->

<?php
$this->load->view('user/topbar');
$this->load->view('user/sidebar');
?>

<!-- Content Header (Page header) -->


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            

            <!-- Default box -->
            <div class="box box-success box-solid" style="overflow-x: scroll;">
                <div class="box box-header with-border">
                    <h3 class="box-title">Hasil Pengerjaan Materi</h3>
                </div>
              <div class="box-body">
                <table id="data" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th> Pelajaran</th>
                            <th> Benar</th>
                            <th> Salah</th>
                            <th> Skor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                        foreach($hasil as $d) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $d->nama_materi; ?></td>
                                <td>
                                    <?php
                                    if($d->benar == ''){
                                        echo "<span class='btn btn-xs btn-warning'>Belum Dikerjakan</span>";
                                    }else {
                                        echo $d->benar;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if($d->salah == ''){
                                        echo "<span class='btn btn-xs btn-warning'>Belum Dikerjakan</span>";
                                    }else {
                                        echo $d->salah;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if($d->skor == ''){
                                        echo "<span class='btn btn-xs btn-warning'>Belum Dikerjakan</span>";
                                    }else {
                                        echo $d->skor;
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
</div>
<!-- ./row -->
</section><!-- /.content -->

<?php 
$this->load->view('user/js');
?>

<!--tambahkan custom js disini-->

<script type="text/javascript">

	$(function(){
		$('#data').dataTable();
	});

	$('.alert-message').alert().delay(3000).slideUp('slow');

</script>

<?php
$this->load->view('user/foot');
?>


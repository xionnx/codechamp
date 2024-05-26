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
        </div>

                      <!-- /. modal tambah data user  -->

        <div class="col-md-12">
            <div class="box box-success" style="overflow-x: scroll;">
                <form class="form-horizontal" action="<?=base_url('peserta_tambah/insert_');?>" method="post">
                   <div class="box-body">
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Materi</label>
                      <div class="col-sm-10">
                        <select class="select2 form-control" name="materi" required="">
                            <option selected="selected" disabled="" value="">- Pilih Materi -</option>
                            <?php foreach($materi as $a) { ?>
                              <option value="<?=$a->id_materi?>"><?= $a->kode_materi;?> | <?= $a->nama_materi;?></option>
                            <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Tanggal Kursus</label>
                      <div class="col-sm-10">
                          <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="date" name="tanggal" placeholder="2019-12-30" autocomplete="off" required="">
                          </div>
                      </div>
                    </div>

                    
                    
                  </div>
                  <!-- /.box-body -->
                  
                    <div class="box-body">
                      <table id="data" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th width="1%">No</th>
                            <th>Nama Pengguna</th>
                            <th width="13%">
                              <input type="checkbox" class="check-all" id="cek-semua" required/> Pilih Semua
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no=1;
                          foreach($user as $d) { ?>
                            <tr>
                              <td><?php echo $no++; ?></td>
                              <td><?php echo $d->nama_user; ?></td>
                              <td>
                                <input type="checkbox" name="id[]" value="<?php echo $d->id_user; ?>"/>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    
                  </div>
                    
                  <div class="box-footer">
                     <a href="<?=base_url('peserta')?>" class="btn btn-default btn-flat"><span class="fa fa-arrow-left"></span> Kembali</a>
                  <button type="submit" class="btn btn-primary btn-flat" ><span class="fa fa-save"></span> Simpan</button>
                  </div>
                  <!-- /.box-footer -->
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
    

  $('#cek-semua').click(function(){
    $('input:checkbox').prop('checked', this.checked);
  })



	$(function(){
		$('#data').dataTable();
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

	$('.alert-dismissible').alert().delay(3000).slideUp('slow');

</script>


<?php
$this->load->view('admin/foot');
?>


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

    <div class="callout callout-info">
        <h4>Selamat Datang, <?php echo $this->session->userdata('nama');?> </h4>
        
    </div>

    <div class="box box-success box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Petunjuk Penggunaan Pengerjaan Kursus</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <dl>
                <dt></dt>
                <dd>
                    <ol><br>
                        <li><b>Kerjakan Materi</b></li>
                        di TAB Kerjakan Materi Apabila di ruang tersebut tidak tersedia Materi silahkan hubungin administrator untuk mendapatkan informasi lebih lanjut.
                        selanjutnya ketika anda sudah memiliki materi yang perlu dikerjakan, silahkan anda klik tombol <b>Mulai</b> yang tersedia ketika waktu telah menunjukan mulainya waktu pengerjaan.
                        <li><b>Hasil Pengerjaan Materi</b></li>
                        di TAB Hasil Pengerjaan Materi, anda dapat melihat secara langsung hasil pengerjaan materi yang telah anda lakukan di Ruang Pengerjaan Materi.
                        <li><b>Ganti Password</b></li>
                        di TAB Ganti Password, anda dapat mengganti password sesuai keinginan anda setelah anda mendapatkan password default dari pihak administrator. ketika anda lupa password, anda dapat menghubungi pihak administrator agar mendapatkan password terbaru.
                    </ol>
                </dd>
            </dl>
        </div><!-- /.box-body -->
    </div>

</section><!-- /.content -->
  
<?php 
$this->load->view('user/js');
?>

<!--tambahkan custom js disini-->

<script type="text/javascript">

	$(function(){
		$('#data-tables').dataTable();
	});

	$('.alert-message').alert().delay(3000).slideUp('slow');

</script>


<?php
$this->load->view('admin/foot');
?>


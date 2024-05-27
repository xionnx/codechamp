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

    <div class="callout callout-danger">
        <h4>Selamat Datang, <?php echo $this->session->userdata('nama'); ?> </h4>

    </div>

    <div class="box box-success box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Petunjuk Penggunaan</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
         <dl>

                <dd>
                    <ol>
                        <li><b>Kelola Soal Materi</b></li>
                        di TAB Kelola Soal Materi, anda dapat melihat daftar soal materi, dengan memfilter materi apa yang ingin ada lihat. dan anda bisa menambah, edit, dan hapus materi dan menambah data pelaran sesuai materi anda
                        <li><b>Kelola Data User</b></li>
                        di TAB Kelola Data User, anda dapat melihat daftar user. Anda bisa menambah, edit, dan hapus data user.
                        <li><b>Kelola Data Tutor</b></li>
                        di TAB Kelola Data Tutor, anda dapat melihat daftar user. Anda bisa menambah, edit, dan hapus data tutor.
                        <li><b>Kelola Soal Materi</b></li>
                        di TAB Kelola Soal Materi, anda dapat melihat daftar soal materi, dengan memfilter materi apa yang ingin ada lihat. dan anda bisa menambah, edit, dan hapus materi dan menambah data pelaran sesuai materi anda
                        <li><b>Melihat Hasil Pengerjaan Materi</b></li>
                        di TAB Hasil Pengerjaan Materi, anda dapat melihat hasil pengerjaan materi, dengan memfilter materi apa yang ingin ada lihat.
                        <li><b>Ganti Password</b></li>
                        di TAB Ganti Password, anda dapat mengganti password sesuai keinginan anda setelah anda mendapatkan password default dari pihak administrator. ketika anda lupa password, anda dapat menghubungi pihak administrator agar mendapatkan password terbaru.
                    </ol>
                </dd>

            </dl>

</section><!-- /.content -->

<?php
$this->load->view('admin/js');
?>

<!--tambahkan custom js disini-->

<script type="text/javascript">
    $(function() {
        $('#data-tables').dataTable();
    });

    $('.alert-message').alert().delay(3000).slideUp('slow');
</script>


<?php
$this->load->view('admin/foot');
?>
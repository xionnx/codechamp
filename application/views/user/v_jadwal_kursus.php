<?php
$this->load->view('user/head');
?>
<!--tambahkan custom css disini-->

<?php
$this->load->view('user/topbar');
$this->load->view('user/sidebar');
date_default_timezone_set('Asia/Jakarta');
?>
<!-- Content Header (Page header) -->

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
          

            <!-- Default box -->
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Daftar materi tersedia</h3>
                </div>

                <div class="box-body" style="overflow-x: scroll;">

                    <table id="data" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Kode Materi</th>
                                <th>Nama Materi</th>
                                <th width="10%">Aksi</th>
                               
                            </tr>

                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($peserta as $d) { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d->kode_materi; ?></td>
                                    <td><?php echo $d->nama_materi; ?></td>
                                    <td>
                                        <?php if ($d->status_kursus_selesai == 0) {
                                                echo "<span> Belum Dimulai </span>";
                                            } else if ($d->status_kursus_selesai == 2) {
                                                // echo "<span> Sudah Mengikuti Kursus </span>";
                                                echo "<a href='" . 'ruang_kursus/lihatkursusselesai/' . "$d->id_peserta' class='btn btn-xs btn-success';'>Lihat Hasil</a>";
                                            } else if ($d->status_kursus_selesai == 1) {
                                                if ($d->status_kursus_selesai == 1) {
                                                    echo "<a href='" . 'ruang_kursus/soal/' . "$d->id_peserta' class='btn btn-xs btn-success';'>Mulai Mengerjakan</a>";
                                                }
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
    $('.alert-message').alert().delay(3000).slideUp('slow');
</script>

<?php
$this->load->view('admin/foot');
?>
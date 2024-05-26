<section class="dark">
	<div class="container py-2">
		<div class="text-center text-dark"><h1>Info Artikel pada Codechamp</h1></div>
        
        <button type="button" class="btn btn-dark btn-flat" onclick="return history.go(-1)" title="Kembali ke halaman sebelumnya"><span class="fa fa-arrow-left"></span> Kembali ke halaman sebelumnya</button>
        <?php foreach ($artikel as $art) { ?>
            <div class="col-md-12 mx-auto">
                <h1 style="font-weight: 600; margin-top: 100px;"><?= $art->judul_artikel; ?></h1><br/>
                <div class="py-3 text-dark flex items-center justify-center">
                    <small class="mr-3 flex flex-row items-center">
                    <i class="fas fa-calendar-alt mr-1"></i>
                    <?= $art->tanggal_unggah; ?>
                    </small>
                    <small><i class="fas fa-user mr-1"></i><?= $art->nama_user; ?></small>
                    <small><i class="fas fa-book ml-3 mr-2"></i><?= $art->nama_materi; ?></small>
                </div>
            </div>

            <center><img src="<?= base_url('assets/dist/img/img_artikel/') . $art->gambar_artikel; ?>" class="mx-auto" style="background-size: cover; background-position: center; max-height: 300px; width: 100%; object-fit: cover; object-position: 10% 20%;" alt="Image Title" /></center>

            <div class="col-lg-12 p-2 p-sm-4 mx-auto">
                <div class="text-secondary">
                    <p class="my-2" style="line-height: 2;"><?= $art->isi_artikel; ?></p>
                    <br><br>
                </div>
            </div>
        <?php } ?>

	</div>
</section>
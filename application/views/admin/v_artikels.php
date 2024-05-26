<section class="dark">
	<div class="container py-2">
		<div class="text-center text-dark"><h1>Daftar artikel pada Codechamp</h1></div>
        <button type="button" class="btn btn-dark btn-flat" onclick="return history.go(-1)" title="Kembali ke halaman sebelumnya"><span class="fa fa-arrow-left"></span> Kembali ke halaman sebelumnya</button>

        <?php foreach ($artikel as $art) { ?>
            <article class="postcard dark purple mt-5">
                <a class="postcard__img_link" href="#">
                    <img class="postcard__img" src="<?= base_url('assets/dist/img/img_artikel/' . $art->gambar_artikel)?>" alt="Image Title" />
                </a>
                <div class="postcard__text t-light">
                    
                    <h1 class="postcard__title purple mt-2 ml-1"><a href="<?= base_url('artikel/info/') . $art->id_artikel; ?>"><?= $art->judul_artikel; ?></a></h1>
                    <div class="postcard__subtitle small">
                        <time datetime="2020-05-25 12:00:00">
                            <i class="fas fa-calendar-alt mr-2 ml-1"></i><?= $art->tanggal_unggah; ?>
                        </time>
                    </div>
                    <div class="postcard__bar ml-1"></div>
                    <div class="postcard__preview-txt mt-3 ml-1"><?= substr($art->isi_artikel, 0, 300); ?> <b>Kunjungi detail artikel untuk baca lebih lengkapnya...</b></div>
                    <ul class="postcard__tagbox">
                        <li class="tag__item"><i class="fas fa-book mr-2"></i><?= $art->nama_materi; ?></li>
                        <li class="tag__item"><i class="fas fa-user mr-2"></i><?= $art->nama_user; ?></li>
                    </ul>
                </div>
            </article>
        <?php } ?>

	</div>
</section>
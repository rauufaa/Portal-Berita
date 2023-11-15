<h1 class="bg-purple-300 text-7xl">Berita Hari Ini</h1>
<div class=" container">
    <?php foreach ($data['berita'] as $berita) : ?>
        <article class=" w-96 ">
            <h4 class=" text-3xl"><?= $berita['judul_berita'] ?></h4>
            <p><?= $berita['isi_berita'] ?></p>
            <a href="<?= BASEURL ?>/berita/hapusBerita/<?= $berita['id_berita'] ?>">Hapus</a>
        </article>
    <?php endforeach; ?>
</div>
<button class="middle none center rounded-lg bg-pink-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" data-ripple-light="true">
    Button
</button>
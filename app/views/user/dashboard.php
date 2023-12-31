<div class="max-w-6xl flex justify-between items-center">
    <form action="<?= BASEURL ?>/manajemen/jadwal" method="post" class="flex m-0">
        <div class="flex justify-between items-center p-4 gap-3">
            <div class=" bg-white  ">

                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" name="search-jadwal" id="search-jadwal" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500      " placeholder="Search for items">
                </div>


            </div>
            <div class="p-5">
                <button type="submit" name="submit-search" class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center">
                    <svg class="w-3 h-3 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Search Jadwal</span>
                </button>
            </div>
        </div>
    </form>
    <div class="p-4">
        <a href="<?= BASEURL ?>/berita/tambah" class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center     ">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
            </svg>
            <span class="sr-only">Add Pesawat</span>
        </a>
    </div>
</div>

<?php foreach ($data['berita'] as $berita) : ?>
    <div class="w-full p-5 flex items-center bg-white border border-gray-200 rounded-lg shadow  ">
        <a href="<?= BASEURL."/". strtolower($berita['nama_kategori']) . "/" ?><?= str_replace(" ", "-", $berita['judul_berita']) . "-" . $berita['id_berita'] ?>" class="">
            <img class="rounded-md w-52" src="<?= BASEURL . '/assets/' . $berita['nama_kategori'] . "/" . $berita['nama_tumbnail'] ?>" alt="" />
        </a>
        <div class="p-5">
            <a href="<?= BASEURL."/". strtolower($berita['nama_kategori']) . "/" ?><?= str_replace(" ", "-", $berita['judul_berita']) . "-" . $berita['id_berita'] ?>">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 "><?= $berita['judul_berita'] ?></h5>
            </a>
            <a href="<?= BASEURL."/". strtolower($berita['nama_kategori']) . "/" ?><?= str_replace(" ", "-", $berita['judul_berita']) . "-" . $berita['id_berita'] ?>" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300   ">
                Read more
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
            <a href="<?= BASEURL . "/user/hapusBerita/" . $berita['id_berita'] ?>" rel="noopener noreferrer" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300   ">
                Delete Berita
                <svg xmlns="http://www.w3.org/2000/svg" class="rtl:rotate-180 w-3.5 h-3.5 ms-2" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="arcs">
                    <polyline points="3 6 5 6 21 6"></polyline>
                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                    <line x1="10" y1="11" x2="10" y2="17"></line>
                    <line x1="14" y1="11" x2="14" y2="17"></line>
                </svg>
            </a>

            <?php if ($berita['edit'] < 2) : ?>

                <a href="<?= BASEURL ?>/berita/edit/<?= str_replace(" ", "-", $berita['judul_berita']) . "-" . $berita['id_berita'] ?>" rel="noopener noreferrer" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300   ">
                    Edit
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                        <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                    </svg>
                    
                </a>
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; ?>
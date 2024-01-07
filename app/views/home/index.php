<div id="default-carousel" class="relative max-w-6xl m-auto" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
        <!-- Item 1 -->
        <?php if (!isset($data['berita']['search'])) : ?>
            <?php foreach ($data['berita']['carousel'] as $berita) : ?>
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="absolute bottom-6 left-12 p-3 text-white z-10">
                        <h2 class="text-lg"><?= $berita['judul_berita'] ?></h2>
                        <div class=" flex flex-col md:flex-row md:items-center">

                            <a href="#"><?= $berita['nama_kategori'] ?></a>

                            <p class="before:content-[''] before:bg-white before:w-1.5 before:h-1.5 before:block before:rounded-lg before:absolute before:my-auto relative before:top-0 before:bottom-0 before:-left-4 ml-6"><?= $berita['tanggal_terbit'] ?></p>

                        </div>

                        <!-- <h2 class="text-lg"><?= $berita['judul_berita'] ?></h2> -->
                    </div>
                    <img src="<?= BASEURL ?>/assets/<?= $berita['nama_kategori'] ?>/<?= $berita['nama_tumbnail'] ?>" class="brightness-50 absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="content p-2 flex flex-col flex-grow">

                <section class=" flex justify-center overflow-hidden">
                    <h2 class="text-4xl font-serif  px-9"><span class="relative before:content-[''] before:bg-black before:absolute before:w-96 before:h-1 before:my-auto before:top-0 before:bottom-0 before:left-full px-6 after:content-[''] after:bg-black after:absolute after:w-96 after:h-1 after:my-auto after:top-0 after:bottom-0 after:right-full">Pencarian</span></h2>
                </section>


                <div class="pt-3 grid grid-flow-row gap-3">
                    <?php foreach ($data['berita']['search'] as $berita) : ?>
                        <article class="flex flex-row items-center bg-white border border-gray-200 rounded-lg shadow  hover:bg-gray-100   ">
                            <img class="object-cover w-20 rounded-lg h-auto m-3" src="<?= BASEURL ?>/assets/politik/<?= $berita['nama_tumbnail'] ?>" alt="">
                            <!-- <h5 class="mb-2 text-base font-bold tracking-tight text-gray-900 ">Noteworthy technology acquisitions 2021</h5> -->
                            <div class="flex flex-col justify-between p-4 leading-normal">

                                <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900 "><?= $berita['judul_berita'] ?></h5>
                                <div class="flex flex-col md:flex-row md:items-center ">

                                    <a href="#" class="text-red-500"><?= $berita['nama_kategori'] ?></a>
                                    <p class="before:content-[''] before:bg-black before:w-1.5 before:h-1.5 before:block before:rounded-lg before:absolute before:my-auto relative before:top-0 before:bottom-0 before:-left-4 ml-6"><?= $berita['tanggal_terbit'] ?></p>

                                </div>
                            </div>


                        </article>
                    <?php endforeach; ?>
                    <!--  -->

                </div>

            </div>
        <?php endif; ?>

    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <?php $index = 0 ?>
        <?php $aria = true ?>
        <?php foreach ($data['berita']['carousel'] as $berita) : ?>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="<?= $aria ?>" aria-label="Slide <?= $index ?>" data-carousel-slide-to="<?= $index ?>"></button>
            <!-- <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button> -->
            <?php $index++ ?>
            <?php $aria = false ?>
        <?php endforeach; ?>
    </div>

    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 bottom-0 z-20 flex items-center justify-center  px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30  group-hover:bg-white/50  group-focus:ring-4 group-focus:ring-white  group-focus:outline-none">
            <svg class="w-4 h-4 text-white  rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 bottom-0 z-20 flex items-center justify-center px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30  group-hover:bg-white/50  group-focus:ring-4 group-focus:ring-white  group-focus:outline-none">
            <svg class="w-4 h-4 text-white  rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>




<!-- Berita Populer Section -->
<div class="grid grid-cols-2 sm:grid-cols-3  max-w-6xl m-auto p-5 gap-3">
    <section class="col-span-2 sm:col-span-3 flex justify-center overflow-hidden">
        <h2 class="text-4xl font-serif  px-9"><span class="relative before:content-[''] before:bg-black before:absolute before:w-96 before:h-1 before:my-auto before:top-0 before:bottom-0 before:left-full px-6 after:content-[''] after:bg-black after:absolute after:w-96 after:h-1 after:my-auto after:top-0 after:bottom-0 after:right-full">Berita Populer</span></h2>
    </section>

    <?php foreach ($data['berita']['beritaPopuler'] as $berita) : ?>
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow  ">
            <a href="<?= BASEURL . "/" . strtolower($berita['nama_kategori']) . "/" ?><?= str_replace(" ", "-", $berita['judul_berita']) . "-" . $berita['id_berita'] ?>" class="flex justify-center">
                <img class="p-3 rounded-t-lg w-36" src="<?= BASEURL ?>/assets/<?= strtolower($berita['nama_kategori']) ?>/<?= $berita['nama_tumbnail'] ?>" alt="" />
            </a>
            <div class="p-5">
                <div class="flex flex-col md:flex-row md:items-center">

                    <a href="<?= BASEURL ?>/<?= strtolower($berita['nama_kategori']) ?>" class="text-red-500"><?= $berita['nama_kategori'] ?></a>
                    <p class="before:content-[''] before:bg-black before:w-1.5 before:h-1.5 before:block before:rounded-lg before:absolute before:my-auto relative before:top-0 before:bottom-0 before:-left-4 ml-6"><?= $berita['tanggal_terbit'] ?></p>

                </div>

                <a href="<?= BASEURL . "/" . strtolower($berita['nama_kategori']) . "/" ?><?= str_replace(" ", "-", $berita['judul_berita']) . "-" . $berita['id_berita'] ?>">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 "><?= $berita['judul_berita'] ?></h5>
                </a>
            </div>
        </div>
    <?php endforeach; ?>

</div>


<!-- Berita  -->

<div class="max-w-6xl p-5 flex justify-between m-auto items-start">

    <div class="content p-2 flex flex-col flex-grow">

        <section class=" flex justify-center overflow-hidden">
            <h2 class="text-4xl font-serif  px-9"><span class="relative before:content-[''] before:bg-black before:absolute before:w-96 before:h-1 before:my-auto before:top-0 before:bottom-0 before:left-full px-6 after:content-[''] after:bg-black after:absolute after:w-96 after:h-1 after:my-auto after:top-0 after:bottom-0 after:right-full">Berita Lain</span></h2>
        </section>


        <div class="pt-3 grid grid-flow-row gap-3">
            <?php foreach ($data['berita']['lain'] as $berita) : ?>
                <article class="flex flex-row items-center bg-white border border-gray-200 rounded-lg shadow  hover:bg-gray-100   ">
                    <img class="object-cover w-20 rounded-lg h-auto m-3" src="<?= BASEURL ?>/assets/politik/<?= $berita['nama_tumbnail'] ?>" alt="">
                    <!-- <h5 class="mb-2 text-base font-bold tracking-tight text-gray-900 ">Noteworthy technology acquisitions 2021</h5> -->
                    <div class="flex flex-col justify-between p-4 leading-normal">

                        <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900 "><?= $berita['judul_berita'] ?></h5>
                        <div class="flex flex-col md:flex-row md:items-center ">

                            <a href="#" class="text-red-500"><?= $berita['nama_kategori'] ?></a>
                            <p class="before:content-[''] before:bg-black before:w-1.5 before:h-1.5 before:block before:rounded-lg before:absolute before:my-auto relative before:top-0 before:bottom-0 before:-left-4 ml-6"><?= $berita['tanggal_terbit'] ?></p>

                        </div>
                    </div>


                </article>
            <?php endforeach; ?>

        </div>

    </div>


    <div class="sticky top-36 px-3 max-w-xs hidden sm:block">
        <section class="py-6">
            <h2 class="text-2xl">Kategori lain</h2>
        </section>
        <div class="flex flex-wrap">
            <?php foreach ($data['allKategori'] as $kategori) : ?>
                <a href="<?= BASEURL ?>/<?= strtolower($kategori['nama_kategori']) ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2   focus:outline-none "><?= $kategori['nama_kategori'] ?></a>
            <?php endforeach; ?>

        </div>

    </div>
</div>






<script>
    // let slideIndex = 0
    // console.log($("#indicator-item-berita").children())
    // const indicatorItemBerita = $("#carousel-berita").children()

    // showSlideBerita()
    // function showSlideBerita(){
    //     let i
    //     // $("#carousel-berita").children().each(function(){
    //     //     $(this).addClass()
    //     // })
    //     // for(i = 0; i<indicatorItemBerita.length; i++){

    //     //     indicatorItemBerita.children[i]
    //     // }
    //     // $("#carousel-berita").children().eq(slideIndex-1).addClass("hidden")
    //     slideIndex++
    //     if (slideIndex > indicatorItemBerita.length) {slideIndex = 0}

    //     // $("#carousel-berita").children().eq(slideIndex-1).removeClass("hidden")
    //     // $("#carousel-berita").children().eq(slideIndex).addClass("block")
    //     console.log(indicatorItemBerita.length)

    //     setTimeout(showSlideBerita, 3000)
    // }


    // console.log(indicatorItemBerita[1])
</script>






<!-- Main modal -->
<!--  -->
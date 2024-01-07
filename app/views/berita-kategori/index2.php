<!--  -->
<div class="max-w-6xl p-5 flex justify-between m-auto items-start">

    <?php if (!isset($data['berita']['search'])) : ?>
        <section class="content p-2 max-w-3xl flex flex-col flex-grow">

            <?php if (stream_resolve_include_path("{$data['kategori']}/{$data['render']}.php")) : ?>

                <?php require_once("{$data['kategori']}/{$data['render']}.php") ?>
            <?php else : ?>

                <p>Beritane kosong as</p>

                <!-- <h1 class="text-2xl">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi, hic?</h1>
            <img src="<?= BASEURL ?>/assets/politik/car.png" alt="Politik" class="">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus, sit. Ut quia delectus eaque, ab molestias officiis modi sapiente porro praesentium, vel nostrum obcaecati possimus harum nemo necessitatibus accusantium rem molestiae minus ex, fuga eum. Unde nemo laudantium veniam non est aspernatur pariatur nesciunt, quaerat dolor impedit voluptatibus repudiandae quia magnam sunt dignissimos modi tempore sit natus! Minus, vitae necessitatibus? Quisquam, iste nobis. Esse neque cum sit tenetur, inventore pariatur illum delectus distinctio exercitationem eos optio similique soluta aliquam, quis impedit! Sed, esse. Consequuntur accusamus aperiam error consequatur ad perferendis dignissimos? Provident dignissimos maiores velit, dolorem libero modi odit maxime neque accusamus totam eum quia aliquam vitae, explicabo, et praesentium exercitationem! Quasi libero mollitia architecto sint officia itaque, rerum illum minima, eveniet voluptatem omnis maiores id laborum natus repudiandae, labore similique ipsa facilis iste possimus dolore laudantium tempora. Inventore, placeat? Culpa voluptatibus delectus unde dolorum, harum deleniti quaerat cumque, pariatur dicta animi doloribus eveniet aspernatur quo, omnis nulla reiciendis autem facilis dolorem! Sunt laborum earum nihil nesciunt deleniti beatae quaerat id velit culpa minus unde odio molestias consequatur ducimus ipsa similique, obcaecati iste. Porro voluptatem quos eum molestias cumque delectus iste numquam architecto! Accusantium cum minus voluptate voluptatibus expedita harum debitis, omnis ducimus totam officia explicabo voluptas doloribus obcaecati nostrum maiores! Consequuntur eveniet doloremque iure quo ipsam fuga ipsa commodi doloribus magnam ullam molestiae incidunt modi maiores expedita quasi, iste dicta temporibus pariatur dolores. Harum deleniti ipsam non quisquam velit illo illum quo voluptatem, eligendi veniam est saepe soluta vero quis expedita ad commodi sequi quibusdam corrupti qui architecto aliquam. Accusamus corporis quaerat eum, voluptatem vel animi modi pariatur mollitia quibusdam sequi sed deleniti id porro quisquam perferendis maxime molestias. Voluptatum, excepturi, aut, ad nisi temporibus recusandae sapiente sint mollitia natus sunt officiis similique earum magnam ut facilis aspernatur. Aliquam!</p> -->


            <?php endif; ?>
        </section>
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
    <div class="sticky top-28 max-w-sm">
        <?php foreach ($data['berita']['side'] as $berita) : ?>
            <a href="<?= BASEURL."/".strtolower($berita['nama_kategori'])."/"?><?= str_replace(" ","-", $berita['judul_berita'])."-".$berita['id_berita'] ?>" class="hidden sm:flex flex-row sm:w-52 md:w-80  max-w-lg items-center bg-white border border-gray-200 rounded-lg shadow  hover:bg-gray-100   ">
                <img class="object-cover w-20 rounded-lg h-auto m-3" src="<?= BASEURL ?>/assets/<?=strtolower($berita['nama_kategori'])?>/<?=$berita['nama_tumbnail']?>" alt="">
                <!-- <h5 class="mb-2 text-base font-bold tracking-tight text-gray-900 ">Noteworthy technology acquisitions 2021</h5> -->
                <div class="flex justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900 "><?=$berita['judul_berita']?></h5>
                </div>

            </a>
        <?php endforeach; ?>

        <?php if (!isset($data['berita']['search'])) : ?>
            <?php if (stream_resolve_include_path("{$data['kategori']}/{$data['render']}.php")) : ?>
                <div class="py-5">
                    <a href="<?= BASEURL . "/berita/print/" . $data['kategori'] . "/" . $data['render'] ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">

                        <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 19">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15h.01M4 12H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-3M9.5 1v10.93m4-3.93-4 4-4-4" />
                        </svg>
                        Print Berita
                    </a>
                </div>
            <?php endif; ?>
        <?php endif; ?>


    </div>
</div>

<div class="grid grid-cols-2 sm:grid-cols-3  max-w-6xl m-auto p-5 gap-3">
    <section class="col-span-2 sm:col-span-3 flex justify-center overflow-hidden">
        <h2 class="text-4xl font-serif  px-9"><span class="relative before:content-[''] before:bg-black before:absolute before:w-96 before:h-1 before:my-auto before:top-0 before:bottom-0 before:left-full px-6 after:content-[''] after:bg-black after:absolute after:w-96 after:h-1 after:my-auto after:top-0 after:bottom-0 after:right-full">Berita Populer</span></h2>
    </section>

    <?php foreach ($data['berita']['beritaPopuler'] as $berita) : ?>
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow  ">
            <a href="<?= BASEURL."/".strtolower($berita['nama_kategori'])."/"?><?= str_replace(" ","-", $berita['judul_berita'])."-".$berita['id_berita'] ?>" class="flex justify-center">
                <img class="p-3 rounded-t-lg w-36" src="<?= BASEURL ?>/assets/<?= strtolower($berita['nama_kategori']) ?>/<?= $berita['nama_tumbnail'] ?>" alt="" />
            </a>
            <div class="p-5">
                <div class="flex flex-col md:flex-row md:items-center">

                    <a href="<?= BASEURL?>/<?= strtolower($berita['nama_kategori'])?>" class="text-red-500"><?=$berita['nama_kategori']?></a>
                    <p class="before:content-[''] before:bg-black before:w-1.5 before:h-1.5 before:block before:rounded-lg before:absolute before:my-auto relative before:top-0 before:bottom-0 before:-left-4 ml-6"><?= $berita['tanggal_terbit']?></p>

                </div>

                <a href="<?= BASEURL."/".strtolower($berita['nama_kategori'])."/"?><?= str_replace(" ","-", $berita['judul_berita'])."-".$berita['id_berita'] ?>">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 "><?= $berita['judul_berita']?></h5>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow  ">
        <a href="" class="flex justify-center">
            <img class="p-3 rounded-t-lg w-36" src="<?= BASEURL ?>/assets/politik/car.png" alt="" />
        </a>
        <div class="p-5">
            <div class="flex flex-col md:flex-row md:items-center">

                <a href="#" class="text-red-500">Kategori</a>
                <p class="before:content-[''] before:bg-black before:w-1.5 before:h-1.5 before:block before:rounded-lg before:absolute before:my-auto relative before:top-0 before:bottom-0 before:-left-4 ml-6">3 Mar 2023, 21.30</p>

            </div>

            <a href="">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Noteworthy technology acquisitions 2021</h5>
            </a>
        </div>
    </div>
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow  ">
        <a href="" class="flex justify-center">
            <img class="p-3 rounded-t-lg w-36" src="<?= BASEURL ?>/assets/politik/car.png" alt="" />
        </a>
        <div class="p-5">
            <div class="flex flex-col md:flex-row md:items-center">

                <a href="#" class="text-red-500">Kategori</a>
                <p class="before:content-[''] before:bg-black before:w-1.5 before:h-1.5 before:block before:rounded-lg before:absolute before:my-auto relative before:top-0 before:bottom-0 before:-left-4 ml-6">3 Mar 2023, 21.30</p>

            </div>

            <a href="">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Noteworthy technology acquisitions 2021</h5>
            </a>
        </div>
    </div> -->
</div>


<?php if (!isset($data['berita']['search'])) : ?>
    <?php if (stream_resolve_include_path("{$data['kategori']}/{$data['render']}.php")) : ?>
        <?php require_once('comment.php') ?>
    <?php endif; ?>
<?php endif; ?>
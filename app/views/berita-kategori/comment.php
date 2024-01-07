<?php if (!$data['render'] == "") : ?>
    <section class=" max-w-6xl m-auto p-5 overflow-hidden">
        <section class="col-span-2 sm:col-span-3 flex justify-center overflow-hidden">
            <h2 class="text-4xl font-serif  px-9"><span class="relative before:content-[''] before:bg-black before:absolute before:w-96 before:h-1 before:my-auto before:top-0 before:bottom-0 before:left-full px-6 after:content-[''] after:bg-black after:absolute after:w-96 after:h-1 after:my-auto after:top-0 after:bottom-0 after:right-full">Komentar Pengunjung</span></h2>
        </section>
        <div class="container p-10" id="comment-container">

            <?php foreach ($data['komentar'] as $komentar) : ?>
                <div class="flex gap-4" id="komentar">
                    <img class="w-7 h-7 rounded-full" src="/docs/images/people/profile-picture-5.jpg" alt="">
                    <!-- <div class="flex items-center gap-4">

                    <div>Jese Leos</div>
                </div> -->

                    <div class="font-medium ">
                        <div><?= $komentar['nama_pengguna'] == "" ? "Anonymous" : $komentar['nama_pengguna'] ?></div>
                        <div class=" pt-2 text-sm text-gray-600 "><?= $komentar['isi_komentar'] ?></div>
                        <div class=" pt-2 text-xs text-gray-500 "><?= date("d-M-Y", strtotime($komentar["tanggal_komentar"])) ?>, <?= date("H:i", strtotime($komentar["tanggal_komentar"])) ?></div>
                        <div>
                            <button data-id-komentar="<?= $komentar['id_komentar'] ?>" data-nama-pengguna="<?= $komentar['nama_pengguna'] ?>" type="button" class=" focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center inline-flex items-center me-2">
                                <svg class="w-3.5 h-3.5 me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="arcs">
                                    <path d="M10 16l-6-6 6-6" />
                                    <path d="M20 21v-7a4 4 0 0 0-4-4H5" />
                                </svg>
                                Balas
                            </button>
                            <?php if ($komentar['jumlah_reply'] > 0) : ?>

                                <button id="balasan<?= $komentar['id_komentar'] ?>" type="button" class="button-balas focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center inline-flex items-center me-2   " data-idreply="<?= $komentar['id_komentar'] ?>" data-target="close">
                                    Lihat Balasan
                                </button>
                            <?php endif; ?>
                        </div>


                        <div id="comment-reply<?= $komentar['id_komentar'] ?>" class=" mt-2">
                            <!-- <div class="flex gap-4">
                                <img class="w-7 h-7 rounded-full" src="/docs/images/people/profile-picture-5.jpg" alt="">


                                <div class="font-medium ">
                                    <div>Jese Leos</div>
                                    <div class=" pt-2 text-sm text-gray-500 ">Joined in August 2014</div>

                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

        <div id="to-balas" class="container max-w-4xl m-auto flex justify-between px-3 items-center hidden">
            <p>Balas User01</p>
            <div class="p-2.5">
                <button id="close-to-balas" type="button" class="text-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm  text-center inline-flex items-center">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m13 7-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span class="sr-only">Icon description</span>
                </button>
            </div>

        </div>

        <form method="post" action="<?= BASEURL ?>/home/kirimKomentar" id="form-komen">
            <label for="chat" class="sr-only">Your message</label>
            <input type="text" id="balas-id-komentar" name="balas-id-komentar" hidden>
            <input type="text" id="id-berita" name="id-berita" value="<?= $data['id_berita'] ?>" hidden>
            <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 ">
                <button type="button" class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100   ">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                        <path fill="currentColor" d="M13 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM7.565 7.423 4.5 14h11.518l-2.516-3.71L11 13 7.565 7.423Z" />
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 1H2a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM7.565 7.423 4.5 14h11.518l-2.516-3.71L11 13 7.565 7.423Z" />
                    </svg>
                    <span class="sr-only">Upload image</span>
                </button>
                <button type="button" class="p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100   ">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.408 7.5h.01m-6.876 0h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM4.6 11a5.5 5.5 0 0 0 10.81 0H4.6Z" />
                    </svg>
                    <span class="sr-only">Add emoji</span>
                </button>
                <textarea id="chat" name="isi_komentar" rows="1" class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500      " placeholder="Your message..."></textarea>
                <button type="submit" id="submit-komentar" name="submit-komentar" class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100  ">
                    <svg class="w-5 h-5 rotate-90 rtl:-rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                        <path d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                    </svg>
                    <span class="sr-only">Send message</span>
                </button>
            </div>
        </form>

    </section>
<?php endif; ?>

<script>
    $(document).ready(function() {
        let userBalas = ""
        $(".button-balas").on("click", function() {
            // console.log($(this).data("target") == "close")
            // const replyContainer = $(this).find("#comment-reply");

            const id = $(this).data("idreply")
            if ($(this).data("target") == "close") {

                $.ajax({
                    url: 'http://localhost/TugasProyekPWD/public/politik/komentar/',
                    data: {
                        id: id
                    },
                    method: 'post',
                    dataType: "json",
                    success: (datas) => {
                        datas.forEach(data => {
                            $(`#comment-reply${id}`).append(
                                $(`
                            <div class="flex gap-4">
                                <img class="w-7 h-7 rounded-full" src="<?= BASEURL . "/assets/politik/Car.png" ?>" alt="">


                                <div class="font-medium ">
                                    <div>${data.nama_pengguna==null?"Anonymous":data.nama_pengguna}</div>
                                    <div class=" pt-2 text-sm text-gray-600 ">${data.isi_komentar}</div>
                                    <div class=" pt-2 text-xs text-gray-500 ">${data.tanggal_komentar}</div>

                                </div>
                            </div>
                        `)
                            )
                        });

                    }
                })
                $(this).data("target", "open")
                $(this).html("Tutup Balasan");
            } else {
                $(`#comment-reply${id}`).children().remove()
                $(this).data("target", "close")
                $(this).html("Buka Balasan");
            }




        })

        $("[data-id-komentar]").each(function() {

            $(this).on("click", function() {
                $('html,body').animate({
                    scrollTop: $("#form-komen").offset().top
                }, 'slow');
                $("#to-balas").removeClass("hidden")

                if ($(this).attr("data-nama-pengguna") == "") {
                    $("#to-balas").children("p").text("Balas Anonymous")
                } else {
                    $("#to-balas").children("p").text("Balas " + $(this).attr("data-nama-pengguna"))
                }
                $("#balas-id-komentar").val($(this).attr("data-id-komentar"))
                console.log($(this).attr("data-nama-pengguna"))
            })
        })

        $("#close-to-balas").on("click", function() {
            $("#to-balas").children("p").text("")
            $("#to-balas").addClass("hidden")
            $("#balas-id-komentar").val(null)
        })


    })



    // $("#to-balas").on("click", "#close-to-balas", function(){

    // })
</script>
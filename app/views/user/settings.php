<div class="max-w-6xl flex justify-between items-center">
    <div class="overflow-x-auto sm:rounded-lg mx-auto">
        <div>
            <?php Flasher::flash() ?>
        </div>
        <form action="<?= BASEURL . "/user/tambahKategori" ?>" method="post">
            <div class="flex justify-between items-center p-4 gap-3 mx-auto">

                <div class=" bg-white  ">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">

                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                            </svg>
                        </div>
                        <input type="text" id="tambah-kategori" name="tambah-kategori" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500      " placeholder="Kategori berita baru">
                    </div>

                </div>
                <div class="p-2">
                    <button type="submit" class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center     ">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                        </svg>
                        <span class="sr-only">Add Kategori</span>
                    </button>
                </div>


            </div>
        </form>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                <tr>

                    <th scope="col" class="px-6 py-3">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kategori
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $index = 1 ?>
                <?php foreach ($data["allKategori"] as $kategori) : ?>
                    <tr class="bg-white border-b   hover:bg-gray-50 ">

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                            <?= $index ?>
                        </th>
                        <td class="px-6 py-4">
                            <?= $kategori['nama_kategori'] ?>
                        </td>


                        <td class="px-6 py-4">
                            <button type="button" data-modal-target="ubah-kategori-modal" data-modal-toggle="ubah-kategori-modal" data-kode-kategori="<?= $kategori['id_kategori'] ?>" class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center     ">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.418 17.861 1 20l2.139-6.418m4.279 4.279 10.7-10.7a3.027 3.027 0 0 0-2.14-5.165c-.802 0-1.571.319-2.139.886l-10.7 10.7m4.279 4.279-4.279-4.279m2.139 2.14 7.844-7.844m-1.426-2.853 4.279 4.279" />
                                </svg>
                                <span class="sr-only">Edit</span>
                            </button>
                            <!-- <button data-modal-target="ubah-pesawat-modal" data-modal-toggle="ubah-pesawat-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center   " type="button">
                            Edit
                        </button>
                        <button class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center   " type="button">
                            Delete
                        </button> -->
                        </td>
                    </tr>
                    <?php $index++ ?>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>

<div id="ubah-kategori-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                <h3 class="text-lg font-semibold text-gray-900 ">
                    Ubah Data Kategori
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center  " data-modal-toggle="ubah-kategori-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <input type="text" hidden value="ini isi">
                    <div class="col-span-2">
                        <label for="nama_kategori" class="block mb-2 text-sm font-medium text-gray-900 ">Nama Kategori</label>
                        <input type="text" name="nama_kategori" id="nama_kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5      " placeholder="Nama Kategori" required="">
                    </div>
                    <!-- <div class="col-span-2 sm:col-span-1">
                        <label for="nama_pesawat" class="block mb-2 text-sm font-medium text-gray-900 ">Nama</label>
                        <input type="text" name="nama_pesawat" id="nama_pesawat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5      " placeholder="$2999" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="tipe_penerbangan" class="block mb-2 text-sm font-medium text-gray-900 ">Penerbangan</label>
                        <select id="tipe_penerbangan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5      ">
                            <option selected="">Select category</option>
                            <option value="Domestik">Domestik</option>
                            <option value="Internasional">Internasional</option>

                        </select>
                    </div> -->
                    <!-- <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Product Description</label>
                        <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500      " placeholder="Write product description here"></textarea>
                    </div> -->
                </div>
                <div class="flex items-center justify-between">
                    <a href="#" id="link-hapus-kategori" class="text-white inline-flex items-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center   ">
                        <svg class="me-1 -ms-1 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                        </svg>
                        Hapus Data Kategori
                    </a>
                    <button type="submit" name="submit-ubah-pesawat" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center   ">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                        Ubah Data Kategori
                    </button>

                </div>

            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("[data-kode-kategori]").each(function() {
            
            
            $(this).on("click", function() {
                alert($(this).attr("[data-kode-kategori]"))
                $("#link-hapus-kategori").attr("href", `<?= BASEURL . "/user/" . "hapusKategori/" ?>${$(this).attr("data-kode-kategori")}`)
            })
        })
    })
</script>
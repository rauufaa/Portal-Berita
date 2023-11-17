<!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->

<section class=" max-w-5xl">
  <button id="createHeader" type="button" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Header</button>
  <button id="createParagraph" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Paragraph</button>
  <button id="createPic" type="file" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Aplot Gambar</button>
  <input type="file" name="photo" id="imgInp">
  <h2 contenteditable="true">Percobaan</h2>
  <form action="<?= BASEURL ?>/berita/tambahBerita" method="post" enctype="multipart/form-data">
    <div class="col-span-4">
      <label for="judul_berita" class="block text-sm font-medium leading-6 text-gray-900">Judul Berita</label>
      <div class="mt-2">
        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

          <input type="text" name="judul_berita" id="judul_berita" autocomplete="false" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="">
        </div>
      </div>
    </div>

    <div class="col-span-4">
      <label for="kategori_berita" class="block text-sm font-medium leading-6 text-gray-900">Kategori Berita</label>
      <div class="mt-2">
        <div class="">
          <select name="kategori_berita" id="kategori_berita">
            <?php foreach ($data['kategori'] as $kategori) : ?>
              <option value="<?= $kategori['nama_kategori'] ?>"><?= $kategori['nama_kategori'] ?></option>
            <?php endforeach; ?>
          </select>
          <!-- <input type="text" name="judul_berita" id="judul_berita" autocomplete="false" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder=""> -->
        </div>
      </div>
    </div>
    <br>
    <div class="editable"></div>
    <button id="kirim" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Kirim</button>
  </form>
</section>


<form method="post" action="<?= BASEURL ?>/berita/tambahBerita" class="w-screen p-8">
  <div class="col-span-4">
    <label for="judul_berita" class="block text-sm font-medium leading-6 text-gray-900">Judul Berita</label>
    <div class="mt-2">
      <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

        <input type="text" name="judul_berita" id="judul_berita" autocomplete="false" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="">
      </div>
    </div>
  </div>

  <div class="col-span-4">
    <label for="kategori_berita" class="block text-sm font-medium leading-6 text-gray-900">Kategori Berita</label>
    <div class="mt-2">
      <div class="">
        <select name="kategori_berita" id="kategori_berita">
          <?php foreach ($data['kategori'] as $kategori) : ?>
            <option value="<?= $kategori['id_kategori'] ?>"><?= $kategori['nama_kategori'] ?></option>
          <?php endforeach; ?>
        </select>
        <!-- <input type="text" name="judul_berita" id="judul_berita" autocomplete="false" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder=""> -->
      </div>
    </div>
  </div>

  <div class="col-span-full">
    <label for="Isi Berita" class="block text-sm font-medium leading-6 text-gray-900">Isi Berita</label>
    <div class="mt-2">
      <textarea id="isi_berita" name="isi_berita" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
    </div>
    <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about yourself.</p>
  </div>

  <button type="submit">Kirim</button>

</form>

<script src="<?= BASEURL ?>/js/tambah_berita.js?<?= time() ?>"></script>
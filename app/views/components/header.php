<header class="sticky top-0 w-full z-30 bg-white border-gray-200 shadow-lg">
  <nav class="bg-white border-gray-200  max-w-7xl m-auto">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="<?= BASEURL ?>" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap ">Flowbite</span>
      </a>
      <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        <?php if (!isset($_SESSION['user'])) : ?>
          <a href="<?= BASEURL ?>/signin" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center   " type="button">
            Toggle modal
          </a>
        <?php else : ?>

          <button type="button" class="flex text-sm bg-white rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 " id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
            <span class="sr-only">Open user menu</span>
            <svg class="w-8 h-8 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 11 14H9a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 10 19Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
            <!-- <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="user photo"> -->
          </button>
          <!-- Dropdown menu -->
          <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow  " id="user-dropdown">
            <div class="px-4 py-3">
              <span class="block text-sm text-gray-900 "><?= $_SESSION['user']['nama'] ?></span>
              <span class="block text-sm  text-gray-500 truncate "><?= $_SESSION['user']['email'] ?></span>
            </div>
            <ul class="py-2" aria-labelledby="user-menu-button">
              <li>
                <a href="<?= BASEURL . "/user/dashboard" ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100   ">Dashboard</a>
              </li>
              <!-- <li>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100   ">Settings</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100   ">Earnings</a>
              </li> -->
              <li>
                <a href="<?= BASEURL . "/user/signOut" ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">Sign out</a>
              </li>
            </ul>
          </div>
        <?php endif; ?>

        <!-- <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200   " aria-controls="navbar-user" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
          </svg>
        </button> -->
      </div>

    </div>
  </nav>
</header>

<nav class="max-w-6xl flex justify-center gap-7 m-auto py-2 my-3 text-lg">
  <a href="">Politik</a>
  <a href="">Teknologi</a>
  <a href="">Pendidikan</a>
  <a href="">Budaya</a>
</nav>




<script>
  $("#submit_login").on("click", function() {
    let email = $("#email_signin").val()
    let password = $("#password_signin").val()

    $.ajax({
      url: 'http://localhost/TugasProyekPWD/public/home/cekLogin',
      data: {
        email: email,
        password: password
      },
      method: 'post',
      dataType: "html",
      success: (datas) => {

      },
      error: error => {

      }
    })
  })
</script>
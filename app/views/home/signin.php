<section class="bg-gray-50 ">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen lg:py-0 max-w-lg">
        <a href="<?=BASEURL?>" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 ">
            <img class="w-8 h-8 mr-2" src="<?=BASEURL?>/assets/politik/Car.png" alt="logo">
            Berita Kami
        </a>
        <div class="w-full bg-white rounded-lg shadow  md:mt-0 sm:max-w-md xl:p-0  ">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                    Login ke akunmu
                </h1>
                <div>
                    <?php Flasher::flash() ?>
                </div>
                <form class="space-y-4 md:space-y-6" action="<?= BASEURL?>/home/cekLogin" method="post">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5      " placeholder="name@email.com" required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5      " required="">
                    </div>
                    <div class="flex gap-3 items-center">
                        <div>
                            <img src="<?= BASEURL?>/captcha" class=" w-40">
                        </div>

                        <div>
                            <input type="text" id="captcha" name="captcha" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500      " placeholder="Masukkan captcha" required>
                        </div>
                    </div>
                    <!-- <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300    " required="">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="remember" class="text-gray-500 ">Remember me</label>
                            </div>
                        </div>
                        <a href="#" class="text-sm font-medium text-blue-600 hover:underline ">Forgot password?</a>
                    </div> -->
                    <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center   ">Sign in</button>
                    <p class="text-sm font-light text-gray-500 ">
                        Belum punya akun? <a href="<?= BASEURL ?>/register" class="font-medium text-blue-600 hover:underline ">Register</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
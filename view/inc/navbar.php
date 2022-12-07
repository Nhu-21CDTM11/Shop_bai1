<!-- navbar -->
<nav class="bg-gray-800">
    <div class="container flex">
        <!-- all category -->
        <div class="px-8 py-4 bg-primary flex items-center cursor-pointer relative group">
            <span class="text-white">
                <i class="fas fa-bars"></i>
            </span>
            <span class="capitalize ml-2 text-white">All Categories</span>
            <div class="absolute w-full left-0 top-full bg-white shadow-md py-3 divide-y divide-gray-300 divide-dashed opacity-0 group-hover:opacity-100 transition duration-300 invisible group-hover:visible">
                <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                    <img src="<?= asset("images/bed.svg") ?>" class="w-5 h-5 object-contain" alt="">
                    <span class="ml-6 text-gray-600 text-sm">Bedroom</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                    <img src="<?= asset("images/sofa.svg") ?>" class="w-5 h-5 object-contain" alt="">
                    <span class="ml-6 text-gray-600 text-sm">Sofa</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                    <img src="<?= asset("images/desk.svg") ?>" class="w-5 h-5 object-contain" alt="">
                    <span class="ml-6 text-gray-600 text-sm">Office</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                    <img src="<?= asset("images/door.svg") ?>" class="w-5 h-5 object-contain" alt="">
                    <span class="ml-6 text-gray-600 text-sm">Outdoor</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                    <img src="<?= asset("images/bed-solid.svg") ?>" class="w-5 h-5 object-contain" alt="">
                    <span class="ml-6 text-gray-600 text-sm">Mattress</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                    <img src="<?= asset("images/elegant-dining-room.svg") ?>" class="w-5 h-5 object-contain" alt="">
                    <span class="ml-6 text-gray-600 text-sm">Dining</span>
                </a>
            </div>
        </div>
        <!-- all category end -->
        <!-- navbar links -->
        <div class="flex items-center justify-between flex-grow pl-12">
            <div class="flex items-center capitalize">
                <div class="p-4 bg-primary hover:bg-[#ff2946] hover:cursor-pointer">
                    <a href="<?= url('index') ?>" class="text-gray-200 hover:text-white transition">Home</a>
                </div>
                <div class="p-4 hover:bg-[#ff2946] hover:cursor-pointer">
                    <a href="shop.html" class="text-gray-200 hover:text-white transition">Shop</a>
                </div>
                <div class="p-4 hover:bg-[#ff2946] hover:cursor-pointer">
                    <a href="#" class="text-gray-200 hover:text-white transition">About us</a>
                </div>
                <div class="p-4 hover:bg-[#ff2946] hover:cursor-pointer">
                    <a href="#" class="text-gray-200 hover:text-white transition">Contact us</a>
                </div>
            </div>

            <?php if (!empty($_SESSION['user'])) { ?>
                <?php if ($_SESSION['user']['role'] == 'admin') { ?>
                    <div>
                        <a href='<?= url('logout') ?>' class='text-gray-200 hover:text-white transition'>Logout</a>
                        <span class='text-white'>/</span>
                        <a href='<?= url('admin.index') ?>' class='text-gray-200 hover:text-white transition'>Admin</a>
                    </div>
                <?php } else { ?>
                    <a href="<?= url('logout') ?>" class="text-gray-200 hover:text-white transition">Logout</a>
                <?php } ?>
            <?php } else { ?>
                <div>
                    <a href='<?= url('login') ?>' class='text-gray-200 hover:text-white transition'>Login</a>
                    <span class='text-white'>/</span>
                    <a href='<?= url('register') ?>' class='text-gray-200 hover:text-white transition'>Register</a>
                </div>
            <?php } ?>
        </div>
    </div>
</nav>
<!-- navbar end -->
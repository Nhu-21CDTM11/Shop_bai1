
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="<?= asset("css/style.css")?>">
</head>
<body>
    <?php includeView("view/inc/header.php"); ?>
    <?php includeView("view/inc/navbar.php"); ?>

    <!-- breadcrums -->
    <div class="container py-4 flex items-center gap-3">
        <a href="index.html" class="text-primary text-base">
            <i class="fas fa-home"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fas fa-chevron-right"></i>
        </span>
        <p class="text-gray-600 font-medium">Shop</p>
    </div>
    <!-- breadcrums end-->

    <!-- shop wrapper -->
    <div class="container grid grid-cols-4 gap-6 pt-4 pb-16 items-start">
        <!-- sidebar -->
        <div class="col-span-1 bg-white px-4 pb-6 shadow rounded overflow-hidden">
            <div class="divide-y divide-gray-200 space-y-5">
                <!-- category filter -->
                <div>
                    <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">categories</h3>
                    <div class="space-y-2">
                        <?php foreach( get_categories() as $category) { ?>
                            <!-- single category -->
                            <div class="flex items-center">
                                <input type="checkbox" id="bedroom" <?php if ( $category [ 'id' ] == $_GET[ 'category' ] ) { ?>echo checked = "checked"; <?php } ?> class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                                <label for="bedroom" class="text-gray-600 ml-3 cursor-pointer"><?= $category['name_category'] ?></label>
                            </div>
                            <!-- single category end-->
                        <?php } ?>
                    </div>
                </div>
                <!-- category filter end-->
                <!-- brand filter -->
                <div class="pt-4">
                    <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Brands</h3>
                    <div class="space-y-2">
                        <!-- single category -->
                        <div class="flex items-center">
                            <input type="checkbox" id="Dominik" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                            <label for="Dominik" class="text-gray-600 ml-3 cursor-pointer">Dominik</label>
                            <div class="ml-auto text-gray-600 text-sm">(15)</div>
                        </div>
                        <!-- single category end-->
                        <!-- single category -->
                        <div class="flex items-center">
                            <input type="checkbox" id="Karl" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                            <label for="Karl" class="text-gray-600 ml-3 cursor-pointer">Karl</label>
                            <div class="ml-auto text-gray-600 text-sm">(18)</div>
                        </div>
                        <!-- single category end-->
                        <!-- single category -->
                        <div class="flex items-center">
                            <input type="checkbox" id="Maxing" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                            <label for="Maxing" class="text-gray-600 ml-3 cursor-pointer">Maxing</label>
                            <div class="ml-auto text-gray-600 text-sm">(09)</div>
                        </div>
                        <!-- single category end-->
                        <!-- single category -->
                        <div class="flex items-center">
                            <input type="checkbox" id="Ernest" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                            <label for="Ernest" class="text-gray-600 ml-3 cursor-pointer">Ernest</label>
                            <div class="ml-auto text-gray-600 text-sm">(1)</div>
                        </div>
                        <!-- single category end-->
                    </div>
                </div>
                <!-- brand filter end -->

                <!-- price filter -->
                <div class="pt-4">
                    <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Price</h3>
                    <div class="mt-4 flex items-center">
                        <input type="text" class="w-full border-gray-300 focus:border-primary focus:ring-0 px-3 py-1 text-gray-600 text-sm shadow-sm rounded" placeholder="min">
                        <span class="mx-3 text-gray-500 ">-</span>
                        <input type="text" class="w-full border-gray-300 focus:border-primary focus:ring-0 px-3 py-1 text-gray-600 text-sm shadow-sm rounded" placeholder="max">
                    </div>
                </div>
                <!-- price filter end-->

                <!-- size filter -->
                <div class="pt-4">
                    <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Size</h3>
                    <div class="flex items-center gap-2">
                        <!-- single size -->
                        <div class="size-selector">
                            <input type="radio" name="size" class="hidden" id="size-xs">
                            <label for="size-xs" class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">
                                XS
                            </label>
                        </div>
                        <!-- single size end-->
                        <!-- single size -->
                        <div class="size-selector">
                            <input type="radio" name="size" class="hidden" id="size-s">
                            <label for="size-s" class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">
                                S
                            </label>
                        </div>
                        <!-- single size end-->
                        <!-- single size -->
                        <div class="size-selector">
                            <input type="radio" name="size" class="hidden" id="size-m" checked>
                            <label for="size-m" class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">
                                M
                            </label>
                        </div>
                        <!-- single size end-->
                        <!-- single size -->
                        <div class="size-selector">
                            <input type="radio" name="size" class="hidden" id="size-l">
                            <label for="size-l" class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">
                                L
                            </label>
                        </div>
                        <!-- single size end-->
                        <!-- single size -->
                        <div class="size-selector">
                            <input type="radio" name="size" class="hidden" id="size-xl">
                            <label for="size-xl" class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">
                                XL
                            </label>
                        </div>
                        <!-- single size end-->
                    </div>
                </div>
                <!-- size filter end-->

                <!-- color filter -->
                <div class="pt-4">
                    <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">color</h3>
                    <div class="flex items-center gap-2">
                        <!-- single color -->
                        <div class="color-selector">
                            <input type="radio" name="color" class="hidden" id="color-red" checked>
                            <label for="color-red" class="border border-gray-200 rounded-sm h-5 w-5 cursor-pointer shadow-sm block" style="background-color: #fc3d57;"></label>
                        </div>
                        <!-- single color end-->
                        <!-- single color -->
                        <div class="color-selector">
                            <input type="radio" name="color" class="hidden" id="color-white">
                            <label for="color-white" class="border border-gray-200 rounded-sm h-5 w-5 cursor-pointer shadow-sm block" style="background-color: #fff;"></label>
                        </div>
                        <!-- single color end-->
                        <!-- single color -->
                        <div class="color-selector">
                            <input type="radio" name="color" class="hidden" id="color-black">
                            <label for="color-black" class="border border-gray-200 rounded-sm h-5 w-5 cursor-pointer shadow-sm block" style="background-color: #000;"></label>
                        </div>
                        <!-- single color end-->
                    </div>
                </div>
                <!-- color filter end-->
            </div>
        </div>
        <!-- sidebar end-->

        <!-- products -->
        <div class="col-span-3">
            <!-- sorting -->
            <div class="flex items-center mb-4">
                <select class="w-44 text-sm text-gray-600 px-4 py-3 border-gray-300 shadow-sm rounded focus:ring-primary focus:border-primary">
                    <option>Default sorting</option>
                    <option>Price low-hight</option>
                    <option>Price hight-low</option>
                    <option>Latest product</option>
                </select>
    
                <div class="flex gap-2 ml-auto">
                    <div class="border border-primary w-10 h-9 flex items-center justify-center text-white bg-primary rounded cursor-pointer">
                        <i class="fas fa-th"></i>
                    </div>
                    <div class="border border-gray-300 w-10 h-9 flex items-center justify-center text-gray-600 rounded cursor-pointer">
                        <i class="fas fa-list"></i>
                    </div>
                </div>
            </div>
            <!-- sorting end-->
                <!-- product grid -->
                    <div class="grid grid-cols-3 gap-6">
                        <?php $products = find_category_products( $_GET[ 'category' ] ); ?>
                         <?php if ( count ($products) == 0) { ?>
                            <span>Hiện tại chưa có sản phẩm</span>
                         <?php } ?>
                        <?php foreach ( $products as $product ) { ?>
                            <!-- single product -->
                            <div class="bg-white shadow rounded overflow-hidden group">
                                <!-- product image -->
                                <div class="relative">
                                    <img src="<?=  asset( $product['img'])?>" class="w-full" alt="">
                                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transsition">
                                        <a href="#" class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition ">
                                            <i class="fas fa-search"></i>
                                        </a>
                                        <a href="#" class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition ">
                                            <i class="far fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- product image end-->

                                <!-- product-content -->
                                <div class="pt-4 pb-3 px-4">
                                    <a href="#">
                                        <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition"><?=  $product['name'] ?></h4>
                                    </a>
                                    <div class="flex items-baseline mb-1 space-x-2 font-roboto">
                                        <p class="text-xl text-primary font-semibold">$45.00</p>
                                        <p class="text-sm text-gray-400 line-through">$55.00</p>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="flex gap-1 text-sm text-yellow-400">
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                        </div>
                                        <div class="text-xs text-gray-500 ml-3">(150)</div>
                                    </div>
                                </div>
                                <a href="#" class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add to cart</a>
                                <!-- product-content end-->
                            </div>
                            <!-- single product end-->
                        <?php } ?>
                    </div>
                <!-- product grid end-->
        </div>
        <!-- products end-->
    </div>
    <!-- shop wrapper end-->

    <?php includeView("view/inc/footer.php"); ?>
    <?php includeView("view/inc/copyright.php"); ?>

    </body>
</html>
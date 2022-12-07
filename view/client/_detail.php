<?php
$product = detail_product($_GET["id"]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="<?= asset("css/style.css") ?>">
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
        <p class="text-gray-600 font-medium">Product view</p>
    </div>
    <!-- breadcrums end-->

    <!-- product view -->
    <div class="container grid grid-cols-2 gap-6">
        <!-- product image -->
        <div>
            <img src="<?= asset($product['img']) ?>" class="w-full" alt="">
            <div class=" gap-5 mt-4 flex flex-row">
                <img src="<?= asset($product['img']) ?>" class="w-10 cursor-pointer border border-primary" alt="">
                <img src="<?= asset($product['img']) ?>" class="w-10 cursor-pointer border">
                <img src="<?= asset($product['img']) ?>" class="w-10 cursor-pointer border">
                <img src="<?= asset($product['img']) ?>" class="w-10 cursor-pointer border">
                <img src="<?= asset($product['img']) ?>" class="w-10 cursor-pointer border">
            </div>
        </div>
        <!-- product image end-->

        <!-- product content -->
        <div>
            <h2 class="text-3xl font-medium uppercase mb-2"><?= $product['name']; ?></h2>
            <div class="flex items-center mb-4">
                <div class="flex gap-1 text-sm text-yellow-400">
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                </div>
                <div class="text-xs text-gray-500 ml-3">(150 Reviews)</div>
            </div>
            <div class="spacee-y-2">
                <p class="text-gray-800 font-semibold space-x-2">
                    <span>Avilability:</span>
                    <span class="text-green-600">In Stock</span>
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Brand:</span>
                    <span class="text-gray-600">Apex</span>
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Category:</span>
                    <span class="text-gray-600">Sofa</span>
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">SKU:</span>
                    <span class="text-gray-600">BE45VGRT</span>
                </p>
            </div>
            <div class="flex items-baseline mb-1 space-x-2 font-roboto mt-4">
                <p class="text-2xl text-primary font-semibold"><?= number_format($product['price']); ?></p>
                <p class="text-base text-gray-400 line-through">$55.00</p>
            </div>
            <p class="mt-4 text-gray-600">
                <?= $product['description']; ?>
            </p>
            <!-- size filter -->
            <div class="pt-4">
                <h3 class="text-sm text-gray-800 uppercase mb-1">Size</h3>
                <div class="flex items-center gap-2">
                    <!-- single size -->
                    <div class="size-selector">
                        <input type="radio" name="size" class="hidden" id="size-xs">
                        <label for="size-xs" class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600 ">
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
                        <label for="size-m" class="text-xs border border-primary rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">
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
                <h3 class="text-sm text-gray-800 uppercase mb-1">color</h3>
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
                        <label for="color-red" class="border  border-primary rounded-sm h-5 w-5 cursor-pointer shadow-sm block" style="background-color: #fff;"></label>
                    </div>
                    <!-- single color end-->
                    <!-- single color -->
                    <div class="color-selector">
                        <input type="radio" name="color" class="hidden" id="color-black">
                        <label for="color-red" class="border border-gray-200 rounded-sm h-5 w-5 cursor-pointer shadow-sm block" style="background-color: #000;"></label>
                    </div>
                    <!-- single color end-->
                </div>
            </div>
            <!-- color filter end-->
            <form action="cart.php" method="post">
                <!-- <input type="hidden" name="action" value="create"> -->
                <input type="hidden" name="productId" value="<?= $product['id']; ?>">
                <!-- quantity -->
                <div class="mt-4">
                    <h3 class="text-sm text-gray-800 uppercase mb-1">Quantity</h3>
                    <div class="flex border border-gray-300 text-gray-600 divide-x divide-gray-300 w-max">
                        <div class="h8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">-</div>
                        <input type="text" name="quantity" value="<?= $product['quantity']; ?>" class="h8 w-8 text-base flex items-center justify-center" />
                        <div class="h8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">+</div>
                    </div>
                </div>
            </form>
            <!-- quantity end-->

            <!-- cart button -->
            <div class="flex gap-3 border-b border-gray-200 pb-5 mt-6">
                <form action="<?= url('cart') ?>" method="get">
                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                    <input type="hidden" name="quantity" value="1">
                    <button class="bg-primary border border-primary text-white px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:bg-transparent hover:text-primary transition" type="submit"><i class="fas fa-shopping-bag"></i> Add to cart</button>
                </form>
                <a href="#" class="border border-gray-300 text-gray-600 px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:text-primary transition">
                    <i class="fas fa-heart"></i> Wishlist
                </a>
            </div>
            <!-- cart button end-->

            <!-- social share -->
            <div class="flex gap-3 mt-4">
                <a href="#" class="text-gray-400 hover:text-gray-500 h-8 w-8 rounded-full border border-gray-300 flex items-center justify-center">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-500 h-8 w-8 rounded-full border border-gray-300 flex items-center justify-center">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-500 h-8 w-8 rounded-full border border-gray-300 flex items-center justify-center">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
            <!-- social share end-->
        </div>
        <!-- product content end-->
    </div>
    <!-- product view end-->

    <!-- product view details -->
    <div class="container pb-16">
        <h3 class="border-b border-gray-200 font-roboto text-gray-800 pb-3 font-medium">Product Details</h3>

        <div class="w-3/5 pt-6 ">
            <div class="text-gray-600 space-y-3">
                <p>
                    <?= $product['description']; ?>
                </p>
            </div>
            <!-- table -->
            <table class="table-auto border-collapse w-full text-left text-gray-600 text-sm mt-6">
                <tr>
                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Color</th>
                    <td class="py-2 px-4 border border-gray-300">Black, Brown, Reds</td>
                </tr>
                <tr>
                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Material</th>
                    <td class="py-2 px-4 border border-gray-300">Artificial Leather</td>
                </tr>
                <tr>
                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Weight</th>
                    <td class="py-2 px-4 border border-gray-300">55kg</td>
                </tr>
            </table>
            <!-- table end-->
        </div>
    </div>
    <!-- product view details end-->



    <?php includeView("view/inc/footer.php"); ?>

    <?php includeView("view/inc/copyright.php"); ?>
</body>

</html>
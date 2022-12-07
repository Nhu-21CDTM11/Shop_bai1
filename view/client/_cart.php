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

    <input type="hidden" value="<?= error_flash("logout") ?>" id="message">

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
        <p class="text-gray-600 font-medium">Cart</p>
        <a href="<?= url('index') ?>" class="p-4 ml-auto bg-yellow-500 hover:bg-yellow-700 border rounded-lg border-gray-300">BACK</a>
    </div>
    <!-- breadcrums end-->

    <!-- cart wrapper -->
    <div class="container lg:grid grid-cols-12 gap-6 items-start pb-16 pt-4">
        <!-- product cart -->
        <div class="xl:col-span-9 lg:col-span-8">
            <!-- cart title -->
            <div class="bg-gray-200 py-2 pl-12 pr-20 xl:pr-28 mb-4 hidden md:flex">
                <p class="text-gray-600 text-center">Product</p>
                <p class="text-gray-600 text-center ml-auto mr-16 xl:mr-24">Quantity</p>
                <p class="text-gray-600 text-center">Total</p>
            </div>
            <!-- cart title end -->

            <!-- shipping carts -->
            <div class="space-y-4 mb-5  ">

                <!-- single cart -->
                <?php if (!empty($_SESSION['cart'])) { ?>
                    <?php foreach ($_SESSION['cart'] as $cart) { ?>
                        <div class="flex items-center md:justify-between gap-4 md:gap-6 p-4 border border-gray-200 rounded flex-wrap md:flex-nowrap">
                            <!-- cart image -->
                            <div class="w-32 flex-shrink-0">
                                <img src="<?= asset($cart['img']) ?>" class="w-full">
                            </div>
                            <!-- cart image end -->
                            <!-- cart content -->
                            <div class="md:w-1/3 w-full">
                                <h2 class="text-gray-800 mb-3 xl:text-xl textl-lg font-medium uppercase">
                                    <?= $cart['name'] ?>
                                </h2>
                                <p class="text-primary font-semibold"><?= number_format($cart['price']) ?></p>
                                <p class="text-gray-500">Size: M</p>
                            </div>
                            <!-- cart content end -->
                            <!-- cart quantity -->
                            <div class="flex border border-gray-300 text-gray-600 divide-x divide-gray-300">
                                <div class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">
                                    <form action="<?= url('cart') ?>" method="post">
                                        <input type="hidden" name="cartIdT" value="<?= $cart['id'] ?>">
                                        <button type="submit">-</button>
                                    </form>
                                </div>
                                <div class="h-8 w-10 flex items-center justify-center"><?= $cart['quantity_cart'] ?></div>
                                <div class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">
                                    <form action="<?= url('cart') ?>" method="post">
                                        <input type="hidden" name="cartIdC" value="<?= $cart['id'] ?>">
                                        <button type="submit">+</button>
                                    </form>
                                </div>
                            </div>
                            <!-- cart quantity end -->
                            <div class="ml-auto md:ml-0">
                                <p class="text-primary text-lg font-semibold"><?= number_format($cart['quantity_cart'] * $cart['price']) ?></p>
                            </div>
                            <div class="text-gray-600 hover:text-primary cursor-pointer">
                                <form action="<?= url('cart') ?>" method="post">
                                    <input type="hidden" name="delete" value="<?= $cart['id'] ?>">
                                    <button type="submit"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <div class="flex items-center md:justify-between gap-4 md:gap-6 p-4 border border-gray-200 rounded flex-wrap md:flex-nowrap">Gio hang dang trong</div>
                <?php } ?>

                <!-- single cart end -->
            </div>
            <a href="cart.php?clear-all=on" class="p-4 bg-red-500 hover:bg-red-700 border rounded-lg border-gray-300">CLEAR-ALL</a>
            <!-- shipping carts end -->
        </div>
        <!-- product cart end -->
        <!-- order summary -->
        <div class="xl:col-span-3 lg:col-span-4 border border-gray-200 px-4 py-4 rounded mt-6 lg:mt-0">
            <h4 class="text-gray-800 text-lg mb-4 font-medium uppercase">ORDER SUMMARY</h4>
            <div class="space-y-1 text-gray-600 pb-3 border-b border-gray-200">
                <div class="flex justify-between font-medium">
                    <p>Subtotal</p>
                    <p><?= total_cart() ?></p>
                </div>
                <div class="flex justify-between">
                    <p>Delivery</p>
                    <p>Free</p>
                </div>
                <div class="flex justify-between">
                    <p>Tax</p>
                    <p>Free</p>
                </div>
            </div>
            <div class="flex justify-between my-3 text-gray-800 font-semibold uppercase">
                <h4>Total</h4>
                <h4><?= total_cart() ?></h4>
            </div>

            <!-- searchbar -->
            <div class="flex mb-5">
                <input type="text" class="pl-4 w-full border border-r-0 border-primary py-2 px-3 rounded-l-md focus:ring-primary focus:border-primary text-sm" placeholder="Coupon">
                <button type="submit" class="bg-primary border border-primary text-white px-5 font-medium rounded-r-md hover:bg-transparent hover:text-primary transition text-sm font-roboto">
                    Apply
                </button>
            </div>
            <!-- searchbar end -->

            <!-- checkout -->
            <a href="<?= url('checkout') ?>" class="bg-primary border border-primary text-white px-4 py-3 font-medium rounded-md uppercase hover:bg-transparent
             hover:text-primary transition text-sm w-full block text-center">
                Process to checkout
            </a>
            <!-- checkout end -->
        </div>
        <!-- order summary end -->
    </div>
    <!-- cart wrapper end -->

    <!-- footer -->
    <?php includeView("view/inc/footer.php"); ?>

    <?php includeView("view/inc/copyright.php"); ?>

</body>

</html>
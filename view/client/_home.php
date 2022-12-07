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
    
    <input type="hidden" value="<?= error_flash( "logout" ) ?>" id="message" >

    <?php includeView("view/inc/header.php"); ?>
    <?php includeView("view/inc/navbar.php"); ?>

    <!-- banner -->
    <div class="bg-cover bg-no-repeat bg-center py-36" style="background-image:  url('<?= asset("images/banner-2.jpg")?>');">
        <div class="container">
            <h1 class="text-6xl text-gray-800 font-medium mb-4 capitalize">
                best collection for <br> home decoration
            </h1>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore inventore aperiam necessitatibus fugit <br> adipisci temporibus tempore, enim cumque est voluptas! Natus rem exercitationem vitae quisquam amet atque consequatur nihil consectetur!
            </p>
            <div class="mt-12">
                <a href="shop.html" class="bg-primary border border-primary text-white px-8 py-3 font-medium rounded-md hover:bg-transparent hover:text-primary transition">Shop now</a>
            </div>
        </div>
    </div>
    <!-- banner end -->

    <!-- feature section -->
    <div class="container py-16">
        <div class="w-10/12 grid grid-cols-3 gap-6 mx-auto justify-center">
            <!-- single feature -->
            <div class="border border-primary rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                <img src="<?= asset("images/truck.svg")?>" class="w-12 h-12 object-contain" alt="">
                <div>
                    <h4 class="font-medium capitalize text-lg">Free shipping</h4>
                    <p class="text-gray-500 text-sm">Order over $200</p>
                </div>
            </div>
            <!-- single feature end -->
            <!-- single feature -->
            <div class="border border-primary rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                <img src="<?= asset("images/cash-pay.svg")?>" class="w-12 h-12 object-contain" alt="">
                <div>
                    <h4 class="font-medium capitalize text-lg">Money Returns</h4>
                    <p class="text-gray-500 text-sm">30 days money return</p>
                </div>
            </div>
            <!-- single feature end -->
            <!-- single feature -->
            <div class="border border-primary rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                <img src="<?= asset("images/24-hours.svg")?>" class="w-12 h-12 object-contain" alt="">
                <div>
                    <h4 class="font-medium capitalize text-lg">24/7 Support</h4>
                    <p class="text-gray-500 text-sm">Customer support</p>
                </div>
            </div>
            <!-- single feature end -->
        </div>
    </div>
    <!-- feature section end -->

    <!-- categories -->
    <div class="container py-16">
        <h2 class="text-3xl font-medium text-gray-800 uppercase mb-6">shop by category</h2>
        <div class="grid grid-cols-3 gap-3">

        <?php foreach ( get_categories() as $category ) { ?>
            <!-- single category -->
            <div class="relative rounded-sm overflow-hidden group">
                <img src="<?= asset( $category['img_category']) ?>" class="w-full" alt="">
                <a href="<?= url( 'product' ) . '?category=' . $category[ 'id' ] ?>" class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-50 transition"><?= $category['name_category'] ?></a>
            </div>
            <!-- single category end -->
        <?php } ?>
        </div>
    </div>
    <!-- categories end -->

    <!-- product wrapper -->
    <div class="container pb-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">top new arrival</h2>
        <!-- product grid -->
        <div class="grid grid-cols-4 gap-6">
            <?php foreach ( get_product() as $product ) { ?>
                <!-- single product -->
                <div class="bg-white shadow rounded overflow-hidden group">
                    <!-- product image -->
                    <div class="relative">
                        <img src="<?= asset($product['img'])?>" class="w-full" alt="">
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
                        <a href="./detail.php?id=<?=$product['id']?>">
                            <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition"><?= $product['name'] ?></h4>
                        </a>
                        <div class="flex items-baseline mb-1 space-x-2 font-roboto">
                            <p class="text-xl text-primary font-semibold"><?= number_format($product['price']) ?></p>
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
                            <div class="text-xs text-gray-500 ml-3">Quantity: <?=$product['quantity']?></div>
                        </div>
                    </div>
                    <form action="<?= url('cart') ?>" method="get">
                        <input type="hidden" name="id" value="<?= $product['id']?>">
                        <input type="hidden" name="quantity" value="1">
                        <button class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition" type="submit">Add to cart</button>
                    </form>
                    <!-- product-content end-->
                </div>
                <!-- single product end-->
            <?php }?>
        </div>
        <!-- product grid end-->
    </div>
    <!-- product wrapper end-->

    <!-- ad section -->
    <div class="container pb-16">
        <img src="<?= asset("images/offer-2.jpg")?>" class="w-full" alt="">
    </div>
    <!-- ad section end-->

    <!-- product wrapper -->
    <div class="container pb-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">recomended for you</h2>
        <!-- product grid -->
        <div class="grid grid-cols-4 gap-6">
            <?php foreach ( get_product() as $product ) { ?>
                <!-- single product -->
                <div class="bg-white shadow rounded overflow-hidden group">
                    <!-- product image -->
                    <div class="relative">
                        <img src="<?= asset( $product['img']) ?>" class="w-full" alt="">
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
                        <a href="./detail.php?id=<?=$product['id']?>">
                            <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition"><?= $product[ 'name' ] ?></h4>
                        </a>
                        <div class="flex items-baseline mb-1 space-x-2 font-roboto">
                            <p class="text-xl text-primary font-semibold"><?= number_format(  $product['price'] ) ?> VND</p>
                            <p class="text-sm text-gray-400">Quantity: <?= $product['quantity'] ?></p>
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
                    <form action="<?= url('cart') ?>" method="get">
                        <input type="hidden" name="id" value="<?= $product['id']?>">
                        <input type="hidden" name="quantity" value="1">
                        <button class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition" type="submit">Add to cart</button>
                    </form>
                    <!-- product-content end-->
                </div>
                <!-- single product end-->
            <?php } ?>
        </div>
        <!-- product grid end-->
    </div>
    <!-- product wrapper end-->

    <?php includeView("view/inc/footer.php"); ?>

    <?php includeView("view/inc/copyright.php"); ?>

    <script> 
    var message = document.getElementById( "message" ).value;
    if ( message ) {
        alert(  message );
    }
    </script>
    </body>
</html>
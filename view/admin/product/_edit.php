<?php
$page_title = "edit product";
$product = detail_product($_GET['id']);
$categories = get_categories();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <title>Admin</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="<?= asset('css/admin/nucleo-icons.css') ?>" rel="stylesheet" />
    <link href="<?= asset('css/admin/nucleo-svg.css') ?>" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link href="<?= asset('css/admin/soft-ui-dashboard-tailwind.css?v=1.0.4') ?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?= asset('css/style.css') ?>">

</head>

<body>
    <?php includeView('view/admin/inc/sideleft.php'); ?>
    <?php includeView('view/admin/inc/navbar.php', compact("page_title", "name")); ?>
    <form action="<?= url('admin.product.edit') ?>" method="post" enctype="multipart/form-data">
        <?= rollback() ?>
        <div class=" p-6 w-4/5 mx-auto pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex flex-row">
            <a href="<?= url('admin.product.index') ?>" class=" mt-2 ml-auto bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 border border-green-700 rounder">BACK</a>
        </div>
        <div class="mx-auto w-1/2">
            <input type="hidden" name="id" value="<?= $product['id'] ?>">
            <input type="hidden" name="img" value="<?= $product['img'] ?>">
            <div class="mb-6">
                <label for="" class="font-semibold uppercase">Name: </label>
                <input type="text" id="default-input" name="name" value="<?= $product['name'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-blue-100 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <?= error('name') ?>
            </div>
            <div class="mb-6">
                <label for="" class="font-semibold uppercase">Image</label>
                <input type="file" id="img" name="img" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-blue-100 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <img src="<?= asset($product['img']) ?>" class="img-fluid rounded-top w-60 rounded-xl mt-2" id="reviewImage" alt="">
            </div>
            <div class="mb-6">
                <label for="" class="font-semibold uppercase">Price: </label>
                <input type="number" id="default-input" name="price" value="<?= $product['price'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-blue-100 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <?= error('price') ?>
            </div>
            <div class="mb-6">
                <label for="" class="font-semibold uppercase">Quantity: </label>
                <input type="number" id="default-input" name="quantity" value="<?= $product['quantity'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-blue-100 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <?= error('quantity') ?>
            </div>
            <div class="mb-6">
                <label for="" class="font-semibold uppercase">Category: </label>
                <select name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-blue-100 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"" >
                    <?php foreach ($categories as $key => $value ) {?>
                        <option value="<?= $value['id'] ?>"><?= $value['name_category'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-6">
                <label for="" class="font-semibold uppercase">Description</label>
                <textarea name="description" id="description" cols="" rows="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-blue-100 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"><?= $product['description'] ?></textarea>
                <?= error('description') ?>
            </div>
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-3 border mx-80 rounded " type="submit">SAVE</button>

        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <script>
        $("#img").change( function() {
            var file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    $("#reviewImage").attr("src", event.target.result);
                }
                reader.readAsDataURL(file);
            }
        })
        CKEDITOR.replace('description');

    </script>
</body>

</html>
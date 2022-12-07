<?php
$page_title = "products";
$products = get_product();
$id = 1;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <title>Soft UI Dashboard Tailwind</title>
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
    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200 ps ps--active-y">
        <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex flex-row justify-between">
            <h6 class="text-lg uppercase font-semibold">Products</h6>
            <a href="<?= url('admin.product.create') ?>" class=" mt-2 mr-32 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounder">Create</a>
        </div>

        <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
            <thead class="align-bottom">
                <tr>
                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-black">#</th>
                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-black text-md">Name</th>
                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-black text-md">Image</th>
                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-black text-md">Description</th>
                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-black text-md">Price</th>
                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-black text-md">Quantity</th>
                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-black text-md">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $key => $value) { ?>
                    <tr>

                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <?= $id++ ?>
                        </td>

                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <span class="font-semibold leading-tight text-sm text-black"><?= $value['name'] ?></span>
                        </td>
                        <td class="p-2 pl-12 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                            <img src="<?= asset($value['img']) ?>" alt="" class="w-10">
                        </td>
                        <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <span class="font-semibold leading-tight text-sm text-black">
                                <?= $value['description'] ?>
                            </span>
                        </td>
                        <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <span class="font-semibold leading-tight text-sm text-black">
                                <?= $value['price'] ?>
                            </span>
                        </td>
                        <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <span class="font-semibold leading-tight text-sm text-black">
                                <?= $value['quantity'] ?>
                            </span>
                        </td>
                        <td class="p-2 flex items-center justify-center">
                            <form action="<?= url('admin.product.edit') ?>" method="get">
                                <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 border border-yellow-700 rounded" type="submit">Edit</button>
                            </form>
                            <form action="<?= url('admin.product.delete') ?>" method="get">
                                <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded ml-6" type="submit">Delete</button>
                            </form>
                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>

</body>

</html>
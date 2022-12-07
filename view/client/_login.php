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

    <!-- login -->
    <div class="container py-16">
        <div class="max-w-lg mx-auto shadow px-6 py-7 rounded overflow-hidden">
            <h2 class="text-2xl uppercase font-medium mb-1">Login</h2>
            <p class="text-gray-600 mb-6 text-sm">
                Login if you are a returing customer
            </p>
            <?= error( 'login' ) ?>
            <form action="<?= url( "login" ) ?>" method="POST">
                <div class="space-y-4">
                    <div>
                        <label class="text-gray-600 mb-2 block">Email Address</label>
                        <input type="email" name="email" class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:border-primary placeholder-gray-400" placeholder="Enter your email address">
                        <?= error( 'email' ) ?>
                    </div>
                    <div>
                        <label class="text-gray-600 mb-2 block">Password</label>
                        <input type="password" name="password" class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:border-primary placeholder-gray-400" placeholder="Enter your password">
                        <?= error( 'password' ) ?>
                    </div>
                </div>
                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="agreement" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                        <label for="agreement" class="text-gray-600 ml-3 cursor-pointer">Remember me</label>
                    </div>
                    <a href="#" class="text-primary">Forgot password?</a>
                </div>
                <div class="mt-4">
                    <button type="submit" class="block w-full py-2 text-center text-white bg-primary border border-primary roundded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">
                        Login
                    </button>
                </div>
            </form>

            <!-- login with -->
            <div class="mt-6 flex justify-center relative">
                <div class="text-gray-600 uppercase px-3 bg-white z-10 relative">Or login with</div>
                <div class="absolute left-0 top-3 w-full border-b-2 border-gray-200 "></div>
            </div>
            <div class="flex mt-4 gap-4">
                <a href="#" class="w-1/2 py-2 text-center text-white bg-blue-800 rounded uppercase font-roboto font-medium text-sm hover:bg-blue-700 ">Facebook</a>
                <a href="#" class="w-1/2 py-2 text-center text-white bg-yellow-600 rounded uppercase font-roboto font-medium text-sm hover:bg-yellow-500 ">Google</a>
            </div>
            <!-- login with end-->
            <p class="mt-4 text-gray-600 text-center">
                Don't have an account? <a href="register.html" class="text-primary">Register now</a>
            </p>
        </div>
    </div>
    <!-- login end-->

    <?php includeView("view/inc/footer.php"); ?>

    <?php includeView("view/inc/copyright.php"); ?>
</body>
</html>

<!DOCTYPE html>
<html lang="en" class="no-js">

    <head>

        <meta charset="utf-8">
        <title>Fullscreen Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="vendor/login/css/reset.css">
        <link rel="stylesheet" href="vendor/login/css/supersized.css">
        <link rel="stylesheet" href="vendor/login/css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body>

        <div class="page-container">
            <h1>登录</h1>
            <form action="index.php?c=login&m=login" method="post">
                <input type="text" name="us" class="us" placeholder="Username">
                <input type="password" name="ps" class="ps" placeholder="Password">
                <button type="submit">登录</button>
                <div class="error"><span>+</span></div>
            </form>
        </div>

        <!-- Javascript -->
        <script src="vendor/login/js/jquery-1.8.2.min.js"></script>
        <script src="vendor/login/js/supersized.3.2.7.min.js"></script>
        <script src="vendor/login/js/supersized-init.js"></script>
        <script src="vendor/login/js/scripts.js"></script>

    </body>

</html>


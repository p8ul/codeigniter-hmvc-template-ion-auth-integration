<!DOCTYPE html>
<!--[if IE 8]> <html class="ie8"> <![endif]-->
<!--[if IE 9]> <html class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title><?php echo $template['title']; ?></title>
        <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <?=theme_css("icons/icomoon/styles.css");?>
    <?=theme_css("bootstrap.css");?>
    <?=theme_css("core.css");?>
    <?=theme_css("components.css");?>
    <?=theme_css("colors.css");?>
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <?=theme_js("plugins/loaders/pace.min.js");?>
    <?=theme_js("core/libraries/jquery.min.js");?>
    <?=theme_js("core/libraries/bootstrap.min.js");?>
    <?=theme_js("plugins/loaders/blockui.min.js");?>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <?=theme_js("plugins/forms/styling/uniform.min.js");?>

    <?=theme_js("core/app.js");?>
    <?=theme_js("pages/login.js");?>

    <?=theme_js("plugins/ui/ripple.min.js");?>
    <!-- /theme JS files -->
    </head>
    <body>

<body class="login-container bg-slate-800">

    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">
            <?php echo $template['body']; ?>
        </div><!-- End .container -->

    </div><!-- End #content -->
         
    </body>
</html>

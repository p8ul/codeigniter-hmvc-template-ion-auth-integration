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
        <?=theme_css('custom.css');?>

        <!-- Core JS files -->
        <?=theme_js("plugins/loaders/pace.min.js");?>
        <?=theme_js("core/libraries/jquery.min.js");?>
        <?=theme_js("core/libraries/bootstrap.min.js");?>
        <?=theme_js("plugins/loaders/blockui.min.js");?>

        <?=theme_js("plugins/ui/nicescroll.min.js");?>
        <?=theme_js("plugins/ui/drilldown.js");?>
        <!-- /core JS files -->

        <!-- Theme JS files -->
        <?=theme_js("plugins/buttons/hover_dropdown.min.js");?>
        <?=theme_js("plugins/ui/jquery-validation/jquery.validate.js");?>
       <?=theme_js("plugins/notifications/jgrowl.min.js");?>
       <?=theme_js("core/app.js");?>
       <?=theme_js("pages/layout_sidebar_sticky_custom.js");?>
        <!-- /theme JS files -->

        <!-- /core JS files -->

        <!-- Theme JS files -->
        <?=theme_js("plugins/forms/styling/uniform.min.js");?>
  </head>
  <body class="navbar-top-md-md" > 
   <!-- Fixed navbars wrapper -->
   <div class="navbar-fixed-top">       
    <?php echo $template['partials']['top']; ?>
     <!-- echo $template['partials']['navbar']; ?> -->
   </div>
    <!-- echo $template['partials']['breadcrumb']; ?> -->
    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">
            <?php echo $template['partials']['sidebar']; ?>
            <?php echo $template['body']; ?>
        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->          
    <?php echo $template['partials']['footer']; ?>
  </body>
</html>

<!doctype html>
<html lang="sv"> 
<head>
  <meta charset="utf-8">
  <title><?=$title?></title>
  <link rel="stylesheet" href="<?=$stylesheet?>">
</head>
<body>
  <div id="header">
    <?=$header?>
  </div>
  <div id="main" role="main">
    <?=$main?>
    <?=get_debug()?>
  </div>
  <div id="footer">
    <?=$footer?>
  </div>
</body>
</html>
<?php /*
<!doctype html>
<html class="no-js" lang='<?=$mvc['config']['language']?>'>
<head>
<meta charset='utf-8'/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?=$title?></title>
<?php if(isset($favicon)): ?><link rel='shortcut icon' href='<?=$favicon?>'/><?php endif; ?>
<?php foreach($stylesheet as $val): ?>
<link rel='stylesheet' type='text/css' href='<?=$val?>'/>
<?php endforeach; ?>
<script src="js/vendor/modernizr-2.7.1.min.js"></script>
</head>
<body>
        <!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
  <div id="wrapper">
  <div id="header">
    <?=$header?><!--<?php echo CNavigation::GenerateMenu($menu,$menuClass);?>-->
  </div>
  <div id="main" role="main">
    <?=$main?>
    <?php get_debug(); ?>
  </div>
  <div id="footer">
    <?=$footer?>
  </div>
  </div>
<?php if(isset($jquery)):?><script src='<?=$jquery?>'></script><?php endif; ?>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
<?php if(isset($javascript_include)): foreach($javascript_include as $val): ?>
<script src='<?=$val?>'></script>
<?php endforeach; endif; ?>

<?php if(isset($google_analytics)): ?>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
<?php endif; ?>

</body>
</html>-->*/

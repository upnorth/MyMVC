<?php

//
// PHASE: BOOTSTRAP
//
define('MYMVC_INSTALL_PATH', dirname(__FILE__));
define('MYMVC_SITE_PATH', MYMVC_INSTALL_PATH . '/site');

require(MYMVC_INSTALL_PATH.'/src/bootstrap.php');

autoload('ISingelton');

autoload('CMyMVC');

$mvc = CMyMVC::Instance();
//
// PHASE: FRONTCONTROLLER ROUTE
//
$mvc->FrontControllerRoute();
//
// PHASE: THEME ENGINE RENDER
//
$mvc->ThemeEngineRender();

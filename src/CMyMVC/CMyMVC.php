<?php
/**
* Main class for Lydia, holds everything.
*
* @package LydiaCore
*/
class CMyMVC implements ISingleton {

   private static $instance = null;

   /**
    * Constructor
    */
   protected function __construct() {
      // include the site specific config.php and create a ref to $mvc to be used by config.php
      $mvc = &$this;
      require(MYMVC_SITE_PATH.'/config.php');
   }

   /**
    * Singleton pattern. Get the instance of the latest created object or create a new one. 
    * @return CLydia The instance of this class.
    */
   public static function Instance() {
      if(self::$instance == null) {
         self::$instance = new CMyMVC();
      }
      return self::$instance;
   }

   /**
    * Frontcontroller, check url and route to controllers.
    */
  public function FrontControllerRoute() {
    // Step 1
    // Take current url and divide it in controller, method and parameters
    $this->request = new CRequest();
    $this->request->Init($this->config['base_url']);
    $controller = $this->request->controller;
    $method     = $this->request->method;
    $arguments  = $this->request->arguments;
    // Step 2
    // Check if there is a callable method in the controller class, if then call it
    // Is the controller enabled in config.php?
    $controllerExists    = isset($this->config['controllers'][$controller]);
    $controllerEnabled    = false;
    $className             = false;
    $classExists           = false;
    // Check if controller has a callable method in the controller class, if then call it
    if($controllerExists) {
      $controllerEnabled    = ($this->config['controllers'][$controller]['enabled'] == true);
      $className               = $this->config['controllers'][$controller]['class'];
      $classExists           = class_exists($className);
    }
    if($controllerExists && $controllerEnabled && $classExists) {
      $rc = new ReflectionClass($className);
      if($rc->implementsInterface('IController')) {
        if($rc->hasMethod($method)) {
          $controllerObj = $rc->newInstance();
          $methodObj = $rc->getMethod($method);
          $methodObj->invokeArgs($controllerObj, $arguments);
        } else {
          die("404. " . get_class() . ' error: Controller does not contain method.');
        }
      } else {
        die('404. ' . get_class() . ' error: Controller does not implement interface IController.');
      }
    } 
    else { 
      die('404. Page is not found.');
    }
    $this->data['debug']  = "REQUEST_URI - {$_SERVER['REQUEST_URI']}\n";
    $this->data['debug'] .= "SCRIPT_NAME - {$_SERVER['SCRIPT_NAME']}\n";
  }

   /**
    * Theme Engine Render, renders the views using the selected theme.
    */

  public function ThemeEngineRender() {
    // Get the paths and settings for the theme
    $themeName    = $this->config['theme']['name'];
    $themePath    = MYMVC_INSTALL_PATH . "/themes/{$themeName}";
    $themeUrl	 = $this->request->base_url . "themes/{$themeName}";
    
    // Add stylesheet path to the $mvc->data array
    $this->data['stylesheet'] = "{$themeUrl}/main.css";

    // Include the global functions.php and the functions.php that are part of the theme
    $mvc = &$this;
    include(MYMVC_INSTALL_PATH . '/themes/functions.php');
    $functionsPath = "{$themePath}/functions.php";
    if(is_file($functionsPath)) {
      include $functionsPath;
    }

    // Extract $mvc->data to own variables and handover to the template file
    extract($mvc->data);      
    include("{$themePath}/default.tpl.php");
  }
}

<?php
/**
* Standard controller layout.
* 
* @package LydiaCore
*/
class CCIndex implements IController {

   /**
    * Implementing interface IController. All controllers must have an index action.
    */
   public function Index() {   
      global $mvc;
      $mvc->data['title'] = "The Index Controller";
   }

}

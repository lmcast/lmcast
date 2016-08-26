<?php
  class LMNConnect {
    private static $_instance = null;
    private function __construct(){
      try{
        $this->_db = new mysqli_connect('localhost', 'root', '', 'lmn-cms');
      }catch(Exception $e){
        die($e->getMessage());
      }
    }

    public static function getInstance(){
    if(!isset(self::$_instance)) {
      self::$_instance = new LMNConnect();
    }
    return self::$_instance;
    }
  }

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Locale
 *
 * @author jaCUBE
 */
class Language {
  
  
  static function getLocale(){
    if(!empty($_POST['locale'])){
      $locale = $_POST['locale'];
    }elseif(Language::getCookie()){
      $locale = Language::getCookie();
    }else{
      $locale = Language::getBrowserLocale();
    }
    
    Language::setCookie($locale);
    
    return $locale == 'cs' ? 'cs' : 'en';
  }
  
  static function getBrowserLocale(){
    $locale = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    
    if($locale == 'cs'){
      return 'cs';
    }else{
      return 'en';
    }
  }
  
  
  static function setCookie($locale = 'cs'){
    $expire = time() + 14 * 24 * 60 * 60;
    setcookie('locale', $locale, $expire, '/');
  }
  
  static function getCookie(){
    return @$_COOKIE['locale'];
  }
}

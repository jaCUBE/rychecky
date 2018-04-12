<?php

/**
 * Poskytuje vše potřebné ke správě jazyků webu.
 * @class Language
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

class Language {

	/**
	 * Zjišťuje právě zapntuý jazyk.
	 * @return string Kód zapnutého jazyku ISO 639-1
	 */
  
  static function getLocale(){
    if(!empty($_POST['locale'])){ // Jazyk se právě přepíná...
      $locale = $_POST['locale'];
    }elseif(Language::getCookie()){ // Jazyk je uložení v cookies...
      $locale = Language::getCookie();
    }else{
      $locale = Language::getBrowserLocale(); // Fallback: jazyk prohlížeče
    }

    return $locale == 'cs' ? 'cs' : 'en'; // Nejde mít nic jiného než 'cs' a 'en'
  }





	/**
	 * Zjišťuje jazyk prohlížeče návštěvníka.
	 * @return string Kód jazyku prohlížeče ISO 639-1
	 */

  static function getBrowserLocale(){
    $locale = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2); // Jazyk prohlížeče

		return $locale == 'cs' ? 'cs' : 'en'; // Nejde mít nic jiného než 'cs' a 'en'
  }





	/**
	 * Nastavuje cookie jazyku webové stránky.
	 * @param string $locale Kód jazyku ISO 639-1
	 */
  
  static function setCookie($locale = 'cs'){
    $expire = time() + 14 * 24 * 60 * 60; // Platnost
    setcookie('locale', $locale, $expire, '/');
  }





	/**
	 * Získává kód jazyku nastaveného v cookies (je-li).
	 * @return string Kód jazyku ISO 639-1
	 */
  
  static function getCookie(){
    return (string) @$_COOKIE['locale'];
  }


}
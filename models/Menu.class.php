<?php
/**
 * Created by PhpStorm.
 * User: jaCUBE
 * Date: 12.04.2018
 * Time: 18:29
 */


class Menu {

	static function generateMenu(){
		$menu = [
			'' => [
				'name' => e('Informace', 'Info'),
				'icon' => 'fa-home'],
			'skills' => [
				'name' => e('Dovednosti', 'Skills'),
				'icon' => 'fa-database'],
			'portfolio' => [
				'name' => e('Portfolio', 'Portfolio'),
				'icon' => 'fa-bookmark'],
			'experiences' => [
				'name' => e('Zkušenosti', 'Experiences'),
				'icon' => 'fa-briefcase'],
			'certificate' => [
				'name' => e('Certifikace', 'Certificates'),
				'icon' => 'fa-certificate'],
			'certificate' => [
					'name' => e('Kontakt', 'Contact'),
					'icon' => 'fa-envelope'],
		];

		return $menu;
	}


	static function isMenuSelected($url){
		return action() == $url;
	}

}
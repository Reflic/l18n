<?php
/*
* @name l18n
* @description A small l18n class for easy localization.
* @author Kevin (http://www.xn--fundstcke-im-netz-72b.de/)
* @version 1.0
* @source https://github.com/Reflic/l18n
*/

class l18n {

	private static $language = 'en';
	private static $country = 'GB';
	private static $langcode = 'en_GB';
	private static $path = 'lang/';
	public static $lines = array();

	private static $log = 'true';  

	
	public static function set_lang($langcode){
		$part = explode('_', $langcode);
		self::$language = $part[0];
		self::$country = $part[1];
		self::$langcode = $langcode;
	}

	public static function get_country(){
		return self::$country;
	}

	public static function get_language(){
		return self::$language;
	}

	public static function get_langcode(){
		return self::$langcode;
	}

	private static function path($section){
		$path = self::$path.self::$langcode.'/'.$section.'.php';
		return $path;
	}

	private static function load($section){
		if(file_exists(self::path($section))){
			self::$lines[self::$langcode][$section] = require(self::path($section));
			return true;
		}
		else {
			return false;
		}
	}

	public static function line($key, $default){
		$key_part = explode('.', $key);
		$section = $key_part[0];
		$line = $key_part[1];

		if(isset(self::$lines[self::$langcode][$section][$line])){
			return self::$lines[self::$langcode][$section][$line];			
		}
		else {
			if(self::load($section) == true){
				return self::$lines[self::$langcode][$section][$line];	
			}
			else {
				#Logging
				if(self::$log == 'true'){
					$file = fopen("l18n_log.txt","a+");
					$text = date('d.m.Y H:i:s').' '.$_SERVER['REMOTE_ADDR'].' '.self::$langcode.'-'.$key;
					fputs($file, $text."\n");
					fclose($file); 
				}
				return $default;						
			}
		}
	}	
}




function __($key, $default){
	return l18n::line($key, $default);
}

?>
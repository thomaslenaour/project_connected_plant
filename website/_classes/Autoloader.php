<?php

/**
 * Class allowing the automatic loading of all classes
 */
class Autoloader {

	/**
	 * Static function allowing the automatic loading of all classes
	 */
	static function register() {
		spl_autoload_register(function($class) {
			include_once '_classes/' . $class . '.php';
		});
	}
	
}
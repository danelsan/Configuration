<?php

namespace danelsan\configuration;

/** 
 * Configuration of variables into a class
 * 
 * @author Frulla Daniele <daniele.frulla@newstechnology.eu>
 * @version 1.0
 * @created		04/02/2015
 * @updated		04/02/2015
 */
interface  IConfiguration {
	public function file($path);
	public function vector($arr);
	public static function load($name);
	public function save();
	public function get($key);
	public function set($key, $value);
	public function delete( $key );
	public function setArray( array $array );
	public function getArray();
}
?>

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
class  Configuration implements IConfiguration {
	private static $_instance;
	private $config;
	
	private function __construct() {
		$this->config = new ConfigArray( array() );	
	}
	
	public function file( $path ) {
		$this->config = new ConfigFile( $path );			
	}
	
	public function vector( $arr ) {
		$this->config = new ConfigArray( $arr );	
	}
	
	public static function load( $name ) {
		if ( !isset( self::$_instance[$name] ) ) {
			$config = new Configuration();
			self::$_instance[$name] = $config;
			return self::$_instance[ $name ];
		} 
		return self::$_instance[$name];
	}
	
	public function save() {
		$this->config->write();	
	}
	
	public function get( $key ) {
		return $this->config->get( $key );	
	}
	
	public function set( $key , $value ) {
		$this->config->set( $key , $value );
	}
	
	public function delete(  $key  ) {
		$this->config->delete( $key );
	}
	
	public function setArray( array $array ) {
				
	}
	
	public function getArray() {
		
	}
	
	public function toArray() {
		return $this->config->toArray();
	}
}
?>

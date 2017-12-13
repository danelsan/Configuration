<?php

namespace danelsan\configuration;

/** 
 * Configuration Class for arrays Data
 * 
 * @author Frulla Daniele <daniele.frulla@newstechnology.eu>
 * @version 1.0
 * @created		04/02/2015
 * @updated		04/02/2015
 */
class  ConfigArray implements IConfigData {
	private $data;
	
	public function __construct( $data ) {
		if ( is_array( $data ) )
			$this->data = $data;
		else
			$this->data = array();
	}
	
	public function get( $key ) {
		if ( isset( $this->data[$key] ) )
			return $this->data[$key];
	}
	
	public function set( $key, $value ) {
		if ( is_string($key) || is_int($key) )
			$this->data[$key] = $value;
	}
	
	public function delete(  $key  ) {
		if ( isset( $this->data[$key] ) )
			unset ( $this->data[$key] );
	}
	
	public function write() {
		
	}

	public function toArray() {
		return $this->data;
	}
}
?>

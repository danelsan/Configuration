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
class  ConfigFile implements IConfigData {
	private $data;
	private $path_file;
	
	/**
	 * File need to have this variable:
	 * 
	 * $config = array(
	 * 		'conf1' => 'pippo',
	 * 		'conf2' => 'pluto',
	 * 		);
	 */
	public function __construct($path_file) {
		if ( !is_file( $path_file ) ) {
			$this->data = array();
		}
		else {
			include_once( $path_file );
			if ( isset( $config) && is_array ($config) ) {
				$this->data = $config;
				unset( $config );
			} else
				$this->data = array();
		}
		$this->path_file = $path_file;
	}
	
	public function get( $key ) {
		if ( isset( $this->data[$key] ) )
			return $this->data[$key];
	}
	
	public function set( $key, $value ) {
		if ( is_string($key) || is_int($key) ) {
			$this->data[$key] = $value;
			$this->write();
		}
	}
	
	public function delete(  $key  ) {
		if ( isset( $this->data[$key] ) ) {
			unset ( $this->data[$key] );
			$this->write();
		}
	}
	
	public function write() {
		$file = fopen( $this->path_file , "w" );
		$txt = "<?php\n";
		$txt .= $this->toPHPArray();
		$txt .= "?>\n";
		fwrite( $file , $txt );
		fclose( $file);
	}
	
	private function toPHPArray() {
		$content = '';
		foreach ( $this->data as $k => $v ) {
			$content .= '$config['."'" . $k . "'] = " . var_export ( $v, TRUE ) . ";\n";
		}
		return $content;
	}

	public function toArray() {
		return $this->data;
	}
}
?>

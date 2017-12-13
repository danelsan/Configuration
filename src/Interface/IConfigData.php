<?php

namespace danelsan\configuration;

/** 
 * Configuration Data Interface
 * 
 * @author Frulla Daniele <daniele.frulla@newstechnology.eu>
 * @version 1.0
 * @created		04/02/2015
 * @updated		04/02/2015
 */
interface  IConfigData {
	public function get($key);
	public function set($key, $value);
	public function delete(  $key  );
	public function write();
	public function toArray();
}
?>

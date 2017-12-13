<?php

declare(strict_types=1);

use danelsan\configuration\ConfigFile;
use PHPUnit\Framework\TestCase;

class ConfigFileTest extends TestCase {
	private $file;  
	
	private $dataConfig = array(
			't' 	=> 1,
			'e'		=> 3,
			'f'		=> 0,	
	);
	
	private $config;
	
	public function setUp() {
		$this->file = dirname (__FILE__ ) .'/testFile.php';
		$this->config = new ConfigFile( $this->file );
		$this->config->set('t', '11');
	}
	
	public function testSetConfig() {
		$this->assertEquals( $this->config->get('t'), '11');
		$this->assertNotEquals($this->config->get('e'), 3 );
	}
	public function testGetValue() {
		$this->assertNotEquals( $this->config->get('f'), 3);	
		$this->assertEquals( $this->config->get('t'), '11');

	}
	
	public function testDeleteValue() {	
		$this->config->delete('t');
		$this->assertNotEquals( $this->config->get('t'), '10');
	}
}

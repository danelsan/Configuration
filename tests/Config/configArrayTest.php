<?php

use danelsan\configuration\ConfigArray;

class ConfigArrayTest extends PHPUnit_Framework_TestCase {
	private $nameConfiguration = array(
				'config1', 
				'config2',
				'config3',
			);
	
	private $dataConfig = array(
			't' 	=> 1,
			'e'		=> 3,
			'f'		=> 0,	
	);
	
	private $config;
	
	public function setUp() {
		$this->config = new ConfigArray( $this->dataConfig );
	}

	public function testGetValue() {
		$this->assertEquals($this->config->get('t'), 1);
		$this->assertEquals($this->config->get('f'), 0);
		$this->assertEquals($this->config->get('t'), 1);
		$this->assertEquals($this->config->get('e'), 3);
		$this->assertNotEquals($this->config->get('t'), 0);
	}
	
	public function testDeleteValue() {	
		$this->config->delete('e');	
		$this->assertEquals($this->config->get('e'), null);
		$this->assertNotEquals($this->config->get('e'), 3);
		$this->config->delete('f');
		$this->assertEquals($this->config->get('f'), null );	
	}

	public function testSetConfig() {
		$this->config->set('t', '10');
		$this->assertEquals( $this->config->get('t'), '10');
		$this->assertEquals($this->config->get('e'), 3 );
	}
	
}

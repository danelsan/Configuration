<?php

declare(strict_types=1);

use danelsan\configuration\Configuration;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase {
	private $nameConfiguration = array(
				'config1', 
				'config2',
				'config3',
			);
	
	private $dataConfig = array(
			'e'	=> '3',
			'at' 	=> '2',
			'f'	=> '33',	
	);
	
	private $config;
	private $config_file;
	
	public function setUp() {
		$this->config_file = dirname (__FILE__ ) .'/testFile.php' ;
		$this->dataConfig = array(
			'e'	=> '3',
			'at' 	=> '2',
			'f'	=> '33',
		);
	}

	public function testGetArray() {
		$config = Configuration::load('config_arr');
		$config->vector( $this->dataConfig );
		$config->save();
		
		$config->set('at', 3);

		$this->assertEquals( $config->get('at'), 3 );

		$this->assertEquals($config->get('f'), 33);
		
		$this->assertEquals($config->get('e'), 3);
		$config->set('aa', 'a');
		$this->assertEquals($config->get('aa'), 'a');

	}	
	
	public function testGetValueA() {
		$config = Configuration::load('conf_file');
		$config->file( $this->config_file );
		$config->set('oo', 0);
		$this->assertEquals($config->get('oo'), 0);
		$this->assertNotEquals($config->get('at'), 2);
	}
}

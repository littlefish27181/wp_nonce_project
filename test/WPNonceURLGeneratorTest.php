<?php

require_once 'vendor/autoload.php';
use littlefish27181\WPNonce\WPNonceURLGenerator;
use PHPUnit\Framework\TestCase;
/**
 * Tests for class Nonce_Url_Generator.
 */
class WPNonceURLGeneratorTest extends TestCase
{
	/**
	* Test action.
	*
	* @var    string $test_action The default test action value.
 	*/
	private $test_action;
	
	/**
	* Test nonce.
	*
	* @var    string $test_action The default test nonce value.
 	*/
	private $test_nonce;
	/**
	* Test validator.
	*
	* @var    object $test_nug The default test generator object.
 	*/
	private $test_nug;
	/**
 	* Setting up the test environment.
 	*/
	protected function setUp() {
 		$this->test_action = 'my_action';
 		$this->test_name = 'my_name';
 		$this->test_nug1 = new WPNonceURLGenerator( $this->test_action );
 		$this->test_nug2 = new WPNonceURLGenerator( $this->test_action, $this->test_name );
 		
 		// Building nonce value.
 		$this->test_nonce = wp_create_nonce( $this->test_action );
 	}
	/**
 	* Test the object instance.
 	*/
    public function test_instance() {
		$this->assertInstanceOf( WPNonceURLGenerator::class, $this->test_nug1 );
		$this->assertInstanceOf( WPNonceURLGenerator::class, $this->test_nug2 );
	}
	/**
 	* Test the getter and setter for the action property.
 	*/
	public function test_get_set_action() {
 		$nug = $this->test_nug2;
 		// Check the getter.
 		$this->assertSame( $this->test_action, $nug->get_action() );
		// Check the setter.
 		$action = $nug->set_action( 'new_action' );
		$this->assertSame( $nug->get_action(), $action );
 	}
 	/**
 	* Test the getter and setter for the name property.
 	*/
 	public function test_get_set_name() {
 		$nug = $this->test_nug2;
 		// Check the getter.
 		$this->assertSame( $this->test_name, $nug->get_name() );
		
		// Check the setter.
 		$name = $nug->set_name( 'new_name' );
		$this->assertSame( $nug->get_name(), $name );
 	}
 	/**
 	* Test the getter and setter for the name property when default value in the constructor is used.
 	*/
 	public function test_default_name() {
 		$nug = new WPNonceURLGenerator( 'another_action' );
 		
 		// Check the action property getter.
 		$this->assertSame( 'another_action', $nug->get_action() );
 		// Check the name property getter: the name value now is the default one.
 		$this->assertSame( '_wpnonce', $nug->get_name() );
 	}
 	/**
 	* Test the generate_nonce method used for the straight generation of the nonce.
 	*/
 	public function test_generate_nonce() {
		$nug = $this->test_nug1;
		// The constructor sets nonce property to null. Checking null value.
		$this->assertNull( $nug->get_nonce() );
		// Generating the nonce.
		$nonce_generated = $nug->generate_nonce();
		// Check the nonce.
		$this->assertSame( $nonce_generated, $this->test_nonce );
 	}
    /**
 	* Test the getter and setter for the nonce property.
 	*/
 	public function test_get_set_nonce() {
 		$nug = $this->test_nug1;
 		// Getting nonce property.
 		$this->assertNull( $nug->get_nonce() );
		// Generating the nonce: default null.
 		$nonce_generated = $nug->generate_nonce();
 		// Overwrite the value generated and setting a new value for the nonce property.
 		$nug->set_nonce( 'new_nonce' );
 		// Checking failure.
 		$this->assertNotEquals( $nonce_generated, $nug->get_nonce() );
 		// Checking actual nonce value.
 		$this->assertSame( 'new_nonce', $nug->get_nonce() );
 	}
    /**
 	* Test the generate_nonce_url method to build an url with a nonce query parameter to send via GET.
 	*/
 	public function test_generate_nonce_url(){
		// Generate the nonce and build the url.
		$url_generated = $this->test_nug1->generate_nonce_url( 'http://localhost/wordpress/' );
		// Building the expected url.
		$url_expected = 'http://localhost/wordpress/?_wpnonce='. $this->test_nonce;
		// Checking result.
		$this->assertSame( $url_generated, $url_expected);
 	}
}
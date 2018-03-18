<?php
 /**
  * @package littlefish27181\WPNonce
  */
namespace littlefish27181\WPNonce;

/**
 * WPNonce Interface Class
 */
interface WPNonceInterface {

	/**
	 * Get signature for action property.
	 *
	 * @return string $action Action value.
	 */
	public function get_action();

	/**
	 * Set signature for action property.
	 *
	 * @param string $param_action Action value.
	 * @return string $action      Action value set.
	 */
	public function set_action( $param_action );

	/**
	 * Get signature for name property.
	 *
	 * @return string $name The nonce name value.
	 */
	public function get_name();

	/**
	 * Set signature for name property.
	 *
	 * @param string $param_name Name for the nonce value to set.
	 * @return string $name      The nonce name value set.
	 */
	public function set_name( $param_name );

	/**
	 * Get signature for nonce property.
	 *
	 * @return string $nonce Nonce value.
	 */
	public function get_nonce();

	public function set_nonce( $param_nonce );
}
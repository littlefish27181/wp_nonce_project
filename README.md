# Wordpress Nonce OOP
Wordpress Nonce implementation in an object orianteted way.

## Requirements

* PHP 5.6.x
* WordPress 4.8.x
* Composer


## Installation

```sh
$ composer install
```

## Usage

Nonce Generation:

$generator = new WPNonceGenerator( 'action_parameter' );
$nonce = $generator->generate_nonce();

Create a nonce URL:

$url_generator = new WPNonceURLGenerator( 'action_parameter' );
$url = $url_generator->generate_nonce_url( 'localhost/wordpress' );

Create a nonce field:

$field_generator = new WPNonceFieldGenerator( 'action_parameter' );
$field_generated = $field_generator->generate_nonce_field()
$nonce = $field_generator->generate_nonce();

Verify a nonce:

$validator = new WPNonceValidator( 'action_parameter' );
$is_valid = $validator->validate_nonce($nonce);


## Run the tests
To run the tests, you have to execute commands below:

```sh
$ composer install
$ vendor/bin/phpunit test
```
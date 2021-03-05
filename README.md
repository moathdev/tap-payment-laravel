# Laravel Tap payment

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md) 
[![Latest Version on Packagist](https://img.shields.io/packagist/v/Moathdev/tap?style=flat-square)](https://packagist.org/packages/moathdev/tap) 
[![Total Downloads](https://img.shields.io/packagist/dt/Moathdev/tap.svg?style=flat-square)](https://packagist.org/packages/thujohn/twitter) 
![GitHub Release Date](https://img.shields.io/github/release-date/moathdev/tap?label=latest%20release&style=flat-square)

Pay payment API for Laravel  7.x & 8.x

You need to create an Account and create your access token in the [Tap Payment website](https://www.tap.company/).

## Installation

```
composer require  moathdev/tap
```

## Configuration 

Just set the below environment variables in your `.env`. 

```
TAP_SECRET_KEY_LIVE=
TAP_SECRET_KEY_SANDBOX=
```

### Advanced configuration

Run `php artisan vendor:publish --provider="Moathdev\Tap\TapServiceProvider"`
```
/config/tap.php
```



# Usage

## Functions

### Charges

* `getCharge()` - Retrieves the details of a charge that has previously been created. Supply the unique charge id that was returned from your  previous request, and Tap will return the corresponding charge information. The same information is returned when creating the charge.
* `CreateCharge()` - To charge a credit card or debit card (Knet, mada, Visa, MasterCard) or an existing authorized transactions, you create a charge request. If your API key is in test mode, the card won't actually be charged, though everything else will occur as if in live mode.

## Examples

Returns a collection of the most recent Tweets posted by the user indicated by the screen_name or user_id parameters.
```php
Route::get('/getCharge/{charge_id}', function($charge_id)
{
	return Tap::getCharge(['charge_id' => $charge_id]);
});
```

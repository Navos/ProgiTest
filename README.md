# Progi Car Bid Calculator

## Setup and Start

1. [Make sure Symfony CLI is installed](https://symfony.com/download)
2. `composer install`
3. `symfony server:start -d`
4. Go to [http://127.0.0.1:8000/] and you should see the Symfony Welcome page

## Test

To run the tests, run `php bin/phpunit`

## Calculate Page

The Car Bid Calculator is available at [http://127.0.0.1:8000/calculate]. Enter the price, the type of car and press calculate.

The server will respond with the price breakdown with the appropriate fees and total price.
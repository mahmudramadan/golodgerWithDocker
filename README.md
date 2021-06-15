# Get Advertisers hotel rooms with cheepest price

Get data from Adverisers Apis and make operation on it to return all hotel rooms with cheepest price for every room

## Assumptions

your code will be connected to 2 Advertisers. An advertiser is an Online
Travel Agency that offers hotel rooms or alternative accommodation bookable via an API.
When polling their APIs you will receive hotel room information.

1. A room can have taxes mentioned separately or have it already included in the total price
2. It is also possible that Advertiser 1 and Advertiser 2 offer information for a hotel that
3. the other does not offer, or that the Advertisers both offer the same hotel but at different or similar prices for the rooms.

# example

Advertiser 1 states Hotel A offers the room for €80 and Advertiser 2 states Hotel A offers the same room for €75
the room with price €75 should return only and ignore the other room prices

## Requirements

PHP 7.2+
Composer

## Installation

Run in main project folder

```
composer install
```

## Run Api Script

in browser you can access the project by this link 

```
http://localhost/golodger/
```

in terminal you can access the project and then write the command

```
php index.php
```

## Run Test Cases

```
vendor/bin/phpunit tests
```

all: mahjong mahjong_arrow_keys

mahjong:
	cd overlays/mahjong/ && php ../../templates/mahjong/create.php

mahjong_arrow_keys:
	cd overlays/mahjong_arrow_keys/ && php ../../templates/mahjong/create.php arrow_keys

install:
	composer install

install_develop:
	COMPOSER=composer.develop.json composer install

update:
	composer update

update_develop:
	COMPOSER=composer.develop.json composer update

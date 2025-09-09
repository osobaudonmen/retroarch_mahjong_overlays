all: mahjong

mahjong:
	cd overlays/mahjong/ && php ../../templates/mahjong/create.php

install:
	composer install

install_develop:
	COMPOSER=composer.develop.json composer install

update:
	composer update

update_develop:
	COMPOSER=composer.develop.json composer update

update_readme:
	php tools/mame_mahjong_list.php mame.dat README.md
	php tools/fbneo_mahjong_list.php fbneo.dat README.md

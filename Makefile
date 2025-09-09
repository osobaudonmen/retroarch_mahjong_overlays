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

readme: readme_fbneo readme_mame

readme_fbneo:
	php tools/fbneo_mahjong_list.php fbneo README.md

readme_mame:
	php tools/mame_mahjong_list.php mame.dat README.md

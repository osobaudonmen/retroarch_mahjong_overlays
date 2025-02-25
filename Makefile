all: mahjong mahjong_arrow_keys mahjong_debug mahjong_arrow_keys_debug

mahjong:
	cd overlays/mahjong/ && php ../../templates/mahjong/create.php

mahjong_arrow_keys:
	cd overlays/mahjong_arrow_keys/ && php ../../templates/mahjong/create.php arrow_keys

mahjong_debug:
	cd overlays/mahjong_debug/ && php ../../templates/mahjong/create.php default debug

mahjong_arrow_keys_debug:
	cd overlays/mahjong_arrow_keys_debug/ && php ../../templates/mahjong/create.php arrow_keys debug

all: mahjong

mahjong:
	sed -e 's/%KEY_CHI%/retrok_space/' \
		-e 's/%KEY_PON%/retrok_alt/' \
		-e 's/%KEY_KAN%/retrok_ctrl/' \
		-e 's/%KEY_REACH%/retrok_shift/' \
		templates/mahjong/mahjong.tmpl > overlays/mahjong/mahjong.cfg
	sed -e 's/%KEY_CHI%/retrok_left/' \
		-e 's/%KEY_PON%/retrok_down/' \
		-e 's/%KEY_KAN%/retrok_right/' \
		-e 's/%KEY_REACH%/retrok_up/' \
		templates/mahjong/mahjong.tmpl > overlays/mahjong/mahjong_arrows.cfg
	sed -e 's/%KEY_CHI%/retrok_space/' \
		-e 's/%KEY_PON%/retrok_alt/' \
		-e 's/%KEY_KAN%/retrok_ctrl/' \
		-e 's/%KEY_REACH%/retrok_shift/' \
		templates/mahjong/mahjong_side.tmpl > overlays/mahjong/mahjong_side.cfg
	sed -e 's/%KEY_CHI%/retrok_left/' \
		-e 's/%KEY_PON%/retrok_down/' \
		-e 's/%KEY_KAN%/retrok_right/' \
		-e 's/%KEY_REACH%/retrok_up/' \
		templates/mahjong/mahjong_side.tmpl > overlays/mahjong/mahjong_side_arrows.cfg

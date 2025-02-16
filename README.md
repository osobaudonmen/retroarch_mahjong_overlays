# retroarch_custom_overlays

## ファイルの説明

- overlays/mahjong/ : MAME/FBNeoの麻雀用オーバーレイ
  - mahjong.cfg : 牌の操作を下に並べたバージョン
  - mahjong_side.cfg : 牌の操作を左右に並べたバージョン
  - marjong_arrows.cfg : チーポンカンリーチを十字ーに割り当てた改造FBNeo用の、牌の操作を下に並べたバージョン
  - marjong_side_arrows.cfg : チーポンカンリーチを十字ーに割り当てた改造FBNeo用の、牌の操作を左右に並べたバージョン
- tamplates/ : overlays/のcfgのテンプレート。makeでcfgを生成する。
- tools/ : オーバーレイで使用する素材を作るためのスクリプトなど

## メモ

- FBNeoはオーバーレイのキーボード入力が期待通りに動かないのでコアを改造する必要あるかもしれません。 
- [改造FBNeo](https://github.com/osobaudonmen/FBNeo)
  - [チーポンカンリーチを十字キーに割り当てる](https://github.com/libretro/FBNeo/commit/5aa25b959dd24b6599b8a41f3b38fa6136f7dac0)
  - [オーバーレイのキーボード入力対応](https://github.com/libretro/FBNeo/commit/cd59d8c56b3434bba46c51b84f01bc7e9579145a)

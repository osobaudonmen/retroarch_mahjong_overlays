# retroarch_custom_overlays

## 麻雀用オーバーレイ

- AからNまでボタンを表示するオーバーレイ
- 牌にボタンを被せたオーバーレイ
- 何も表示しないオーバーレイ

中ボタンでオーバーレイ切り替え。何も表示しないオーバーレイはどこかタッチしたら切り替え。

- overlays/mahjong/ : MAME/FBNeoの麻雀用オーバーレイ
- overlays/mahjong_arrow_keys/ : チーポンカンリーチを十字ーに割り当てた改造FBNeo用オーバーレイ

各ディレクトリにはゲームごとにボタンの位置を調整したcfgを作成している。  
mahjong_(ROMファイル名)_alt.cfg : 

## メモ

- FBNeoはオーバーレイのキーボード入力が期待通りに動かないのでコアを改造する必要あるかもしれません。 
- [改造FBNeo](https://github.com/osobaudonmen/FBNeo)
  - [チーポンカンリーチを十字キーに割り当てる](https://github.com/libretro/FBNeo/commit/5aa25b959dd24b6599b8a41f3b38fa6136f7dac0)
  - [オーバーレイのキーボード入力対応](https://github.com/libretro/FBNeo/commit/cd59d8c56b3434bba46c51b84f01bc7e9579145a)

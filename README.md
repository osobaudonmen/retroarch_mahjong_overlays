# retroarch_custom_overlays

## 麻雀用オーバーレイ

- AからNまでボタンを表示するオーバーレイ
- 牌にボタンを被せたオーバーレイ
- 何も表示しないオーバーレイ

中ボタンでオーバーレイ切り替え。何も表示しないオーバーレイはどこかタッチしたら切り替え。

- overlays/mahjong/ : MAME/FBNeoの麻雀用オーバーレイ
- overlays/mahjong_arrow_keys/ : チーポンカンリーチを十字ーに割り当てた改造FBNeo用オーバーレイ

各ディレクトリにはゲームごとにボタンの位置を調整したcfgを作成している。  
mahjong_(ROMファイル名).cfg

「クイックメニュー > OSDオーバーレイ > オーバーレイの自動スケーリング」を無効にしておかないと、スマホなど広い画面だと牌とボタンがずれてします。

### FBNeoの麻雀ゲーム

FBNeoのDATファイルとソースコードから麻雀ぽいゲームの一覧（クローンは除く）を作成した。  

|ROMファイル名|説明|オーバーレイファイル|
|---|---|---|
| akiss| Mahjong Angel Kiss (ver 1.0)|mahjong_akiss.cfg|
| bnstars1| Vs. Janshi Brandnew Stars|mahjong_bnstars1.cfg|
| cdsteljn| DS Telejan (DECO Cassette) (Japan)|mahjong_cdsteljn.cfg|
| cultures| Jibun wo Migaku Culture School Mahjong Hen|mahjong_cultures.cfg|
| ejanhs| E Jong High School (Japan)|mahjong_ejanhs.cfg|
| hgkairak| Taisen Hot Gimmick Kairakuten (Japan)|mahjong_hotgmck.cfg|
| hotgm4ev| Taisen Hot Gimmick 4 Ever (Japan)|mahjong_hotgmck.cfg|
| hotgmck| Taisen Hot Gimmick (Japan)|mahjong_hotgmck.cfg|
| hotgmck3| Taisen Hot Gimmick 3 Digital Surfing (Japan)|mahjong_hotgmck.cfg|
| hotgmcki| Mahjong Hot Gimmick Integral (Japan)|mahjong_hotgmck.cfg|
| hypreac2| Mahjong Hyper Reaction 2 (Japan)|Jostickモードがあるので不要|
| hypreact| Mahjong Hyper Reaction (Japan)|Jostickモードがあるので不要|
| janjans1| Lovely Pop Mahjong JangJang Shimasho (Japan)|mahjong_janjans1.cfg|
| janjans2| Lovely Pop Mahjong JangJang Shimasho 2 (Japan)|mahjong_janjans2.cfg|
| jongpute| Jongputer|mahjong_jongpute.cfg|
| kirarast| Ryuusei Janshi Kirara Star|mahjong_kirarast.cfg|
| koikois2| Koi Koi Shimasho 2 - Super Real Hanafuda (Japan)|Jostickモードがあるので不要|
| marukin| Super Marukin-Ban (Japan 911128)|mahjong_mgakuen.cfg|
| mgakuen| Mahjong Gakuen|mahjong_mgakuen.cfg|
| mgakuen2| Mahjong Gakuen 2 Gakuen-chou no Fukushuu|mahjong_mgakuen.cfg|
| mirage| Mirage Youjuu Mahjongden (Japan)|mahjong_mirage.cfg|
| mj4simai| Wakakusamonogatari Mahjong Yonshimai (Japan)|mahjong_mj4simai.cfg|
| mjkjidai| Mahjong Kyou Jidai (Japan)|mahjong_mjkjidai.cfg|
| mjnquest| Mahjong Quest (Japan)|mahjong_mjnquest.cfg|
| srmp4| Super Real Mahjong PIV (Japan)|mahjong_srmp4.cfg|
| srmp7| Super Real Mahjong P7 (Japan)|mahjong_srmp7.cfg|
| suchie2| Idol Janshi Suchie-Pai II (ver 1.1)|mahjong_suchie2.cfg|

## メモ

- bnstars1は動かないがクローンのbnstarsは動く
- jongputeは動かないがクローンのttmahjngは動く
- FBNeoはオーバーレイのキーボード入力が期待通りに動かないのでコアを改造する必要あるかもしれません。 
- [改造FBNeo](https://github.com/osobaudonmen/FBNeo)
  - [チーポンカンリーチを十字キーに割り当てる](https://github.com/libretro/FBNeo/commit/5aa25b959dd24b6599b8a41f3b38fa6136f7dac0)
  - [オーバーレイのキーボード入力対応](https://github.com/libretro/FBNeo/commit/cd59d8c56b3434bba46c51b84f01bc7e9579145a)
  - [mgakuenでコインが入らない問題対応](https://github.com/libretro/FBNeo/commit/2f02c62a0e4aaea30c8946ffdf2fb0f4d4ac99a6)
  - [mgakuen2のオーバーレイでNが効かない問題対応](https://github.com/libretro/FBNeo/commit/92ab04c7a619f16ebe329c03bc3627818663497e)

# retroarch_custom_overlays

## 麻雀用オーバーレイ

RetroArchのMAME/FBNeoでスマホなど物理キーボードがない環境で、麻雀ゲームをプレイすることが厳しい。  
そこで、麻雀用のOSDオーバーレイを作成して問題を解決する。  

* 「クイックメニュー > OSDオーバーレイ > オーバーレイの自動スケーリング」を無効にしておかないと、スマホなど広い画面だと牌とボタンがずれる。
* FBNeoでオーバーレイの動作確認をしている際に、操作上の問題でゲームができないケースがでたのでFBNeoを改造している部分（[メモ](#メモ)を参照）がある。
* hotgmckなどのマルチスクリーンは考慮していない。Dip Switchesで1画面モードにしてください。

### オーバーレイの種類

|ディレクトリ|説明|
|---|---|
| overlays/mahjong/ | MAME/FBNeoの麻雀用オーバーレイ |
| overlays/mahjong_debug/ | ボタンの位置を確認するためのオーバーレイ |
| overlays/mahjong_arrow_keys/ | チーポンカンリーチを十字ーに割り当てた改造FBNeo用オーバーレイ |

各ディレクトリにはゲームごとにボタンの位置を調整したcfgを含む。  

`mahjong_(ROMファイル名).cfg`

### レイヤー

麻雀用オーバーレイは次の3枚のレイヤーで構成する。

- AからNまでボタンを表示するレイヤー  
牌が表示されない画面でA～Nボタンを押したり、鳴いて牌とボタンがずれたりした時に使用する。
- 牌にボタンを被せたレイヤー  
牌を直接タップして切ったり、Nの位置をタップして牌を引くことができる。
- 何も表示しないレイヤー  
ボタンが重なって情報が読み取りにくい場合などに使用する。

画面の真ん中あたり（画像の広い赤い部分）をタップすると3枚のレイヤーが順繰りに切り替わる。  
<img src="images/debug.png" width="400">

#### ボタン

<img src="overlays/mahjong/ra.png" width="25"> メニュー切り替え  
<img src="overlays/mahjong/ff.png" width="25"> 早送りの切り替え  
<img src="overlays/mahjong/co.png" width="25"> コイン投入  
<img src="overlays/mahjong/pl.png" width="25"> スタートボタン  

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
| hypreac2| Mahjong Hyper Reaction 2 (Japan)|Joystickモードがあるので不要|
| hypreact| Mahjong Hyper Reaction (Japan)|Joystickモードがあるので不要|
| janjans1| Lovely Pop Mahjong JangJang Shimasho (Japan)|mahjong_janjans1.cfg|
| janjans2| Lovely Pop Mahjong JangJang Shimasho 2 (Japan)|mahjong_janjans2.cfg|
| jongpute| Jongputer|mahjong_jongpute.cfg|
| kirarast| Ryuusei Janshi Kirara Star|mahjong_kirarast.cfg|
| koikois2| Koi Koi Shimasho 2 - Super Real Hanafuda (Japan)|Joystickモードがあるので不要|
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

- FBNeoでbnstars1は動かないがクローンのbnstarsは動く
- FBNeoでjongputeは動かないがクローンのttmahjngは動く
- FBNeoはオーバーレイのキーボード入力が期待通りに動かないのでコアを改造する必要あるかもしれません。 
- [改造FBNeo](https://github.com/osobaudonmen/FBNeo)
  - [チーポンカンリーチを十字キーに割り当てる](https://github.com/libretro/FBNeo/commit/5aa25b959dd24b6599b8a41f3b38fa6136f7dac0)
  - [オーバーレイのキーボード入力対応](https://github.com/libretro/FBNeo/commit/cd59d8c56b3434bba46c51b84f01bc7e9579145a)
  - [mgakuenでコインが入らない問題対応](https://github.com/libretro/FBNeo/commit/2f02c62a0e4aaea30c8946ffdf2fb0f4d4ac99a6)
  - [mgakuen2のオーバーレイでNが効かない問題対応](https://github.com/libretro/FBNeo/commit/92ab04c7a619f16ebe329c03bc3627818663497e)
- 牌を選択しても反応しないと思ったらmahjong_debugを使って牌とボタンの位置が一致しているか確認するとよい。だいたい「オーバーレイの自動スケーリング」でずれている。
- とりあえず牌とボタンの調整だけをしたが、ポンとかのボタンをゲームごとに邪魔にならない位置に避けたい

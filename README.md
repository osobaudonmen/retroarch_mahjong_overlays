# RetroArch用麻雀オーバーレイ

[日本語](./README.md) | [English](./README.en.md)

## 概要

RetroArchのMAME/FBNeoで麻雀ゲームをプレイする際、スマートフォンなど物理キーボードのない環境では操作が困難です。
この問題を解決するため、麻雀専用のOSDオーバーレイを作成しました。

## 使い方

1. ダウンロード
  - [リポジトリのトップページ](https://github.com/osobaudonmen/retroarch_mahjong_overlays)にアクセスします。
  - 緑色の「Code」ボタンをクリックします。
  - ドロップダウンメニューから「Download ZIP」を選択します。
2. 解凍・設置
  - ダウンロードしたZIPを解凍します。
  - 解凍したディレクトリの中から`overlays/mahjong/`ディレクトリを、RetroArchの`overlays/`ディレクトリの下にコピーします。
3. 適用
  - ゲームのクイックメニューを開きます。
  - 「OSDオーバーレイ」の「オーバーレイプリセット」を選択します。
 - ファイルブラウザでコピーした`overlays/mahjong/`配下から、対応するオーバーレイファイルを選択します。

## 注意事項

- スマートフォンなどの広い画面で牌とボタンがずれる問題を防ぐため、「クイックメニュー > OSDオーバーレイ > オーバーレイの自動スケーリング」は無効にしてください。
- マルチスクリーン対応ゲーム（hotgmckなど）は、Dip Switchesで1画面モードに設定する必要があります（[メモ](#メモ)を参照）。
- FBNeoの一部のバージョンでは、オーバーレイのキーボード入力が期待通りに動作しない不具合があり、コアの改造が必要となる場合があります。
- BETボタンは、MAMEでは「3」、FBNeoでは「2」に割り当てられていますが、MAMEの方がBETボタンを必要とするゲームが多いため、「3」に統一しています。

## オーバーレイの説明

このリポジトリでは、MAME/FBNeo向けの麻雀ゲーム専用オーバーレイを `overlays/mahjong/` ディレクトリに格納しています。  
ディレクトリ内には、ゲームごとにボタン配置を最適化したcfgファイルと、オーバーレイで使用する画像が含まれています。  
cfgファイルの命名形式は `mahjong_(ROMファイル名).cfg` です。

### レイヤー構成

麻雀用オーバーレイは、以下の5種類のレイヤーで構成されています：

1. 通常ボタンレイヤー（横長画面用）  
   スマートフォンを横向きで使用する際、画面左右の余白にボタンを配置します。

2. 通常ボタンレイヤー（縦長画面用）  
   スマートフォンを縦向きで使用する際、画面下部の余白にボタンを配置します。

3. 牌ボタンレイヤー（ラベルあり）  
   牌を直接タップして切ったり、Nの位置をタップして牌を引くことができます。
   タップ可能な箇所にA～Nのラベルを半透明で表示します。

4. 牌ボタンレイヤー（ラベルなし）  
   ラベルありと同様の機能を持ちますが、視認性を重視してラベルを表示しません。
   牌に重ねたボタンは透明です。

5. 空レイヤー  
   ボタンの重なりで情報が見づらい場合などに使用する、何も表示しないレイヤーです。

「クイックメニュー > OSDオーバーレイ > オーバーレイの自動回転」を有効にすると、画面の縦横比に応じて通常ボタンレイヤーが自動的に切り替わります。

### システムボタン

|ボタン|説明|
|---|---|
|<img src="overlays/mahjong/settings.png" width="25">| メニューを切り替えます |
|<img src="overlays/mahjong/pause.png" width="25">| 一時停止・再開 |
|<img src="overlays/mahjong/forward.png" width="25">| 早送りを切り替えます |
|<img src="overlays/mahjong/landscape.png" width="25">| 横長画面用の通常ボタンレイヤーが使用されているときに表示され、押すと縦長画面用に切り替わります。<br>オーバーレイの自動回転が有効な場合は自動制御されるため、押しても切り替わりません。 |
|<img src="overlays/mahjong/portrait.png" width="25">| 縦長画面用の通常ボタンレイヤーが使用されているときに表示され、押すと横長画面用に切り替わります。<br>オーバーレイの自動回転が有効な場合は自動制御されるため、押しても切り替わりません。 |
|<img src="overlays/mahjong/layers.png" width="25">| レイヤーを切り替えます |
|<img src="overlays/mahjong/coin.png" width="25">| コインを投入します |
|<img src="overlays/mahjong/play.png" width="25">| ゲームをスタートします |

### ゲームボタン

|ボタン|説明|
|---|---|
|<img src="overlays/mahjong/chi.png" width="50">| チー |
|<img src="overlays/mahjong/pon.png" width="50">| ポン |
|<img src="overlays/mahjong/kan.png" width="50">| カン |
|<img src="overlays/mahjong/reach.png" width="50">| リーチ |
|<img src="overlays/mahjong/z.png" width="50">| アガリ（ロン/ツモ 等） |
|<img src="overlays/mahjong/bet.png" width="50">| BET ボタン |
|<img src="overlays/mahjong/ff.png" width="50">| Flip Flop ボタン |

## 麻雀ゲームリスト

FBNeoとMAMEのDATファイルから麻雀系のゲームの一覧を作成しています。  
操作レイアウトの類似性を考慮して、製造元と発売年でソートしています。

### FBNeo

FBNeoのDATファイルとソースコードから麻雀系のゲームの一覧を作成しています（クローンは除外）。

[FBNeoの麻雀ゲームリスト](mj_fbneo.md)

### MAME

MAMEのDATファイル（v0.280）から以下の条件で麻雀系のゲームを抽出しています：

- デバイスではないこと
- 正常に動作すること
- クローンではないこと
- Player 1のコントローラーが麻雀タイプで、19個以上30個未満のボタンを持つこと

[MAMEの麻雀ゲームリスト](mj_mame.md)

## メモ

### 動作に関する注意点

- FBNeoでは`bnstars1`は動作しませんが、クローンの`bnstars`は動作します
- FBNeoでは`jongpute`は動作しませんが、クローンの`ttmahjng`は動作します

### MAMEのhotgmckを1画面表示にする方法

スマートフォンでも（物理キーボードがなくても）以下の手順で1画面表示に設定できます：

1. OSDオーバーレイでキーボード（標準の`overlays/keyboards/US-101`など）を選択します。
2. Tabキーを押してMAMEのオプションメニューを表示します（以降は十字キーとエンターで操作します）。
3. 「Video Options」を選択します。
4. 「Screen #0」を選択します。
5. 「Screen 0 Standard (4:3)」または「Screen 0 Pixel Aspect (10:7)」を選択します。
6. MAMEのオプションメニューが閉じるまでEscキーを押します。

### MAMEのNeoGeo麻雀ゲームをジョイスティック操作にする方法

次の手順でジョイスティック操作に変更できます。  

1. ゲーム中にTabキーでMAMEのメニューを開きます。
2. 「DIP Switches」を選択します。
3. 「Controller」を「Joystick」に設定します。
4. 「Reset System」でゲームを再起動します。

ただし、ゲームパッドのボタン割り当てが正しく設定されていない場合があり、その場合はキーボードでの操作が必要になることがあります。

キーボードでの対応は以下の通りです。
- `Coin1`: `5`キー
- `Start1`: `1`キー
- 方向キー＋アクション: `ABCDEF`キー（または`HIJKLM`キー）が「上・下・左・右・A・B」に対応します。

### FBNeoのNeoGeo麻雀ゲームをジョイスティック操作にする方法

次の手順でジョイスティック操作に変更できます。

1. RetroArchのメニューを開きます。
2. 「コアオプション」を開きます。
3. 「DIP Switches」を開きます。
4. 「Mahjong control panel」をオフにします。
5. ゲームを再起動します。

MAMEと異なり、この設定だけでゲームパッドでの操作が可能になります。

### MAME/FBNeoのキーバインド

|ボタン|MAME|FBNeo|
|---|---|---|
|A-N        |A-N        |A-N|
|カン       |Left Ctrl  |Left Ctrl|
|ポン       |Left Alt   |Left Alt|
|チー       |Space      |Space|
|リーチ     |Left Shift |Left Shift|
|ロン       |Z          |Z|
|Flip Flop  |Y          |Y|
|Last Chance|Right Alt  |Right Alt|
|Bet        |3          |2|
|Take Score |Right Ctrl |Right Ctrl|
|Double Up  |Right Shift|Right Shift|
|Big        |Enter      |Enter|
|Small      |Backspace  |Backspace|

- https://docs.mamedev.org/usingmame/defaultkeys.html#default-mahjong-and-hanafuda-keys
- https://github.com/libretro/FBNeo/blob/master/src/burner/libretro/retro_input.cpp

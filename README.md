# retroarch_custom_overlays

## 目次

- [麻雀用オーバーレイ](#麻雀用オーバーレイ)
  - [注意事項](#注意事項)
  - [オーバーレイの説明](#オーバーレイの説明)
    - [レイヤー構成](#レイヤー構成)
    - [ボタン](#ボタン)
  - [麻雀ゲームリスト](#麻雀ゲームリスト)
      - [FBNeo](#fbneo)
      - [MAME](#mame)
- [メモ](#メモ)
  - [動作に関する注意点](#動作に関する注意点)
  - [トラブルシューティング](#トラブルシューティング)
  - [MAMEのhotgmckを1画面表示にする方法](#mameのhotgmckを1画面表示にする方法)

## 麻雀用オーバーレイ

RetroArchのMAME/FBNeoで麻雀ゲームをプレイする際、スマートフォンなど物理キーボードのない環境では操作が困難です。
この問題を解決するため、麻雀専用のOSDオーバーレイを作成しました。

### 注意事項

* スマートフォンなどの広い画面で牌とボタンがずれる問題を防ぐため、「クイックメニュー > OSDオーバーレイ > オーバーレイの自動スケーリング」は無効にしてください。
* hotgmckなどのマルチスクリーン対応ゲームは、Dip Switchesで1画面モードに設定する必要があります（[メモ](#メモ)を参照）。
* FBNeoはオーバーレイのキーボード入力が期待通りに動作しない不具合があるバージョンもあり、コアの改造が必要となる場合があります
* BETボタンがMAMEだと3でFBNeoだと2に割り当てられているが、BETボタンを必要とするゲームはMAMEの方が多いはずなので3にする

### オーバーレイの説明

MAME/FBNeo用の麻雀ゲーム別オーバーレイを配置しています。

```
overlays/mahjong/
```

ディレクトリには、ゲームごとにボタン配置を最適化したcfgファイルとオーバーレイで使用する画像が含まれています。  
cfgファイル名の形式：`mahjong_(ROMファイル名).cfg`

`overlays/mahjong/`ディレクトリを、RetroArchの`overlays`ディレクトリにコピーしてください。

#### レイヤー構成

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

#### ボタン

|ボタン|説明|
|---|---|
|<img src="overlays/mahjong/settings.png" width="25">| メニュー切り替え  |
|<img src="overlays/mahjong/forward.png" width="25">| 早送りの切り替え|  
|<img src="overlays/mahjong/landscape.png" width="25">| 横長画面用の通常ボタンレイヤーが使用されている時に表示されて、押したら縦長画面用に切り替わる。<br>オーバーレイの自動回転が有効な場合は自動制御されて押しても切り替わらない。|  
|<img src="overlays/mahjong/portrait.png" width="25">| 縦長画面用の通常ボタンレイヤーが使用されている時に表示されて、押したら横長画面用に切り替わる。<br>オーバーレイの自動回転が有効な場合は自動制御されて押しても切り替わらない。|  
|<img src="overlays/mahjong/layers.png" width="25">| レイヤー切り替え |
|<img src="overlays/mahjong/coin.png" width="25">| コイン投入  |
|<img src="overlays/mahjong/play.png" width="25">| スタートボタン|  

### 麻雀ゲームリスト

FBNeoとMAMEのDATファイルから麻雀ぽいゲームの一覧を作成した。  
画面のレイアウトが似ているのが並びそうなので、製造元と年で並べた。

### FBNeo

FBNeoのDATファイルとソースコードから麻雀ぽいゲームの一覧（クローンは除く）を作成した。  

<!-- fbneo_games -->

|ROMファイル名|説明|製造元|年|オーバーレイファイル|備考|
|---|---|---|---|---|---|
|janshin|Janshin Densetsu - Quest of Jongmaster|Aicom|1994||NeoGeoはDIPスイッチでJoyStickが使える|
|ttmahjng|T.T Mahjong|Alpha Denshi Co. (Taito license)|1981|mahjong_jongpute.cfg|jongputeが動作しない代わり。|
|cdsteljn|DS Telejan (DECO Cassette) (Japan)|Data East Corporation|1981|mahjong_cdsteljn.cfg||
|mgakuen2|Mahjong Gakuen 2 Gakuen-chou no Fukushuu|Face|1989|mahjong_mgakuen.cfg||
|cultures|Jibun wo Migaku Culture School Mahjong Hen|Face|1994|mahjong_cultures.cfg||
|suchie2|Idol Janshi Suchie-Pai II (ver 1.1)|Jaleco|1994|mahjong_suchie2.cfg||
|akiss|Mahjong Angel Kiss (ver 1.0)|Jaleco|1995|mahjong_akiss.cfg||
|kirarast|Ryuusei Janshi Kirara Star|Jaleco|1996|mahjong_kirarast.cfg||
|bnstars|Vs. Janshi Brandnew Stars (Ver 1.1, MegaSystem 32 Version)|Jaleco|1997|mahjong_bnstars1.cfg|bnstars1が動作しない代わり。|
|mj4simai|Wakakusamonogatari Mahjong Yonshimai (Japan)|Maboroshi Ware|1996|mahjong_mj4simai.cfg||
|mirage|Mirage Youjuu Mahjongden (Japan)|Mitchell|1994|mahjong_mirage.cfg||
|minasan|Minasan no Okagesamadesu! Dai Sugoroku Taikai (MOM-001 ~ MOH-001)|Monolith Corp.|1990||NeoGeoはDIPスイッチでJoyStickが使える|
|bakatono|Bakatonosama Mahjong Manyuuki (MOM-002 ~ MOH-002)|Monolith Corp.|1991||NeoGeoはDIPスイッチでJoyStickが使える|
|hotgmck|Taisen Hot Gimmick (Japan)|Psikyo|1997|mahjong_hotgmck.cfg||
|hgkairak|Taisen Hot Gimmick Kairakuten (Japan)|Psikyo|1998|mahjong_hotgmck.cfg||
|hotgmck3|Taisen Hot Gimmick 3 Digital Surfing (Japan)|Psikyo|1999|mahjong_hotgmck.cfg||
|hotgm4ev|Taisen Hot Gimmick 4 Ever (Japan)|Psikyo|2000|mahjong_hotgmck.cfg||
|hotgmcki|Mahjong Hot Gimmick Integral (Japan)|Psikyo|2001|mahjong_hotgmck.cfg||
|mahretsu|Mahjong Kyo Retsuden (NGM-004 ~ NGH-004)|SNK|1990||NeoGeoはDIPスイッチでJoyStickが使える|
|hypreact|Mahjong Hyper Reaction (Japan)|Sammy|1995||Joystickモードがあるので不要|
|hypreac2|Mahjong Hyper Reaction 2 (Japan)|Sammy|1997||Joystickモードがあるので不要|
|mjkjidai|Mahjong Kyou Jidai (Japan)|Sanritsu|1986|mahjong_mjkjidai.cfg||
|ejanhs|E Jong High School (Japan)|Seibu Kaihatsu|1996|mahjong_ejanhs.cfg||
|ejsakura|E-Jan Sakurasou (Japan, SYS386F V2.0)|Seibu Kaihatsu|1999|mahjong_ejsakura.cfg||
|srmp4|Super Real Mahjong PIV (Japan)|Seta|1993|mahjong_srmp4.cfg||
|srmp7|Super Real Mahjong P7 (Japan)|Seta|1997|mahjong_srmp7.cfg||
|mjnquest|Mahjong Quest (Japan)|Taito Corporation|1990|mahjong_mjnquest.cfg||
|janjans1|Lovely Pop Mahjong JangJang Shimasho (Japan)|Visco|1996|mahjong_janjans1.cfg||
|koikois2|Koi Koi Shimasho 2 - Super Real Hanafuda (Japan)|Visco|1997||Joystickモードがあるので不要|
|janjans2|Lovely Pop Mahjong JangJang Shimasho 2 (Japan)|Visco|2000|mahjong_janjans2.cfg||
|sjryuko|Sukeban Jansi Ryuko (set 2, System 16B, FD1089B 317-5021)|White Board|1988|mahjong_sjryuko.cfg||
|mgakuen|Mahjong Gakuen|Yuga|1988|mahjong_mgakuen.cfg||
|marukin|Super Marukin-Ban (Japan 911128)|Yuga|1990|mahjong_mgakuen.cfg||

<!-- /fbneo_games -->

#### MAME

MAMEのDATファイルから麻雀ぽいゲームの一覧を作成した。  

- MAME v0.280
- デバイスではない
- 動作する
- クローンではない
- player1のcontrollerがmahjongでボタンが19個以上で30個ではない

<!-- mame_games -->

|ROMファイル名|説明|製造元|年|オーバーレイファイル|備考|
|---|---|---|---|---|---|
|janshin|Janshin Densetsu - Quest of Jongmaster|Aicom|1994|||
|rmhaihai|Real Mahjong Haihai (Japan, newer)|Alba|1985|||
|rmhaijin|Real Mahjong Haihai Jinji Idou Hen (Japan)|Alba|1986|||
|danchih|Danchi de Hanafuda (J 990607 V1.400)|Altron (Tecmo license)|1999|||
|otonano|Otona no Mahjong (Japan 880628)|Apple|1988|||
|ultramhm|Ultra Maru-hi Mahjong (Japan)|Apple|1993|||
|hipai|Hi Pai Paradise|Aruze / Seta|2003|||
|hipai2|Hi Pai Paradise 2|Aruze / Seta / Paon|2004|||
|kiwame|Pro Mahjong Kiwame|Athena|1994|mahjong_kiwame.cfg||
|kiwames|Pro Mahjong Kiwame S (J 951020 V1.208)|Athena|1995|||
|fengyunh|Fengyun Hui|BMC|1998|||
|mjmaglmp|Mahou no Lamp (v. JAA02)|BMC|2000|||
|daisyari|Daisyarin (Japan)|Best System|1989|||
|mjnanpas|Mahjong Nanpa Story (Japan 890713)|Brooks|1989|||
|apparel|Apparel Night (Japan 860929)|Central Denshi|1986|mahjong_apparel.cfg||
|livegal|Live Gal (Japan 870530)|Central Denshi|1987|||
|mjgaiden|Mahjong Gaiden (Japan 870803)|Central Denshi|1987|||
|orangec|Orange Club - Maruhi Kagai Jugyou (Japan 880213)|Daiichi Denshi|1988|||
|cdsteljn|DS Telejan (DECO Cassette) (Japan)|Data East Corporation|1981|mahjong_cdsteljn.cfg||
|swinggal|Swing Gal (Japan 871221)|Digital Denshi|1987|||
|bananadr|Mahjong Banana Dream (Japan 891124)|Digital Soft|1989|mahjong_bananadr.cfg|[BET]|
|idhimitu|Idol no Himitsu (Japan 890304)|Digital Soft|1989|mahjong_idhimitu.cfg|[BET]|
|vsmjtria|VS Mahjong Triangle|Dyna|1986|||
|jangtaku|Jang Taku (V 1.3)|Dyna Computer|1986|||
|dondenmj|Don Den Mahjong (Japan)|Dyna Electronics|1986|||
|jongshin|Jong Shin (Japan)|Dyna Electronics|1986|||
|suzume|Watashiha Suzumechan (Japan)|Dyna Electronics|1986|||
|makaijan|Makaijan (Japan)|Dynax|1987|mahjong_makaijan.cfg|[BET]|
|mjdiplob|Mahjong Diplomat (Japan)|Dynax|1987|mahjong_makaijan.cfg|[BET]|
|tontonb|Tonton (Japan)|Dynax|1987|||
|janyuki|Jong Yu Ki (Japan)|Dynax|1988|||
|majs101b|Mahjong Studio 101 (Japan)|Dynax|1988|||
|mjapinky|Almond Pinky (Japan)|Dynax|1988|||
|gekisha|Mahjong Gekisha (Japan)|Dynax|1989|||
|mjderngr|Mahjong Derringer (Japan)|Dynax|1989|||
|mjfriday|Mahjong Friday (Japan)|Dynax|1989|||
|7jigen|7jigen no Youseitachi - Mahjong 7 Dimensions (Japan)|Dynax|1990|mahjong_7jigen.cfg||
|jantouki|Jong Tou Ki (Japan)|Dynax|1990|||
|mcnpshnt|Mahjong Campus Hunting (Japan)|Dynax|1990|||
|mjifb|Mahjong If...?|Dynax|1990|||
|mjangels|Mahjong Angels - Comic Theater Vol.2 (Japan)|Dynax|1991|||
|mjcomv1|Mahjong Comic Gekijou Vol.1 (Japan)|Dynax|1991|||
|mjdialq2|Mahjong Dial Q2 (Japan set 1)|Dynax|1991|||
|mjvegasa|Mahjong Vegas (Japan, unprotected)|Dynax|1991|||
|tenkai|Mahjong Tenkaigen (Japan)|Dynax|1991|||
|warahana|Warai no Hana Tenshi (Japan)|Dynax|1991|||
|yarunara|Mahjong Yarunara (Japan)|Dynax|1991|||
|cafetime|Mahjong Cafe Time|Dynax|1992|mahjong_cafetime.cfg|[BET]|
|mjelctrn|Mahjong Electron Base (parts 2 & 4, Japan)|Dynax|1993|||
|mjmyorn2|Mahjong The Mysterious Orient Part 2 ~ Exotic Dream ~ (Japan, v1.00)|Dynax|1993|||
|mjmyster|Mahjong The Mysterious World (Japan, set 1)|Dynax|1994|||
|mjmyuniv|Mahjong The Mysterious Universe (Japan, D85)|Dynax|1994|||
|mjreach|Mahjong Reach (Ver. 1.00, set 1)|Dynax|1994|||
|mjdchuka|Maque Da Zhonghua Quan (Taiwan, D111)|Dynax|1995|||
|mjschuka|Mahjong Super Dai Chuuka Ken (Japan, D115)|Dynax|1995|||
|janptr96|Janputer '96 (Japan)|Dynax|1996|||
|majrjhdx|Mahjong Raijinhai DX (Ver. D105)|Dynax|1996|||
|mjxysl|Majiang Xingyun Shenlong (China, D121)|Dynax|1996||1996|
|janptrsp|Janputer Special (Japan)|Dynax|1997|||
|mjmyorntr|Mahjong The Mysterious Orient Returns (Japan, v1.00)|Dynax|1997|||
|mjchuuka|Maque Zhonghua Ernu (Taiwan)|Dynax|1998|||
|jongtei|Mahjong Jong-Tei (Japan, NM532-01)|Dynax|1999|||
|seljan2|Return Of Sel Jan II (Japan, NM557)|Dynax / Face|1996|||
|sryudens|Mahjong Seiryu Densetsu (Japan, NM502)|Dynax / Face|1996|||
|dtoyoken|Mahjong Dai Touyouken (Japan)|Dynax / Sigma|1996|||
|janshinp|Mahjong Janshin Plus (Japan)|Dynax / Sigma|1996|||
|daimyojn|Mahjong Daimyojin (Japan, T017-PB-00)|Dynax / Techno-Top / Techno-Planning|2002|||
|neruton|Mahjong Neruton Haikujiradan (Japan, Rev. B?)|Dynax / Yukiyoshi Tokoro|1990|||
|mgakuen2|Mahjong Gakuen 2 Gakuen-chou no Fukushuu|Face|1989|mahjong_mgakuen.cfg||
|cultures|Jibun wo Migaku Culture School Mahjong Hen|Face|1994|mahjong_cultures.cfg||
|gal10ren|Mahjong Gal 10-renpatsu (Japan)|Fujic|1993|||
|renaiclb|Mahjong Ren-ai Club (Japan)|Fujic|1993|||
|mjegolf|Mahjong Erotica Golf (Japan)|Fujic / AV Japan|1994|||
|xyddzhh|Xingyun Dou Dizhu|Herb Home|2006||2006|
|hourouki|Mahjong Hourouki Part 1 - Seishun Hen (Japan)|Home Data|1987|||
|mhgaiden|Mahjong Hourouki Gaiden (Japan)|Home Data|1987|||
|mjclinic|Mahjong Clinic (Japan, set 1)|Home Data|1988|||
|mjhokite|Mahjong Hourouki Okite (Japan)|Home Data|1988|||
|mjjoship|Mahjong Joshi Pro-wres -Give up 5 byou mae- (Japan)|Home Data|1988|||
|mrokumei|Mahjong Rokumeikan (Japan)|Home Data|1988|||
|mjkojink|Mahjong Kojinkyouju (Private Teacher) (Japan)|Home Data|1989|||
|mjyougo|Mahjong-yougo no Kisotairyoku (Japan)|Home Data|1989|||
|vitaminc|Mahjong Vitamin C (Japan)|Home Data|1989|||
|lemnangl|Mahjong Lemon Angel (Japan)|Home Data|1990|||
|mjkinjas|Mahjong Kinjirareta Asobi (Japan)|Home Data|1991|||
|lhb|Long Hu Bang (China, V035C)|IGS|1995|||
|lhb2|Lung Fu Bong II (Hong Kong, V185H)|IGS|1996|||
|xymg|Xingyun Manguan (China, V651C, set 1)|IGS|1996|||
|lhdmg|Long Hu Da Manguan (V102C3M)|IGS|1999|||
|lhdmgp|Long Hu Da Manguan Duizhan Jiaqiang Ban (V400C3M)|IGS|1999|||
|lhzb3|Long Hu Zhengba III (V400CN)|IGS|1999|||
|lhzb3sjb|Long Hu Zhengba III Shengji Ban (V300C5)|IGS|1999|||
|lthyp|Long Teng Hu Yao Duizhan Jiaqiang Ban (S104CN)|IGS|1999|||
|qlgs|Que Long Gaoshou (S501CN)|IGS|1999|||
|tarzanc|Tarzan Chuang Tian Guan (China, V109C, set 1)|IGS|1999|||
|tshs|Tiansheng Haoshou (V201CN)|IGS|2000||2000|
|zhongguo|Zhongguo Chu Da D (V102C)|IGS|2000|||
|mgzz|Manguan Zhizun (V101CN)|IGS|2003|||
|mxsqy|Mingxing San Que Yi (China, V201CN)|IGS|2003|||
|tct2p|Tarzan Chuang Tian Guan 2 Jiaqiang Ban (V306CN)|IGS|2003||2003|
|cjddz|Chaoji Dou Dizhu (V219CN)|IGS|2004|||
|cjddzp|Chaoji Dou Dizhu Jiaqiang Ban (S300CN)|IGS|2004|||
|lhzb4|Long Hu Zhengba 4 (V104CN)|IGS|2004|||
|lhzb4dhb|Long Hu Zhengba 4 Dui Hua Ban (V203CN)|IGS|2004|||
|cjddzlf|Chaoji Dou Dizhu Liang Fu Pai (V109CN)|IGS|2005|||
|cjtljp|Chaoji Tuolaji Jiaqiang Ban (V206CN)|IGS|2005|||
|xypdk|Xingyun Pao De Kuai (V106CN)|IGS|2005||2005|
|tswxp|Taishan Wuxian Jiaqiang Ban (V101CN)|IGS|2006||2006|
|mgcs3|Manguan Caishen 3 (V101CN)|IGS|2007|||
|kakumei|Mahjong Kakumei (Japan)|Jaleco|1990|||
|suchiesp|Idol Janshi Suchie-Pai Special (Japan)|Jaleco|1993|||
|suchie2|Idol Janshi Suchie-Pai II (ver 1.1)|Jaleco|1994|mahjong_suchie2.cfg||
|akiss|Mahjong Angel Kiss (ver 1.0)|Jaleco|1995|mahjong_akiss.cfg||
|kirarast|Ryuusei Janshi Kirara Star|Jaleco|1996|mahjong_kirarast.cfg||
|bnstars1|Vs. Janshi Brandnew Stars|Jaleco|1997|mahjong_bnstars1.cfg||
|seljan|Sel-Jan (Japan)|Jem / Dyna Corp|1983|||
|mj4simai|Wakakusamonogatari Mahjong Yonshimai (Japan)|Maboroshi Ware|1996|mahjong_mj4simai.cfg||
|dokyusei|Mahjong Doukyuusei|Make Software / Elf / Media Trading|1995|mahjong_dokyusei.cfg||
|dokyusp|Mahjong Doukyuusei Special|Make Software / Elf / Media Trading|1995|||
|gakusai|Mahjong Gakuensai (Japan, set 1)|MakeSoft|1997|||
|gakusai2|Mahjong Gakuensai 2 (Japan)|MakeSoft|1998|||
|mjprivat|Mahjong Private (Japan)|Matoba|1991|||
|tmmjprd|Tokimeki Mahjong Paradise - Dear My Love|Media / Sonnet|1997|||
|vmahjong|Virtual Mahjong (J 961214 V1.000)|Micronet|1997|||
|myfairld|Virtual Mahjong 2 - My Fair Lady (J 980608 V1.000)|Micronet|1998|||
|kaguya|Mahjong Kaguyahime (Japan 880521)|Miki Syouji|1988|||
|taiwanmb|Taiwan Mahjong (Japan 881208)|Miki Syouji|1988|||
|kaguya2|Mahjong Kaguyahime Sono2 (Japan 890829)|Miki Syouji|1989|||
|mjcamera|Mahjong Camera Kozou (Japan 881109, newer hardware)|Miki Syouji|1989|||
|mjikaga|Mahjong Ikaga Desu ka (Japan)|Mitchell|1991?|||
|mirage|Mirage Youjuu Mahjongden (Japan)|Mitchell|1994|mahjong_mirage.cfg||
|minasan|Minasan no Okagesamadesu! Dai Sugoroku Taikai (MOM-001 ~ MOH-001)|Monolith Corp.|1990|||
|bakatono|Bakatonosama Mahjong Manyuuki (MOM-002 ~ MOH-002)|Monolith Corp.|1991||NeoGeoはDIPスイッチでJoyStickが使える|
|mjflove|Mahjong Fantasic Love (Japan)|Nakanihon|1996|||
|royalmj|Royal Mahjong (Japan, v1.13)|Nichibutsu|1981|||
|jangou|Jangou (Japan)|Nichibutsu|1983|||
|jngolady|Jangou Lady (Japan)|Nichibutsu|1984|||
|ngtbunny|Night Bunny (Japan 840601 MRN 2-10)|Nichibutsu|1984|||
|nightgal|Night Gal (Japan 840920 AG 1-00)|Nichibutsu|1984|||
|pastelg|Pastel Gal (Japan 851224)|Nichibutsu|1985|||
|citylove|City Love (Japan 860908)|Nichibutsu|1986|||
|crystal2|Crystal Gal 2 (Japan 860620)|Nichibutsu|1986|||
|crystalg|Crystal Gal (Japan 860512)|Nichibutsu|1986|||
|secolove|Second Love (Japan 861201)|Nichibutsu|1986|||
|bijokkoy|Bijokko Yume Monogatari (Japan 870925)|Nichibutsu|1987|mahjong_bijokkog.cfg||
|housemn2|House Mannequin Roppongi Live hen (Japan 870418)|Nichibutsu|1987|||
|housemnq|House Mannequin (Japan 870217)|Nichibutsu|1987|||
|iemoto|Iemoto (Japan 871020)|Nichibutsu|1987|||
|ojousan|Ojousan (Japan 871204)|Nichibutsu|1987|||
|seiha|Seiha (Japan 870725)|Nichibutsu|1987|||
|bijokkog|Bijokko Gakuen (Japan 880116)|Nichibutsu|1988|mahjong_bijokkog.cfg||
|hanamomo|Mahjong Hana no Momoko gumi (Japan 881201)|Nichibutsu|1988|||
|korinai|Mahjong-zukino Korinai Menmen (Japan 880425)|Nichibutsu|1988|||
|mjsikaku|Mahjong Shikaku (Japan 880908)|Nichibutsu|1988|||
|msjiken|Mahjong Satsujin Jiken (Japan 881017)|Nichibutsu|1988|||
|telmahjn|Telephone Mahjong (Japan 890111)|Nichibutsu|1988|||
|mcontest|Miss Mahjong Contest (Japan)|Nichibutsu|1989|||
|mgmen89|Mahjong G-MEN'89 (Japan 890425)|Nichibutsu|1989|||
|mjfocus|Mahjong Focus (Japan 890313)|Nichibutsu|1989|||
|scandal|Scandal Mahjong (Japan 890213)|Nichibutsu|1989|||
|tokyogal|Tokyo Gal Zukan (Japan)|Nichibutsu|1989|||
|triplew1|Mahjong Triple Wars (Japan)|Nichibutsu|1989|||
|uchuuai|Mahjong Uchuu yori Ai wo komete (Japan)|Nichibutsu|1989|||
|chinmoku|Mahjong Chinmoku no Hentai (Japan 900511)|Nichibutsu|1990|mahjong_chinmoku.cfg||
|club90s|Mahjong CLUB 90's (set 1) (Japan 900919)|Nichibutsu|1990|||
|mladyhtr|Mahjong The Lady Hunter (Japan 900509)|Nichibutsu|1990|||
|ntopstar|Mahjong Nerae! Top Star (Japan)|Nichibutsu|1990|||
|pstadium|Mahjong Panic Stadium (Japan)|Nichibutsu|1990|||
|triplew2|Mahjong Triple Wars 2 (Japan)|Nichibutsu|1990|||
|mjgottsu|Mahjong Gottsu ee-kanji (Japan)|Nichibutsu|1991|||
|mjgottub|Medal Mahjong Gottsu ee-kanji (Japan)|Nichibutsu|1991|||
|mjlstory|Mahjong Jikken Love Story (Japan)|Nichibutsu|1991|||
|ngpgal|Nekketsu Grand-Prix Gal (Japan)|Nichibutsu|1991|||
|qmhayaku|Quiz-Mahjong Hayaku Yatteyo! (Japan)|Nichibutsu|1991|||
|vanilla|Mahjong Vanilla Syndrome (Japan)|Nichibutsu|1991|mahjong_vanilla.cfg||
|koinomp|Mahjong Koi no Magic Potion (Japan)|Nichibutsu|1992|||
|mjkoiura|Mahjong Koi Uranai (Japan set 1)|Nichibutsu|1992|||
|patimono|Mahjong Pachinko Monogatari (Japan)|Nichibutsu|1992|||
|mkeibaou|Mahjong Keibaou (Japan)|Nichibutsu|1993|||
|sailorws|Mahjong Sailor Wars (Japan set 1)|Nichibutsu|1993|||
|wcatcher|Mahjong Wakuwaku Catcher (Japan)|Nichibutsu|1993|||
|mhhonban|Mahjong Housoukyoku Honbanchuu (Japan)|Nichibutsu|1994|||
|mjlaman|Mahjong La Man (Japan)|Nichibutsu / AV Japan|1993|||
|pachiten|Medal Mahjong Pachi-Slot Tengoku (Japan)|Nichibutsu / AV Japan / Miki Syouji|1993||BETボタンがいる|
|cmehyou|Mahjong Circuit no Mehyou (Japan)|Nichibutsu / Kawakusu|1992|||
|mmehyou|Medal Mahjong Circuit no Mehyou (Japan)|Nichibutsu / Kawakusu|1992|||
|galkaika|Mahjong Gal no Kaika (Japan)|Nichibutsu / T.R.Tec|1989|||
|galkoku|Mahjong Gal no Kokuhaku (Japan, set 1)|Nichibutsu / T.R.Tec|1989|||
|yosimoto|Mahjong Yoshimoto Gekijou (Japan)|Nichibutsu / Yoshimoto Kougyou|1994|||
|mjuraden|Mahjong Uranai Densetsu (Japan)|Nichibutsu / Yubis|1992|||
|musobana|Musoubana (Japan)|Nichibutsu / Yubis|1995|||
|janbari|Mahjong Janjan Baribari (Japan)|Nichibutsu / Yubis / AV Japan|1992|||
|mjreach1|Mahjong Reach Ippatsu (Japan, NM526-NSI)|Nihon System|1998|||
|mmahjong|Micom Mahjong|Nippon Mail Service|1982|||
|mjsenpu|Mahjong Senpu (Japan)|Oriental Soft|2002|||
|kanatuen|Kanatsuen no Onna (Japan 880905)|Panac|1988|||
|hotgmck|Taisen Hot Gimmick (Japan)|Psikyo|1997|mahjong_hotgmck.cfg||
|hgkairak|Taisen Hot Gimmick Kairakuten (Japan)|Psikyo|1998|mahjong_hotgmck.cfg||
|hotgmck3|Taisen Hot Gimmick 3 Digital Surfing (Japan)|Psikyo|1999|mahjong_hotgmck.cfg||
|hotgm4ev|Taisen Hot Gimmick 4 Ever (Japan)|Psikyo|2000|mahjong_hotgmck.cfg||
|hotgmcki|Mahjong Hot Gimmick Integral (Japan)|Psikyo|2001|mahjong_hotgmck.cfg||
|mjgtaste|Mahjong G-Taste|Psikyo|2002|||
|ippatsu|Ippatsu Gyakuten (Japan)|Public Software / Paradais|1986|||
|royalqn|Royal Queen (Japan 841010 RQ 0-07)|Royal Denshi|1984|||
|hypreact|Mahjong Hyper Reaction (Japan)|Sammy|1995||Joystickモードがあるので不要|
|hypreac2|Mahjong Hyper Reaction 2 (Japan)|Sammy|1997||Joystickモードがあるので不要|
|jantotsu|4nin-uchi Mahjong Jantotsu|Sanritsu|1983|||
|mjkjidai|Mahjong Kyou Jidai (Japan)|Sanritsu|1986|mahjong_mjkjidai.cfg||
|chinsan|Ganbare Chinsan Ooshoubu (MC-8123A, 317-5012)|Sanritsu|1987|mahjong_chinsan.cfg||
|mahmajn|Tokoro San no MahMahjan (Japan, ROM Based)|Sega|1992|||
|mahmajn2|Tokoro San no MahMahjan 2 (Japan, ROM Based)|Sega|1994|||
|ejanhs|E Jong High School (Japan)|Seibu Kaihatsu|1996|mahjong_ejanhs.cfg||
|ejsakura|E-Jan Sakurasou (Japan, SYS386F V2.0)|Seibu Kaihatsu|1999|mahjong_ejsakura.cfg||
|goodejan|Good E Jong -Kachinuki Mahjong Syoukin Oh!!- (set 1)|Seibu Kaihatsu (Tecmo license)|1991|||
|totmejan|Tottemo E Jong|Seibu Kaihatsu (Tecmo license)|1991|||
|srmp1|Super Real Mahjong Part 1 (Japan)|Seta|1987|||
|srmp2|Super Real Mahjong Part 2 (Japan)|Seta|1987|||
|srmp3|Super Real Mahjong Part 3 (Japan)|Seta|1988|||
|srmp4|Super Real Mahjong PIV (Japan)|Seta|1993|mahjong_srmp4.cfg||
|srmp5|Super Real Mahjong P5|Seta|1994|||
|srmp6|Super Real Mahjong P6 (Japan)|Seta|1995|||
|srmp7|Super Real Mahjong P7 (Japan)|Seta|1997|mahjong_srmp7.cfg||
|srmvs|Super Real Mahjong VS (Rev A)|Seta|1999|||
|sengokmj|Sengoku Mahjong (Japan)|Sigma|1991|||
|psailor1|Bishoujo Janshi Pretty Sailor 18-kin (Japan)|Sphinx|1994|mahjong_psailor1.cfg||
|psailor2|Bishoujo Janshi Pretty Sailor 2 (Japan)|Sphinx|1994|mahjong_psailor1.cfg||
|otatidai|Disco Mahjong Otachidai no Okite (Japan)|Sphinx|1995|||
|4psimasy|Mahjong 4P Shimasho (Japan)|Sphinx / AV Japan|1994|mahjong_4psimasy.cfg||
|imekura|Imekura Mahjong (Japan)|Sphinx / AV Japan|1994|||
|mscoutm|Mahjong Scout Man (Japan)|Sphinx / AV Japan|1994|||
|dunhuang|Mahjong Dunhuang|Spirit|1995|||
|idolmj|Idol-Mahjong Housoukyoku (Japan)|System Service|1988|||
|mjnquest|Mahjong Quest (Japan)|Taito Corporation|1990|mahjong_mjnquest.cfg||
|mjgnight|Mahjong Gorgeous Night (Japan, TSM003-01)|Techno-Top|2000|||
|mjsister|Mahjong Sisters (Japan)|Toaplan|1986|||
|ojankoc|Ojanko Club (Japan, Program Ver. 1.3, set 1)|V-System Co.|1986|||
|ojankoy|Ojanko Yakata (Japan)|V-System Co.|1986|||
|ccasino|Chinese Casino (Japan)|V-System Co.|1987|mahjong_ccasino.cfg||
|ojanko2|Ojanko Yakata 2bankan (Japan)|V-System Co.|1987|||
|ojankohs|Ojanko High School (Japan)|V-System Co.|1988|||
|mayumi|Kiki-Ippatsu Mayumi-chan|Victory L.L.C.|1988|||
|nekkyoku|Rettou Juudan Nekkyoku Janshi - Higashi Nippon Hen (Japan)|Video System Co.|1988|||
|mfunclub|Mahjong Fun Club - Idol Saizensen (Japan)|Video System Co.|1989|||
|mjnatsu|Mahjong Natsu Monogatari (Japan)|Video System Co.|1989|||
|daiyogen|Mahjong Daiyogen (Japan)|Video System Co.|1990|||
|fromance|Idol-Mahjong Final Romance (Japan)|Video System Co.|1991|||
|nmsengen|Nekketsu Mahjong Sengen! AFTER 5 (Japan)|Video System Co.|1991|||
|fromanc2|Taisen Idol-Mahjong Final Romance 2 (Japan, newer)|Video System Co.|1995|||
|fromancr|Taisen Mahjong Final Romance R (Japan)|Video System Co.|1995|||
|fromanc4|Taisen Mahjong Final Romance 4 (Japan)|Video System Co.|1998|||
|rmhaisei|Real Mahjong Haihai Seichouhen (Japan)|Visco|1986|||
|themj|The Mah-jong (Japan, set 1)|Visco|1987|||
|mjyuugi|Mahjong Yuugi (Japan set 1)|Visco|1990|||
|ponchin|Mahjong Pon Chin Kan (Japan set 1)|Visco|1991|||
|janjans1|Lovely Pop Mahjong JangJang Shimasho (Japan)|Visco|1996|mahjong_janjans1.cfg||
|koikois2|Koi Koi Shimasho 2 - Super Real Hanafuda (Japan)|Visco|1997||Joystickモードがあるので不要|
|janjans2|Lovely Pop Mahjong JangJang Shimasho 2 (Japan)|Visco|2000|mahjong_janjans2.cfg||
|mahjngoh|Mahjong Oh (V2.06J 1999/11/23 08:52:22)|Warashi / Mahjong Kobo / Taito|1999|||
|usagi|Usagi (V2.02J 2001/10/02 12:41:19)|Warashi / Mahjong Kobo / Taito|2001|||
|dakkochn|DakkoChan House (MC-8123B, 317-5014)|White Board|1987|||
|sjryuko|Sukeban Jansi Ryuko (set 2, System 16B, FD1089B 317-5021)|White Board|1988|mahjong_sjryuko.cfg||
|jogakuen|Mahjong Jogakuen (Japan)|Windom|1992?|||
|jituroku|Jitsuroku Maru-chi Mahjong (Japan)|Windom|1993|||
|mjclub|Mahjong Club (Japan)|Xex|1986?|||
|yujan|Yu-Jan|Yubis / T.System|1999|mahjong_yujan.cfg||
|mgakuen|Mahjong Gakuen|Yuga|1988|mahjong_mgakuen.cfg||
|marukin|Super Marukin-Ban (Japan 911128)|Yuga|1990|mahjong_mgakuen.cfg||
|touryuu|Touryuumon (V1.1)?|Yuki Enterprise|2005|||
|janputer|New Double Bet Mahjong (bootleg of Royal Mahjong, set 1)|bootleg (Paradise Denshi Ltd. / Mes)|1981|||
|akamj|Aka Mahjong (Double Bet, ver 1 16)|bootleg (Paradise Electronics)|1990|mahjong_akamj.cfg||

<!-- /mame_games -->

## メモ

### 動作に関する注意点

- FBNeoでは`bnstars1`は動作しませんが、クローンの`bnstars`は動作します
- FBNeoでは`jongpute`は動作しませんが、クローンの`ttmahjng`は動作します

### MAMEのhotgmckを1画面表示にする方法

スマートフォンでも（物理キーボードがなくても）以下の手順で1画面表示に設定できます：

1. OSDオーバーレイでキーボード（標準の`overlays/keyboards/US-101`など）を選択
2. Tabキーを押してMAMEのオプションメニューを表示（以降は十字キーとエンターで操作）
3. Video Optionsを選択
4. Screen #0を選択
5. Screen 0 Standard (4:3)またはScreen 0 Pixel Aspect (10:7)を選択
6. MAMEのオプションメニューが閉じるまでEscキーを押す

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

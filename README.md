# retroarch_custom_overlays

## 目次

- [麻雀用オーバーレイ](#麻雀用オーバーレイ)
  - [注意事項](#注意事項)
  - [オーバーレイの説明](#オーバーレイの説明)
    - [レイヤー構成](#レイヤー構成)
    - [ボタン](#ボタン)
  - [FBNeoの麻雀ゲーム](#fbneoの麻雀ゲーム)
  - [MAMEの麻雀ゲーム](#mameの麻雀ゲーム)
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

### オーバーレイの説明

MAME, FBNeo用の麻雀ゲーム別オーバーレイを配置しています。

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

### FBNeoの麻雀ゲーム

FBNeoのDATファイルとソースコードから麻雀ぽいゲームの一覧（クローンは除く）を作成した。  

<!-- fbneo_games -->

|ROMファイル名|説明|オーバーレイファイル|備考|
|---|---|---|---|
|akiss|Mahjong Angel Kiss (ver 1.0)|mahjong_akiss.cfg|
|bakatono|Bakatonosama Mahjong Manyuuki (MOM-002 ~ MOH-002)||NeoGeoはDIPスイッチでJoyStickが使える|
|bnstars|Vs. Janshi Brandnew Stars (Ver 1.1, MegaSystem 32 Version)|mahjong_bnstars1.cfg|bnstars1が動作しない代わり。|
|cdsteljn|DS Telejan (DECO Cassette) (Japan)|mahjong_cdsteljn.cfg|
|cultures|Jibun wo Migaku Culture School Mahjong Hen|mahjong_cultures.cfg|
|ejanhs|E Jong High School (Japan)|mahjong_ejanhs.cfg|
|ejsakura|E-Jan Sakurasou (Japan, SYS386F V2.0)|mahjong_ejsakura.cfg|
|hgkairak|Taisen Hot Gimmick Kairakuten (Japan)|mahjong_hotgmck.cfg|
|hotgm4ev|Taisen Hot Gimmick 4 Ever (Japan)|mahjong_hotgmck.cfg|
|hotgmck|Taisen Hot Gimmick (Japan)|mahjong_hotgmck.cfg|
|hotgmck3|Taisen Hot Gimmick 3 Digital Surfing (Japan)|mahjong_hotgmck.cfg|
|hotgmcki|Mahjong Hot Gimmick Integral (Japan)|mahjong_hotgmck.cfg|
|hypreac2|Mahjong Hyper Reaction 2 (Japan)||Joystickモードがあるので不要|
|hypreact|Mahjong Hyper Reaction (Japan)||Joystickモードがあるので不要|
|janjans1|Lovely Pop Mahjong JangJang Shimasho (Japan)|mahjong_janjans1.cfg|
|janjans2|Lovely Pop Mahjong JangJang Shimasho 2 (Japan)|mahjong_janjans2.cfg|
|janshin|Janshin Densetsu - Quest of Jongmaster||NeoGeoはDIPスイッチでJoyStickが使える|
|kirarast|Ryuusei Janshi Kirara Star|mahjong_kirarast.cfg|
|koikois2|Koi Koi Shimasho 2 - Super Real Hanafuda (Japan)||Joystickモードがあるので不要|
|mahretsu|Mahjong Kyo Retsuden (NGM-004 ~ NGH-004)||NeoGeoはDIPスイッチでJoyStickが使える|
|marukin|Super Marukin-Ban (Japan 911128)|mahjong_mgakuen.cfg|
|mgakuen|Mahjong Gakuen|mahjong_mgakuen.cfg|
|mgakuen2|Mahjong Gakuen 2 Gakuen-chou no Fukushuu|mahjong_mgakuen.cfg|
|minasan|Minasan no Okagesamadesu! Dai Sugoroku Taikai (MOM-001 ~ MOH-001)||NeoGeoはDIPスイッチでJoyStickが使える|
|mirage|Mirage Youjuu Mahjongden (Japan)|mahjong_mirage.cfg|
|mj4simai|Wakakusamonogatari Mahjong Yonshimai (Japan)|mahjong_mj4simai.cfg|
|mjkjidai|Mahjong Kyou Jidai (Japan)|mahjong_mjkjidai.cfg|
|mjnquest|Mahjong Quest (Japan)|mahjong_mjnquest.cfg|
|sjryuko|Sukeban Jansi Ryuko (set 2, System 16B, FD1089B 317-5021)|mahjong_sjryuko.cfg||
|srmp4|Super Real Mahjong PIV (Japan)|mahjong_srmp4.cfg|
|srmp7|Super Real Mahjong P7 (Japan)|mahjong_srmp7.cfg|
|suchie2|Idol Janshi Suchie-Pai II (ver 1.1)|mahjong_suchie2.cfg|
|ttmahjng|T.T Mahjong|mahjong_jongpute.cfg|jongputeが動作しない代わり。|

<!-- /fbneo_games -->

### MAMEの麻雀ゲーム

MAMEのDATファイルから麻雀ぽいゲームの一覧を作成した。  

- MAME v0.280
- デバイスではない
- 動作する
- クローンではない
- player1のcontrollerがmahjongでボタンが19個以上で30個ではない

<!-- mame_games -->

|ROMファイル名|説明|オーバーレイファイル|備考|
|---|---|---|---|
|4psimasy|Mahjong 4P Shimasho (Japan)|mahjong_4psimasy.cfg|
|7jigen|7jigen no Youseitachi - Mahjong 7 Dimensions (Japan)|mahjong_7jigen.cfg||
|akamj|Aka Mahjong (Double Bet, ver 1 16)|mahjong_akamj.cfg|
|akiss|Mahjong Angel Kiss (ver 1.0)|mahjong_akiss.cfg||
|apparel|Apparel Night (Japan 860929)|mahjong_apparel.cfg|
|bakatono|Bakatonosama Mahjong Manyuuki (MOM-002 ~ MOH-002)||NeoGeoはDIPスイッチでJoyStickが使える|
|bananadr|Mahjong Banana Dream (Japan 891124)||Betボタンが要りそう|
|bijokkog|Bijokko Gakuen (Japan 880116)|mahjong_bijokkog.cfg||
|bijokkoy|Bijokko Yume Monogatari (Japan 870925)|mahjong_bijokkog.cfg|
|bnstars1|Vs. Janshi Brandnew Stars|mahjong_bnstars1.cfg||
|cafetime|Mahjong Cafe Time||Aが効かない？Rateボタンが要りそう|
|ccasino|Chinese Casino (Japan)|mahjong_ccasino.cfg|
|cdsteljn|DS Telejan (DECO Cassette) (Japan)|mahjong_cdsteljn.cfg||
|chinmoku|Mahjong Chinmoku no Hentai (Japan 900511)|mahjong_chinmoku.cfg|
|chinsan|Ganbare Chinsan Ooshoubu (MC-8123A, 317-5012)|mahjong_chinsan.cfg|
|citylove|City Love (Japan 860908)||
|cjddz|Chaoji Dou Dizhu (V219CN)||
|cjddzlf|Chaoji Dou Dizhu Liang Fu Pai (V109CN)||
|cjddzp|Chaoji Dou Dizhu Jiaqiang Ban (S300CN)||
|cjtljp|Chaoji Tuolaji Jiaqiang Ban (V206CN)||
|club90s|Mahjong CLUB 90's (set 1) (Japan 900919)||
|cmehyou|Mahjong Circuit no Mehyou (Japan)||
|crystal2|Crystal Gal 2 (Japan 860620)||
|crystalg|Crystal Gal (Japan 860512)||
|cultures|Jibun wo Migaku Culture School Mahjong Hen|mahjong_cultures.cfg||
|daimyojn|Mahjong Daimyojin (Japan, T017-PB-00)||
|daisyari|Daisyarin (Japan)||
|daiyogen|Mahjong Daiyogen (Japan)||
|dakkochn|DakkoChan House (MC-8123B, 317-5014)||
|danchih|Danchi de Hanafuda (J 990607 V1.400)||
|dokyusei|Mahjong Doukyuusei|mahjong_dokyusei.cfg|
|dokyusp|Mahjong Doukyuusei Special||
|dondenmj|Don Den Mahjong (Japan)||
|dtoyoken|Mahjong Dai Touyouken (Japan)||
|dunhuang|Mahjong Dunhuang||
|ejanhs|E Jong High School (Japan)|mahjong_ejanhs.cfg||
|ejsakura|E-Jan Sakurasou (Japan, SYS386F V2.0)|mahjong_ejsakura.cfg||
|fengyunh|Fengyun Hui||
|fromanc2|Taisen Idol-Mahjong Final Romance 2 (Japan, newer)||
|fromanc4|Taisen Mahjong Final Romance 4 (Japan)||
|fromance|Idol-Mahjong Final Romance (Japan)||
|fromancr|Taisen Mahjong Final Romance R (Japan)||
|gakusai|Mahjong Gakuensai (Japan, set 1)||
|gakusai2|Mahjong Gakuensai 2 (Japan)||
|gal10ren|Mahjong Gal 10-renpatsu (Japan)||
|galkaika|Mahjong Gal no Kaika (Japan)||
|galkoku|Mahjong Gal no Kokuhaku (Japan, set 1)||
|gekisha|Mahjong Gekisha (Japan)||
|goodejan|Good E Jong -Kachinuki Mahjong Syoukin Oh!!- (set 1)||
|hanamomo|Mahjong Hana no Momoko gumi (Japan 881201)||
|hgkairak|Taisen Hot Gimmick Kairakuten (Japan)|mahjong_hotgmck.cfg||
|hipai|Hi Pai Paradise||
|hipai2|Hi Pai Paradise 2||
|hotgm4ev|Taisen Hot Gimmick 4 Ever (Japan)|mahjong_hotgmck.cfg||
|hotgmck|Taisen Hot Gimmick (Japan)|mahjong_hotgmck.cfg||
|hotgmck3|Taisen Hot Gimmick 3 Digital Surfing (Japan)|mahjong_hotgmck.cfg||
|hotgmcki|Mahjong Hot Gimmick Integral (Japan)|mahjong_hotgmck.cfg||
|hourouki|Mahjong Hourouki Part 1 - Seishun Hen (Japan)||
|housemn2|House Mannequin Roppongi Live hen (Japan 870418)||
|housemnq|House Mannequin (Japan 870217)||
|hypreac2|Mahjong Hyper Reaction 2 (Japan)||Joystickモードがあるので不要|
|hypreact|Mahjong Hyper Reaction (Japan)||Joystickモードがあるので不要|
|idhimitu|Idol no Himitsu (Japan 890304)||
|idolmj|Idol-Mahjong Housoukyoku (Japan)||
|iemoto|Iemoto (Japan 871020)||
|imekura|Imekura Mahjong (Japan)||
|ippatsu|Ippatsu Gyakuten (Japan)||
|janbari|Mahjong Janjan Baribari (Japan)||
|jangou|Jangou (Japan)||
|jangtaku|Jang Taku (V 1.3)||
|janjans1|Lovely Pop Mahjong JangJang Shimasho (Japan)|mahjong_janjans1.cfg||
|janjans2|Lovely Pop Mahjong JangJang Shimasho 2 (Japan)|mahjong_janjans2.cfg||
|janptr96|Janputer '96 (Japan)||
|janptrsp|Janputer Special (Japan)||
|janputer|New Double Bet Mahjong (bootleg of Royal Mahjong, set 1)||
|janshin|Janshin Densetsu - Quest of Jongmaster||
|janshinp|Mahjong Janshin Plus (Japan)||
|jantotsu|4nin-uchi Mahjong Jantotsu||
|jantouki|Jong Tou Ki (Japan)||
|janyuki|Jong Yu Ki (Japan)||
|jituroku|Jitsuroku Maru-chi Mahjong (Japan)||
|jngolady|Jangou Lady (Japan)||
|jogakuen|Mahjong Jogakuen (Japan)||
|jongshin|Jong Shin (Japan)||
|jongtei|Mahjong Jong-Tei (Japan, NM532-01)||
|kaguya|Mahjong Kaguyahime (Japan 880521)||
|kaguya2|Mahjong Kaguyahime Sono2 (Japan 890829)||
|kakumei|Mahjong Kakumei (Japan)||
|kanatuen|Kanatsuen no Onna (Japan 880905)||
|kirarast|Ryuusei Janshi Kirara Star|mahjong_kirarast.cfg||
|kiwame|Pro Mahjong Kiwame|mahjong_kiwame.cfg||
|kiwames|Pro Mahjong Kiwame S (J 951020 V1.208)||
|koikois2|Koi Koi Shimasho 2 - Super Real Hanafuda (Japan)||Joystickモードがあるので不要|
|koinomp|Mahjong Koi no Magic Potion (Japan)||
|korinai|Mahjong-zukino Korinai Menmen (Japan 880425)||
|lemnangl|Mahjong Lemon Angel (Japan)||
|lhb|Long Hu Bang (China, V035C)||
|lhb2|Lung Fu Bong II (Hong Kong, V185H)||
|lhdmg|Long Hu Da Manguan (V102C3M)||
|lhdmgp|Long Hu Da Manguan Duizhan Jiaqiang Ban (V400C3M)||
|lhzb3|Long Hu Zhengba III (V400CN)||
|lhzb3sjb|Long Hu Zhengba III Shengji Ban (V300C5)||
|lhzb4|Long Hu Zhengba 4 (V104CN)||
|lhzb4dhb|Long Hu Zhengba 4 Dui Hua Ban (V203CN)||
|livegal|Live Gal (Japan 870530)||
|lthyp|Long Teng Hu Yao Duizhan Jiaqiang Ban (S104CN)||
|mahjngoh|Mahjong Oh (V2.06J 1999/11/23 08:52:22)||
|mahmajn|Tokoro San no MahMahjan (Japan, ROM Based)||
|mahmajn2|Tokoro San no MahMahjan 2 (Japan, ROM Based)||
|majrjhdx|Mahjong Raijinhai DX (Ver. D105)||
|majs101b|Mahjong Studio 101 (Japan)||
|makaijan|Makaijan (Japan)||
|marukin|Super Marukin-Ban (Japan 911128)|mahjong_mgakuen.cfg||
|mayumi|Kiki-Ippatsu Mayumi-chan||
|mcnpshnt|Mahjong Campus Hunting (Japan)||
|mcontest|Miss Mahjong Contest (Japan)||
|mfunclub|Mahjong Fun Club - Idol Saizensen (Japan)||
|mgakuen|Mahjong Gakuen|mahjong_mgakuen.cfg||
|mgakuen2|Mahjong Gakuen 2 Gakuen-chou no Fukushuu|mahjong_mgakuen.cfg||
|mgcs3|Manguan Caishen 3 (V101CN)||
|mgmen89|Mahjong G-MEN'89 (Japan 890425)||
|mgzz|Manguan Zhizun (V101CN)||
|mhgaiden|Mahjong Hourouki Gaiden (Japan)||
|mhhonban|Mahjong Housoukyoku Honbanchuu (Japan)||
|minasan|Minasan no Okagesamadesu! Dai Sugoroku Taikai (MOM-001 ~ MOH-001)||
|mirage|Mirage Youjuu Mahjongden (Japan)|mahjong_mirage.cfg||
|mj4simai|Wakakusamonogatari Mahjong Yonshimai (Japan)|mahjong_mj4simai.cfg||
|mjangels|Mahjong Angels - Comic Theater Vol.2 (Japan)||
|mjapinky|Almond Pinky (Japan)||
|mjcamera|Mahjong Camera Kozou (Japan 881109, newer hardware)||
|mjchuuka|Maque Zhonghua Ernu (Taiwan)||
|mjclinic|Mahjong Clinic (Japan, set 1)||
|mjclub|Mahjong Club (Japan)||
|mjcomv1|Mahjong Comic Gekijou Vol.1 (Japan)||
|mjdchuka|Maque Da Zhonghua Quan (Taiwan, D111)||
|mjderngr|Mahjong Derringer (Japan)||
|mjdialq2|Mahjong Dial Q2 (Japan set 1)||
|mjdiplob|Mahjong Diplomat (Japan)||
|mjegolf|Mahjong Erotica Golf (Japan)||
|mjelctrn|Mahjong Electron Base (parts 2 & 4, Japan)||
|mjflove|Mahjong Fantasic Love (Japan)||
|mjfocus|Mahjong Focus (Japan 890313)||
|mjfriday|Mahjong Friday (Japan)||
|mjgaiden|Mahjong Gaiden (Japan 870803)||
|mjgnight|Mahjong Gorgeous Night (Japan, TSM003-01)||
|mjgottsu|Mahjong Gottsu ee-kanji (Japan)||
|mjgottub|Medal Mahjong Gottsu ee-kanji (Japan)||
|mjgtaste|Mahjong G-Taste||
|mjhokite|Mahjong Hourouki Okite (Japan)||
|mjifb|Mahjong If...?||
|mjikaga|Mahjong Ikaga Desu ka (Japan)||
|mjjoship|Mahjong Joshi Pro-wres -Give up 5 byou mae- (Japan)||
|mjkinjas|Mahjong Kinjirareta Asobi (Japan)||
|mjkjidai|Mahjong Kyou Jidai (Japan)|mahjong_mjkjidai.cfg||
|mjkoiura|Mahjong Koi Uranai (Japan set 1)||
|mjkojink|Mahjong Kojinkyouju (Private Teacher) (Japan)||
|mjlaman|Mahjong La Man (Japan)||
|mjlstory|Mahjong Jikken Love Story (Japan)||
|mjmaglmp|Mahou no Lamp (v. JAA02)||
|mjmyorn2|Mahjong The Mysterious Orient Part 2 ~ Exotic Dream ~ (Japan, v1.00)||
|mjmyorntr|Mahjong The Mysterious Orient Returns (Japan, v1.00)||
|mjmyster|Mahjong The Mysterious World (Japan, set 1)||
|mjmyuniv|Mahjong The Mysterious Universe (Japan, D85)||
|mjnanpas|Mahjong Nanpa Story (Japan 890713)||
|mjnatsu|Mahjong Natsu Monogatari (Japan)||
|mjnquest|Mahjong Quest (Japan)|mahjong_mjnquest.cfg||
|mjprivat|Mahjong Private (Japan)||
|mjreach|Mahjong Reach (Ver. 1.00, set 1)||
|mjreach1|Mahjong Reach Ippatsu (Japan, NM526-NSI)||
|mjschuka|Mahjong Super Dai Chuuka Ken (Japan, D115)||
|mjsenpu|Mahjong Senpu (Japan)||
|mjsikaku|Mahjong Shikaku (Japan 880908)||
|mjsister|Mahjong Sisters (Japan)||
|mjuraden|Mahjong Uranai Densetsu (Japan)||
|mjvegasa|Mahjong Vegas (Japan, unprotected)||
|mjxysl|Majiang Xingyun Shenlong (China, D121)|
|mjyougo|Mahjong-yougo no Kisotairyoku (Japan)||
|mjyuugi|Mahjong Yuugi (Japan set 1)||
|mkeibaou|Mahjong Keibaou (Japan)||
|mladyhtr|Mahjong The Lady Hunter (Japan 900509)||
|mmahjong|Micom Mahjong||
|mmehyou|Medal Mahjong Circuit no Mehyou (Japan)||
|mrokumei|Mahjong Rokumeikan (Japan)||
|mscoutm|Mahjong Scout Man (Japan)||
|msjiken|Mahjong Satsujin Jiken (Japan 881017)||
|musobana|Musoubana (Japan)||
|mxsqy|Mingxing San Que Yi (China, V201CN)||
|myfairld|Virtual Mahjong 2 - My Fair Lady (J 980608 V1.000)||
|nekkyoku|Rettou Juudan Nekkyoku Janshi - Higashi Nippon Hen (Japan)||
|neruton|Mahjong Neruton Haikujiradan (Japan, Rev. B?)||
|ngpgal|Nekketsu Grand-Prix Gal (Japan)||
|ngtbunny|Night Bunny (Japan 840601 MRN 2-10)||
|nightgal|Night Gal (Japan 840920 AG 1-00)||
|nmsengen|Nekketsu Mahjong Sengen! AFTER 5 (Japan)||
|ntopstar|Mahjong Nerae! Top Star (Japan)||
|ojanko2|Ojanko Yakata 2bankan (Japan)||
|ojankoc|Ojanko Club (Japan, Program Ver. 1.3, set 1)||
|ojankohs|Ojanko High School (Japan)||
|ojankoy|Ojanko Yakata (Japan)||
|ojousan|Ojousan (Japan 871204)||
|orangec|Orange Club - Maruhi Kagai Jugyou (Japan 880213)||
|otatidai|Disco Mahjong Otachidai no Okite (Japan)||
|otonano|Otona no Mahjong (Japan 880628)||
|pachiten|Medal Mahjong Pachi-Slot Tengoku (Japan)||BETボタンがいる|
|pastelg|Pastel Gal (Japan 851224)||
|patimono|Mahjong Pachinko Monogatari (Japan)||
|ponchin|Mahjong Pon Chin Kan (Japan set 1)||
|psailor1|Bishoujo Janshi Pretty Sailor 18-kin (Japan)|mahjong_psailor1.cfg|
|psailor2|Bishoujo Janshi Pretty Sailor 2 (Japan)|mahjong_psailor1.cfg|
|pstadium|Mahjong Panic Stadium (Japan)||
|qlgs|Que Long Gaoshou (S501CN)||
|qmhayaku|Quiz-Mahjong Hayaku Yatteyo! (Japan)||
|renaiclb|Mahjong Ren-ai Club (Japan)||
|rmhaihai|Real Mahjong Haihai (Japan, newer)||
|rmhaijin|Real Mahjong Haihai Jinji Idou Hen (Japan)||
|rmhaisei|Real Mahjong Haihai Seichouhen (Japan)||
|royalmj|Royal Mahjong (Japan, v1.13)||
|royalqn|Royal Queen (Japan 841010 RQ 0-07)||
|sailorws|Mahjong Sailor Wars (Japan set 1)||
|scandal|Scandal Mahjong (Japan 890213)||
|secolove|Second Love (Japan 861201)||
|seiha|Seiha (Japan 870725)||
|seljan|Sel-Jan (Japan)||
|seljan2|Return Of Sel Jan II (Japan, NM557)||
|sengokmj|Sengoku Mahjong (Japan)||
|sjryuko|Sukeban Jansi Ryuko (set 2, System 16B, FD1089B 317-5021)|mahjong_sjryuko.cfg||
|srmp1|Super Real Mahjong Part 1 (Japan)||
|srmp2|Super Real Mahjong Part 2 (Japan)||
|srmp3|Super Real Mahjong Part 3 (Japan)||
|srmp4|Super Real Mahjong PIV (Japan)|mahjong_srmp4.cfg||
|srmp5|Super Real Mahjong P5||
|srmp6|Super Real Mahjong P6 (Japan)||
|srmp7|Super Real Mahjong P7 (Japan)|mahjong_srmp7.cfg||
|srmvs|Super Real Mahjong VS (Rev A)||
|sryudens|Mahjong Seiryu Densetsu (Japan, NM502)||
|suchie2|Idol Janshi Suchie-Pai II (ver 1.1)|mahjong_suchie2.cfg||
|suchiesp|Idol Janshi Suchie-Pai Special (Japan)||
|suzume|Watashiha Suzumechan (Japan)||
|swinggal|Swing Gal (Japan 871221)||
|taiwanmb|Taiwan Mahjong (Japan 881208)||
|tarzanc|Tarzan Chuang Tian Guan (China, V109C, set 1)||
|tct2p|Tarzan Chuang Tian Guan 2 Jiaqiang Ban (V306CN)|
|telmahjn|Telephone Mahjong (Japan 890111)||
|tenkai|Mahjong Tenkaigen (Japan)||
|themj|The Mah-jong (Japan, set 1)||
|tmmjprd|Tokimeki Mahjong Paradise - Dear My Love||
|tokyogal|Tokyo Gal Zukan (Japan)||
|tontonb|Tonton (Japan)||
|totmejan|Tottemo E Jong||
|touryuu|Touryuumon (V1.1)?||
|triplew1|Mahjong Triple Wars (Japan)||
|triplew2|Mahjong Triple Wars 2 (Japan)||
|tshs|Tiansheng Haoshou (V201CN)|
|tswxp|Taishan Wuxian Jiaqiang Ban (V101CN)|
|uchuuai|Mahjong Uchuu yori Ai wo komete (Japan)||
|ultramhm|Ultra Maru-hi Mahjong (Japan)||
|usagi|Usagi (V2.02J 2001/10/02 12:41:19)||
|vanilla|Mahjong Vanilla Syndrome (Japan)|mahjong_vanilla.cfg|
|vitaminc|Mahjong Vitamin C (Japan)||
|vmahjong|Virtual Mahjong (J 961214 V1.000)||
|vsmjtria|VS Mahjong Triangle||
|warahana|Warai no Hana Tenshi (Japan)||
|wcatcher|Mahjong Wakuwaku Catcher (Japan)||
|xyddzhh|Xingyun Dou Dizhu|
|xymg|Xingyun Manguan (China, V651C, set 1)||
|xypdk|Xingyun Pao De Kuai (V106CN)|
|yarunara|Mahjong Yarunara (Japan)||
|yosimoto|Mahjong Yoshimoto Gekijou (Japan)||
|yujan|Yu-Jan|mahjong_yujan.cfg|
|zhongguo|Zhongguo Chu Da D (V102C)||

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


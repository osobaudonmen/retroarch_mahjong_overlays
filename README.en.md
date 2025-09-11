# retroarch_custom_overlays

## Table of Contents

- [Mahjong Overlay](#mahjong-overlay)
  - [Important Notes](#important-notes)
  - [Overlay Description](#overlay-description)
    - [Layer Structure](#layer-structure)
    - [Buttons](#buttons)
  - [Mahjong Game List](#mahjong-game-list)
    - [FBNeo](#fbneo)
    - [MAME](#mame)
- [Notes](#notes)
  - [Operation Notes](#operation-notes)
  - [How to Display hotgmck in Single Screen Mode on MAME](#how-to-display-hotgmck-in-single-screen-mode-on-mame)
  - [How to Enable Joystick Controls for NeoGeo Mahjong Games on MAME](#how-to-enable-joystick-controls-for-neogeo-mahjong-games-on-mame)
  - [How to Enable Joystick Controls for NeoGeo Mahjong Games on FBNeo](#how-to-enable-joystick-controls-for-neogeo-mahjong-games-on-fbneo)
  - [MAME/FBNeo Key Bindings](#mamefbneo-key-bindings)

## Mahjong Overlay

Playing mahjong games on RetroArch's MAME/FBNeo can be challenging on devices without physical keyboards, such as smartphones.
To address this issue, we have created a specialized OSD overlay for mahjong games.

To use the overlay, copy the `overlays/mahjong/` directory to RetroArch's `overlays` directory.

### Important Notes

- To prevent misalignment of tiles and buttons on larger screens like smartphones, disable "Overlay Auto-scaling" in "Quick Menu > On-Screen Overlay".
- Multi-screen compatible games (like hotgmck) need to be set to single-screen mode in Dip Switches (refer to [Notes](#notes)).
- Some versions of FBNeo may have issues with overlay keyboard input, which might require core modifications.
- The BET button is assigned to "3" in MAME and "2" in FBNeo, but we standardized it to "3" as MAME has more games requiring the BET button.

### Overlay Description

Mahjong game-specific overlays for MAME/FBNeo are stored in:

```
overlays/mahjong/
```

The directory contains optimized cfg files for each game and images used in the overlays.  
Configuration filename format: `mahjong_(ROM_filename).cfg`

#### Layer Structure

The mahjong overlay consists of 5 types of layers:

1. Regular Button Layer (Landscape)  
   Places buttons in the left and right margins when using a smartphone in landscape orientation.

2. Regular Button Layer (Portrait)  
   Places buttons in the bottom margin when using a smartphone in portrait orientation.

3. Tile Button Layer (With Labels)  
   Allows direct tile selection by tapping and drawing tiles by tapping the N position.
   Semi-transparent A-N labels are displayed at tappable locations.

4. Tile Button Layer (Without Labels)  
   Has the same functionality as the labeled version but prioritizes visibility by not showing labels.
   Buttons overlaid on tiles are transparent.

5. Empty Layer  
   A blank layer used when button overlays might obstruct important information.

When "Overlay Auto-rotation" is enabled in "Quick Menu > On-Screen Overlay", the regular button layer automatically switches based on the screen aspect ratio.

#### Buttons

|Button|Description|
|---|---|
|<img src="overlays/mahjong/settings.png" width="25">| Switches the menu |
|<img src="overlays/mahjong/forward.png" width="25">| Toggles fast-forward |
|<img src="overlays/mahjong/landscape.png" width="25">| Displayed when using the landscape regular button layer, switches to portrait mode when pressed.<br>When overlay auto-rotation is enabled, this button is automatically controlled and won't respond to presses. |
|<img src="overlays/mahjong/portrait.png" width="25">| Displayed when using the portrait regular button layer, switches to landscape mode when pressed.<br>When overlay auto-rotation is enabled, this button is automatically controlled and won't respond to presses. |
|<img src="overlays/mahjong/layers.png" width="25">| Switches between layers |
|<img src="overlays/mahjong/coin.png" width="25">| Inserts a coin |
|<img src="overlays/mahjong/play.png" width="25">| Starts the game |

### Mahjong Game List

We have compiled a list of mahjong games from FBNeo and MAME DAT files.  
Games are sorted by manufacturer and release year, considering the similarity of their control layouts.

#### FBNeo

A list of mahjong games (excluding clones) compiled from FBNeo DAT files and source code.

<!-- fbneo_games -->
<!-- Copy the FBNeo games table here -->
<!-- /fbneo_games -->

#### MAME

A list of mahjong games extracted from MAME DAT files (v0.280) with the following criteria:

- Not a device
- Functional
- Not a clone
- Player 1 controller is mahjong type with 19-29 buttons

<!-- mame_games -->
<!-- Copy the MAME games table here -->
<!-- /mame_games -->

## Notes

### Operation Notes

- On FBNeo, `bnstars1` doesn't work, but its clone `bnstars` works
- On FBNeo, `jongpute` doesn't work, but its clone `ttmahjng` works

### How to Display hotgmck in Single Screen Mode on MAME

You can set up single-screen display on smartphones (even without a physical keyboard) using these steps:

1. Select a keyboard overlay (standard `overlays/keyboards/US-101` etc.)
2. Press Tab key to display MAME options menu (use D-pad and Enter for navigation)
3. Select Video Options
4. Select Screen #0
5. Select Screen 0 Standard (4:3) or Screen 0 Pixel Aspect (10:7)
6. Press Esc key until the MAME options menu closes

### How to Enable Joystick Controls for NeoGeo Mahjong Games on MAME

Follow these steps to switch to joystick controls:

1. Press Tab key during gameplay to open MAME menu
2. Select DIP Switches
3. Set Controller to Joystick
4. Reset System to restart the game

However, the gamepad button mapping may not be correct, requiring keyboard input.

Keyboard mappings:
- `Coin1`: `5` key
- `Start1`: `1` key
- Directions + Actions: `ABCDEF` keys (or `HIJKLM` keys) correspond to "Up Down Left Right A B"

### How to Enable Joystick Controls for NeoGeo Mahjong Games on FBNeo

Follow these steps to switch to joystick controls:

1. Open RetroArch menu
2. Open Core Options
3. Open DIP Switches
4. Turn off Mahjong control panel
5. Restart the game

Unlike MAME, this setting alone enables gamepad controls.

### MAME/FBNeo Key Bindings

|Button|MAME|FBNeo|
|---|---|---|
|A-N        |A-N        |A-N|
|Kan        |Left Ctrl  |Left Ctrl|
|Pon        |Left Alt   |Left Alt|
|Chi        |Space      |Space|
|Reach      |Left Shift |Left Shift|
|Ron        |Z          |Z|
|Flip Flop  |Y          |Y|
|Last Chance|Right Alt  |Right Alt|
|Bet        |3          |2|
|Take Score |Right Ctrl |Right Ctrl|
|Double Up  |Right Shift|Right Shift|
|Big        |Enter      |Enter|
|Small      |Backspace  |Backspace|

- https://docs.mamedev.org/usingmame/defaultkeys.html#default-mahjong-and-hanafuda-keys
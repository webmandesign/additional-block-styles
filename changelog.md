# Additional Block Styles Changelog

## 1.8.1, 20240223

### Updated
- Improving code loading

### File updates
	additional-block-styles.php
	changelog.md
	readme.txt
	includes/Assets.php
	includes/styles/_index.php


## 1.8.0, 20231228

### Added
- "Raster" style for Media & Text block

### Fixed
- Pull styles editor CSS

### File updates
	additional-block-styles.php
	changelog.md
	readme.txt
	assets/scss/editor.scss
	assets/scss/styles/blocks.scss
	includes/styles/media-text.php


## 1.7.0, 20231031

### Added
- "Flip horizontally/vertically" style for Image blocks

### Updated
- Renaming CSS variables so they can be overridden via `theme.json` file
- Adding description to some styles on plugin options page
- Screen reader text styles in editor
- Localization

### Fixed
- Editor styles
- "Modern bubble" quote style

### File updates
	additional-block-styles.php
	changelog.md
	readme.txt
	assets/scss/editor.scss
	assets/scss/global.scss
	assets/scss/options.scss
	assets/scss/_tools/_mixin-pull.scss
	assets/scss/styles/bubble-modern.scss
	assets/scss/styles/drop-shadow.scss
	assets/scss/styles/flip-horizontally.scss
	assets/scss/styles/flip-vertically.scss
	assets/scss/styles/gradient.scss
	assets/scss/styles/inset-shadow.scss
	includes/Assets.php
	includes/Options.php
	includes/parts/field-type--checkboxes.php
	includes/styles/alignment.php
	includes/styles/image.php
	includes/styles/others.php
	includes/styles/spacing.php


## 1.6.1, 20230819

### Updated
- Enabling wavy edges and curves styles for Gallery block

### Fixed
- Wavy edges styles

### File updates
	additional-block-styles.php
	changelog.md
	readme.txt
	assets/scss/styles/waves.scss
	assets/scss/styles/waves-bottom.scss
	assets/scss/styles/waves-top.scss
	includes/styles/others.php


## 1.6.0, 20230819

### Added
- Waves styles (props to CoBlocks plugin)

### Updated
- Compatible with WordPress 6.3
- Enabling curved styles for image blocks
- Options page functionality and styles
- Updating image shape styles
- Improving CSS styles
- Suffixing plugin block styles with " (Abs)"
- Localization

### Fixed
- Future proofing toggling styles in plugin options
- Image shape block styles on Featured Image block
- Curved styles border radius specificity

### File updates
	additional-block-styles.php
	changelog.md
	readme.txt
	assets/scss/editor.scss
	assets/scss/options.scss
	assets/scss/styles/blob.scss
	assets/scss/styles/curved-bottom.scss
	assets/scss/styles/curved-top.scss
	assets/scss/styles/curved.scss
	assets/scss/styles/flower.scss
	assets/scss/styles/oval.scss
	assets/scss/styles/paint-brush.scss
	assets/scss/styles/waves-bottom.scss
	assets/scss/styles/waves-top.scss
	assets/scss/styles/waves.scss
	includes/Assets.php
	includes/Options.php
	includes/Register.php
	includes/parts/field-type--checkboxes.php
	includes/styles/others.php
	languages/*.*


## 1.5.0, 20230624

### Added
- "Blob" style for Image and Media & Text block
- Option to disable block styles

### Updated
- Removing obsolete code
- Readme file info
- CSS styles enqueuing
- Enabling image block styles also for Featured Image block
- Localization

### Fixed
- Editor styles

### File updates
	additional-block-styles.php
	changelog.md
	readme.txt
	assets/scss/editor.scss
	assets/scss/global.scss
	assets/scss/styles/blob.scss
	assets/scss/styles/pull-down.scss
	assets/scss/styles/pull-left-right.scss
	assets/scss/styles/pull-left.scss
	assets/scss/styles/pull-right.scss
	assets/scss/styles/pull-up.scss
	includes/Assets.php
	includes/Loader.php
	includes/Options.php
	includes/Register.php
	includes/parts/field-type--checkboxes.php
	includes/styles/image.php
	includes/styles/overlap.php
	languages/*.*


## 1.4.0, 20230512

### Added
- "Inline" style for Categories and List block
- "Pull left/right" styles for various blocks
- "Curved" styles for Group block
- "Flower" and "Oval" style for Image and Media & Text block

### Updated
- Enabling "No gaps" style for Group block
- Enabling "Accessibly hidden" style for Site Title and Site Tagline block
- Renaming "Overlap" to "Pull" styles
- Improving CSS styles
- Localization

### File updates
	additional-block-styles.php
	changelog.md
	readme.txt
	assets/scss/editor.scss
	assets/scss/global.scss
	assets/scss/styles/border-inner.scss
	assets/scss/styles/bubble-modern.scss
	assets/scss/styles/curved-bottom.scss
	assets/scss/styles/curved-top.scss
	assets/scss/styles/curved.scss
	assets/scss/styles/flower.scss
	assets/scss/styles/inline.scss
	assets/scss/styles/media-on-top.scss
	assets/scss/styles/oval.scss
	assets/scss/styles/pull-down.scss
	assets/scss/styles/pull-left-right.scss
	assets/scss/styles/pull-left.scss
	assets/scss/styles/pull-right.scss
	assets/scss/styles/pull-up.scss
	assets/scss/styles/includes/_media-on-top.scss
	includes/Options.php
	includes/styles/a11y.php
	includes/styles/image.php
	includes/styles/lists.php
	includes/styles/others.php
	includes/styles/spacing.php
	languages/*.*


## 1.3.0, 20221103

### Fixed
- Compatibility with WordPress 6.1

### File updates
	additional-block-styles.php
	changelog.md
	readme.txt
	assets/scss/editor.scss
	assets/scss/styles/border-inner.scss
	assets/scss/styles/no-gap-vertical.scss
	assets/scss/styles/no-gaps.scss
	assets/scss/styles/zigzag.scss


## 1.2.0, 20221014

### Updated
- Improving security

### Fixed
- Responsive block styles
- No gaps style

### File updates
	additional-block-styles.php
	changelog.md
	readme.txt
	assets/scss/styles/hidden-on-tablet.scss
	assets/scss/styles/no-gaps.scss
	assets/scss/styles/stacked-on-tablet.scss
	includes/Assets.php
	includes/Options.php


## 1.1.0, 20220509

### Added
- Plugin options

### Updated
- Media & Text image padding and alignment
- Localization

### Fixed
- Style bugs with latest Gutenberg plugin (single column alignment and separator background color)
- Style specificity

### File updates
	additional-block-styles.php
	changelog.md
	readme.txt
	assets/scss/global.scss
	assets/scss/_tools/_function-round.scss
	assets/scss/styles/alignleft.scss
	assets/scss/styles/alignright.scss
	assets/scss/styles/double-line.scss
	assets/scss/styles/gradient.scss
	assets/scss/styles/hidden-on-tablet.scss
	assets/scss/styles/media-on-top.scss
	assets/scss/styles/stacked-on-tablet.scss
	assets/scss/styles/zigzag.scss
	assets/scss/styles/includes/_media-on-top.scss
	includes/Assets.php
	includes/Autoload.php
	includes/Loader.php
	includes/Options.php
	includes/parts/admin-page.php
	languages/*.*


## 1.0.0, 20220330

- Initial release.

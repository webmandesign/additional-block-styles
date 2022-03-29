=== Additional Block Styles ===

Contributors:      webmandesign
Donate link:       https://www.webmandesign.eu/contact/#donation
Author URI:        https://www.webmandesign.eu
Plugin URI:        https://www.webmandesign.eu/portfolio/additional-block-styles-wordpress-plugin/
Requires at least: 5.8
Tested up to:      5.9
Requires PHP:      7.0
Stable tag:        1.0.0
License:           GNU General Public License v3
License URI:       http://www.gnu.org/licenses/gpl-3.0.html
Tags:              webman, webman design, blocks, block editor, block styles

Provides new additional creative block styles to WordPress native blocks.


== Description ==

Provides new additional creative styles to your WordPress website native blocks in editor (Gutenberg). Simply activate the plugin and use newly available block styles (see "Frequently Asked Questions" for more info).

= List of included block styles: =

**Portfolio gallery**
Display caption of gallery images below the image to create a portfolio-like appearance.

**Enhanced Media & Text**
Enable creative transition between media and text containers. Also, display the media on top for easy feature or service display.

**Paint brush effect**
Give your Image and Media & Text blocks interesting, unique look with brushstroke effect.

**Overlap blocks**
Overlap various (container) blocks over content above or below.

**Modern quotes**
A modern bubble style is provided for Quote block.

**List items separator**
Separate list items and latest posts with a border.

**Remove gaps**
You can remove gaps between columns or gallery images. Also, a useful style to remove vertical gap from various blocks is provided.

**Column alignment**
Use this style with singular column which is not 100% wide. You can then align the column in columns container using these styles.

**Shadows**
Make various blocks stand out applying a drop shadow style. Or push the Cover block background further to the back with inner shadow.

**Responsive styles**
Hide a column, or stack columns and Media & Text on tablet screens (in portrait orientation).

**Separator styles**
New double line and zigzag separator styles are provided.

**Accessibility related styles**
You can hide headings accessibly. They will still be accessible for assistive technology such as screen reader, but visually they'll be hidden.

= Got a suggestion? =

If you have a suggestion for a new block style, please share it here in [support section](https://wordpress.org/support/plugin/additional-block-styles/) or in [GitHub repository issues](https://github.com/webmandesign/additional-block-styles/issues).


== Installation ==

1. Unzip the plugin download file and upload `additional-block-styles` folder into the `/wp-content/plugins/` directory.
2. Activate the plugin through the *"Plugins"* menu in WordPress.
3. Plugin has no options, it works immediately after activation. It adds additional block styles into your WordPress block editor.


== Frequently Asked Questions ==

= How does it work? =

Once you enable the plugin, it will do its magic automatically. The plugin adds new block styles to WordPress native blocks in editor (Gutenberg).

With block styles you can change block appearance with one click. Simply choose your preferred style from block options in sidebar on page/post edit screen and you are done.

→ [Video tutorial about how to use block styles](https://vimeo.com/517486265).

= There are no settings? =

No :) It really just works.

= Want to suggest a new block style? =

If you have a suggestion for a new block style, please share it here in [support section](https://wordpress.org/support/plugin/additional-block-styles/) or in [GitHub repository issues](https://github.com/webmandesign/additional-block-styles/issues).

= How to change shadow intensity? =

You can use custom CSS to change styles to your specific needs.

For example, apply this code into **Appearance → Customize → Additional CSS** to modify block style shadows:

`:root {
	--abs_shadow_spread: 30px;
	--abs_shadow_opacity: .5;
}`

= How to change overlap size? =

You can use custom CSS to change styles to your specific needs.

For example, apply this code into **Appearance → Customize → Additional CSS** to change overlap size:

`:root {
	--abs_overlap_value: 150px;
}`


== Changelog ==

Please see the [`changelog.md` file](https://github.com/webmandesign/additional-block-styles/blob/master/changelog.md) for details.


== Upgrade Notice ==

= 1.0.0 =
Initial release.

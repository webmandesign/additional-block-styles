=== Abs - Additional block styles ===

Contributors:      webmandesign
Donate link:       https://www.webmandesign.eu/contact/#donation
Author URI:        https://www.webmandesign.eu
Plugin URI:        https://www.webmandesign.eu/portfolio/additional-block-styles-wordpress-plugin/
Requires at least: 6.0
Tested up to:      6.4
Requires PHP:      7.0
Stable tag:        1.8.0
License:           GPL-3.0-or-later
License URI:       http://www.gnu.org/licenses/gpl-3.0.html
Tags:              webman, webman design, blocks, block editor, block style

Provides new additional creative block styles for WordPress native blocks.


== Description ==

Provides new additional creative styles for your WordPress website native blocks in editor (Gutenberg). Simply activate the plugin and use newly available block styles (see "Frequently Asked Questions" for more info).

= List of included block styles: =

**Portfolio gallery**
Display caption of gallery images below the image to create a portfolio-like appearance.

**Enhanced Media & Text**
Enable creative transition between media and text containers. Also, display the media on top for easy feature or service display.

**Image effects**
Give your Image and Media & Text blocks interesting, unique look with brushstroke, flower, blob or oval shape.

**Overlap blocks**
Overlap various (container) blocks over content above or below. Or pull them left and right.

**Modern quotes**
A modern bubble style is provided for Quote block.

**List items**
Separate list items and latest posts with a border. Or display lists inline.

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

**Edge sapes**
Apply wavy top and bottom edge for multiple blocks (props to [CoBlocks plugin](https://wordpress.org/plugins/coblocks/) for inspiration).

**Accessibility related styles**
You can hide headings accessibly. They will still be accessible for assistive technology such as screen reader, but visually they'll be hidden.

= Got a suggestion? =

If you have a suggestion for a new block style, please share it here in [support section](https://wordpress.org/support/plugin/additional-block-styles/) or in [GitHub repository issues](https://github.com/webmandesign/additional-block-styles/issues).


== Installation ==

1. Unzip the plugin download file and upload `additional-block-styles` folder into the `/wp-content/plugins/` directory.
2. Activate the plugin through the *"Plugins"* menu in WordPress.
3. Plugin works immediately after activation by adding additional block styles into your WordPress block editor. And you can customize plugin options on **Settings → Abs** screen.


== Frequently Asked Questions ==

= I have a suggestion! =

If you have a suggestion for a new block style, please share it here in [support section](https://wordpress.org/support/plugin/additional-block-styles/) or in [GitHub repository issues](https://github.com/webmandesign/additional-block-styles/issues).

= How does it work? =

Once you enable the plugin, it will do its magic automatically. The plugin adds new block styles for WordPress native blocks in editor (Gutenberg).

With block styles you can change block appearance with one click. Simply choose your preferred style from block options in sidebar on the page/post edit screen and you are done.

→ [Video tutorial about how to use block styles](https://vimeo.com/517486265).

= Are there any plugin options? =

Yes, you can set several of plugin's style properties and choose which block styles to enable on the **Settings → Abs** screen.

= How to change shadow intensity? =

You can set shadow properties in **Settings → Abs → Shadows** screen section.

= How to change overlap size? =

You can set overlap size in **Settings → Abs → Overlapping** screen section.

= How to disable certain block styles? =

You can toggle block styles in **Settings → Abs → Toggle block styles** screen section.

= Are there any custom blocks? =

No. This plugin only registers new block styles, which means it only provides CSS code to style blocks differently. There is no custom block included in this plugin.

= Are there any custom enhancements to blocks? =

No. Just new block styles.

= Can I modify plugin CSS variables via `theme.json` file? =

Yes. You can set `settings.custom.abs` object in your theme's `theme.json` file, such as follows:

`"settings": {
	"custom": {
		"abs": {
			"overlap-value": "100px",
			"overlap-inline-value": "min(10vw, 100px)",
			"overlap-gradient-value": "100px",
			"shadow-blur": "1em",
			"shadow-opacity": ".15",
			"pull": "calc( -1 * var(--wp--custom--abs--overlap-value) )",
			"drop-shadow": "0 calc(var(--wp--custom--abs--shadow-blur) / 10) var(--wp--custom--abs--shadow-blur) rgba(0,0,0, var(--wp--custom--abs--shadow-opacity))",
			"inner-shadow": "inset 0 calc(1.5 * var(--wp--custom--abs--shadow-blur) / 10) calc(1.5 * var(--wp--custom--abs--shadow-blur)) rgba(0,0,0, calc(1.33 * var(--wp--custom--abs--shadow-opacity)) )"
		}
	}
}`


== Screenshots ==

1. Preview of "Wavy" Media & Text and right aligned column
2. Gallery with "Caption below" style and "Modern bubble" quote
3. Paint brushed image, list with line separator, overlapping content below and inner shadow styles preview
4. Media & Text with "Media on top" style, ideal for presenting features or services, and zigzag separator style
5. Preview of Image block styles
6. Preview of Column block styles
7. Preview of Gallery block styles
8. Creating services list with Media & Text block and "Media on top" block styles
9. Preview of List block styles
10. Preview of Media & Text block styles and overlapping styles
11. Preview of Quote block styles
12. Preview of "No vertical gap" and "Inner shadow" styles
13. Preview of Separator block styles
14. Horizontally pulled middle column and oval image style preview
15. Flower, blob and oval image style within curved group block
16. Wavy edges block
17. "Raster" Media & Text style

== Changelog ==

Please see the [`changelog.md` file](https://github.com/webmandesign/additional-block-styles/blob/master/changelog.md) for details.


== Upgrade Notice ==

= 1.8.0 =
Adding "Raster" style for Media & Text block, fixing editor CSS styles.

=== Plethora Plugins Tabs + Accordions ===
Contributors:      Plethora Plugins
Tags:              block
Tested up to:      6.0
Stable tag:        1.0.6
License:           GPL-2.0-or-later
License URI:       https://www.gnu.org/licenses/gpl-2.0.html

Plethora Plugins Tabs + Accordions

== Description ==

* A user-friendly tabs or accordion block for the default Wordpress editor. 
* Quickly switch between horizontal/vertical or accordion layout
* Edit tab labels and content and see the effects immediately in Live Preview. 
* You can select one of the predefined themes (Basic and Tabby) or the Minimal theme that makes it easy to add your own styles.  Optimized for the default WordPress themes and the Hello Elementor theme. Some custom CSS styling would likely still be needed in your own implementation; this plugin just provides a lightweight tab/accordion block with minimal styling options. The idea is you would extend this with your own CSS as needed.
* Visit the [Plethora Plugins site]( https://plethoraplugins.com/tabs-accordions/) for the demos and a handy theme customizer!


== Installation ==

Installing Tabs + Accordions in the default wordpress editor directly:
--------------------------------------------------------------------
1. In the editor, click the "+" icon at the top left (next to the "W" icon). When you hover over it, a tooltip should show something like "Toggle block inserter"
2. Search for the plugin using keywords like "plethora" and "tabs", and you should see the Tabs + Accordions plugin listed. Clicking on it will immediately install and insert the block for the plugin, so you can get started right away!
 
 
Traditional plugin installation method:
---------------------------------------
1. Upload the plugin files to the `/wp-content/plugins/plethoraplugins-tabs` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress

== Frequently Asked Questions ==

= Can I change the default settings? =

Yes - visit the plugin settings page to change any of the settings.  If you have a lot of tabs or accordions on your site, you may want to change which theme or layout is used by default, or override any of the other default settings.
To change the global default options, go to the wordpress dashboard and navigate to "Settings" -> "Tabs + Accordions"  ( /wp-admin/options-general.php?page=plethoraplugins-tabs-settings ) 

= A lot of blocks in the editor seem to break when I upgrade them.  Will that happen to my Tabs + Accordions blocks? =

This plugin uses Wordpress's 'dynamic blocks' approach. This means that the HTML for the site itself is generated as soon as someone visits the page. By not saving the HTML output of the block (except for the inner tab content), any small updates to the way the block renders will happen automatically when the plugin updates, behind-the-scenes.

= How do I create a custom theme? =
You can select the Minimal theme, which provides just enough CSS for the tabs/accordion to be usable (but not pretty). 
 Just know that for this option you would need to supply your own CSS even for the basics, like hiding inactive tabs.


== Screenshots ==

1. Horizontal
2. Vertical
3. Accordion

== Changelog ==

= 1.0.0 =
* Release

= 1.0.1 =
* Minor fixes 

= 1.0.2 =
* More tiny tweaks 

= 1.0.3 =
* Stylistic tweaks 

= 1.0.4 =
* Small UI improvements for the Tabby theme

= 1.0.5 =
* Prevented several PHP Notices from appearing in error logs
* Ready for Wordpress 6.0!

= 1.0.6 =
* Vertical tabs editor style fix (there was no gap between the columns in the editor view)

== Documentation ==

IMPORTANT: Avoid using tabs with the same labels, or else you will need to override the anchor so that the code can uniquely identify your tab or accordion header.

Visit [the documentation page](https://plethoraplugins.com/tabs-accordions/documentation/) for documentation.




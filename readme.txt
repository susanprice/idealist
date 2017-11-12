=== Idealist ===
Contributors: susanprice
Requires at least: WordPress 4.7
Tested up to: WordPress 4.8
Version: 1.1.3
License: General Public License (GPL)v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: blog, custom-background, custom-colors, custom-header, custom-logo, custom-menu, editor-style, featured-images, news, post-formats, right-sidebar, sticky-post, theme-options, threaded-comments, translation-ready, two-columns

== Description ==

Idealist is a minimalist WordPress theme for news, blogs, and other media rich sites. It was designed to be fast, clean, highly readable, easy to use, and customizable.

Menus to two levels deep.

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Screenshots ==
 
1. The screenshot contains the header image which is: assets/img/header.jpg.
 
== Upgrade Notice ==
 
for future use 

== Credits & Copyrights ==

Based on Underscores, (C) 2012-2017 Automattic, Inc.
License: GPLv2 or later. https://www.gnu.org/licenses/gpl-2.0.html
Source: http://underscores.me/

Bootstrap, Copyright 2011-2016 Twitter, Inc.
License: MIT
Source: http://getbootstrap.com/

Font Awesome CSS and Fonts, Copyright Dave Gandy
License: SIL Open Font License, version 1.1.
License: MIT http://www.opensource.org/licenses/MIT
Source: http://fontawesome.io/

Header image 
License: Creative Commons CC0
https://pixabay.com/en/black-and-white-tunnel-road-1730543/

HTML5 Shiv, Copyright 2014 Alexander Farkas, @afarkas @jdalton @jon_neal @rem
License: MIT/GPL2
Source: https://github.com/aFarkas/html5shiv

normalize.css, Copyright 2012-2016 Nicolas Gallagher and Jonathan Neal
License: MIT, http://opensource.org/licenses/MIT
Source: https://necolas.github.io/normalize.css/

wp-bootstrap-navwalker
License: GPL3
Source: https://github.com/wp-bootstrap/wp-bootstrap-navwalker

External resources linked to this theme:
Roboto Font by Christian Robertson 
License: Apache License, version 2.0 http://www.apache.org/licenses/LICENSE-2.0
Source: https://fonts.google.com/specimen/Roboto

Idealist WordPress Theme, Copyright 2017 S. Price
Idealist is distributed under the terms of GPLv2 or later

== Changelog ==

= 1.0.0 = 04-04-17
- Initial release 

= 1.0.1 = 04-07-17
- Fixed: multiple text-domains warning
- Fixed: Theme & Author URI
- Improved: moved wp_bootstrap_navwalker.php to /inc

= 1.0.2 = 05-16-17
- Added: 'Theme Options' section to customizer
- Added: starter content
- Fixed: removed unused layout files
- Fixed: visual edit shortcuts work for theme options, menu, and site title & description and widgets
- Fixed: don't display "Add a Menu" if no menu is assigned
- Improved: custom header is full-width (and changed default header image)
- Improved: using Font Awesome for SVG search icon
- Improved: search form styling updates
- Improved: footer styling
- Improved: all styles moved from style.css to assets/css/custom.css to simplify child theme creation

= 1.0.3 = 05-30-17
- Added: Font Awesome license references CSS and Fonts
- Added: added 'Documentation' section to customizer
- Improved: includes minified & un-minified css and js
- Fixed: escaping home_url() & get_permalink() with esc_url()
- Fixed: all globals prefixed
- Fixed: removed search-form from add_theme_support('html5')
- Fixed: changed bootstrap style handle to 'bootstrap'
- Fixed: changed bootstrap script handle to 'bootstrap-js'
- Fixed: jQuery not enqueued
- Fixed: added 'header-text' to add_theme_support() for custom-header
- Fixed: customizer displays checkbox to toggle display of header text
- Fixed: header displays custom icon, title and taglines independently
- Fixed: removed normalize from custom.css because it is in bootstrap.css
- Fixed: customizer settings saved to theme_mod
- Fixed: updated translatable strings

= 1.0.4 = 06-28-17
- Added: tags custom-background, custom-colors, custom-logo, editor-style,          
    news, post-formats, theme-options, threaded-comments, two-columns
- Added: search icon in top menu bar
- Added: template page-full-width.php
- Added: template-parts/page-one-panel.php and template-parts/page-two-panel.php
- Improved: refactored custom.css
- Improved: breakpoint for mobile menu toggle changed from 768px to 1400px
- Improved: layout of page.php consistent with front page posts

= 1.0.5 = 07-05-17
- Added: tags, categories, and date (per settings) displayed in post
- Added: a dismiss button in search entry field, on navbar
- Added: theme version number to force updates
- Added: more styles to editor-style.css
- Improved: sticky posts dintinquished with bookmark icon
- Improved: HTML tag styles updated for readability
- Improved: front page based on the_content(), not the_excerpt()
- Fixed: search widget button issues under WordPress 4.8
- Fixed: starter content default styling
- Fixed: front page handles 'more' tag 

= 1.0.6 = 07-08-17
- Added: post format styling for aside, image, link, quote & status
- Improved: loading minified js

= 1.0.7 = 07-14-17
- Added: print styles
- Added: search form to 404 page
- Improved: increased table padding
- Improved: links (in entry-content) are underlined by default
- Improved: mobile breakpoint changed from 1400px to 1200px
- Improved: menu dropdown styles change at 1200px (mobile breakpoint)
- Improved: custom menu in sidebar shows structure, with slight indentation
- Improved: primary menu displays under left-aligned title/description
- Improved: archive description is centered
- Improved: upgraded wp-bootstrap-navwalker from 2.0.4 to 2.0.5
- Improved: all post formats display the title
- Fixed: primary menu handles long titles and menus, without overlap 
- Fixed: 'Add a Menu' displays if no menu is assigned to primary
- Fixed: comments display on static pages 
- Fixed: file folders display in post footer only if at least one category

= 1.0.8 = 08-04-17
- Improved: styling of "MORE" link 
- Improved: using get_theme_file_uri() to load header graphic

= 1.0.9 = 08-11-17
- Improved: new screenshot.jpg
- Improved: button text darker
- Improved: post headings smaller on mobile 
- Fixed: search icon in navbar white background
- Fixed: custom header image margins (0,0,30px,0)

= 1.1.0 = 09-07-17
- Added: tags custom-menu and featured-images
- Improved: post format aside, caption, and "more" tag styling
- Improved: removed 'search' from starter content (to match screenshot)
- Fixed: added 'screen' to media queries
- Fixed: copyright string in footer escaped with esc_html()
- Fixed: changed custom.js enqueue handle to 'idealist-custom-js'
- Fixed: added prefix to class idealist_WP_Bootstrap_Navwalker
- Fixed: added MIT license for FontAwesome
- Fixed: 'Edit' translation ready in edit_post_link()
- Fixed: using wp_add_inline_style() to add custom styles

= 1.1.1 = 11-05-17
- Added: Author URI 
- Added: link to https://NewMediaThemes.com in footer

= 1.1.2 = 11-06-17
- Added: Single post pages can have sidebar via Two-Panel template

= 1.1.3 = 11-12-17
- Added: template "post-two-panel", which includes sidebar and post date
- Improved: template "page-two-panel" is for pages only (no sidebar or post date)

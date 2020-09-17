=== Plugin Name ===
Contributors: Todi.Adiatmo, IqbalJayadi
Tags: cache,w3totalcache,w3
Requires at least: 3.0.1
Tested up to: 3.6
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Purge all page from W3 Total Cache when a post is published / updated.
== Description ==

Page caching mechanism is somewhat very confusing. Which page to purge ? does the archive need to purge to? how about the widget?

We know that W3 Total Cache already have mechanism to purge archive page with similiar tag / category (post term purge). However this is not sufficient.

Consider this scenario :

Web sitemap :

- Home
	- /category/category_1
	- /post_type_2
	- /pages_x(contain post_type_2 with custom WP_Query )

With normal W3 Total cache if you publish post with post_type_2 and category 1 the /pages_x  will not purge !

Our solution is to purge all the page cache during a post is marked publish.

When all page is purged ?

1. There is new post marked as publish (updated or new post)
2. Post move to trash

Setting Recomendation 

1. Do not prime/preload page cache , this will slow your site
2. Use disqus/livefrye for your comment, it will reduce page cache problem


**Support**
Please use wordpress support forum [here](http://wordpress.org/support/plugin/w3-total-cache-purge-all-post "here")

Or feel free to contact us at support@tonjoo.com and visit our site [tonjoo](http://tonjoo.com/w3-total-cache-purge-all-post-plugin/ "tonjoo")

**Development Support**
Treat us a coffee! Donation can be make from [donate](http://tonjoo.com/donate/ "donate")
Thank you!

== Installation ==

1. Grap the plugin from from wordpress plugin directory or Upload w3-total-cache-purge-all-post folder to the /wp-content/plugins/ directory
2. Activate W3 Total Cache Plugin, **DISABLE 'Prime post cache on publish' on page cache option**. It will kill your performace
3. Activate the plugin

== Frequently Asked Questions ==
**Its slow my website !!**
If you don't like it just turn it off, it's experimental anyway

**What happen if i wrote an excerpt for the post ? **
It will used, instead of the automatically generated one.

== Changelog ==
= 0.2
* First Release

== Donation ==
Treat us a coffee! Donation can be make from [donate](http://tonjoo.com/donate/ "donate")
Thank you!
=== Advanced lazy load ===
Contributors: kasonzhao
Donate link: 
Tags: lazy load, image lazyload, image load
Requires at least: 3.3
Tested up to: 4.1.0
Stable tag: 1.6.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Reduce the loading time while opening your wordpress website, accelerate openning time. Images outside of viewport (visible part of web page) wont be loaded before user scrolls to them..

== Description ==

Advanced lazy load is aiming to speed up your website which powered by WordPress. 
It delays loading of images in (long) web pages. 
Images outside of viewport (visible part of web page) wont be loaded before user scrolls to them.


After active the plugin, when end user open website,
will load the text first, and the then load images in your website, in this case will help reduce the loading time, the image is still in your website, just load it later and base on user screen scrolling by jQuery script, scrolling down, more image will be loaded, no need to call back any external server.

Wish to reduce page loading time significantly? Then choose it.

<strong>Features:</strong>
<ul>
<li>Truly reduce server side loading time.</li>
<li>Able to skip specific pages/urls</li>
<li>Able to skip img class </li>
<li>ON/OFF lazy load on Mobile devices</li>
<li><a href="http://www.kasonz.com/developement/advanced-lazy-load/" target="_blank">More</a></li>
</ul>


Visit <a href="http://www.kasonz.com/developement/advanced-lazy-load/" target="_blank">kasonz.com</a> for more information.


== Installation ==

1. Upload folder 'advanced-lazy-load' to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. After activate it, you can set the in the setting menu -> Advacned lazy load

== Frequently asked questions ==

Q: Where are the images going?<br />
A: Still in your website, just make it load on demand.

Q: What should I do after activate it.<br />
A: It would work after activation, or you can take a look in the setting menu.

Q: The plugin mess up some pages, how can I fix it?<br />
A: You can use skip URL option to NOT lazy load these pages, then we can fix them later.


== Upgrade Notice ==

= 1.6.0 =
This version use new core function to lazy load images, and added 3 new options: skip url/img class, OFF/ON on mobile devices.

== Screenshots ==

1. /screenshot-1.jpg

2. /screenshot-2.jpg

3. /screenshot-3.jpg

== Changelog ==

= 1.1 =
* 	upgrade : change the wording error.

= 1.2 =
* 	upgrade : Fix the jquery library loaded issue.

= 1.3 =
* 	Bug fix : Fix the update alert issue.


= 1.4.2 =
* 	New option: Setting duration in setting page

= 1.5.0 =
* 	Modify the broken links

= 1.5.1 =
* 	Added new plugin website, three new demo pages in <a href="http://www.kasonz.com/" target="_blank">kasonz.com</a>.

= 1.6.0 =
* 	New option: Skip img class(es), no lazy load for specified image class(es).
* 	New option: Skip page(s).
* 	New option: Enable on mobile device, default value is enable.
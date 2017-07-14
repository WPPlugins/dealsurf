=== DealSurf.com Daily Deals ===
Contributors: dealsurf.com
Donate link: http://dealsurf.com/
Tags: daily deals, groupon, dealsurf, coupons
Requires at least: 2.0.2
Tested up to: 3.0.5
Stable tag: 1.3.1

Here is a short description of the plugin.  This should be no more than 150 characters.  No markup here.

== Description ==

Display the list of all daily deals in the chosen city. You must be an affiliate to use this plugin: <a href=http://affiliate.dealsurf.com>http://affiliate.dealsurf.com</a>. Read readme.txt to understand how to use it.

== Installation ==

DealSurf Plugin Instructions.

1/ Requirements

In order to install this plugin you need to:
	- Install "PHP Execution" that you can find in WordPress Plugins/search
    - Turn off tag balancing by unchecking "WordPress should correct invalidly nestedd XHTML automatically" in Settings>Writing of the admin section. 
    
2/ Show the deals for a specific city

Copy an paste the code below to your HTML editor (not Visual) 
    
`<?php

/* 
 * 1/ Define your options
 * 
 * city (Required): Filter your query by city. List of city code : http://api.dealsurf.com/doc/DealSurf/city/code
 * category (Optional): Filter your query by category. (add multiple categories separated by "|"). List of category code: http://api.dealsurf.com/doc/DealSurf/category/code
 * keyword (Optional): Filter your query by keywords (add multiple keywords separated by "|")
 * min_price (Optional): Filter your query by minimum price
 * max_price (Optional): Filter your query by maximum price
 * min_discount (Optional): Filter your query by minimum discount
 * max_discount (Optional): Filter your query by maximum discount
 * provider (Optional): Filter your query by providers (add multple providers separated by "|") List of provider code : http://api.dealsurf.com/doc/DealSurf/provider/code
 * provider_bl (Optional): Filter your query by providers you don't want (add multple providers separated by "|") List of provider code : http://api.dealsurf.com/doc/DealSurf/provider/code
 * filterbar (optional,default=1): display a filter sidebar on the left
 * headerfooter (optional,default=1): display a footer and header for the deals
 */  
	$options = array(
					"city" => "YOUR CITY CODE"
	);


	$ds = new DealSurf("YOUR API KEY",$options);
    echo $ds->display_deals();	

?>`





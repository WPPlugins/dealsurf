<?php

// Copyright 2010-2011 DealSurf.com All Rights Reserved.
//
// +---------------------------------------------------------------------------+
// | Dealsurf Platform PHP5 client                                             |
// +---------------------------------------------------------------------------+
// | Copyright (c) 2010-2011 DealSurf.com                                      |
// | All rights reserved.                                                      |
// |                                                                           |
// | Redistribution and use in source and binary forms, with or without        |
// | modification, are permitted provided that the following conditions        |
// | are met:                                                                  |
// |                                                                           |
// | 1. Redistributions of source code must retain the above copyright         |
// |    notice, this list of conditions and the following disclaimer.          |
// | 2. Redistributions in binary form must reproduce the above copyright      |
// |    notice, this list of conditions and the following disclaimer in the    |
// |    documentation and/or other materials provided with the distribution.   |
// |                                                                           |
// | THIS SOFTWARE IS PROVIDED BY THE AUTHOR ``AS IS'' AND ANY EXPRESS OR      |
// | IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES |
// | OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED.   |
// | IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY DIRECT, INDIRECT,          |
// | INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT  |
// | NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, |
// | DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY     |
// | THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT       |
// | (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF  |
// | THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.         |
// +---------------------------------------------------------------------------+
// | For help with this library, contact support@DealSurf.com                  |
// +---------------------------------------------------------------------------+
//

/*
Plugin Name: DealSurf Daily Deals
Plugin URI: http://DealSurf.com/
Description: Display the list of all daily deals in the chosen city. You must be an affiliate to use this plugin: <a href=http://affiliate.dealsurf.com>http://affiliate.dealsurf.com</a>. See readme.txt  to understand how to use it.
Version: 1.3.1
Author: DealSurf
Author URI: http://DealSurf.com
License: GPL
*/

class DealSurf{
	
	var  $API_URL = "http://api.dealsurf.com";
	var  $deal = array();
	var  $status;
	var  $error="";
	var $options =  array("city" => "",
					"category" =>"",
					"keyword" =>"",
					"min_price" =>"",
					"max_price" =>"",
					"min_discount" =>"",
					"max_discount" =>"",
					"provider" =>"",
					"provider_bl" =>"",
					"filterbar" => 1,
					"headerfooter" => 1);
	
	function DealSurf($apikey,$options=array()){
		$this->apikey = $apikey;
		$this->options = array_merge($this->options,$options);
		$this->check_crossfile();
	}
	
	function check_crossfile(){
		$file = $_SERVER['DOCUMENT_ROOT']."/dsxss.html";
		if(!file_exists($file)){
			$s = '<html>
				    <head>
				        <meta http-equiv="cache-control" content="public">
				        <script type="text/javascript">
				        	function ds_gup( name )
							{
					  
							  name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
							  var regexS = "[\\?&]"+name+"=([^&#]*)";
							  var regex = new RegExp( regexS );
							  var results = regex.exec( window.location.href );
							  if( results == null )
							    return "";
							  else
							    return results[1];
							}
				        
				            var h = ds_gup("h");
				            top._ds_resize(h);
				        </script>
				    </head>
				</html>';
			$handle = fopen($file, 'x+');
			fwrite($handle, $s);
			fclose($handle);
		}
		
		
		
	}
	
	function setOptions($options){
		$this->options = $options;
	}
	

	
	function display_deals(){
		
		$result = '<script>
						function _ds_resize(n){
							document.getElementById("widget_ds_daily_deal").height = n;
						}
					</script>';
		
		$result .= '<iframe id=widget_ds_daily_deal	frameborder="0" scrolling="no"  width="100%" height="400px"	src="http://dealsurf.com/widget/daily_deal?domain='.$_SERVER['HTTP_HOST'].'&apikey='.$this->apikey."&".$this->getPostParameters().'"></iframe>';
		
		return $result;
	}
	
	
	
	function getPostParameters(){
		$result = "";
		foreach($this->options as $key=>$val){
			if(is_array($val)){
				$result .= $key."=".implode("|",$val)."&";
			}else{
				$result .= $key."=".$val."&";
			}
		}
		return $result = substr($result,0,-1);
	}
}

?>
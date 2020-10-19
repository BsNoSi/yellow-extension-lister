<?php
// Lister Plugin, , https://github.com/bsnosi/yellow-plugin-lister
// based on https://github.com/datenstrom/yellow-extensions/tree/master/features/preview
// Copyright (c) 2013-2018 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowLister {
   const VERSION = "1.4.0";

   public $yellow; //access to API

   // Handle initialisation
   public function onLoad($yellow) {
      $this->yellow = $yellow;
   }

   // Handle page content of shortcut
   public function onParseContentShortcut($page, $name, $text, $type) {
      $output = null;
      if ($name == "lister" && ($type == "block" || $type == "inline")) {
         list($location, $mode, $style, $sorting) = $this->yellow->toolbox->getTextArguments($text);
         if (empty($location))
            $location = $page->getLocation();
	      $location = substr($location, 0, strrpos( $location, '/')) . "/";
         if (strempty($mode))
            $mode = "0";
         if (empty($style))
            $style = "lister";

         $content = $this->yellow->content->find($location);
	   
	   if ($content){
		switch ($sorting){
		  case "m":	
			$pages = $content->getChildren()->sort("modified",false);
			break;
		  case "o":	
			$pages = $content->getChildren()->sort("modified",true);
			break;
		  case "p":	
			$pages = $content->getChildren()->sort("published",false);
			break;
		  case "f":	
			$pages = $content->getChildren()->sort("published",true);
			break;			
		  case "a":
		      $pages = $content->getChildren()->sort("title",true);
			break;
		  case "z":
			$pages = $content->getChildren()->sort("title",false);			
			break;
		  default:
		      $pages = $content->getChildren(); 
		 }             
		}
		else
		  $pages = $this->yellow->content->clean();    
	     
         if (count($pages)) {
            if ($mode == "1")
               $output .= "<style> .".$style." ul li > a:first-child {font-size: 1.2em;}</style>";
            $output .= "<div class=\"".htmlspecialchars($style)."\">\n";
            $output .= "<ul>\n";
            if ($sorting == "r")
               $pages = $pages->reverse();
            foreach($pages as $page) {
               $title = $page->get("titlePreview");
               if (empty($title))
                  $title = $page->get("title");
               $output .= "<li><a href=\"".$page->getLocation(true)."\">";
               $output .= htmlspecialchars($title)."</a>";
               if ($mode == "1")
                  $output .= "<br>".$this->yellow->toolbox->createTextDescription($page->getContent(), 0, false, "<!--more-->", " <a class=\"blogMore\" href=\"".$page->getLocation(true)."\">".$this->yellow->language->getTextHtml("blogMore")."</a>");
               $output .= "</li>\n";
            }
            $output .= "</ul>\n";
            $output .= "</div>\n";
         } else {
            $page->error(500, "Lister '$location' is empty or does not exist.");
         }
      }
      return $output;
   }

   // Handle page extra data
   public function onParsePageExtra($page, $name) {
      return $this->onParseContentShortcut($page, $name, "", "block");
   }
}
?>

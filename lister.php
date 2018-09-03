<?php
// Lister Plugin, , https://github.cmo/bsnosi/yellow-plugin-lister
// based on https://github.com/datenstrom/yellow-plugins/tree/master/preview
// Copyright (c) 2013-2018 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowLister {
    const VERSION = "1.0";
    public $yellow;         //access to API

    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle page content parsing of custom block
    public function onParseContentBlock($page, $name, $text, $shortcut) {
        $output = null;
        if ($name=="lister" && $shortcut) {
            list($location, $mode, $style) = $this->yellow->toolbox->getTextArgs($text);
            if (empty($location)) $location = $page->location;
			if(strempty($mode)) $mode = "0";
            if (empty($style)) $style = "lister";
            $content = $this->yellow->pages->find($location);
            $pages = $content ? $content->getChildren() : $this->yellow->pages->clean();
			if (count($pages)) {
				// $page->setLastModified($pages->getModified());
				if($mode == "1") {
					$output = "<style> .".$style." ul li > a:first-child {font-size: 1.2em;}</style>";
				}	
				$output .= "<div class=\"".htmlspecialchars($style)."\">\n";
				$output .= "<ul>\n";
				foreach ($pages as $page) {
					$title = $page->get("titlePreview");
					if (empty($title)) $title = $page->get("title");
					$output .= "<li><a href=\"".$page->getLocation(true)."\">";
					$output .= htmlspecialchars($title)."</a>";
					if($mode == "1") {
						$output .= "<br>".$this->yellow->toolbox->createTextDescription($page->getContent(), 0, false, "<!--more-->", " <a href=\"".$page->getLocation(true)."\">".$this->yellow->text->getHtml("blogMore")."</a>");
					}
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

    // Handle page extra HTML data
    public function onExtra($name) {
        return $this->onParseContentBlock($this->yellow->page, $name, "", true);
    }
}

$yellow->plugins->register("lister", "YellowLister", YellowLister::VERSION);

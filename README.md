# Lister 

Version 1.3.1

> Tested with core version 0.8.23

## Application

List all pages as simple or teaser list from a specified location.

## Install

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/bsnosi/yellow-extension-lister/archive/master.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `yellow-plugin-lister-master.zip` into your `system/extensions` folder.

To uninstall delete the [extension files](extension.ini).

## Usage

     [lister "location" "mode" "style" "reverse"]
     
| Parameter | Function |
| :---: | :--- |
| location | If empty path of current file or points *from the root* to the folder to list. |
| mode | display mode<br/> default 0 = empty: `TitlePreview` or `Title` as link.<br/>1: Additional teaser display upt to `[--more--]`and `readmore`-link.<br/>If `[--more--]` is missing, the whole file is displayed. |
| style | If `1` some css style is added to increase the font-size of the title (link) to 120% of standard inside the list. |
| reverse | If `r` list direction is Z-A instead A-Z of pages (depending on file name) |

Lister creates a Linklist to all files (exept Status "hidden") of a folder.

## Title Replacement

`TitlePreview` is an *alternative* Headline instead of the standard headline of a page. It has to be set up in the header area of the yellow file.

**TitlePreview Example**

```
title: This is the regular title
titlePreview: This is an alternative title
Layout: wiki
…
```

This can useful for replacement of (too) long titles or for better explanation of content in the generated list.

## Examples

| Parameter | Function |
| :---: | :--- |
| [lister /faq/] | Lists all pages of folder `/faq/` and use `title` or `titlePreview` |
| [lister /faq/ 1] | Creates a list of titles (titlePreview, if available) with file teaser |
| [lister /faq/ 1 1] | Like previous, with increased font size to 120% | 
| [lister /faq/ 1 myclass] | Like previous but instead of font increase the given style is used<br/>Note: A created list is enclosed by `class="lister` if no style is given. |
| [lister /faq/ - - r] | List is displayed reverse (Z-A) depending on *file name* |


## History

2020-10-17: API changes applied

2020-10-15: Some small bugfixes after testing.

2020-10-13: Reverse order added

2019-04-23: Initial release

## Developer

[Norbert Simon](https://nosi.de) based on [Datenstrom Yellow Preview Extension](https://github.com/datenstrom/yellow-extensions/tree/master/features/preview)

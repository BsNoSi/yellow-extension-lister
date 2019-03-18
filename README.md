Lister 1.1.0
============
List all pages from a specific location.

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/bsnosi/yellow-plugin-lister/archive/master.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `yellow-plugin-lister-master.zip` into your `system/extensions` folder.

To uninstall delete the [extension files](extension.ini).

## How to create page lists

Create a `[lister]` shortcut. 

The following arguments are available, all arguments are optional:

`Location` = points *from the root* to the folder you want to list. Uses current folder if empty.  
`Mode` = Page display mode (default: 0).  
`Style` = Lister style


Lister creates a Linklist to all files (exept Status "hidden") of a folder.

I wanted a simple way of displaying a self-maintaining faq list. It should be possible to have only the headlines or additional text up to the `[--more--]` tag.

The following modes are available: 

- Value `0`: Only the `TitlePreview` or `Title` is displayed as a link.
- Value `1`: Additionally, the text of the file is displayed up to the `[--more--]` tag. If missing, the whole file is displayed.

> Mode `1` adds some css style to increase the font-size of the title (link) to 120% of standard inside the list.

### TitlePreview?

`TitlePreview` is an *alternative* Headline instead of the standard headline of a page. It has to be set up in the header area of the yellow file.

**TitlePreview Example**

```
title: This is the regular title
titlePreview: This is an alternative title
Layout: wiki
…
```
This can useful for replacement of (too) long titles or for better explanation of content in the generated list.

## Example
Creates a list of titles (titlePreview, if available):

    [lister /faq/]

Creates a list of titles (titlePreview, if available) with increased font size and adds the teaser of the file below the title(Preview):

    [lister /faq/ 1]

Encloses the list of the first example with `<div class="myclass">` instead of `<div class="lister">`:

    [lister /faq/ - myclass]

## Developer

[Norbert Simon](https://nosi.de) based on [Datenstrom yellow-preview-plugin](https://github.com/datenstrom/yellow-plugins/tree/master/preview)

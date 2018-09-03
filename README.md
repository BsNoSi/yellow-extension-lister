# Yellow Plugin Lister 

### V 1.0 (2018-09-03)

Lister creates a Linklist to all files (exept Status "hidden") of a folder.

## The Idea Behind

I wanted a simple way of displaying a self-maintaining faq list. It should be possible to have only the headlines or additional text up to the `[--more--]` tag.

## How do I Install This?

1. Download and install [Datenstrom Yellow CMS](https://github.com/datenstrom/yellow/).
2. Download [Lister plugin](https://github.com/BsNoSi/yellow-plugin-lister/archive/master.zip ).  If you are using Safari, right click and select 'Download file as'.
3. Copy the `yellow-plugin-lister-master.zip` into the `system/plugins` folder.
 
To uninstall simply delete the [plugin files](update.ini).

## How do I use lister plugin?

Creata a `[lister  path mode style]` shortcut.

The following arguments are available

**path** points *from the root* to the folder you want to list.

**mode** (optional) is `0` if not used. 

- Value `0`: Only the `TitlePreview` or `Title` is displayed as a link.
- Value `1`: Additionally, the text of the file is displayed up to the `[--more--]` tag. If missing, the whole file is displayed.

> Mode `1` adds some css style to increase the font-size of the title (link) to 120% of standard inside the list.

**style** (optional) is a class style for the `div` enclosing the list. 


##### TitlePreview?

`TitlePreview` is an *alternative* Headline instead of the standard headline of a page. It has to be set up in the header area of the yellow file.

**TitlePreview Example**

```
title: This is the regular title
titlePreview: This is an alternative title
template: wiki
…
```
This can useful for replacement of (too) long titles or for better explanation of content in the generated list.

## Example


```

[lister /faq/]

```

creates a list of titles (titlePreview, if available).


```
[lister /faq/ 1]

```

creates a list of titles (titlePreview, if available) with increased fontsize and adds the teaser of the file below the title(Preview).

```
[lister /faq/ - myclass]

```
encloses the list of the first example with `<div class="myclass">` instead of `<div class="lister">`

## Developer

[Norbert Simon](https://nosi.de)

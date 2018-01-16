# Expandable List Module for [Hogan](https://github.com/dekodeinteraktiv/hogan-core)

## Installation
Install the module using Composer `composer require dekodeinteraktiv/hogan-expandable-list` or simply by downloading this repository and placing it in `wp-content/plugins`

## Usage
…

## Available filters

- `hogan/module/expandable_list/list_item_classes`
- `hogan/module/expandable_list/load_styles`
- `hogan/module/expandable_list/load_scripts`

- `hogan/module/expandable_list/content/media` - allow/disallow media upload button in list item wysiwyg. Default 0.
- `hogan/module/expandable_list/content/tabs` - change what tabs are shown for list item wysiwyg. Default 'all'.
- `hogan/module/expandable_list/content/toolbar` - customize toolbar for expandable list item wysiwyg. Default 'hogan_caption' from Hogan Core.

## Changelog
### master
- Heading classname changed from `.heading` to `.hogan-heading`.

### 1.0.4
- title field is required
- added accordion field to admin layout
- added filter for media upload button in wysiwyg field

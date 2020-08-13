# Changelog

## [1.2.1]
- Added plugin version number to asset loading to fix cached asset versions. [PR #17](https://github.com/DekodeInteraktiv/hogan-expandable-list/pull/17)

## [1.2.0]
- Add option for thumbnail next to title. [PR #16](https://github.com/DekodeInteraktiv/hogan-expandable-list/pull/16)

## [1.1.6]
- Add option for offsetting list item anchor. [PR #15](https://github.com/DekodeInteraktiv/hogan-expandable-list/pull/15)

## [1.1.5]
- Add custom item name option. [PR #13](https://github.com/DekodeInteraktiv/hogan-expandable-list/pull/13)

## [1.1.4]
- Output content without wp_kses_post(). [PR #11](https://github.com/DekodeInteraktiv/hogan-expandable-list/pull/11)

## [1.1.3]
- Add function for opening item by url hash. [PR #8](https://github.com/DekodeInteraktiv/hogan-expandable-list/pull/8)

## [1.1.2]
- Update module to new registration method introduced in [Hogan Core 1.1.7](https://github.com/DekodeInteraktiv/hogan-core/releases/tag/1.1.7)
- Set hogan-core dependency `"dekodeinteraktiv/hogan-core": ">=1.1.7"`
- Add Dekode Coding Standards

## [1.1.1]
`wp_enqueue_scripts` action hook removed. Handled by `hogan-core`.

## [1.1.0]
### Breaking Changes
- Remove heading field, provided from Core in [#53](https://github.com/DekodeInteraktiv/hogan-core/pull/53)
- Heading field has to be added using filter (was default on before).
- Heading classname changed from `.heading` to `.hogan-heading`.

### 1.0.4
- title field is required
- added accordion field to admin layout
- added filter for media upload button in wysiwyg field

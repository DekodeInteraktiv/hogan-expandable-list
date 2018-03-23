# Changelog

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

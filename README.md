# EXT:richtextinputfields

## About this extension

When working with complex designs often times there is the need for additional,
but very limited, formatting options for headlines, sublines and other fields
typically presented to the editor as "single input fields".
Solutions for these kinds of requirements often involve descriptions for the
editors, explaining how to manually add a line-break or format parts of a headline
with a bold font style.

While browsing the web we came across this excellent blog post by Daniel Siepmann:
https://daniel-siepmann.de/typo3-rte-for-input-fields.html
He explains an elegant solution to include a stripped down rich text editor for
these kinds of fields. After testing his solution we decided to create a small
single-purpose extension to easily add this configuration to multiple instances.

## Installation

Install using composer:

```
composer reg b13/richtextinputfields
```

## Usage

Use by adding rich text editors as usual to the fields. This extension brings a
very stripped down RTE configuration, but you're free to use your own.

```
'config' => [
    'type' => 'text',
    'rows' => 1,
    'max' => 255,
    'enableRichtext' => true,
    'richtextConfiguration' => 'minimal-input-field',
],
```

Set a `row` value to shrink the height of the rte window to "one line". Add a
`max` value to show a character count and enforce a maximal amount of characters
for the field.

## Credits

This extension is heavily inspired by Daniel Siepmanns aforementioned blog post and
was created by [b13 GmbH, Stuttgart](https://b13.com) for use in our projects.

[Find more TYPO3 extensions we have developed](https://b13.com/useful-typo3-extensions-from-b13-to-you) that help us deliver value in client projects. As part of the way we work, we focus on testing and best practices to ensure long-term performance, reliability, and results in all our code.

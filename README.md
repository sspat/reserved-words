# Php Reserved Words checker

[![Latest Version](https://img.shields.io/github/v/release/sspat/reserved-words)](https://github.com/sspat/reserved-words/releases)
[![Build](https://img.shields.io/travis/sspat/reserved-words/master)](https://travis-ci.org/sspat/reserved-words)
[![License](https://img.shields.io/github/license/sspat/reserved-words)](https://github.com/sspat/reserved-words/blob/master/LICENSE)
[![Email](https://img.shields.io/badge/email-studio22@mail.ru-blue.svg?style=flat-square)](mailto:studio22@mail.ru)

## About

This package allows checking strings for being a PHP reserved word and also the possibility of using
the string as a PHP namespace/class/interface/trait, function, method or constant name.

By default checks are performed for your current runtime PHP version, but you can specify any version to check against.

This can come in handy during code generation for example, when PHP code is generated based on some user input.

Reserved words in the PHP documentation:
- [List of Keywords](https://www.php.net/manual/en/reserved.keywords.php)
- [List of other reserved words](https://www.php.net/manual/en/reserved.other-reserved-words.php)


## Installation

```
composer require sspat/reserved-words
```

## Usage

```php
<?php

use sspat\ReservedWords\ReservedWords;

$reservedWords = new ReservedWords();
$word = 'list';

/**
 * Checks that the word is reserved in any PHP version.
 * It is still possible to use reserved words in php code in many places, but generally you should avoid it.
 * This method also returns true for words that are marked as "soft" reserved in the PHP docs and may
 * become reserved in future versions of the language.
 */
$isReserved = $reservedWords->isReserved($word);
/**
 * Checks that the word cannot be used as a constant name in your current php version.
 */
$cannotUseAsConstantName = $reservedWords->cannotUseAsConstantName($word);
/**
 * Checks that the word cannot be used as a namespace part or class/interface/trait name in your current php version.
 */
$cannotUseAsNamespaceName = $reservedWords->cannotUseAsNamespaceName($word);
/**
 * Checks that the word cannot be used as a function name in your current php version.
 */
$cannotUseAsFunctionName = $reservedWords->cannotUseAsFunctionName($word);
/**
 * Checks that the word cannot be used as a method name in your current php version.
 */
$cannotUseAsMethodName = $reservedWords->cannotUseAsMethodName($word);

/**
 * The following methods also accept a second parameter, to check against a PHP version different than your current runtime
 */
$cannotUseAsConstantName = $reservedWords->cannotUseAsConstantName($word, '5.6');
$cannotUseAsNamespaceName = $reservedWords->cannotUseAsNamespaceName($word, '5.6.1');
$cannotUseAsFunctionName = $reservedWords->cannotUseAsFunctionName($word, '7.0');
$cannotUseAsMethodName = $reservedWords->cannotUseAsMethodName($word, '7.4.2');
```

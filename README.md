# Php Reserved Words checker

[![Latest Version](https://img.shields.io/github/v/release/sspat/reserved-words)](https://github.com/sspat/reserved-words/releases)
[![Build](https://img.shields.io/travis/sspat/reserved-words/master)](https://travis-ci.org/sspat/reserved-words)
[![Mutation testing badge](https://img.shields.io/endpoint?style=flat&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2Fsspat%2Freserved-words%2Fmaster)](https://dashboard.stryker-mutator.io/reports/github.com/sspat/reserved-words/master)
[![Test Coverage](https://coveralls.io/repos/github/sspat/reserved-words/badge.svg?branch=master)](https://coveralls.io/github/sspat/reserved-words?branch=master)
[![Type Coverage](https://shepherd.dev/github/sspat/reserved-words/coverage.svg)](https://shepherd.dev/github/sspat/reserved-words)
[![License](https://img.shields.io/github/license/sspat/reserved-words)](https://github.com/sspat/reserved-words/blob/master/LICENSE)

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
$cannotUseAsConstantName = $reservedWords->isReservedConstantName($word);
/**
 * Checks that the word cannot be used as a namespace part in your current php version.
 * 
 * This is used for checking parts of namespaces, not full namespace strings.
 * E.g. calling this with `Some\Namespace\String` is incorrect, you should make three separate calls
 * with `Some`, `Namespace` and `String`.
 */
$cannotUseAsNamespaceName = $reservedWords->isReservedNamespaceName($word);
/**
 * Checks that the word cannot be used as a class/interface/trait name in your current php version.
 */
$cannotUseAsNamespaceName = $reservedWords->isReservedClassName($word);
/**
 * Checks that the word cannot be used as a function name in your current php version.
 */
$cannotUseAsFunctionName = $reservedWords->isReservedFunctionName($word);
/**
 * Checks that the word cannot be used as a method name in your current php version.
 */
$cannotUseAsMethodName = $reservedWords->isReservedMethodName($word);

/**
 * The following methods also accept a second parameter, to check against a PHP version different than your current runtime
 */
$cannotUseAsConstantName = $reservedWords->isReservedConstantName($word, '5.6');
$cannotUseAsNamespaceName = $reservedWords->isReservedNamespaceName($word, '5.6.1');
$cannotUseAsNamespaceName = $reservedWords->isReservedClassName($word, '5.6.1');
$cannotUseAsFunctionName = $reservedWords->isReservedFunctionName($word, '8.0');
$cannotUseAsMethodName = $reservedWords->isReservedMethodName($word, '7.4.2');
```

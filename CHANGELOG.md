### 3.0.0
* Added support for PHP 8.1 
* Added support for thecodingmachine/safe v2

### 2.0.0

* Added support for PHP 8.0
* BC Break: Dropped support of PHP 7.2
* BC Break: Added new keyword reserved in php 8 - `match`
* BC Break: Updated `mixed` keyword to reflect changes in php 8
* BC Break: Updated all keywords except `namespace` and `__halt_compiler` 
  to reflect that they can be used as namespace parts since php 8.0
* BC Break: Added new method `isReservedClassName` to check for reserved words in 
  class/trait/interface names. The method `isReservedNamespaceName` should
  be now used only for checking for reserved words in namespaces.
  These changes are necessary because php 8 changed the reserved words behavior for namespaces.
* Migrated CI to GitHub actions
* Added mutation testing
* Added phpstan static analysis

<?php

declare(strict_types=1);

namespace sspat\ReservedWords;

final class ReservedWordsList
{
    /**
     * Array keys represent the reserved words in php
     *
     * The nested array keys have the following meaning:
     * "constant" - whether the reserved word can be used as a constant name
     * "namespace" - whether the reserved word can be used as part of a namespace, class, interface or trait name.
     * "function" - whether the reserved word can be used as a function name
     * "method" - whether the reserved word can be used as a method name
     *
     * The nested array values have the following meaning:
     * "false" - can be used in any currently released php version
     * "5.1" - cannot be used since the specified php version until the latest currently released php version
     * "[5.1, 7.0]" - cannot be used from the specified lower php version up to the upper version, but excluding the upper version itself
     */
    public const PHP_RESERVED_WORDS = [
        '__halt_compiler' => [
            'constant' => ['5.1', '7.0'],
            'namespace' => '5.1',
            'function' => '5.1',
            'method' => ['5.1', '7.0'],
        ],
        'abstract' => [
            'constant' => ['5.0', '7.0'],
            'namespace' => '5.0',
            'function' => '5.0',
            'method' => ['5.0', '7.0'],
        ],
        'and' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'array' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'as' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'break' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'callable' => [
            'constant' => ['5.4', '7.0'],
            'namespace' => '5.4',
            'function' => '5.4',
            'method' => ['5.4', '7.0'],
        ],
        'case' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'catch' => [
            'constant' => ['5.0', '7.0'],
            'namespace' => '5.0',
            'function' => '5.0',
            'method' => ['5.0', '7.0'],
        ],
        'class' => [
            'constant' => '4.0',
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'clone' => [
            'constant' => ['5.0', '7.0'],
            'namespace' => '5.0',
            'function' => '5.0',
            'method' => ['5.0', '7.0'],
        ],
        'const' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'continue' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'declare' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'default' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'die' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'do' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'echo' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'else' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'elseif' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'empty' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'enddeclare' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'endfor' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'endforeach' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'endif' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'endswitch' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'endwhile' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'eval' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'exit' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'extends' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'final' => [
            'constant' => ['5.0', '7.0'],
            'namespace' => '5.0',
            'function' => '5.0',
            'method' => ['5.0', '7.0'],
        ],
        'finally' => [
            'constant' => ['5.5', '7.0'],
            'namespace' => '5.5',
            'function' => '5.5',
            'method' => ['5.5', '7.0'],
        ],
        'for' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'foreach' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'function' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'global' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'goto' => [
            'constant' => ['5.3', '7.0'],
            'namespace' => '5.3',
            'function' => '5.3',
            'method' => ['5.3', '7.0'],
        ],
        'if' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'implements' => [
            'constant' => ['5.0', '7.0'],
            'namespace' => '5.0',
            'function' => '5.0',
            'method' => ['5.0', '7.0'],
        ],
        'include' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'include_once' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'instanceof' => [
            'constant' => ['5.0', '7.0'],
            'namespace' => '5.0',
            'function' => '5.0',
            'method' => ['5.0', '7.0'],
        ],
        'insteadof' => [
            'constant' => ['5.4', '7.0'],
            'namespace' => '5.4',
            'function' => '5.4',
            'method' => ['5.4', '7.0'],
        ],
        'interface' => [
            'constant' => ['5.0', '7.0'],
            'namespace' => '5.0',
            'function' => '5.0',
            'method' => ['5.0', '7.0'],
        ],
        'isset' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'list' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'namespace' => [
            'constant' => ['5.3', '7.0'],
            'namespace' => '5.3',
            'function' => '5.3',
            'method' => ['5.3', '7.0'],
        ],
        'new' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'or' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'print' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'private' => [
            'constant' => ['5.0', '7.0'],
            'namespace' => '5.0',
            'function' => '5.0',
            'method' => ['5.0', '7.0'],
        ],
        'protected' => [
            'constant' => ['5.0', '7.0'],
            'namespace' => '5.0',
            'function' => '5.0',
            'method' => ['5.0', '7.0'],
        ],
        'public' => [
            'constant' => ['5.0', '7.0'],
            'namespace' => '5.0',
            'function' => '5.0',
            'method' => ['5.0', '7.0'],
        ],
        'require' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'require_once' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'return' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'static' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'switch' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'throw' => [
            'constant' => ['5.0', '7.0'],
            'namespace' => '5.0',
            'function' => '5.0',
            'method' => ['5.0', '7.0'],
        ],
        'trait' => [
            'constant' => ['5.4', '7.0'],
            'namespace' => '5.4',
            'function' => '5.4',
            'method' => ['5.4', '7.0'],
        ],
        'try' => [
            'constant' => ['5.0', '7.0'],
            'namespace' => '5.0',
            'function' => '5.0',
            'method' => ['5.0', '7.0'],
        ],
        'unset' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'use' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'var' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'while' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'xor' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        'yield' => [
            'constant' => ['5.5', '7.0'],
            'namespace' => '5.5',
            'function' => '5.5',
            'method' => ['5.5', '7.0'],
        ],
        '__class__' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        '__dir__' => [
            'constant' => ['5.3', '7.0'],
            'namespace' => '5.3',
            'function' => '5.3',
            'method' => ['5.3', '7.0'],
        ],
        '__file__' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        '__function__' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        '__line__' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        '__method__' => [
            'constant' => ['4.0', '7.0'],
            'namespace' => '4.0',
            'function' => '4.0',
            'method' => ['4.0', '7.0'],
        ],
        '__namespace__' => [
            'constant' => ['5.3', '7.0'],
            'namespace' => '5.3',
            'function' => '5.3',
            'method' => ['5.3', '7.0'],
        ],
        '__trait__' => [
            'constant' => ['5.4', '7.0'],
            'namespace' => '5.4',
            'function' => '5.4',
            'method' => ['5.4', '7.0'],
        ],
        'int' => [
            'constant' => false,
            'namespace' => '7.0',
            'function' => false,
            'method' => false,
        ],
        'float' => [
            'constant' => false,
            'namespace' => '7.0',
            'function' => false,
            'method' => false,
        ],
        'bool' => [
            'constant' => false,
            'namespace' => '7.0',
            'function' => false,
            'method' => false,
        ],
        'string' => [
            'constant' => false,
            'namespace' => '7.0',
            'function' => false,
            'method' => false,
        ],
        'true' => [
            'constant' => false,
            'namespace' => '7.0',
            'function' => false,
            'method' => false,
        ],
        'false' => [
            'constant' => false,
            'namespace' => '7.0',
            'function' => false,
            'method' => false,
        ],
        'null' => [
            'constant' => false,
            'namespace' => '7.0',
            'function' => false,
            'method' => false,
        ],
        'void' => [
            'constant' => false,
            'namespace' => '7.1',
            'function' => false,
            'method' => false,
        ],
        'iterable' => [
            'constant' => false,
            'namespace' => '7.1',
            'function' => false,
            'method' => false,
        ],
        'object' => [
            'constant' => false,
            'namespace' => '7.2',
            'function' => false,
            'method' => false,
        ],
        'resource' => [
            'constant' => false,
            'namespace' => false,
            'function' => false,
            'method' => false,
        ],
        'mixed' => [
            'constant' => false,
            'namespace' => false,
            'function' => false,
            'method' => false,
        ],
        'numeric' => [
            'constant' => false,
            'namespace' => false,
            'function' => false,
            'method' => false,
        ],
    ];
}

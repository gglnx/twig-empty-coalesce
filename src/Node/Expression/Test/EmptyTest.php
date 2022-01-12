<?php

/**
 * Twig Empty Coalesce
 *
 * @copyright 2022 Dennis Morhardt <info@dennismorhardt.de>
 * @license MIT License; see LICENSE file for details.
 */

namespace Gglnx\TwigEmptyCoalesce\Node\Expression\Test;

use Twig\Compiler;
use Twig\Node\Expression\TestExpression;

/**
 * Checks if node value is empty.
 *
 * @package Gglnx\TwigEmptyCoalesce\Node\Expression\Test
 */
class EmptyTest extends TestExpression
{
    /**
     * @inheritdoc
     */
    public function compile(Compiler $compiler): void
    {
        $compiler
            ->raw('twig_test_empty(')
            ->subcompile($this->getNode('node'))
            ->raw(')')
        ;
    }
}

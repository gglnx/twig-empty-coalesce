<?php

/**
 * Twig Empty Coalesce
 *
 * @copyright 2022 Dennis Morhardt <info@dennismorhardt.de>
 * @license MIT License; see LICENSE file for details.
 */

namespace Gglnx\TwigEmptyCoalesce\Node\Expression;

use Gglnx\TwigEmptyCoalesce\Node\Expression\Test\EmptyTest;
use InvalidArgumentException;
use Twig\Node\Expression\Binary\AndBinary;
use Twig\Node\Expression\ConditionalExpression;
use Twig\Node\Expression\Test\DefinedTest;
use Twig\Node\Expression\Unary\NotUnary;
use Twig\Node\Node;

/**
 * Empty Coalesce adds the ??? operator to Twig that will return the first thing
 * that is defined, not null, and not empty (as the `|default` filter).
 *
 * @package Gglnx\TwigEmptyCoalesce\Node\Expression
 */
class EmptyCoalesceExpression extends ConditionalExpression
{
    /**
     * Checks if left node is defined and not empty (checked using
     * `twig_test_empty`) and fallbacks to the right node.
     *
     * @param Node $left
     * @param Node $right
     * @param int $lineno
     * @return void
     * @throws InvalidArgumentException
     */
    public function __construct(Node $left, Node $right, int $lineno)
    {
        $test = new AndBinary(
            new DefinedTest(clone $left, 'defined', new Node(), $left->getTemplateLine()),
            new NotUnary(new EmptyTest($left, 'empty', new Node(), $left->getTemplateLine()), $left->getTemplateLine()),
            $left->getTemplateLine()
        );

        parent::__construct($test, $left, $right, $lineno);
    }
}

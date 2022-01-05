<?php

/**
 * Twig Empty Coalesce
 *
 * @copyright 2022 Dennis Morhardt <info@dennismorhardt.de>
 * @license MIT License; see LICENSE file for details.
 */

namespace Gglnx\TwigEmptyCoalesce\Extension;

use Gglnx\TwigEmptyCoalesce\Node\Expression\EmptyCoalesceExpression;
use Twig\ExpressionParser;
use Twig\Extension\AbstractExtension;

/**
 * This extension registers the empty coalesce operator.
 *
 * @author Dennis Morhardt <info@dennismorhardt.de>
 * @package Gglnx\TwigEmptyCoalesce\Extension
 */
class EmptyCoalesceExtension extends AbstractExtension
{
    /**
     * @inheritdoc
     */
    public function getOperators()
    {
        return [
            [],
            [
                '???' => [
                    'precedence' => 300,
                    'class' => EmptyCoalesceExpression::class,
                    'associativity' => ExpressionParser::OPERATOR_RIGHT
                ],
            ],
        ];
    }
}

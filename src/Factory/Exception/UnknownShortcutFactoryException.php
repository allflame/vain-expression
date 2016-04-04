<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 11:13 AM
 */

namespace Vain\Expression\Factory\Exception;

use Vain\Expression\Factory\FactoryInterface;

class UnknownShortcutFactoryException extends FactoryException
{
    /**
     * VainExpressionFactoryUnklnownShortcutException constructor.
     * @param FactoryInterface $expressionFactory
     * @param string $shortcut
     */
    public function __construct(
        FactoryInterface $expressionFactory,
        $shortcut
    ) {
        parent::__construct($expressionFactory, sprintf('Cannot create expression by unknown shortcut %s', $shortcut), 0, null);
    }
}
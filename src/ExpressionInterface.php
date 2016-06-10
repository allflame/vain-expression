<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 12:56 PM
 */

namespace Vain\Expression;

use Vain\Expression\Visitor\VisitableInterface;

interface ExpressionInterface extends VisitableInterface, \Serializable
{

}
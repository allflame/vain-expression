<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-expression
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-expression
 */
declare(strict_types = 1);

namespace Vain\Expression\Parser\Record\Operator\FunctionX;

use Vain\Expression\Parser\Record\Operator\AbstractOperatorParserRecord;
use Vain\Expression\Parser\Record\Visitor\VisitorInterface;

/**
 * Class FunctionOperatorParserRecord
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class FunctionOperatorParserRecord extends AbstractOperatorParserRecord
{
    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->functionX($this);
    }
}
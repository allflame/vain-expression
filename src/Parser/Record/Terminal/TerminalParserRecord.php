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
namespace Vain\Expression\Parser\Record\Terminal;

use Vain\Expression\Parser\Record\AbstractParserRecord;
use Vain\Expression\Parser\Record\Visitor\VisitorInterface;

/**
 * Class TerminalParserRecord
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class TerminalParserRecord extends AbstractParserRecord
{
    /**
     * @inheritDoc
     */
    public function accept(VisitorInterface $visitor)
    {
        return $visitor->terminal($this);
    }
}
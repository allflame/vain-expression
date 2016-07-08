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
namespace Vain\Expression\Parser\Record\Operator\Stack;

use Vain\Expression\Parser\Record\Operator\OperatorParserRecordInterface;

/**
 * Class ParserOperatorRecordStack
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 *
 * @method OperatorParserRecordInterface top
 * @method OperatorParserRecordInterface bottom
 * @method OperatorParserRecordInterface pop
 */
class ParserOperatorRecordStack extends \SplStack
{
}
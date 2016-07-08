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
namespace Vain\Expression\Exception;

use Vain\Expression\Parser\ParserInterface;
use Vain\Expression\Parser\Record\Operator\Bracket\BracketOperatorParserRecord;

/**
 * Class UnclosedBracketException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnclosedBracketException extends ParserException
{
    /**
     * InconsistentBracketException constructor.
     *
     * @param ParserInterface             $parser
     * @param BracketOperatorParserRecord $record
     */
    public function __construct(ParserInterface $parser, BracketOperatorParserRecord $record)
    {
        parent::__construct(
            $parser,
            sprintf('Encountered unclosed bracket %s at %d', $record->getToken()->getValue(), $record->getToken()->getCursor()),
            0,
            null
        );
    }
}
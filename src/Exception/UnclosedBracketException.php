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

namespace Vain\Expression\Exception;

use Vain\Expression\Parser\Algorithm\ParserAlgorithmInterface;
use Vain\Expression\Parser\Record\Operator\Bracket\BracketOperatorParserRecord;

/**
 * Class UnclosedBracketException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnclosedBracketException extends ParserAlgorithmException
{
    /**
     * InconsistentBracketException constructor.
     *
     * @param ParserAlgorithmInterface    $algorithm
     * @param BracketOperatorParserRecord $record
     */
    public function __construct(ParserAlgorithmInterface $algorithm, BracketOperatorParserRecord $record)
    {
        parent::__construct(
            $algorithm,
            sprintf(
                'Encountered unclosed bracket %s at %d',
                $record->getToken()->getValue(),
                $record->getToken()->getCursor()
            )
        );
    }
}

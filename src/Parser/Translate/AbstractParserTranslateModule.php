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
namespace Vain\Expression\Parser\Translate;

use Vain\Expression\Lexer\Token\Operator\OperatorToken;
use Vain\Expression\Parser\Record\Operator\Regular\RegularOperatorParserRecord;

/**
 * Class AbstractParserTranslateModule
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractParserTranslateModule implements ParserTranslateModuleInterface
{

    private $operators;

    private $functions;

    /**
     * AbstractParserTranslateModule constructor.
     *
     * @param array $operators
     * @param array $functions
     */
    public function __construct(array $operators = [], array $functions = [])
    {
        $this->operators = $operators;
        $this->functions = $functions;
    }

    /**
     * @inheritDoc
     */
    public function operator(OperatorToken $token)
    {
        $operator = $token->getValue();
        if (false === array_key_exists($operator, $this->operators)) {
            return null;
        }

        list ($precedence, $associativity) = $this->operators[$operator];

        return new RegularOperatorParserRecord($token, $precedence, $associativity);
    }
}
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

namespace Vain\Expression\Parser\Record;

use Vain\Expression\Lexer\Token\TokenInterface;
use Vain\Expression\Parser\Module\ParserModuleInterface;

/**
 * Class AbstractParserRecord
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractParserRecord implements ParserRecordInterface
{
    private $token;

    private $module;

    /**
     * AbstractOperatorRecord constructor.
     *
     * @param TokenInterface $token
     */
    public function __construct(TokenInterface $token)
    {
        $this->token = $token;
    }

    /**
     * @inheritDoc
     */
    public function getToken() : TokenInterface
    {
        return $this->token;
    }

    /**
     * @inheritDoc
     */
    public function getModule() : ParserModuleInterface
    {
        return $this->module;
    }

    /**
     * @inheritDoc
     */
    public function withModule(ParserModuleInterface $module) : ParserRecordInterface
    {
        $copy = clone $this;
        $copy->module = $module;

        return $copy;
    }
}

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
use Vain\Expression\Parser\Record\Visitor\VisitorInterface;

/**
 * Interface ParserRecordInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ParserRecordInterface
{
    /**
     * @return TokenInterface
     */
    public function getToken() : TokenInterface;

    /**
     * @return ParserModuleInterface
     */
    public function getModule() : ParserModuleInterface;

    /**
     * @param ParserModuleInterface $module
     *
     * @return ParserRecordInterface
     */
    public function withModule(ParserModuleInterface $module) : ParserRecordInterface;

    /**
     * @param VisitorInterface $visitor
     *
     * @return mixed
     */
    public function accept(VisitorInterface $visitor);
}

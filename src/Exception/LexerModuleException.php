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

use Vain\Core\Exception\AbstractCoreException;
use Vain\Expression\Lexer\Module\LexerModuleInterface;

/**
 * Class LexerModuleException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class LexerModuleException extends AbstractCoreException
{
    private $module;

    /**
     * LexerModuleException constructor.
     *
     * @param LexerModuleInterface $module
     * @param string               $message
     * @param int                  $code
     * @param \Exception|null      $previous
     */
    public function __construct(
        LexerModuleInterface $module,
        $message,
        $code,
        \Exception $previous = null
    ) {
        $this->module = $module;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return LexerModuleInterface
     */
    public function getModule()
    {
        return $this->module;
    }
}
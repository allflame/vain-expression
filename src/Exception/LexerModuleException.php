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
        string $message,
        int $code,
        \Exception $previous = null
    )
    {
        $this->module = $module;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return LexerModuleInterface
     */
    public function getModule() : LexerModuleInterface
    {
        return $this->module;
    }
}
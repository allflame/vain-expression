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

use Vain\Core\Exception\CoreException;
use Vain\Expression\Parser\Module\Process\ParserProcessModuleInterface;

/**
 * Class ProcessModuleException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ProcessModuleException extends CoreException
{
    private $processModule;

    /**
     * PrimaryProcessModuleException constructor.
     *
     * @param ParserProcessModuleInterface $process
     * @param string                       $message
     * @param int                          $code
     * @param \Exception|null              $previous
     */
    public function __construct(ParserProcessModuleInterface $process, $message, $code, \Exception $previous = null)
    {
        $this->processModule = $process;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return ParserProcessModuleInterface
     */
    public function getProcessModule()
    {
        return $this->processModule;
    }
}
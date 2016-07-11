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
use Vain\Expression\Parser\Algorithm\ParserAlgorithmInterface;

/**
 * Class ParserAlgorithmException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ParserAlgorithmException extends CoreException
{
    private $algorithm;

    /**
     * ParserAlgorithmException constructor.
     *
     * @param ParserAlgorithmInterface $algorithm
     * @param string                   $message
     * @param int                      $code
     * @param  \Exception              $previous
     */
    public function __construct(ParserAlgorithmInterface $algorithm, $message, $code, \Exception $previous = null)
    {
        $this->algorithm = $algorithm;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return ParserAlgorithmInterface
     */
    public function getAlgorithm()
    {
        return $this->algorithm;
    }
}
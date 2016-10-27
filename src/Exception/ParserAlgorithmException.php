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
use Vain\Expression\Parser\Algorithm\ParserAlgorithmInterface;

/**
 * Class ParserAlgorithmException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ParserAlgorithmException extends AbstractCoreException
{
    private $algorithm;

    /**
     * ParserAlgorithmException constructor.
     *
     * @param ParserAlgorithmInterface $algorithm
     * @param string                   $message
     * @param int                      $code
     * @param \Exception               $previous
     */
    public function __construct(
        ParserAlgorithmInterface $algorithm,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->algorithm = $algorithm;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return ParserAlgorithmInterface
     */
    public function getAlgorithm() : ParserAlgorithmInterface
    {
        return $this->algorithm;
    }
}
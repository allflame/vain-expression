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
use Vain\Expression\Parser\ParserInterface;

/**
 * Class ParserException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ParserException extends AbstractCoreException
{
    private $parser;

    /**
     * ParserException constructor.
     *
     * @param ParserInterface $parser
     * @param string          $message
     * @param int             $code
     * @param \Exception|null $previous
     */
    public function __construct(ParserInterface $parser, string $message, int $code = 500, \Exception $previous = null)
    {
        $this->parser = $parser;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return ParserInterface
     */
    public function getParser() : ParserInterface
    {
        return $this->parser;
    }
}

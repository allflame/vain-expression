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

namespace Vain\Expression\Boolean\Result\Factory;

use Vain\Expression\Boolean\Binary\AndX\AndExpression;
use Vain\Expression\Boolean\Binary\OrX\OrExpression;
use Vain\Expression\Boolean\Result\BooleanResult;
use Vain\Expression\Boolean\Result\BooleanResultInterface;
use Vain\Expression\Boolean\Unary\Identity\IdentityExpression;
use Vain\Expression\Boolean\Unary\Not\NotExpression;
use Vain\Expression\Boolean\ZeroAry\False\FalseExpression;
use Vain\Expression\Boolean\ZeroAry\True\TrueExpression;

/**
 * Class BooleanResultFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class BooleanResultFactory implements BooleanResultFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function false(FalseExpression $expression) : BooleanResultInterface
    {
        return new BooleanResult(false, $expression, new FalseExpression($this));
    }

    /**
     * @inheritDoc
     */
    public function true(TrueExpression $expression) : BooleanResultInterface
    {
        return new BooleanResult(true, $expression, new TrueExpression($this));
    }

    /**
     * @inheritDoc
     */
    public function id(IdentityExpression $expression, BooleanResultInterface $result) : BooleanResultInterface
    {
        return new BooleanResult($result->getStatus(), $expression, $result);
    }

    /**
     * @inheritDoc
     */
    public function not(NotExpression $expression, BooleanResultInterface $result) : BooleanResultInterface
    {
        return new BooleanResult($result->getStatus(), $expression, $result);
    }

    /**
     * @inheritDoc
     */
    public function andX(
        AndExpression $expression,
        BooleanResultInterface $firstResult,
        BooleanResultInterface $secondResult
    ) : BooleanResultInterface
    {
        return new BooleanResult(
            $firstResult->getStatus() && $secondResult->getStatus(),
            $expression,
            new AndExpression($firstResult, $secondResult, $this)
        );
    }

    /**
     * @inheritDoc
     */
    public function orX(
        OrExpression $expression,
        BooleanResultInterface $firstResult,
        BooleanResultInterface $secondResult
    ) : BooleanResultInterface
    {
        return new BooleanResult(
            $firstResult->getStatus() || $secondResult->getStatus(),
            $expression,
            new OrExpression($firstResult, $secondResult, $this)
        );
    }
}
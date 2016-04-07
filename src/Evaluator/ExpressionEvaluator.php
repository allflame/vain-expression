<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 10:07 PM
 */

namespace Vain\Expression\Evaluator;

use Vain\Comparator\Repository\ComparatorRepositoryInterface;
use Vain\Expression\Descriptor\DescriptorInterface;
use Vain\Expression\Evaluator\Exception\ModeMismatchExpressionEvaluatorException;

class ExpressionEvaluator implements ExpressionEvaluatorInterface
{
    private $comparatorRepository;

    /**
     * ExpressionEvaluator constructor.
     * @param ComparatorRepositoryInterface $comparatorRepository
     */
    public function __construct(ComparatorRepositoryInterface $comparatorRepository)
    {
        $this->comparatorRepository = $comparatorRepository;
    }

    /**
     * @inheritDoc
     */
    public function eq(DescriptorInterface $what, DescriptorInterface $against, \ArrayAccess $runtimeData = null)
    {
        $whatValue = $what->getValue($runtimeData);
        $againstValue = $against->getValue($runtimeData);
        if (($whatType = gettype($whatValue)) !== gettype($againstValue)) {
            throw new ModeMismatchExpressionEvaluatorException($this, $whatValue, $againstValue);
        }

        return $this->comparatorRepository->getComparator($whatType)->eq($whatValue, $againstValue);
    }

    /**
     * @inheritDoc
     */
    public function neq(DescriptorInterface $what, DescriptorInterface $against, \ArrayAccess $runtimeData = null)
    {
        $whatValue = $what->getValue($runtimeData);
        $againstValue = $against->getValue($runtimeData);
        if (($whatType = gettype($whatValue)) !== gettype($againstValue)) {
            throw new ModeMismatchExpressionEvaluatorException($this, $whatValue, $againstValue);
        }

        return $this->comparatorRepository->getComparator($whatType)->neq($whatValue, $againstValue);
    }

    /**
     * @inheritDoc
     */
    public function gt(DescriptorInterface $what, DescriptorInterface $against, \ArrayAccess $runtimeData = null)
    {
        $whatValue = $what->getValue($runtimeData);
        $againstValue = $against->getValue($runtimeData);
        if (($whatType = gettype($whatValue)) !== gettype($againstValue)) {
            throw new ModeMismatchExpressionEvaluatorException($this, $whatValue, $againstValue);
        }

        return $this->comparatorRepository->getComparator($whatType)->gt($whatValue, $againstValue);
    }

    /**
     * @inheritDoc
     */
    public function gte(DescriptorInterface $what, DescriptorInterface $against, \ArrayAccess $runtimeData = null)
    {
        $whatValue = $what->getValue($runtimeData);
        $againstValue = $against->getValue($runtimeData);
        if (($whatType = gettype($whatValue)) !== gettype($againstValue)) {
            throw new ModeMismatchExpressionEvaluatorException($this, $whatValue, $againstValue);
        }

        return $this->comparatorRepository->getComparator($whatType)->gte($whatValue, $againstValue);
    }

    /**
     * @inheritDoc
     */
    public function lt(DescriptorInterface $what, DescriptorInterface $against, \ArrayAccess $runtimeData = null)
    {
        $whatValue = $what->getValue($runtimeData);
        $againstValue = $against->getValue($runtimeData);
        if (($whatType = gettype($whatValue)) !== gettype($againstValue)) {
            throw new ModeMismatchExpressionEvaluatorException($this, $whatValue, $againstValue);
        }

        return $this->comparatorRepository->getComparator($whatType)->lt($whatValue, $againstValue);
    }

    /**
     * @inheritDoc
     */
    public function lte(DescriptorInterface $what, DescriptorInterface $against, \ArrayAccess $runtimeData = null)
    {
        $whatValue = $what->getValue($runtimeData);
        $againstValue = $against->getValue($runtimeData);
        if (($whatType = gettype($whatValue)) !== gettype($againstValue)) {
            throw new ModeMismatchExpressionEvaluatorException($this, $whatValue, $againstValue);
        }

        return $this->comparatorRepository->getComparator($whatType)->lte($whatValue, $againstValue);
    }

    /**
     * @inheritDoc
     */
    public function in(DescriptorInterface $what, DescriptorInterface $against, \ArrayAccess $runtimeData = null)
    {
        $whatValue = $what->getValue($runtimeData);
        $againstValue = $against->getValue($runtimeData);

        return $this->comparatorRepository->getComparator(gettype($whatValue))->in($whatValue, $againstValue);
    }

    /**
     * @inheritDoc
     */
    public function like(DescriptorInterface $what, DescriptorInterface $against, \ArrayAccess $runtimeData = null)
    {
        $whatValue = $what->getValue($runtimeData);
        $againstValue = $against->getValue($runtimeData);
        if (($whatType = gettype($whatValue)) !== gettype($againstValue)) {
            throw new ModeMismatchExpressionEvaluatorException($this, $whatValue, $againstValue);
        }

        return $this->comparatorRepository->getComparator($whatType)->like($whatValue, $againstValue);
    }
}
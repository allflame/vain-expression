<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 10:07 PM
 */

namespace Vain\Expression\Evaluator;

use Vain\Comparator\Repository\ComparatorRepositoryInterface;
use Vain\Data\Descriptor\DescriptorInterface;
use Vain\Data\Runtime\RuntimeData;
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
    public function eq(DescriptorInterface $what, DescriptorInterface $against, RuntimeData $runtimeData)
    {
        if ($what->getMode() !== $against->getMode()) {
            throw new ModeMismatchExpressionEvaluatorException($this, $what->getMode(), $against->getMode());
        }

        return $this->comparatorRepository->getComparator($what->getMode())->neq($what->getValue($runtimeData), $against->getValue($runtimeData));
    }

    /**
     * @inheritDoc
     */
    public function neq(DescriptorInterface $what, DescriptorInterface $against, RuntimeData $runtimeData)
    {
        if ($what->getMode() !== $against->getMode()) {
            throw new ModeMismatchExpressionEvaluatorException($this, $what->getMode(), $against->getMode());
        }

        return $this->comparatorRepository->getComparator($what->getMode())->neq($what->getValue($runtimeData), $against->getValue($runtimeData));
    }

    /**
     * @inheritDoc
     */
    public function gt(DescriptorInterface $what, DescriptorInterface $against, RuntimeData $runtimeData)
    {
        if ($what->getMode() !== $against->getMode()) {
            throw new ModeMismatchExpressionEvaluatorException($this, $what->getMode(), $against->getMode());
        }

        return $this->comparatorRepository->getComparator($what->getMode())->gt($what->getValue($runtimeData), $against->getValue($runtimeData));
    }

    /**
     * @inheritDoc
     */
    public function gte(DescriptorInterface $what, DescriptorInterface $against, RuntimeData $runtimeData)
    {
        if ($what->getMode() !== $against->getMode()) {
            throw new ModeMismatchExpressionEvaluatorException($this, $what->getMode(), $against->getMode());
        }

        return $this->comparatorRepository->getComparator($what->getMode())->gte($what->getValue($runtimeData), $against->getValue($runtimeData));
    }

    /**
     * @inheritDoc
     */
    public function lt(DescriptorInterface $what, DescriptorInterface $against, RuntimeData $runtimeData)
    {
        if ($what->getMode() !== $against->getMode()) {
            throw new ModeMismatchExpressionEvaluatorException($this, $what->getMode(), $against->getMode());
        }

        return $this->comparatorRepository->getComparator($what->getMode())->lt($what->getValue($runtimeData), $against->getValue($runtimeData));
    }

    /**
     * @inheritDoc
     */
    public function lte(DescriptorInterface $what, DescriptorInterface $against, RuntimeData $runtimeData)
    {
        if ($what->getMode() !== $against->getMode()) {
            throw new ModeMismatchExpressionEvaluatorException($this, $what->getMode(), $against->getMode());
        }

        return $this->comparatorRepository->getComparator($what->getMode())->lte($what->getValue($runtimeData), $against->getValue($runtimeData));
    }

    /**
     * @inheritDoc
     */
    public function in(DescriptorInterface $what, DescriptorInterface $against, RuntimeData $runtimeData)
    {
        if ($what->getMode() !== $against->getMode()) {
            throw new ModeMismatchExpressionEvaluatorException($this, $what->getMode(), $against->getMode());
        }

        return $this->comparatorRepository->getComparator($what->getMode())->in($what->getValue($runtimeData), $against->getValue($runtimeData));
    }

    /**
     * @inheritDoc
     */
    public function like(DescriptorInterface $what, DescriptorInterface $against, RuntimeData $runtimeData)
    {
        if ($what->getMode() !== $against->getMode()) {
            throw new ModeMismatchExpressionEvaluatorException($this, $what->getMode(), $against->getMode());
        }

        return $this->comparatorRepository->getComparator($what->getMode())->like($what->getValue($runtimeData), $against->getValue($runtimeData));
    }
}
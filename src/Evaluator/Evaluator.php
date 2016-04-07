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

class Evaluator implements EvaluatorInterface
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

        return $this->comparatorRepository->getComparator(gettype($whatValue))->eq($whatValue, $againstValue);
    }

    /**
     * @inheritDoc
     */
    public function neq(DescriptorInterface $what, DescriptorInterface $against, \ArrayAccess $runtimeData = null)
    {
        $whatValue = $what->getValue($runtimeData);
        $againstValue = $against->getValue($runtimeData);

        return $this->comparatorRepository->getComparator(gettype($whatValue))->neq($whatValue, $againstValue);
    }

    /**
     * @inheritDoc
     */
    public function gt(DescriptorInterface $what, DescriptorInterface $against, \ArrayAccess $runtimeData = null)
    {
        $whatValue = $what->getValue($runtimeData);
        $againstValue = $against->getValue($runtimeData);

        return $this->comparatorRepository->getComparator(gettype($whatValue))->gt($whatValue, $againstValue);
    }

    /**
     * @inheritDoc
     */
    public function gte(DescriptorInterface $what, DescriptorInterface $against, \ArrayAccess $runtimeData = null)
    {
        $whatValue = $what->getValue($runtimeData);
        $againstValue = $against->getValue($runtimeData);

        return $this->comparatorRepository->getComparator(gettype($whatValue))->gte($whatValue, $againstValue);
    }

    /**
     * @inheritDoc
     */
    public function lt(DescriptorInterface $what, DescriptorInterface $against, \ArrayAccess $runtimeData = null)
    {
        $whatValue = $what->getValue($runtimeData);
        $againstValue = $against->getValue($runtimeData);

        return $this->comparatorRepository->getComparator(gettype($whatValue))->lt($whatValue, $againstValue);
    }

    /**
     * @inheritDoc
     */
    public function lte(DescriptorInterface $what, DescriptorInterface $against, \ArrayAccess $runtimeData = null)
    {
        $whatValue = $what->getValue($runtimeData);
        $againstValue = $against->getValue($runtimeData);

        return $this->comparatorRepository->getComparator(gettype($whatValue))->lte($whatValue, $againstValue);
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

        return $this->comparatorRepository->getComparator(gettype($whatValue))->like($whatValue, $againstValue);
    }
}
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
use Vain\Data\Provider\DataProviderInterface;
use Vain\Data\Runtime\RuntimeData;

class ExpressionEvaluator implements ExpressionEvaluatorInterface
{
    private $comparatorRepository;

    private $dataProvider;

    /**
     * ExpressionEvaluator constructor.
     * @param ComparatorRepositoryInterface $comparatorRepository
     * @param DataProviderInterface $dataProvider
     */
    public function __construct(ComparatorRepositoryInterface $comparatorRepository, DataProviderInterface $dataProvider)
    {
        $this->comparatorRepository = $comparatorRepository;
        $this->dataProvider = $dataProvider;
    }

    /**
     * @inheritDoc
     */
    public function eq(DescriptorInterface $what, DescriptorInterface $against, RuntimeData $runtimeData)
    {
        return $this->comparatorRepository->getComparator($what->getMode())->eq($this->dataProvider->getData($what, $runtimeData), $this->dataProvider->getData($against, $runtimeData));
    }

    /**
     * @inheritDoc
     */
    public function neq(DescriptorInterface $what, DescriptorInterface $against, RuntimeData $runtimeData)
    {
        return $this->comparatorRepository->getComparator($what->getMode())->neq($this->dataProvider->getData($what, $runtimeData), $this->dataProvider->getData($against, $runtimeData));
    }

    /**
     * @inheritDoc
     */
    public function gt(DescriptorInterface $what, DescriptorInterface $against, RuntimeData $runtimeData)
    {
        return $this->comparatorRepository->getComparator($what->getMode())->gt($this->dataProvider->getData($what, $runtimeData), $this->dataProvider->getData($against, $runtimeData));
    }

    /**
     * @inheritDoc
     */
    public function gte(DescriptorInterface $what, DescriptorInterface $against, RuntimeData $runtimeData)
    {
        return $this->comparatorRepository->getComparator($what->getMode())->gte($this->dataProvider->getData($what, $runtimeData), $this->dataProvider->getData($against, $runtimeData));
    }

    /**
     * @inheritDoc
     */
    public function lt(DescriptorInterface $what, DescriptorInterface $against, RuntimeData $runtimeData)
    {
        return $this->comparatorRepository->getComparator($what->getMode())->lt($this->dataProvider->getData($what, $runtimeData), $this->dataProvider->getData($against, $runtimeData));
    }

    /**
     * @inheritDoc
     */
    public function lte(DescriptorInterface $what, DescriptorInterface $against, RuntimeData $runtimeData)
    {
        return $this->comparatorRepository->getComparator($what->getMode())->lte($this->dataProvider->getData($what, $runtimeData), $this->dataProvider->getData($against, $runtimeData));
    }

    /**
     * @inheritDoc
     */
    public function in(DescriptorInterface $what, DescriptorInterface $against, RuntimeData $runtimeData)
    {
        return $this->comparatorRepository->getComparator($what->getMode())->in($this->dataProvider->getData($what, $runtimeData), $this->dataProvider->getData($against, $runtimeData));
    }

    /**
     * @inheritDoc
     */
    public function like(DescriptorInterface $what, DescriptorInterface $against, RuntimeData $runtimeData)
    {
        return $this->comparatorRepository->getComparator($what->getMode())->like($this->dataProvider->getData($what, $runtimeData), $this->dataProvider->getData($against, $runtimeData));
    }
}
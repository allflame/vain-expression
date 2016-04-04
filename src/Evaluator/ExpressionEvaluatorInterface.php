<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 12:58 PM
 */

namespace Vain\Expression\Evaluator;

use Vain\Data\Descriptor\DescriptorInterface;
use Vain\Data\Runtime\RuntimeData;

interface ExpressionEvaluatorInterface
{
    /**
     * @param DescriptorInterface $what
     * @param DescriptorInterface $against
     * @param RuntimeData $runtimeData
     *
     * @return string
     */
    public function eq(DescriptorInterface $what, DescriptorInterface $against, RuntimeData $runtimeData);

    /**
     * @param DescriptorInterface $what
     * @param DescriptorInterface $against
     * @param RuntimeData $runtimeData
     *
     * @return string
     */
    public function neq(DescriptorInterface $what, DescriptorInterface $against, RuntimeData $runtimeData);

    /**
     * @param DescriptorInterface $what
     * @param DescriptorInterface $against
     * @param RuntimeData $runtimeData
     *
     * @return string
     */
    public function gt(DescriptorInterface $what, DescriptorInterface $against, RuntimeData $runtimeData);

    /**
     * @param DescriptorInterface $what
     * @param DescriptorInterface $against
     * @param RuntimeData $runtimeData
     *
     * @return string
     */
    public function gte(DescriptorInterface $what, DescriptorInterface $against, RuntimeData $runtimeData);

    /**
     * @param DescriptorInterface $what
     * @param DescriptorInterface $against
     * @param RuntimeData $runtimeData
     *
     * @return string
     */
    public function lt(DescriptorInterface $what, DescriptorInterface $against, RuntimeData $runtimeData);

    /**
     * @param DescriptorInterface $what
     * @param DescriptorInterface $against
     * @param RuntimeData $runtimeData
     *
     * @return string
     */
    public function lte(DescriptorInterface $what, DescriptorInterface $against, RuntimeData $runtimeData);

    /**
     * @param DescriptorInterface $what
     * @param DescriptorInterface $against
     * @param RuntimeData $runtimeData
     *
     * @return string
     */
    public function in(DescriptorInterface $what, DescriptorInterface $against, RuntimeData $runtimeData);

    /**
     * @param DescriptorInterface $what
     * @param DescriptorInterface $against
     * @param RuntimeData $runtimeData
     *
     * @return string
     */
    public function like(DescriptorInterface $what, DescriptorInterface $against, RuntimeData $runtimeData);
}
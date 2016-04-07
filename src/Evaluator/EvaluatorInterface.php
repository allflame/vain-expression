<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 12:58 PM
 */

namespace Vain\Expression\Evaluator;

use Vain\Expression\Descriptor\DescriptorInterface;

interface EvaluatorInterface
{
    /**
     * @param DescriptorInterface $what
     * @param DescriptorInterface $against
     * @param \ArrayAccess $runtimeData
     *
     * @return string
     */
    public function eq(DescriptorInterface $what, DescriptorInterface $against, \ArrayAccess $runtimeData = null);

    /**
     * @param DescriptorInterface $what
     * @param DescriptorInterface $against
     * @param \ArrayAccess $runtimeData
     *
     * @return string
     */
    public function neq(DescriptorInterface $what, DescriptorInterface $against, \ArrayAccess $runtimeData = null);

    /**
     * @param DescriptorInterface $what
     * @param DescriptorInterface $against
     * @param \ArrayAccess $runtimeData
     *
     * @return string
     */
    public function gt(DescriptorInterface $what, DescriptorInterface $against, \ArrayAccess $runtimeData = null);

    /**
     * @param DescriptorInterface $what
     * @param DescriptorInterface $against
     * @param \ArrayAccess $runtimeData
     *
     * @return string
     */
    public function gte(DescriptorInterface $what, DescriptorInterface $against, \ArrayAccess $runtimeData = null);

    /**
     * @param DescriptorInterface $what
     * @param DescriptorInterface $against
     * @param \ArrayAccess $runtimeData
     *
     * @return string
     */
    public function lt(DescriptorInterface $what, DescriptorInterface $against, \ArrayAccess $runtimeData = null);

    /**
     * @param DescriptorInterface $what
     * @param DescriptorInterface $against
     * @param \ArrayAccess $runtimeData
     *
     * @return string
     */
    public function lte(DescriptorInterface $what, DescriptorInterface $against, \ArrayAccess $runtimeData = null);

    /**
     * @param DescriptorInterface $what
     * @param DescriptorInterface $against
     * @param \ArrayAccess $runtimeData
     *
     * @return string
     */
    public function in(DescriptorInterface $what, DescriptorInterface $against, \ArrayAccess $runtimeData = null);

    /**
     * @param DescriptorInterface $what
     * @param DescriptorInterface $against
     * @param \ArrayAccess $runtimeData
     *
     * @return string
     */
    public function like(DescriptorInterface $what, DescriptorInterface $against, \ArrayAccess $runtimeData = null);
}
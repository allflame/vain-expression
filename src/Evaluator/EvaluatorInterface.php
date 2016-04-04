<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 12:58 PM
 */

namespace Vain\Expression\Evaluator;


interface EvaluatorInterface
{
    /**
     * @param mixed $what
     * @param mixed $against
     * @param string $type
     *
     * @return string
     */
    public function eq($what, $against, $type);

    /**
     * @param mixed $what
     * @param mixed $against
     * @param string $type
     *
     * @return string
     */
    public function neq($what, $against, $type);

    /**
     * @param mixed $what
     * @param mixed $against
     * @param string $type
     *
     * @return string
     */
    public function gt($what, $against, $type);

    /**
     * @param mixed $what
     * @param mixed $against
     * @param string $type
     *
     * @return string
     */
    public function gte($what, $against, $type);

    /**
     * @param mixed $what
     * @param mixed $against
     * @param string $type
     *
     * @return string
     */
    public function lt($what, $against, $type);

    /**
     * @param mixed $what
     * @param mixed $against
     * @param string $type
     *
     * @return string
     */
    public function lte($what, $against, $type);

    /**
     * @param mixed $what
     * @param mixed $against
     * @param string $type
     *
     * @return string
     */
    public function in($what, $against, $type);

    /**
     * @param mixed $what
     * @param mixed $against
     * @param string $type
     *
     * @return string
     */
    public function like($what, $against, $type);
}
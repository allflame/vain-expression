<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/13/16
 * Time: 10:55 AM
 */

namespace Vain\Expression\Result\Factory;

use Vain\Core\Result\ResultInterface;
use Vain\Expression\Result\ExpressionResultInterface;

interface ExpressionResultFactoryInterface
{
    /**
     * @param boolean $result
     *
     * @return ExpressionResultInterface
     */
    public function createZeroaryResult($result);

    /**
     * @param ResultInterface $result
     *
     * @return ExpressionResultInterface
     */
    public function createUnaryResult(ResultInterface $result);
    
    /**
     * @param ResultInterface $firstResult
     * @param ResultInterface $secondResult
     *
     * @return mixed
     */
    public function createBinaryResult(ResultInterface $firstResult, ResultInterface $secondResult);
}
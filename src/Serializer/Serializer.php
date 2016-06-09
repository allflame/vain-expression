<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 10:58 AM
 */

namespace Vain\Expression\Serializer;

use Vain\Data\Provider\Module\Repository\ModuleRepositoryInterface;
use Vain\Expression\Binary\AndX\AndExpression;
use Vain\Expression\NonTerminal\Equal\EqualExpression;
use Vain\Expression\NonTerminal\Greater\GreaterExpression;
use Vain\Expression\NonTerminal\GreaterOrEqual\GreaterOrEqualExpression;
use Vain\Expression\NonTerminal\In\InExpression;
use Vain\Expression\NonTerminal\Less\LessExpression;
use Vain\Expression\NonTerminal\LessOrEqual\LessOrEqualExpression;
use Vain\Expression\NonTerminal\Like\LikeExpression;
use Vain\Expression\NonTerminal\NotEqual\NotEqualExpression;
use Vain\Expression\Binary\OrX\OrExpression;
use Vain\Expression\Factory\ExpressionFactoryInterface;
use Vain\Expression\False\FalseExpression;
use Vain\Expression\Terminal\InPlace\InPlaceExpression;
use Vain\Expression\Terminal\Local\LocalExpression;
use Vain\Expression\Terminal\Module\ModuleExpression;
use Vain\Expression\True\TrueExpression;
use Vain\Expression\Terminal\Filter\FilterExpression;
use Vain\Expression\Terminal\FunctionX\FunctionExpression;
use Vain\Expression\Terminal\Helper\HelperExpression;
use Vain\Expression\Unary\Identity\IdentityExpression;
use Vain\Expression\Terminal\Method\MethodExpression;
use Vain\Expression\Terminal\Mode\ModeExpression;
use Vain\Expression\Unary\Not\NotExpression;
use Vain\Expression\Terminal\Property\PropertyExpression;

class Serializer implements SerializerInterface
{
    private $expressionFactory;

    private $moduleRepository;

    /**
     * VainExpressionSerializer constructor.
     * @param ExpressionFactoryInterface $expressionFactory
     * @param ModuleRepositoryInterface $moduleRepository
     */
    public function __construct(ExpressionFactoryInterface $expressionFactory, ModuleRepositoryInterface $moduleRepository)
    {
        $this->expressionFactory = $expressionFactory;
        $this->moduleRepository = $moduleRepository;
    }

    /**
     * @inheritDoc
     */
    public function true(TrueExpression $trueExpression)
    {
        return ['true', []];
    }

    /**
     * @inheritDoc
     */
    public function false(FalseExpression $falseExpression)
    {
        return ['false', []];
    }

    /**
     * @inheritDoc
     */
    public function local(LocalExpression $localExpression)
    {
        return ['local', []];
    }

    /**
     * @inheritDoc
     */
    public function inPlace(InPlaceExpression $inPlaceExpression)
    {
        return ['in_place', [serialize($inPlaceExpression->getValue())]];
    }

    /**
     * @inheritDoc
     */
    public function module(ModuleExpression $moduleExpression)
    {
        return ['module', [$moduleExpression->getModule()->__toString()]];
    }

    /**
     * @inheritDoc
     */
    public function id(IdentityExpression $identityExpression)
    {
        return ['id', [$identityExpression->getExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function not(NotExpression $notExpression)
    {
        return ['not', [$notExpression->getExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function method(MethodExpression $methodExpression)
    {
        return ['method', [$methodExpression->getMethod(), $methodExpression->getExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function property(PropertyExpression $propertyExpression)
    {
        return ['property', [$propertyExpression->getProperty(), $propertyExpression->getExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function functionX(FunctionExpression $functionExpression)
    {
        return ['function', [$functionExpression->getFunctionName(), json_encode($functionExpression->getArguments()), $functionExpression->getExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function mode(ModeExpression $modeExpression)
    {
        return ['mode', [$modeExpression->getMode(), $modeExpression->getExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function filter(FilterExpression $filterExpression)
    {
        return ['filter', [$filterExpression->getFilterExpression()->accept($this), $filterExpression->getExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function helper(HelperExpression $helperExpression)
    {
        return ['helper', [$helperExpression->getClass(), $helperExpression->getMethod(), json_encode($helperExpression->getArguments()), $helperExpression->getExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function eq(EqualExpression $equalExpression)
    {
        return ['eq', [$equalExpression->getFirstExpression()->accept($this), $equalExpression->getSecondExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function neq(NotEqualExpression $notEqualExpression)
    {
        return ['neq', [$notEqualExpression->getFirstExpression()->accept($this), $notEqualExpression->getSecondExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function gt(GreaterExpression $greaterExpression)
    {
        return ['gt', [$greaterExpression->getFirstExpression()->accept($this), $greaterExpression->getSecondExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function gte(GreaterOrEqualExpression $greaterOrEqualExpression)
    {
        return ['gte', [$greaterOrEqualExpression->getFirstExpression()->accept($this), $greaterOrEqualExpression->getSecondExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function lt(LessExpression $lessExpression)
    {
        return ['lt', [$lessExpression->getFirstExpression()->accept($this), $lessExpression->getSecondExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function lte(LessOrEqualExpression $lessOrEqualExpression)
    {
        return ['lte', [$lessOrEqualExpression->getFirstExpression()->accept($this), $lessOrEqualExpression->getSecondExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function in(InExpression $inExpression)
    {
        return ['in', [$inExpression->getFirstExpression()->accept($this), $inExpression->getSecondExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function like(LikeExpression $likeExpression)
    {
        return ['like', [$likeExpression->getFirstExpression()->accept($this), $likeExpression->getSecondExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function andX(AndExpression $andExpression)
    {
        return ['and', [$andExpression->getFirstExpression()->accept($this), $andExpression->getSecondExpression()->accept($this)]];
    }

    /**
     * @inheritDoc
     */
    public function orX(OrExpression $orExpression)
    {
        return ['or', [$orExpression->getFirstExpression()->accept($this), $orExpression->getSecondExpression()->accept($this)]];
    }


    /**
     * @inheritDoc
     */
    public function unserializeExpression(array $serializedData)
    {
        list ($type, $expressionData) = $serializedData;
        $expression = $this->expressionFactory->create($type);

        return $expression->unserialize($this, $expressionData);
    }

//    /**
//     * @inheritDoc
//     */
//    public function serializeDescriptor(DescriptorInterface $descriptor)
//    {
//        return $descriptor->serialize($this);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function unserializeDescriptor(array $serializedData)
//    {
//        list ($type, $descriptorData) = $serializedData;
//
//        switch ($type) {
//            case 'in_place':
//                return $this->descriptorFactory->inplace()->unserialize($this, $descriptorData);
//                break;
//            case 'local':
//                return $this->descriptorFactory->local();
//                break;
//            case 'module':
//                list ($moduleName) = $descriptorData;
//                return $this->descriptorFactory->module($moduleName);
//                break;
//            case 'property':
//                list ($property, $parentDescriptorData) = $descriptorData;
//                return $this->descriptorFactory->property($this->unserializeDescriptor($parentDescriptorData), $property);
//                break;
//            case 'method':
//                list ($method, $arguments, $parentDescriptorData) = $descriptorData;
//                return $this->descriptorFactory->method($this->unserializeDescriptor($parentDescriptorData), $method, $arguments);
//                break;
//            case 'mode':
//                list ($mode, $parentDescriptorData) = $descriptorData;
//                return $this->descriptorFactory->mode($this->unserializeDescriptor($parentDescriptorData), $mode);
//                break;
//            case 'function':
//                list ($function, $arguments, $parentDescriptorData) = $descriptorData;
//                return $this->descriptorFactory->func($this->unserializeDescriptor($parentDescriptorData), $function, $arguments);
//                break;
//            case 'filter':
//                list ($serializedExpression, $parentDescriptorData) = $descriptorData;
//                return $this->descriptorFactory->filter($this->unserializeDescriptor($parentDescriptorData), $this->unserializeExpression($serializedExpression));
//                break;
//            case 'helper':
//                list ($class, $method, $arguments, $parentDescriptorData) = $descriptorData;
//                return $this->descriptorFactory->helper($this->unserializeDescriptor($parentDescriptorData), $class, $method, $arguments);
//                break;
//            default:
//                throw new UnknownDescriptorException($this, $type);
//                break;
//        }
//    }
}
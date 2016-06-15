<?php
///**
// * Created by PhpStorm.
// * User: allflame
// * Date: 6/13/16
// * Time: 11:09 AM
// */
//
//namespace Vain\Expression\Interpreter;
//
//    /**
//     * @inheritDoc
//     */
//    public function inPlace(InPlaceExpression $inPlaceExpression)
//    {
//        return $inPlaceExpression->getValue();
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function module(ModuleExpression $moduleExpression)
//    {
//        return $this->moduleRepository->getModule($moduleExpression->getExpression()->accept($this))->getData($this->context);
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function context(ContextExpression $contextExpression)
//    {
//        return $this->context;
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function method(MethodExpression $methodExpression)
//    {
//        $data = $methodExpression->getExpression()->accept($this);
//        $method = $methodExpression->getMethod();
//
//        if (false === method_exists($data, $method)) {
//            throw new UnknownMethodException($this, $methodExpression);
//        }
//
//        return call_user_func([$data, $method], ...$methodExpression->getArguments());
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function property(PropertyExpression $propertyExpression)
//    {
//        $data = $propertyExpression->getExpression()->accept($this);
//        $property = $propertyExpression->getProperty();
//
//        switch(true) {
//            case is_array($data):
//                if (false === array_key_exists($property, $data)) {
//                    throw new UnknownPropertyException($this, $propertyExpression);
//                }
//                return $data[$property];
//                break;
//            case $data instanceof \ArrayAccess:
//                if (false === $data->offsetExists($property)) {
//                    throw new UnknownPropertyException($this, $propertyExpression);
//                }
//                return $data->offsetGet($property);
//                break;
//            case is_object($data):
//                return $data->{$property};
//                break;
//            default:
//                throw new InaccessiblePropertyException($this, $propertyExpression, $data);
//                break;
//        }
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function functionX(FunctionExpression $functionExpression)
//    {
//        $function = $functionExpression->getFunctionName();
//
//        if (false === function_exists($function)) {
//            throw new UnknownFunctionException($this, $functionExpression);
//        }
//
//        return call_user_func($function, $functionExpression->getExpression()->accept($this), ...$functionExpression->getArguments());
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function mode(ModeExpression $modeExpression)
//    {
//        $value = $modeExpression->getExpression()->accept($this);
//
//        switch ($modeExpression->getMode()) {
//            case 'int':
//                return (int)$value;
//                break;
//            case 'string':
//                return (string)$value;
//                break;
//            case 'float':
//            case 'double':
//                return (float)$value;
//                break;
//            case 'bool':
//            case 'boolean':
//                return (bool)$value;
//                break;
//            default:
//                return $value;
//        }
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function filter(FilterExpression $filterExpression)
//    {
//        $dataToFilter = $filterExpression->getExpression()->accept($this);
//
//        if (false === is_array($dataToFilter) && false === $dataToFilter instanceof \Traversable) {
//            throw new InaccessibleFilterException($this, $filterExpression->getExpression(), $dataToFilter);
//        }
//
//        $filteredData = [];
//        foreach ($dataToFilter as $singleElement) {
//            if (false === $filterExpression->getFilterExpression()->accept($this->withContext($singleElement))->getStatus()) {
//                continue;
//            }
//            $filteredData[] = $singleElement;
//        }
//
//        return $filteredData;
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function helper(HelperExpression $helperExpression)
//    {
//        $data = $helperExpression->getExpression()->accept($this);
//        $class = $helperExpression->getClass();
//        $method = $helperExpression->getMethod();
//
//        if (false === method_exists($class, $method)) {
//            throw new UnknownHelperException($this, $helperExpression);
//        }
//
//        return call_user_func([$class, $method], $data, ...$helperExpression->getArguments());
//    }
//
//    /**
//     * @inheritDoc
//     */
//    public function withContext(\ArrayAccess $context = null)
//    {
//        $clone = clone $this;
//        $clone->context = $context;
//
//        return $clone;
//    }
//}
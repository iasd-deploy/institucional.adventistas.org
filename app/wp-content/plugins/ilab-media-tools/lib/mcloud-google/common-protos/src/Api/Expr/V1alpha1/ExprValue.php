<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/api/expr/v1alpha1/eval.proto

namespace MediaCloud\Vendor\Google\Api\Expr\V1alpha1;
use MediaCloud\Vendor\Google\Protobuf\Internal\GPBType;
use MediaCloud\Vendor\Google\Protobuf\Internal\RepeatedField;
use MediaCloud\Vendor\Google\Protobuf\Internal\GPBUtil;

/**
 * The value of an evaluated expression.
 *
 * Generated from protobuf message <code>google.api.expr.v1alpha1.ExprValue</code>
 */
class ExprValue extends \MediaCloud\Vendor\Google\Protobuf\Internal\Message
{
    protected $kind;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \MediaCloud\Vendor\Google\Api\Expr\V1alpha1\Value $value
     *           A concrete value.
     *     @type \MediaCloud\Vendor\Google\Api\Expr\V1alpha1\ErrorSet $error
     *           The set of errors in the critical path of evalution.
     *           Only errors in the critical path are included. For example,
     *           `(<error1> || true) && <error2>` will only result in `<error2>`,
     *           while `<error1> || <error2>` will result in both `<error1>` and
     *           `<error2>`.
     *           Errors cause by the presence of other errors are not included in the
     *           set. For example `<error1>.foo`, `foo(<error1>)`, and `<error1> + 1` will
     *           only result in `<error1>`.
     *           Multiple errors *might* be included when evaluation could result
     *           in different errors. For example `<error1> + <error2>` and
     *           `foo(<error1>, <error2>)` may result in `<error1>`, `<error2>` or both.
     *           The exact subset of errors included for this case is unspecified and
     *           depends on the implementation details of the evaluator.
     *     @type \MediaCloud\Vendor\Google\Api\Expr\V1alpha1\UnknownSet $unknown
     *           The set of unknowns in the critical path of evaluation.
     *           Unknown behaves identically to Error with regards to propagation.
     *           Specifically, only unknowns in the critical path are included, unknowns
     *           caused by the presence of other unknowns are not included, and multiple
     *           unknowns *might* be included included when evaluation could result in
     *           different unknowns. For example:
     *               (<unknown[1]> || true) && <unknown[2]> -> <unknown[2]>
     *               <unknown[1]> || <unknown[2]> -> <unknown[1,2]>
     *               <unknown[1]>.foo -> <unknown[1]>
     *               foo(<unknown[1]>) -> <unknown[1]>
     *               <unknown[1]> + <unknown[2]> -> <unknown[1]> or <unknown[2[>
     *           Unknown takes precidence over Error in cases where a `Value` can short
     *           circuit the result:
     *               <error> || <unknown> -> <unknown>
     *               <error> && <unknown> -> <unknown>
     *           Errors take precidence in all other cases:
     *               <unknown> + <error> -> <error>
     *               foo(<unknown>, <error>) -> <error>
     * }
     */
    public function __construct($data = NULL) { \MediaCloud\Vendor\GPBMetadata\Google\Api\Expr\V1Alpha1\PBEval::initOnce();
        parent::__construct($data);
    }

    /**
     * A concrete value.
     *
     * Generated from protobuf field <code>.google.api.expr.v1alpha1.Value value = 1;</code>
     * @return \MediaCloud\Vendor\Google\Api\Expr\V1alpha1\Value
     */
    public function getValue()
    {
        return $this->readOneof(1);
    }

    /**
     * A concrete value.
     *
     * Generated from protobuf field <code>.google.api.expr.v1alpha1.Value value = 1;</code>
     * @param \MediaCloud\Vendor\Google\Api\Expr\V1alpha1\Value $var
     * @return $this
     */
    public function setValue($var)
    {
        GPBUtil::checkMessage($var, \MediaCloud\Vendor\Google\Api\Expr\V1alpha1\Value::class);
        $this->writeOneof(1, $var);

        return $this;
    }

    /**
     * The set of errors in the critical path of evalution.
     * Only errors in the critical path are included. For example,
     * `(<error1> || true) && <error2>` will only result in `<error2>`,
     * while `<error1> || <error2>` will result in both `<error1>` and
     * `<error2>`.
     * Errors cause by the presence of other errors are not included in the
     * set. For example `<error1>.foo`, `foo(<error1>)`, and `<error1> + 1` will
     * only result in `<error1>`.
     * Multiple errors *might* be included when evaluation could result
     * in different errors. For example `<error1> + <error2>` and
     * `foo(<error1>, <error2>)` may result in `<error1>`, `<error2>` or both.
     * The exact subset of errors included for this case is unspecified and
     * depends on the implementation details of the evaluator.
     *
     * Generated from protobuf field <code>.google.api.expr.v1alpha1.ErrorSet error = 2;</code>
     * @return \MediaCloud\Vendor\Google\Api\Expr\V1alpha1\ErrorSet
     */
    public function getError()
    {
        return $this->readOneof(2);
    }

    /**
     * The set of errors in the critical path of evalution.
     * Only errors in the critical path are included. For example,
     * `(<error1> || true) && <error2>` will only result in `<error2>`,
     * while `<error1> || <error2>` will result in both `<error1>` and
     * `<error2>`.
     * Errors cause by the presence of other errors are not included in the
     * set. For example `<error1>.foo`, `foo(<error1>)`, and `<error1> + 1` will
     * only result in `<error1>`.
     * Multiple errors *might* be included when evaluation could result
     * in different errors. For example `<error1> + <error2>` and
     * `foo(<error1>, <error2>)` may result in `<error1>`, `<error2>` or both.
     * The exact subset of errors included for this case is unspecified and
     * depends on the implementation details of the evaluator.
     *
     * Generated from protobuf field <code>.google.api.expr.v1alpha1.ErrorSet error = 2;</code>
     * @param \MediaCloud\Vendor\Google\Api\Expr\V1alpha1\ErrorSet $var
     * @return $this
     */
    public function setError($var)
    {
        GPBUtil::checkMessage($var, \MediaCloud\Vendor\Google\Api\Expr\V1alpha1\ErrorSet::class);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * The set of unknowns in the critical path of evaluation.
     * Unknown behaves identically to Error with regards to propagation.
     * Specifically, only unknowns in the critical path are included, unknowns
     * caused by the presence of other unknowns are not included, and multiple
     * unknowns *might* be included included when evaluation could result in
     * different unknowns. For example:
     *     (<unknown[1]> || true) && <unknown[2]> -> <unknown[2]>
     *     <unknown[1]> || <unknown[2]> -> <unknown[1,2]>
     *     <unknown[1]>.foo -> <unknown[1]>
     *     foo(<unknown[1]>) -> <unknown[1]>
     *     <unknown[1]> + <unknown[2]> -> <unknown[1]> or <unknown[2[>
     * Unknown takes precidence over Error in cases where a `Value` can short
     * circuit the result:
     *     <error> || <unknown> -> <unknown>
     *     <error> && <unknown> -> <unknown>
     * Errors take precidence in all other cases:
     *     <unknown> + <error> -> <error>
     *     foo(<unknown>, <error>) -> <error>
     *
     * Generated from protobuf field <code>.google.api.expr.v1alpha1.UnknownSet unknown = 3;</code>
     * @return \MediaCloud\Vendor\Google\Api\Expr\V1alpha1\UnknownSet
     */
    public function getUnknown()
    {
        return $this->readOneof(3);
    }

    /**
     * The set of unknowns in the critical path of evaluation.
     * Unknown behaves identically to Error with regards to propagation.
     * Specifically, only unknowns in the critical path are included, unknowns
     * caused by the presence of other unknowns are not included, and multiple
     * unknowns *might* be included included when evaluation could result in
     * different unknowns. For example:
     *     (<unknown[1]> || true) && <unknown[2]> -> <unknown[2]>
     *     <unknown[1]> || <unknown[2]> -> <unknown[1,2]>
     *     <unknown[1]>.foo -> <unknown[1]>
     *     foo(<unknown[1]>) -> <unknown[1]>
     *     <unknown[1]> + <unknown[2]> -> <unknown[1]> or <unknown[2[>
     * Unknown takes precidence over Error in cases where a `Value` can short
     * circuit the result:
     *     <error> || <unknown> -> <unknown>
     *     <error> && <unknown> -> <unknown>
     * Errors take precidence in all other cases:
     *     <unknown> + <error> -> <error>
     *     foo(<unknown>, <error>) -> <error>
     *
     * Generated from protobuf field <code>.google.api.expr.v1alpha1.UnknownSet unknown = 3;</code>
     * @param \MediaCloud\Vendor\Google\Api\Expr\V1alpha1\UnknownSet $var
     * @return $this
     */
    public function setUnknown($var)
    {
        GPBUtil::checkMessage($var, \MediaCloud\Vendor\Google\Api\Expr\V1alpha1\UnknownSet::class);
        $this->writeOneof(3, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getKind()
    {
        return $this->whichOneof("kind");
    }

}

<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/protobuf/wrappers.proto

namespace MediaCloud\Vendor\Google\Protobuf;
use MediaCloud\Vendor\Google\Protobuf\Internal\GPBType;
use MediaCloud\Vendor\Google\Protobuf\Internal\RepeatedField;
use MediaCloud\Vendor\Google\Protobuf\Internal\GPBUtil;

/**
 * Wrapper message for `uint64`.
 * The JSON representation for `UInt64Value` is JSON string.
 *
 * Generated from protobuf message <code>google.protobuf.UInt64Value</code>
 */
class UInt64Value extends \MediaCloud\Vendor\Google\Protobuf\Internal\Message
{
    /**
     * The uint64 value.
     *
     * Generated from protobuf field <code>uint64 value = 1;</code>
     */
    protected $value = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $value
     *           The uint64 value.
     * }
     */
    public function __construct($data = NULL) { \MediaCloud\Vendor\GPBMetadata\Google\Protobuf\Wrappers::initOnce();
        parent::__construct($data);
    }

    /**
     * The uint64 value.
     *
     * Generated from protobuf field <code>uint64 value = 1;</code>
     * @return int|string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * The uint64 value.
     *
     * Generated from protobuf field <code>uint64 value = 1;</code>
     * @param int|string $var
     * @return $this
     */
    public function setValue($var)
    {
        GPBUtil::checkUint64($var);
        $this->value = $var;

        return $this;
    }

}

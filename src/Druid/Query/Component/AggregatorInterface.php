<?php
/**
 * @author    jhrncar
 * @copyright PIXEL FEDERATION
 * @license   Internal use only
 */
namespace Druid\Query\Component;

/**
 * Interface AggregatorInterface.
 */
interface AggregatorInterface extends TypedInterface, ComponentInterface
{
    const TYPE_COUNT = 'count';
    const TYPE_LONG_SUM = 'longSum';
    const TYPE_DOUBLE_SUM = 'doubleSum';
    const TYPE_FILTERED = 'filtered';
    const TYPE_HYPER_UNIQUE = 'hyperUnique';
    const TYPE_DOUBLE_MIN = 'doubleMin';
    const TYPE_DOUBLE_MAX = 'doubleMax';
}
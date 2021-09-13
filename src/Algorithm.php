<?php

namespace Shiren\TAM;

/**
 * 通过算法关联关系
 */
class Algorithm
{
    /**
     * 根据天干索引转化为对应的五行索引
     * @param int $gi 天干索引
     * @return int
     */
    public static function g2e(int $gi): int
    {
        return (($gi - $gi % 2) / 2 + 1) % 5;
    }

    /**
     * 根据地支索引转化为对应的五行索引
     * @param int $zi 地支索引
     * @return int
     */
    public static function z2e(int $zi): int
    {
        return ($zi % 3) == 1 ? 3 : call_user_func(function ($y) {
            $t = (int)(($y + 1) / 3) % 4;
            return $t + (int)($t / 3);
        }, $zi);
    }

    /**
     * 根据两五行元素获取对应的五神关系索引
     * @param int $ie 月支五行
     * @param int $oe 其他五行
     * @return int
     */
    public static function spirit(int $ie, int $oe): int
    {
        return ((6 - $ie) % 5 + $oe) % 5;
    }

    /**
     * 格局是否是属于命强的局
     * @param int $spirit
     * @return bool
     */
    public static function strong(int $spirit): bool
    {
        return $spirit < 2;
    }

    /**
     * 五行相生
     * @param int $parent 五行元素主动生
     * @param int $child 五行元素被生
     * @return bool
     */
    public static function born(int $parent, int $child): bool
    {
        return ($parent + 1) % 5 == $child;
    }

    /**
     * 五行相克
     * @param int $active 五行元素主动方
     * @param int $passive 五行元素被动方
     * @return bool
     */
    public static function restrain(int $active, int $passive): bool
    {
        return ($active + 2) % 5 == $passive;
    }

    /**
     * 天干相合
     * @param int $a 合
     * @param int $b 被合
     * @return bool
     */
    public static function gh(int $a, int $b): bool
    {
        return $b - $a == 5;
    }

    /**
     * 天干相合
     * @param int $a 合
     * @param int $b 被合
     * @return bool
     */
    public static function gc(int $a, int $b): bool
    {
        return $b - $a == 6;
    }
    
    /**
     * 地支相合
     * @param int $a 合
     * @param int $b 被合
     * @return bool
     */
    public static function zh(int $a, int $b): bool
    {
        return (($a + $b) % 12 == 1) && (($a > $b) || (($b - $a) == 1));
    }

    /**
     * 地支相冲
     * @param int $a 冲
     * @param int $b 被冲
     * @return bool
     */
    public static function zc(int $a, int $b): bool
    {
        return ($b  - $a) == 6;
    }

    /**
     * 下一个天干索引
     * @param int $i
     * @return int
     */
    public static function nextG(int $i): int
    {
        return self::next($i, 10);
    }

    /**
     * 上一个天干索引
     * @param int $i
     * @return int
     */
    public static function prevG(int $i): int
    {
        return self::prev($i, 10);
    }

    /**
     * 下一个地支
     * @param int $i
     * @return int
     */
    public static function nextZ(int $i): int
    {
        return self::next($i, 12);
    }

    /**
     * 上一个地支
     * @param int $i
     * @return int
     */
    public static function prevZ(int $i): int
    {
        return self::prev($i, 12);
    }

    /**
     * 环形偏移下一个
     * @param int $current 当前
     * @param int $size 环形内数值个数
     * @return int
     */
    protected static function next(int $current, int $size): int
    {
        return ($current + 1) % $size;
    }

    /**
     * 环形偏移上一个
     * @param int $current 当前
     * @param int $size 环形内数值个数
     * @return int
     */
    protected static function prev(int $current, int $size): int
    {
        return ($current + $size - 1) % $size;
    }
}
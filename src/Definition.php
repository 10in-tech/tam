<?php

namespace Shiren\TAM;

/**
 * 基础定义
 */
class Definition
{
    /**
     * 阴阳(索引值为其常量)
     */
    const Opposite =  ['阴', '阳'];

    /**
     * 五行(索引值为其常量)
     */
    const Element = ['水', '木', '火', '土', '金'];

    /**
     * 天干(索引值为其常量)
     */
    const Gan = ['甲', '乙', '丙', '丁', '戊', '己', '庚', '辛', '壬', '癸'];

    /**
     * 天干对应五行(较少使用，使用算法解决)
     */
    const G2E = [1, 1, 2, 2, 3, 3, 4, 4, 0, 0];

    /**
     * 地支(索引值为其常量)
     */
    const Zhi = ['子', '丑', '寅', '卯', '辰', '巳', '午', '未', '申', '酉', '戌', '亥'];

    /**
     * 地支对应五行索引(较少使用，使用算法解决)
     */
    const Z2E = [0, 3, 1, 1, 3, 2, 2, 3, 4, 4, 3, 0];

    /**
     * 地支藏干
     * 第一个为本气(主气),第二个为中气,第三个为余气，
     */
    const ZwG = [
        [9], [5, 7, 9], [0, 2, 4], [1], [4, 1, 9], [2, 6, 4], [3, 5], [5, 3, 1], [6, 8, 4], [7], [4, 7, 3], [8, 0]
    ];

    /**
     * 五神(索引值为其常量)
     */
    const Spirits5 = ['印绶', '比肩', '伤官', '妻财', '官杀'];

    /**
     * 十神(索引值为其常量)
     */
    const Spirits10 = ['印', '卩', '劫', '比', '伤', '食', '财', '才', '官', '杀'];

    /**
     * 五神对应的君、臣、杂药的五神(帮扶五神的五神)
     */
    const SwH = [
        0 => [3, 2, 4],
        1 => [2, 4, 3],
        2 => [0, 1, 3],
        3 => [1, 0, 4],
        4 => [0, 1, 2]
    ];

    /**
     * 天干相合
     */
    const GH = ['甲己', '乙庚', '丙辛', '丁壬', '戊癸'];

    /**
     * 天干相冲
     */
    const GC = ['甲庚', '乙辛', '丙壬', '丁癸'];

    /**
     * 地支相合
     */
    const ZH = ['子丑', '寅亥', '卯戌', '辰酉', '巳申', '午未'];

    /**
     * 地支相冲
     */
    const ZC = ['子午', '丑未', '寅申', '卯酉', '辰戌', '巳亥'];

    /**
     * 柱的名称定义
     */
    const Columns = ['年', '月', '日', '时', '大运', '流年', '流月', '流日', '流时'];
}

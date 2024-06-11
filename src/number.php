<?php
namespace Yii\Helpers;

// 浮点数去除尾数0
function floatRtrimZero($number)
{
    if (is_numeric($number) && strpos($number, '.') !== false) {
        return filter_var($number, FILTER_VALIDATE_FLOAT);
    }

    return $number;
}

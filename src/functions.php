<?php

namespace Yii\Helpers;

use Adbar\Dot;
use Yii;

/**
 * @param string $class
 * @param array|null $params
 * @return object
 */
function make(string $class, array $params = null)
{
    $key = $class;
    if ($params !== null) {
        $key = sprintf('%s:%s', $class, md5(serialize($params)));
    }

    if (\Yii::$container->has($key)) {
        return \Yii::$container->get($key, $params);
    }

    if ($params == null) {
        $object = \Yii::createObject($class);
    } else {
        $object = \Yii::createObject($class, [$params]);
    }

    Yii::$container->setSingleton($key, $object);
    return $object;
}

/**
 * @param string $key
 * @param $default
 * @return mixed
 */
function config(string $key, $default = null)
{
    return make(Dot::class, Yii::$app->params)->get($key, $default);
}

/**
 * @param string $date
 * @param string $format
 * @return string
 * @throws \Exception
 */
function cnDate(string $date, string $format = 'Y-m-d H:i'): string
{
    $time = new \DateTime($date);
    if (ini_get('date.timezone') != 'Asia/Shanghai') {
        $time->setTimezone(new \DateTimeZone('Asia/Shanghai'));
    }

    return $time->format($format);
}

/**
 * @param string $date
 * @param string $format
 * @return string
 * @throws \Exception
 */
function ruDate(string $date, string $format = 'Y-m-d H:i'): string
{
    $time = new \DateTime($date);
    if (ini_get('date.timezone') != 'Europe/Moscow') {
        $time->setTimezone(new \DateTimeZone('Europe/Moscow'));
    }

    return $time->format($format);
}

/**
 * @param string $date
 * @param string $format
 * @return string
 */
function autoDate(string $date, string $format = 'Y-m-d H:i'): string
{
    if (Yii::$app->language == 'zh-CN') {
        return cnDate($date, $format);
    }

    return ruDate($date, $format);
}
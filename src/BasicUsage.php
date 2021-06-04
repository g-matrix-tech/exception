<?php

declare(strict_types=1);

namespace GMatrixTech\Exception;

/**
 * Class BasicUsageTest
 * @package Ms\Exception
 */
class BasicUsage
{
    /**
     * @param $type
     * @throws BaseException
     */
    public function run($type)
    {
        if ($type === 'array') {
            throw new BaseException([
                'currentService' => '',
                'code' => 0,
                'file' => dirname(__FILE__) . '/BasicUsage.php',
                'line' => 20,
                'message' => 'Basic Use as Array',
            ]);
        } elseif ($type === 'string') {
            throw new BaseException('Basic Use as String');
        }
    }
}

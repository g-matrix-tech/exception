<?php

declare(strict_types=1);

namespace Ms\Exception;

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
                'file' => '/Users/gegham/linux/code/Marketing_Solutions/library-exception/src/BasicUsage.php',
                'line' => 20,
                'message' => 'Basic Use as Array',
            ]);
        } elseif ($type === 'string') {
            throw new BaseException('Basic Use as String');
        }
    }
}

<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Ms\Exception\BasicUsage;
use Ms\Exception\BaseException;

class BasicUsageTest extends TestCase
{
    public function testExceptionArray()
    {
        $err_msg = json_encode([
            'currentService' => '',
            'code' => 0,
            'file' => '/Users/gegham/linux/code/Marketing_Solutions/library-exception/src/BasicUsage.php',
            'line' => 20,
            'message' => 'Basic Use as Array',
        ]);

        $this->expectException(BaseException::class);
        $this->expectErrorMessage($err_msg);

        $bu = new BasicUsage();
        $bu->run('array');
    }

    public function testExceptionString()
    {
        $err_msg = json_encode([
            'currentService' => '',
            'code' => 0,
            'file' => '/Users/gegham/linux/code/Marketing_Solutions/library-exception/src/BasicUsage.php',
            'line' => 28,
            'message' => 'Basic Use as String',
        ]);

        $this->expectException(BaseException::class);
        $this->expectErrorMessage($err_msg);

        $bu = new BasicUsage();
        $bu->run('string');
    }
}

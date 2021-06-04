<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use GMatrixTech\Exception\BasicUsage;
use GMatrixTech\Exception\BaseException;

class BasicUsageTest extends TestCase
{
    public function testExceptionArray()
    {
        $err_msg = json_encode([
            'currentService' => '',
            'code' => 0,
            'file' => $this->getBaseExceptionPath(),
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
            'file' => $this->getBaseExceptionPath(),
            'line' => 28,
            'message' => 'Basic Use as String',
        ]);

        $this->expectException(BaseException::class);
        $this->expectErrorMessage($err_msg);

        $bu = new BasicUsage();
        $bu->run('string');
    }

    private function getBaseExceptionPath(): string
    {
         return str_replace("tests/Unit","src", dirname(__FILE__)) . "/BasicUsage.php";
    }
}

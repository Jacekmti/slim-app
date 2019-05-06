<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use TDD\SampleClass;


class SampleTest extends TestCase
{
    public function testClassExists()
    {
        $class = new SampleClass();
        $this->assertTrue($class instanceof SampleClass);
    }
}
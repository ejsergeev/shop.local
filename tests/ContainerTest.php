<?php

namespace App\tests;

use App\core\Container;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{

  public function test__getConfigNoKey()
  {
    $config = include dirname(__DIR__) . '/config/Main.php';

    $container = new Container($config);

    $result = $container->__get('wrongName');

    $this->assertSame(null, $result);

  }

  public function test__getWithKey()
  {
    $config = include dirname(__DIR__) . '/config/Main.php';

    $container = new Container($config);

    $result = $container->__get('db');

    $this->assertIsObject($result);

  }

}

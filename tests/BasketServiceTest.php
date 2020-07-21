<?php

namespace App\tests;

use App\services\Request;
use App\services\BasketService;
use App\repositories\GoodRepository;
use PHPUnit\Framework\TestCase;
use App\entities\Good;



class BasketServiceTest extends TestCase
{

  public function testAddEmptyId()
  {
    $request = $this->getMockBuilder(Request::class)
      ->disableOriginalConstructor()
      ->getMock();

    $request->method('getId')
      ->willReturn(0);

    $goodRepository = $this->getMockBuilder(GoodRepository::class)
      ->disableOriginalConstructor()
      ->getMock();

    $basketService = new BasketService();
    $result = $basketService->add($request, $goodRepository);

    $this->assertFalse($result);

  }

  public function testAddEmptyGood()
  {
    $request = $this->getMockBuilder(Request::class)
      ->disableOriginalConstructor()
      ->getMock();

    $request->method('getId')
      ->willReturn(1);

    $goodRepository = $this->getMockBuilder(GoodRepository::class)
      ->disableOriginalConstructor()
      ->getMock();

      $goodRepository->method('getOneObj')
        ->willReturn(0);

    $basketService = new BasketService();
    $result = $basketService->add($request, $goodRepository);

    $this->assertFalse($result);

  }

  public function testAddEmptyGoodId()
  {
    $request = $this->getMockBuilder(Request::class)
      ->disableOriginalConstructor()
      ->getMock();

    $request->method('getId')
      ->willReturn(1);

    $goodRepository = $this->getMockBuilder(GoodRepository::class)
      ->disableOriginalConstructor()
      ->getMock();

      $good = $this->getMockBuilder(Good::class)
        ->disableOriginalConstructor()
        ->getMock();
      $good->id = 1;
      $good->good_name = 'Some Name';

      $goodRepository->method('getOneObj')
        ->willReturn($good);

      $request->method('getSession')
        ->willReturn([]);

    $basketService = new BasketService();
    $result = $basketService->add($request, $goodRepository);

    $this->assertTrue($result);

  }

  public function testAddNotEmptyGoodId()
  {
    $request = $this->getMockBuilder(Request::class)
      ->disableOriginalConstructor()
      ->getMock();

    $request->method('getId')
      ->willReturn(1);

    $goodRepository = $this->getMockBuilder(GoodRepository::class)
      ->disableOriginalConstructor()
      ->getMock();

      $good = $this->getMockBuilder(Good::class)
        ->disableOriginalConstructor()
        ->getMock();
      $good->id = 1;
      $good->good_name = 'Some Name';

      $goodRepository->method('getOneObj')
        ->willReturn($good);

      $request->method('getSession')
        ->willReturn(['1' => ['id' => 1, 'good' => 'Some', 'count' => 1]]);

    $basketService = new BasketService();
    $result = $basketService->add($request, $goodRepository);

    $this->assertTrue($result);
  }

}

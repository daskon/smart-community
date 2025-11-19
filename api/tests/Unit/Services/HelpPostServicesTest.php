<?php

namespace Tests\Unit\Services;

use App\HelpBoard\Interfaces\HelpPostInterface;
use App\HelpBoard\Services\HelpPostService;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class HelpPostServicesTest extends TestCase {

  protected $repository;
  protected $service;

  protected function setUp(): void
  {
    parent::setUp();

    $this->repository = $this->createMock(HelpPostInterface::class);
    $this->service = new HelpPostService($this->repository);
  }

  public function test_user_cannot_create_more_than_3_pending_help_request()
  {
      $this->repository->method('getPendingCountByUser')->willReturn(3);

      $this->expectException(ValidationException::class);
      $this->expectExceptionMessage('You already have 3 pending requests');

      $this->service->createHelpPost([
          'title' => 'Need Help for Water',
          'description' => 'Water pump is broken',
          'type' => 'help_request',
          'location' => 'Belwood State'
      ],1);
  }

  public function test_create_help_post_when_user_has_less_3_pending_post()
  {
    $this->repository->method('getPendingCountByUser')->willReturn(2);
    $this->repository->expects($this->once())
                     ->method('create')
                     ->willReturn(['id' => 1]);

    $data = [
      'title' => 'test title',
      'type' => 'help_request'
    ];
    $userId = 1;
    $result = $this->service->createHelpPost($data, $userId);

    $this->assertEquals(['id' => 1], $result);
  }
}
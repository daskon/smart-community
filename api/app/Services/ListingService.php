<?php

namespace App\Services;

use App\Events\ListingCreated;
use App\Interfaces\ListingRepositoryInterface;
use App\Models\Listing;
use App\Strategies\PricingStrategyInterface;
use App\Traits\LoggingTrait;

class ListingService {

  protected $listing;
  protected $pricing;
  public $loginfo;

  public function __construct(
      ListingRepositoryInterface $listingInt,
      PricingStrategyInterface $pricingInt,
      LoggingTrait $loginTrait
    )
  {
    $this->listing = $listingInt;
    $this->pricing = $pricingInt;
    $this->loginfo = $loginTrait;
  }

  public function createListing($data)
  {
    $this->loginfo->LogInfo('Listing Created', $data);
    return $this->listing->create($data);
  }

  public function getAllListing()
  {
    return $this->listing->list();
  }

  public function singleListing($id)
  {
    return $this->listing->find($id);
  }

  public function sendNotification(Listing $list)
  {
    event(new ListingCreated($list->title));
  }
}
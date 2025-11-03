<?php

namespace App\Interfaces;

use App\Models\Listing;

interface ListingRepositoryInterface {
  public function create(array $data);
  public function find($id);
  public function list();
  public function update(Listing $listing, array $data);
  public function delete(Listing $listing);
}
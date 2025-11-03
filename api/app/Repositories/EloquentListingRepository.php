<?php

namespace App\Repositories;

use App\Interfaces\ListingRepositoryInterface;
use App\Models\Listing;

class EloquentListingRepository implements ListingRepositoryInterface {

  public function create(array $data)
  {
    return Listing::create($data);
  }

  public function find($id)
  {
    return Listing::findOrFail($id);
  }

  public function list()
  {
    return Listing::all()->toArray();
  }

  public function update(Listing $listing, array $data)
  {
    return $listing->update($data);
  }

  public function delete(Listing $listing)
  {
    return $listing->delete();
  }
}
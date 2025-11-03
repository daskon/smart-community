<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;
use App\Http\Resources\ListingResource;
use App\Models\Listing;
use App\Services\ListingService;

class ListingController extends Controller
{
    public function __construct(private ListingService $listingService){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = $this->listingService->getAllListing();
        return ListingResource::collection($list);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreListingRequest $request)
    {
        $list = $this->listingService->createListing($request);
        return new ListingResource($list);
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        $data = $this->listingService->singleListing($listing->id);
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateListingRequest $request, Listing $listing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        //
    }
}

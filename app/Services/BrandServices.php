<?php

namespace App\Services;

use App\Http\Requests\BrandStoreRequest;
use App\Http\Requests\BrandUpdateRequest;
use App\Models\Brand;

class BrandServices
{

  public function list()
  {
    $brands = Brand::paginate();

    return $brands;
  }

  public function store(BrandStoreRequest $request) {
    //Save a new brand in db
    $brand = Brand::create($request->validated());

    return $brand;
  }

  public function update(BrandUpdateRequest $request,  Brand $brand) {
    //Update the brand
    $brand->update($request->validated());
    return $brand;
  }

  public function destroy(Brand $brand) {
    //Delete the brand
    $brand->delete();
  }
}

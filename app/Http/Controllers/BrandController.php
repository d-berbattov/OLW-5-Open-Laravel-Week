<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandStoreRequest;
use App\Http\Requests\BrandUpdateRequest;
use App\Models\Brand;
use App\Services\BrandServices;



class BrandController extends Controller
{

  public function __construct(protected BrandServices $brandServices)
  {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        \Illuminate\Support\Facades\Gate::authorize('viewAny', Brand::class);
        $brands = $this->brandServices->list();

        return response()->json($brands);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandStoreRequest $request)
    {
      \Illuminate\Support\Facades\Gate::authorize('create', Brand::class);
      $brand = $this->brandServices->store($request);

      return response()->json($brand);
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
      \Illuminate\Support\Facades\Gate::authorize('view', $brand);
        return response()->json($brand);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandUpdateRequest $request, Brand $brand)
    {
      $brand = $this->brandServices->update($request, $brand);
      \Illuminate\Support\Facades\Gate::authorize('update', $brand);
      return response()->json($brand);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
       $this->brandServices->destroy($brand);
      \Illuminate\Support\Facades\Gate::authorize('delete', $brand);
       return response()->json(["message" => "Brande deleted"]);
    }
}

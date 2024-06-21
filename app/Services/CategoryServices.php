<?php

namespace App\Services;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;

class CategoryServices
{

  public function list()
  {
    $categories = Category::paginate();

    return $categories;
  }

  public function store(CategoryStoreRequest $request) {
    //Save a new category in db
    $categories = Category::create($request->validated());

    return $categories;
  }

  public function update(CategoryUpdateRequest $request,  Category $categories) {
    //Update category
    $categories->update($request->validated());
    return $categories;
  }

  public function destroy(Category $categories) {
    //Delete category
    $categories->delete();
  }
}

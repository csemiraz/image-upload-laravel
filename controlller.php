    public function newCategory(Request $request)
    {
        $imageUrl = Category::categoryImage($request); 
        Category::storeCategory($request, $imageUrl);
        Toastr::success('Category info saved successfully', 'Success');
        return back();
    }

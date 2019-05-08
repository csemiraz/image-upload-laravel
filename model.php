class Category extends Model
{
    public static function categoryImage($request) {
        if($request->has('image')) {
            $categoryImage = $request->file('image');
            $originalName = $categoryImage->getClientOriginalName();
            $imagePath = "assets/images/category-images/";
            $imageName = time().'_'.$originalName;
            $imageUrl = $categoryImage->move($imagePath, $imageName);
            return $imageUrl;
        }
        else {
            $imageUrl = "assets/images/category-images/category.jpg";
            return $imageUrl;
        }

    }
    public static function storeCategory($request, $imageUrl)
    {
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->image = $imageUrl;
        $category->publication_status = $request->publication_status;
        $category->save();
    }



}

<?php
namespace App\Services;

use App\Models\Blog;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Support\Facades\Auth;
use Str;


class Services{
 

    function imageUpload($file, $folder){
        try {
            $ext = "." . strtolower($file->getClientOriginalExtension());
            $imageName = rand(1000, 9999) . time() . $ext;
            Storage::disk('public')->put($folder . $imageName, File::get($file));
            return $imageName;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    function imageDestroy($modelData,$folder){
        try{
            $old_file = $folder.$modelData;
            if (Storage::disk('public')->exists($old_file)) {
                Storage::disk('public')->delete($old_file);
            }
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    function categoryCreate($data,$file){
       try{
            $category = new Category;
            $category->category_name = $data['category_name'];
            $category->category_icon = $file;
            $category->save();
            return $category;
       }
       catch (\Exception $e) {
        return $e->getMessage();
       }
    }
    function categoryUpdate($category,$data,$file){
        try{
             $category->category_name = $data['category_name'];
             if($file){
                $category->category_icon = $this->imageUpload($file,'category_icon/');
             }
             
             $category->save();
             return $category;
        }
        catch (\Exception $e) {
         return $e->getMessage();
        }
     }
     function subCategoryCreate($data){
        try{
             $subCategory = new SubCategory;
             $subCategory->category_id = $data['category_id'];
             $subCategory->category_name = $data['category_name'];
             $subCategory->save();
             return $subCategory;
        }
        catch (\Exception $e) {
         return $e->getMessage();
        }
     }
     function subCategoryUpdate($subCategory,$data){
        try{
             $subCategory->category_id = $data['category_id'];
             $subCategory->category_name = $data['category_name'];
             $subCategory->save();
             return $subCategory;
        }
        catch (\Exception $e) {
         return $e->getMessage();
        }
     }
     function subSubCategoryCreate($data){
        try{
             $subSubCategory = new SubSubCategory;
             $subSubCategory->sub_category_id = $data['sub_category_id'];
             $subSubCategory->category_name = $data['category_name'];
             $subSubCategory->save();
             return $subSubCategory;
        }
        catch (\Exception $e) {
         return $e->getMessage();
        }
     }
     function subSubCategoryUpdate($subsubcategory,$data){
        try{
             $subsubcategory->sub_category_id = $data['sub_category_id'];
             $subsubcategory->category_name = $data['category_name'];
             $subsubcategory->save();
             return $subsubcategory;
        }
        catch (\Exception $e) {
         return $e->getMessage();
        }
     }
     function blogCreate($data,$file){
        try{
             $blog = new Blog;
             $blog->user_id = Auth::user()->id;
             $blog->category_id = $data['category_id'];
             $blog->sub_category_id = $data['sub_category_id'];
             $blog->sub_sub_category_id = $data['sub_sub_category_id'];
             $blog->title = $data['title'];
             $blog->image = $file;
             $blog->description = $data['description'];
             $blog->slug = Str::slug($data['title'],'-');
             $blog->save();
             return $blog;
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
     }
}
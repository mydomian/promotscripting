<?php
namespace App\Services;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Storage;
use File;

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
}
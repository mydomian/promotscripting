<?php
namespace App\Services;

use App\Models\Blog;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Tempfile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use ZipArchive;
use File;
use Str;
use DB;


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
    function categoryCreate($data,$file,$logo){
       try{
            $category = new Category;
            $category->category_name = $data['category_name'];
            $category->category_icon = $file;
            $category->logo = $logo;
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
  
     function blogCreate($data,$file){
        try{
             $blog = new Blog;
             $blog->user_id = Auth::user()->id;
             $blog->category_id = $data['category_id'];
             $blog->sub_category_id = $data['sub_category_id'];
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
     function blogUpdate($blog,$data,$file){
        try{
             $blog->category_id = $data['category_id'];
             $blog->sub_category_id = $data['sub_category_id'];
             $blog->title = $data['title'];
             $blog->description = $data['description'];
             $blog->slug = Str::slug($data['title'],'-');
             if($file){
                $blog->image = $this->imageUpload($file,'blog/');
             }
             
             $blog->save();
             return $blog;
        }
        catch (\Exception $e) {
         return $e->getMessage();
        }
     }

     function createFile($productImages,$product){
      Storage::deleteDirectory('public/zip');
     try{

           $fileName = rand(1000, 9999) . time().'_promptscriting.txt';
           
           $prompt_file = $product->prompt_file ? $product->prompt_file : $product->midjourney_text;
           
           Storage::put('public/zip/'.$fileName, $prompt_file);
           
           if(isset($productImages)){
              foreach($productImages as $productImage){
                 
                 $newPathWithName = 'public/zip/'.$productImage->images;
                 Storage::copy('public/products/'.$productImage->images , $newPathWithName); 
              }    
           }
           
           $zipFileName =  rand(1000, 9999) . time().'_promptscriting.zip';
           
           $imagesPath = public_path('storage/zip');
           
           $zipPath = storage_path('app/public/'.$zipFileName);
           $zip = new ZipArchive();
           if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
              $files = File::allFiles($imagesPath);
              
              foreach ($files as $file) {
                 // Add each file to the zip archive
                 $localPath = $file->getRelativePathname();
                 $zip->addFile($file->getPathname(), $localPath);
              }
     
              $zip->close();
              $this->tempfiles($product,$zipFileName);
              Response::download($zipPath, $zipFileName)->deleteFileAfterSend(true);
           } 
        Storage::deleteDirectory('public/zip');
     }
     catch (\Exception $e) {
      return $e->getMessage();
     }
  }

   function tempfiles($product,$zipFileName){
   
      try{
         $temfiles = new Tempfile;
         $temfiles->user_id = Auth::id();
         $temfiles->product_id = $product->id;
         $temfiles->zip_file = $zipFileName;
         $temfiles->save();
         return $temfiles;
      }
      catch (\Exception $e) {
         return $e->getMessage();
      }
      
   }

}
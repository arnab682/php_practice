<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Image;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class BannerController extends Controller
{
    public function index(){
        return view('backend.banner.index');
    }
    function BannerList(Request $request){
        try{
            $user_id=Auth::id();
            $rows= Banner::with('images')->get();
            //$rows= Contact::first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            // $request->validate([
            //     'title' => 'required|string|min:2',
            //     'short_description' => 'required|string|min:2',
            //     'image' => 'required',
            //     'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:200',
            // ],[
            //     'image.*.required' => 'Please upload an image only',
            //     'image.*.mimes' => 'Only jpeg, png, jpg, gif and svg images are allowed',
            //     'image.*.max' => 'Sorry! Maximum allowed size for an image is 200 kilobytes',
            // ]); 
            $validator = Validator::make($request->all(), ['image' => ['required', File::image()->max(2 * 1024)]]);
            if ($validator->fails()) return response()->json($validator->messages());
            //$image = new Image();
            $file = $request->file('image');
            $filename = uniqid() . "_" . $file->getClientOriginalName();
            $file->move(public_path('/uploads/images/banner/'), $filename);
            //$url = '/uploads/images/banner/' . $filename;
            //$image['url'] = $url;
            //$image->save();
            //return response()->json(['isSuccess' => true, 'url' => $url]);
                
             //$dataImage = $filename;
             $user_id=Auth::id();
            $banner = Banner::create([
                'title'=>$request->input('title'),
                'short_description'=>$request->input('short_description'),
                'created_by'=>$user_id
            ]);
            $banner->images()->create(['image' => $filename, 'created_by' => $user_id]);
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
            
            
//             return response()->json(['status' => 'success', 'message' =>$request->file('image')]);
// //DB::beginTransaction();
//              if($request->hasfile('image'))
//                 {
//                     foreach($request->file('image') as $image)
//                     {
// return response()->json(['status' => 'success', 'message' =>$image->getClientOriginalName()]);
//                         //get filename with extension
//                         $filenamewithextension = $image->getClientOriginalName();
                
//                         //get filename without extension
//                         $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                
//                         //get file extension
//                         $extension = $image->getClientOriginalExtension();
                
//                         //filename to store
//                         $filenametostore = $filename.'_'.time().'.'.$extension;
                
//                         //Upload File
//                         //$image->storeAs('public/profile_images', $filenametostore);
//                         $image->move(public_path().'/uploads/images/banner/', $filenametostore);

//                         //Resize image here
//                         $thumbnailpath = public_path('/uploads/images/banner/'.$filenametostore);
                        
//                         $img = Image::make($thumbnailpath)->resize(300, 280)->save($thumbnailpath);
//                         // (300, 280)

                
//                     $dataImage[] = $filenametostore;
                       
//                     }
//                 } else{
//                     return response()->json(['status' => 'failed', 'message' => 'No']);
//                 }




//             $user_id=Auth::id();
//             $banner = Banner::create([
//                 'title'=>$request->input('title'),
//                 'short_description'=>$request->input('short_description'),
//                 'created_by'=>$user_id
//             ]);
//             $banner->images()->create(['image' => json_encode($dataImage), 'created_by' => $user_id]);
//              DB::commit();
//             return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (QueryException $e){
            DB::rollBack();
            return response()->json(['status' => 'failed', 'message' => $e->getMessage()]);
        }
    }

    public function edit(Request $request)
    {
        try{    
            $contact_id=$request->input('id');
            $rows=Banner::where('id', $contact_id)->first();
            //$rows=Category::where('id',$category_id)->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|string|min:1',
                'address' => 'required|string|min:2',
                'email' => 'required|string|min:2',
                'phone' => 'required|string|min:2',
                //'google_map' => 'required|string|min:2'
            ]);

            $contact_id=$request->input('id');
            $updated_by=Auth::id();
            Banner::where('id',$contact_id)->update([
                'address'=>$request->input('address'),
                'email'=>$request->input('email'),
                'phone'=>$request->input('phone'),
                'google_map'=>$request->input('google_map'),
                //'updated_by'=>$updated_by,
            ]);
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);

        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


     public function destroy(Request $request)
    {
        try{
            $request->validate([
                'id' => 'required|string|min:1'
            ]);
            //$user_id=Auth::id();
            $banner_id=$request->input('id');
            $banner = Banner::where('id',$banner_id)->first();
                //return response()->json(['status' => 'success', 'message' => $banner->images[0]->image]);
            
           
                if($banner->images()){
                    $image_path = public_path() . '/uploads/images/banner/' . $banner->images[0]->image;
                    unlink($image_path);
                }
                
                $banner->delete();
                $banner->images()->delete();
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }
}

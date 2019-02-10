<?php

namespace Vdm\Http\Controllers;

use Illuminate\Http\Request;
use Vdm\Models\Project;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Vdm\Models\Image;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image as Img;

class ImageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function store(Request $request, $id)
    {
        $project = Project::find($id);

        if($request->file('img')){

            // returns Intervention\Image\Image
            $resize = Img::make($request->file('img'))->fit(300)->encode('jpg');

            // calculate md5 hash of encoded image
            $hash = md5($resize->__toString());

            // use hash as a name
            $path = "{$hash}.jpg";

            // save it locally to ~/public/images/{$hash}.jpg
            $resize->save(storage_path('app/images/'.$path));

            // $url = "/images/{$hash}.jpg"
            $url = "/" . $path;

            $imagen = new \Vdm\Models\Image([
                'path' => $path,
                'main' => 0
            ]);
            $project->images()->save($imagen);
        }

        return redirect()->back();
    }

    public function seeImage($file)
    {
        return Img::make(storage_path('app/images/'.$file))->response();
//        return response()->make(\Illuminate\Support\Facades\File::get(storage_path("app/images/".$file)),200)
//            ->header('Content-Type', 'image/jpg');
    }

    public function main($id, $model, $modelId)
    {
        $image = Image::find($id);

        $class = ($model != 'User')? 'Vdm\Models\\'.$model : 'Vdm\\'.$model;
        $object = $class::find($modelId);

        foreach($object->images as $img){
            $img->main = 0;
            $img->save();
        }

        $image->main = 1;
        $image->save();

        return redirect()->back();
    }

    public function deleteImage($id)
    {
        $image = Image::find($id);
        $path = $image->path;
        $image->delete();

        unlink(storage_path('app/images/'.$path));

        return redirect()->back()->with('ok', 'Imagen eliminada con éxito');
    }


    // Croppie

    public function saveJqueryImageUpload(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'profile_picture' => 'required|image|max:1000',
        ]);

        if ($validator->fails()) {

            return $validator->errors();
        }

        $status = "";

        if ($request->hasFile('profile_picture')) {

            $project = Project::find($id);

            // returns Intervention\Image\Image
            $resize = Img::make($request->file('profile_picture'))->fit(300)->encode('jpg');

            // calculate md5 hash of encoded image
            $hash = md5($resize->__toString());

            // use hash as a name
            $path = "{$hash}.jpg";

            // save it locally to ~/public/images/{$hash}.jpg
            $resize->save(storage_path('app/images/'.$path));

            // $url = "/images/{$hash}.jpg"
            $url = "/" . $path;

            $imagen = new \Vdm\Models\Image([
                'path' => $path,
                'main' => 0
            ]);
            $project->images()->save($imagen);

            $status = "uploaded";
        }

        return response($status,200);
    }


}

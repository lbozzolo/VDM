<?php

namespace Vdm\Http\Controllers;

use Illuminate\Http\Request;
use Vdm\Models\Project;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Vdm\Models\Image;

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
            $file = $request->file('img');
            $nombre = $file->getClientOriginalName();
            Storage::disk('local')->put($nombre,  File::get($file));

            $imagen = new \Vdm\Models\Image([
                'path' => $nombre,
                'main' => 0
            ]);
            $project->images()->save($imagen);
        }

        return redirect()->back();
    }

    public function seeImage($file)
    {
        return response()->make(\Illuminate\Support\Facades\File::get(storage_path("app/".$file)),200)
            ->header('Content-Type', 'image/jpg');
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
        $image->delete();

        return redirect()->back()->with('ok', 'Imagen eliminada con éxito');
    }


}

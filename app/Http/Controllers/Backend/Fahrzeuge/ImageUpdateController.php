<?php

namespace App\Http\Controllers\Backend\Fahrzeuge;

use App\Http\Controllers\Controller;
use App\Models\Backend\Fahrzeuge\Verkauf;
use App\Models\Fahrzeuge\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Yoeunes\Toastr\Facades\Toastr;

class ImageUpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    // Bilder bearbeiten und hinzufügen
    public function editImages(Verkauf $verkauf)
    {
        return view('backend.verkauf.images', compact('verkauf', $verkauf));
    }

    public function editImage(Images $images)
    {
        $vorschau = DB::table('fahrzeuges_verkauf')->where('images', '=', $images->images)->get();

        return view('backend.verkauf.image', compact('images', $images, 'vorschau', $vorschau));
    }

    public function updateImages(Request $request, Images $images, Verkauf $verkauf)
    {
        $image = $request->file('images');
        if (isset($image)) {
            $name = 'MwRKFZMietwerkstatt_'.uniqid().'_'.$image->getClientOriginalName();
            $nameToString = str_replace(' ', '_', $name);

            if (Storage::disk('public')->exists('fahrzeuge/'.$images->images)) {
                Storage::disk('public')->delete('fahrzeuge/'.$images->images);
            }

            $path = public_path('storage/fahrzeuge/'.$nameToString);
            $watermark = public_path('images/WatermarkRahmen.png');
            $fahrzeugImage = Image::make($image)->resize(640, 480, function ($constraint) {
                $constraint->aspectRatio();
            });
            $fahrzeugImage->insert($watermark, 'center');
            $fahrzeugImage->save($path);
        } else {
            $nameToString = $images->images;
        }

        $created_at = $images->created_at;

        if ($request->vorschau != $request->imagesvorschau) {
            $images->verkauf_id = $request->verkauf_id;
            $images->images = $nameToString;
            $images->created_at = $created_at;
            $images->updated_at = now();
            $images->save();
        } else {
            $images->verkauf_id = $request->verkauf_id;
            $images->images = $nameToString;
            $images->created_at = $created_at;
            $images->updated_at = now();
            $images->save();
            $verkaufen = DB::table('fahrzeuges_verkauf')->where('id', $request->input('verkauf_id'))->update(['images' => $nameToString, 'updated_at' => now()]);
        }

        Toastr::success('Bild erfolgreich geändert!', 'Erfolg');
        return redirect()->back();

    }

    public function addsImage(Request $request, Images $images)
    {
//        dd($request->all());

        $img = $request->hasFile('images');
        if (isset($img))
        {
            foreach ($request->file('images') as $image)
            {
                $name = 'MwRKFZMietwerkstatt_'.uniqid().'_'.$image->getClientOriginalName();
                $nameToString = str_replace(' ', '_', $name);

                if (!Storage::disk('public')->exists('fahrzeuge')) {
                    Storage::disk('public')->makeDirectory('fahrzeuge');
                }

                $path = public_path('storage/fahrzeuge/'.$nameToString);
                $watermark = public_path('images/WatermarkRahmen.png');
                $fahrzeugImage = Image::make($image)->resize(640, 480, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $fahrzeugImage->insert($watermark, 'center');
                $fahrzeugImage->save($path);
                $data[] = $nameToString;
            }
        }

        if (count($request->images) > 0) {
            foreach ($request->images as $item=>$v) {
                $bilder = array(
                    'verkauf_id'=>$request->verkauf_id,
                    'images'=>$data[$item],
                    'created_at'=>now(),
                    'updated_at'=>now(),
                );
                Images::insert($bilder);
//                dd($bilder);
            }
        }

        Toastr::success('Bild erfolgreich geändert!', 'Erfolg');
        return redirect()->back();
    }

    public function previewupdateImages(Request $request, Verkauf $verkauf, Images $images)
    {
//        $verkaufen->images = $request->images;
        $images->images = $request->images;
        $images->updated_at = now();
        $images->save();
        $verkauf = DB::table('fahrzeuges_verkauf')->where('id', $request->input('verkauf_id'))->update(['images' => $request->images, 'updated_at' => now()]);

        Toastr::success('Vorschaubild erfolgreich gesetzt!', 'Erfolgreich aktualisiert');
        return redirect()->back();
    }

    public function destroy(Images $images)
    {
        if (Storage::disk('public')->exists('fahrzeuge/'.$images->images)) {
            Storage::disk('public')->delete('fahrzeuge/'.$images->images);
        }
        $images->delete();
        Toastr::error('Bild wurde gelöscht!', 'Erfolgreich vernichtet');
        return redirect()->back();
    }
}

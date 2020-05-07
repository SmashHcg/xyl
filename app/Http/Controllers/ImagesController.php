<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Handlers\ImageUploadHandler;
use App\Http\Resources\ImageResource;

class ImagesController extends Controller
{
    public function store(Request $request, ImageUploadHandler $uploader, Image $image)
    {
        $user_id = $request->user_id;

        $result = $uploader->save($request->image, 'avatars', $user_id);
        if ($result) {
            $image->path = $result['path'];
            $image->type = $request->type;
            $image->user_id = $user_id;
            $image->save();
            DB::table('users')
            ->where('id', $user_id)
            ->update([
                'avatar'=> $result['path'],
            ]);
        }

        return new ImageResource($image);
    }
}

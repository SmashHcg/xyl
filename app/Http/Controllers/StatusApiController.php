<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Status;
use Auth;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\UserCollection;
use Illuminate\Support\Facades\Storage;

class StatusApiController extends Controller
{
    //动态发布
    public function store(Request $request)
    {
        $user_id = $request->input('user_id');
        $content = $request->input('content');

        $user = User::where('id', $user_id)->first();

        $user->statuses()->create([
            'content' => $content
        ]);

        return response()->json(['msg' => 'success']);
    }

    //动态展示
    public function show(Request $request)
    {
        $user_id = $request->input('user_id');
        $feed_items = [];
        $feed_items = User::where('id', $user_id)->first()->feed()->get();
        return response()->json($feed_items);
    }
}

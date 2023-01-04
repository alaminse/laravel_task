<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Validator;
use DataTables;
use App\Http\Resources\UserResource;

class ProfileController extends BaseController
{
    public function profile($id=null)
    {
        if($id == '')
        {
            $users = User::all();
            return response()->json(['users' => $users], 200);
        } else {
            $users = User::with('profile')->find($id);
            return response()->json(['users' => $users], 200);
        }
    }

    public function store(Request $request)
    {
        if($request->ismethod('post'))
        {
            // $data = $request->all();
            // return response()->json($data, 200);
            $profile = new Profile;
            $profile->user_id = $request->user_id;
            $profile->first_name = $request->first_name;
            $profile->last_name = $request->last_name;
            $profile->address = $request->address;

            // if ($request->file('image')) {
            //     $profile->image = $destinationPath.''.$profileImage;
            //     $destinationPath = 'public/profile/';
            //     $profileImage = date('YmdHis') . "." . $request->file('image')->getClientOriginalExtension();
            //     $request->file('image')->move($destinationPath, $profileImage);
            // }

            $profile->save();

            $message = "Profile Update Successfully";

            return response()->json($message, 201);
        }
    }
}

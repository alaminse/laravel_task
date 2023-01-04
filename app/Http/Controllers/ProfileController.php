<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Validator;
use DataTables;

class ProfileController extends Controller
{
    public function userList(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                            $btn = '<a href="' . route('user.details', $row->id) .'" class="edit btn btn-primary btn-sm">View</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('user.index');
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'address' => 'required|regex:/(^[A-Za-z0-9 ]+$)/',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
        ]);


        $profile = new Profile;
        $profile->user_id = Auth::user()->id;
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->address = $request->address;

        if ($request->file('image')) {
            $destinationPath = 'public/profile/';
            $profileImage = date('YmdHis') . "." . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move($destinationPath, $profileImage);
            $profile->image = $destinationPath.''.$profileImage;
        }
        if($profile->save())
        {
            return redirect()->route('user.profile')
                        ->withSuccess('Profile Complete Successfully.');
        } else {
            return redirect()->back()
                        ->withSuccess('something went wrong!! Try Again');
        }
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('user.show', compact('user'));
    }
    public function userDetails($id)
    {
        $user = User::with('profile')->find($id);
        return view('user.show', compact('user'));
    }

}

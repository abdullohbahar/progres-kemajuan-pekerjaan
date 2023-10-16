<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $userID = Auth::user()->id;

        $user = User::where('id', $userID)->firstOrfail();

        $data = [
            'user' => $user,
            'active' => ''
        ];

        return view('profile.index', $data);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $oldUser = User::where('id', $id)->firstOrfail();

        $saveData = [
            'username' => $request->username
        ];

        $request->validate([
            'username' => 'required'
        ]);

        if ($request->username != $oldUser->username) {
            $request->validate([
                'username' => 'unique:users'
            ]);
        }

        if ($request->photo) {
            $imageName = time() . '.' . $request->photo->getClientOriginalName();
            $request->photo->move(public_path('photo-profile'), $imageName);
            $saveData['photo'] = 'photo-profile/' . $imageName;
        }

        if ($request->password) {
            $saveData['password'] = Hash::make($request->password);
        }

        User::where('id', $id)->update($saveData);

        return redirect()->back()->with('success', 'Berhasil mengubah profile');
    }
}

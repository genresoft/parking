<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{

    public function index()
    {
        return view('admins.index', ['users' => User::get()]);

    }

    public function create()
    {
        return view('admins.create');
    }


    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $data = $request->all(); 

            $fileName = 'avatars/' . $data['user_id'] . '-' . $data['name'] . '.png';
            $path = $avatar->storeAs('', $fileName, 'public');

            if ($data['avatar'] !== null) {
                Storage::disk('public')->delete($data['avatar']);
            }

            $data['avatar'] = $path;

            User::where('id', $data['user_id'])->create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'avatar' => $data['avatar']
            ]);
        }

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->back()->with('success', 'User Created Successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admins.show');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admins.edit', compact('user'));
    }

    public function profile() {
        $userId = Auth::user()->id;
        $user = User::where('id', $userId)->first();

        return view('profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all();

        User::where('id', $data['user_id'])->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');

            $fileName = 'avatars/' . $data['user_id'] . '-' . $data['name'] . '.png';
            $path = $avatar->storeAs('', $fileName, 'public');

            if ($data['avatar'] !== null) {
                Storage::disk('public')->delete($data['avatar']);
            }

            $data['avatar'] = $path;

            User::where('id', $data['user_id'])->update([
                'avatar' => $data['avatar']
            ]);
        }

        return redirect()->back()->with('success', 'User Created Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User Deleted Successfully!!');
    }
}

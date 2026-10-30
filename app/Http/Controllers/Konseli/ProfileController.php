<?php

namespace App\Http\Controllers\Konseli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('konseli.profile.edit', ['user' => auth()->user()]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'school' => 'nullable|string|max:255',
            'class' => 'nullable|string|max:255',
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'school' => $request->school,
            'class' => $request->class,
            ...(($request->password) ? ['password' => Hash::make($request->password)] : []),
        ]);

        return back()->with('success', 'Profil berhasil diperbarui.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Http\Middleware\AdminMiddleware;

class ProfileController extends Controller
{
    
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = Auth::user();
    return view('profile.edit', compact('user')); // عرض صفحة التعديل
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = Auth::user();
    
        // التحقق من صحة البيانات
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'birthday' => 'nullable|date',
            'profile_picture' => 'nullable|image|max:2048',
            'about_me' => 'nullable|string|max:1000',
        ]);
    
        // تحديث البيانات
        $user->username = $request->username;
        $user->birthday = $request->birthday;
        $user->about_me = $request->about_me;
    
        // تحديث صورة الملف الشخصي
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }
    
        $user->save();
    
        return redirect()->route('profile.show', ['username' => $user->username])->with('success', 'Profile updated successfully!');
    }
    

    /**
     * Show the user's account.
     */
    public function show($username)
    {
        // البحث عن المستخدم بناءً على اسم المستخدم
        $user = User::where('username', $username)->firstOrFail();

        // عرض صفحة الملف الشخصي العام
        return view('profile.show', compact('user'));
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function search(Request $request)
    {
        // التحقق من وجود مصطلح البحث
        $request->validate([
            'query' => 'required|string|max:255',
        ]);
    
        // البحث عن المستخدمين بناءً على اسم المستخدم
        $query = $request->input('query');
        $users = User::where('username', 'LIKE', '%' . $query . '%')->get();
    
        if ($users->isEmpty()) {
            return view('profile.search-results', ['error' => 'No users found with this username.']);
        }
    
        // عرض النتائج إذا تم العثور على مستخدمين
        return view('profile.search-results', compact('users'));
    }
    
    
    
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    // عرض جميع المستخدمين
    public function index()
    {
        $users = User::all(); // الحصول على جميع المستخدمين
        return view('users.index', compact('users'));
    }

    // ترقية المستخدم إلى مسؤول
    public function makeAdmin(User $user)
    {
        $user->update(['is_admin' => true]); // تعيين المستخدم كمسؤول
        return back()->with('success', 'User has been promoted to admin.');
    }

    // تخفيض المستخدم إلى مستخدم عادي
    public function removeAdmin(User $user)
    {
        $user->update(['is_admin' => false]); // إلغاء صلاحيات المسؤول
        return back()->with('success', 'User has been demoted to regular user.');
    }

    public function create()
{
    return view('users.create');
}


public function store(Request $request)
{
    // التحقق من صحة البيانات
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
        'is_admin' => 'required|boolean',
    ]);

    // إنشاء المستخدم الجديد
    User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']), // تشفير كلمة المرور
        'is_admin' => $validated['is_admin'],
    ]);

    return redirect()->route('users.index')->with('success', 'User created successfully.');
}

}



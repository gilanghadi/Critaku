<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index(User $author)
    {
        return view('users.blog.author', [
            'blog' => $author->blog->load('category', 'author'),
        ]);
    }

    public function signin()
    {
        return view('users.login.signin');
    }

    public function register()
    {
        return view('users.login.register');
    }


    public function authenticate(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($validator, $request->remember)) {
            $request->session()->regenerateToken();
            return redirect()->intended('/dashboard')->with('success', '
            Login successed');
        }

        return back()->with('error', 'Sign in Failed, Check Your Email And Pass');
    }


    public function registerStore(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string',
            'username' => 'required|max:100|unique:users,username',
            'email' => 'required|email:rfc:dns||regex:/(.+)@(.+)\.(.+)/i',
            'password' => ['required', Password::min(8)->letters()->symbols()->mixedCase()->uncompromised()]
        ]);

        $validator['password'] = Hash::make($validator['password']);
        User::create($validator);
        if (User::count()) {
            return redirect()->route('signin.critaku')->with('success', 'registered success');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('blog.critaku');
    }

    public function updateProfile(Request $request, User $user, Image $image)
    {
        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'image' => 'required|max:5000',
            'password' => 'required'
        ]);

        if ($request->username !== $user->username) {
            $validator['username'] = $request->username;
        } else {
            $validator['username'] = 'required|unique:users,username';
        }

        if ($request->file('image')) {
            $image = public_path('storage/' . $image->url);
            if (File::exists($image)) {
                File::delete($image);
            };
            $validator['image'] = $request->file('image')->store('image/profile', 'public');
        }
        $image = $validator['image'];

        User::where('id', Auth::id())->update($validator);
        Image::where('imageable_id', '===', Auth::id())->update([
            'url' => $image,
            'imageable_id' => Auth::id(),
            'imageable_type' => 'App\User'
        ]);
        User::where('id', Auth::user()->id)->update($validator);
        return redirect()->route('profile.critaku')->with('success', 'Profile has been updated');
    }
}

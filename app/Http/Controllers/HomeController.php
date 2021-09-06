<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Support\Renderable|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function index()
    {
        if(auth()->user()->type == 'user'){
            if (auth()->user()->isVerified == 1 )
                return view('home');

        }elseif (auth()->user()->type == 'admin'){
            return redirect(route('admin'));
        }

        return redirect(route('index'));
    }

    public function my_profile(){
        $user = auth()->user();
        return view('backend.profile.my-profile', compact('user'));
    }
    public function profile_update(Request $request)
    {
        $user = User::query()->findOrFail(auth()->id());
        $data = $request->except('image', 'password');
        if ($request->password != null){
            $val = Validator::make($request->all(), [
                'password'     => ['string', 'min:6', 'confirmed', 'different:old_password'],
                'old_password' => ['required'],
            ]);
            if (Hash::check($request->old_password, $user->password)) {
                $data['password'] = bcrypt($request->password);
            }
            else
                return redirect()->back()->with('error', 'Old password was wrong.');
        }

        if ($request->hasFile('image')) {
            $img = $request->file("image");
            $image = uploadImage('profile/', $img[0]);
            $data['image'] =  $image;
            if ($user->image != null){
                unlink(public_path('storage/'.$user->image));
            }
        }

        $user->update($data);
        return redirect()->back()->with('success', 'Profile Information had been updated.');
    }
}

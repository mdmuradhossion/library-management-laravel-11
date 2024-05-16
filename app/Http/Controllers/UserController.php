<?php

namespace App\Http\Controllers;

use App\Library\Permission;
use App\Models\Issuedbook;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function __construct() {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        echo view('user.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {

        $user = User::where('id',Auth::user()->id)->first();
        echo view('user.profile',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function books()
    {
        $books = Issuedbook::where('studentID',Auth::user()->studentId)->get();
        echo view('user.books',compact('books'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function password()
    {
        $user = User::where('id',Auth::user()->id)->first();
        echo view('user.password',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function password_update(Request $request){
        if (Hash::check($request->cu_password, Auth::user()->password)){
            $validated = $request->validate([
                'password' => 'required|min:8',
                'confirmpassword' => 'required|min:8|same:password'
            ]);

            $data['password'] = Hash::make($request->cu_password);
            User::where('id',Auth::user()->id)->update($data);
            return redirect()->back()->with('message', 'Your password update successfully');

        }else{
            return redirect()->back()->withErrors(['message' => 'Current password does not match']);
        }
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
        $validated = $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|max:13',
            'email' => 'required|email',
        ]);

        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;

        User::where('id',Auth::user()->id)->update($data);

        return redirect()->back()->with('message', 'Your profile update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

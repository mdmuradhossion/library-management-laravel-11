<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Issuedbook;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::count();
        $issuedbook = Issuedbook::count();
        $issuedbookReturn = Issuedbook::where('retrunStatus','1')->count();
        $user = User::where('userType','user')->count();
        $authors = Author::count();
        $categories = Category::count();

        return view('admin.dashboard',compact('books','issuedbook','issuedbookReturn','user','authors','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function change_password(){
        return view('admin.admin_password');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function password(Request $request)
    {
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

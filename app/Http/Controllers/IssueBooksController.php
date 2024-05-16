<?php

namespace App\Http\Controllers;


use App\Models\Book;
use App\Models\Issuedbook;
use App\Models\User;
use Illuminate\Http\Request;

class IssueBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Issuedbook::orderBy('id', 'desc')->get();
        return view('admin.issueBooks.index',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $results = Issuedbook::all();
        return view('admin.issueBooks.create',compact('results'));
    }

    public function get_student(Request $request){
        $data = User::where('studentId',$request->studentid)->first();

        if (!empty($data)){
            if($data->status == '0' ){
                echo "<span style='color:red'> Student ID Blocked </span>"."<br />";
                echo "<b>Student Name-</b>" .$data->name;
            } else {
                echo htmlentities($data->name);
            }
        }else{
            echo "<span style='color:red'> Invalid Student Id. Please Enter Valid Student id .</span>";
        }

    }

    public function get_book(Request $request){
        $data = Book::where('isbnNumber',$request->bookid)->first();
        $view = '';
        if(!empty($data)) {
            $view .='<option value="'.htmlentities($data->id).'">'. htmlentities($data->bookName).'</option>';
        } else{
            $view .='<option class="others"> Invalid ISBN Number</option>';
        }
        print $view;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'studentid' => 'required|max:255',
            'bookid' => 'required',
        ]);
        $data = User::where('studentId',$request->studentid)->first();
        if (!empty($data)) {
            if($data->status != '0' ) {
                $dataBook = Book::where('isbnNumber',$request->bookid)->first();
                if(!empty($dataBook)) {
                    $table = new Issuedbook();
                    $table->bookId = $request->bookid;
                    $table->studentID = $request->studentid;
                    $table->issuesDate = date("Y-m-d H:i:s");
                    $table->save();
                    return redirect()->back()->with('message', 'Create data successfully');
                }else{
                    return redirect()->back()->withErrors(['message'=> 'Invalid ISBN Number']);
                }
            }else{
                return redirect()->back()->withErrors(['message'=> 'Student ID Blocked']);
            }
        }else{
            return redirect()->back()->withErrors(['message' => 'Invalid Student Id. Please Enter Valid Student id']);
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
        $result = Issuedbook::where('id',$id)->first();
        return view('admin.issueBooks.update',compact('result'));
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
        $request->validate([
            'fine' => 'required',
        ]);

        $data['fine'] = $request->fine;
        $data['retrunStatus'] = '1';
        $data['returnDate'] = date("Y-m-d H:i:s");

        Issuedbook::where('id',$request->id)->update($data);
        return redirect()->back()->with('message', 'Update data successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Issuedbook::where('id',$id)->delete();
        return redirect()->back()->with('message', 'Delete data successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Mail;



class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register.index');
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData=$request->validate([

            'name' => 'required',

            'acad_title' => 'required',

            'institution' => 'required',

            'email' => 'required',

            'name_of_all_authors' => 'required',

            'abstract_title' => 'required',

            'keywords' => 'required',

            'file' => 'required|mimes:doc,docx'


        ],[

            'name.required' => ' The Name field is required.',

            'acad_title.required' => ' The Academic title field is required.',

            'institution.required' => 'The Institution/Affiliation field is required.',

            'email.required' => ' The email field is required.',

            'name_of_all_authors.required' => ' The Name, Academic title, Institution/Affiliation (name all authors) field is required.',

            'abstract_title.required' => ' The Abstract title field is required.',

            'keywords.required' => ' The Keywords title field is required.',



        ]);


        $register = new Register;
        $register->name = $request->input('name');
        $register->acad_title = $request->input('acad_title');
        $register->institution = $request->input('institution');
        $register->email = $request->input('email');
        $register->name_of_all_authors = $request->input('name_of_all_authors');
        $register->abstract_title = $request->input('abstract_title');
        $register->keywords = $request->input('keywords');
        $register->enter_text = $request->input('enter_text');
        $file = Input::file('file');
        $path = 'uploads/';
        $file_name = $file->getClientOriginalName();
        $file->move($path , $file_name); 
        $register->abstract = $path . $file_name;


        if (isset($_POST['submit'])){
    
            
            $emails = ['your@mail.com'];

             Mail::send(['text'=>'new_abstract'],['name','hgi'],function($message) use ($emails){
             $message->to($emails)->subject('Poruka iz forme Register Abstract submission');
             $message->from('abstract@hgi.com','Abstract submission');
     });
             }

        $register->save();
        
        $url = "enter your web page";
        return 'Your Abstract registration apply has been received!. '.'<a href='.$url.'>Back to web page</a>' ;
        

        //povratak na novu stranicu s porukom ako neceu vracati na org. str.
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $register = DB::table('registers')->orderBy('id','desc')->get();

        return view('register.show')->with('register',$register);
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

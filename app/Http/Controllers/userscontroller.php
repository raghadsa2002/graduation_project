<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userview=users::latest()->paginate(5);
        return view('userview.index',copmact('userview'))
        ->with ('i',(request ()->input('page',1)-1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('userview.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
             'id'=>'required',
              'name'=>'required',
            'email'=>'required',
            'states'=>'required',
            ' phone'=>'required',
            'password'=>'required',
            'certificate'=>'required|image|mimes|:jpeg,png,jpg,gif,svg|max:2048',
        ]) ; 
        $input = $request->all();
        if($certificate= $request->file('image') ){
            $destinationpath='/images/';
            $profileImage =date('YmdHis').".".$image->getClientOrginalExtension();
            $certificate->move ($destinationpath ,$profileImage);
            $input['certificate']="$profileImage" ;
        }
        users::create($input);
        return redirect()->route('userview.index')
        -> with ('success','userview added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(users $users)
    {
        
        return view('userview.show',copmact('userview'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(users $users)
    {
        return view('userview.edit',copmact('userview'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, users $users)
    {
        $request->validate([
            'id'=>'required',
             'name'=>'required',
           'email'=>'required',
           'states'=>'required',
           ' phone'=>'required',
           'password'=>'required',
            
       ]) ; 
       $input = $request->all();
       if($certificate= $request->file('image') ){
           $destinationpath='/images/';
           $profileImage =date('YmdHis').".".$image->getClientOrginalExtension();
           $certificate->move ($destinationpath ,$profileImage);
           $input['certificate']="$profileImage" ;
       }else{
        unst($input['certificate']);
       }

        $users ->update($input);
       return redirect()->route('userview.index')->with('success','userview updated  successfully');
   }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(users $users)
    {
        $users->delete();
        return redirect()->route('userview.index')->with ('success','userview deleted successfully');
    }   

    

}
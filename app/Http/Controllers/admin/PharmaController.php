<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pharmacy;
class PharmaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pharmas=User::where('role',2);
        return view('auth.pharma')->with('pharmas',$pharmas);    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.addpharma');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'email'=>'required',
            'location'=>'required',
            'phone'=>'required',
            'password'=>'required',
            'certificate'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]); 
       if($request->hasFile('certificate')){
        $filenameWithExt=$request->file('certificate')->getClientOriginalName();//
        //get just file name
        $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
        //get just extention
        $extension=$request->file('certificate')->getClientOriginalExtension();
        //file name to store
        $filenameToStore=$filename.'_'.time().'.'.$extension;
        //upload image
        $path=$request->file('certificate')->storeAs('public/certificate',$filenameToStore);
    
    }
    
       $pharma= new User;
       $pharma->name=$request->input('name');
       $pharma->email=$request->input('email');
        $pharma->phone=$request->input('phone');
        $pharma->location=$request->input('location');
        $pharma->password=bcrypt($request->input('password'));
        $pharma->certificate=$filenameToStore;
        $pharma->role = 2;
        $pharma->save();
        return redirect('/auth/pharma')->with('success','pharam created');
     }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pharma=User::find($id);
        return view('auth.editpharma')->with('pharma',$pharma);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'username'=>'required',
            'email'=>'required',
            'location'=>'required',
            'phone'=>'required',
            'password'=>'required',
            'certificate'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]); 
       if($request->hasFile('certificate')){
        $filenameWithExt=$request->file('certificate')->getClientOriginalName();
        //get just file name
        $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
        //get just extention
        $extension=$request->file('certificate')->getClientOriginalExtension();
        //file name to store
        $filenameToStore=$filename.'_'.time().'.'.$extension;
        //upload image
        $path=$request->file('certificate')->storeAs('public/certificate',$filenameToStore);
    
    }
   
       $pharma=User::find($id);
       $pharma->name=$request->input('name');
       $pharma->email=$request->input('email');
        $pharma->phone=$request->input('phone');
        $pharma->location=$request->input('location');
        $pharma->password=bcrypt($request->input('password'));
        if($request->hasFile('certificate')){
            $pharma->certificate=$filenameToStore;}
        $pharma->save();
        return redirect('/auth/pharma')->with('success','pharam updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pharma=User::find($id);
        $pharma->delete();
        return redirect('/auth/pharma')->with('success','pharma deleted');
    }
    public function addpharmaAdmin(Request $request)
    {
        // Extract data from the request
        $formData = $request->all();
    
        // Create a new Pharmacy record
        $pharmacy = Pharmacy::create([
            'name' => $formData['name'],
            'phone' => $formData['number'],
            'email' => $formData['email'],
            'password' => $formData['password'],
            'location' => $formData['location'],
            'certificate' => $formData['certificate'],
            'user_id' => 1, // Assuming user is authenticated
        ]);
    
        // Handle success or error (optional)
        if ($pharmacy) {
            // Pharmacy created successfully
            return redirect()->route('pharam') // Replace 'pharam' with your actual route name
                ->with('success', 'Pharmacy added successfully!');
        } else {
            // Error creating pharmacy (handle appropriately)
            return redirect()->back()->withErrors(['error' => 'Failed to create pharmacy!']);
        }
    }
    
}

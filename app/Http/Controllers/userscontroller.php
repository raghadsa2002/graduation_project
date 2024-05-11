<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userview=User::latest()->paginate(5);
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
    public function loginAdmin(Request $request) {
        $request->validate([
                'username'=>'required',
                'password'=>'required',
       ]); 
        $input = $request->all();   
        $user = User::where('name',$input['username'])->where('password',Hash::make($input['password']))->first();
        // return var_dump($user);
        // if($user)
            return view('auth.dash');
        // else
            // return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
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
        // $input['role'] = 2; marah
        User::create($input);
        return redirect()->route('userview.index')
        -> with ('success','userview added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        
        return view('userview.show',copmact('userview'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('userview.edit',copmact('userview'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
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

        $users->update($input);
       return redirect()->route('userview.index')->with('success','userview updated  successfully');
   }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $users)
    {
        $users->delete();
        return redirect()->route('userview.index')->with('success','userview deleted successfully');
    }   
    public function getAllPharmas() {
        $users=User::where('role',2)->get(); // role 2 for pharams
        return view('auth.pharma',['pharams' => $users]);
    }

    public function getAllWarehouse() {
        $users=User::where('role',3)->get(); // role 3 for warehouses
        return view('auth.warehouse',['warehouses' => $users]);
    }
    public function updateviewwharehouse($id) {
        $users=User::where('id',$id)->get(); // role 3 for warehouses
        return view('auth.editpharma',['user' => $users]);
    }
    // User::where('id',3)->updat(['status'=>1]); to active
    // User::where('id',3)->updat(['status'=>0]); to archive

}
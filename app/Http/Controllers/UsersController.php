<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pharmacy;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userview = User::latest()->paginate(5);
        return view('userview.index', compact('userview'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('userview.create');
    }

    public function loginAdmin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $input = $request->all();
        $user = User::where('name', $input['username'])->first();
        
        if ($user && Hash::check($input['password'], $user->password)) {
            return view('auth.dash');
        } else {
            return view('auth.login');
        }
    }
    public function logout(Request $request)
    {
        (new AuthenticatedSessionController)->destroy($request);
        // Option 1: Redirect to Login Page
        return redirect()->route('login');

        // Option 2: Return JSON Response
        return response()->json([
            'message' => 'Successfully logged out!',
        ]);
        
    }



    public function addwarehousaAdmin(Request $request)
    {
            // Extract data from the request
            $formData = $request->all();
    
            // Create a new warehouses record
            $warehouses = Warehouse::create([
                'name' => $formData['name'],
                'phone' => $formData['number'],
                'email' => $formData['email'],
                'password' => $formData['password'],
                'user_id' => 1, // Assuming user is authenticated
            ]);
        
            if ($warehouses) {
                return redirect()->route('warehouse')
                    ->with('success', 'warehouse added successfully!');
            } else {
                return redirect()->back()->withErrors(['error' => 'Failed to create warehouse!']);
            }
    }
    


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'states' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'certificate' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();
        if ($certificate = $request->file('certificate')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $certificate->getClientOriginalExtension();
            $certificate->move($destinationPath, $profileImage);
            $input['certificate'] = $profileImage;
        }

        User::create($input);
        return redirect()->route('userview.index')
            ->with('success', 'userview added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('userview.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('userview.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'states' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ]);

        $input = $request->all();
        if ($certificate = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $certificate->getClientOriginalExtension();
            $certificate->move($destinationPath, $profileImage);
            $input['certificate'] = $profileImage;
        } else {
            unset($input['certificate']);
        }

        $user->update($input);
        return redirect()->route('userview.index')->with('success', 'userview updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('userview.index')->with('success', 'userview deleted successfully');
    }

    public function getAllPharmas()
    {
        $pharmacies = Pharmacy::all();
        //$users = User::where('role', 2)->get(); // role 2 for pharams
        return view('auth.pharma', ['pharmas' => $pharmacies]);
    }

    public function getAllWarehouse()
    {
        $warehouses = Warehouse::all(); // role 3 for warehouses
        return view('auth.warehouse', ['warehouses' => $warehouses]);
    }

    public function editPharamPage($id)
    {
        $pharmacy = Pharmacy::find($id);

        // Check if pharmacy exists
        if (!$pharmacy) {
            return abort(404); // Handle case where pharmacy is not found (optional)
        }
        //$user = User::findOrFail($id); // role 3 for warehouses
        return view('auth.editpharma', ['pharmacy' => $pharmacy]);
    }

    public function editpharmaAdmin(Request $request,$id)
    {
        $pharmacy = Pharmacy::find($id);

        //$validated = $this->validateRequest();
        $pharmacy->update(request()->all());
        //$user = User::findOrFail($id); // role 3 for warehouses
        return redirect()->route('pharam');
    }


    public function pharmacyArchive(Request $request,$id)
    {
        $pharmacy = Pharmacy::find($id);

        // Get the active status from the request (assuming a checkbox or hidden input)
        $isActive = request()->get('active', false); // Default to inactive if not provided
        print_r($isActive);
        // Update only the "active" attribute
        $pharmacy->update(['active' => $isActive]);

        // Redirect to success page or handle update logic
        return redirect()->route('pharam')->with('success', 'Pharmacy updated successfully!');
    }


    public function editwarehousePage(Request $request,$id)
    {
        $warehouse = Warehouse::find($id);

        // Check if pharmacy exists
        if (!$warehouse) {
            return abort(404); // Handle case where pharmacy is not found (optional)
        }
        //$user = User::findOrFail($id); // role 3 for warehouses
        return view('auth.editwarehouse', ['warehouse' => $warehouse]);
    }

    public function editwarehouseAdmin(Request $request,$id)
    {
        $Warehouse = Warehouse::find($id);

        $Warehouse->update(request()->all());

        return redirect()->route('warehouse');
    }

    public function warehouseArchive(Request $request,$id)
    {
        $Warehouse = Warehouse::find($id);

        $isActive = request()->get('active', false); 
        print_r($isActive);
        $Warehouse->update(['active' => $isActive]);

        return redirect()->route('warehouse')->with('success', 'Warehouse updated successfully!');
    }

}

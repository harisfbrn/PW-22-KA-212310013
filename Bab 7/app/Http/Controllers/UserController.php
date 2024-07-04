<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProductsRequest;
use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = Users::latest()->paginate(5);
        return view('users', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $users = new Users();
        if (!empty($request->id)) {
            $request->validate([
                'id' => 'required',
                'email' => 'required',
                'fullname' => 'required',
                'address' => 'required',
                'birthdate' => 'required',
                'gender' => 'required',
                'phone' => 'required',
            ]);

            $results = $users->updatedData($request->all());


            return redirect()->route('m_user')->with('success', ($results) ? 'User saved.' : 'User failed to be saved.');
        } else {
            $request->validate([
                'email' => 'required',
                'fullname' => 'required',
                'address' => 'required',
                'birthdate' => 'required',
                'gender' => 'required',
                'phone' => 'required',
            ]);

            $results = $users->storedData($request->all());

            return redirect()->route('m_user')->with('success', ($results) ? 'User created successfully.' : 'User failed save.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        // $users = new Users();
        // $data['user'] = $users->getByCondition(array('id'=>$request->id))->first();

        // return view('modules.praktikum-6.losers.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $users = new Users();
        $users = $users->getByCondition(array('id' => $request->id))->first();

        return json_encode($users);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $users = new Users();
        $results = $users->removeByCondition(array('id' => $request->id));

        return json_encode(array("message" => ($results) ? 'User deleted successfully' : 'User failed to remove'));
    }
}
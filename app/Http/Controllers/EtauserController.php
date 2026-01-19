<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\roles;
use Illuminate\Http\Request;

/**
 * Class EtauserController
 * @package App\Http\Controllers
 */
class EtauserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etausers = User::where('role_id', '!=', 1)->orderBy('id', 'Desc')->paginate();

        return view('etauser.index', compact('etausers'))
            ->with('i', (request()->input('page', 1) - 1) * $etausers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $etauser = new User();
        return view('etauser.create', compact('etauser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(User::$rules);

        $etauser = User::create($request->all());

        return redirect()->route('etausers.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $etauser = User::find($id);

        return view('etauser.show', compact('etauser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $etauser = User::find($id);

        return view('etauser.edit', compact('etauser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $etauser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $etauser)
    {
        $data= $request->all();
        $role=roles::find($data['role_id']);

        $etauser->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'role'=> $role!=null ? $role->role : 'User' ,
            'role_id'=>  $role!=null ? $role->id : 2 ,
            'eto_location_id'=> $data['eto_location_id'],
        ]);

        return redirect()->route('etausers.index')
            ->with('success', 'User updated successfully');
    }

    //ultrasoft changes
    /**
     * Show the form for changing user password
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function changePasswordForm($id)
    {
        // Check if current user is admin
        if (auth()->user()->role_id != 1) {
            return redirect()->route('etausers.index')
                ->with('error', 'Unauthorized action.');
        }

        $etauser = User::find($id);

        if (!$etauser) {
            return redirect()->route('etausers.index')
                ->with('error', 'User not found.');
        }

        return view('etauser.change-password', compact('etauser'));
    }

    /**
     * Change user password
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(Request $request, $id)
    {
        // Check if current user is admin
        if (auth()->user()->role_id != 1) {
            return redirect()->route('etausers.index')
                ->with('error', 'Unauthorized action.');
        }

        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        $etauser = User::find($id);

        if (!$etauser) {
            return redirect()->route('etausers.index')
                ->with('error', 'User not found.');
        }

        $etauser->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('etausers.index')
            ->with('success', 'Password changed successfully for ' . $etauser->name);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $etauser = User::find($id)->delete();

        return redirect()->route('etausers.index')
            ->with('success', 'User deleted successfully');
    }
}

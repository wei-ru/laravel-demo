<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct() {
         $this->middleware('auth', [
             'except'=>['index', 'show', 'create', 'store']
         ]);

         $this->middleware('guest', [
            'only'=>['create', 'store']
         ]);
     }

    public function index()
    {
        $users = User::paginate(5);
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name'=>'required|min:3',
            'email'=>'required|unique:users|email',
            'password'=>'required|min:5|confirmed'
        ]);

        $data['password'] = bcrypt($data['password']);
        User::create($data);
        $status = \Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        session()->flash('success', 'Sign up success!');
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $this->validate($request, [
            'name'=>'required|min:3',
            'password'=>'nullable|min:5|confirmed'
        ]);

        $user->name = $request->name;
        if($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        session()->flash('success', 'Modify success!');
        return redirect()->route('user.show', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
        session()->flash('success', 'Delete success!');
        return redirect()->route('user.index');
    }
}

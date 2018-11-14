<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        
        return view('users.index', [
            'users' => $users,
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $phrases = $user->phrases()->orderBy('created_at', 'asc')->paginate(10);
        $count_favorites = $user->favorites()->count();
        
        $data = [
            'user' => $user,
            'phrases' => $phrases,
            'count_favorites' => $count_favorites,
        ];
        
        $data += $this->counts($user);
        
        return view('users.show', $data);
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
        $user = User::find($id);
        $user->delete();
        return redirect('/');
    }
    
    public function delete_confirm()
    {
        return view('users.del_confirm');
    }
    
    public function favorites($id)
    {
        $user = User::find($id);
        $favorites = $user->favorites()->orderBy('created_at', 'desc')->paginate(10);
        $count_favorites = $user->favorites()->count();
        
        $data = [
            'user' => $user,
            'favorites' => $favorites,
            'count_favorites' => $count_favorites,
        ];
        
        $data += $this->counts($user);
        
        return view('users.favorites', $data);
    }
}

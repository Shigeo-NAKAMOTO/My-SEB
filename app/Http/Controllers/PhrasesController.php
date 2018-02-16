<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Phrase;

class PhrasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        if( \Auth::check() )
        {
            $user = \Auth::user();
            $phrases = $user->phrases()->orderBy('created_at', 'asc')->paginate(10);
            
            $target_item_index =  mt_rand(0, count($phrases) - 1);
            $random_phrase = $phrases[$target_item_index];
            
            $data = [
                'user' => $user,
                'random_phrase' => $random_phrase,
            ];
        }
        return view('phrases.index', $data);
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
        $this->validate($request, [
            'japanese' => 'required|max:255',
            'english' => 'required|max:255',
        ]);
        
        $request->user()->phrases()->create([
            'japanese' => $request->japanese,
            'english' => $request->english,
        ]);
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $phrase = Phrase::find($id);
        return view('phrases.show', [
            'phrase' => $phrase,    
        ]);
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
        $phrase = \App\Phrase::find($id);
        
        if( \Auth::user()->id === $phrase->user_id ) {
            $phrase->delete();
        }
        
        return redirect()->back();
    }
}

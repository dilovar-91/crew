<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \FFMpeg;
use App\Models\Interview;
use App\Models\User;
use App\Models\Invite;
use Illuminate\Support\Facades\Auth;

class SeamenController extends Controller
{
    
    public function __construct()
    {
        //$this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('seamen.index');
    }
    public function test(Request $request)
    {
        dd($request);
        return view('seamen.test');
    }
    public function invites(Request $request)
    {
        $user_id = Auth::user()->id;
        $invites = Invite::with(['user', 'interview', 'inviter'])->where('user_id', $user_id)->get()->all();
        //dd($invites);
        return view('seamen.invite_list')->with(array('invites'=>$invites));
    }
    
    public function aproveinvite($id)
    {
        //$request->user()->authorizeRoles('seamen');
        $invite = Invite::find($id);
        $invite->status = 1;
        $invite->save();
        return redirect()->route('seamen.invites');
    }
    public function declineinvite($id)
    {
        //$request->user()->authorizeRoles('seamen');
        $invite = Invite::find($id);
        $invite->status = 2;
        $invite->save();
        return redirect()->route('seamen.invites');
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
        //
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

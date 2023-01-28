<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_club, $id_team)
    {
        echo "PlayerController - index - id_club=".$id_club." id_team=".$id_team."<br>";
        die;
        // ... clubs/2/teams/3/players
        // ... clubs/{club}/teams{team}/players
        $fieldsetTeam = Team::select("*")->where('id','=',$id_team);
        $recordsetPlayers = Player::select("*")->where('team_id','=',$id_team)->get()->sortByDesc('name');
        if (count($recordsetPlayers) == 0) {
            echo "no hi ha registres";
            return view('team.edit')->with('team',$fieldsetTeam);
        }else{
            return view('player.index', compact('recordsetPlayers','id_club'));
        }
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

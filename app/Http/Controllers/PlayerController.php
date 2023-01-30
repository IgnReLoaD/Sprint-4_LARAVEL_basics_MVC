<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Team;
use App\Models\Player;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_club, $id_team)
    {
        //echo "PlayerController - index - id_club=".$id_club." id_team=".$id_team."<br>";
        // die;
        $fieldsetClub = Club::select("*")->where('id','=',$id_club);        
        $fieldsetTeam = Team::select("*")->where('id','=',$id_team);
        // per quan tornem enrere a Fitxa Team necessitem nomenclatura objClub i objTeam
        // $objClub = $fieldsetClub;
        // $objTeam = $fieldsetTeam;

        $recordsetPlayers = Player::select("*")->where('team_id','=',$id_team)->get()->sortByDesc('name');
        if (count($recordsetPlayers) == 0) {
            echo "ATENCIO: no hi ha registres!! Tornant a la fitxa del Equip...";
            // sleep(0.5);           
            // $fieldsetTeam = Team::select("*")->where('id','=',$id_team);
            return view('team.edit')
                // ->with('objClub',$fieldsetClub);
                ->with('objTeam',$fieldsetTeam);
        }else{
            return view('player.index')                
                ->with('recordsetPlayers',$recordsetPlayers)
                ->with('id_club',$id_club);
                // , compact('recordsetPlayers','objTeam','id_club'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_club, $id_team)
    {
        echo "PlayerController ... create!!  .. id_club=".$id_club." id_team=" . $id_team;
        // die;
        // per crear un Player que pertanyi al Team (li passem valor a grabar a Clau Forana)
        // $club_id = Team::select("club_id")->where('id','=',$id_team);

        $fieldsetTeam = Team::select("*")->where('id','=',$id_team);
        // if (is_null($fieldsetTeam)){
        //     echo "no hi ha camps";
        //     die;
        // }

        // $club_id = $fieldsetTeam->club_id;
        // print($fieldsetTeam->club_id);
        // die;

        return view('player.create')
                ->with('id_team',$id_team);

            // ->with('team',$fieldsetTeam);

            // ->with('club',$fieldsetClub);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $objPlayer = new Player();
        $objPlayer->team_id = $request->get('inpTea');
        $objPlayer->name = $request->get('inpNom');
        $objPlayer->number = $request->get('inpDor');   
        $objPlayer->birthdate = $request->get('inpBir');
        $objPlayer->save();
        $objTeam = Team::find($request->get('inpTea'));
        return view('team.edit')->with('objTeam',$objTeam);       
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

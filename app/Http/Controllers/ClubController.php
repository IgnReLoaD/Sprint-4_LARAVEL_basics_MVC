<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recordsetClubs = Club::all();          
        return view('club.index')->with('recordsetClubs',$recordsetClubs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('club.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request conté el $_POST[input1,input2,input3...] 
        $objClub = new Club();
        $objClub->name = $request->get('inpNom');
        $objClub->palmares = $request->get('inpPal');
        $objClub->foundation_year_month = $request->get('inpFun');
        $objClub->office_address = $request->get('inpAdd');

        $objClub->save();
        return redirect('/clubs');
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
    public function edit($id_club)
    {
        // echo $id_club;
        // die;
        $objClub = Club::find($id_club);        
        // $str_id_club = strval($id_club);
        // echo "str_id_club = " . $str_id_club;
        // sleep(1);
        // $objClub = Club::where('id_club','=',strval($str_id_club));
        return view('club.edit')->with('club',$objClub);
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
        // en Create (view camps buits) ... Store (grabar) --> instanciem un New registre
        // $objClub = new Club();
        // en Edit (view camps plens) ... Update (grabar) --> portem un registre existent
        $objClub = Club::find($id);

        $objClub->name = $request->get('inpNom');
        $objClub->palmares = $request->get('inpPal');
        $objClub->foundation_year_month = $request->get('inpFun');
        $objClub->office_address = $request->get('inpAdd');

        $objClub->save();
        return redirect('/clubs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objClub = Club::find($id);
        $objClub->delete();
        return redirect('/clubs');
    }
}

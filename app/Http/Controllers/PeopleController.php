<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $peoples = People::all(['id','firstName','surname','age','gender']);
        return response()->json($peoples);
        
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
        $people = People::create($request->post());
        return response()->json([           
            'People'=>$people
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\People  $People
     * @return \Illuminate\Http\Response
     */
    public function show(People $people)
    {
        return response()->json($people);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\People  $People
     * @return \Illuminate\Http\Response
     */
    public function edit(People $people)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\People  $People
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, People $people)
    {
        $people->fill($request->post())->save();
        return response()->json([            
            'people'=>$people
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\People  $People
     * @return \Illuminate\Http\Response
     */
    public function destroy(People $people)
    {
        $people->delete();
        return response()->json([
            'mensaje'=>'¡Registro eliminado correctamente!'
        ]);
    }

}

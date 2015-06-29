<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Track;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTrackRequest;
use Carbon\Carbon;
use Input;

class TracksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //Recuperar todos los articulos
        $tracks = Track::all();
        $tracks = Track::paginate(15);

        return view('tracks.index',compact('tracks')); //compact hace un arreglo
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('tracks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateTrackRequest $request)
    {

        Track::create($request->all());
        return redirect('tracks');
    }

    public function storeOld(Request $request)
    {

    $rules =
        [
            'name' => 'required|min:3',
            'dir_track' => 'required'
        ];

        $this->validate($request,$rules);
        Track::create($request->all());
        return redirect('tracks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $track = Track::find($id);
        return view('tracks.show',compact('track'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $track = Track::find($id);
        return view('tracks.edit',compact('track'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
           $track_name = Input::get('name');
           $track=Track::find($id);
           $track->name = $track_name;
           $track->save();
           return redirect('tracks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Track::find($id)->delete();
        return redirect('tracks');
    }
}
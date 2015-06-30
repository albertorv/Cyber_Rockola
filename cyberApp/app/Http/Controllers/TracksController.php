<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Track;
use App\Artist;
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
        $artists = Artist::all();
        $tracks = Track::paginate(15);

        return view('tracks.index',compact('tracks','artists' )); //compact hace un arreglo
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        
        return view('tracks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {

        $track = Track::all();
        $track = new Track();
        $artist = new Artist();

        $track_name = Input::get('name');
        $artist_name = Input::get('artist');                        
        
        $track->name = $track_name;             
        $artist->name = $artist_name;

        $archivo = array('file' => Input::file('file'));
        $extension = Input::file('file')->getClientOriginalExtension(); 
        $file_name =  Input::file('file')->getClientOriginalName();

        $new_name = $this->replace_white_spaces($file_name);
        $dir_file="uploads/rockola_music/";
        Input::file('file')->move($dir_file, $new_name);

        $track->dir_track = $dir_file . $new_name;
        $track->save();
        $artist->save();

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

    public function replace_white_spaces($file){
        
        $file = strtolower($file);//Convierte el nombre del archivo a minuscula
        $file = preg_replace("/[^.a-z0-9_\s-]/", "", $file);//Indica los caracteres posiblesque mantiene el nombre
        $file = preg_replace("/[\s-]+/", " ", $file);//Elimina espacios en blanco multiples y barras inclinadas
        $file = preg_replace("/[\s_]/", "_", $file);//Combierte los espacios en blanco en guiones
        return $file;
    }   

    public function queue($queue){
        
        $connection = new AMQPConnection('localhost', 5672, 'guest', 'guest');
        $channel = $connection->channel();
        $channel->queue_declare('rockola', false, false, false, false);
        
        $msg = new AMQPMessage($queue);
        $channel->basic_publish($msg, '', 'rockola');
        $channel->close();
        $connection->close();
    }
}
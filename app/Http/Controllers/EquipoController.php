<?php

namespace App\Http\Controllers;

use App\equipo;
use App\logoequipos;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show(equipo $equipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(equipo $equipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, equipo $equipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(equipo $equipo)
    {
        //
    }

    public function textnosotrosup(Request $request){

        $equipo = equipo::find($request->id);

        $campo = $request->campo;

        $equipo->$campo = $request->valor;

        if($equipo->save()){
            return response()->json(['success'=>true, 'mensaje'=>'Cambio Exitoso']);
        }else{
            return response()->json(['success'=>false, 'mensaje'=>'Error al actualizar']);
        }
    }

    public function imagenequipo(Request $request, $id){
        
        
            if(!empty($request->file('src_file1'))){
            $equipo = equipo::find($id);

            if($equipo->imagen != 'imagen_04.png'){
                \Storage::disk('local')->delete("/img/photos/seccions/" .$equipo->imagen);
            }

            $file = $request->file('src_file1');
            $extension = $file->getClientOriginalExtension();
            $namefile = Str::random(30) . '.' . $extension;
           

            \Storage::disk('local')->put("/img/photos/seccions/" . $namefile, \File::get($file));

            $equipo->imagen =  $namefile;
            $equipo->save();

            \Toastr::success('Guardado');
            return redirect()->back();
        }else{
            \Toastr::error('Error al cambiar la imagen');
            return redirect()->back();
        }


    }

    public function imagenalianza(Request $request){

        if(!empty($request->file('src_file2'))){
            $logo_equipo = new logoequipos;

            $file = $request->file('src_file2');
            $extension = $file->getClientOriginalExtension();
            $namefile = Str::random(30) . '.' . $extension;
           

            \Storage::disk('local')->put("/img/photos/seccions/" . $namefile, \File::get($file));

            $logo_equipo->imagen =  $namefile;
            $logo_equipo->save();

            \Toastr::success('Guardado');
            return redirect()->back();
        }else{
            \Toastr::error('Ocurrio un error al intentar agregar un logo');
            return redirect()->back();
        }

    }

    public function elimlianza($id){
        
        $logo_equipo = logoequipos::find($id);

            \Storage::disk('local')->delete("/img/photos/seccions/" .$logo_equipo->imagen);
            if($logo_equipo->delete()){
                \Toastr::success('Eliminado');
                return redirect()->back();
            }else{
                \Toastr::error('Ocurrio un error al intentar eliminar logo');
                return redirect()->back();
            }

    }
}

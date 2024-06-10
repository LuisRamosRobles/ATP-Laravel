<?php

namespace App\Http\Controllers;

use App\Models\Tenista;
use App\Models\Torneo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TorneoController extends Controller
{
    public function index(Request $request) {

        $torneos = Torneo::search($request->search)->orderBy('nombre', 'asc')->paginate(5);

        return view('torneos.index', compact('torneos'));
    }

    public function show($id) {

        $torneo = Torneo::findOrFail($id);

        return view('torneos.show')->with('torneo', $torneo);
    }

    public function listaParticipantes($id) {

        $torneo = Torneo::with('tenistas')->find($id);
        $tenistas = $torneo->tenistas;

        $allTenistas = Tenista::whereNotIn('id', $tenistas->pluck('id'))->get();

        return view('torneos.participantes', compact('torneo', 'tenistas', 'allTenistas'));
    }

    public function addTenista(Request $request, $id) {
        $torneo = Torneo::findOrFail($id);

        if ($torneo->tenistas()->count() < $torneo->entradas) {
            $tenistaId = $request->input('tenista_id');
            $torneo->tenistas()->attach($tenistaId);
        } else {
            return redirect()->route('torneos.participantes', $id)->with('error', 'Se ha alcanzado el límite de tenistas para este torneo.');
        }


        return redirect()->route('torneos.participantes', $id);
    }

    public function removeTenista(Request $request, $id) {

        $torneo = Torneo::findOrFail($id);
        $tenistaId = $request->input('tenista_id');
        $torneo->tenistas()->detach($tenistaId);
        return redirect()->route('torneos.participantes', $id);
    }

    public function create() {

        $torneo = Torneo::all();

        return view('torneos.create')->with('torneo', $torneo);
    }

    public function store(Request $request){

        $request->validate([
            'nombre' => 'min:4|max:100|required',
            'ubicacion' => 'min:4|max:100|required',
            'tipo_torneo' => 'required',
            'categoria' => 'required',
            'superficie' => 'required',
            'entradas' => 'required|integer',
            'fecha_ini' => 'required|regex:/^\d{2}-\d{2}-\d{4}$/',
            'fecha_fin' => 'required|regex:/^\d{2}-\d{2}-\d{4}$/',
            'premio' => 'required|regex:/^\d{1,13}(\.\d{1,2})?$/',
            'imagen' =>'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        try {
            $torneo = new Torneo($request->all());

            $torneo->save();

            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $extension = $imagen->getClientOriginalExtension();
                $fileToSave = $torneo->id . '.' .$extension;
                $torneo->imagen = $imagen->storeAs('torneos', $fileToSave, 'public');

                $torneo->save();
            }

            return redirect()->route('torneos.index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function edit($id) {

        $torneo = Torneo::findOrFail($id);

        return view('torneos.edit')->with('torneo', $torneo);
    }

    public function update(Request $request, $id) {

        $request->validate([
            'nombre' => 'min:4|max:100|required',
            'ubicacion' => 'min:4|max:100|required',
            'tipo_torneo' => 'required',
            'categoria' => 'required',
            'superficie' => 'required',
            'entradas' => 'required|integer',
            'fecha_ini' => 'required|regex:/^\d{2}-\d{2}-\d{4}$/',
            'fecha_fin' => 'required|regex:/^\d{2}-\d{2}-\d{4}$/',
            'premio' => 'required|regex:/^\d{1,13}(\.\d{1,2})?$/',
            'imagen' =>'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        try {
            $torneo = Torneo::findOrFail($id);

            $torneo->update($request->except('imagen'));

            if ($request->hasFile('imagen')) {
                if ($torneo->imagen != Torneo::$IMAGE_DEFAULT && Storage::exists($torneo->imagen)) {
                    Storage::delete($torneo->imagen);
                }

                $imagen = $request->file('imagen');
                $extension = $imagen->getClientOriginalExtension();
                $fileToSave = $torneo->id . '.' . $extension;
                $torneo->imagen = $imagen->storeAs('tenistas', $fileToSave, 'public');
            }

            $torneo->save();

            return redirect()->route('torneos.index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function destroy($id){
        try {
            $torneo = Torneo::findOrFail($id);

            $torneo->isDelted = true;

            $torneo->save();

            return redirect()->route('torneos.index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }




}

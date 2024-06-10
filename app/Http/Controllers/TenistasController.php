<?php

namespace App\Http\Controllers;

use App\Models\Tenista;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use mysql_xdevapi\Exception;

class TenistasController extends Controller
{
    public function index(Request $request) {
        $this->calcularRanking();
        $this->calcularWinrate();
        $this->calcularEdad();
        $tenistas = Tenista::search($request->search)->orderBy('puntos', 'desc')->paginate(5);

        return view('tenistas.index', compact('tenistas'));
    }

    public function show($id) {

        $tenista = Tenista::findOrFail($id);

        return view('tenistas.show')->with('tenista', $tenista);
    }

    public function create(){

        $tenista = Tenista::all();

        return view('tenistas.create')->with('tenistas', $tenista);
    }

    public function store(Request $request) {

        $request->validate([
            'nombre_completo' => 'min:4|max:100|required',
            'pais' => 'min:4|max:65|required',
            'fecha_nacimiento' => 'required|regex:/^\d{2}-\d{2}-\d{4}$/',
            'altura' => 'required|regex:/^\d{1,13}(\.\d{1,2})?$/',
            'peso' => 'required|regex:/^\d{1,13}(\.\d{1,2})?$/',
            'profesional_desde' => 'required|regex:/^\d{2}-\d{2}-\d{4}$/',
            'mano_pref' => 'required',
            'reves' => 'required',
            'entrenador' => 'min:4|max:100|required',
            'price_money' => 'required|regex:/^\d{1,13}(\.\d{1,2})?$/',
            'win' => 'required|integer',
            'lost' => 'required|integer',
            'puntos' => 'required|integer',
            'imagen' =>'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {

            $tenista = new Tenista($request->all());

            $tenista->save();

            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $extension = $imagen->getClientOriginalExtension();
                $fileToSave = $tenista->id . '.' . $extension;
                $tenista->imagen = $imagen->storeAs('tenistas', $fileToSave, 'public');

                $tenista->save();
            }

            return redirect()->route('tenistas.index');
        } catch (\Exception $e) {

            return redirect()->back();
        }
    }


    public function edit($id) {

        $tenista = Tenista::findOrFail($id);

        return view('tenistas.edit')->with('tenista', $tenista);
    }

    public function update(Request $request, $id) {

        $request->validate([
            'nombre_completo' => 'min:4|max:100|required',
            'pais' => 'min:4|max:65|required',
            'fecha_nacimiento' => 'required|regex:/^\d{2}-\d{2}-\d{4}$/',
            'altura' => 'required|regex:/^\d{1,13}(\.\d{1,2})?$/',
            'peso' => 'required|regex:/^\d{1,13}(\.\d{1,2})?$/',
            'profesional_desde' => 'required|regex:/^\d{2}-\d{2}-\d{4}$/',
            'mano_pref' => 'required',
            'reves' => 'required',
            'entrenador' => 'min:4|max:100|required',
            'price_money' => 'required|regex:/^\d{1,13}(\.\d{1,2})?$/',
            'win' => 'required|integer',
            'lost' => 'required|integer',
            'puntos' => 'required|integer',
            'imagen' =>'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $tenista = Tenista::findOrFail($id);

            $tenista->update($request->except('imagen'));

            if ($request->hasFile('imagen')) {
                if ($tenista->imagen != Tenista::$IMAGE_DEFAULT && Storage::exists($tenista->imagen)) {
                    Storage::delete($tenista->imagen);
                }

                $imagen = $request->file('imagen');
                $extension = $imagen->getClientOriginalExtension();
                $fileToSave = $tenista->id . '.' . $extension;
                $tenista->imagen = $imagen->storeAs('tenistas', $fileToSave, 'public');
            }

            $tenista->save();

            return redirect()->route('tenistas.index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }


    public function destroy($id) {
        try {
            $tenista = Tenista::findOrFail($id);

            $tenista->isDeleted = true;

            $tenista->save();


            return redirect()->route('tenistas.index');
        } catch (\Exception $e) {

            return redirect()->back();

        }
    }

    public function generarPdf($id) {
        $tenista = Tenista::findOrFail($id);

        $pdf = PDF::loadView('tenistas.pdf', compact('tenista'))
            ->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true // Habilita recursos remotos
            ]);

        return $pdf->download('tenistas.pdf');
    }


    public function calcularRanking() {
        $listTenistas = Tenista::all();
        $orderListTenistas = $listTenistas -> sortByDesc('puntos');
        $ranking = 1;

        foreach ($orderListTenistas as $tenista){
            $tenista->ranking = $ranking;

            if($tenista->bestRanking == null || $tenista->ranking < $tenista->bestRanking){
                $tenista->bestRanking = $tenista->ranking;
            }

            $tenista->save();
            $ranking++;
        }
    }

    public function calcularWinrate() {
        $listTenistas = Tenista::all();

        foreach ($listTenistas as $tenista){
            $win = $tenista->win;
            $lost =  $tenista->lost;
            $total = $win + $lost;

            $winrate = ($win / $total) * 100;

            $tenista->win_rate = number_format($winrate, 2) . '%';

            $tenista->save();

        }

    }

    public function calcularEdad() {
        $listTenistas = Tenista::all();

        foreach ($listTenistas as $tenista){
            $fecha_nac = $tenista->fecha_nacimiento;

            $edad = Carbon::parse($fecha_nac) -> age;

            $tenista->edad = $edad;

            $tenista->save();
        }
    }
}

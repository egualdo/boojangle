<?php

namespace App\Http\Controllers;

use App\Models\HomepageSelection;
use App\Http\Requests\StoreHomepageSelectionRequest;
use App\Http\Requests\UpdateHomepageSelectionRequest;
use App\Models\Direction;
use App\Models\News;
use App\Models\Service;
use App\Models\Staff;
use App\Models\DataResearch;
use App\Models\Country;
use App\Models\Idiom;
use App\Models\City;
use App\Models\Process;
use App\Models\ProjectType;
use App\Models\Tool;

class HomepageSelectionController extends Controller
{

    public function index()
    {
        $home = HomepageSelection::all();
        $news = News::all();
        $directions = Direction::all();
        $services = Service::all();
        $processes = Process::all();
        $tools = Tool::all();
        $staffs = Staff::all();
        $dataResearchs = DataResearch::all();
        $projectTypes = ProjectType::all();

        // verifica si obtienes los datos correctamente

        $countries = Country::all();
        $cities = City::all();
        $idioms = Idiom::all();

        return view('panel.homeContent.index', compact('home', 'processes', 'tools', 'projectTypes', 'dataResearchs', 'services', 'staffs', 'directions', 'news', 'idioms', 'cities', 'countries'));
    }
    public function changeHomeId($kind, $id)
    {
        $model = null;
        switch ($kind) {
            case 'news':
                $model = News::findOrFail($id);
                break;
            case 'service':
                $model = Service::findOrFail($id);
                break;
            case 'direction':
                $model = Direction::findOrFail($id);
                break;
            case 'staff':
                $model = Staff::findOrFail($id);
                break;
            case 'dataResearch':
                $model = DataResearch::findOrFail($id);
                break;
            case 'projectType':
                $model = ProjectType::findOrFail($id);
                break;
            case 'process':
                $model = Process::findOrFail($id);
                break;
            case 'tool':
                $model = Tool::findOrFail($id);
                break;
            default:
                abort(404); // Devolver un error 404 si el kind de módulo no es válido
        }
        if ($model->home_id == 1) {
            $model->home_id = 2; // Actualizar el valor de home_id a 2
        } else {
            $model->home_id = 1; // Actualizar el valor de home_id a 1
        }
        $model->save(); // Guardar los cambios en la base de datos
        // Crear una respuesta JSON con el nuevo valor de home_id
        return response()->json([
            'new_home_id' => $model->home_id,
        ]);
    }
}

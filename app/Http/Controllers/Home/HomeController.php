<?php

namespace App\Http\Controllers\Home;

use App\Models\Idiom;
use App\Models\ServicesIdiom;
use App\Models\StaffIdiom;
use App\Models\Service;
use App\Http\Controllers\Controller;
use App\Models\ClientsIdiom;
use App\Models\DataResearch;
use App\Models\DataResearchIdiom;
use App\Models\DirectionsIdiom;
use App\Models\HeaderIdiom;
use App\Models\Module;
use App\Models\ModuleIdiom;
use App\Models\News;
use App\Models\NewsIdiom;
use App\Models\NewTags;
use App\Models\Order;
use App\Models\ProjectType;
use App\Models\ProjectTypesIdiom;
use App\Models\ProjectTypeTags;
use App\Models\ServiceTags;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToArray;

class HomeController extends Controller
{
    public function index($idiom='es')
    {
        if(  Session::get('locale') !== null && in_array(Session::get('locale'), ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae'])){
            $idiom=Session::get('locale');
        }
        
        if($idiom !== null && !in_array(Session::get('locale'), ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae']) ){
            $idiom='es';
        }

        if(Session::get('locale') == null || Session::get('locale') == "" ){
            Session::put('locale','es');
            $idiom='es';
        }
            
        $orders=Order::all();
        foreach ($orders as  $value) {
            $value->weeks_element=json_decode($value->weeks_element);
        }

        $usr=Auth::user();
        // dd($usr);
        if($usr){
            if($usr->role_id == 3){
                return view('welcome',compact('orders'));
            }
        }else{
            return view('auth.login');
        }
         
    }

     public function cases($idiom='es')
    {
          if(  Session::get('locale') !== null && in_array(Session::get('locale'), ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae'])){
            $idiom=Session::get('locale');
        }
        
        if($idiom !== null && !in_array(Session::get('locale'), ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae']) ){
            $idiom='es';
        }

         if(Session::get('locale') == null || Session::get('locale') == "" ){
            Session::put('locale','es');
            $idiom='es';
        }
        $idiomId=Idiom::where('acronym',$idiom)->first();
        $servicios =ServicesIdiom::where('idiom_id',$idiomId->id)->with(['service'])->get();
        $staff =StaffIdiom::with('staff')->where('idiom_id',$idiomId->id)->get();
        $directions =DirectionsIdiom::with('direc')->where('idiom_id',$idiomId->id)->get();
        $clients =ClientsIdiom::with('clients')->where('idiom_id',$idiomId->id)->get();
        $projectTypes=ProjectTypesIdiom::with('project')->where('idiom_id',$idiomId->id)->get();
        $modulesIdiom=ModuleIdiom::with(['idiom','modules','typemodule'])->where('idiom_id',$idiomId->id)->get();
        $redes = [
            ['twitter.svg', 'https://twitter.com'],
            ['facebook-f.svg', 'https://facebook.com'],
            ['youtube.svg', 'https://youtube.com'],
            ['linkedin-in.svg', 'https://linkedin.com'],
            ['opensea.svg', 'https://opensea.com'],
        ];

        $oficinas = [
            ['MIA', 'America/New_York', '-5'],
            ['NY', 'America/New_York', '-5'],
            ['BOG', 'America/Bogota', '-5'],
            ['BSAS', 'America/Argentina/Buenos_Aires', '-3'],
            ['CDMX', 'America/Mexico_City', '-6'],
            ['SAO', 'America/Sao_Paulo', '-3'],
        ];

        $zonaFija = "America/Bogota";
        $dateTime = new \DateTime("now", new \DateTimeZone($zonaFija));
        foreach ($oficinas as &$ofi) {
            $newDateTime = new \DateTime("now", new \DateTimeZone($ofi[1]));
            $dateTimeUTC = $newDateTime->format("h:i a");
            $ofi[2] = $dateTimeUTC;
        }

       

        

        return view('casos-search', compact('redes', 'oficinas', 'directions','servicios','projectTypes'));
    }

    public function detailCases($idiom='es',ProjectType $project)
    {
         if(  Session::get('locale') !== null && in_array(Session::get('locale'), ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae'])){
            $idiom=Session::get('locale');
        }
        
        if($idiom !== null && !in_array(Session::get('locale'), ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae']) ){
            $idiom='es';
        }

         if(Session::get('locale') == null || Session::get('locale') == "" ){
            Session::put('locale','es');
            $idiom='es';
        }

        $idiomId=Idiom::where('acronym',$idiom)->first();

        $redes = [
            ['twitter.svg', 'https://twitter.com'],
            ['facebook-f.svg', 'https://facebook.com'],
            ['youtube.svg', 'https://youtube.com'],
            ['linkedin-in.svg', 'https://linkedin.com'],
            ['opensea.svg', 'https://opensea.com'],
        ];

        $oficinas = [
            ['MIA', 'America/New_York', '-5'],
            ['NY', 'America/New_York', '-5'],
            ['BOG', 'America/Bogota', '-5'],
            ['BSAS', 'America/Argentina/Buenos_Aires', '-3'],
            ['CDMX', 'America/Mexico_City', '-6'],
            ['SAO', 'America/Sao_Paulo', '-3'],
        ];

        $zonaFija = "America/Bogota";
        $dateTime = new \DateTime("now", new \DateTimeZone($zonaFija));

        foreach ($oficinas as &$ofi) {
            $newDateTime = new \DateTime("now", new \DateTimeZone($ofi[1]));
            $dateTimeUTC = $newDateTime->format("h:i a");
            $ofi[2] = $dateTimeUTC;
        }

        $servicios = [
            [
                "name" => "Estrategia y Research",
                "img" => "/homePublic/imgs/blog.jpg",
                "info" => "Nuestros proyectos comienzan analizando los aspectos que influyen en el mercado, la audiencia y los consumidores de los clientes"
            ],
            [
                "name" => "Creatividad",
                "img" => "/homePublic/imgs/blog.jpg",
                "info" => "La creatividad es el secreto de nuestro éxito. El equipo creativo genera el mayor impacto en los resultados de las campañas. "
            ],
            [
                "name" => "Medios",
                "img" => "/homePublic/imgs/blog.jpg",
                "info" => "Contamos con un equipo inhouse que trabaja en la optimización de los costos de nuestras campañas. Analizan los resultados y mejoran la performance en tiempo real, utilizando nuevos anuncios o segmentaciones si es necesario. "
            ],
            [
                "name" => "Desarrollo",
                "img" => "/homePublic/imgs/blog.jpg",
                "info" => "Nacimos hace 15 años como una compañía de desarrollos digitales, trabajando en innovación y las mejores prácticas para garantizar la mejor experiencia de usuario."
            ],
            [
                "name" => "Redes sociales",
                "img" => "/homePublic/imgs/blog.jpg",
                "info" => "Conforma uno de los servicios clave para alcanzar la audiencia de nuestros clientes. Comprendemos qué tipo de contenido es el más apropiado evaluando la peformance a través de datos recibidos sobre la audiencia. "
            ],
            [
                "name" => "Activaciones",
                "img" => "/homePublic/imgs/blog.jpg",
                "info" => "Manejamos todos los aspectos tradicionales de una activación pero introducimos la conversión digital a través de una experiencia expansiva con medición de KPIs."
            ],
            [
                "name" => "Influencers",
                "img" => "/homePublic/imgs/blog.jpg",
                "info" => "En cada mercado buscamos e identificamos talentos con seguidores locales, nacionales e internacionales. Con nuestro scouting, los evaluamos en base a su trabajo con la audiencia, sus valores y aspectos que los hacen únicos."
            ],
            [
                "name" => "E-commerce",
                "img" => "/homePublic/imgs/blog.jpg",
                "info" => "Nos enfocamos en una visión 360 de los puntos de contacto de los consumidores, desde la interacción en los puntos de venta hasta la web y aplicaciones mobile. "
            ],
            [
                "name" => "Producción Audiovisual",
                "img" => "/homePublic/imgs/blog.jpg",
                "info" => "PRODUCCIÓN AUDIOVISUAL
                    Poseemos nuestro propio equipo de producción de contenidos audiovisuales, generando desde los guiones y storyboards hasta la producción final. "
            ],
            [
                "name" => "Arte",
                "img" => "/homePublic/imgs/blog.jpg",
                "info" => "Nuestros diseñadores trabajan de forma integral con el resto de los departamentos para desarrollar materiales que incluyen Key Visuals. "
            ],
            [
                "name" => "Marketing B2B",
                "img" => "/homePublic/imgs/blog.jpg",
                "info" => "Nuestra principal estrategia en el modelo business-to-business es la creación de experiencias de valor, teniendo un impacto positivo en la personas y sus negocios. "
            ],
            [
                "name" => "Prensa",
                "img" => "/homePublic/imgs/blog.jpg",
                "info" => "Poseemos un enfoque diferente a las relaciones públicas convencionales. Buscamos tópicos que sean de interés genuino para el medio, desarrollamos historias para dirigir tráfico a los sitios y redes sociales de nuestros clientes."
            ],
        ];

        $projectTypesIdiom=ProjectTypesIdiom::where('idiom_id',$idiomId->id)->where('project_type_id',$project->id)->first();
        
        
        if(!$projectTypesIdiom){
            // return redirect()->back()->with('you dont have any cases in this language');
            return view('errors.400Home');
            
        }else{
            $modulesIdiom= DB:: table('module_idioms')
                                ->join('idioms', 'idioms.id', '=', 'module_idioms.idiom_id')
                                ->join('modules', 'modules.id', '=', 'module_idioms.module_id')
                                ->where('modules.project_type_id',$projectTypesIdiom->project_type_id)
                                ->where('module_idioms.idiom_id',$projectTypesIdiom->idiom_id)
                                ->get();

            $cases_tags=ProjectTypeTags::where('project_type_id',$project->id)->get()->pluck('tag_id');
            // dd($cases_tags);
            $casosRelacionados=ProjectTypeTags::with('project')->whereIn('tag_id',$cases_tags)->latest()->take(3)->get();
             $casosRelacionados = $casosRelacionados->unique(function ($item) {
                return $item['project_type_id'];
            });

            return view('casos-detail', compact('redes', 'oficinas', 'servicios','modulesIdiom','casosRelacionados','idiom'));
        }

    }

    public function service($idiom='es')
    {
          if(  Session::get('locale') !== null && in_array(Session::get('locale'), ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae'])){
            $idiom=Session::get('locale');
        }
        
        if($idiom !== null && !in_array(Session::get('locale'), ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae']) ){
            $idiom='es';
        }

         if(Session::get('locale') == null || Session::get('locale') == "" ){
            Session::put('locale','es');
            $idiom='es';
        }
        $idiomId=Idiom::where('acronym',$idiom)->first();
        $servicios =ServicesIdiom::where('idiom_id',$idiomId->id)->with(['service'])->get();
        $staff =StaffIdiom::with('staff')->where('idiom_id',$idiomId->id)->get();
        $directions =DirectionsIdiom::with('direc')->where('idiom_id',$idiomId->id)->get();
        $clients =ClientsIdiom::with('clients')->where('idiom_id',$idiomId->id)->get();
        $projectTypes=ProjectTypesIdiom::with('project')->where('idiom_id',$idiomId->id)->get();
        $modulesIdiom=ModuleIdiom::with(['idiom','modules','typemodule'])->where('idiom_id',$idiomId->id)->get();
        $casosRelacionados=ProjectTypeTags::with('project')->latest()->get();
         $casosRelacionados = $casosRelacionados->unique(function ($item) {
                return $item['project_type_id'];
            });
        $redes = [
            ['twitter.svg', 'https://twitter.com'],
            ['facebook-f.svg', 'https://facebook.com'],
            ['youtube.svg', 'https://youtube.com'],
            ['linkedin-in.svg', 'https://linkedin.com'],
            ['opensea.svg', 'https://opensea.com'],
        ];

        $oficinas = [
            ['MIA', 'America/New_York', '-5'],
            ['NY', 'America/New_York', '-5'],
            ['BOG', 'America/Bogota', '-5'],
            ['BSAS', 'America/Argentina/Buenos_Aires', '-3'],
            ['CDMX', 'America/Mexico_City', '-6'],
            ['SAO', 'America/Sao_Paulo', '-3'],
        ];

        $zonaFija = "America/Bogota";
        $dateTime = new \DateTime("now", new \DateTimeZone($zonaFija));
        foreach ($oficinas as &$ofi) {
            $newDateTime = new \DateTime("now", new \DateTimeZone($ofi[1]));
            $dateTimeUTC = $newDateTime->format("h:i a");
            $ofi[2] = $dateTimeUTC;
        }

       

        

        return view('service-page', compact('redes', 'oficinas', 'directions','servicios','casosRelacionados'));
    }

     public function detailservice($idiom='es',$dt)
    {
         if(  Session::get('locale') !== null && in_array(Session::get('locale'), ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae'])){
            $idiom=Session::get('locale');
        }
        
        if($idiom !== null && !in_array(Session::get('locale'), ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae']) ){
            $idiom='es';
        }

         if(Session::get('locale') == null || Session::get('locale') == "" ){
            Session::put('locale','es');
            $idiom='es';
        }
        $services=ServicesIdiom::where('service_id',$dt)->get();
        
        $idiomId=Idiom::where('acronym',$idiom)->first();
        
        $redes = [
            ['twitter.svg', 'https://twitter.com'],
            ['facebook-f.svg', 'https://facebook.com'],
            ['youtube.svg', 'https://youtube.com'],
            ['linkedin-in.svg', 'https://linkedin.com'],
            ['opensea.svg', 'https://opensea.com'],
        ];

        $oficinas = [
            ['MIA', 'America/New_York', '-5'],
            ['NY', 'America/New_York', '-5'],
            ['BOG', 'America/Bogota', '-5'],
            ['BSAS', 'America/Argentina/Buenos_Aires', '-3'],
            ['CDMX', 'America/Mexico_City', '-6'],
            ['SAO', 'America/Sao_Paulo', '-3'],
        ];

        $zonaFija = "America/Bogota";
        $dateTime = new \DateTime("now", new \DateTimeZone($zonaFija));

        foreach ($oficinas as &$ofi) {
            $newDateTime = new \DateTime("now", new \DateTimeZone($ofi[1]));
            $dateTimeUTC = $newDateTime->format("h:i a");
            $ofi[2] = $dateTimeUTC;
        }

         $servicIdiom=ServicesIdiom::where('idiom_id',$idiomId->id)->where('service_id',$dt)->first();
         //buscamos las tags que tiene el servicio para luego hacer match con los casos relacionados
         $service_tags=ServiceTags::where('service_id',$dt)->get()->pluck('tag_id');
         $casosRelacionados=ProjectTypeTags::with('project')->whereIn('tag_id',$service_tags)->latest()->take(3)->get();
         $casosRelacionados = $casosRelacionados->unique(function ($item) {
                return $item['project_type_id'];
            });
        
        
        if(!$servicIdiom){
            // return redirect()->back()->with('you dont have any cases in this language');
            return view('errors.400Home');
            
        }else{
            $modulesIdiom= DB:: table('module_idioms')
                                ->join('idioms', 'idioms.id', '=', 'module_idioms.idiom_id')
                                ->join('modules', 'modules.id', '=', 'module_idioms.module_id')
                                ->where('modules.service_id',$servicIdiom->service_id)
                                ->where('module_idioms.idiom_id',$servicIdiom->idiom_id)
                                ->get();
           

                    $count=0;
                    $foward=['dark','light'];

                        foreach ($modulesIdiom as  $module) {
                            if($count <= 1  ){
                                if( $module->module_type_id==33 && $count==0){
                                    
                                    $module->color=$foward[0];
                                    $count++;
                                } else if($module->module_type_id==33  && $count>0){
                                   
                                    $module->color=$foward[1];
                                    $foward=array_reverse($foward);
                                    $count=0;
                                } 
                                
                            }
                        }           

             return view('service-detail', compact('redes','oficinas','services','modulesIdiom','casosRelacionados','idiom'));
        }

            
    }

    public function dataResearch($idiom='es')
    {
         if(  Session::get('locale') !== null && in_array(Session::get('locale'), ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae'])){
            $idiom=Session::get('locale');
        }
        
        if($idiom !== null && !in_array(Session::get('locale'), ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae']) ){
            $idiom='es';
        }

         if(Session::get('locale') == null || Session::get('locale') == "" ){
            Session::put('locale','es');
            $idiom='es';
        }
        $idiomId=Idiom::where('acronym',$idiom)->first();
        $servicios =ServicesIdiom::where('idiom_id',$idiomId->id)->with(['service'])->get();
        $staff =StaffIdiom::with('staff')->where('idiom_id',$idiomId->id)->get();
        $directions =DirectionsIdiom::with('direc')->where('idiom_id',$idiomId->id)->get();
        $clients =ClientsIdiom::with('clients')->where('idiom_id',$idiomId->id)->get();
        $projectTypes=ProjectTypesIdiom::with('project')->where('idiom_id',$idiomId->id)->get();
        $modulesIdiom=ModuleIdiom::with(['idiom','modules','typemodule'])->where('idiom_id',$idiomId->id)->get();
        $dataResearch=DataResearchIdiom::with(['idiom'])->where('idiom_id',$idiomId->id)->get();
        // dd($dataResearch);

       $redes = [
            ['twitter.svg', 'https://twitter.com'],
            ['facebook-f.svg', 'https://facebook.com'],
            ['youtube.svg', 'https://youtube.com'],
            ['linkedin-in.svg', 'https://linkedin.com'],
            ['opensea.svg', 'https://opensea.com'],
        ];

        $oficinas = [
            ['MIA', 'America/New_York', '-5'],
            ['NY', 'America/New_York', '-5'],
            ['BOG', 'America/Bogota', '-5'],
            ['BSAS', 'America/Argentina/Buenos_Aires', '-3'],
            ['CDMX', 'America/Mexico_City', '-6'],
            ['SAO', 'America/Sao_Paulo', '-3'],
        ];

        $zonaFija = "America/Bogota";
        $dateTime = new \DateTime("now", new \DateTimeZone($zonaFija));
        foreach ($oficinas as &$ofi) {
            $newDateTime = new \DateTime("now", new \DateTimeZone($ofi[1]));
            $dateTimeUTC = $newDateTime->format("h:i a");
            $ofi[2] = $dateTimeUTC;
        }

        return view('data-research-page', compact('redes', 'oficinas', 'directions','dataResearch'));
        // return view('service-page', compact('redes', 'oficinas', 'directions','servicios'));
    }

    public function detail($idiom='es',$dt)
    {
         if(  Session::get('locale') !== null && in_array(Session::get('locale'), ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae'])){
            $idiom=Session::get('locale');
        }
        
        if($idiom !== null && !in_array(Session::get('locale'), ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae']) ){
            $idiom='es';
        }

         if(Session::get('locale') == null || Session::get('locale') == "" ){
            Session::put('locale','es');
            $idiom='es';
        }
        $dataResearch=DataResearchIdiom::where('id',$dt)->get();
        
        $idiomId=Idiom::where('acronym',$idiom)->first();
        
        $redes = [
            ['twitter.svg', 'https://twitter.com'],
            ['facebook-f.svg', 'https://facebook.com'],
            ['youtube.svg', 'https://youtube.com'],
            ['linkedin-in.svg', 'https://linkedin.com'],
            ['opensea.svg', 'https://opensea.com'],
        ];

        $oficinas = [
            ['MIA', 'America/New_York', '-5'],
            ['NY', 'America/New_York', '-5'],
            ['BOG', 'America/Bogota', '-5'],
            ['BSAS', 'America/Argentina/Buenos_Aires', '-3'],
            ['CDMX', 'America/Mexico_City', '-6'],
            ['SAO', 'America/Sao_Paulo', '-3'],
        ];

        $zonaFija = "America/Bogota";
        $dateTime = new \DateTime("now", new \DateTimeZone($zonaFija));

        foreach ($oficinas as &$ofi) {
            $newDateTime = new \DateTime("now", new \DateTimeZone($ofi[1]));
            $dateTimeUTC = $newDateTime->format("h:i a");
            $ofi[2] = $dateTimeUTC;
        }
            // dd($dt);
             return view('data-research-detail', compact('redes','oficinas','dataResearch'));
    }

    public function stafff($idiom='es')
    {
         if(  Session::get('locale') !== null && in_array(Session::get('locale'), ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae'])){
            $idiom=Session::get('locale');
        }
        
        if($idiom !== null && !in_array(Session::get('locale'), ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae']) ){
            $idiom='es';
        }

         if(Session::get('locale') == null || Session::get('locale') == "" ){
            Session::put('locale','es');
            $idiom='es';
        }
        $idiomId=Idiom::where('acronym',$idiom)->first();
        // $servicios =ServicesIdiom::where('idiom_id',$idiomId->id)->with(['service'])->get();
        $staff =StaffIdiom::with('staff')->where('idiom_id',$idiomId->id)->get();
        $directions =DirectionsIdiom::with('direc')->where('idiom_id',$idiomId->id)->get();
        $clients =ClientsIdiom::with('clients')->where('idiom_id',$idiomId->id)->get();
        // $projectTypes=ProjectTypesIdiom::with('project')->where('idiom_id',$idiomId->id)->get();
        $modulesIdiom=ModuleIdiom::with(['idiom','modules','typemodule'])->where('idiom_id',$idiomId->id)->get();
        $dataResearch=DataResearchIdiom::with(['idiom'])->where('idiom_id',$idiomId->id)->get();
        // dd($dataResearch);

        $redes = [
            ['twitter.svg', 'https://twitter.com'],
            ['facebook-f.svg', 'https://facebook.com'],
            ['youtube.svg', 'https://youtube.com'],
            ['linkedin-in.svg', 'https://linkedin.com'],
            ['opensea.svg', 'https://opensea.com'],
        ];

        $oficinas = [
            ['MIA', 'America/New_York', '-5'],
            ['NY', 'America/New_York', '-5'],
            ['BOG', 'America/Bogota', '-5'],
            ['BSAS', 'America/Argentina/Buenos_Aires', '-3'],
            ['CDMX', 'America/Mexico_City', '-6'],
            ['SAO', 'America/Sao_Paulo', '-3'],
        ];

        $zonaFija = "America/Bogota";
        $dateTime = new \DateTime("now", new \DateTimeZone($zonaFija));
        foreach ($oficinas as &$ofi) {
            $newDateTime = new \DateTime("now", new \DateTimeZone($ofi[1]));
            $dateTimeUTC = $newDateTime->format("h:i a");
            $ofi[2] = $dateTimeUTC;
        }

        return view('stafff', compact('redes', 'oficinas', 'directions','staff'));
        // return view('service-page', compact('redes', 'oficinas', 'directions','servicios'));
    }


    public function blog($idiom='es')
    {
        if(  Session::get('locale') !== null && in_array(Session::get('locale'), ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae'])){
            $idiom=Session::get('locale');
        }
        
        if($idiom !== null && !in_array(Session::get('locale'), ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae']) ){
            $idiom='es';
        }

        if(Session::get('locale') == null || Session::get('locale') == "" ){
            Session::put('locale','es');
            $idiom='es';
        }
        $idiomId=Idiom::where('acronym',$idiom)->first();
        $servicios =ServicesIdiom::where('idiom_id',$idiomId->id)->with(['service'])->get();
        
        $news =NewsIdiom::where('idiom_id',$idiomId->id)->with(['news'])->get();

        $newsMostReaded =NewsIdiom::where('news_idiom.idiom_id',$idiomId->id)
                                    ->join('news', 'news_idiom.new_id', '=', 'news.id')
                                    ->select('news_idiom.*')
                                    ->with('news')
                                    ->orderBy('news.counter', 'DESC')
                                    ->get();

        $staff =StaffIdiom::with('staff')->where('idiom_id',$idiomId->id)->get();
        $directions =DirectionsIdiom::with('direc')->where('idiom_id',$idiomId->id)->get();
        $clients =ClientsIdiom::with('clients')->where('idiom_id',$idiomId->id)->get();
        $projectTypes=ProjectTypesIdiom::with('project')->where('idiom_id',$idiomId->id)->get();
        $modulesIdiom=ModuleIdiom::with(['idiom','modules','typemodule'])->where('idiom_id',$idiomId->id)->get();
        $topics=Topic::where('status',1)->get();
        $topicSelected = (object) array('id' => '','name'=>'');

        $redes = [
            ['twitter.svg', 'https://twitter.com'],
            ['facebook-f.svg', 'https://facebook.com'],
            ['youtube.svg', 'https://youtube.com'],
            ['linkedin-in.svg', 'https://linkedin.com'],
            ['opensea.svg', 'https://opensea.com'],
        ];

        $oficinas = [
            ['MIA', 'America/New_York', '-5'],
            ['NY', 'America/New_York', '-5'],
            ['BOG', 'America/Bogota', '-5'],
            ['BSAS', 'America/Argentina/Buenos_Aires', '-3'],
            ['CDMX', 'America/Mexico_City', '-6'],
            ['SAO', 'America/Sao_Paulo', '-3'],
        ];

        $zonaFija = "America/Bogota";
        $dateTime = new \DateTime("now", new \DateTimeZone($zonaFija));
        foreach ($oficinas as &$ofi) {
            $newDateTime = new \DateTime("now", new \DateTimeZone($ofi[1]));
            $dateTimeUTC = $newDateTime->format("h:i a");
            $ofi[2] = $dateTimeUTC;
        }

        return view('blog-page', compact('redes', 'oficinas', 'directions','servicios','news','topics','topicSelected','newsMostReaded'));
    }

     public function detailblog($idiom='es',$dt)
    {
         if(  Session::get('locale') !== null && in_array(Session::get('locale'), ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae'])){
            $idiom=Session::get('locale');
        }
        
        if($idiom !== null && !in_array(Session::get('locale'), ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae']) ){
            $idiom='es';
        }

         if(Session::get('locale') == null || Session::get('locale') == "" ){
            Session::put('locale','es');
            $idiom='es';
        }
        
        $idiomId=Idiom::where('acronym',$idiom)->first();
        $news=NewsIdiom::where('idiom_id',$idiomId->id)->get();
        
        $redes = [
            ['twitter.svg', 'https://twitter.com'],
            ['facebook-f.svg', 'https://facebook.com'],
            ['youtube.svg', 'https://youtube.com'],
            ['linkedin-in.svg', 'https://linkedin.com'],
            ['opensea.svg', 'https://opensea.com'],
        ];

        $oficinas = [
            ['MIA', 'America/New_York', '-5'],
            ['NY', 'America/New_York', '-5'],
            ['BOG', 'America/Bogota', '-5'],
            ['BSAS', 'America/Argentina/Buenos_Aires', '-3'],
            ['CDMX', 'America/Mexico_City', '-6'],
            ['SAO', 'America/Sao_Paulo', '-3'],
        ];

        $zonaFija = "America/Bogota";
        $dateTime = new \DateTime("now", new \DateTimeZone($zonaFija));

        foreach ($oficinas as &$ofi) {
            $newDateTime = new \DateTime("now", new \DateTimeZone($ofi[1]));
            $dateTimeUTC = $newDateTime->format("h:i a");
            $ofi[2] = $dateTimeUTC;
        }

         $newIdiom=NewsIdiom::where('idiom_id',$idiomId->id)->where('new_id',$dt)->first();
         $new_tags=NewTags::where('new_id',$dt)->get()->pluck('tag_id');
         $casosRelacionados=ProjectTypeTags::with(['project.idioms'])->whereIn('tag_id',$new_tags)->latest()->get();
        
            $casosRelacionados = $casosRelacionados->unique(function ($item) {
                return $item['project_type_id'];
            });

        //  dd($unique);
        
        
        if(!$newIdiom){
            // return redirect()->back()->with('you dont have any cases in this language');
            return view('errors.400Home');
            
        }else{
            $n=News::find($dt);    
            $n->incremeting();

            return view('blog-detail', compact('redes','oficinas','news','newIdiom','idiom','casosRelacionados'));
        }

            
    }

     public function blogfiltering($idiom='es',$filter)
    {
         if(  Session::get('locale') !== null && in_array(Session::get('locale'), ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae'])){
            $idiom=Session::get('locale');
        }
        
        if($idiom !== null && !in_array(Session::get('locale'), ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae']) ){
            $idiom='es';
        }

         if(Session::get('locale') == null || Session::get('locale') == "" ){
            Session::put('locale','es');
            $idiom='es';
        }
        $idiomId=Idiom::where('acronym',$idiom)->first();
        $news =NewsIdiom::where('idiom_id',$idiomId->id)->where('topic',$filter)->with(['news'])->get();

        $topicSelected=Topic::find($filter);
        $topics=Topic::where('status',1)->get();
        $idiomId=Idiom::where('acronym',$idiom)->first();
        
        $redes = [
            ['twitter.svg', 'https://twitter.com'],
            ['facebook-f.svg', 'https://facebook.com'],
            ['youtube.svg', 'https://youtube.com'],
            ['linkedin-in.svg', 'https://linkedin.com'],
            ['opensea.svg', 'https://opensea.com'],
        ];

        $oficinas = [
            ['MIA', 'America/New_York', '-5'],
            ['NY', 'America/New_York', '-5'],
            ['BOG', 'America/Bogota', '-5'],
            ['BSAS', 'America/Argentina/Buenos_Aires', '-3'],
            ['CDMX', 'America/Mexico_City', '-6'],
            ['SAO', 'America/Sao_Paulo', '-3'],
        ];

        $zonaFija = "America/Bogota";
        $dateTime = new \DateTime("now", new \DateTimeZone($zonaFija));

        foreach ($oficinas as &$ofi) {
            $newDateTime = new \DateTime("now", new \DateTimeZone($ofi[1]));
            $dateTimeUTC = $newDateTime->format("h:i a");
            $ofi[2] = $dateTimeUTC;
        }

        $newIdiom=NewsIdiom::where('idiom_id',$idiomId->id)->where('topic',$filter)->get();

        $newsMostReaded =NewsIdiom::where('news_idiom.idiom_id',$idiomId->id)
                                    ->join('news', 'news_idiom.new_id', '=', 'news.id')
                                    ->select('news_idiom.*')
                                    ->with('news')
                                    ->orderBy('news.counter', 'DESC')
                                    ->get();
        
        if(!$newIdiom){
            return view('errors.400Home'); 
        }else{
            return view('blog-page', compact('redes','oficinas','newIdiom','topicSelected','topics','news','idiom','newsMostReaded'));
        }

            
    }

    public function setSession(Request $request){
        Session::put('readycdn',true);

        return response()->json(["code"=>"200"], 200);
    }


    public function relatedCases(){
        if(  Session::get('locale') !== null && in_array(Session::get('locale'), ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae'])){
            $idiom=Session::get('locale');
        }
        
        if($idiom !== null && !in_array(Session::get('locale'), ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae']) ){
            $idiom='es';
        }

        if(Session::get('locale') == null || Session::get('locale') == "" ){
            Session::put('locale','es');
            $idiom='es';
        }

            $casosRelacionados=ProjectTypeTags::with(['project'])->latest()->take(3)->get();
             $casosRelacionados = $casosRelacionados->unique(function ($item) {
                return $item['project_type_id'];
            });
            
            return view('casos-relacionados',compact('casosRelacionados','idiom'));
    }
}
<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Blog;
use App\Modelos\EnlaceRed;
use App\Modelos\BlogTraslations;
use App\Modelos\Carrusel;
use App\Modelos\CarruselTraslations;

class BlogController extends Controller
{
    //
    public function index()
    {


        $blogs = BlogTraslations::where('idioma', '=', 'es')->paginate(4);
        //dd($eventos);
        //$user = User::where("estado","=",1)->find(10);
        //dd($blogs);
        $carousel1 = CarruselTraslations::where('idioma', '=', 'es')->first();
        $enlaces = EnlaceRed::all();
        if ($carousel1){
            $carouseles = CarruselTraslations::where('idioma', '=', 'es')
                ->where('id', '<>',$carousel1->id )->get();
        }else{
            $carouseles = null;
        }
        return view('home.blogs', compact('blogs','carouseles','carousel1','enlaces'));
    }

    public function blogdetalles($id)
    {

        return view('home.blog-detalles');
    }

    public function detallesblog($id)
    {

        //$data = array();
        $blog = Blog::findOrFail($id);
        $tras = BlogTraslations::where('blogs_id', $blog->id)->get();

        $data = array();
        foreach ($tras as $item) {
            if ($item['idioma'] == 'es') {
                $data['nombre_es'] = $item['titulo'];
                $data['descripcion_es'] = $item['descripcion'];
            }
            if ($item['idioma'] == 'en') {
                $data['nombre_en'] = $item['titulo'];
                $data['descripcion_en'] = $item['descripcion'];
            }
            if ($item['idioma'] == 'fr') {
                $data['nombre_fr'] = $item['titulo'];
                $data['descripcion_fr'] = $item['descripcion'];
            }
            if ($item['idioma'] == 'dt') {
                $data ['nombre_dt'] = $item['titulo'];
                $data['descripcion_dt'] = $item['descripcion'];
            }
            if ($item['idioma'] == 'it') {
                $data ['nombre_it'] = $item['titulo'];
                $data['descripcion_it'] = $item['descripcion'];
            }
            if ($item['idioma'] == 'pt') {
                $data ['nombre_pt'] = $item['titulo'];
                $data['descripcion_pt'] = $item['descripcion'];
            }
            $carousel1 = CarruselTraslations::where('idioma', '=', 'es')->first();
            $enlaces = EnlaceRed::all();
            $carouseles = CarruselTraslations::where('idioma', '=', 'es')->get();


        }
        return view('home.blogs-detalles',compact('data','tras','blog','carouseles','carousel1','enlaces'));
    }
}

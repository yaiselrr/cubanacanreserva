<?php

use Illuminate\Database\Seeder;
use App\Modelos\Categoria;
use App\Modelos\CategoriaTraslation;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locales = array('es', 'en', 'fr', 'de', 'it', 'pt');
        $categoriaespanol = array('1 Estrella', '2 Estrella', '3 Estrella', '4 Estrella', '5 Estrella');
        $categoriainlges = array('1 Star', '2 Star', '3 Star', '4 Star', '5 Star');
        $categoriafrances = array('1 Etoile', '2 Etoile', '3 Etoile', '4 Etoile', '5 Etoile');
        $categoriaaleman = array('1 Stern', '2 Stern', '3 Stern', '4 Stern', '5 Stern');
        $categoriaitaliano = array('1 Stella', '2 Stella', '3 Stella', '4 Stella', '5 Stella');
        $categoriaportugues = array('1 Estrela', '2 Estrela', '3 Estrela', '4 Estrela', '5 Estrela');
        $cont1=0;
        $cont2=0;
        $cont3=0;
        $cont4=0;
        $cont5=0;
        $cont6=0;
        for ($i = 0; $i <=4; $i++)
        {
            $categorias = Categoria::create();

            foreach ($locales as $value)
            {
                if($value =='es'){

                        CategoriaTraslation::firstOrCreate(['categoria' => $categoriaespanol[$cont1],'locale'=>'es','categoria_id'=>$categorias->id]);
                        unset($categoriaespanol[$cont1]);
                        $cont1++;

                }
                elseif ($value =='en'){
                    CategoriaTraslation::firstOrCreate(['categoria' => $categoriainlges[$cont2],'locale'=>'en','categoria_id'=>$categorias->id]);
                    unset($categoriainlges[$cont2]);
                    $cont2++;
                }
                elseif ($value =='fr'){
                    CategoriaTraslation::firstOrCreate(['categoria' => $categoriafrances[$cont3],'locale'=>'fr','categoria_id'=>$categorias->id]);
                    unset($categoriafrances[$cont3]);
                    $cont3++;
                }
                elseif ($value =='de'){
                    CategoriaTraslation::firstOrCreate(['categoria' => $categoriaaleman[$cont4],'locale'=>'de','categoria_id'=>$categorias->id]);
                    unset($categoriaaleman[$cont4]);
                    $cont4++;
                }
                elseif ($value =='it'){
                    CategoriaTraslation::firstOrCreate(['categoria' => $categoriaitaliano[$cont5],'locale'=>'it','categoria_id'=>$categorias->id]);
                    unset($categoriaitaliano[$cont5]);
                    $cont5++;
                }
                elseif ($value =='pt'){
                    CategoriaTraslation::firstOrCreate(['categoria' => $categoriaportugues[$cont6],'locale'=>'pt','categoria_id'=>$categorias->id]);
                    unset($categoriaportugues[$cont6]);
                    $cont6++;
                }
            }
        }
    }
}

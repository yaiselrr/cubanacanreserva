<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Categoria;
use App\Modelos\CategoriaTraslation;
use App\Http\Requests\CategoriaStoreRequest;
use App\Http\Requests\CategoriaUpdateRequest;

class CategoriaController extends Controller
{

    public function __construct()
    {
        $this->middleware('hasPermission:categorias.create')->only(['create','store']);
        $this->middleware('hasPermission:categorias.destroy')->only(['destroy']);
        $this->middleware('hasPermission:categorias.index')->only(['index']);
        $this->middleware('hasPermission:categorias.edit')->only(['update','edit']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::join("categoria_traslations","categorias.id","=","categoria_traslations.categoria_id")
            ->where('locale','=','es')
            ->select('categorias.id','categoria_traslations.categoria','categorias.created_by')
            ->paginate();

        return view('admin.categorias.index',compact('categorias'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categorias.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaStoreRequest $request)
    {
        $validatedcategoria = $request->validated();
        $categorias = Categoria::create($validatedcategoria);
        $locales = array('es', 'en', 'fr', 'de', 'it', 'pt');

        foreach($locales as $value)
        {
            $categoria = 'categoria_'.$value;
            CategoriaTraslation::create(
                [
                    'categoria'=>$request->$categoria,
                    'categoria_id'=>$categorias->id,
                    'locale'=>$value
                ]
            );
        }

        return redirect()->route('admin.nomenclator.categorias.index')->with('success',__('cubanacan.add-content',['contenido'=>'Categorías']) );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $categoria = Categoria::find($id);
        $categoriatraslation = CategoriaTraslation::where('categoria_id', $categoria->id)->get();
        $data = array();
        foreach ($categoriatraslation as $item)
        {
            if($item['locale']=='es')
            {
                $data['categoria_es'] = $item['categoria'];
            }
            if($item['locale']=='en')
            {
                $data['categoria_en'] = $item['categoria'];
            }
            if($item['locale']=='fr')
            {
                $data['categoria_fr'] = $item['categoria'];
            }
            if($item['locale']=='de')
            {
                $data['categoria_de'] = $item['categoria'];
            }
            if($item['locale']=='it')
            {
                $data['categoria_it'] = $item['categoria'];
            }
            if($item['locale']=='pt')
            {
                $data['categoria_pt'] = $item['categoria'];
            }
        }

        return view('admin.categorias.edit',['categoria'=>$categoria],['categoriatraslation'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $categorias = Categoria::find($id);
        $categorias->update($validated);
        $categoriatraslation = CategoriaTraslation::where('categoria_id', $categorias->id)->get();
        foreach ($categoriatraslation as $item)
        {
            $categoria = 'categoria_'.$item['locale'];
            $item->update([
                'categoria'=>$request->$categoria,
            ]);
        }

        return redirect()->route('admin.nomenclator.categorias.index')->with('success',__('cubanacan.edit-content',['contenido'=>'Categorías']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categoria::destroy($id);
        return redirect()->route('admin.nomenclator.categorias.index')->with('success',__('cubanacan.delete-content',['contenido'=>'Categorías']));
    }
}

<?php

namespace App\Http\Controllers;



use Illuminate\Support\Facades\Auth;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //obtener los productos activos
        try {
            $producto = Producto::wherenull("deleted_at")->with(['color', 'categoria', 'talla', 'pedido'])->get();
            $response = $producto;

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    public function all()
    {

        try {
            $producto = Producto::orderBy("name", "asc")->with(['color', 'categoria', 'talla', 'pedido'])->get();
            $response = $producto;

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }






    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /* Request entradas del formulario enviadas,
            debe establecer las entradas requeridas para crear el videojuego
         */
        //Especificar las reglas de validación para los campos del videojuego
        //https://laravel.com/docs/8.x/validation#available-validation-rules
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string',
                'description' => 'required|string',
                'precio' => 'required|numeric',
                'pathImagen' => 'string',
                'nombreImagen' => 'string',
                'color_id' => 'required|numeric',
                'categoria_id' => 'required|numeric'
            ]
        );
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }
        try {
            //Instancia
            $producto = new Producto();
            $producto->name = $request->input('name');
            $producto->description = $request->input('description');
            $producto->precio = $request->input('precio');
            /* $producto->pathImagen = $request->input('pathImagen');
            $producto->nombreImagen = $request->input('nombreImagen');*/
            $producto->pathImagen;
            $producto->nombreImagen;
            $producto->color_id = $request->input('color_id');
            $producto->categoria_id = $request->input('categoria_id');


            //Información de la imagen
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $nombreImagen = time() . "foto." . $file->getClientOriginalExtension();
                $imageUpload = Image::make($file->getRealPath());
                $path = 'images/';
                $imageUpload->save(public_path($path) . $nombreImagen);
                $producto->nombreImagen = $nombreImagen;
                $producto->pathImagen = url($path) . "/" . $nombreImagen;
            }
            //Guardar el videojuego en la BD
            if ($producto->save()) {
                /*
            Asociarle varias tallas
            Relación de muchos a muchos
            https://laravel.com/docs/8.x/eloquent-relationships#inserting-and-updating-related-models
            */
                //Solo es necesario con la imagen
                $tallas = $request->input('talla_id');

                //Solo es necesario con la imagen
                if (!is_array($request->input('talla_id'))) {
                    //Formato array relación muchos a muchos
                    $tallas =
                        explode(',', $request->input('talla_id'));
                }
                if (!is_null($request->input('talla_id'))) {
                    //Agregar generos
                    $producto->talla()->attach($tallas);
                }
                $response = 'Producto creado!';
                return response()->json($response, 201);
            } else {
                $response = [
                    'msg' => 'Error durante la creación'
                ];
                return response()->json($response, 404);
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        try {
            //Obtener un producto
            $producto = Producto::where('id', $id)->with(['color', 'categoria', 'talla', 'pedido'])->first();
            $response = $producto;
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }


    public function update(Request $request,  $id)
    {
        //

        //BASICO
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'precio' => 'required|numeric',
            'pathImagen' => 'string',
            'nombreImagen' => 'string',
            'color_id' => 'required|numeric',
            'categoria_id' => 'required|numeric'

        ]);
        //Retornar mensajes de validación
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        //Datos del videojuego
        $producto = Producto::find($id);
        $producto->name = $request->input('name');
        $producto->description = $request->input('description');
        $producto->precio = $request->input('precio');
        $producto->pathImagen = $request->input('pathImagen');
        $producto->nombreImagen = $request->input('nombreImagen');
        $producto->color_id = $request->input('color_id');
        $producto->categoria_id = $request->input('categoria_id');


        //SI TIENE IMAGEN

        //Información de la imagen
        if ($request->hasFile('image')) {
            //Borrar la imagen anterior

            //Obtener archivo de imagen anterior
            $productoImagen
                = public_path("images/{$producto->nombreImagen}");
            if (File::exists($productoImagen)) {
                //Borrar imagen anterior
                File::delete($productoImagen);
            }

            $file = $request->file('image');
            $nombreImagen = time() . "foto." . $file->getClientOriginalExtension();
            $imageUpload = Image::make($file->getRealPath());
            $path = 'images/';
            $imageUpload->save(public_path($path) . $nombreImagen);
            $producto->nombreImagen = $nombreImagen;
            $producto->pathImagen = url($path) . "/" . $nombreImagen;
        }

        //BASICO UPDATE IF

        //Actualizar videojuego
        if ($producto->update()) {
            //Sincronice generos
            //Array de generos

            //SOLO es necesario con la imagen
            if (!is_array($request->input('talla_id'))) {
                //Formato array relación muchos a muchos
                $tallas =
                    explode(',', $request->input('talla_id'));
            }
            //SOLO RELACION UNO A MUCHOS
            if (!is_null($request->input('talla_id'))) {
                //Agregar generos
                $producto->talla()->sync($tallas);
            }
            $response = 'Producto actualizado!';
            return response()->json($response, 200);
        }
        $response = [
            'msg' => 'Error durante la actualización'
        ];

        return response()->json($response, 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}

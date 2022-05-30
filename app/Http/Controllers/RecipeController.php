<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecipeController extends Controller
{

    public function home(){
        $recipes1 = Recipe::orderBy('created_at', 'desc')->take(3)->get();
        $recipes2 = [];
        $categories = Category::all();

        return view('welcome', compact('recipes1', 'recipes2', 'categories'));
    }

    public function index(){
        $recipes = Recipe::where('user_id', auth()->user()->id)->get();
        return view('/recipes/index', compact('recipes'));
    }

    public function show($id){
        $recipe = Recipe::findOrFail($id);
        return view('/recipes/show', compact('recipe'));
    }

    public function newForm()
    {
        $categories = Category::all();
        return view('/recipes/newRecipe', compact('categories'));
    }

    public function editForm($id){
        $recipe = Recipe::findOrFail($id);
        $categories = Category::all();
        return view('/recipes/editRecipe', compact('categories', 'recipe'));
    }

    public function addRecipe(request $request){
        
        // var_dump($request->all());
        $validated = $request->validate([
            'name' => 'required|max:255',
            'tipoPlato' => 'required',
            'ingredients' => 'required',
        ]);


        if ($request->file("image")) {
            $fichero = $request->file("image");
            $ruta = public_path() . "\image/recipes/";
            $nombre_fichero = uniqid() . "-" . str_replace(' ', '_',$fichero->getClientOriginalName());
            $movido = $fichero->move($ruta, $nombre_fichero);
        } else {
            $nombre_fichero = 'default.png';
        }

        $recipe = new Recipe();
        $recipe->name = $request->name;
        $recipe->description = $request->description;
        $recipe->category_id = $request->tipoPlato;
        $recipe->ingredients = $request->ingredients;
        $recipe->preparacion = $request->preparacion;
        $recipe->image = $nombre_fichero;
        $recipe->user_id = auth()->user()->id;
        // var_dump($recipe);
        $recipe->save();

        return Redirect('/recipes')->with('success','Item created successfully!');
    }

    public function update(Request $request){
        var_dump($request->all());

        $validated = $request->validate([
            'name' => 'required|max:255',
            'tipoPlato' => 'required',
            'ingredients' => 'required',
            'preparacion' => 'required',
        ]);

        $recipe = Recipe::findOrFail($request->id);

        if ($request->delImag) {
            if ($recipe->image != 'default.png') {
                $file_path = public_path() . "/image/recipes/" . $recipe->image;
                unlink($file_path);
            }

            $recipe->image = 'default.png';
        }

        $recipe->name = $request->name;
        $recipe->description = $request->description;
        $recipe->category_id = $request->tipoPlato;
        $recipe->ingredients = $request->ingredients;
        $recipe->preparacion = $request->preparacion;

        $recipe->save();

        return Redirect('/recipes')->with('success','Item updated successfully!');
    }

    public function delete($id){
        $recipe = Recipe::findOrFail($id);
        var_dump($recipe);

        if ($recipe->image != 'default.png') {
            $file_path = public_path() . "/image/recipes/" . $recipe->image;
            unlink($file_path);
        }

        $recipe->delete();
        return Redirect('/recipes')->with('success','Item deleted successfully!');
    }

}

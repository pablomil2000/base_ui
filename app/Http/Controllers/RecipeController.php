<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecipeController extends Controller
{

    public function index(){

        $recipe1 = Recipe::latest('created_at')->paginate(3);

        $cat = Category::where('name','=', 'Entrante')->get();
        $recipe3 = Recipe::where('category_id',$cat[0]->id)->get();

        $cat = Category::where('name','=', 'Primero')->get();
        $recipe4 = Recipe::where('category_id',$cat[0]->id)->get();

        $cat = Category::where('name','=', 'Segundo')->get();
        $recipe5 = Recipe::where('category_id',$cat[0]->id)->get();

        $cat = Category::where('name','=', 'Postre')->get();
        $recipe6 = Recipe::where('category_id',$cat[0]->id)->get();

        // return $recipe3;
        return view('home', compact('recipe1', 'recipe3', 'recipe4', 'recipe5', 'recipe6'));
    }

    public function createRecipe(){
        $categories = Category::all();
        return view('recipes.create', compact('categories'));
    }

    public function GuardarReceta(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'category' =>'required',
            'prepa' =>'required',
            'ingre' =>'required',
            'image' =>'required',
        ]);

        $fichero = $request->file("image");
        $ruta = public_path() . "\image\Recipe/";
        $nombre_fichero = uniqid() . "-" . $fichero->getClientOriginalName();
        $movido = $fichero->move($ruta, $nombre_fichero);
        // return $movido;

        $recipe = new Recipe;

        $recipe->title = $request->title;
        $recipe->category_id = $request->category;
        $recipe->prepa = $request->prepa;
        $recipe->ingre = $request->ingre;
        // $recipe->image = '';
        $recipe->image = $nombre_fichero;
        $recipe->user_id = auth()->user()->id;
        $recipe->save();

        session()->flash('message','Receta Creada');
        return redirect('/recipes');
    }

    public function admin(){

        $recipes = Recipe::where('user_id', auth()->user()->id)->paginate(4);

        // return $recipes;
        return view('welcome', compact('recipes'));
    }

    public function showRecipe($id){
        if (auth()->user()) {
            $user = auth()->user()->id;
        }else {
            $user = 0;
        }
        $recipe = Recipe::findOrFail($id);
        $likes = \DB::select('SELECT * from recipe_user WHERE recipe_id = ' . $id. ' and user_id =  '.$user);
        // return $likes;

        return view('recipes.show', compact('recipe', 'likes'));
    }

    public function like($id) {
        $user = auth()->user();
        $likes = \DB::select('SELECT * from recipe_user WHERE recipe_id = ' . $id. ' and user_id =  '.$user->id);
        $message = '';
        if (!$likes) {
            $message = 'Te gusta este post';
            $user->Recipelikes()->attach($id);
        }

        return back()-> with(compact("message"));
    }

    public function dlike($id) {
        $user = auth()->user();
        $likes = \DB::select('SELECT * from recipe_user WHERE recipe_id = ' . $id. ' and user_id =  '.$user->id);
        $message = '';
        if ($likes) {
            $message = 'Te gusta este post';
            $user->Recipelikes()->detach($id);
        }

        return back()-> with(compact("message"));
    }

    public function delete($id) {
        $user = auth()->user();

        $recipe = Recipe::findOrfail($id)->where('user_id', $user->id)->first();

        if ($recipe) {
            session()->flash('message','Receta Eliminada');
            File::delete('image/recipe/' . $recipe->image);
            $recipe->delete();
        }else {
            session()->flash('message','No puedes borrar una receta de otro usuari');
        }

        return back();
    }

    public function edit($id) {
        $user = auth()->user();
        $categories = Category::all();
        $recipe = Recipe::findOrfail($id)->where('user_id', $user->id)->first();

        return view('recipes.edit', compact('recipe', 'categories'));
    }

    public function update(Request $request, $id) {
        $user = auth()->user();
        $recipe = Recipe::findOrfail($id)->where('user_id', $user->id)->first();
            $this->validate($request, [
                'title' => 'required',
                'category' =>'required',
                'prepa' =>'required',
                'ingre' =>'required',
            ]);
            // $recipe = new Recipe;
            $fichero = $request->file("image");

            if ($fichero) {
                $ruta = public_path() . "\image\Recipe/";
                $nombre_fichero = uniqid() . "-" . $fichero->getClientOriginalName();
                $movido = $fichero->move($ruta, $nombre_fichero);
                // return $movido;
                $recipe->image = $nombre_fichero;
            }


            $recipe->title = $request->title;
            $recipe->category_id = $request->category;
            $recipe->prepa = $request->prepa;
            $recipe->ingre = $request->ingre;
            // $recipe->image = '';
            $recipe->user_id = auth()->user()->id;
            $recipe->save();

            session()->flash('message','Receta Actualizada');
            return redirect('/recipes');

    }

}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Food;
use App\Models\Menu;
use App\Models\Snack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class SnackController extends Controller
{
    public function index()
    {
        return Snack::all();
    }
    public function store(Request $request)
    {
        DB::beginTransaction();
        $animal = Animal::find($request->animalId);
        $menu = $animal->menu;
        $food = DB::table('foods')->where('name','=',$request->name)->where('category','=',$request->category)->first();
       
       
        $food =  Food::find($food->id);
        $snack = $food->snacks()->create(['amount' => $request->amount]);
        if(!$snack){
            return response()->json(['error' => "Snack not found"],404);
        }
        
        $record = $animal->records()->create([
            'amount' => $animal->biometry->weight, 'date' => date("d-m-Y"), 'hour' =>date("h:i:s"),
            'food_id' => $food->id
        ]);
        if (!$record){
            return response()->json(["error" => "Could not create a Snack"],406);
        }
        $menu->snacks()->save($snack);
        $menu->refresh();
        
        DB::commit();
        return response()->json(['snack'=>$snack,'menu'=>$menu->snacks,'record'=>$record],201);
    }
    public function show(Request $request)
    {
        
        $snacks = Snack::find($request->snack);
        if(!$snacks){
            return response()->json(['error' => "Snack not found"],404);
        }
        return response()->json(['snack'=>$snacks,'food'=>$snacks->food],200);
    }
    public function update(Request $request)
    {

        $snack = Snack::find($request->snack);
        $snack->fill($request->all());
        $snack->save();
        return response()->json(['snack' => $snack],200);
    }
    
    public function destroy(Request $request)
    {
        $snack = Snack::find($request->snack);
        $snack->menus()->detach();
        $snack->delete();
        return response()->noContent();
    }
}

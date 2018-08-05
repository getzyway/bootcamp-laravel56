<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\User;
use App\User as UserMod;
use App\Model\Shop as ShopMod;
use App\Model\Product as ProductMod;
use App\Model\City as CityMod;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mods = UserMod::paginate(5);
        return view('admin.user.lists', compact('mods') );





        /*$shop = ProductMod::find(6)->shop;
        echo "<br /> Product is belongs to Shop :".$shop->name;*/

        /*$shop = ShopMod::find(1);
        echo "<br /> Shop :".$shop->name;
        echo "<br /> Shop is belongs to :".$shop->user->name;*/

        /*$products = ShopMod::find(1)->products;
        //dd($products);

        foreach ($products as $item) {
            //dd($item); exit;
            echo "<br /> Product :".$item->name." : ".$item->desc;
        }*/


        /*$user = UserMod::find(1);
        echo "<br /> User :".$user->name;

        $shop = UserMod::find(1)->shop;
        echo "<br /> Shop name :".$shop->name;

        $user = UserMod::find(1);
        echo "<br /> Shop name2 :".$user->shop->name;*/



        /*$mods = UserMod::where('active', 1)
               ->where('city', 'bangkok')
               ->where('name', 'like', '%user2%')
               ->get();

        foreach ($mods as $item) {
            echo $item->name." : ".$item->email."<br />";
        }*/

        /*$mod = UserMod::find(1);
        echo "Name :".$mod->name."<br /><br />";

        $mods = UserMod::find([1,3,4]);
        foreach ($mods as $item) {
            echo $item->name." : ".$item->email."<br />";
        }

        $max = UserMod::where('active', 1)->max('age');
        //echo "<br /> Age Max :".$max;*/

        $count = UserMod::where('active', 1)->count();
        //echo "<br /> Co :".$max;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = CityMod::all();
        return view('admin.user.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|min:2|max:50',
            'surname' => 'required|min:2|max:50',
            'mobile' => 'required|numeric',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'age' => 'required|numeric',
            'confirm_password' => 'required|min:6|max:20|same:password',
        ], [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 2 characters.',
            'name.max' => 'Name should not be greater than 50 characters.',
        ]);


        $mod = new UserMod;
        $mod->email    = $request->email;
        $mod->password = bcrypt($request->password);
        $mod->name     = $request->name;
        $mod->surname  = $request->surname;
        $mod->mobile   = $request->mobile;
        $mod->age      = $request->age;
        $mod->address  = $request->address;
        $mod->city     = $request->city;
        $mod->save();

        return redirect('admin/user')
                    ->with('success', 'User ['.$request->name.'] created successfully.');
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
    public function edit($id)
    {
        $cities = CityMod::all();
        $item   = UserMod::find($id);
        //dd($item);
        return view('admin.user.edit', compact('item', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $request->validated();
        $mod = UserMod::find($id);
        $mod->name     = $request->name;
        $mod->surname  = $request->surname;
        //$mod->email    = $request->email;
        $mod->mobile   = $request->mobile;
        $mod->surname  = $request->surname;
        $mod->age      = $request->age;
        $mod->address  = $request->address;
        $mod->city     = $request->city;
        $mod->save();

        return redirect('admin/user')
                    ->with('success', 'User ['.$request->name.'] updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mod = UserMod::find($id);
        $mod->delete();
        return redirect('admin/user')
                ->with('success', 'User ['.$mod->name.'] deleted successfully.');
    }
}

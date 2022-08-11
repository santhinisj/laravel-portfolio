<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Social;

class SocialsController extends Controller
{
    public function list()
    {
        return view('socials.list', [
            'socials' => Social::all()
        ]);
    }

    public function addForm()
    {
        return view('socials.add');
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'name' => 'required',
            'url' => 'nullable|url'
        ]);

        $social = new Social();
        $social->name = $attributes['name'];
        $social->url = $attributes['url'];
       
        $social->user_id = Auth::user()->id;
        $social->save();

        return redirect('/console/socials/list')
            ->with('message', 'social has been added!');
    }

    public function editForm(Social $social)
    {
        return view('socials.edit', [
            'social' => $social
        ]);
    }

    public function edit(Social $social)
    {

        $attributes = request()->validate([
            'name' => 'required',
            'url' => 'nullable|url'
        ]);

        $social->name = $attributes['name'];
        $social->url = $attributes['url'];
        $social->save();

        return redirect('/console/socials/list')
            ->with('message', 'social has been edited!');
    }

    public function delete(Social $social)
    {
        $social->delete();
        
        return redirect('/console/socials/list')
            ->with('message', 'social has been deleted!');        
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Educational;

class EducationalsController extends Controller
{
    public function list()
    {
        return view('educationals.list', [
            'educationals' => Educational::all()
        ]);
    }

    public function addForm()
    {
        return view('educationals.add');
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'credential' => 'required',
            'institution' => 'required',
            'year' => 'required'

        ]);

        $educational = new Educational();
        $educational->credential = $attributes['credential'];
        $educational->institution = $attributes['institution'];
        $educational->year = $attributes['year'];
       
        $educational->user_id = Auth::user()->id;
        $educational->save();

        return redirect('/console/educationals/list')
            ->with('message', 'educational has been added!');
    }

    public function editForm(Educational $educational)
    {
        return view('educationals.edit', [
            'educational' => $educational
        ]);
    }

    public function edit(Educational $educational)
    {

        $attributes = request()->validate([
            'credential' => 'required',
            'institution' => 'required',
            'year' => 'required'
        ]);

        $educational->credential = $attributes['credential'];
        $educational->institution = $attributes['institution'];
        $educational->year = $attributes['year'];
        $educational->save();

        return redirect('/console/educationals/list')
            ->with('message', 'educational has been edited!');
    }

    public function delete(Educational $educational)
    {
        $educational->delete();
        
        return redirect('/console/educationals/list')
            ->with('message', 'educational has been deleted!');        
    }


}

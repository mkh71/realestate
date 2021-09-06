<?php

namespace App\Http\Controllers\backend;

use App\HomeType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypeController extends Controller
{

    public function index()
    {
        $infos = HomeType::all();
        return view('backend.homeType.index', compact('infos'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required | unique:home_types'
        ]);
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $img = $request->file("image");
            $image = uploadImage('property_type/', $img);
            $data['icon'] =  $image;
        }
        HomeType::query()->create($data);
        return redirect()->back()->with('success',' Type Has been added successfully');
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
        $data = HomeType::query()->findOrFail($id);
        return view('backend.homeType.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $type = HomeType::query()->find($id);

        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $img = $request->file("image");
            $image = uploadImage('property_type/', $img);
            $data['icon'] =  $image;
            if ($type ->icon != null){
                unlink(public_path('storage/'.$type ->icon));
            }
        }
        $type->update($data);

        return redirect(route('types.index'))->with('success', 'Type has been updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

}

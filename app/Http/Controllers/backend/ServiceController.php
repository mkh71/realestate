<?php
namespace App\Http\Controllers\backend;

use App\Helper;
use App\Http\Controllers\Controller;
use App\Service;
use App\ServiceImage;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
//    public function __construct(){
//        $this->middleware('auth');
//    }

    public function index(){
        $datas = Service::all();
        return view('backend.service.index', compact('datas'));
    }

     public function store(Request $request){
         $this->validate($request, [
             'name' => 'required | unique:services',
             'type' => 'required'
         ]);
         $data = $request->except('image');
         $service = Service::query()->create($data);
         if ($request->hasFile('image') && $service) {
             foreach ($request->file("image") as $img){
                 $image = uploadImage('services/'.$request->type, $img);

                 $service_img['service_id'] = $service->id;
                 $service_img['url'] = $image;
                 ServiceImage::query()->create($service_img);
             }
         }
         return redirect()->back()->with('success', 'Service Added Successfully');

    }

    public function edit($id){
        $data = Service::query()->findOrFail($id);
        return view('backend.service.edit',compact('data'));
    }

    public function update(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required'
        ]);
        $service = Service::query()->find($request->id);
        $data = $request->except('image', 'prev_image');
        if ($service AND $request->hasFile('image')) {
            foreach ($request->file("image") as $img){
                $image = uploadImage('services/'.$request->type, $img);
                $service_img['service_id'] = $service->id;
                $service_img['url'] = $image;
                ServiceImage::query()->create($service_img);
            }
        }
        if ($request->has('prev_image')){
            foreach ($request->prev_image as $image){
                $dlt = ServiceImage::query()->findOrFail($image);
                if ($dlt){
                    $succ = unlink(public_path('storage/'.$dlt->url));
                    if ($succ) $dlt->delete();
                }
            }
        }
        $service->update($data);
        return redirect()->route('service_index')->with('success', "Service is updated successfully");
    }

    public function erase(Request $request){
        $service = Service::query()->findOrFail($request->id);

        if (count($service->serviceImage)>0){
            foreach ($service->serviceImage as $image){
                $dlt = ServiceImage::query()->findOrFail($image->id);
                if ($dlt){
                    unlink(public_path('storage/'.$dlt->url));
                }
            }
        }
        $service->delete();
        return redirect(route('service_index'))->with('success',' Service Has been Deleted successfully');
    }

}

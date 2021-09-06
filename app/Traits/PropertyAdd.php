<?php
namespace App\Traits;

use App\Feature;
use App\Nearby;
use App\Property;
use App\PropertyDocument;
use App\PropertyImage;
use App\UserPackage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Exception;
use function GuzzleHttp\Promise\all;

trait PropertyAdd
{
    public function property_insert($request){
        //dd($request->all());
        $validation = $this->validation($request);

        if ($validation == 0)
            return 0;

        $collection = $this->collection($request,1);

        if ($collection['pack'] == "pack0")
            return "pack0";
        if ($collection['pack'] == 'packActive0')
            return 'packActive0';

        try {
            DB::beginTransaction();
            $pInsert = Property::query()->create($collection['property']);

            if ($request->hasFile('cover_image')) {
                foreach ($request->file("cover_image") as $img) {
                    $Cimage = uploadImage('property/' . auth()->id().'/'.$pInsert->id, $img);
                    $cover['cover_image'] = $Cimage;
                }
                $pInsert->update($cover);
            }


            if ($pInsert){
                $k = 0;
                $docs =[];
                if ($request->hasFile('doc_pdf')) {
                    $k = 1;
                    $pdf = $request->file('doc_pdf')->store('property/' . auth()->id().'/'.$pInsert->id.'/docs', ['disk' => 'public']);
                    $docs['doc_pdf'] = $pdf;
                }
                if ($request->hasFile('other_pdf')) {
                    $k = 1;
                    $other_pdf = $request->file('other_pdf')->store('property/' . auth()->id().'/'.$pInsert->id.'/docs', ['disk' => 'public']);
                    $docs['other_pdf'] = $other_pdf;
                }

                /*Youtube link check*/
                if($request->youtube_video != null ){
                    $k = 1;
                    $urlEq = explode('=', $request->youtube_video);
                    $urlSl = explode('/', $request->youtube_video);
                    if (count($urlEq) == 2){
                        $ytUrl = $urlEq[1];
                    }elseif (count($urlSl) == 4){
                        $ytUrl = $urlSl[3];
                    }else $ytUrl =  null;;
                }
                /*metterport link check*/
                if($request->matterport_video != null ){
                    $k = 1;
                    $url = explode('/', $request->matterport_video);
                    if (count($url) == 4){
                        $Mtrurl = $url[0].'//'.$url[1].''.$url[2];
                        if ($Mtrurl == 'https://my.matterport.com')
                            $Mtrurl = $request->matterport_video;
                        else $Mtrurl = null;
                    }
                    else $Mtrurl = null;
                }
                $docs['youtube_video'] = $ytUrl;
                $docs['matterport_video'] = $Mtrurl;

                if ($k == 1){
                    $docs['property_id'] = $pInsert->id;
                    $pDocs = PropertyDocument::query()->create($docs);
                }

                if ($request->hasFile('url')) {
                    foreach ($request->file("url") as $img){
                        $image = uploadImage('property/'.auth()->id().'/'.$pInsert->id, $img);
                        $pImgs['property_id'] = $pInsert->id;
                        $pImgs['url'] = $image;
                        PropertyImage::query()->create($pImgs);
                    }
                }
                $PID['property_id'] = $pInsert->id;
                $feature = array_merge($PID,$collection['feature']);
                Feature::query()->create($feature);

                /*Nearby Schools*/
                if($request->has('schools')){
                    foreach($request->schools as $school){
                        $data = explode('#', $school);
                        $nearSchool['property_id'] = $pInsert->id;
                        $nearSchool['type'] = "school";
                        $nearSchool['name'] = $data[0];
                        $nearSchool['rating'] = $data[1];
                        Nearby::query()->create($nearSchool);
                    }
                }
                /*Nearby Medical*/
                if($request->has('medicals')){
                    foreach($request->medicals as $medical){
                        $data = explode('#', $medical);
                        $medical['property_id'] = $pInsert->id;
                        $medical['type'] = "medical";
                        $medical['name'] = $data[0];
                        $medical['rating'] = $data[1];
                        Nearby::query()->create($medical);
                    }
                }
                /*Nearby Schools*/
                if($request->has('restaurants')){
                    foreach($request->restaurants as $restaurant){
                        $data = explode('#', $restaurant);
                        $restaurant['property_id'] = $pInsert->id;
                        $restaurant['type'] = "restaurant";
                        $restaurant['name'] = $data[0];
                        $restaurant['rating'] = $data[1];
                        Nearby::query()->create($restaurant);
                    }
                }
            }

            DB::commit();
        }catch (Exception $exception){
            DB::rollBack();
            return ['400'=>$exception];
        }

        return 201;
    }

    public function propertyUpdate($request){
        $validation= $this->validation($request);
        if ($validation == 0)
            return 0;

        $collection = $this->collection($request, 0);
        $info = Property::query()->findOrFail($request->id);

        try {
            DB::beginTransaction();
            $pInsert = $info->update($collection['property']);

            if ($request->hasFile('cover_image')) {
                foreach ($request->file("cover_image") as $img) {
                    $Cimage = uploadImage('property/' . auth()->id().'/' .$info->id , $img);
                    $property['cover_image'] = $Cimage;
                }
                $cimg = $info->cover_image;
            }

            if ($pInsert){
                $k = 0;  $cimg = $dpdf = $dopdf = $ytUrl = $Mtrurl = null;
                $docs=[];
                if ($request->hasFile('doc_pdf')) {
                    $k = 1;
                    $pdf = $request->file('doc_pdf')->store('property/' . auth()->id().'/' .$info->id. '/docs', ['disk' => 'public']);
                    $docs['doc_pdf'] = $pdf;
                    $dpdf = $info->document->doc_pdf;
                }
                if ($request->hasFile('other_pdf')) {
                    $k = 1;
                    $other_pdf = $request->file('other_pdf')->store('property/' . auth()->id().'/' .$info->id. '/docs', ['disk' => 'public']);
                    $docs['other_pdf'] = $other_pdf;
                    $dopdf = $info->document->other_pdf;
                }

                /*Youtube link check*/
                if($request->youtube_video != null ){
                    $k = 1;
                    $urlEq = explode('=', $request->youtube_video);
                    $urlSl = explode('/', $request->youtube_video);
                    if (count($urlEq) == 2){
                        $ytUrl = $urlEq[1];
                    }elseif (count($urlSl) == 4){
                        $ytUrl = $urlSl[3];
                    }else $ytUrl =  null;;
                }
                /*metterport link check*/
                if($request->matterport_video != null ){
                    $k = 1;
                    $url = explode('/', $request->matterport_video);
                    if (count($url) == 4){
                        $Mtrurl = $url[0].'//'.$url[1].''.$url[2];
                        if ($Mtrurl == 'https://my.matterport.com')
                            $Mtrurl = $request->matterport_video;
                        else $Mtrurl = null;
                    }
                    else $Mtrurl = null;
                }
                $docs['youtube_video'] = $ytUrl;
                $docs['matterport_video'] = $Mtrurl;


                if ($k == 1){
                    $pDocs = PropertyDocument::query()->where('property_id', $info->id);
                    $pDocs->update($docs);
                }
                if ($request->hasFile('url')) {
                    $pic = 0;
                    if ( (count($info->images)) <=20){
                        foreach ($request->file("url") as $img){
                            if ( ($pic +count($info->images)) <=20) {
                                $image = uploadImage('property/'.auth()->id().'/' .$info->id, $img);
                                $pImgs['property_id'] = $info->id;
                                $pImgs['url'] = $image;
                                PropertyImage::query()->create($pImgs);
                                $pic++;
                            }
                            else break;
                        }
                    }
                }
                $featurePro = Feature::query()->where('property_id', $info->id);
                $update = $featurePro->update($collection['feature']);

                if ($cimg) unlink(public_path('storage/'.$cimg));
                if ($dpdf) unlink(public_path('storage/'.$dpdf));
                if ($dopdf) unlink(public_path('storage/'.$dopdf));
            }

            DB::commit();
        }catch (Exception $exception){
            DB::rollBack();
            return ['400'=>$exception];
        }

        return 201;
    }

    private function collection($request, $status){
        $data = $request->except(['url','cover_image','preloaded','_token','youtube_video','matterport_video']);

        if ($status == 1){ // 1 for Insertion
            $property['user_id'] = auth()->id();
            $property['for'] = $data['for'];
            $property['home_type_id'] = $data['home_type_id'];
            $property['address'] = $data['address'];
            $property['state'] = $data['state'];
            $property['city'] = $data['city'];
            $property['area'] = $data['area'];
            $property['postal_code'] = $data['postal_code'];
            $property['country'] = $data['country'];
            $property['street'] = $data['street'];
            $property['lat'] = $data['lat'];
            $property['long'] = $data['long'];

            if (auth()->user()->type == 'user' ){
                if (count(auth()->user()->UserPackages) <= 0)
                    return ['status'=>0, "pack"=>'pack0'];

                $x = 0;
                $Apack =[];
                foreach(auth()->user()->UserPackages as $pack){
                    if ($pack->status != 0){
                        $x = 1;
                        $Apack = $pack;
                        break;
                    }
                }
                if ($x == 0)
                    return ['status'=>0, "pack"=>'packActive0'];
                else
                    $con = ['status'=>1, "pack"=>$Apack];
            }
            else
                $con = ['status'=>2, "pack"=>'admin'];

            if ($request->userPackage_id){
                $pack_id = $request->userPackage_id;
            }elseif($con['status']==1){
                $pack_id = $con['pack']->id;
            }

            if ($con['pack'] == "admin"){
                $property['user_packages_id'] = null;
                $property['status'] = 1;
            }else{
                $property['user_packages_id'] = $pack_id;
                $property['status'] = 0;
            }

        }else{ // for Updating
            $info = Property::query()->findOrFail($request->id);
            $data = array_filter($data);
            if (auth()->user()->type == 'user') $property['for'] = $info->for;
            else $property['for'] = $data['for'];
        }

        $property['title'] = $data['title'];
        $property['description'] = $data['description'];
        $property['size'] = $data['size'];
        $property['price'] = $data['price'];
        $property['bedroom'] = $data['bedroom'];
        $property['bathroom'] = $data['bathroom'];

        $property['available_from'] = date("Y-m-d", strtotime($request->available_from));

        $features = array_diff($data, $property,[$data['available_from']??null]);
        $checkbox['dining'] = $data['dining'] ?? null;
        $checkbox['drawing'] = $data['drawing'] ?? null;
        $checkbox['basement'] = $data['basement'] ?? null;
        $checkbox['public_gasline'] = $data['public_gasline'] ?? null;
        $checkbox['public_waterline'] = $data['public_waterline'] ?? null;
        $checkbox['furnished'] = $data['furnished'] ?? null;
        $checkbox['swimming_pool'] = $data['swimming_pool'] ?? null;
        $checkbox['outdoor_shower'] = $data['outdoor_shower'] ?? null;
        $checkbox['wifi'] = $data['wifi'] ?? null;
        $checkbox['ac'] = $data['ac'] ?? null;
        $checkbox['tv_cable'] = $data['tv_cable'] ?? null;
        $checkbox['laundry'] = $data['laundry'] ?? null;
        $checkbox['gym'] = $data['gym'] ?? null;
        $checkbox['front_yard'] = $data['front_yard'] ?? null;
        $checkbox['private_space'] = $data['private_space'] ?? null;
        $checkbox['lawn'] = $data['lawn'] ?? null;
        $checkbox['sauna'] = $data['sauna'] ?? null;
        $checkbox['wine_cellar'] = $data['wine_cellar'] ?? null;
        $checkbox['pet_allow'] = $data['pet_allow'] ?? null;
        $checkbox['refrigerator'] = $data['refrigerator'] ?? null;
        $checkbox['dishwasher'] = $data['dishwasher'] ?? null;
        $checkbox['dryer'] = $data['dryer'] ?? null;
        $checkbox['microwave'] = $data['microwave'] ?? null;
        $checkbox['washer'] = $data['washer'] ?? null;
        $checkbox['barbeque'] = $data['barbeque'] ?? null;
        $checkbox['window_covering'] = $data['window_covering'] ?? null;
        $checkbox['other_appliance'] = $data['other_appliance'] ?? null;
        $feature = array_filter(array_merge($features, $checkbox));

        return (["property"=>$property, "feature"=>$feature, 'pack'=>'ok']);


    }

    private function validation($request){
        $validation = Validator::make($request->all(), [
            'title' => 'required',
            'address' => 'required',
            'price' => 'required',
            'bedroom' => 'required',
            'bathroom' => 'required',
            'home_type_id' => 'required',
            'lat' => 'required',
            'long' => 'required'
        ]);
        if ($validation->fails()) return 0;
        else return true;
    }

    public function condition(){
        if (type() ==0 ){
            if (count(auth()->user()->UserPackages) <= 0)
                return ['status'=>0, "pack"=>'pack0'];
            $x = 0;
            $Apack =[];
            foreach(auth()->user()->UserPackages as $pack){
                if ($pack->status != 0){
                    $x = 1;
                    $Apack = $pack;
                    break;
                }
            }
            if ($x == 0)
                return ['status'=>0, "pack"=>'packActive0'];
            else return ['status'=>1, "pack"=>$Apack];
        }
        else
            return ['status'=>2, "pack"=>'admin'];
    }
}

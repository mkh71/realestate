<?php
namespace App\Http\Controllers\backend;

use App\Company;
use App\CoverPic;
use App\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;

class WebController extends Controller
{
    public function company_edit(){
        $company = Company::query()->find(1);
        return view('backend.company.edit',compact('company'));
    }

    public function company_update(Request $request){
        $company = Company::query()->find(1);
        $data = $request->except(['logo','favicon','mobile_logo','footer_logo']);
        /* Main Logo */
        if ($request->hasFile('logo')){
            $data['logo'] = uploadImage('logo', $request->file('logo'));
            if ($company && $company->logo !=null){
                unlink(public_path('storage/'.$company->logo));
            }
        }

        /* FavIcon Logo */
        if ($request->hasFile('favicon')){
            $data['favicon'] = uploadImage('logo', $request->file('favicon'));
            if ($company && $company->favicon !=null){
                unlink(public_path('storage/'.$company->favicon));
            }
        }


        /* Mobile Logo */
        if ($request->hasFile('mobile_logo')){
            if ($request->hasFile('mobile_logo')){
                $data['mobile_logo'] = uploadImage('logo', $request->file('mobile_logo'));
                if ($company && $company->mobile_logo !=null){
                    unlink(public_path('storage/'.$company->mobile_logo));
                }
            }
        }


        /* Footer Logo */
        if ($request->hasFile('footer_logo')){
            if ($request->hasFile('footer_logo')){
                $data['footer_logo'] = uploadImage('logo', $request->file('footer_logo'));
                if ($company && $company->footer_logo !=null){
                    unlink(public_path('storage/'.$company->footer_logo));
                }
            }
        }

        $company->update($data);
        session()->flash('success','Company Profile Updated');
        return redirect()->route('company.edit');

    }

    public function coverpic_add(){
        $infos = CoverPic::query()->get();
        return view('backend.coverpic.index', compact('infos'));
    }

    public function coverpic_update(Request $request){
        $home_cover = CoverPic::query()->find(1);
        $data['title'] = $request->home_title;
        if ($request->hasFile('home_cover')){
            $data['url'] =  $request->file('home_cover')->store('coverpic', ['disk' => 'public']);
            $data['type'] = 'Home Cover';
            if ($home_cover && $home_cover->url !=null) unlink(public_path('storage/'.$home_cover->url));
        }
        $home_cover->update($data);

        $data = [] ;
        $service_cover = CoverPic::query()->find(2);
        $data['title'] = $request->service_title;
        if ($request->hasFile('service_cover')){
            $data['url'] = $request->file('service_cover')->store('coverpic', ['disk' => 'public']);
            $data['type'] = 'Service Cover';
            if ($service_cover && $service_cover->url !=null) unlink(public_path('storage/'.$service_cover->url));

        }
        $service_cover->update($data);

        $data =[] ;
        $img = CoverPic::query()->find(3);
        $data['title'] = $request->contact_title;
        if ($request->hasFile('contact_cover')){
            $data['url'] =  $request->file('contact_cover')->store('coverpic', ['disk' => 'public']);
            $data['type'] = 'Contact Cover';
            if ($img && $img->url !=null) unlink(public_path('storage/'.$img->url));
        }
        $img->update($data);
        return redirect()->back()->with('success', 'Cover Image(s) Updated Successfully');
    }
}

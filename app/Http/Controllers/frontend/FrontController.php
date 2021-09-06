<?php
namespace App\Http\Controllers\frontend;
use App\Feature;
use App\HomeType;
use App\Http\Controllers\Controller;
use App\Package;
use App\Property;
use App\Service;
use App\User;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $user_ids = User::query()->where('status', 1)->get(['id']);
        $types = HomeType::query()->where('status', 1)->get();
        $type_ids = HomeType::query()->where('status', 1)->get(['id']);

        $rents= Property::query()
                ->where('status', 1)
                ->whereIn('user_id', $user_ids)
                ->whereIn('home_type_id', $type_ids)
                ->where('for', 0)
                ->inRandomOrder()
                ->limit(24)
                ->get();
        $sells= Property::query()
                ->where('status', 1)
                ->whereIn('user_id', $user_ids)
                ->whereIn('home_type_id', $type_ids)
                ->where('for', 1)
                ->inRandomOrder()
                ->limit(24)
                ->get();
        $services = Service::query()->where('status', 1)->inRandomOrder()->limit(6)->get();

        $cities = Property::query()
            ->where('status', 1)
            ->whereNotNull('city')
            ->get(['city'])
            ->unique('city');
        return view('index', compact('rents', 'sells', 'types', 'services'));

    }

    public function single_property($id){
        $info = Property::query()->find(decrypt($id));
        if (auth()->id() != $info->user_id){
            $view['user_view'] = $info->user_view +1;
            $info->update($view);
        }

        /*$schools = $info->nearbies->where('type', 'school');
        $medicals = $info->nearbies->where('type', 'medical');
        $restaurants = $info->nearbies->where('type', 'restaurant');*/

        /*Getting Yes/No features name collection*/
        $FeatureModel = new Feature();
        $FModel = $FeatureModel->getFillable();
        $FeatureModel = array_splice($FModel, 26, 51);

        /*Similar Properties*/
        $similar = Property::query()
            ->where('status', 1)
            ->where('home_type_id', $info->home_type_id)
            ->where('for', $info->for)
            ->where('country', $info->country)
            ->where('city', $info->city)
            ->whereKeyNot($info->id)->get();

        $owner_properties = Property::query()
            ->where('status', 1)
            ->where('user_id', $info->user_id)
            ->whereKeyNot($info->id)->get();
        return view('website.single-property', compact('info', 'FeatureModel', 'similar', 'owner_properties'));
    }

    public function all_properties(Request $request){
        $data = Property::query()->where('status', 1);
        if ($request->has('for'))
            $data->where('for', decrypt($request->for));

        if ($request->has('home_type'))
            $data->where('home_type_id', decrypt($request->home_type));

        $infos=$data->paginate(15);

        return view('website.all-properties', compact('infos'));
    }

    public function services(){
        $maintenance = Service::query()->where('status', 1)->where('type', 'Maintenance')->get();
        $development = Service::query()->where('status', 1)->where('type', 'Development')->get();
        return view('website.services', compact('maintenance', 'development'));
    }

    public function service_dtl($id){
        $info = Service::query()->find($id);
        $services = Service::query()->where('status', 1)->where('type', $info->type)->get();

        return view('website.service-details', compact('info', 'services'));
    }

    public function packages(){
        $packages = Package::query()->where('status', 1)->get();
        return view('website.packages', compact('packages'));
    }

    public function search_properties(Request $request){
        $data= Property::query()->where('status', 1);
        if ($request->price){
            $p1 = explode(' ', $request->price)[0];
            $p2 = explode(' ', $request->price)[2];
            $data->whereBetween('price', [substr($p1, 1),str_replace(",", "", substr($p2, 1))]);
        }

        if ($request->status != null)
            $data->where('for', $request->status);

        if ($request->home_type_id != null)
            $data->where('home_type_id', $request->home_type_id);

        if ($request->state != null)
            $data->where('state', $request->state);

        if ($request->city != null)
            $data->where('city', $request->city);

        if ($request->bedroom != null)
            $data->whereBetween('bedroom', [0,$request->bedroom])->orderByDesc('bedroom');

        if ($request->bathroom != null)
            $data->where('bathroom', [0,$request->bathroom])->orderByDesc('bathroom');

        if ($request->keyword != null){
            $data->where('title', 'like','%'.$request->keyword.'%')
                ->orWhere('address', 'like','%'.$request->keyword.'%')
                ->orWhere('postal_code', 'like',$request->keyword);
        }

        $infos = $data->inRandomOrder()->paginate(15);
        $jsonData = json_encode(['data'=>$data->get()]);

        return view('website.search', compact('infos', 'request', 'jsonData'));
    }

    public function comparison(Request $request){
        $data = Property::query()
            ->whereIn('id', $request->id)->get();

        return view('website.compare', compact('data'));

    }

}

<?php
    use App\Booking;
    use App\Property;
    use App\Tour;
    use \App\UserService;

    function type(){
        $type= auth()->user()->type;
        if ($type != 'user') return 1; //Admin
        else return 0; //user
    }

    function uploadImage($folder = "uploads", $image)
    {
        //dd($folder,$image);
        return $image->store($folder, ['disk' => 'public']);
    }

    function company(){
        return \App\Company::query()->find(1);
    }
    function homeCover(){
        return \App\CoverPic::query()->find(1);
    }

    function rent_requ(){
        $ids = myActiveProperties();
        return Booking::query()
            ->whereIn('property_id', $ids)
            ->where('for', 0)
            ->where('status', 0)
            ->get()->count();
    }

    function SrtRent_requ(){
        $ids = myActiveProperties();
        return Booking::query()
            ->whereIn('property_id', $ids)
            ->where('for', 2)
            ->where('status', 0)
            ->get()->count();
    }
    function buy_requ(){
        $ids = myActiveProperties();
        return Booking::query()
            ->whereIn('property_id', $ids)
            ->where('for', 1)
            ->where('status', 0)
            ->get()->count();
    }
    function tour_requ(){
        $ids = myActiveProperties();
        return Tour::query()
            ->whereIn('property_id', $ids)
            ->where('status', 0)
            ->get()->count();
    }
    function rent_advt_requ(){
        return Property::query()
            ->where('for', 0)
            ->where('status', 0)
            ->get()->count();
    }
    function sell_advt_requ(){
        return Property::query()
            ->where('for', 1)
            ->where('status', 0)
            ->get()->count();
    }

    function service_requ(){
        return UserService::query()
            ->where('status', 0)
            ->get()->count();
    }

    function myProperties(){
        return Property::query()->where('user_id', auth()->id())->get(['id']);
    }

    function myActiveProperties(){
        return Property::query()
            ->where('user_id', auth()->id())
            ->where('status', 1)
            ->get(['id']);
    }

    function propertyAvailability($id){
        $property = Property::query()->find($id);
        if ($property->advertising_close != null &&
            $property->advertising_close < date('Y-m-d H:i:s')
        ) return 1;
        else return 0;
    }

    function homeTypes(){
        return \App\HomeType::query()->where('status', 1)->pluck('name', 'id');
    }

    function cities(){
        return Property::query()
            ->where('status', 1)
            ->whereNotNull('city')
            ->get(['city'])
            ->unique('city');
    }

    function states(){
        return Property::query()
            ->where('status', 1)
            ->whereNotNull('state')
            ->get(['state'])
            ->unique('state');
    }

<li class="{{($prefix=='home/properties' && $route=='property_add') ? 'active-sub active':''}}">
    <a href="{{route('property_add')}}">
        <svg class="icon icon-add-new"><use xlink:href="#icon-add-new"></use></svg>
        <span class="menu-title">Add Property</span>
    </a>
</li>

<li class="{{($prefix=='home/properties' && $route=='property_index')? 'active-sub active':''}}">
    <a href="{{route('property_index',['status'=>1])}}"> <i class="fa fa-building-o"></i>
        <span class="menu-title">View Properties </span>
        <span class="badge badge-warning">{{count(myActiveProperties())}}</span>
    </a>
</li>
<li class="{{($prefix=='control/my-property')? 'active-sub active':''}}">
    <a href="#">
        <svg class="icon icon-my-properties"><use xlink:href="#icon-my-properties"></use></svg>
        <span class="menu-title {{rent_requ()>0 || SrtRent_requ()>0 || buy_requ()>0 || tour_requ()>0 ? 'text-success':'' }}">My Property{{rent_requ()>0 || SrtRent_requ()>0 || buy_requ()>0 || tour_requ()>0 ? ' *':'' }}</span>
        <i class="arrow"></i>
    </a>
    <!--Submenu-->
    <ul class="collapse">
        <li class="">
            <a class="menu-item" href="{{route('get_request', ['status'=>0,'for'=>0])}}">
                <i class="ion-merge"></i> Long Rent Request
                <span class="badge badge-primary {{rent_requ()>0 ? 'sidebar-item-active':'sidebar-item-number' }}">{{rent_requ()}}</span>
            </a>
        </li>
        <li class="">
            <a class="menu-item" href="{{route('get_request', ['status'=>0,'for'=>2])}}">
                <i class="ion-merge"></i> Short Rent Request
                <span class="badge badge-primary {{SrtRent_requ()>0 ? 'sidebar-item-active':'sidebar-item-number' }}">{{SrtRent_requ()}}</span>
            </a>
        </li>
        <li class="">
            <a class="menu-item" href="{{route('get_request', ['status'=>0,'for'=>1])}}">
                <i class="ion-merge"></i> Buy Request
                <span class="badge badge-success {{buy_requ()>0 ? 'sidebar-item-active':'sidebar-item-number' }}">{{buy_requ()}}</span>
            </a>
        </li>
        <li class="">
            <a class="menu-item" href="{{route('get_request', ['status'=>0,'for'=>3])}}">
                <i class="ion-merge"></i> Tour Request
                <span class="badge badge-primary {{tour_requ()>0 ? 'sidebar-item-active':'sidebar-item-number' }}">{{tour_requ()}}</span>
            </a>
        </li>
        {{--<li class="">
            <a class="menu-item" href="{{route('active_users',[0,0])}}">
                <i class="ion-merge"></i> Active User List
            </a>
        </li>--}}

        <li class="">
            <a class="menu-item" href="">
                <i class="ion-merge"></i> Transactions
            </a>
        </li>
    </ul>
</li>

<li class="list-group-item sidebar-item">
    <a href="{{route('my_profile')}}" class="text-heading lh-1 sidebar-link">
        <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
            <svg class="icon icon-my-profile"><use xlink:href="#icon-my-profile"></use></svg>
        </span>
        <span class="sidebar-item-text">My Profile</span>
    </a>
</li>
<li class="list-group-item sidebar-item">
    <a href="{{route('logout') }}"
       onclick="event.preventDefault();
       document.getElementById('logoutForm').submit();" class="text-heading lh-1 sidebar-link">
        <span class="sidebar-item-icon d-inline-block mr-3 text-muted fs-20">
            <svg class="icon icon-log-out"><use xlink:href="#icon-log-out"></use></svg>
        </span>
        <span class="sidebar-item-text">Log Out</span>
    </a>
    <form id="logoutForm" action="{{ route('logout') }}" method="POST">
        {{ csrf_field() }}
    </form>
</li>

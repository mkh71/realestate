<!--MAIN NAVIGATION-->
<!--===================================================-->
<nav id="mainnav-container">
    <div id="mainnav">
        <!--Menu-->
        <!--================================-->
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content">
                    <!--Shortcut buttons-->
                    <!--================================-->
                    <div id="mainnav-shortcut" class="hidden">
                        <ul class="list-unstyled shortcut-wrap">
                            <li class="col-xs-3" data-content="My Profile">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-mint">
                                        <i class="demo-pli-male"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Messages">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-warning">
                                        <i class="demo-pli-speech-bubble-3"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Activity">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-success">
                                        <i class="demo-pli-thunder"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Lock Screen">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-purple">
                                        <i class="demo-pli-lock-2"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--================================-->
                    <!--End shortcut buttons-->
                    @php
                        $prefix=Request::route()->getPrefix();
                        $route=Route::current()->getName();
                        //dd($prefix, $route)
                    @endphp

                    <ul id="mainnav-menu" class="list-group">
                        <!--Category name-->
                        <li class="list-header">Navigation</li>

                        <!--Menu list item-->
                        <li class="{{($route=='admin')? 'active-sub active':''}}">
                            <a href="{{url('/home')}}">
                                <i class="demo-pli-home"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>

                        <li class="{{($prefix=='dashboard/settings')? 'active-sub active':''}}">
                            <a href="#">
                                <i class="fa fa-cog"></i>
                                <span class="menu-title">Settings</span>
                                <i class="arrow"></i>
                            </a>
                            <!--Submenu-->
                            <ul class="collapse">
                                <li class="">
                                    <a class="menu-item" href="{{route('types.index')}}">
                                        <i class="ion-merge"></i> Home Type
                                    </a>
                                </li>
                                <li class="">
                                    <a class="menu-item" href="{{route('company.edit')}}">
                                        <i class="ion-merge"></i> Company Settings
                                    </a>
                                </li>
                                <li class="">
                                    <a class="menu-item" href="{{route('coverpic.add')}}">
                                        <i class="ion-merge"></i> Cover Pic Settings
                                    </a>
                                </li>
                                <li class="">
                                    <a class="menu-item" href="{{route('packages.index')}}">
                                        <i class="ion-merge"></i> Packages
                                    </a>
                                </li>
                                <li class="">
                                    <a class="menu-item" href="{{route('service_index')}}">
                                        <i class="fa fa-server"></i> Add/View Services
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="{{($prefix=='dashboard/package-service')? 'active-sub active':''}}">
                            <a href="#">
                                <i class="fa fa-cog"></i>
                                <span class="menu-title {{service_requ()>0 ? 'text-success':'' }}">Package & Services{{service_requ()>0 ? ' *':'' }}</span>
                                <i class="arrow"></i>
                            </a>
                            <!--Submenu-->
                            <ul class="collapse">
                                <li class="">
                                    <a class="menu-item" href="{{route('service_request', 0)}}">
                                        <i class="ion-merge"></i> Service Request
                                        <span class="badge badge-primary sidebar-item-number ml-auto {{service_requ()>0 ? 'sidebar-item-active':'sidebar-item-number' }}">{{service_requ()}}</span>
                                    </a>
                                </li>

                                <li class="">
                                    <a class="menu-item" href="{{route('package_request',0)}}">
                                        <i class="ion-merge"></i> User Packages
                                    </a>
                                </li>

                                <li class="">
                                    <a class="menu-item" href="{{route('coverpic.add')}}">
                                        <i class="ion-merge"></i> Transactions
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="{{($prefix=='dashboard/advertisement')? 'active-sub active':''}}">
                            <a href="#">
                                <i class="fa fa-cog"></i>
                                <span class="menu-title {{rent_advt_requ()>0 || sell_advt_requ()>0 ? 'text-success':'' }}">Advertisement{{rent_advt_requ()>0 || sell_advt_requ()>0 ? ' *':'' }}</span>
                                <i class="arrow"></i>
                            </a>
                            <!--Submenu-->
                            <ul class="collapse">
                               {{-- <li class="">
                                    <a class="menu-item" href="{{route('advertiser_list')}}">
                                        <i class="ion-merge"></i>Advertiser list
                                    </a>
                                </li>--}}

                                <li class="">
                                    <a class="menu-item" href="{{route('advertise_request', ['status'=>0,'for'=>0])}}">
                                        <i class="ion-merge"></i>Rent Advt Request
                                        <span class="badge badge-primary {{rent_advt_requ()>0 ? 'sidebar-item-active':'sidebar-item-number' }}"> {{rent_advt_requ()}}</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="menu-item" href="{{route('advertise_request', ['status'=>0,'for'=>1])}}">
                                        <i class="ion-merge"></i>Sell Advt Request
                                        <span class="badge badge-success {{sell_advt_requ()>0 ? 'sidebar-item-active':'sidebar-item-number' }}"> {{sell_advt_requ()}}</span>
                                    </a>
                                </li>

                                <li class="">
                                    <a class="menu-item" href="{{route('coverpic.add')}}">
                                        <i class="ion-merge"></i>Transactions
                                    </a>
                                </li>

                            </ul>
                        </li>

                        @include('backend.layouts.authMenu')


                        {{-- <li class="{{($prefix=='request')? 'active-sub active':''}}">
                            <a class="menu-item" href="#">
                                <i class="fa fa-building"></i> <span>Apt Allotment Details</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a class="menu-item" href="{{ route('booking.request') }}">
                                        <i class="fa fa-circle-o"></i> Booking Request
                                    </a>
                                </li>
                                <li>
                                    <a class="menu-item" href="{{ route('booking_index') }}">
                                        <i class="fa fa-circle-o"></i> Booking List
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a class="menu-item" href="#">
                                <i class="fa fa-user"></i> <span>User List</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>

                            <ul class="treeview-menu">
                                <li>
                                    <a class="menu-item" href="{{route('admin.view')}}">
                                        <i class="fa fa-circle-o"></i> Admin Details</a>
                                </li>

                                --}}{{--<li>
                                    <a class="menu-item" href="{{ route('operator.view')}}">
                                        <i class="fa fa-circle-o"></i> View Operator List</a>
                                </li>
            --}}{{--
                                <li>
                                    <a class="menu-item" href="{{ route('watchman.view')}}">
                                        <i class="fa fa-circle-o"></i> Watchman Details</a>
                                </li>
                                <li>
                                    <a class="menu-item" href="{{ route('renter.view')}}">
                                        <i class="fa fa-circle-o"></i> Renter Details</a>
                                </li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a class="menu-item" href="#">
                                <i class="fa fa-dashboard"></i> <span>Location Control</span>
                                <span class="pull-right-container">
                                  <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a class="menu-item" href="{{ route('city_index') }}">
                                        <i class="fa fa-circle-o"></i> All City
                                    </a>
                                </li>
                                <li><a class="menu-item" href="{{ route('thana_index') }}">
                                        <i class="fa fa-circle-o"></i> All Thana List</a>
                                </li>
                                <li><a class="menu-item" href="{{ route('ward_index') }}">
                                        <i class="fa fa-circle-o"></i> All Ward List</a>
                                </li>

                            </ul>
                        </li>

                        <li class="treeview">
                            <a class="menu-item" href="#">
                                <i class="fa fa-dashboard"></i> <span>Building</span>
                                <span class="pull-right-container">
                                  <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a class="menu-item" href="{{ route('building_index') }}">
                                        <i class="fa fa-circle-o"></i> Individual Building Details</a>
                                </li>
                                <li><a class="menu-item" href="{{ route('floor_index') }}">
                                        <i class="fa fa-circle-o"></i> Floor List</a>
                                </li>
                            </ul>
                        </li>

                        <li><a class="menu-item" href="{{ route('apartment_index') }}">
                                <i class="fa fa-circle-o"></i> Apartment Details</a>
                        </li>

                        <li>
                            <a class="menu-item" href="{{ route('billing_index') }}">
                                <i class="fa fa-circle-o"></i> Billing List
                            </a>
                        </li>

                        <li>
                            <a class="menu-item" href="{{ route('payment.list') }}">
                                <i class="fa fa-circle-o"></i> Payment Report
                            </a>
                        </li>

                        <li>
                            <a class="menu-item" href="{{route('notice.index')}}">
                                <i class="fa fa-circle-o"></i> Add Notice</a>
                        </li>
                        <li>
                            <a class="menu-item" href="{{ route('event.view') }}">
                                <i class="fa fa-circle-o"></i> Event Details
                            </a>
                        </li>
                        <li>
                            <a class="menu-item" href="{{ route('slider') }}">
                                <i class="fa fa-circle-o"></i> Slider Setting
                            </a>
                        </li>
                        <li class="treeview">
                            <a class="menu-item" href="#">
                                <i class="fa fa-dashboard"></i>
                                <span>Swimming Management</span>
                                <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a class="menu-item" href="{{ route('swim_schedule.index') }}">
                                        <i class="fa fa-circle-o"></i> Add Schedule
                                    </a>
                                </li>
                                <li>
                                    <a class="menu-item" href="{{ route('swim_schedule.view') }}">
                                        <i class="fa fa-circle-o"></i> View Swimming List
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="">
                            <a class="menu-item" href="{{route('customer.message')}}"><i class="ion-merge"></i> View Messages</a>
                        </li>
                        <li class="">
                            <a class="menu-item" href="{{url('renter-complains')}}"><i class="ion-merge"></i> View Complain</a>
                        </li>
                        <li class="">
                            <a class="menu-item" href="{{route('company.edit',1)}}"><i class="ion-merge"></i>Update Company</a>
                        </li>
                        <li class="">
                            <a class="menu-item" href="{{route('news.index')}}"><i class="ion-merge"></i>News Links</a>
                        </li>
                        <li class="">
                            <a class="menu-item" href="{{route('linkup.index')}}"><i class="ion-merge"></i>Manage Linkup</a>
                        </li>
                        <li class="">
                            <a class="menu-item" href="{{route('tips.index')}}"><i class="ion-merge"></i>Manage Health Tips</a>
                        </li>
                        <li class="">
                            <a class="menu-item" href="{{route('set-gateway')}}"><i class="ion-merge"></i>Payment Gateway</a>
                        </li>

                        <li class="treeview">
                            <a class="menu-item" href="#">
                                <i class="fa fa-hand-stop-o"></i>
                                <span>Release</span>
                                <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a class="menu-item" href="{{ route('get.releaseRequest') }}">
                                        <i class="fa fa-circle-o"></i> Request Release
                                    </a>
                                </li>
                                <li><a class="menu-item" href="{{ route('release.index') }}">
                                        <i class="fa fa-circle-o"></i> Released List</a>
                                </li>
                            </ul>
                        </li>

                        <li><a class="menu-item" href="{{ route('parking_index') }}">
                                <i class="fa fa-circle-o"></i> All Parking List</a>
                        </li>

                        <li><a class="menu-item" href="{{ route('entry.index') }}">
                                <i class="fa fa-circle-o"></i> Unknown Entry</a>
                        </li>--}}







                        {{--
                         <?php
                         $booking = \App\Models\Booking::query()
                             ->where('renter_id', Auth::user()->id)
                             ->where('status', 1)
                             ->orderBy('id', 'desc')
                             ->first();
                         ?>

                         @if($booking !=null)
                             <li>
                                 <a class="menu-item" href="{{ route('renter.booking') }}">
                                     <i class="fa fa-circle-o"></i> Your Booking Status
                                 </a>
                             </li>

                             <li>
                                 <a class="menu-item" href="{{ route('renter.payment') }}">
                                     <i class="fa fa-circle-o"></i> Your Payment Status
                                 </a>
                             </li>

                             <li>
                                 <a class="menu-item" href="{{ route('renter.notice') }}">
                                     <i class="fa fa-circle-o"></i> Notice For You
                                 </a>
                             </li>
                             <li>
                                 <a class="menu-item" href="{{ route('event.index') }}">
                                     <i class="fa fa-circle-o"></i> Add Event Request
                                 </a>
                             </li>

                             <li>
                                 <a class="menu-item" href="{{ route('swim.add') }}">
                                     <i class="fa fa-circle-o"></i> Add Swimming Schedule
                                 </a>
                             </li>
                             <li>
                                 <a class="menu-item" href="{{ route('renter.review') }}">
                                     <i class="fa fa-circle-o"></i> Make Review
                                 </a>
                             </li>
                             <li>
                                 <a class="menu-item" href="{{ route('renter.complain') }}">
                                     <i class="fa fa-circle-o"></i> Complain
                                 </a>
                             </li>
                         @endif--}}

                    </ul>
                </div>
            </div>
        </div>
        <!--================================-->
        <!--End menu-->

    </div>
</nav>
<!--===================================================-->
<!--END MAIN NAVIGATION-->

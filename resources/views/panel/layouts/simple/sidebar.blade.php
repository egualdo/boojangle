<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper">
            <a href="{{route('index')}}"><img class="img-fluid for-light" src="{{asset('assets/images/logo/logo.png')}}"
                    alt=""><img class="img-fluid for-dark" src="{{asset('assets/images/logo/logo_dark.png')}}"
                    alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid">
                </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="{{route('index')}}"><img class="img-fluid"
                    src="{{asset('assets/images/logo/logo-icon.png')}}" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <a href="{{route('index')}}"><img class="img-fluid"
                                src="{{asset('assets/images/logo/logo-icon.png')}}" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i>
                        </div>
                    </li>
                    {{-- <li class="sidebar-main-title">
                        <div>
                            <h6 class="lan-1">{{ trans('lang.General') }} </h6>
                            <p class="lan-2">{{ trans('lang.Dashboards,users & more.') }}
                            </p>
                        </div>
                    </li> --}}
                    <li class="sidebar-list">
                        {{-- <label class="badge badge-success">1</label> --}}
                        {{-- <a
                            class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/dashboard' ? 'active' : '' }}"
                            href="#"><i data-feather="home"></i><span class="lan-3">{{ trans('lang.Dashboards')
                                }}</span>
                            <div class="according-menu"><i
                                    class="fa fa-angle-{{request()->route()->getPrefix() == '/dashboard' ? 'down' : 'right' }}"></i>
                            </div>
                        </a> --}}

                        {{-- <a
                            style="display: {{ request()->route()->getPrefix() == '/dashboard' ? 'block;' : 'block;' }}">
                            <li> --}}
                                <a class="sidebar-link sidebar-title" {{ Route::currentRouteName()=='index' ? 'active' : '' }}"
                                    href="{{route('index')}}"><i data-feather="home"></i><span>{{ trans('lang.Home') }}</span></a>
                            {{-- </li> --}}
                            {{--- <li><a class="lan-5 {{ Route::currentRouteName()=='dashboard-02' ? 'active' : '' }}"
                            href="{{route('dashboard-02')}}">{{ trans('lang.Ecommerce') }}</a>
                                </li>--}}
                        {{-- </a> --}}
                   </li>
                {{--
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/widgets' ? 'active' : '' }}"
                href="#"><i data-feather="airplay"></i><span class="lan-6">{{ trans('lang.Widgets')
                                }}</span>
                <div class="according-menu"><i
                        class="fa fa-angle-{{request()->route()->getPrefix() == '/widgets' ? 'down' : 'right' }}"></i>
                </div>
                </a>
                <ul class="sidebar-submenu"
                    style="display: {{ request()->route()->getPrefix() == '/widgets' ? 'block;' : 'none;' }}">
                    <li><a href="{{route('general-widget')}}"
                            class="{{ Route::currentRouteName()=='general-widget' ? 'active' : '' }}">{{
                                    trans('lang.General') }}</a></li>
                    <li><a href="{{route('chart-widget')}}"
                            class="{{ Route::currentRouteName()=='chart-widget' ? 'active' : '' }}">{{
                                    trans('lang.Chart') }}</a></li>
                </ul>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{ request()->route()->getPrefix() == '/page-layouts' ? 'active' : '' }}"
                        href="#"><i data-feather="layout"></i>
                        <span class="lan-7">{{ trans('lang.Page layout') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{ request()->route()->getPrefix() == '/page-layouts' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{ request()->route()->getPrefix() == '/page-layouts' ? 'block;' : 'none;' }}">
                        <li><a href="{{ route('box-layout') }}"
                                class="{{ Route::currentRouteName() == 'box-layout' ? 'active' : '' }}">Boxed</a>
                        </li>
                        <li><a href="{{ route('layout-rtl') }}"
                                class="{{ Route::currentRouteName() == 'layout-rtl' ? 'active' : '' }}">RTL</a>
                        </li>
                        <li><a href="{{ route('layout-dark') }}"
                                class="{{ Route::currentRouteName() == 'layout-dark' ? 'active fw-bold' : '' }}">Dark
                                Layout</a></li>
                        <li><a href="{{ route('hide-on-scroll') }}"
                                class="{{ Route::currentRouteName() == 'hide-on-scroll' ? 'active' : '' }}">Hide
                                Nav
                                Scroll</a></li>
                        <li><a href="{{ route('footer-light') }}"
                                class="{{ Route::currentRouteName() == 'footer-light' ? 'active' : '' }}">Footer
                                Light</a></li>
                        <li><a href="{{ route('footer-dark') }}"
                                class="{{ Route::currentRouteName() == 'footer-dark' ? 'active' : '' }}">Footer
                                Dark</a></li>
                        <li><a href="{{ route('footer-fixed') }}"
                                class="{{ Route::currentRouteName() == 'footer-fixed' ? 'active' : '' }}">Footer
                                Fixed</a></li>
                    </ul>
                </li>
                <li class="sidebar-main-title">
                    <div>
                        <h6 class="lan-8">{{ trans('lang.Applications') }}</h6>
                        <p class="lan-9">{{ trans('lang.Ready to use Apps') }}</p>
                    </div>
                </li>
                <li class="sidebar-list">
                    <label class="badge badge-danger">{{ trans('lang.New') }}</label>
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/project' ? 'active' : '' }}"
                        href="#">
                        <i data-feather="box"></i><span>{{ trans('lang.Project') }} </span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/project' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{ request()->route()->getPrefix() == '/project' ? 'block;' : 'none;' }}">
                        <li><a href="{{route('projects')}}"
                                class="{{ Route::currentRouteName()=='projects' ? 'active' : '' }}">{{
                                    trans('lang.Project List') }}</a></li>
                        <li><a href="{{route('projectcreate')}}"
                                class="{{ Route::currentRouteName()=='projectcreate' ? 'active' : '' }}">{{
                                    trans('lang.Create new') }}</a></li>
                    </ul>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='file-manager' ? 'active' : '' }}"
                        href="{{route('file-manager')}}">
                        <i data-feather="git-pull-request">
                        </i><span>{{ trans('lang.File manager') }}</span>
                    </a>
                </li>
                <li class="sidebar-list">
                    <label class="badge badge-info">{{ trans('lang.Latest') }}</label>
                    <a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='kanban' ? 'active' : '' }}"
                        href="{{route('kanban')}}">
                        <i data-feather="monitor">
                        </i><span>{{ trans('lang.Kanban Board') }}</span>
                    </a>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/ecommerce' ? 'active' : '' }}"
                        href="#"><i data-feather="shopping-bag"></i><span>{{ trans('lang.Ecommerce') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/ecommerce' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/ecommerce' ? 'block' : 'none;' }};">
                        <li><a href="{{route('product')}}"
                                class="{{ Route::currentRouteName()=='product' ? 'active' : '' }}">Product</a>
                        </li>
                        <li><a href="{{route('product-page')}}"
                                class="{{ Route::currentRouteName()=='product-page' ? 'active' : '' }}">Product
                                page</a></li>
                        <li><a href="{{route('list-products')}}"
                                class="{{ Route::currentRouteName()=='list-products' ? 'active' : '' }}">Product
                                list</a></li>
                        <li><a href="{{route('payment-details')}}"
                                class="{{ Route::currentRouteName()=='payment-details' ? 'active' : '' }}">Payment
                                Details</a></li>
                        <li><a href="{{route('order-history')}}"
                                class="{{ Route::currentRouteName()=='order-history' ? 'active' : '' }}">Order
                                History</a></li>
                        <li><a href="{{route('invoice-template')}}"
                                class="{{ Route::currentRouteName()=='invoice-template' ? 'active' : '' }}">Invoice</a>
                        </li>
                        <li><a href="{{route('cart')}}"
                                class="{{ Route::currentRouteName()=='cart' ? 'active' : '' }}">Cart</a>
                        </li>
                        <li><a href="{{route('list-wish')}}"
                                class="{{ Route::currentRouteName()=='list-wish' ? 'active' : '' }}">Wishlist</a>
                        </li>
                        <li><a href="{{route('checkout')}}"
                                class="{{ Route::currentRouteName()=='checkout' ? 'active' : '' }}">Checkout</a>
                        </li>
                        <li><a href="{{route('pricing')}}"
                                class="{{ Route::currentRouteName()=='pricing' ? 'active' : '' }}">Pricing</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/email' ? 'active' : '' }}"
                        href="#">
                        <i data-feather="mail"></i><span>{{ trans('lang.Email') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/email' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/email' ? 'block' : 'none;' }};">
                        <li><a href="{{route('email-application')}}"
                                class="{{ Route::currentRouteName()=='email-application' ? 'active' : '' }}">Email
                                App</a></li>
                        <li><a href="{{route('email-compose')}}"
                                class="{{ Route::currentRouteName()=='email-compose' ? 'active' : '' }}">Email
                                Compose</a></li>
                    </ul>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/chat' ? 'active' : '' }}"
                        href="#">
                        <i data-feather="message-circle"></i><span>{{ trans('lang.Chat') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/chat' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/chat' ? 'block' : 'none;' }};">
                        <li><a href="{{route('chat')}}"
                                class="{{ Route::currentRouteName()=='chat' ? 'active' : '' }}">Chat
                                App</a></li>
                        <li><a href="{{route('chat-video')}}"
                                class="{{ Route::currentRouteName()=='chat-video' ? 'active' : '' }}">Video
                                chat</a>
                        </li>
                    </ul>
                </li>--}}
                {{-- <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/homeContent' ? 'active' : '' }}"
                        href="#">
                        <i class="fa-solid fa-house"></i></i><span>{{ trans('lang.HomeC') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/homeContent' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/homeContent' ? 'block' : 'none;' }};">
                        <li><a href="{{route('homeContent.index')}}"
                                class="{{ Route::currentRouteName()=='homeContent.index' ? 'active' : '' }}">{{ trans('lang.Manager') }}</a>
                        </li>

                    </ul>
                </li> --}}
                {{-- <!-- <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/cities' ? 'active' : '' }}"
                        href="#">
                        <i class="fa-solid fa-city"></i><span>{{ trans('lang.City') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/cities' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/cities' ? 'block' : 'none;' }};">
                        <li><a href="{{route('cities.index')}}"
                                class="{{ Route::currentRouteName()=='cities.index' ? 'active' : '' }}">Cities</a>
                        </li>

                    </ul>
                </li> --> --}}
                {{-- <!-- <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/countries' ? 'active' : '' }}"
                        href="#">
                        <i class="fa-solid fa-earth-americas"></i><span>{{ trans('lang.Country') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/countries' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/countries' ? 'block' : 'none;' }};">
                        <li><a href="{{route('countries.index')}}"
                                class="{{ Route::currentRouteName()=='countries.index' ? 'active' : '' }}">Countries</a>
                        </li>

                    </ul>
                </li> --> --}}
                {{-- <!-- <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/idioms' ? 'active' : '' }}"
                        href="#">
                        <i class="fa-solid fa-language"></i><span>{{ trans('lang.Idioms') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/idioms' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/idioms' ? 'block' : 'none;' }};">
                        <li><a href="{{route('idioms.index')}}"
                                class="{{ Route::currentRouteName()=='idioms.index' ? 'active' : '' }}">Idioms</a>
                        </li>

                    </ul>
                </li> --> --}}
                {{-- <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/clients' ? 'active' : '' }}"
                        href="#">
                        <i class="fa fa-handshake"></i><span>Clients</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/clients' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/clients' ? 'block' : 'none;' }};">
                        <li><a href="{{route('clients.index')}}"
                                class="{{ Route::currentRouteName()=='clients.index' ? 'active' : '' }}">Clients</a>
                        </li>

                    </ul>
                </li> --}}

                {{-- <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/modules' ? 'active' : '' }}"
                        href="#">
                        <i class="fa-solid fa-diagram-project"></i><span>Modules</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/modules' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/modules' ? 'block' : 'none;' }};">
                        <li><a href="{{route('modules.index')}}"
                                class="{{ Route::currentRouteName()=='modules.index' ? 'active' : '' }}">Modules</a>
                        </li>

                    </ul>
                </li> --}}

                {{-- <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/moduleTypes' ? 'active' : '' }}"
                        href="#">
                        <i class="fa-solid fa-list"></i><span>Type Modules</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/moduleTypes' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/moduleTypes' ? 'block' : 'none;' }};">
                        <li><a href="{{route('moduleTypes.index')}}"
                                class="{{ Route::currentRouteName()=='moduleTypes.index' ? 'active' : '' }}">Type Modules</a>
                        </li>

                    </ul>
                </li> --}}


                {{-- <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/header' ? 'active' : '' }}"
                        href="#">
                        <i class="fa-solid fa-image"></i><span>Header</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/header' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/header' ? 'block' : 'none;' }};">
                        <li><a href="{{route('header.index')}}"
                                class="{{ Route::currentRouteName()=='header.index' ? 'active' : '' }}">Header</a>
                        </li>

                    </ul>
                </li> --}}




                {{-- <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/service' ? 'active' : '' }}"
                        href="#">
                        <i class="fa-solid fa-briefcase"></i><span>{{ trans('lang.Services') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/service' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/service' ? 'block' : 'none;' }};">
                        <li><a href="{{route('service.index')}}"
                                class="{{ Route::currentRouteName()=='service.index' ? 'active' : '' }}">{{ trans('lang.Services') }}</a>
                        </li>

                    </ul>
                </li> --}}
                {{-- <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/directions' ? 'active' : '' }}"
                        href="#">
                        <i class="fa-solid fa-diamond-turn-right"></i><span>{{ trans('lang.Directions') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/directions' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/directions' ? 'block' : 'none;' }};">
                        <li><a href="{{route('directions.index')}}"
                                class="{{ Route::currentRouteName()=='directions.index' ? 'active' : '' }}">{{ trans('lang.Directions') }}</a>
                        </li>

                    </ul>
                </li> --}}
                {{-- <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/news' ? 'active' : '' }}"
                        href="#">
                        <i class="fa-solid fa-newspaper"></i><span>{{ trans('lang.News') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/news' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/news' ? 'block' : 'none;' }};">
                        <li><a href="{{route('news.index')}}"
                                class="{{ Route::currentRouteName()=='news.index' ? 'active' : '' }}">{{ trans('lang.News') }}</a>
                        </li>

                    </ul>
                </li> --}}
                {{-- <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/staffs' ? 'active' : '' }}"
                        href="#">
                        <i class="fa-solid fa-person"></i><span>Staff</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/staffs' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/staffs' ? 'block' : 'none;' }};">
                        <li><a href="{{route('staffs.index')}}"
                                class="{{ Route::currentRouteName()=='staffs.index' ? 'active' : '' }}">Staff</a>
                        </li>

                    </ul>
                </li> --}}





                        {{-- <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/tags' ? 'active' : '' }}"
                        href="#">
                        <i class="fa fa-tag"></i><span>tag</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/tags' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/tags' ? 'block' : 'none;' }};">
                        <li><a href="{{route('tags.index')}}"
                                class="{{ Route::currentRouteName()=='tags.index' ? 'active' : '' }}">tag</a>
                        </li>

                    </ul>
                </li> --}}







                {{-- <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/dataResearchs' ? 'active' : '' }}"
                        href="#">
                        <i class="fas fa-book"></i><span>Data & Research</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/dataResearchs' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/dataResearchs' ? 'block' : 'none;' }};">
                        <li><a href="{{route('dataResearchs.index')}}"
                                class="{{ Route::currentRouteName()=='dataResearchs.index' ? 'active' : '' }}">Data
                                &
                                Research</a>
                        </li>

                    </ul>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/projectTypes' ? 'active' : '' }}"
                        href="#">
                        <i class="fa-solid fa-folder"></i><span>Cases</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/projectTypes' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/projectTypes' ? 'block' : 'none;' }};">
                        <li><a href="{{route('projectTypes.index')}}"
                                class="{{ Route::currentRouteName()=='projectTypes.index' ? 'active' : '' }}">Cases</a>
                        </li>

                    </ul>
                </li> --}}
                {{-- <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/processes' ? 'active' : '' }}"
                        href="#">
                        <i class="fa-solid fa-terminal"></i><span>Processes</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/processes' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/processes' ? 'block' : 'none;' }};">
                        <li><a href="{{route('processes.index')}}"
                                class="{{ Route::currentRouteName()=='processes.index' ? 'active' : '' }}">Processes</a>
                        </li>

                    </ul>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/tools' ? 'active' : '' }}"
                        href="#">
                        <i class="fa-solid fa-toolbox"></i><span>Tools</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/tools' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/tools' ? 'block' : 'none;' }};">
                        <li><a href="{{route('tools.index')}}"
                                class="{{ Route::currentRouteName()=='tools.index' ? 'active' : '' }}">Tools</a>
                        </li>

                    </ul>
                </li> --}}
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/users' ? 'active' : '' }}"
                        href="#">
                        <i data-feather="users"></i><span>{{ trans('lang.Users') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/users' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/users' ? 'block' : 'none;' }};">
                        <li><a href="{{route('users.index')}}"
                                class="{{ Route::currentRouteName()=='users.index' ? 'active' : '' }}">{{trans('lang.Users')}}</a></li>
                        <li><a href="{{route('user-profile')}}"
                                class="{{ Route::currentRouteName()=='user-profile' ? 'active' : '' }}">{{trans('lang.Profile')}}</a></li>
                    </ul>
                </li>

                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/supplier' ? 'active' : '' }}"
                        href="#">
                        <i data-feather="truck"></i><span>{{ trans('lang.Supplier') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/supplier' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/supplier' ? 'block' : 'none;' }};">
                        <li><a href="{{route('supplier.index')}}"
                                class="{{ Route::currentRouteName()=='supplier.index' ? 'active' : '' }}">{{trans('lang.Supplier')}}</a></li>
                        
                    </ul>
                </li>



                 <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/orders' ? 'active' : '' }}"
                        href="#">
                        <i data-feather="list"></i><span>{{ trans('lang.Orders') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/orders' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/orders' ? 'block' : 'none;' }};">
                        <li><a href="{{route('orders.index')}}"
                                class="{{ Route::currentRouteName()=='orders.index' ? 'active' : '' }}">{{trans('lang.Orders')}}</a></li>
                        
                    </ul>
                </li>
                {{-- <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/editors' ? 'active' : '' }}"
                        href="#"><i data-feather="settings"></i><span>{{ trans('lang.Setting') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/editors' ? 'down' : 'right' }}"></i>
                        </div>
                    </a> --}}
                    {{-- <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/cities' ? 'block' : 'none;' }};"> --}}
                        {{-- <li><a href="{{route('cities.index')}}"
                                class="{{ Route::currentRouteName()=='cities.index' ? 'active' : '' }}">{{ trans('lang.City') }}</a>
                        </li>

                         <li><a href="{{route('countries.index')}}"
                                class="{{ Route::currentRouteName()=='countries.index' ? 'active' : '' }}"> {{ trans('lang.Country') }} </a>
                        </li>

                         <li><a href="{{route('idioms.index')}}"
                                class="{{ Route::currentRouteName()=='idioms.index' ? 'active' : '' }}">{{ trans('lang.Idioms') }}</a>
                        </li> --}}

                    {{-- </ul> --}}
                    {{-- <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/countries' ? 'block' : 'none;' }};">
                        <li><a href="{{route('countries.index')}}"
                                class="{{ Route::currentRouteName()=='countries.index' ? 'active' : '' }}"> Country </a>
                        </li>

                    </ul>
                    <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/idioms' ? 'block' : 'none;' }};">
                        <li><a href="{{route('idioms.index')}}"
                                class="{{ Route::currentRouteName()=='idioms.index' ? 'active' : '' }}">Idioms</a>
                        </li>

                    </ul> --}}
                {{-- </li> --}}

                {{-- <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/contacts' ? 'active' : '' }}"
                        href="#">
                        <i class="fa-solid fa-address-book"></i><span>{{ trans('lang.Contacts') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/contacts' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/contacts' ? 'block' : 'none;' }};">
                        <li><a href="{{route('contacts.index')}}"
                                class="{{ Route::currentRouteName()=='contacts' ? 'active' : '' }}">Contacts
                                Index</a></li>
                    </ul>
                </li> --}}
                   {{-- <li class="sidebar-list"><a
                        class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='contacts' ? 'active' : '' }}"
                        href="{{route('contacts')}}"><i data-feather="list"> </i><span>{{ trans('lang.Contacts')
                                }}</span></a></li> --}}
                {{--
                    <li class="sidebar-list"><a
                            class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='bookmark' ? 'active' : '' }}"
                href="{{route('bookmark')}}"><i data-feather="heart"> </i><span>{{ trans('lang.Bookmarks')
                                }}</span></a></li>
             
                <li class="sidebar-list"><a
                        class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='task' ? 'active' : '' }}"
                        href="{{route('task')}}"><i data-feather="check-square"> </i><span>{{ trans('lang.Tasks')
                                }}</span></a></li>
                <li class="sidebar-list"><a
                        class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='calendar-basic' ? 'active' : '' }} "
                        href="{{route('calendar-basic')}}"><i data-feather="calendar">
                        </i><span>{{
                                trans('lang.Calendar') }}</span></a></li>
                <li class="sidebar-list"><a
                        class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='social-app' ? 'active' : '' }}"
                        href="{{route('social-app')}}"><i data-feather="zap"> </i><span>{{ trans('lang.Social App')
                                }}</span></a></li>
                <li class="sidebar-list"><a
                        class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='to-do' ? 'active' : '' }}"
                        href="{{route('to-do')}}"><i data-feather="clock"> </i><span>{{ trans('lang.To-Do')
                                }}</span></a></li>
                <li class="sidebar-list"><a
                        class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'search' ? 'active' : '' }}"
                        href="{{ route('search') }}"><i data-feather="search"> </i><span>{{ trans('lang.Search
                                Result') }}</span></a></li>
                <li class="sidebar-main-title">
                    <div>
                        <h6>{{ trans('lang.Forms & Table') }}</h6>
                        <p>{{ trans('lang.Ready to use froms & tables') }}</p>
                    </div>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/forms' ? 'active' : '' }}"
                        href="#">
                        <i data-feather="file-text"></i><span>{{ trans('lang.Forms') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/forms' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{ request()->route()->getPrefix() == '/forms' ? 'block;' : 'none;' }}">
                        <li>
                            <a class="submenu-title {{ in_array(Route::currentRouteName(), ['form-validation', 'base-input', 'radio-checkbox-control', 'input-group', 'megaoptions']) ? 'active' : '' }}"
                                href="#">Form Controls
                                <div class="according-menu"><i
                                        class="fa fa-angle-{{ in_array(Route::currentRouteName(), ['form-validation', 'base-input', 'radio-checkbox-control', 'input-group', 'megaoptions']) ? 'down' : 'right' }}"></i>
                                </div>
                            </a>
                            <ul class="nav-sub-childmenu submenu-content"
                                style="display: {{ in_array(Route::currentRouteName(), ['form-validation', 'base-input', 'radio-checkbox-control', 'input-group', 'megaoptions']) ? 'block' : 'none;' }};">
                                <li><a href="{{route('form-validation')}}"
                                        class="{{ Route::currentRouteName()=='form-validation' ? 'active' : '' }}">Form
                                        Validation</a></li>
                                <li><a href="{{route('base-input')}}"
                                        class="{{ Route::currentRouteName()=='base-input' ? 'active' : '' }}">Base
                                        Inputs</a></li>
                                <li><a href="{{route('radio-checkbox-control')}}"
                                        class="{{ Route::currentRouteName()=='radio-checkbox-control' ? 'active' : '' }}">Checkbox
                                        & Radio</a></li>
                                <li><a href="{{route('input-group')}}"
                                        class="{{ Route::currentRouteName()=='input-group' ? 'active' : '' }}">Input
                                        Groups</a></li>
                                <li><a href="{{route('megaoptions')}}"
                                        class="{{ Route::currentRouteName()=='megaoptions' ? 'active' : '' }}">Mega
                                        Options</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="submenu-title {{ in_array(Route::currentRouteName(), ['datepicker', 'time-picker', 'datetimepicker','daterangepicker' ,'touchspin', 'select2', 'switch', 'typeahead', 'clipboard']) ? 'active' : '' }}"
                                href="#">Form Widgets
                                <div class="according-menu"><i
                                        class="fa fa-angle-{{ in_array(Route::currentRouteName(), ['datepicker', 'time-picker', 'datetimepicker','daterangepicker' ,'touchspin', 'select2', 'switch', 'typeahead', 'clipboard']) ? 'down' : 'right' }}"></i>
                                </div>
                            </a>
                            <ul class="nav-sub-childmenu submenu-content"
                                style="display: {{ in_array(Route::currentRouteName(), ['datepicker', 'time-picker', 'datetimepicker','daterangepicker' ,'touchspin', 'select2', 'switch', 'typeahead', 'clipboard']) ? 'block' : 'none;' }};">
                                <li><a href="{{route('datepicker')}}"
                                        class="{{ Route::currentRouteName()=='datepicker' ? 'active' : '' }}">Datepicker</a>
                                </li>
                                <li><a href="{{route('time-picker')}}"
                                        class="{{ Route::currentRouteName()=='time-picker' ? 'active' : '' }}">Timepicker</a>
                                </li>
                                <li><a href="{{route('datetimepicker')}}"
                                        class="{{ Route::currentRouteName()=='datetimepicker' ? 'active' : '' }}">Datetimepicker</a>
                                </li>
                                <li><a href="{{route('daterangepicker')}}"
                                        class="{{ Route::currentRouteName()=='daterangepicker' ? 'active' : '' }}">Daterangepicker</a>
                                </li>
                                <li><a href="{{route('touchspin')}}"
                                        class="{{ Route::currentRouteName()=='touchspin' ? 'active' : '' }}">Touchspin</a>
                                </li>
                                <li><a href="{{route('select2')}}"
                                        class="{{ Route::currentRouteName()=='select2' ? 'active' : '' }}">Select2</a>
                                </li>
                                <li><a href="{{route('switch')}}"
                                        class="{{ Route::currentRouteName()=='switch' ? 'active' : '' }}">Switch</a>
                                </li>
                                <li><a href="{{route('typeahead')}}"
                                        class="{{ Route::currentRouteName()=='typeahead' ? 'active' : '' }}">Typeahead</a>
                                </li>
                                <li><a href="{{route('clipboard')}}"
                                        class="{{ Route::currentRouteName()=='clipboard' ? 'active' : '' }}">Clipboard</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="submenu-title {{ in_array(Route::currentRouteName(), ['default-form', 'form-wizard', 'form-wizard-two', 'form-wizard-three']) ? 'active' : '' }}"
                                href="#">Form Layout
                                <div class="according-menu"><i
                                        class="fa fa-angle-{{ in_array(Route::currentRouteName(), ['default-form', 'form-wizard', 'form-wizard-two', 'form-wizard-three']) ? 'down' : 'right' }}"></i>
                                </div>
                            </a>
                            <ul class="nav-sub-childmenu submenu-content"
                                style="display: {{ in_array(Route::currentRouteName(), ['default-form', 'form-wizard', 'form-wizard-two', 'form-wizard-three']) ? 'block' : 'none;' }};">
                                <li><a href="{{route('default-form')}}"
                                        class="{{ Route::currentRouteName()=='default-form' ? 'active' : '' }}">Default
                                        Forms</a></li>
                                <li><a href="{{route('form-wizard')}}"
                                        class="{{ Route::currentRouteName()=='form-wizard' ? 'active' : '' }}">Form
                                        Wizard 1</a></li>
                                <li><a href="{{route('form-wizard-two')}}"
                                        class="{{ Route::currentRouteName()=='form-wizard-two' ? 'active' : '' }}">Form
                                        Wizard 2</a></li>
                                <li><a href="{{route('form-wizard-three')}}"
                                        class="{{ Route::currentRouteName()=='form-wizard-three' ? 'active' : '' }}">Form
                                        Wizard 3</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/tables' ? 'active' : '' }}"
                        href="#"><i data-feather="server"></i><span>{{ trans('lang.Tables') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/tables' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{ request()->route()->getPrefix() == '/tables' ? 'block;' : 'none;' }}">
                        <li>
                            <a class="submenu-title  {{ in_array(Route::currentRouteName(), ['bootstrap-basic-table', 'bootstrap-sizing-table', 'bootstrap-sizing-table', 'bootstrap-border-table', 'bootstrap-styling-table', 'table-components']) ? 'active' : '' }}"
                                href="#">Bootstrap Tables
                                <div class="according-menu"><i
                                        class="fa fa-angle-{{ in_array(Route::currentRouteName(), ['bootstrap-basic-table', 'bootstrap-sizing-table', 'bootstrap-sizing-table', 'bootstrap-border-table', 'bootstrap-styling-table', 'table-components']) ? 'down' : 'right' }}"></i>
                                </div>
                            </a>
                            <ul class="nav-sub-childmenu submenu-content"
                                style="display: {{ in_array(Route::currentRouteName(), ['bootstrap-basic-table', 'bootstrap-sizing-table', 'bootstrap-sizing-table', 'bootstrap-border-table', 'bootstrap-styling-table', 'table-components']) ? 'block' : 'none;' }};">
                                <li><a href="{{route('bootstrap-basic-table')}}"
                                        class="{{ Route::currentRouteName()=='bootstrap-basic-table' ? 'active' : '' }}">Basic
                                        Tables</a></li>
                                <li><a href="{{route('bootstrap-sizing-table')}}"
                                        class="{{ Route::currentRouteName()=='bootstrap-sizing-table' ? 'active' : '' }}">Sizing
                                        Tables</a></li>
                                <li><a href="{{route('bootstrap-border-table')}}"
                                        class="{{ Route::currentRouteName()=='bootstrap-border-table' ? 'active' : '' }}">Border
                                        Tables</a></li>
                                <li><a href="{{route('bootstrap-styling-table')}}"
                                        class="{{ Route::currentRouteName()=='bootstrap-styling-table' ? 'active' : '' }}">Styling
                                        Tables</a></li>
                                <li><a href="{{route('table-components')}}"
                                        class="{{ Route::currentRouteName()=='table-components' ? 'active' : '' }}">Table
                                        components</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="submenu-title  {{ in_array(Route::currentRouteName(), ['datatable-basic-init', 'datatable-advance', 'datatable-styling', 'datatable-ajax', 'datatable-server-side', 'datatable-plugin', 'datatable-api']) ? 'active' : '' }}"
                                href="#">Data Tables
                                <div class="according-menu"><i
                                        class="fa fa-angle-{{ in_array(Route::currentRouteName(), ['datatable-basic-init', 'datatable-advance', 'datatable-styling', 'datatable-ajax', 'datatable-server-side', 'datatable-plugin', 'datatable-api', 'datatable-data-source']) ? 'down' : 'right' }}"></i>
                                </div>
                            </a>
                            <ul class="nav-sub-childmenu submenu-content"
                                style="display: {{ in_array(Route::currentRouteName(), ['datatable-basic-init', 'datatable-advance', 'datatable-styling', 'datatable-ajax', 'datatable-server-side', 'datatable-plugin', 'datatable-api', 'datatable-data-source']) ? 'block' : 'none;' }};">
                                <li><a href="{{route('datatable-basic-init')}}"
                                        class="{{ Route::currentRouteName()=='datatable-basic-init' ? 'active' : '' }}">Basic
                                        Init</a></li>
                                <li><a href="{{route('datatable-advance')}}"
                                        class="{{ Route::currentRouteName()=='datatable-advance' ? 'active' : '' }}">Advance
                                        Init</a></li>
                                <li><a href="{{route('datatable-styling')}}"
                                        class="{{ Route::currentRouteName()=='datatable-styling' ? 'active' : '' }}">Styling</a>
                                </li>
                                <li><a href="{{route('datatable-ajax')}}"
                                        class="{{ Route::currentRouteName()=='datatable-ajax' ? 'active' : '' }}">AJAX</a>
                                </li>
                                <li><a href="{{route('datatable-server-side')}}"
                                        class="{{ Route::currentRouteName()=='datatable-server-side' ? 'active' : '' }}">Server
                                        Side</a></li>
                                <li><a href="{{route('datatable-plugin')}}"
                                        class="{{ Route::currentRouteName()=='datatable-plugin' ? 'active' : '' }}">Plug-in</a>
                                </li>
                                <li><a href="{{route('datatable-api')}}"
                                        class="{{ Route::currentRouteName()=='datatable-api' ? 'active' : '' }}">API</a>
                                </li>
                                <li><a href="{{route('datatable-data-source')}}"
                                        class="{{ Route::currentRouteName()=='datatable-data-source' ? 'active' : '' }}">Data
                                        Sources</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="submenu-title {{ in_array(Route::currentRouteName(), ['datatable-ext-autofill', 'datatable-ext-basic-button', 'datatable-ext-col-reorder', 'datatable-ext-fixed-header', 'datatable-ext-html-5-data-export', 'datatable-ext-responsive', 'datatable-ext-row-reorder', 'datatable-ext-scroller']) ? 'active' : '' }}"
                                href="#">Ex. Data Tables
                                <div class="according-menu"><i
                                        class="fa fa-angle-{{ in_array(Route::currentRouteName(), ['datatable-ext-autofill', 'datatable-ext-basic-button', 'datatable-ext-col-reorder', 'datatable-ext-fixed-header', 'datatable-ext-html-5-data-export', 'datatable-ext-key-table', 'datatable-ext-responsive', 'datatable-ext-row-reorder', 'datatable-ext-scroller']) ? 'down' : 'right' }}"></i>
                                </div>
                            </a>
                            <ul class="nav-sub-childmenu submenu-content"
                                style="display: {{ in_array(Route::currentRouteName(), ['datatable-ext-autofill', 'datatable-ext-basic-button', 'datatable-ext-col-reorder', 'datatable-ext-fixed-header', 'datatable-ext-html-5-data-export', 'datatable-ext-key-table', 'datatable-ext-responsive', 'datatable-ext-row-reorder', 'datatable-ext-scroller']) ? 'block' : 'none;' }};">
                                <li><a href="{{route('datatable-ext-autofill')}}"
                                        class="{{ Route::currentRouteName()=='datatable-ext-autofill' ? 'active' : '' }}">Auto
                                        Fill</a></li>
                                <li><a href="{{route('datatable-ext-basic-button')}}"
                                        class="{{ Route::currentRouteName()=='datatable-ext-basic-button' ? 'active' : '' }}">Basic
                                        Button</a></li>
                                <li><a href="{{route('datatable-ext-col-reorder')}}"
                                        class="{{ Route::currentRouteName()=='datatable-ext-col-reorder' ? 'active' : '' }}">Column
                                        Reorder</a></li>
                                <li><a href="{{route('datatable-ext-fixed-header')}}"
                                        class="{{ Route::currentRouteName()=='datatable-ext-fixed-header' ? 'active' : '' }}">Fixed
                                        Header</a></li>
                                <li><a href="{{route('datatable-ext-html-5-data-export')}}"
                                        class="{{ Route::currentRouteName()=='datatable-ext-html-5-data-export' ? 'active' : '' }}">HTML
                                        5 Export</a></li>
                                <li><a href="{{route('datatable-ext-key-table')}}"
                                        class="{{ Route::currentRouteName()=='datatable-ext-key-table' ? 'active' : '' }}">Key
                                        Table</a></li>
                                <li><a href="{{route('datatable-ext-responsive')}}"
                                        class="{{ Route::currentRouteName()=='datatable-ext-responsive' ? 'active' : '' }}">Responsive</a>
                                </li>
                                <li><a href="{{route('datatable-ext-row-reorder')}}"
                                        class="{{ Route::currentRouteName()=='datatable-ext-row-reorder' ? 'active' : '' }}">Row
                                        Reorder</a></li>
                                <li><a href="{{route('datatable-ext-scroller')}}"
                                        class="{{ Route::currentRouteName()=='datatable-ext-scroller' ? 'active' : '' }}">Scroller</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="{{route('jsgrid-table')}}"
                                class="{{ Route::currentRouteName()=='jsgrid-table' ? 'active' : '' }}">Js
                                Grid
                                Table </a></li>
                    </ul>
                </li>
                <li class="sidebar-main-title">
                    <div>
                        <h6>{{ trans('lang.Components') }}</h6>
                        <p>{{ trans('lang.UI Components & Elements') }}</p>
                    </div>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/ui-kits' ? 'active' : '' }}"
                        href="#"><i data-feather="box"></i><span>{{ trans('lang.Ui Kits') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/ui-kits' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{ request()->route()->getPrefix() == '/ui-kits' ? 'block;' : 'none;' }}">
                        <li><a href="{{route('state-color')}}"
                                class="{{ Route::currentRouteName()=='state-color' ? 'active' : '' }}">State
                                color</a></li>
                        <li><a href="{{route('typography')}}"
                                class="{{ Route::currentRouteName()=='typography' ? 'active' : '' }}">Typography</a>
                        </li>
                        <li><a href="{{route('avatars')}}"
                                class="{{ Route::currentRouteName()=='avatars' ? 'active' : '' }}">Avatars</a>
                        </li>
                        <li><a href="{{route('helper-classes')}}"
                                class="{{ Route::currentRouteName()=='helper-classes' ? 'active' : '' }}">helper
                                classes</a></li>
                        <li><a href="{{route('grid')}}"
                                class="{{ Route::currentRouteName()=='grid' ? 'active' : '' }}">Grid</a>
                        </li>
                        <li><a href="{{route('tag-pills')}}"
                                class="{{ Route::currentRouteName()=='tag-pills' ? 'active' : '' }}">Tag
                                & pills</a>
                        </li>
                        <li><a href="{{route('progress-bar')}}"
                                class="{{ Route::currentRouteName()=='progress-bar' ? 'active' : '' }}">Progress</a>
                        </li>
                        <li><a href="{{route('modal')}}"
                                class="{{ Route::currentRouteName()=='modal' ? 'active' : '' }}">Modal</a>
                        </li>
                        <li><a href="{{route('alert')}}"
                                class="{{ Route::currentRouteName()=='alert' ? 'active' : '' }}">Alert</a>
                        </li>
                        <li><a href="{{route('popover')}}"
                                class="{{ Route::currentRouteName()=='popover' ? 'active' : '' }}">Popover</a>
                        </li>
                        <li><a href="{{route('tooltip')}}"
                                class="{{ Route::currentRouteName()=='tooltip' ? 'active' : '' }}">Tooltip</a>
                        </li>
                        <li><a href="{{route('loader')}}"
                                class="{{ Route::currentRouteName()=='loader' ? 'active' : '' }}">Spinners</a>
                        </li>
                        <li><a href="{{route('dropdown')}}"
                                class="{{ Route::currentRouteName()=='dropdown' ? 'active' : '' }}">Dropdown</a>
                        </li>
                        <li><a href="{{route('accordion')}}"
                                class="{{ Route::currentRouteName()=='accordion' ? 'active' : '' }}">Accordion</a>
                        </li>
                        <li>
                            <a class="submenu-title {{ in_array(Route::currentRouteName(), ['tab-bootstrap','tab-material']) ? 'active' : '' }}"
                                href="#">Tabs
                                <div class="according-menu"><i
                                        class="fa fa-angle-{{ in_array(Route::currentRouteName(), ['tab-bootstrap','tab-material']) ? 'down' : 'right' }}"></i>
                                </div>
                            </a>
                            <ul class="nav-sub-childmenu submenu-content"
                                style="display: {{ in_array(Route::currentRouteName(), ['tab-bootstrap','tab-material']) ? 'block' : 'none;' }};">
                                <li><a href="{{route('tab-bootstrap')}}"
                                        class="{{ Route::currentRouteName()=='tab-bootstrap' ? 'active' : '' }}">Bootstrap
                                        Tabs</a></li>
                                <li><a href="{{route('tab-material')}}"
                                        class="{{ Route::currentRouteName()=='tab-material' ? 'active' : '' }}">Line
                                        Tabs</a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('box-shadow')}}"
                                class="{{ Route::currentRouteName()=='box-shadow' ? 'active' : '' }}">Shadow</a>
                        </li>
                        <li><a href="{{route('list')}}"
                                class="{{ Route::currentRouteName()=='list' ? 'active' : '' }}">Lists</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/bonus-ui' ? 'active' : '' }}"
                        href="#"><i data-feather="folder-plus"></i><span>{{ trans('lang.Bonus Ui') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/ui-kits' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{ request()->route()->getPrefix() == '/bonus-ui' ? 'block;' : 'none;' }}">
                        <li><a href="{{route('scrollable')}}"
                                class="{{ Route::currentRouteName()=='scrollable' ? 'active' : '' }}">Scrollable</a>
                        </li>
                        <li><a href="{{route('tree')}}"
                                class="{{ Route::currentRouteName()=='tree' ? 'active' : '' }}">Tree
                                view</a></li>
                        <li><a href="{{route('bootstrap-notify')}}"
                                class="{{ Route::currentRouteName()=='bootstrap-notify' ? 'active' : '' }}">Bootstrap
                                Notify</a></li>
                        <li><a href="{{route('rating')}}"
                                class="{{ Route::currentRouteName()=='rating' ? 'active' : '' }}">Rating</a>
                        </li>
                        <li><a href="{{route('dropzone')}}"
                                class="{{ Route::currentRouteName()=='dropzone' ? 'active' : '' }}">dropzone</a>
                        </li>
                        <li><a href="{{route('tour')}}"
                                class="{{ Route::currentRouteName()=='tour' ? 'active' : '' }}">Tour</a>
                        </li>
                        <li><a href="{{route('sweet-alert2')}}"
                                class="{{ Route::currentRouteName()=='sweet-alert2' ? 'active' : '' }}">SweetAlert2</a>
                        </li>
                        <li><a href="{{route('modal-animated')}}"
                                class="{{ Route::currentRouteName()=='modal-animated' ? 'active' : '' }}">Animated
                                Modal</a></li>
                        <li><a href="{{route('owl-carousel')}}"
                                class="{{ Route::currentRouteName()=='owl-carousel' ? 'active' : '' }}">Owl
                                Carousel</a></li>
                        <li><a href="{{route('ribbons')}}"
                                class="{{ Route::currentRouteName()=='ribbons' ? 'active' : '' }}">Ribbons</a>
                        </li>
                        <li><a href="{{route('pagination')}}"
                                class="{{ Route::currentRouteName()=='pagination' ? 'active' : '' }}">Pagination</a>
                        </li>
                        <li><a href="{{route('breadcrumb')}}"
                                class="{{ Route::currentRouteName()=='breadcrumb' ? 'active' : '' }}">Breadcrumb</a>
                        </li>
                        <li><a href="{{route('range-slider')}}"
                                class="{{ Route::currentRouteName()=='range-slider' ? 'active' : '' }}">Range
                                Slider</a></li>
                        <li><a href="{{route('image-cropper')}}"
                                class="{{ Route::currentRouteName()=='image-cropper' ? 'active' : '' }}">Image
                                cropper</a></li>
                        <li><a href="{{route('sticky')}}"
                                class="{{ Route::currentRouteName()=='sticky' ? 'active' : '' }}">Sticky</a>
                        </li>
                        <li><a href="{{route('basic-card')}}"
                                class="{{ Route::currentRouteName()=='basic-card' ? 'active' : '' }}">Basic
                                Card</a>
                        </li>
                        <li><a href="{{route('creative-card')}}"
                                class="{{ Route::currentRouteName()=='creative-card' ? 'active' : '' }}">Creative
                                Card</a></li>
                        <li><a href="{{route('tabbed-card')}}"
                                class="{{ Route::currentRouteName()=='tabbed-card' ? 'active' : '' }}">Tabbed
                                Card</a></li>
                        <li><a href="{{route('dragable-card')}}"
                                class="{{ Route::currentRouteName()=='dragable-card' ? 'active' : '' }}">Draggable
                                Card</a></li>
                        <li>
                            <a class="submenu-title {{ in_array(Route::currentRouteName(), ['timeline-v-1','timeline-v-2', 'timeline-small']) ? 'active' : '' }}"
                                href="#">Timeline
                                <div class="according-menu"><i
                                        class="fa fa-angle-{{ in_array(Route::currentRouteName(), ['timeline-v-1','timeline-v-2', 'timeline-small']) ? 'down' : 'right' }}"></i>
                                </div>
                            </a>
                            <ul class="nav-sub-childmenu submenu-content"
                                style="display: {{ in_array(Route::currentRouteName(), ['timeline-v-1','timeline-v-2']) ? 'block' : 'none;' }};">
                                <li><a href="{{route('timeline-v-1')}}"
                                        class="{{ Route::currentRouteName()=='timeline-v-1' ? 'active' : '' }}">Timeline
                                        1</a></li>
                                <li><a href="{{route('timeline-v-2')}}"
                                        class="{{ Route::currentRouteName()=='timeline-v-2' ? 'active' : '' }}">Timeline
                                        2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/builders' ? 'active' : '' }}"
                        href="#"><i data-feather="edit-3"></i><span>{{ trans('lang.Builders') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/builders' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{ request()->route()->getPrefix() == '/builders' ? 'block;' : 'none;' }}">
                        <li><a href="{{route('form-builder-1')}}"
                                class="{{ Route::currentRouteName()=='form-builder-1' ? 'active' : '' }}">
                                Form
                                Builder 1</a></li>
                        <li><a href="{{route('form-builder-2')}}"
                                class="{{ Route::currentRouteName()=='form-builder-2' ? 'active' : '' }}">
                                Form
                                Builder 2</a></li>
                        <li><a href="{{route('pagebuild')}}"
                                class="{{ Route::currentRouteName()=='pagebuild' ? 'active' : '' }}">Page
                                Builder</a></li>
                        <li><a href="{{route('button-builder')}}"
                                class="{{ Route::currentRouteName()=='button-builder' ? 'active' : '' }}">Button
                                Builder</a></li>
                    </ul>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/animation' ? 'active' : '' }}"
                        href="#"><i data-feather="cloud-drizzle"></i><span>{{ trans('lang.Animation') }}</span></a>
                    <ul class="sidebar-submenu"
                        style="display: {{ request()->route()->getPrefix() == '/animation' ? 'block;' : 'none;' }}">
                        <li><a href="{{route('animate')}}"
                                class="{{ Route::currentRouteName()=='animate' ? 'active' : '' }}">Animate</a>
                        </li>
                        <li><a href="{{route('scroll-reval')}}"
                                class="{{ Route::currentRouteName()=='scroll-reval' ? 'active' : '' }}">Scroll
                                Reveal</a></li>
                        <li><a href="{{route('aos')}}"
                                class="{{ Route::currentRouteName()=='aos' ? 'active' : '' }}">AOS
                                animation</a>
                        </li>
                        <li><a href="{{route('tilt')}}"
                                class="{{ Route::currentRouteName()=='tilt' ? 'active' : '' }}">Tilt
                                Animation</a>
                        </li>
                        <li><a href="{{route('wow')}}"
                                class="{{ Route::currentRouteName()=='wow' ? 'active' : '' }}">Wow
                                Animation</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/icons' ? 'active' : '' }}"
                        href="#"><i data-feather="command"></i><span>{{ trans('lang.Icons') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/icons' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{ request()->route()->getPrefix() == '/icons' ? 'block;' : 'none;' }}">
                        <li><a href="{{route('flag-icon')}}"
                                class="{{ Route::currentRouteName()=='flag-icon' ? 'active' : '' }}">Flag
                                icon</a>
                        </li>
                        <li><a href="{{route('font-awesome')}}"
                                class="{{ Route::currentRouteName()=='font-awesome' ? 'active' : '' }}">Fontawesome
                                Icon</a></li>
                        <li><a href="{{route('ico-icon')}}"
                                class="{{ Route::currentRouteName()=='ico-icon' ? 'active' : '' }}">Ico
                                Icon</a>
                        </li>
                        <li><a href="{{route('themify-icon')}}"
                                class="{{ Route::currentRouteName()=='themify-icon' ? 'active' : '' }}">Thimify
                                Icon</a></li>
                        <li><a href="{{route('feather-icon')}}"
                                class="{{ Route::currentRouteName()=='feather-icon' ? 'active' : '' }}">Feather
                                icon</a></li>
                        <li><a href="{{route('whether-icon')}}"
                                class="{{ Route::currentRouteName()=='whether-icon' ? 'active' : '' }}">Whether
                                Icon</a></li>
                        <li><a href="{{route('simple-line-icon')}}"
                                class="{{ Route::currentRouteName()=='simple-line-icon' ? 'active' : '' }}">Simple
                                line Icon</a></li>
                        <li><a href="{{route('material-design-icon')}}"
                                class="{{ Route::currentRouteName()=='material-design-icon' ? 'active' : '' }}">Material
                                Design Icon</a></li>
                        <li><a href="{{route('pe7-icon')}}"
                                class="{{ Route::currentRouteName()=='pe7-icon' ? 'active' : '' }}">pe7
                                icon</a>
                        </li>
                        <li><a href="{{route('typicons-icon')}}"
                                class="{{ Route::currentRouteName()=='typicons-icon' ? 'active' : '' }}">Typicons
                                icon</a></li>
                        <li><a href="{{route('ionic-icon')}}"
                                class="{{ Route::currentRouteName()=='ionic-icon' ? 'active' : '' }}">Ionic
                                icon</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/buttons' ? 'active' : '' }}"
                        href="#"><i data-feather="cloud"></i><span>{{ trans('lang.Buttons') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/buttons' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{ request()->route()->getPrefix() == '/buttons' ? 'block;' : 'none;' }}">
                        <li><a href="{{route('buttons')}}"
                                class="{{ Route::currentRouteName()=='buttons' ? 'active' : '' }}">Default
                                Style</a>
                        </li>
                        <li><a href="{{route('buttons-flat')}}"
                                class="{{ Route::currentRouteName()=='buttons-flat' ? 'active' : '' }}">Flat
                                Style</a></li>
                        <li><a href="{{route('buttons-edge')}}"
                                class="{{ Route::currentRouteName()=='buttons-edge' ? 'active' : '' }}">Edge
                                Style</a></li>
                        <li><a href="{{route('raised-button')}}"
                                class="{{ Route::currentRouteName()=='raised-button' ? 'active' : '' }}">Raised
                                Style</a></li>
                        <li><a href="{{route('button-group')}}"
                                class="{{ Route::currentRouteName()=='button-group' ? 'active' : '' }}">Button
                                Group</a></li>
                    </ul>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/charts' ? 'active' : '' }}"
                        href="#"><i data-feather="bar-chart"></i><span>{{ trans('lang.Charts') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/charts' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{ request()->route()->getPrefix() == '/charts' ? 'block;' : 'none;' }}">
                        <li><a href="{{route('echarts')}}"
                                class="{{ Route::currentRouteName()=='echarts' ? 'active' : '' }}">Echarts</a>
                        </li>
                        <li><a href="{{route('chart-apex')}}"
                                class="{{ Route::currentRouteName()=='chart-apex' ? 'active' : '' }}">Apex
                                Chart</a>
                        </li>
                        <li><a href="{{route('chart-google')}}"
                                class="{{ Route::currentRouteName()=='chart-google' ? 'active' : '' }}">Google
                                Chart</a></li>
                        <li><a href="{{route('chart-sparkline')}}"
                                class="{{ Route::currentRouteName()=='chart-sparkline' ? 'active' : '' }}">Sparkline
                                chart</a></li>
                        <li><a href="{{route('chart-flot')}}"
                                class="{{ Route::currentRouteName()=='chart-flot' ? 'active' : '' }}">Flot
                                Chart</a>
                        </li>
                        <li><a href="{{route('chart-knob')}}"
                                class="{{ Route::currentRouteName()=='chart-knob' ? 'active' : '' }}">Knob
                                Chart</a>
                        </li>
                        <li><a href="{{route('chart-morris')}}"
                                class="{{ Route::currentRouteName()=='chart-morris' ? 'active' : '' }}">Morris
                                Chart</a></li>
                        <li><a href="{{route('chartjs')}}"
                                class="{{ Route::currentRouteName()=='chartjs' ? 'active' : '' }}">Chatjs
                                Chart</a>
                        </li>
                        <li><a href="{{route('chartist')}}"
                                class="{{ Route::currentRouteName()=='chartist' ? 'active' : '' }}">Chartist
                                Chart</a></li>
                        <li><a href="{{route('chart-peity')}}"
                                class="{{ Route::currentRouteName()=='chart-peity' ? 'active' : '' }}">Peity
                                Chart
                            </a></li>
                    </ul>
                </li>
                <li class="sidebar-main-title">
                    <div>
                        <h6>{{ trans('lang.Pages') }}</h6>
                        <p>{{ trans('lang.All neccesory pages added') }}</p>
                    </div>
                </li>
                <li class="sidebar-list"><a
                        class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='landing-page' ? 'active' : '' }}"
                        href="{{route('landing-page')}}"><i data-feather="cast"> </i><span>{{ trans('lang.Landing
                                Page') }}</span></a></li>
                <li class="sidebar-list"><a
                        class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='sample-page' ? 'active' : '' }}"
                        href="{{route('sample-page')}}"><i data-feather="file-text">
                        </i><span>{{ trans('lang.Sample
                                page') }}</span></a></li>
                <li class="sidebar-list"><a
                        class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='internationalization' ? 'active' : '' }}"
                        href="{{route('internationalization')}}"><i data-feather="globe">
                        </i><span>{{
                                trans('lang.Internationalization') }}</span></a></li>

                <li class="mega-menu">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/others' ? 'active' : '' }}"
                        href="#"><i data-feather="layers"></i><span>{{ trans('lang.Others') }}</span>
                        <div class="according-menu other"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/others' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <div class="mega-menu-container menu-content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col mega-box">
                                    <div class="link-section">
                                        <div class="submenu-title">
                                            <h5>Error Page</h5>
                                            <div class="according-menu"><i
                                                    class="fa fa-angle-{{ in_array(Route::currentRouteName(), ['error-400', 'error-401', 'error-403', 'error-404', 'error-500', 'error-503']) ? 'down' : 'right' }}"></i>
                                            </div>
                                        </div>
                                        <ul class="submenu-content opensubmegamenu"
                                            style="display: {{ in_array(Route::currentRouteName(), ['error-400', 'error-401', 'error-403', 'error-404', 'error-500', 'error-503']) ? 'block;' : 'none;' }}">
                                            <li><a href="{{route('error-400')}}"
                                                    class="{{ Route::currentRouteName()=='error-400' ? 'active' : '' }}">Error
                                                    400</a></li>
                                            <li><a href="{{route('error-401')}}"
                                                    class="{{ Route::currentRouteName()=='error-401' ? 'active' : '' }}">Error
                                                    401</a></li>
                                            <li><a href="{{route('error-403')}}"
                                                    class="{{ Route::currentRouteName()=='error-403' ? 'active' : '' }}">Error
                                                    403</a></li>
                                            <li><a href="{{route('error-404')}}"
                                                    class="{{ Route::currentRouteName()=='error-404' ? 'active' : '' }}">Error
                                                    404</a></li>
                                            <li><a href="{{route('error-500')}}"
                                                    class="{{ Route::currentRouteName()=='error-500' ? 'active' : '' }}">Error
                                                    500</a></li>
                                            <li><a href="{{route('error-503')}}"
                                                    class="{{ Route::currentRouteName()=='error-503' ? 'active' : '' }}">Error
                                                    503</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col mega-box">
                                    <div class="link-section">
                                        <div class="submenu-title">
                                            <h5>Coming Soon</h5>
                                            <div class="according-menu"><i
                                                    class="fa fa-angle-{{ in_array(Route::currentRouteName(), ['comingsoon', 'comingsoon-bg-video', 'comingsoon-bg-img']) ? 'down' : 'right' }}"></i>
                                            </div>
                                        </div>
                                        <ul class="submenu-content opensubmegamenu"
                                            style="display: {{ in_array(Route::currentRouteName(), ['comingsoon', 'comingsoon-bg-video', 'comingsoon-bg-img']) ? 'block;' : 'none;' }}">
                                            <li><a href="{{route('comingsoon')}}"
                                                    class="{{ Route::currentRouteName()=='comingsoon' ? 'active' : '' }}">Coming
                                                    Simple</a></li>
                                            <li><a href="{{route('comingsoon-bg-video')}}"
                                                    class="{{ Route::currentRouteName()=='comingsoon-bg-video' ? 'active' : '' }}">Coming
                                                    with Bg
                                                    video</a></li>
                                            <li><a href="{{route('comingsoon-bg-img')}}"
                                                    class="{{ Route::currentRouteName()=='comingsoon-bg-img' ? 'active' : '' }}">Coming
                                                    with Bg
                                                    Image</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col mega-box">
                                    <div class="link-section">
                                        <div class="submenu-title">
                                            <h5>Email templates</h5>
                                            <div class="according-menu"><i
                                                    class="fa fa-angle-{{ in_array(Route::currentRouteName(), ['basic-template', 'email-header', 'template-email', 'ecommerce-templates', 'email-order-success']) ? 'down' : 'right' }}"></i>
                                            </div>
                                        </div>
                                        <ul class="submenu-content opensubmegamenu"
                                            style="display: {{ in_array(Route::currentRouteName(), ['basic-template', 'email-header', 'template-email', 'ecommerce-templates', 'email-order-success']) ? 'block;' : 'none;' }}">
                                            <li><a href="{{route('basic-template')}}"
                                                    class="{{ Route::currentRouteName()=='basic-template' ? 'active' : '' }}">Basic
                                                    Email</a></li>
                                            <li><a href="{{route('email-header')}}"
                                                    class="{{ Route::currentRouteName()=='email-header' ? 'active' : '' }}">Basic
                                                    With Header</a>
                                            </li>
                                            <li><a href="{{route('template-email')}}"
                                                    class="{{ Route::currentRouteName()=='template-email' ? 'active' : '' }}">Ecomerce
                                                    Template</a>
                                            </li>
                                            <li><a href="{{route('template-email-2')}}"
                                                    class="{{ Route::currentRouteName()=='template-email-2' ? 'active' : '' }}">Email
                                                    Template 2</a>
                                            </li>
                                            <li><a href="{{route('ecommerce-templates')}}"
                                                    class="{{ Route::currentRouteName()=='ecommerce-templates' ? 'active' : '' }}">Ecommerce
                                                    Email</a></li>
                                            <li><a href="{{route('email-order-success')}}"
                                                    class="{{ Route::currentRouteName()=='email-order-success' ? 'active' : '' }}">Order
                                                    Success</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="sidebar-main-title">
                    <div>
                        <h6>{{ trans('lang.Miscellaneous') }}</h6>
                        <p>{{ trans('lang.Bouns pages & apps') }}</p>
                    </div>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/gallery' ? 'active' : '' }}"
                        href="#"><i data-feather="image"></i><span>{{ trans('lang.Gallery') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/gallery' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/gallery' ? 'block' : 'none;' }};">
                        <li><a href="{{route('gallery')}}"
                                class="{{ Route::currentRouteName()=='gallery' ? 'active' : '' }}">Gallery
                                Grid</a>
                        </li>
                        <li><a href="{{route('gallery-with-description')}}"
                                class="{{ Route::currentRouteName()=='gallery-with-description' ? 'active' : '' }}">Gallery
                                Grid Desc</a></li>
                        <li><a href="{{route('gallery-masonry')}}"
                                class="{{ Route::currentRouteName()=='gallery-masonry' ? 'active' : '' }}">Masonry
                                Gallery</a></li>
                        <li><a href="{{route('masonry-gallery-with-disc')}}"
                                class="{{ Route::currentRouteName()=='masonry-gallery-with-disc' ? 'active' : '' }}">Masonry
                                with Desc</a></li>
                        <li><a href="{{route('gallery-hover')}}"
                                class="{{ Route::currentRouteName()=='gallery-hover' ? 'active' : '' }}">Hover
                                Effects</a></li>
                    </ul>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/blog' ? 'active' : '' }}"
                        href="#"><i data-feather="film"></i><span>{{ trans('lang.Blog') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/blog' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/blog' ? 'block' : 'none;' }};">
                        <li><a href="{{route('blog')}}"
                                class="{{ Route::currentRouteName()=='blog' ? 'active' : '' }}">Blog
                                Details</a>
                        </li>
                        <li><a href="{{route('blog-single')}}"
                                class="{{ Route::currentRouteName()=='blog-single' ? 'active' : '' }}">Blog
                                Single</a></li>
                        <li><a href="{{route('add-post')}}"
                                class="{{ Route::currentRouteName()=='add-post' ? 'active' : '' }}">Add
                                Post</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-list"><a
                        class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='faq' ? 'active' : '' }}"
                        href="{{route('faq')}}"><i data-feather="help-circle"> </i><span>{{ trans('lang.FAQ')
                                }}</span></a></li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/job-search' ? 'active' : '' }}"
                        href="#"><i data-feather="package"></i><span>{{ trans('lang.Job Search') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/job-search' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/job-search' ? 'block' : 'none;' }};">
                        <li><a href="{{route('job-cards-view')}}"
                                class="{{ Route::currentRouteName()=='job-cards-view' ? 'active' : '' }}">Cards
                                view</a></li>
                        <li><a href="{{route('job-list-view')}}"
                                class="{{ Route::currentRouteName()=='job-list-view' ? 'active' : '' }}">List
                                View</a></li>
                        <li><a href="{{route('job-details')}}"
                                class="{{ Route::currentRouteName()=='job-details' ? 'active' : '' }}">Job
                                Details</a></li>
                        <li><a href="{{route('job-apply')}}"
                                class="{{ Route::currentRouteName()=='job-apply' ? 'active' : '' }}">Apply</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/learning' ? 'active' : '' }}"
                        href="#"><i data-feather="radio"></i><span>{{ trans('lang.Learning') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/learning' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/learning' ? 'block' : 'none;' }};">
                        <li><a href="{{route('learning-list-view')}}"
                                class="{{ Route::currentRouteName()=='learning-list-view' ? 'active' : '' }}">Learning
                                List</a></li>
                        <li><a href="{{route('learning-detailed')}}"
                                class="{{ Route::currentRouteName()=='learning-detailed' ? 'active' : '' }}">Detailed
                                Course</a></li>
                    </ul>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/maps' ? 'active' : '' }}"
                        href="#"><i data-feather="map"></i><span>{{ trans('lang.Maps') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/maps' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/maps' ? 'block' : 'none;' }};">
                        <li><a href="{{route('map-js')}}"
                                class="{{ Route::currentRouteName()=='map-js' ? 'active' : '' }}">Maps
                                JS</a></li>
                        <li><a href="{{route('vector-map')}}"
                                class="{{ Route::currentRouteName()=='vector-map' ? 'active' : '' }}">Vector
                                Maps</a></li>
                    </ul>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/editors' ? 'active' : '' }}"
                        href="#"><i data-feather="edit"></i><span>{{ trans('lang.Editors') }}</span>
                        <div class="according-menu"><i
                                class="fa fa-angle-{{request()->route()->getPrefix() == '/editors' ? 'down' : 'right' }}"></i>
                        </div>
                    </a>
                    <ul class="sidebar-submenu"
                        style="display: {{request()->route()->getPrefix() == '/editors' ? 'block' : 'none;' }};">
                        <li><a href="{{route('summernote')}}"
                                class="{{ Route::currentRouteName()=='summernote' ? 'active' : '' }}">Summer
                                Note</a></li>
                        <li><a href="{{route('ckeditor')}}"
                                class="{{ Route::currentRouteName()=='ckeditor' ? 'active' : '' }}">CK
                                editor</a>
                        </li>
                        <li><a href="{{route('simple-mde')}}"
                                class="{{ Route::currentRouteName()=='simple-mde' ? 'active' : '' }}">MDE
                                editor</a>
                        </li>
                        <li><a href="{{route('ace-code-editor')}}"
                                class="{{ Route::currentRouteName()=='ace-code-editor' ? 'active' : '' }}">ACE
                                code
                                editor</a></li>
                    </ul>
                </li>

                <li class="sidebar-list"><a
                        class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'knowledgebase' ? 'active' : ''}}"
                        href="{{ route('knowledgebase') }}"><i data-feather="sunrise">
                        </i><span>{{
                                trans('lang.Knowledgebase') }}</span></a></li>
                <li class="sidebar-list"><a
                        class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='support-ticket' ? 'active' : '' }}"
                        href="{{route('support-ticket')}}"><i data-feather="users"> </i><span>{{ trans('lang.Support
                                Ticket') }}</span></a></li>
                --}}
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
<style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    .navbar {
      overflow: hidden;
      background-color: #333;
    }

    .navbar a {
      float: left;
      font-size: 16px;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    .dropdown {
      float: left;
      overflow: hidden;
    }

    .dropdown .dropbtn {
      font-size: 16px;  
      border: none;
      outline: none;
      color: white;
      padding: 14px 16px;
      background-color: inherit;
      font-family: inherit;
      margin: 0;
    }

    .navbar a:hover, .dropdown:hover .dropbtn {
      background-color: red;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .dropdown-content a {
      float: none;
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
    }

    .dropdown-content a:hover {
      background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .scrollbar-inner > .scroll-element,
    .scrollbar-inner > .scroll-element div {
        border: none;
        margin: 0;
        padding: 0;
        position: absolute;
        z-index: 10;
    }

    .scrollbar-inner > .scroll-element div {
        display: block;
        height: 100%;
        left: 0;
        top: 0;
        width: 100%;
    }

    .scrollbar-inner > .scroll-element.scroll-x {
        bottom: 2px;
        height: 8px;
        left: 0;
        width: 100%;
    }

    .scrollbar-inner > .scroll-element.scroll-y {
        height: 100%;
        right: 2px;
        top: 0;
        width: 8px;
    }

    .scrollbar-inner > .scroll-element .scroll-element_outer {
        overflow: hidden;
    }

    .scrollbar-inner > .scroll-element .scroll-element_outer,
    .scrollbar-inner > .scroll-element .scroll-element_track,
    .scrollbar-inner > .scroll-element .scroll-bar {
        border-radius: 8px;
    }

    .scrollbar-inner > .scroll-element .scroll-element_track,
    .scrollbar-inner > .scroll-element .scroll-bar {
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=40)";
        filter: alpha(opacity=40);
        opacity: 0.4;
    }

    .scrollbar-inner > .scroll-element .scroll-element_track {
        background-color: #e0e0e0;
    }

    .scrollbar-inner > .scroll-element .scroll-bar {
        background-color: #c2c2c2;
    }

    .scrollbar-inner > .scroll-element:hover .scroll-bar {
        background-color: #919191;
    }

    .scrollbar-inner > .scroll-element.scroll-draggable .scroll-bar {
        background-color: #919191;
    }

    /* update scrollbar offset if both scrolls are visible */

    .scrollbar-inner
        > .scroll-element.scroll-x.scroll-scrolly_visible
        .scroll-element_track {
        left: -12px;
    }

    .scrollbar-inner
        > .scroll-element.scroll-y.scroll-scrollx_visible
        .scroll-element_track {
        top: -12px;
    }

    .scrollbar-inner
        > .scroll-element.scroll-x.scroll-scrolly_visible
        .scroll-element_size {
        left: -12px;
    }

    .scrollbar-inner
        > .scroll-element.scroll-y.scroll-scrollx_visible
        .scroll-element_size {
        top: -12px;
    }


    
    .scrollbar-outer > .scroll-element,
    .scrollbar-outer > .scroll-element div {
        border: none;
        margin: 0;
        padding: 0;
        position: absolute;
        z-index: 10;
    }

    .scrollbar-outer > .scroll-element {
        background-color: #ffffff;
    }

    .scrollbar-outer > .scroll-element div {
        display: block;
        height: 100%;
        left: 0;
        top: 0;
        width: 100%;
    }

    .scrollbar-outer > .scroll-element.scroll-x {
        bottom: 0;
        height: 12px;
        left: 0;
        width: 100%;
    }

    .scrollbar-outer > .scroll-element.scroll-y {
        height: 100%;
        right: 0;
        top: 0;
        width: 12px;
    }

    .scrollbar-outer > .scroll-element.scroll-x .scroll-element_outer {
        height: 8px;
        top: 2px;
    }

    .scrollbar-outer > .scroll-element.scroll-y .scroll-element_outer {
        left: 2px;
        width: 8px;
    }

    .scrollbar-outer > .scroll-element .scroll-element_outer {
        overflow: hidden;
    }

    .scrollbar-outer > .scroll-element .scroll-element_track {
        background-color: #eeeeee;
    }

    .scrollbar-outer > .scroll-element .scroll-element_outer,
    .scrollbar-outer > .scroll-element .scroll-element_track,
    .scrollbar-outer > .scroll-element .scroll-bar {
        border-radius: 8px;
    }

    .scrollbar-outer > .scroll-element .scroll-bar {
        background-color: #d9d9d9;
    }

    .scrollbar-outer > .scroll-element .scroll-bar:hover {
        background-color: #c2c2c2;
    }

    .scrollbar-outer > .scroll-element.scroll-draggable .scroll-bar {
        background-color: #919191;
    }

    /* scrollbar height/width & offset from container borders */

    .scrollbar-outer > .scroll-content.scroll-scrolly_visible {
        left: -12px;
        margin-left: 12px;
    }

    .scrollbar-outer > .scroll-content.scroll-scrollx_visible {
        top: -12px;
        margin-top: 12px;
    }

    .scrollbar-outer > .scroll-element.scroll-x .scroll-bar {
        min-width: 10px;
    }

    .scrollbar-outer > .scroll-element.scroll-y .scroll-bar {
        min-height: 10px;
    }

    /* update scrollbar offset if both scrolls are visible */

    .scrollbar-outer
        > .scroll-element.scroll-x.scroll-scrolly_visible
        .scroll-element_track {
        left: -14px;
    }

    .scrollbar-outer
        > .scroll-element.scroll-y.scroll-scrollx_visible
        .scroll-element_track {
        top: -14px;
    }

    .scrollbar-outer
        > .scroll-element.scroll-x.scroll-scrolly_visible
        .scroll-element_size {
        left: -14px;
    }

    .scrollbar-outer
        > .scroll-element.scroll-y.scroll-scrollx_visible
        .scroll-element_size {
        top: -14px;
    }
</style>
<header class="main-header">
    <label for="btn-nav" class="btn-nav">Menu</label>
    <input type="checkbox" id="btn-nav">

    <nav>
        <div class="scrollbar-inner">
            <div class="navigation">
                <ul class="redes">

                    <?php foreach ( $redes as $red ) : ?>

                    <li>
                        <a href="<?=$red[1]?>" target="_blank" class="logo-svg-redes">
                            <?php echo file_get_contents("homePublic/imgs/icons/".$red[0]); ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            
                <ul class="opts">
                    <li><a href="/">{{__("Home")}}</a></li>
                    <li><a href="{{ route('service', Session::get('locale')) }}" id="services">{{__('Services')}}</a></li>
                    <li><a href="{{ route('dataResearch', Session::get('locale')) }}" id="dataResearch">{{__('DataResearch')}}</a></li>
                    <li><a href="{{ route('blogs',Session::get('locale')) }}" id="blog">{{__('Blog')}}</a></li>
                    <li><a href="{{ route('cases', Session::get('locale')) }}" id="cases">{{__('Cases')}}</a></li>
                    {{-- <li><a href="">{{__('Us')}}</a></li>
                    <li><a href="">{{__('Contact')}}</a></li> --}}
                    
                </ul>
                
                <ul class="opts">
                {{-- <hr> --}}
                    <h3>{{__("Language")}}</h3>
                    @foreach (App\Models\Idiom::all() as $value )
                        <li class="dropdown">
                            <a href="{{route('lang', $value->acronym)}}"> <h5>{{ __($value->name) }}</h5> </a>
                        </li>
                    @endforeach
                  
                </ul>
          </div>
        </div>
    </nav>

</header>


<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>        
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



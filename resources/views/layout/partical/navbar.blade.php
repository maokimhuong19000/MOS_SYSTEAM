<navs class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo"></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only" style="background-color: black">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar" style="color: black;"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" style="margin-right: 30px;">
            <form  style= "display: none "class="navbar-form navbar-right" role="search"> <div class="form-group is-empty"> <input type="text" class="form-control" placeholder="Search"> <span class="material-input"></span> <span class="material-input"></span></div> <button type="submit" class="btn btn-white btn-round btn-just-icon"> <i class="material-icons">search</i> <div class="ripple-container"></div> </button> </form>
            <ul class="navbar-nav">



              <li class="dropdown">
    {{-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $currentLanguage->name }} <b class="caret"></b></a> --}}
    {{-- <ul class="dropdown-menu">
        @foreach ($altLocalizedUrls as $alt)
            <li><a href="{{ $alt['url'] }}" hreflang="{{ $alt['locale'] }}">{{ $alt['name'] }}</a></li>
        @endforeach
    </ul> --}}
</li>
              
              
              <li class="nav-item dropdown" >
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i style="display: none" class="material-icons">notifications</i>
                  <span class="notification">0</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink" style="display: none">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ Auth::user()->name }}
                        <i class="fa fa-user fa-fw"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li style="display: none"><a href="#" style="color: black"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li style="display: none"><a href="#" style="color: black"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('logout') }}"  
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                                
                              Logout
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                          </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
            </ul>
          </div>
        </div>
      </navs>
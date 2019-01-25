 <!--  nav skyblue-->
 <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{url('/')}}">Home</a>
      </div>
  
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{route('user.profile')}}"><i class="fas fa-user-circle"></i>  Account</a></li>
          
            
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @else
           
            <li class="nav-item dropdown" id='markasread' onclick="markNotificationAsRead('{{count(auth()->user()->unreadNotifications)}}')">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                 <span class="glyphicon glyphicon-globe"></span> Notifications <span class="badge">{{count(auth()->user()->unreadNotifications)}}</span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        @forelse(auth()->user()->unreadNotifications as $notification) 
                        @include('admin.news.notifications.'.snake_case(class_basename($notification->type)))
                        @empty
                        <a href="#">No Notifications</a>
                        @endforelse
                    </li>
                </ul> 
            </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="text-align:center">
                        <a class="dropdown-item" href="{{ route('user.logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
      </div>
    </div>
  </nav>
  <br><br><br>
<!-- Navigation -->
<?php $url = explode("/", request()->url()); ?>
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('home') }}"> Laravel Test App</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->full_name }} <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="{{url('users/'.Auth::user()->id.'/edit')}}"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>

                <li>
                    <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                    <i class="fa fa-fw fa-power-off"></i> Log Out
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>
    </ul>
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                <li {{( in_array('dashboard', $url)  || Request::path() == '/'  )  ? 'class=active' : ''  }}>
                    <a href="{{ url('/dashboard') }}" {{Request::path() == '/'  ? 'class=active' : ''  }}><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li  {{(in_array('tickets', $url)) ? 'class=active' : ''  }}>
                    <a href="{{ url('/tickets') }}"><i class="fa fa-fw fa-asterisk"></i> Tickets</a>
                </li>
                <li  {{(in_array('contacts', $url)) ? 'class=active' : ''  }}>
                    <a href="{{ url('/contacts') }}"><i class="fa fa-fw fa-users"></i> Contacts</a>
                </li>
                <li  {{(in_array('users', $url)) ? 'class=active' : ''  }}>
                    <a href="{{ url('/users') }}"><i class="fa fa-star"></i> Staff</a>
                </li>
                <li  {{(in_array('ticket-states', $url)) ? 'class=active' : ''  }}>
                    <a href="{{ url('/ticket-states') }}"><i class="fa fa-info-circle"></i> Ticket States</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
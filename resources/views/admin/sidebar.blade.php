<div class="d-flex align-items-stretch">
      <nav id="sidebar">
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar">
            <img src="{{asset('admin/img/letterA.png')}}" alt="..." class="img-fluid rounded-circle">
          </div>
          <div class="title">
            <h1 class="h5"> Admin</h1>
            <p>Cafe Staff</p>
          </div>
        </div>
        
        <span class="heading">Main</span>
        <ul class="list-unstyled">
                <li class="{{ request()->is('home') ? 'active' : '' }}">
                    <a href="{{url('home')}}"> 
                        <i class="icon-home"></i>Dashboard 
                    </a>
                </li>
            
                <li>
                    <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> 
                        <i class="icon-windows"></i>Menu Management 
                    </a>
                    <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="{{url('add_coffee')}}">Add Coffee</a></li>
                        <li><a href="{{url('view_coffee')}}">View Coffee</a></li>
                    </ul>
                </li>

                <li class="{{ request()->is('all_orders') ? 'active' : '' }}">
                    <a href="{{ url('all_orders') }}"> 
                        <i class="icon-padnote"></i>Orders Management 
                    </a>
                </li>
        </ul>
      </nav>
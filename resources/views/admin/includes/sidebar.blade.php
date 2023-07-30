<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{asset('dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Himu's area</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Home Banner</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Home Banner area</h6>
                <a class="collapse-item" href="{{route('home.banner')}}">Banner</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>About</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('home.about') }}">about all</a>
            </div>
        </div>

    </li>

    <!-- about multi photo -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitie"
           aria-expanded="true" aria-controls="collapseUtilitie">
            <i class="fas fa-fw fa-image"></i>
            <span>About Photos</span>
        </a>
        <div id="collapseUtilitie" class="collapse" aria-labelledby="headingUtilitie"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('about_multiImage') }}">Multi photo</a>
            </div>
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('all_multiImage') }}">All Multi photo</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitie2"
           aria-expanded="true" aria-controls="collapseUtilitie2">
            <i class="fas fa-fw fa-image"></i>
            <span>Portfolio</span>
        </a>
        <div id="collapseUtilitie2" class="collapse" aria-labelledby="headingUtilitie"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('add.portfolio') }}">add portfolio</a>
            </div>
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('show.portfolio') }}">all portfolio</a>
            </div>
        </div>
    </li>

</ul>

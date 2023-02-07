<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 px-4 px-lg-5 shadow">
    <a href="/" class="navbar-brand d-flex align-items-center">
        <h2 class="m-0 text-primary"><img class="img-fluid me-2" src="/{{'template'}}/img/logo djpb-1.png" alt="Logo DJPB"
                style="width: 45px;">DJPb</h2>
    </a>
    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-4 py-lg-0">
            <a href="/" class="nav-item nav-link {{request() -> is('/') ? 'active' : ' '}}">Home</a>
            <a href="/about" class="nav-item nav-link {{request() -> is('/about') ? 'active' : ' '}}">About</a>
            {{-- <a href="about.html" class="nav-item nav-link">About</a> --}}
            @if (Auth::check() == false)
                <a href="/login" class="nav-item nav-link">Login</a>
            @endif
            @if (Auth::check())
                <a href="/change-password" class="nav-item nav-link">Change Password</a>
                <a href="{{ route('logout') }}" class="nav-item nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endif
        
        </div>
    </div>
</nav>
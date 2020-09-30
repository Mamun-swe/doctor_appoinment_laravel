<h1>Client Dashboard</h1>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <p class="text-capitalize navbar-brand mb-0">{{Auth()->User()->name}}</p>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link active" href="{{ url('/') }}">Home</a>
                <a href="{{ route('auth.logout') }}"
                    class="nav-item nav-link active"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </nav>
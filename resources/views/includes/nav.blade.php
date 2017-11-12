<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="{{ url('/') }}" > Veever</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <a class="nav-link" href="#"> Start A Transaction</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">What is Veever? </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Help </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact Us </a>
      </li>

    </ul>

    <ul class="navbar-nav  navbar-right">
      @guest
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Sign up</a></li>
      @else
          <div class=" dropdown">
              <button class="btn btn-secondary dropdown-toggle" id="dropdownMenu2"data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false" >
                  {{ Auth::user()->name }} <span class="caret"></span>
              </button>

              <div  class="dropdown-menu" aria-labelledby="dropdownMenu2">
                      <a class="dropdown-item"  href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                          Logout

                      </a>
                      <a class="dropdown-item" href="/home"><span class="fa fa-dashboard"></span> My Dashboard</a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>

              </ul>
          </div>
      @endguest


    </ul>
  </div>

</nav>

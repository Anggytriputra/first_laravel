<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
      <a class="navbar-brand" href="/">HACACA LOGISTICS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


      @auth
      @else
      @endauth

      <div class="collapse navbar-collapse" id="navbarNav">
        @auth
        <ul class="navbar-nav ms-auto">
          <li class="nav-item ">
            <a href="/login" class="nav-link" >👋 Hii, {{ auth()->user()->username }}</a>
          </li>
        </ul>
        <form action="/logout" method="post">
          @csrf
          <button type="submit" class="btn btn-danger border">
            Logout
          </button>
        </form>
      @else
      <ul class="navbar-nav ms-auto">
        <li class="nav-item ">
          <a href="/login" class="nav-link" >Login</a>
        </li>
      </ul>
      @endauth
      </div>
    </div>
  </nav>
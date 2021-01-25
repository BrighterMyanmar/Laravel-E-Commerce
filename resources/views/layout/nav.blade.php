<div class="container-fluid bg-dark">
<nav class="container navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#">
        E-Commerce
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active  text-white" aria-current="page" href="{{route('all-orders')}}">Orders</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle  text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Jobs
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{route('cats.index')}}">Category</a></li>
            <li><a class="dropdown-item" href="{{route('tags.index')}}">Tags</a></li>
             <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{route('products.index')}}">Products</a></li>
          </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link  text-white" href="{{route('user-logout')}}">Logout</a>
          </li>
      </ul>
    </div>
  </div>
</nav>
</div>

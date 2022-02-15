<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item {{ Route::current()->getName() == 'dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <span class="menu-title">Dashboard</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('author.list') }}">
          <span class="menu-title">Autores</span>
          <i class="mdi mdi-account-multiple menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('publisher.list') }}">
          <span class="menu-title">Editoras</span>
          <i class="mdi mdi-contacts menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('gender.list') }}">
          <span class="menu-title">Gêneros</span>
          <i class="mdi mdi-bookmark menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">
          <span class="menu-title">Leituras</span>
          <i class="mdi mdi-book-open-page-variant menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('book.list') }}">
          <span class="menu-title">Minha Biblioteca</span>
          <i class="mdi mdi-library-books menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">
          <span class="menu-title">Movimentos</span>
          <i class="mdi mdi-swap-vertical menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">
          <span class="menu-title">Wishlist</span>
          <i class="mdi mdi-gift menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">
          <span class="menu-title">Configurações</span>
          <i class="mdi mdi-settings menu-icon"></i>
        </a>
      </li>
    </ul>
  </nav>
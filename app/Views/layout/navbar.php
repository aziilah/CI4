<nav class="navbar navbar-expand-lg bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Nur Aziilah</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/pages/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/pages/contact">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/comics/index">Comic</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/authors/index">Author</a>
        </li>

        <?php if (logged_in()) : ?>
          <li class="nav-item">
            <a class="nav-link" href="/logout">Logout</a>
          </li>
        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
          </li>
        <?php endif; ?>

      </ul>
    </div>
  </div>
</nav>
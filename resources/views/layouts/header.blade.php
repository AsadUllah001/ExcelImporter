<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('home') }}">Excel Importer</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-5">
        <li class="nav-item active  mr-sm-2">
          <a class="nav-link" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('files.index') }}">View Files</a>
        </li>
      </ul>
    </div>
  </nav>

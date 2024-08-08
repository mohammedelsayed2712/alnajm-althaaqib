<ul class="nav flex-column">

  <li class="nav-item">
      <a class="nav-link" aria-current="page" href="{{ route('admin_dashboard') }}">
          <span data-feather="home" class="align-text-bottom"></span>
          Alnajm Althaaqib
      </a>
  </li>

  {{-- <li class="nav-item dd-item">
      <a class="nav-link dd-link collapsed" data-bs-toggle="collapse" data-delay="0"
          href="#collapseSetting" role="button" aria-expanded="false"
          aria-controls="collapseSetting">
          <span data-feather="folder" class="align-text-bottom"></span>
          Settings
      </a>
      <div class="collapse" id="collapseSetting">
          <a class="nav-link inner-item" href="#">
              General Settings
          </a>
          <a class="nav-link inner-item" href="#">
              Payment Settings
          </a>
      </div>
  </li> --}}

  <li class="nav-item">
      <a class="nav-link" href="{{ route('cvs.index') }}">
          <span data-feather="file-text" class="align-text-bottom"></span>
          CV
      </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('nationalities.index') }}">
        <span data-feather="file-text" class="align-text-bottom"></span>
        Countries
    </a>
   </li>
   <li class="nav-item">
    <a class="nav-link" href="{{ route('services.index') }}">
        <span data-feather="file-text" class="align-text-bottom"></span>
        Service
    </a>
   </li>

  <li class="nav-item">
      <a class="nav-link" href="{{ route('about_us.index') }}">
          <span data-feather="file-text" class="align-text-bottom"></span>
          About Us
      </a>
  </li>

  {{-- <li class="nav-item">
      <a class="nav-link" href="form-tab.html">
          <span data-feather="file-text" class="align-text-bottom"></span>
          Form Tab
      </a>
  </li>
  <li class="nav-item">
      <a class="nav-link" href="table.html">
          <span data-feather="file-text" class="align-text-bottom"></span>
          Table
      </a>
  </li>
  <li class="nav-item">
      <a class="nav-link" href="datatable.html">
          <span data-feather="file-text" class="align-text-bottom"></span>
          Data Table
      </a>
  </li> --}}
</ul>

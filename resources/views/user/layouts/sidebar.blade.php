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
      <a class="nav-link" href="{{ route('paginates.index') }}">
          <span data-feather="file-text" class="align-text-bottom"></span>
          Photos
      </a>
  </li>

  <li class="nav-item dd-item">
      <a class="nav-link dd-link collapsed" data-bs-toggle="collapse" data-delay="0"
          href="#collapseSetting" role="button" aria-expanded="false"
          aria-controls="collapseSetting">
          <span data-feather="folder" class="align-text-bottom"></span>
          About
      </a>
      <div class="collapse" id="collapseSetting">
          <a class="nav-link inner-item" href="{{ route('about_us.index') }}">
              About Us
          </a>
          <a class="nav-link inner-item" href="{{ route('about_service.index') }}">
              About Services
          </a>
      </div>
  </li>
  </li>

  <li class="nav-item dd-item">
      <a class="nav-link dd-link collapsed" data-bs-toggle="collapse" data-delay="0"
          href="#collapseSettingService" role="button" aria-expanded="false"
          aria-controls="collapseSettingService">
          <span data-feather="folder" class="align-text-bottom"></span>
          Services
      </a>
      <div class="collapse" id="collapseSettingService">
          <a class="nav-link inner-item" href="{{ route('recruitment.index') }}">
              Recruitment Services
          </a>
          <a class="nav-link inner-item" href="{{ route('representatives.index') }}">
             Customer Service Representatives
          </a>
      </div>
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
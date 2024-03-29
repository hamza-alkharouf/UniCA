<link href ="/assets/css/app.css" rel = "stylesheet">

  <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="" class="brand-link">
          <img src="{{ url('/assets/img/logo.jpeg') }}" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">UniCA</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="info">
                  <a href="" class="d-block">{{auth()->user()->name}}</a>
              </div>
          </div>
          <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="{{ __('Search') }}"
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <li class="nav-header">{{ __('Control Panel') }}</li>
                  <li class="nav-item">
                      <a href="{{ route('dashboard.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              {{ __('Dashboard') }}
                          </p>
                      </a>
                  </li>
                  @if (auth()->user()->can('show form complaints') || auth()->user()->can('show details complaints'))
                      <li class="nav-header">{{ __('Student') }}</li>
                  @endif

                  @can('show form complaints')
                      <li class="nav-item">
                          <a href="{{ route('complaints.form.index') }}" class="nav-link">
                              <i class="fa-solid fa-school"></i>
                              <p>
                                  {{ __('Complaints') }}
                              </p>
                          </a>
                      </li>
                  @endcan
                  @can('show details complaints')
                      <li class="nav-item">
                          <a href="{{ route('complaints.details.index') }}" class="nav-link">
                              <i class="fa-solid fa-school"></i>
                              <p>
                                  {{ __('Complaints Details') }}
                              </p>
                          </a>
                      </li>
                  @endcan
                  @if (auth()->user()->can('show college') ||auth()->user()->can('import student')||auth()->user()->can('import course')|| auth()->user()->can('show department'))
                      <li class="nav-header">{{ __('University') }}</li>
                  @endif
                  @can('show college')
                      <li class="nav-item">
                          <a href="{{ route('university.college.index') }}" class="nav-link">
                              <i class="fa-solid fa-school"></i>
                              <p>
                                  {{ __('College') }}
                              </p>
                          </a>
                      </li>
                  @endcan
                  @can('show department')
                      <li class="nav-item">
                          <a href="{{ route('university.department.index') }}" class="nav-link">
                              <i class="fa-solid fa-graduation-cap"></i>
                              <p>
                                  {{ __('Department') }}
                              </p>
                          </a>
                      </li>
                  @endcan
                  @can('import student')    
                  <li class="nav-item">
                      <a href="{{ route('university.department.import.student.show') }}" class="nav-link">
                          <i class="fa-solid fa-graduation-cap"></i>
                          <p>
                              {{ __('Import Student') }}
                          </p>
                      </a>
                  </li>
                  @endcan
                  @can('import course')
                  <li class="nav-item">
                      <a href="{{ route('university.department.import.course.show') }}" class="nav-link">
                          <i class="fa-solid fa-graduation-cap"></i>
                          <p>
                              {{ __('Import Course') }}
                          </p>
                      </a>
                  </li>
                  @endcan
                  @if (auth()->user()->can('show roles') || auth()->user()->can('show permission') || auth()->user()->can('show users'))
                      <li class="nav-header">{{ __('Roles & Users') }}</li>
                  @endif
                  @can('show roles')
                  <li class="nav-item">
                      <a href="{{ route('roles.role.index') }}" class="nav-link">
                          <i class="fa-solid fa-book"></i>
                          <p>
                              {{ __('Role') }}
                          </p>
                      </a>
                  </li>
                  @endcan
                  @can('show permission')
                  <li class="nav-item">
                      <a href="{{ route('permission.index') }}" class="nav-link">
                          <i class="fa-solid fa-book"></i>
                          <p>
                              {{ __('Permissions') }}
                          </p>
                      </a>
                  </li>
                  @endcan
                  @can('show users')
                  <li class="nav-item">
                      <a href="{{ route('admin.users.index') }}" class="nav-link">
                          <i class="fa-solid fa-users"></i>
                          <p>
                              {{ __('Users') }}
                          </p>
                      </a>
                  </li>
                  @endcan
                  @if (auth()->user()->can('show universities') || auth()->user()->can('show cities'))
                  <li class="nav-header">{{ __('Admin') }}</li>
                  @endif
                  @can('show universities')
                  <li class="nav-item">
                      <a href="{{ route('admin.universities.index') }}" class="nav-link">
                          <i class="fa-solid fa-school"></i>
                          <p>
                              {{ __('Universities') }}
                          </p>
                      </a>
                  </li>
                  @endcan
                  @can('show cities')
                  <li class="nav-item">
                      <a href="{{ route('admin.cities.index') }}" class="nav-link">
                          <i class="fa-solid fa-building"></i>
                          <p>
                              {{ __('Cities') }}
                          </p>
                      </a>
                  </li>
                  @endcan

              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->

      <div class="sidebar-custom">
        <p class="text-light brand-text">{{auth()->user()->type}}</p>
    </div>
      <!-- /.sidebar-custom -->
  </aside>


          <!-- Dark Logo-->
          <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
              <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="22" />
            </span>
            <span class="logo-lg">
              <img src="{{asset('assets/images/logo-dark.png')}}" alt="" height="17" />
            </span>
          </a>
          <!-- Light Logo-->
          <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
              <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="22" />
            </span>
            <span class="logo-lg">
              <img src="{{asset('assets/images/logo-light.png')}}" alt="" height="17" />
            </span>
          </a>
          <button
            type="button"
            class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover"
          >
            <i class="ri-record-circle-line"></i>
          </button>
        </div>

        <div id="scrollbar">
          <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
              

              <li class="menu-title">
                <i class="ri-more-fill"></i>
                <span data-key="t-components">Components</span>
              </li>

              <li class="nav-item">
                <a
                  class="nav-link menu-link"
                  href="#sidebarUI"
                  data-bs-toggle="collapse"
                  role="button"
                  aria-expanded="false"
                  aria-controls="sidebarUI"
                >
                  <i data-feather="package" class="icon-dual"></i>
                  <span data-key="t-base-ui">Products</span>
                </a>
                <div
                  class="collapse menu-dropdown mega-dropdown-menu"
                  id="sidebarUI"
                >
                  <div class="row">
                    <div class="col-lg-4">
                      <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                          <a
                            href="{{route('products.index')}}"
                            class="nav-link"
                            data-key="t-alerts"
                            >Product List</a
                          >
                        </li>
                        <!-- <li class="nav-item">
                          <a
                            href="ui-badges.html"
                            class="nav-link"
                            data-key="t-badges"
                            >Badges</a
                          >
                        </li> -->
                        
                      </ul>
                    </div>
                   
                  </div>
                </div>
              </li>

 
              
            </ul>
          </div>
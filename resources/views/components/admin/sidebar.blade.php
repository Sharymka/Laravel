<div style="height: 100vh" class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
         aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                    aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2  @if(request()->routeIs('admin.index')) active @endif"
                       aria-current="page" href="{{route('admin.index')}}">
                        <svg class="bi">
                            <use xlink:href="#house-fill"/>
                        </svg>
                        control panel
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.news.index')}}"
                       class="nav-link d-flex align-items-center gap-2 active:shadow-inner">
                        <svg class="bi">
                            <use xlink:href="#file-earmark"/>
                        </svg>
                        News
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.categories.index')}}" class="nav-link d-flex align-items-center gap-2"
                       href="#">
                        <svg class="bi">
                            <use xlink:href="#cart"/>
                        </svg>
                        Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.users.index')}}" class="nav-link d-flex align-items-center gap-2">
                        <svg class="bi">
                            <use xlink:href="#people"/>
                        </svg>
                        Users
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.parser')}}" class="nav-link d-flex align-items-center gap-2">
                        <svg class="bi">
                            <use xlink:href="#people"/>
                        </svg>
                        Parser
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.resources.index')}}" class="nav-link d-flex align-items-center gap-2">
                        <svg class="bi">
                            <use xlink:href="#people"/>
                        </svg>
                        Resources
                    </a>
                </li>
            </ul>

        </div>
    </div>
</div>

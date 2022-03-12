<div>
    <ul class="navbar-nav justify-content-end">
        @if (Route::has('logout'))
            <li class="nav-item d-flex align-items-center">
                <form method="POST" action="{{ route('logout') }}" class="img label-before">
                    @csrf
                    <a href="{{ route('logout') }}" class="nav-link text-body font-weight-bold px-0"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        <div>
                            <i
                                class="fa fa-user me-sm-1 {{ in_array(
                                    request()->route()->getName(),
                                    ['profile', 'my-profile'],
                                )
                                    ? 'text-white'
                                    : '' }}"></i>
                            <span
                                class="d-sm-inline d-none {{ in_array(
                                    request()->route()->getName(),
                                    ['profile', 'my-profile'],
                                )
                                    ? 'text-white'
                                    : '' }}">Sign
                                Out</span>
                        </div>
                    </a>
                </form>
            </li>
        @endif

        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                </div>
            </a>
        </li>
        <li class="nav-item px-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
            </a>
        </li>
        <li class="nav-item dropdown pe-2 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
            </a>
            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
            @forelse(Auth::user()->notifications as $notification)
                aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                    <a class="dropdown-item border-radius-md" href="javascript:;">
                        <div class="d-flex py-1">
                            <div class="my-auto">
                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="text-sm font-weight-normal mb-1">
                                    <span class="font-weight-bold">New User</span>
                                    {{$notification->message}}
                                </h6>
                                <p class="text-xs text-secondary mb-0">
                                    <i class="fa fa-clock me-1"></i>
                                    {{$notification->created_at->diffForHumans()}}
                                </p>
                            </div>
                        </div>
                    </a>
                </li>
                @empty
                    <li class="mb-2">
                        <h6>Nothing New</h6>
                    </li>
                @endforelse
            </ul>
        </li>
    </ul>
</div>

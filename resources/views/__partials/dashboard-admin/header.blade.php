<header
    class="main-topbar"
    id="main-topbar"
>
    <div class="navbar-brand">
        <div class="logos">
            <a
                href="{{ route('dashboard') }}"
                aria-label="Topbar Logo"
            >
                <x-img
                    src="dashboard/assets/images/main-logo.png"
                    loading="lazy"
                    height="24"
                    alt=""
                    class="logo-dark"
                />
                <x-img
                    src="dashboard/assets/images/logo-white.png"
                    loading="lazy"
                    height="24"
                    alt=""
                    class="logo-light"
                />
            </a>
        </div>
        <button
            type="button"
            id="toggleSidebar"
            class="sidebar-toggle btn p-0"
            aria-label="sidebar-toggle"
        ><i
                data-lucide="panel-right-open"
                class="size-4"
            ></i></button>
    </div>

    <div class="d-flex align-items-center ms-auto gap-2">

        <button
            type="button"
            id="darkModeButton"
            class="topbar-link topbar-mode btn"
            aria-label="topbar-link"
        >
            <i
                data-lucide="moon"
                class="dark size-4"
            ></i>
            <i
                data-lucide="sun"
                class="light size-4"
            ></i>
        </button>

        <div class="dropdown profile-dropdown">
            <button
                class="btn topbar-link"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
            >
                <x-img
                    src="{{ auth()->user()->avatar ?? 'dashboard/assets/images/user-45.png' }}"
                    loading="lazy"
                    alt="en"
                    class="object-fit-cover size-8 rounded"
                />
            </button>
            <div class="dropdown-menu profile-dropdown-menu p-4">
                <div class="d-flex align-items-center gap-2">
                    <x-img
                        src="{{ auth()->user()->avatar ?? 'dashboard/assets/images/user-45.png' }}"
                        loading="lazy"
                        alt=""
                        class="rounded-circle size-10 flex-shrink-0"
                    />
                    <div class="flex-grow-1 overflow-hidden">
                        <h6 class="text-truncate mb-0">{{ auth()->user()->name }}</h6>
                        <p class="text-truncate mb-0"><span
                                class="link link-custom-primary fw-medium">{{ auth()->user()->email }}</span></p>
                    </div>
                </div>
                <div class="border-top mt-3 pt-2">
                    <ul class="list-unstyled mb-0">

                        <li>
                            <a
                                class="profile-link"
                                href="/settings/account"
                            ><i
                                    data-lucide="settings"
                                    class="d-inline-block me-2 size-4"
                                ></i> Account Settings</a>
                        </li>
                    </ul>
                </div>
                <div class="border-top mt-2">
                    <a
                        class="profile-link pb-0"
                        href="{{ route('logout') }}"
                    ><i
                            data-lucide="log-out"
                            class="me-2 inline-block size-4"
                        ></i> Log Out</a>
                </div>
            </div>
        </div>

    </div>
</header>

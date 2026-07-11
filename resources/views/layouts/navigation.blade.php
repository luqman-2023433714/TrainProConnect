<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            <div class="flex">

                <div class="shrink-0 flex items-center">

                    <a href="{{ route('dashboard') }}">

                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />

                    </a>

                </div>

                <div class="hidden sm:flex sm:items-center sm:space-x-6 sm:ms-8">

                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        Dashboard
                    </x-nav-link>

                    <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')">
                        Users
                    </x-nav-link>

                    <x-nav-link :href="route('courses.index')" :active="request()->routeIs('courses.*')">
                        Courses
                    </x-nav-link>

                    <x-nav-link :href="route('trainers.index')" :active="request()->routeIs('trainers.*')">
                        Trainers
                    </x-nav-link>

                    <x-nav-link :href="route('participants.index')" :active="request()->routeIs('participants.*')">
                        Participants
                    </x-nav-link>

                    <x-nav-link :href="route('classes.index')" :active="request()->routeIs('classes.*')">
                        Classes
                    </x-nav-link>

                    <x-nav-link :href="route('enrollments.index')" :active="request()->routeIs('enrollments.*')">
                        Enrollments
                    </x-nav-link>

                    <x-nav-link :href="route('attendances.index')" :active="request()->routeIs('attendances.*')">
                        Attendance
                    </x-nav-link>

                    <x-nav-link :href="route('certificates.index')" :active="request()->routeIs('certificates.*')">
                        Certificates
                    </x-nav-link>

                    <x-nav-link :href="route('payments.index')" :active="request()->routeIs('payments.*')">
                        Payments
                    </x-nav-link>

                    <x-nav-link :href="route('notifications.index')" :active="request()->routeIs('notifications.*')">
                        Notifications
                    </x-nav-link>

                </div>

            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">

                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">

                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-500 bg-white hover:text-gray-700">

                            <div>

                                {{ Auth::user()->name }}

                            </div>

                        </button>

                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link :href="route('profile.edit')">

                            Profile

                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">

                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">

                                Logout

                            </x-dropdown-link>

                        </form>

                    </x-slot>

                </x-dropdown>

            </div>

        </div>

    </div>

</nav>
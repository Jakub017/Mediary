<!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
<div class="relative z-50 lg:hidden" role="dialog" aria-modal="true">
    <div
        class="mobile-backdrop fixed inset-0 opacity-0 duration-300 ease-linear transition-opacity h-0 bg-gray-900/80"
    ></div>

    <div
        class="mobile-menu duration-300 -translate-x-full ease-in-out fixed inset-0 flex"
    >
        <div class="relative mr-16 flex w-full max-w-xs flex-1">
            <div class="absolute left-full top-0 flex w-16 justify-center pt-5">
                <button type="button" class="close-sidebar -m-2.5 p-2.5">
                    <span class="sr-only">Close sidebar</span>
                    <svg
                        class="h-6 w-6 text-white"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>
            </div>
            <div
                class="flex grow flex-col gap-y-5 overflow-y-auto bg-white px-6 pb-4"
            >
                <div class="flex h-16 shrink-0 items-center">
                    <img class="h-8 w-auto" src="#" alt="Admin logo" />
                </div>
                <nav class="flex flex-1 flex-col">
                    <ul role="list" class="flex flex-1 flex-col gap-y-7">
                        <li>
                            <div
                                class="text-xs font-semibold leading-6 text-gray-400"
                            >
                                Pulpit
                            </div>
                            <ul role="list" class="-mx-2 space-y-1">
                                <li>
                                    <!-- Current: "bg-gray-50 text-blue-600", Default: "text-gray-700 hover:text-blue-600 hover:bg-gray-50" -->
                                    <a
                                        href="{{ route('index') }}"
                                        class="{{ request()->routeIs('index') ? 'bg-gray-50 text-blue-600' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold"
                                    >
                                        <svg
                                            class="h-6 w-6 shrink-0 {{ request()->routeIs('index') ? 'text-blue-600' : 'text-gray-400 group-hover:text-blue-600' }}"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            aria-hidden="true"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"
                                            />
                                        </svg>
                                        Pulpit
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="{{ route('profile.index') }}"
                                        class="{{ request()->routeIs('profile.*') ? 'bg-gray-50 text-blue-600' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold"
                                    >
                                        <svg
                                            class="h-6 w-6 shrink-0 {{ request()->routeIs('profile.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-blue-600' }}"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            aria-hidden="true"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"
                                            />
                                        </svg>
                                        Profil pacjenta
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
    <div
        class="flex grow flex-col gap-y-5 overflow-y-auto border-r border-gray-200 bg-white px-6 pb-4"
    >
        <div class="flex h-16 shrink-0 items-center">
            <img class="-mx-2 mt-2 h-10 w-auto" src="#" alt="Admin logo" />
        </div>
        <nav class="flex flex-1 flex-col">
            <ul role="list" class="flex flex-1 flex-col gap-y-7">
                <li>
                    <ul role="list" class="-mx-2 space-y-1">
                        <div
                            class="text-xs font-semibold leading-6 text-gray-400"
                        >
                            Start
                        </div>
                        <li>
                            <a
                                href="{{ route('index') }}"
                                class="{{ request()->routeIs('index') ? 'bg-gray-50 text-blue-600' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50' }} group flex gap-x-3 rounded-md p-3 text-sm leading-6 font-semibold"
                            >
                                <div
                                    class="w-5 flex justify-center items-center"
                                >
                                    <i
                                        class="fa-solid fa-house text-base shrink-0 {{ request()->routeIs('index') ? 'text-blue-600' : 'text-gray-400 group-hover:text-blue-600' }}"
                                    ></i>
                                </div>

                                Pulpit
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('profile.index') }}"
                                class="{{ request()->routeIs('profile.*') ? 'bg-gray-50 text-blue-600' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50' }} group flex gap-x-3 rounded-md p-3 text-sm leading-6 font-semibold"
                            >
                                <div
                                    class="w-5 flex justify-center items-center"
                                >
                                    <i
                                        class="fa-solid fa-user text-base shrink-0 {{ request()->routeIs('profile.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-blue-600' }}"
                                    ></i>
                                </div>

                                Profil pacjenta
                            </a>
                        </li>
                        <div
                            class="text-xs font-semibold leading-6 text-gray-400"
                        >
                            Badania
                        </div>
                        <li>
                            <a
                                href="{{ route('blood.index') }}"
                                class="{{ request()->routeIs('blood.*') ? 'bg-gray-50 text-blue-600' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50' }} group flex gap-x-3 rounded-md p-3 text-sm leading-6 font-semibold"
                            >
                                <div
                                    class="w-5 flex justify-center items-center"
                                >
                                    <i
                                        class="fa-solid fa-droplet text-base shrink-0 {{ request()->routeIs('blood.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-blue-600' }}"
                                    ></i>
                                </div>

                                Badania krwi
                            </a>
                        </li>
                        <li>
                            <a
                                href="#"
                                class="{{ request()->routeIs('urine.*') ? 'bg-gray-50 text-blue-600' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50' }} group flex gap-x-3 rounded-md p-3 text-sm leading-6 font-semibold"
                            >
                                <div
                                    class="w-5 flex justify-center items-center"
                                >
                                    <i
                                        class="fa-solid fa-flask-vial text-base shrink-0 {{ request()->routeIs('urine.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-blue-600' }}"
                                    ></i>
                                </div>
                                Badania moczu
                            </a>
                        </li>
                        <li>
                            <a
                                href="#"
                                class="{{ request()->routeIs('functional.*') ? 'bg-gray-50 text-blue-600' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50' }} group flex gap-x-3 rounded-md p-3 text-sm leading-6 font-semibold"
                            >
                                <i
                                    class="fa-solid fa-heart text-base shrink-0 {{ request()->routeIs('functional.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-blue-600' }}"
                                ></i>
                                Testy funkcjonalne
                            </a>
                        </li>

                        <div
                            class="text-xs font-semibold leading-6 text-gray-400"
                        >
                            Narzędzia
                        </div>
                        <li>
                            <a
                                href="{{ route('diet.index') }}"
                                class="{{ request()->routeIs('diet.*') ? 'bg-gray-50 text-blue-600' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50' }} group flex gap-x-3 rounded-md p-3 text-sm leading-6 font-semibold"
                            >
                                <div
                                    class="w-5 flex justify-center items-center"
                                >
                                    <i
                                        class="fa-solid fa-utensils text-base shrink-0 {{ request()->routeIs('diet.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-blue-600' }}"
                                    ></i>
                                </div>

                                Diety
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('workout.index') }}"
                                class="{{ request()->routeIs('workout.*') ? 'bg-gray-50 text-blue-600' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50' }} group flex gap-x-3 rounded-md p-3 text-sm leading-6 font-semibold"
                            >
                                <div
                                    class="w-5 flex justify-center items-center"
                                >
                                    <i
                                        class="fa-solid fa-dumbbell text-base shrink-0 {{ request()->routeIs('workout.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-blue-600' }}"
                                    ></i>
                                </div>

                                Plany treningowe
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>

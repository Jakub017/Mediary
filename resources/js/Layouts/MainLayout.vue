<script setup>
import { Link } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";

const page = usePage();

const user = page.props.user;
</script>

<template>
    <div class="w-full">
        <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
        <div class="relative z-50 lg:hidden" role="dialog" aria-modal="true">
            <div
                class="mobile-backdrop fixed inset-0 opacity-0 duration-300 ease-linear transition-opacity h-0 bg-gray-900/80"
            ></div>

            <div
                class="mobile-menu duration-300 -translate-x-full ease-in-out fixed inset-0 flex"
            >
                <div class="relative mr-16 flex w-full max-w-xs flex-1">
                    <div
                        class="absolute left-full top-0 flex w-16 justify-center pt-5"
                    >
                        <button
                            type="button"
                            class="close-sidebar -m-2.5 p-2.5"
                        >
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
                            <img class="h-8 w-auto" src="/img/logo.webp" />
                        </div>
                        <nav class="flex flex-1 flex-col">
                            <ul
                                role="list"
                                class="flex flex-1 flex-col gap-y-7"
                            >
                                <li>
                                    <div
                                        class="text-xs font-semibold leading-6 text-gray-400"
                                    >
                                        Pulpit
                                    </div>
                                    <ul role="list" class="-mx-2 space-y-1">
                                        <li>
                                            <Link
                                                :href="route('dashboard')"
                                                class="{{ request()->routeIs('dashboard') ? 'bg-gray-50 text-blue-600' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50' }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold shadow-2xl"
                                            >
                                                <svg
                                                    class="h-6 w-6 shrink-0 {{ request()->routeIs('dashboard') ? 'text-blue-600' : 'text-gray-400 group-hover:text-blue-600' }}"
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
                                            </Link>
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
                                                Twoje dane
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

        <div
            class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-24 lg:flex-col justify-center items-center border-r border-gray-200"
        >
            <div
                class="flex grow flex-col gap-y-5 overflow-y-auto bg-white px-6 pb-4"
            >
                <div class="flex h-16 shrink-0 items-center">
                    <img class="-mx-2 mt-2 h-10 w-auto" src="#" />
                </div>
                <nav class="flex flex-1 flex-col">
                    <ul role="list" class="flex flex-1 flex-col gap-y-7">
                        <li>
                            <ul role="list" class="-mx-2 space-y-1">
                                <li>
                                    <Link
                                        :href="route('dashboard')"
                                        :class="{
                                            'bg-blue-600 text-blue-600 shadow-2xl':
                                                route().current('dashboard'),
                                            'text-gray-600 hover:text-blue-600 hover:bg-gray-50':
                                                !route().current('dashboard'),
                                        }"
                                        class="flex justify-center items-center gap-x-3 rounded-full p-3 text-sm font-semibold transition-colors duration-300 size-12"
                                    >
                                        <i
                                            :class="{
                                                'text-white':
                                                    route().current(
                                                        'dashboard'
                                                    ),
                                            }"
                                            class="fa-solid fa-house text-lg"
                                        ></i>
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        :href="route('profile.index')"
                                        :class="{
                                            'bg-blue-600 text-blue-600 shadow-2xl':
                                                route().current('profile.*'),
                                            'text-gray-600 hover:text-blue-600 hover:bg-gray-50':
                                                !route().current('profile.*'),
                                        }"
                                        class="flex justify-center items-center gap-x-3 rounded-full p-3 text-sm font-semibold transition-colors duration-300 size-12"
                                    >
                                        <i
                                            :class="{
                                                'text-white':
                                                    route().current(
                                                        'profile.*'
                                                    ),
                                            }"
                                            class="fa-solid fa-user text-lg"
                                        ></i>
                                    </Link>
                                </li>

                                <li>
                                    <Link
                                        :href="route('blood.index')"
                                        :class="{
                                            'bg-blue-600 text-blue-600 shadow-2xl':
                                                route().current('blood.*'),
                                            'text-gray-600 hover:text-blue-600 hover:bg-gray-50':
                                                !route().current('blood.*'),
                                        }"
                                        class="flex justify-center items-center gap-x-3 rounded-full p-3 text-sm font-semibold transition-colors duration-300 size-12"
                                    >
                                        <i
                                            :class="{
                                                'text-white':
                                                    route().current('blood.*'),
                                            }"
                                            class="fa-solid fa-flask-vial text-lg"
                                        ></i>
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        :href="route('diet.index')"
                                        :class="{
                                            'bg-blue-600 text-blue-600 shadow-2xl':
                                                route().current('diet.*'),
                                            'text-gray-600 hover:text-blue-600 hover:bg-gray-50':
                                                !route().current('diet.*'),
                                        }"
                                        class="flex justify-center items-center gap-x-3 rounded-full p-3 text-sm font-semibold transition-colors duration-300 size-12"
                                    >
                                        <i
                                            :class="{
                                                'text-white':
                                                    route().current('diet.*'),
                                            }"
                                            class="fa-solid fa-utensils text-lg"
                                        ></i>
                                    </Link>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <ul
                        role="list"
                        class="flex flex-1 flex-col gap-y-7 mt-auto mb-0 justify-end items-end"
                    >
                        <li>
                            <ul role="list" class="-mx-2 space-y-1">
                                <!-- <li>
                                    <Link
                                        href="#"
                                        class="text-gray-600 hover:text-blue-600 hover:bg-gray-50 flex justify-center items-center gap-x-3 rounded-full p-3 text-sm font-semibold transition-colors duration-300 size-12"
                                    >
                                        <i
                                            class="fa-solid fa-circle-exclamation text-xl"
                                        ></i>
                                    </Link>
                                </li> -->
                                <li>
                                    <Link
                                        method=""
                                        class="text-gray-600 hover:text-blue-600 hover:bg-gray-50 flex justify-center items-center gap-x-3 rounded-full p-3 text-sm font-semibold transition-colors duration-300 size-12"
                                    >
                                        <i
                                            class="fa-solid fa-arrow-right-from-bracket text-xl"
                                        ></i>
                                    </Link>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="h-min-screen lg:pl-24">
            <main class="min-h-screen w-full bg-[#F9FAFC]">
                <div
                    class="sticky top-0 flex h-16 shrink-0 items-center gap-x-4 border-b border-gray-200 bg-white px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-8"
                >
                    <button
                        type="button"
                        class="mobile-menu-open -m-2.5 p-2.5 text-gray-700 lg:hidden"
                    >
                        <span class="sr-only">Open sidebar</span>
                        <svg
                            class="h-6 w-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            aria-hidden="true"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                            />
                        </svg>
                    </button>

                    <!-- Separator -->
                    <div
                        class="h-6 w-px bg-gray-200 lg:hidden"
                        aria-hidden="true"
                    ></div>

                    <div class="flex flex-1 gap-x-4 self-stretch lg:gap-x-6">
                        <form
                            class="relative flex flex-1"
                            action="#"
                            method="GET"
                        >
                            <label for="search-field" class="sr-only"
                                >Search</label
                            >
                            <svg
                                class="pointer-events-none absolute inset-y-0 left-0 h-full w-5 text-gray-400"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                            <input
                                id="search-field"
                                class="block h-full w-full border-0 py-0 pl-8 pr-0 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm"
                                placeholder="Search..."
                                type="search"
                                name="search"
                            />
                        </form>
                        <div class="flex items-center gap-x-4 lg:gap-x-6">
                            <button
                                type="button"
                                class="-m-2.5 p-2.5 text-gray-400 hover:text-gray-500"
                            >
                                <span class="sr-only">View notifications</span>
                                <svg
                                    class="h-6 w-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"
                                    />
                                </svg>
                            </button>

                            <!-- Separator -->
                            <div
                                class="hidden lg:block lg:h-6 lg:w-px lg:bg-gray-200"
                                aria-hidden="true"
                            ></div>

                            <!-- Profile dropdown -->
                            <div class="relative">
                                <button
                                    type="button"
                                    class="user-menu-button -m-1.5 flex items-center p-1.5 duartion-200 hover:bg-gray-50 rounded-md"
                                    id="user-menu-button"
                                    aria-expanded="false"
                                    aria-haspopup="true"
                                >
                                    <span class="sr-only">Open user menu</span>
                                    <span
                                        class="mr-2 text-gray-600"
                                        v-if="user.name"
                                        >{{ user.name }}</span
                                    >
                                    <img
                                        class="h-8 w-8 rounded-full bg-gray-50"
                                        alt=""
                                    />
                                    <span
                                        class="hidden lg:flex lg:items-center"
                                    >
                                        <svg
                                            class="ml-2 h-5 w-5 text-gray-400"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                            aria-hidden="true"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                    </span>
                                </button>

                                <!--
              Dropdown menu, show/hide based on menu state.

              Entering: "transition ease-out duration-100"
                From: "transform opacity-0 scale-95"
                To: "transform opacity-100 scale-100"
              Leaving: "transition ease-in duration-75"
                From: "transform opacity-100 scale-100"
                To: "transform opacity-0 scale-95"
            -->
                                <div
                                    class="user-menu absolute duaration-100 opacity-0 invisible scale-95 right-0 z-10 mt-2.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none"
                                    role="menu"
                                    aria-orientation="vertical"
                                    aria-labelledby="user-menu-button"
                                    tabindex="-1"
                                >
                                    <!-- Active: "bg-gray-50", Not Active: "" -->
                                    <Link
                                        href="{{ route('profile.show') }}"
                                        class="block px-3 py-1 text-sm leading-6 text-gray-900 hover:bg-gray-50 {{ request()->routeIs('profile.show') ? 'bg-gray-50' : '' }}"
                                        role="menuitem"
                                        tabindex="-1"
                                        id="user-menu-item-0"
                                        >Mój profil</Link
                                    >
                                    <Link
                                        href="#"
                                        class="block px-3 py-1 text-sm leading-6 text-gray-900 hover:bg-gray-50"
                                        role="menuitem"
                                        tabindex="-1"
                                        id="user-menu-item-1"
                                        >Wyloguj się</Link
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <slot></slot>
                    <div class="h-4 w-full bg-red"></div>
                </div>
            </main>
        </div>
    </div>
</template>

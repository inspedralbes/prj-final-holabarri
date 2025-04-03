<template>
    <header>
        <nav class="fixed z-30 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-start">
                        <button @click="toggleSidebar" id="toggleSidebarMobile" aria-expanded="true"
                            aria-controls="sidebar" class="p-2 text-gray-600 rounded cursor-pointer lg:hidden hover:text-gray-900 hover:bg-gray-100 
               focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 
               dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">

                            <svg v-show="!sidebarOpen" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd">
                                </path>
                            </svg>

                            <svg v-show="sidebarOpen" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd">
                                </path>
                            </svg>
                        </button>
                        <h2
                            class="text-xl font-bold leading-none text-gray-900 sm:text-2xl dark:text-white ml-2 md:mr-14">
                            Panel de comerç</h2>
                    </div>
                    <div class="flex items-center">
                        <!-- <button type="button" data-dropdown-toggle="notification-dropdown"
                            @click="toggleDropdown('notifications')"
                            class="toggle-button-notifications p-2 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700">
                            <span class="sr-only">View notifications</span>

                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
                                </path>
                            </svg>
                        </button> -->
                        <!-- <div v-if="isOpen['notifications']"
                            class="dropdown-notifications z-20 z-50 max-w-sm my-4 overflow-hidden text-base list-none bg-white divide-y divide-gray-100 rounded shadow-lg dark:divide-gray-600 dark:bg-gray-700 block"
                            id="notification-dropdown"
                            style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(1521px, 65px);"
                            data-popper-placement="bottom">
                            <div
                                class="block px-4 py-2 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Notifications
                            </div>
                            <div>
                                <a href="#"
                                    class="flex px-4 py-3 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
                                    <div class="flex-shrink-0">
                                        <img class="rounded-full w-11 h-11"
                                            src="#"
                                            alt="Jese image">
                                        <div
                                            class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 border border-white rounded-full bg-primary-700 dark:border-gray-700">
                                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                                                </path>
                                                <path
                                                    d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="w-full pl-3">
                                        <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400">New
                                            message from <span
                                                class="font-semibold text-gray-900 dark:text-white">Bonnie Green</span>:
                                            "Hey, what's up? All set for the presentation?"</div>
                                        <div class="text-xs font-medium text-primary-700 dark:text-primary-400">a few
                                            moments ago</div>
                                    </div>
                                </a>
                            </div>
                            <a href="#"
                                class="block py-2 text-base font-normal text-center text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:text-white dark:hover:underline">
                                <div class="inline-flex items-center ">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                        <path fill-rule="evenodd"
                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    View all
                                </div>
                            </a>
                        </div> -->

                        <div class="flex items-center ml-2">
                            <div id="profile">
                                <button type="button"
                                    class="toggle-button-settings flex text-sm bg-gray-100 p-2 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                    id="user-menu-button-2" aria-expanded="false" data-dropdown-toggle="dropdown-2"
                                    @click="toggleDropdown('settings')">
                                    <span class="sr-only">Open user menu</span>
                                    <svg height="1.5em" width="1.5em" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M22 22H2" stroke="#1C274C" stroke-width="1.5"
                                                stroke-linecap="round"></path>
                                            <path d="M20 22V11" stroke="#1C274C" stroke-width="1.5"
                                                stroke-linecap="round"></path>
                                            <path d="M4 22V11" stroke="#1C274C" stroke-width="1.5"
                                                stroke-linecap="round"></path>
                                            <path
                                                d="M16.5278 2H7.47214C6.26932 2 5.66791 2 5.18461 2.2987C4.7013 2.5974 4.43234 3.13531 3.89443 4.21114L2.49081 7.75929C2.16652 8.57905 1.88279 9.54525 2.42867 10.2375C2.79489 10.7019 3.36257 11 3.99991 11C5.10448 11 5.99991 10.1046 5.99991 9C5.99991 10.1046 6.89534 11 7.99991 11C9.10448 11 9.99991 10.1046 9.99991 9C9.99991 10.1046 10.8953 11 11.9999 11C13.1045 11 13.9999 10.1046 13.9999 9C13.9999 10.1046 14.8953 11 15.9999 11C17.1045 11 17.9999 10.1046 17.9999 9C17.9999 10.1046 18.8953 11 19.9999 11C20.6373 11 21.205 10.7019 21.5712 10.2375C22.1171 9.54525 21.8334 8.57905 21.5091 7.75929L20.1055 4.21114C19.5676 3.13531 19.2986 2.5974 18.8153 2.2987C18.332 2 17.7306 2 16.5278 2Z"
                                                stroke="#1C274C" stroke-width="1.5" stroke-linejoin="round"></path>
                                            <path
                                                d="M9.5 21.5V18.5C9.5 17.5654 9.5 17.0981 9.70096 16.75C9.83261 16.522 10.022 16.3326 10.25 16.201C10.5981 16 11.0654 16 12 16C12.9346 16 13.4019 16 13.75 16.201C13.978 16.3326 14.1674 16.522 14.299 16.75C14.5 17.0981 14.5 17.5654 14.5 18.5V21.5"
                                                stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                                        </g>
                                    </svg>
                                </button>
                            </div>

                            <div v-if="isOpen['settings']"
                                class="dropdown-settings z-50 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600 block"
                                id="dropdown-2" style="position: absolute; margin: 0px; right: 10px; top: 60px"
                                data-popper-placement="bottom">
                                <div class="px-4 py-3" role="none">
                                    <p class="text-sm text-gray-900 dark:text-white" role="none">
                                        {{ comercio.nombre }}
                                    </p>
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300"
                                        role="none">
                                        {{ comercio.email }}
                                    </p>
                                </div>
                                <ul class="py-1" role="none">
                                    <li>
                                        <NuxtLink to="/"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                            role="menuitem">
                                            Tornar als comerços
                                        </NuxtLink>
                                    </li>
                                    <li>
                                        <NuxtLink @click="goToLogout()"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white cursor-pointer"
                                            role="menuitem">
                                            Tancar sessió
                                        </NuxtLink>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <aside id="sidebar" :class="sidebarOpen ? 'flex' : 'hidden lg:flex'"
        class="fixed top-0 left-0 z-20 flex-col flex-shrink-0 w-64 h-full pt-16 font-normal duration-75 transition-width bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar">
        <div
            class="relative flex flex-col flex-1 min-h-0 pt-0 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
                <div
                    class="flex-1 px-3 space-y-1 bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    <ul class="pb-2 space-y-2">
                        <li>
                            <NuxtLink to="/admin"
                                class="flex items-center p-2 text-base rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700 text-[#276BF2]"
                                :class="{ 'text-gray-900': route.path !== '/admin' && route.path !== '/admin/' }">
                                <svg class="w-6 h-6 text-[#276BF2]"
                                    :class="{ 'text-gray-500': route.path !== '/admin' && route.path !== '/admin/' }"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                                </svg>
                                <span class="ml-3 text-current" sidebar-toggle-item="">
                                    Estadístiques
                                </span>
                            </NuxtLink>
                        </li>

                        <!--  ======= PRODUCTES =================================  -->
                        <li>
                            <button type="button"
                                class="flex items-center w-full p-2 text-base text-[#276BF2] rounded-lg group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
                                :class="{ 'text-gray-900': !route.path.includes('/admin/productes') }"
                                aria-controls="dropdown-layouts" data-collapse-toggle="dropdown-layouts"
                                @click="toggleHidden('productes')">
                                <svg class="flex-shrink-0 w-6 h-6 text-[#276BF2]"
                                    :class="{ 'text-gray-500': route.path !== '/admin/productes' && route.path !== '/admin/productes/' }"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                    aria-hidden="true">
                                    <path
                                        d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z">
                                    </path>
                                </svg>
                                <span class="flex-1 ml-3 text-left whitespace-nowrap"
                                    sidebar-toggle-item="">Productes</span>
                                <svg sidebar-toggle-item="" :class="{ rotate: !isHidden['productes'] }" class="w-6 h-6"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <ul id="dropdown-layouts" :class="{ hidden: isHidden['productes'] }" class="py-2 space-y-2">
                                <li>
                                    <NuxtLink to="/admin/productes"
                                        class="flex items-center p-2 text-base text-[#276BF2] rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
                                        :class="{ 'text-gray-900': route.path !== '/admin/productes' && route.path !== '/admin/productes/' }">
                                        Llistat
                                    </NuxtLink>
                                </li>
                                <li>
                                    <NuxtLink to="" disabled
                                        class="flex justify-between items-center p-2 text-base text-gray-500 bg-gray-50 rounded-lg pl-11 group cursor-not-allowed dark:text-gray-200 dark:hover:bg-gray-700">
                                        <p>Inventaris</p>
                                        <svg fill="#c1c1c1" width="1em" height="1em" version="1.1" id="Layer_1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 491.52 491.52"
                                            xml:space="preserve">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <g>
                                                    <g>
                                                        <path
                                                            d="M399.4,203.578h-19.801h-0.005v-69.744C379.593,60.039,319.556,0,245.759,0c-73.793,0-133.832,60.039-133.832,133.835 v69.744H92.122c-15.656,0-28.35,12.692-28.35,28.349v17.246v196.751v17.245c0,15.658,12.693,28.35,28.35,28.35H245.76H399.4 c15.656,0,28.348-12.692,28.348-28.35v-17.245V249.174v-17.246C427.748,216.27,415.056,203.578,399.4,203.578z M275.935,406.648 h-60.349l10.801-51.467c-10.101-6.428-16.848-17.652-16.848-30.512c0-20.003,16.218-36.219,36.221-36.219 c20.004,0,36.219,16.216,36.219,36.219c0,12.86-6.745,24.084-16.845,30.51L275.935,406.648z M331.84,203.578h-86.08h-86.075 h-0.005v-69.744c0-47.469,38.613-86.081,86.08-86.081c47.469,0,86.08,38.613,86.08,86.081V203.578z">
                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </NuxtLink>
                                </li>
                            </ul>
                        </li>
                        <!--  ======= CATEGORIES ================================  -->
                        <li>
                            <button type="button"
                                class="flex items-center w-full p-2 text-base text-gray-900 rounded-lg group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
                                aria-controls="dropdown-categories" data-collapse-toggle="dropdown-categories"
                                @click="toggleHidden('categories')">
                                <svg class="flex-shrink-0 w-6 h-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path
                                        d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z">
                                    </path>
                                </svg>
                                <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item="">Categories
                                </span>
                                <svg sidebar-toggle-item="" :class="{ rotate: !isHidden['categories'] }" class="w-6 h-6"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <ul id="dropdown-categories" :class="{ hidden: isHidden['categories'] }"
                                class="py-2 space-y-2">
                                <li>
                                    <NuxtLink to="" disabled
                                        class="flex justify-between items-center p-2 text-base text-gray-500 bg-gray-50 rounded-lg pl-11 group cursor-not-allowed dark:text-gray-200 dark:hover:bg-gray-700">
                                        Afegir categoria
                                        <svg fill="#c1c1c1" width="1em" height="1em" version="1.1" id="Layer_1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 491.52 491.52"
                                            xml:space="preserve">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <g>
                                                    <g>
                                                        <path
                                                            d="M399.4,203.578h-19.801h-0.005v-69.744C379.593,60.039,319.556,0,245.759,0c-73.793,0-133.832,60.039-133.832,133.835 v69.744H92.122c-15.656,0-28.35,12.692-28.35,28.349v17.246v196.751v17.245c0,15.658,12.693,28.35,28.35,28.35H245.76H399.4 c15.656,0,28.348-12.692,28.348-28.35v-17.245V249.174v-17.246C427.748,216.27,415.056,203.578,399.4,203.578z M275.935,406.648 h-60.349l10.801-51.467c-10.101-6.428-16.848-17.652-16.848-30.512c0-20.003,16.218-36.219,36.221-36.219 c20.004,0,36.219,16.216,36.219,36.219c0,12.86-6.745,24.084-16.845,30.51L275.935,406.648z M331.84,203.578h-86.08h-86.075 h-0.005v-69.744c0-47.469,38.613-86.081,86.08-86.081c47.469,0,86.08,38.613,86.08,86.081V203.578z">
                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </NuxtLink>
                                </li>
                            </ul>
                        </li>

                        <!--  ======= VENTAS ================================  -->
                        <li>
                            <button type="button"
                                class="flex items-center w-full p-2 text-base text-[#276BF2] rounded-lg group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
                                :class="{ 'text-gray-900': !route.path.includes('/admin/comandes') }"
                                aria-controls="dropdown-crud" data-collapse-toggle="dropdown-crud"
                                @click="toggleHidden('ventas')">
                                <svg class="flex-shrink-0 w-6 h-6 text-[#276BF2]"
                                    :class="{ 'text-gray-500': !route.path.includes('/admin/comandes') }"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                    aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M.99 5.24A2.25 2.25 0 013.25 3h13.5A2.25 2.25 0 0119 5.25l.01 9.5A2.25 2.25 0 0116.76 17H3.26A2.267 2.267 0 011 14.74l-.01-9.5zm8.26 9.52v-.625a.75.75 0 00-.75-.75H3.25a.75.75 0 00-.75.75v.615c0 .414.336.75.75.75h5.373a.75.75 0 00.627-.74zm1.5 0a.75.75 0 00.627.74h5.373a.75.75 0 00.75-.75v-.615a.75.75 0 00-.75-.75H11.5a.75.75 0 00-.75.75v.625zm6.75-3.63v-.625a.75.75 0 00-.75-.75H11.5a.75.75 0 00-.75.75v.625c0 .414.336.75.75.75h5.25a.75.75 0 00.75-.75zm-8.25 0v-.625a.75.75 0 00-.75-.75H3.25a.75.75 0 00-.75.75v.625c0 .414.336.75.75.75H8.5a.75.75 0 00.75-.75zM17.5 7.5v-.625a.75.75 0 00-.75-.75H11.5a.75.75 0 00-.75.75V7.5c0 .414.336.75.75.75h5.25a.75.75 0 00.75-.75zm-8.25 0v-.625a.75.75 0 00-.75-.75H3.25a.75.75 0 00-.75.75V7.5c0 .414.336.75.75.75H8.5a.75.75 0 00.75-.75z">
                                    </path>
                                </svg>
                                <span class="flex-1 ml-3 text-left whitespace-nowrap"
                                    sidebar-toggle-item="">Ventas</span>
                                <svg sidebar-toggle-item="" :class="{ rotate: !isHidden['ventas'] }" class="w-6 h-6"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <ul id="dropdown-crud" :class="{ hidden: isHidden['ventas'] }" class="space-y-2 py-2">
                                <li>
                                    <NuxtLink to="/admin/comandes"
                                        class="text-base text-[#276BF2] rounded-lg flex items-center p-2 group hover:bg-gray-100 pl-11 dark:text-gray-200 dark:hover:bg-gray-700 "
                                        :class="{ 'text-gray-900': route.path !== '/admin/comandes' && route.path !== '/admin/comandes/' }">
                                        Comandes
                                    </NuxtLink>
                                </li>
                                <li>
                                    <NuxtLink to="/admin/comandes/historial"
                                        class="text-base text-[#276BF2] rounded-lg flex items-center p-2 group hover:bg-gray-100 pl-11 dark:text-gray-200 dark:hover:bg-gray-700 "
                                        :class="{ 'text-gray-900': route.path !== '/admin/comandes/historial' && route.path !== '/admin/comandes/historial/' }">
                                        Historial
                                    </NuxtLink>
                                </li>
                            </ul>
                        </li>

                        <!--  ======= CLIENTES ================================  -->
                        <li>
                            <button type="button"
                                class="flex items-center w-full p-2 text-base text-gray-900 rounded-lg group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
                                aria-controls="dropdown-pages" data-collapse-toggle="dropdown-pages"
                                @click="toggleHidden('clientes')">
                                <svg class="flex-shrink-0 w-6 h-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm2 10a1 1 0 10-2 0v3a1 1 0 102 0v-3zm2-3a1 1 0 011 1v5a1 1 0 11-2 0v-5a1 1 0 011-1zm4-1a1 1 0 10-2 0v7a1 1 0 102 0V8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="flex-1 ml-3 text-left whitespace-nowrap"
                                    sidebar-toggle-item="">Clientes</span>
                                <svg sidebar-toggle-item="" :class="{ rotate: !isHidden['clientes'] }" class="w-6 h-6"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <ul id="dropdown-pages" :class="{ hidden: isHidden['clientes'] }" class="py-2 space-y-2">
                                <li>
                                    <NuxtLink to="" disabled
                                        class="flex justify-between items-center p-2 text-base text-gray-500 bg-gray-50 rounded-lg pl-11 group cursor-not-allowed dark:text-gray-200 dark:hover:bg-gray-700">
                                        Lista
                                        <svg fill="#c1c1c1" width="1em" height="1em" version="1.1" id="Layer_1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 491.52 491.52"
                                            xml:space="preserve">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <g>
                                                    <g>
                                                        <path
                                                            d="M399.4,203.578h-19.801h-0.005v-69.744C379.593,60.039,319.556,0,245.759,0c-73.793,0-133.832,60.039-133.832,133.835 v69.744H92.122c-15.656,0-28.35,12.692-28.35,28.349v17.246v196.751v17.245c0,15.658,12.693,28.35,28.35,28.35H245.76H399.4 c15.656,0,28.348-12.692,28.348-28.35v-17.245V249.174v-17.246C427.748,216.27,415.056,203.578,399.4,203.578z M275.935,406.648 h-60.349l10.801-51.467c-10.101-6.428-16.848-17.652-16.848-30.512c0-20.003,16.218-36.219,36.221-36.219 c20.004,0,36.219,16.216,36.219,36.219c0,12.86-6.745,24.084-16.845,30.51L275.935,406.648z M331.84,203.578h-86.08h-86.075 h-0.005v-69.744c0-47.469,38.613-86.081,86.08-86.081c47.469,0,86.08,38.613,86.08,86.081V203.578z">
                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </NuxtLink>
                                </li>
                                <li>
                                    <NuxtLink to="" disabled
                                        class="flex justify-between items-center p-2 text-base text-gray-500 bg-gray-50 rounded-lg pl-11 group cursor-not-allowed dark:text-gray-200 dark:hover:bg-gray-700">
                                        Reseñas
                                        <svg fill="#c1c1c1" width="1em" height="1em" version="1.1" id="Layer_1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 491.52 491.52"
                                            xml:space="preserve">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <g>
                                                    <g>
                                                        <path
                                                            d="M399.4,203.578h-19.801h-0.005v-69.744C379.593,60.039,319.556,0,245.759,0c-73.793,0-133.832,60.039-133.832,133.835 v69.744H92.122c-15.656,0-28.35,12.692-28.35,28.349v17.246v196.751v17.245c0,15.658,12.693,28.35,28.35,28.35H245.76H399.4 c15.656,0,28.348-12.692,28.348-28.35v-17.245V249.174v-17.246C427.748,216.27,415.056,203.578,399.4,203.578z M275.935,406.648 h-60.349l10.801-51.467c-10.101-6.428-16.848-17.652-16.848-30.512c0-20.003,16.218-36.219,36.221-36.219 c20.004,0,36.219,16.216,36.219,36.219c0,12.86-6.745,24.084-16.845,30.51L275.935,406.648z M331.84,203.578h-86.08h-86.075 h-0.005v-69.744c0-47.469,38.613-86.081,86.08-86.081c47.469,0,86.08,38.613,86.08,86.081V203.578z">
                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </NuxtLink>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <button type="button"
                                class="flex items-center w-full p-2 text-base text-gray-900 rounded-lg group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
                                aria-controls="dropdown-auth" data-collapse-toggle="dropdown-auth"
                                @click="toggleHidden('marketing')">
                                <svg class="flex-shrink-0 w-6 h-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="flex-1 ml-3 text-left whitespace-nowrap"
                                    sidebar-toggle-item="">Marketing</span>
                                <svg sidebar-toggle-item="" :class="{ rotate: !isHidden['marketing'] }" class="w-6 h-6"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <ul id="dropdown-auth" :class="{ hidden: isHidden['marketing'] }" class="py-2 space-y-2">
                                <li>
                                    <NuxtLink to="" disabled
                                        class="flex justify-between items-center p-2 text-base text-gray-500 bg-gray-50 rounded-lg pl-11 group cursor-not-allowed dark:text-gray-200 dark:hover:bg-gray-700">
                                        Promociones
                                        <svg fill="#c1c1c1" width="1em" height="1em" version="1.1" id="Layer_1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 491.52 491.52"
                                            xml:space="preserve">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <g>
                                                    <g>
                                                        <path
                                                            d="M399.4,203.578h-19.801h-0.005v-69.744C379.593,60.039,319.556,0,245.759,0c-73.793,0-133.832,60.039-133.832,133.835 v69.744H92.122c-15.656,0-28.35,12.692-28.35,28.349v17.246v196.751v17.245c0,15.658,12.693,28.35,28.35,28.35H245.76H399.4 c15.656,0,28.348-12.692,28.348-28.35v-17.245V249.174v-17.246C427.748,216.27,415.056,203.578,399.4,203.578z M275.935,406.648 h-60.349l10.801-51.467c-10.101-6.428-16.848-17.652-16.848-30.512c0-20.003,16.218-36.219,36.221-36.219 c20.004,0,36.219,16.216,36.219,36.219c0,12.86-6.745,24.084-16.845,30.51L275.935,406.648z M331.84,203.578h-86.08h-86.075 h-0.005v-69.744c0-47.469,38.613-86.081,86.08-86.081c47.469,0,86.08,38.613,86.08,86.081V203.578z">
                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </NuxtLink>
                                </li>
                                <li>
                                    <NuxtLink to="" disabled
                                        class="flex justify-between items-center p-2 text-base text-gray-500 bg-gray-50 rounded-lg pl-11 group cursor-not-allowed dark:text-gray-200 dark:hover:bg-gray-700">
                                        Campañas
                                        <svg fill="#c1c1c1" width="1em" height="1em" version="1.1" id="Layer_1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 491.52 491.52"
                                            xml:space="preserve">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <g>
                                                    <g>
                                                        <path
                                                            d="M399.4,203.578h-19.801h-0.005v-69.744C379.593,60.039,319.556,0,245.759,0c-73.793,0-133.832,60.039-133.832,133.835 v69.744H92.122c-15.656,0-28.35,12.692-28.35,28.349v17.246v196.751v17.245c0,15.658,12.693,28.35,28.35,28.35H245.76H399.4 c15.656,0,28.348-12.692,28.348-28.35v-17.245V249.174v-17.246C427.748,216.27,415.056,203.578,399.4,203.578z M275.935,406.648 h-60.349l10.801-51.467c-10.101-6.428-16.848-17.652-16.848-30.512c0-20.003,16.218-36.219,36.221-36.219 c20.004,0,36.219,16.216,36.219,36.219c0,12.86-6.745,24.084-16.845,30.51L275.935,406.648z M331.84,203.578h-86.08h-86.075 h-0.005v-69.744c0-47.469,38.613-86.081,86.08-86.081c47.469,0,86.08,38.613,86.08,86.081V203.578z">
                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </NuxtLink>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <button type="button"
                                class="flex items-center w-full p-2 text-base text-[#276BF2] rounded-lg group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
                                :class="{ 'text-gray-900': !route.path.includes('/admin/perfilComercio') }"
                                aria-controls="dropdown-playground" data-collapse-toggle="dropdown-playground"
                                @click="toggleHidden('configuracion')">
                                <svg class="flex-shrink-0 w-6 h-6 text-[#276BF2]"
                                    :class="{ 'text-gray-500': !route.path.includes('/admin/perfilComercio') }"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                    aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M6.672 1.911a1 1 0 10-1.932.518l.259.966a1 1 0 001.932-.518l-.26-.966zM2.429 4.74a1 1 0 10-.517 1.932l.966.259a1 1 0 00.517-1.932l-.966-.26zm8.814-.569a1 1 0 00-1.415-1.414l-.707.707a1 1 0 101.415 1.415l.707-.708zm-7.071 7.072l.707-.707A1 1 0 003.465 9.12l-.708.707a1 1 0 001.415 1.415zm3.2-5.171a1 1 0 00-1.3 1.3l4 10a1 1 0 001.823.075l1.38-2.759 3.018 3.02a1 1 0 001.414-1.415l-3.019-3.02 2.76-1.379a1 1 0 00-.076-1.822l-10-4z">
                                    </path>
                                </svg>
                                <span class="flex-1 ml-3 text-left whitespace-nowrap"
                                    sidebar-toggle-item="">Configuración</span>
                                <svg sidebar-toggle-item="" :class="{ rotate: !isHidden['configuracion'] }"
                                    class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <ul id="dropdown-playground" :class="{ hidden: isHidden['configuracion'] }"
                                class="space-y-2 py-2">
                                <li>
                                    <NuxtLink to="/admin/perfilComercio"
                                        class="text-base text-[#276BF2] rounded-lg flex items-center p-2 group hover:bg-gray-100 pl-11 dark:text-gray-200 dark:hover:bg-gray-700"
                                        :class="{ 'text-gray-900': route.path !== ('/admin/perfilComercio') }">
                                        Dades del comerç
                                    </NuxtLink>
                                </li>
                                <li>
                                    <NuxtLink to="" disabled
                                        class="flex justify-between items-center p-2 text-base text-gray-500 bg-gray-50 rounded-lg pl-11 group cursor-not-allowed dark:text-gray-200 dark:hover:bg-gray-700">
                                        Horarios
                                        <svg fill="#c1c1c1" width="1em" height="1em" version="1.1" id="Layer_1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 491.52 491.52"
                                            xml:space="preserve">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <g>
                                                    <g>
                                                        <path
                                                            d="M399.4,203.578h-19.801h-0.005v-69.744C379.593,60.039,319.556,0,245.759,0c-73.793,0-133.832,60.039-133.832,133.835 v69.744H92.122c-15.656,0-28.35,12.692-28.35,28.349v17.246v196.751v17.245c0,15.658,12.693,28.35,28.35,28.35H245.76H399.4 c15.656,0,28.348-12.692,28.348-28.35v-17.245V249.174v-17.246C427.748,216.27,415.056,203.578,399.4,203.578z M275.935,406.648 h-60.349l10.801-51.467c-10.101-6.428-16.848-17.652-16.848-30.512c0-20.003,16.218-36.219,36.221-36.219 c20.004,0,36.219,16.216,36.219,36.219c0,12.86-6.745,24.084-16.845,30.51L275.935,406.648z M331.84,203.578h-86.08h-86.075 h-0.005v-69.744c0-47.469,38.613-86.081,86.08-86.081c47.469,0,86.08,38.613,86.08,86.081V203.578z">
                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </NuxtLink>
                                </li>
                                <li>
                                    <NuxtLink to="" disabled
                                        class="flex justify-between items-center p-2 text-base text-gray-500 bg-gray-50 rounded-lg pl-11 group cursor-not-allowed dark:text-gray-200 dark:hover:bg-gray-700">
                                        Perfil del negocio
                                        <svg fill="#c1c1c1" width="1em" height="1em" version="1.1" id="Layer_1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 491.52 491.52"
                                            xml:space="preserve">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <g>
                                                    <g>
                                                        <path
                                                            d="M399.4,203.578h-19.801h-0.005v-69.744C379.593,60.039,319.556,0,245.759,0c-73.793,0-133.832,60.039-133.832,133.835 v69.744H92.122c-15.656,0-28.35,12.692-28.35,28.349v17.246v196.751v17.245c0,15.658,12.693,28.35,28.35,28.35H245.76H399.4 c15.656,0,28.348-12.692,28.348-28.35v-17.245V249.174v-17.246C427.748,216.27,415.056,203.578,399.4,203.578z M275.935,406.648 h-60.349l10.801-51.467c-10.101-6.428-16.848-17.652-16.848-30.512c0-20.003,16.218-36.219,36.221-36.219 c20.004,0,36.219,16.216,36.219,36.219c0,12.86-6.745,24.084-16.845,30.51L275.935,406.648z M331.84,203.578h-86.08h-86.075 h-0.005v-69.744c0-47.469,38.613-86.081,86.08-86.081c47.469,0,86.08,38.613,86.08,86.081V203.578z">
                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </NuxtLink>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </aside>
    <div class="admin-layout relative h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
        <slot></slot>
    </div>
</template>

<script setup>
import { nextTick } from 'vue';
import { useRoute, useRouter } from "vue-router";

const route = useRoute();
console.log(route.path);
const authStore = useAuthStore();
const comercio = authStore.comercio;

const sidebarOpen = ref(false);

const toggleSidebar = () => {
    sidebarOpen.value = !sidebarOpen.value;
};

const isHidden = reactive({
    'productes': true,
    'categories': true,
    'ventas': true,
    'clientes': true,
    'marketing': true,
    'configuracion': true,
});

const isOpen = ref({
    'settings': false,
    'notifications': false,
});

function toggleHidden(menu) {
    isHidden[menu] = !isHidden[menu];
}

async function toggleDropdown(menu) {
    isOpen.value[menu] = !isOpen.value[menu];
    await nextTick();
}

const handleClickOutside = (event) => {
    if (!isOpen.value['settings'] && !isOpen.value['notifications']) {
        return;
    }

    if (event.target.closest('.toggle-button-settings') || event.target.closest('.dropdown-settings')) {
        return;
    }

    if (event.target.closest('.toggle-button-notifications') || event.target.closest('.dropdown-notifications')) {
        return;
    }

    isOpen.value['settings'] = false;
    isOpen.value['notifications'] = false;
};

async function goToLogout() {
    const { $communicationManager } = useNuxtApp();
    await $communicationManager.logout();
    authStore.logout();
    localStorage.removeItem('animationShown');
    navigateTo('/login');
}

onMounted(() => {
    document.addEventListener('click', handleClickOutside);
});

onBeforeMount(() => {
    document.removeEventListener('click', handleClickOutside);
});
</script>

<style scoped>
.admin-layout {
    min-height: 100vh;
}

.rotate {
    transform: rotate(180deg);
}
</style>

<!-- fixed z-30 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700 -->
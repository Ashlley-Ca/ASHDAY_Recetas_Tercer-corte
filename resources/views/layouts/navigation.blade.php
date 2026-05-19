{{-- ============================================================
     NAVBAR - Componente de navegación principal de Laravel Breeze
     Usa Alpine.js (x-data, @click, :class) para manejar el estado
     del menú móvil sin necesidad de JavaScript adicional
============================================================ --}}

{{-- x-data="{ open: false }": inicializa el estado del menú hamburguesa
     'open' controla si el menú móvil está visible o no --}}
<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">

    {{-- ============================================================
         MENÚ PRINCIPAL (escritorio)
         Visible en pantallas medianas y grandes (sm en adelante)
    ============================================================ --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <div class="flex">

                {{-- LOGO
                     Redirige al dashboard al hacer clic
                     x-application-logo: componente Blade personalizado del proyecto --}}
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                {{-- ENLACES DE NAVEGACIÓN (escritorio)
                     hidden: ocultos por defecto
                     sm:flex: visibles desde pantallas sm en adelante
                     :active: prop que marca el enlace como activo según la ruta actual --}}
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}  {{-- __(): función de traducción de Laravel --}}
                    </x-nav-link>
                </div>

            </div>

            {{-- ============================================================
                 DROPDOWN DE CONFIGURACIÓN (escritorio)
                 Visible solo en pantallas sm en adelante
                 Muestra nombre del usuario autenticado y opciones de cuenta
            ============================================================ --}}
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                {{-- x-dropdown: componente Blade que maneja el menú desplegable
                     align="right": alinea el dropdown a la derecha
                     width="48": ancho del panel desplegable --}}
                <x-dropdown align="right" width="48">

                    {{-- TRIGGER: botón que abre/cierra el dropdown
                         Muestra el nombre del usuario autenticado y un ícono de flecha --}}
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">

                            {{-- Nombre del usuario actualmente autenticado --}}
                            <div>{{ Auth::user()->name }}</div>

                            {{-- Ícono de flecha hacia abajo (SVG inline) --}}
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>

                        </button>
                    </x-slot>

                    {{-- CONTENIDO DEL DROPDOWN
                         Opciones visibles al abrir el menú desplegable --}}
                    <x-slot name="content">

                        {{-- Enlace al perfil del usuario --}}
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        {{-- CERRAR SESIÓN
                             Se usa un formulario POST por seguridad (logout no debe ser GET)
                             El onclick previene la navegación directa y envía el formulario --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf {{-- Token CSRF: protege contra ataques de falsificación --}}

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>

                    </x-slot>

                </x-dropdown>
            </div>

            {{-- ============================================================
                 BOTÓN HAMBURGUESA (móvil)
                 Visible solo en pantallas menores a sm
                 @click="open = !open": alterna el estado del menú con Alpine.js
            ============================================================ --}}
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">

                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        {{-- Ícono de 3 líneas (menú cerrado): se oculta cuando open=true --}}
                        <path :class="{'hidden': open, 'inline-flex': ! open }"
                              class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />

                        {{-- Ícono de X (menú abierto): se muestra cuando open=true --}}
                        <path :class="{'hidden': ! open, 'inline-flex': open }"
                              class="hidden"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>

                </button>
            </div>

        </div>
    </div>

    {{-- ============================================================
         MENÚ RESPONSIVE (móvil)
         :class Alpine.js: muestra u oculta el bloque según el valor de 'open'
         Solo visible en pantallas menores a sm
    ============================================================ --}}
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

        {{-- Enlaces de navegación en versión móvil --}}
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        {{-- OPCIONES DE CUENTA (móvil)
             Muestra nombre, correo y acciones del usuario autenticado --}}
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">

            <div class="px-4">
                {{-- Nombre del usuario autenticado --}}
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">
                    {{ Auth::user()->name }}
                </div>
                {{-- Correo electrónico del usuario autenticado --}}
                <div class="font-medium text-sm text-gray-500">
                    {{ Auth::user()->email }}
                </div>
            </div>

            <div class="mt-3 space-y-1">

                {{-- Enlace al perfil del usuario (versión móvil) --}}
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                {{-- CERRAR SESIÓN (móvil)
                     Misma lógica que en escritorio:
                     formulario POST + @csrf + onclick para enviar el form --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

            </div>
        </div>
    </div>

</nav>
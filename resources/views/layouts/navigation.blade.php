<nav x-data="{ open: false }" class="custom-navbar">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ Auth::user()->role === 'Administrador' ? route('admin.dashboard') : (Auth::user()->role === 'Secretario' ? route('secretario.dashboard') : route('dashboard')) }}">
                        <div class="shrink-0 flex items-center">
                            <img src="{{ asset('imagenes/Logo.png') }}" alt="Logo" style="height: 64px; width: auto;">
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="Auth::user()->role === 'Administrador' ? route('admin.dashboard') : (Auth::user()->role === 'Secretario' ? route('secretario.dashboard') : route('dashboard'))" :active="request()->routeIs('dashboard')" class="text-black">
                        {{ __('Inicio') }}
                    </x-nav-link>

                    <!-- admin links -->
                    @if (Auth::user()->role === 'Administrador')
                        <x-nav-link href="{{ route('admin.registro-pacientes') }}" :active="request()->routeIs('admin.registro-pacientes')" class="text-black">
                            {{ __('Pacientes') }}
                        </x-nav-link>

                        <x-nav-link href="{{ route('admin.registro-medicos') }}" :active="request()->routeIs('admin.registro-medicos')" class="text-black">
                            {{ __('Médicos') }}
                        </x-nav-link>

                        <x-nav-link href="{{ route('admin.registro-secretarios') }}" :active="request()->routeIs('admin.registro-secretarios')" class="text-black">
                            {{ __('Secretarios') }}
                        </x-nav-link>

                        <x-nav-link href="{{ route('admin.registro-servicios') }}" :active="request()->routeIs('admin.registro-servicios')" class="text-black">
                            {{ __('Servicios') }}
                        </x-nav-link>

                        <x-nav-link href="{{ route('admin.registro-productos') }}" :active="request()->routeIs('admin.registro-productos')" class="text-black">
                            {{ __('Productos') }}
                        </x-nav-link>

                        <x-nav-link href="{{ route('admin.registro-enfermeros') }}" :active="request()->routeIs('admin.registro-enfermeros')" class="text-black">
                            {{ __('Enfermeros') }}
                        </x-nav-link>
                    @endif

                    <!-- medico links -->
                    @if (Auth::user()->role === 'Médico')
                        <x-nav-link href="/registro-pacientes" :active="request()->routeIs('medico.registro-pacientes')" class="text-black">
                            {{ __('Registro Pacientes') }}
                        </x-nav-link>

                        <x-nav-link href="/crear-cita" :active="request()->routeIs('medico.crear-cita')" class="text-black">
                            {{ __('Crear Cita') }}
                        </x-nav-link>
                    @endif

                    <!-- secretario links -->
                    @if (Auth::user()->role === 'Secretario')
                        <x-nav-link href="{{ route('secretario.registro-pacientes') }}" :active="request()->routeIs('secretario.registro-pacientes')" class="text-black">
                            {{ __('Registro Pacientes') }}
                        </x-nav-link>

                        <x-nav-link href="{{ route('secretario.consultas') }}" :active="request()->routeIs('secretario.consultas')" class="text-black">
                            {{ __('Citas Agendadas') }}
                        </x-nav-link>

                        <x-nav-link  href="{{ route('secretario.pagos') }}" :active="request()->routeIs('secretario.pagos')" class="text-black">
                            {{ __('Pagos De Consultas') }}
                        </x-nav-link>
                        
                        <x-nav-link  href="{{ route('secretario.registro-productos') }}" :active="request()->routeIs('secretario.pagos')" class="text-black">
                            {{ __('Registrar Productos') }}
                        </x-nav-link>

                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-black bg-[#3FBBB4] hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->nombre }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="text-black">
                            {{ __('Perfil') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" class="text-black"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Cerrar Sesión') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-black hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out bg-[#3FBBB4]">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden ">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="Auth::user()->role === 'Administrador' ? route('admin.dashboard') : (Auth::user()->role === 'Secretario' ? route('secretario.dashboard') : route('dashboard'))" :active="request()->routeIs('dashboard')" class="text-black">
                {{ __('Inicio') }}
            </x-responsive-nav-link>

            <!-- admin links responsive -->
            @if (Auth::user()->role === 'Administrador')
                <x-responsive-nav-link href="{{ route('admin.registro-pacientes') }}" :active="request()->routeIs('admin.registro-pacientes')" class="text-black">
                    {{ __('Pacientes') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link href="{{ route('admin.registro-medicos') }}" :active="request()->routeIs('admin.registro-medicos')" class="text-black">
                    {{ __('Médicos') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link href="{{ route('admin.registro-secretarios') }}" :active="request()->routeIs('admin.registro-secretarios')" class="text-black">
                    {{ __('Secretarios') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link href="{{ route('admin.registro-servicios') }}" :active="request()->routeIs('admin.registro-servicios')" class="text-black">
                    {{ __('Servicios')}}
                </x-responsive-nav-link>

                <x-responsive-nav-link href="{{ route('admin.registro-productos') }}" :active="request()->routeIs('admin.registro-productos')" class="text-black">
                    {{ __('Productos') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link href="{{ route('admin.registro-enfermeros') }}" :active="request()->routeIs('admin.registro-enfermeros')" class="text-black">
                    {{ __('Enfermeros') }}
                </x-responsive-nav-link>
            @endif

            <!-- medico links responsive -->
            @if (Auth::user()->role === 'Médico')
                <x-responsive-nav-link href="/registro-pacientes" :active="request()->routeIs('medico.registro-pacientes')" class="text-black">
                    {{ __('Registrar Pacientes')}}
                </x-responsive-nav-link>

                <x-responsive-nav-link href="/crear-cita" :active="request()->routeIs('medico.crear-cita')" class="text-black">
                    {{ __('Crear Cita')}}
                </x-responsive-nav-link>
            @endif

            <!-- secretario links responsive -->
            @if (Auth::user()->role === 'Secretario')
                <x-responsive-nav-link href="{{ route('secretario.registro-pacientes') }}" :active="request()->routeIs('secretario.registro-pacientes')" class="text-black">
                    {{ __('Registro Pacientes')}}
                </x-responsive-nav-link>

                <x-responsive-nav-link href="{{ route('secretario.consultas') }}" :active="request()->routeIs('secretario.consultas')" class="text-black">
                    {{ __('Citas Agendadas')}}
                </x-responsive-nav-link>

                <x-responsive-nav-link href="{{ route('secretario.registro-productos') }}" :active="request()->routeIs('secretario.pagos')" class="text-black">
                    {{ __('Registrar Productos')}}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 background-color: #3FBBB4">
            <div class="px-4">
                <div class="font-medium text-base text-black">{{ Auth::user()->nombre }} {{ Auth::user()->apellido}}</div>
                <div class="font-medium text-sm text-black">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1 background-color: #3FBBB4">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-black background-color: #3FBBB4">
                    {{ __('Perfil') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" class="text-black background-color: #3FBBB4"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Cerrar sesión') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

<style>
    .custom-navbar {
        background-color: #CAF4FF;
        border-bottom: 1px solid #7FB9E2;
    }

    .text-black {
        color: black !important;
    }

    .custom-navbar a {
        color: black !important;
    }

    @media (prefers-color-scheme: dark) {
        .custom-navbar {
            background-color: #395B64;
            border-bottom: 1px solid #3FBBB4;
        }
    }
</style>

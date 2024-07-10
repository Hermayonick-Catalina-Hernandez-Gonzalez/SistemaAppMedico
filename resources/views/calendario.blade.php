<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario</title>
    <link rel="dns-prefetch" href="//unpkg.com" />
	<link rel="dns-prefetch" href="//cdn.jsdelivr.net" />
	<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
	<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

    <style>
        [x-cloak] {
            display: none;
        }

        .disabled {
            pointer-events: none;
            opacity: 0.5;
        }
    </style>
</head>

<body class="h-screen overflow-hidden flex items-center justify-center">
    <div class="antialiased sans-serif bg-gray-100 h-screen">
        <div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
            <div class="container mx-auto px-4 py-2 md:py-24">
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="flex items-center justify-between py-2 px-6">
                        <div>
                            <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-gray-800"></span>
                            <span x-text="year" class="ml-1 text-lg text-gray-600 font-normal"></span>
                        </div>
                        <div class="border rounded-lg px-1" style="padding-top: 2px;">
                            <button type="button"
                                class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 items-center"
                                :class="{ 'cursor-not-allowed opacity-25': month == 0 }"
                                :disabled="month == 0 ? true : false" @click="month--; getNoOfDays()">
                                <svg class="h-6 w-6 text-gray-500 inline-flex leading-none" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                            <div class="border-r inline-flex h-6"></div>
                            <button type="button"
                                class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex items-center cursor-pointer hover:bg-gray-200 p-1"
                                :class="{ 'cursor-not-allowed opacity-25': month == 11 }"
                                :disabled="month == 11 ? true : false" @click="month++; getNoOfDays()">
                                <svg class="h-6 w-6 text-gray-500 inline-flex leading-none" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="-mx-1 -mb-1">
                        <div class="flex flex-wrap" style="margin-bottom: -40px;">
                            <template x-for="(day, index) in days" :key="index">
                                <div style="width: 14.26%" class="px-2 py-2">
                                    <div x-text="day"
                                        class="text-gray-600 text-sm uppercase tracking-wide font-bold text-center">
                                    </div>
                                </div>
                            </template>
                        </div>
                        <div class="flex flex-wrap border-t border-l">
                            <template x-for="blankday in blankdays">
                                <div style="width: 14.28%; height: 120px"
                                    class="text-center border-r border-b px-4 pt-2"></div>
                            </template>
                            <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                                <div style="width: 14.28%; height: 120px" class="px-4 pt-2 border-r border-b relative">
                                    <div @click="isPastDate(date) ? null : showEventModal(date)" x-text="date"
                                        class="inline-flex w-6 h-6 items-center justify-center cursor-pointer text-center leading-none rounded-full transition ease-in-out duration-100"
                                        :class="{
                                            'bg-blue-500 text-white': isToday(date) == true,
                                            'text-gray-700 hover:bg-blue-200': isToday(date) == false && isPastDate(date) == false,
                                            'text-gray-400 disabled': isPastDate(date) == true && isToday(date) == false
                                        }">
                                    </div>
                                    <div style="height: 80px;" class="overflow-y-auto mt-1">
                                        <template
                                            x-for="event in events.filter(e => new Date(e.event_date).toDateString() === new Date(year, month, date).toDateString())">
                                            <div class="px-2 py-1 rounded-lg mt-1 overflow-hidden border"
                                                :class="{
                                                    'border-blue-200 text-blue-800 bg-blue-100': event.event_theme === 'blue',
                                                    'border-red-200 text-red-800 bg-red-100': event.event_theme === 'red',
                                                    'border-yellow-200 text-yellow-800 bg-yellow-100': event.event_theme === 'yellow',
                                                    'border-green-200 text-green-800 bg-green-100': event.event_theme === 'green',
                                                    'border-purple-200 text-purple-800 bg-purple-100': event.event_theme === 'purple'
                                                }">
                                                <p x-text="event.event_title" class="text-sm truncate leading-tight">
                                                </p>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
            <div style="background-color: rgba(0, 0, 0, 0.8)"
                class="fixed z-40 top-0 right-0 left-0 bottom-0 h-full w-full"
                x-show.transition.opacity="openEventModal">
                <div class="p-4 max-w-xl mx-auto relative absolute left-0 right-0 overflow-hidden mt-24">
                    <div class="shadow absolute right-0 top-0 w-10 h-10 rounded-full bg-white text-gray-500 hover:text-gray-800 inline-flex items-center justify-center cursor-pointer"
                        x-on:click="openEventModal = !openEventModal">
                        <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path
                                d="M16.192 6.344L11.949 10.586 7.707 6.344 6.293 7.758 10.535 12 6.293 16.242 7.707 17.656 11.949 13.414 16.192 17.656 17.606 16.242 13.364 12 17.606 7.758z" />
                        </svg>
                    </div>
                    <div class="shadow w-full rounded-lg bg-white overflow-hidden w-full block p-8">
                        <h2 class="font-bold text-2xl mb-6 text-gray-800 border-b pb-2">Añadir cita</h2>
                        <!-- Form para mandar datos a la BD-->
                        <form method="post" action="{{ route('secretario.crear-cita') }}">
                            @csrf
                            <div class="mb-4">
                                <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Paciente</label>
                                <select
                                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                    name="pacientes" x-model="event_title" required>
                                    @foreach($pacientes as $paciente)
                                        <option value="{{ $paciente->nombre }}">{{ $paciente->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="time"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Seleccionar hora:</label>
                                <div class="flex">
                                    <input type="time" id="time"
                                        class="rounded-none rounded-s-lg bg-gray-50 border text-gray-900 leading-none focus:ring-blue-500 focus:border-blue-500 block flex-1 w-full text-sm border-gray-300 p-2.5 "
                                        min="09:00" max="18:00" value="09:00" name="hora" x-model="event_time" required>
                                    <input type="date" id="date"
                                        class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 leading-none focus:ring-blue-500 focus:border-blue-500 block flex-1 w-full text-sm border-gray-300 p-2.5 "
                                        :value="new Date(year, month, date).toISOString().split('T')[0]"
                                        name="fecha" x-model="event_date" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Servicio</label>
                                <select
                                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                    name="servicio" x-model="event_servicio" required>
                                    @foreach($servicios as $servicio)
                                        <option value="{{ $servicio->nombre }}">{{ $servicio->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Descripción</label>
                                <textarea
                                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                    name="Descripcion" x-model="event_descripcion" required></textarea>
                            </div>
                            <div class="inline-block w-64 mb-4">
                                <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Selecciona Color</label>
                                <div class="relative">
                                    <select x-model="event_theme"
                                        class="block appearance-none w-full bg-gray-200 border-2 border-gray-200 hover:border-gray-500 px-4 py-2 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-blue-500 text-gray-700">
                                        <template x-for="(theme, index) in themes">
                                            <option :value="theme.value" x-text="theme.label"></option>
                                        </template>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-8 text-right">
                                <button type="button"
                                    class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg"
                                    @click="openEventModal = !openEventModal">Cancelar
                                </button>
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg"
                                    @click="addEvent()">Guardar cita
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <script>
            function app() {
                return {
                    month: '',
                    year: '',
                    no_of_days: [],
                    blankdays: [],
                    days: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
                    events: [],
                    openEventModal: false,
                    event_title: '',
                    event_date: '',
                    event_time: '',
                    event_servicio: '',
                    event_descripcion: '',
                    event_theme: 'blue',
                    themes: [{
                            value: "blue",
                            label: "Azul"
                        },
                        {
                            value: "red",
                            label: "Rojo"
                        },
                        {
                            value: "yellow",
                            label: "Amarillo"
                        },
                        {
                            value: "green",
                            label: "Verde"
                        },
                        {
                            value: "purple",
                            label: "Morado"
                        }
                    ],
                    initDate() {
                        let today = new Date();
                        this.month = today.getMonth();
                        this.year = today.getFullYear();
                    },
                    isToday(date) {
                        const today = new Date();
                        const d = new Date(this.year, this.month, date);
                        return today.toDateString() === d.toDateString();
                    },
                    isPastDate(date) {
                        const today = new Date();
                        const d = new Date(this.year, this.month, date);
                        return d < today && !this.isToday(date);
                    },
                    showEventModal(date) {
                        if (this.isPastDate(date)) return;
                        this.date = date;
                        this.event_date = new Date(this.year, this.month, date).toISOString().split('T')[0];
                        this.openEventModal = true;
                    },
                    addEvent() {
                        if (this.event_title === '' || this.event_date === '' || this.event_theme === '') return;

                        const [year, month, day] = this.event_date.split('-');
                        const eventDate = new Date(year, month - 1, day);

                        this.events.push({
                            event_date: eventDate.toISOString().split('T')[0],
                            event_title: this.event_title,
                            event_descripcion: this.event_descripcion,
                            event_servicio: this.event_servicio,
                            event_time: this.event_time,
                            event_theme: this.event_theme
                        });

                        this.event_title = '';
                        this.event_date = '';
                        this.event_descripcion = '';
                        this.event_servicio = '';
                        this.event_time = '';
                        this.event_theme = 'blue'; // Reset to default

                        this.openEventModal = false;
                    },
                    getNoOfDays() {
                        let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();
                        let dayOfWeek = new Date(this.year, this.month).getDay();
                        let blankdaysArray = [];
                        for (var i = 1; i <= dayOfWeek; i++) {
                            blankdaysArray.push(i);
                        }
                        let daysArray = [];
                        for (var i = 1; i <= daysInMonth; i++) {
                            daysArray.push(i);
                        }
                        this.blankdays = blankdaysArray;
                        this.no_of_days = daysArray;
                    }
                }
            }
        </script>
    </div>
</body>

</html>

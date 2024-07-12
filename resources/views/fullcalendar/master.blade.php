<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<script src="{{ asset('assets/fullcalendar/dist/index.global.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/locales-all.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
  .fc-event {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    max-width: 100%;
  }
  .fc-daygrid-event {
    display: block;
    font-size: 12px;
    padding: 2px; /* Ajusta el padding si es necesario */
  }
  .fc-daygrid-event-dot {
    display: none;
  }
</style>
</head>
<body>
  <div id='wrap'>
    <div id='calendar-wrap'>
      <div id='calendar'></div>
    </div>
  </div>

  <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Cita</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('secretario.crear-cita') }}">
                @csrf
                <div class="mb-4">
                    <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Paciente</label>
                    <select
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                        name="paciente_id" required>
                        @foreach($pacientes as $paciente)
                            <option value="{{ $paciente->id }}">{{ $paciente->nombre }} {{ $paciente->apellido }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="time" class="block mb-2 text-sm font-medium text-gray-900">Seleccionar hora:</label>
                    <div class="flex">
                        <input type="time" id="time" class="rounded-none rounded-s-lg bg-gray-50 border text-gray-900 leading-none focus:ring-blue-500 focus:border-blue-500 block flex-1 w-full text-sm border-gray-300 p-2.5" min="09:00" max="18:00" value="09:00" name="hora" required>
                        <input type="date" id="date" class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 leading-none focus:ring-blue-500 focus:border-blue-500 block flex-1 w-full text-sm border-gray-300 p-2.5" name="fecha" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Servicio</label>
                    <select class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" name="servicio" required>
                        @foreach($servicios as $servicio)
                            <option value="{{ $servicio->nombre }}">{{ $servicio->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Descripción</label>
                    <textarea class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" name="Descripcion" required></textarea>
                </div>
                <div class="mt-8 text-right">
                    <button type="button" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">Guardar cita</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var citas = @json($citas);

    var events = citas.map(function(cita) {
        return {
            title: cita.pacientes + ' - ' + cita.Descripcion,
            start: cita.fecha + 'T' + cita.hora,
            description: cita.Descripcion // Descripción adicional para el evento
        };
    });

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      locale: 'es',
      selectable: true,
      select: function(info) {
        var now = new Date();
        var selectedDate = new Date(info.startStr);
        if (selectedDate.setHours(0,0,0,0) >= now.setHours(0,0,0,0)) {
          $('#date').val(info.startStr);
          $('#eventModal').modal('show');
        } else {
          alert('No puedes seleccionar una fecha pasada.');
        }
      },
      editable: true,
      droppable: true,
      events: events,
      eventContent: function(arg) {
        let italicEl = document.createElement('div')
        let description = document.createElement('div')
        italicEl.innerHTML = '<b>' + arg.event.start.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'}) + '</b> ' + arg.event.title;
        description.innerHTML = '<span>' + arg.event.extendedProps.description + '</span>'
        let arrayOfDomNodes = [ italicEl, description ]
        return { domNodes: arrayOfDomNodes }
      },
      height: 'auto',
      dayMaxEventRows: true,
      moreLinkClick: 'popover'
    });
    calendar.render();
  });
</script>
</body>
</html>

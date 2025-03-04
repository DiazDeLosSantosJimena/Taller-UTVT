@extends('layout.layoutAdmin')

@section('content')
<div class="row pb-5">
    <div class="col-md-12 my-5">
        <h2>Gráficos</h2>
    </div>
    <div class="col-md-8">
        <h5 class="text-center">Cantidad de alumnos inscritos por taller</h5>
        <div>
            <canvas id="AlumnosXTalleres"></canvas>
        </div>
    </div>
    <div class="col-md-4">
        <h5>Porcentaje de asistencias por taller</h5>
        <div>
            <canvas id="AsistenciaXTaller"></canvas>
        </div>
    </div>
</div>
<div class="row pb-5">
</div>
@endsection

@section('js')
<script src="{{ asset('js/admin/chart.js') }}"></script>
<script>
    function generarColorPastel() {
        // Hue: 0-360 (color en el espectro)
        const hue = Math.floor(Math.random() * 360);
        // Saturación baja (20-50%) y luminosidad alta (70-90%) para tonos pastel
        const pastelColor = `hsl(${hue}, ${Math.floor(Math.random() * 30) + 20}%, ${Math.floor(Math.random() * 20) + 70}%)`;
        return pastelColor;
    }

    const ctx = document.getElementById('AlumnosXTalleres');
    let data = {
        labels: [
            @foreach($taller_alumnos as $taller)
            '{{ $taller->nombre_taller }}',
            @endforeach
        ],
        datasets: [{
            label: '# de Estudiantes por Taller',
            data: [
                @foreach($taller_alumnos as $taller)
                '{{ $taller->total_inscritos }}',
                @endforeach
            ],
            backgroundColor: [
                @foreach($taller_alumnos as $taller)
                generarColorPastel(),
                @endforeach
            ],
            borderWidth: 1,
        }]
    }

    new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<script>
    const ctx2 = document.getElementById('AsistenciaXTaller');
    data = {
        labels: [
            @foreach($asistencias as $asistencia)
            '{{ $asistencia->nombre_taller }}',
            @endforeach
        ],
        datasets: [{
            label: 'Total de asistencias',
            data: [
                @foreach($asistencias as $asistencia)
                '{{ $asistencia->total_asistencias }}',
                @endforeach
            ],
            backgroundColor: [
                @foreach($asistencias as $asistencia)
                generarColorPastel(),
                @endforeach
            ],
            hoverOffset: 4
        }]
    };

    new Chart(ctx2, {
        type: 'doughnut',
        data: data,
    });
</script>
@endsection
@extends('layout.layoutPlataforma')
@section('content')

<div class="row">
  @foreach($talleres as $taller)
    <div class="col s12 m12">
      <h2 class="header">{{ $taller->nombre_taller }}</h2>
    </div>
    @foreach($avisos as $aviso)
      @if($taller->id == $aviso->taller_id)
        <div class="col s12 m6">
          <div class="card horizontal">
            <div class="card-image">
              @if($aviso->imagen)
              <img src="{{ asset('img/imagenes/'.$aviso->imagen) }}" alt="💬">
              @else
              <h1>💬</h1>
              @endif
            </div>
            <div class="card-stacked">
              <div class="card-content">
                <h5>{{ $aviso->titulo }}</h5>
                <p>{{ $aviso->descripcion }}</p>
              </div>
              <div class="card-action">
                <div class="chip">
                  {{ $aviso->name .' '. $aviso->app .' '. $aviso->apm }}
                </div>
                <div class="chip">
                  {{ $aviso->created_at->format('d M Y') }}
                </div>
              </div>
            </div>
          </div>
        </div>
      @endif
    @endforeach
  @endforeach
</div>



@endsection
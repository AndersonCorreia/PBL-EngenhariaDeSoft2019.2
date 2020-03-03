@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Check-in de visitas')

@section('conteudo')
<div class="scorpius-border">
    @if(session('tipo') == "estagiario")
    @yield('checkinEstagiario')
    @else
    @yield('checkinFuncionario')
    @endif
</div>
@endsection
@section('js')
<script>
    $('form[name="checkinAluno"]').submit(function(e){
        e.preventDefault();
    });
    $('form[name="checkinVisitante"]').submit(function(e){
        e.preventDefault();
    });
</script>
@endsection
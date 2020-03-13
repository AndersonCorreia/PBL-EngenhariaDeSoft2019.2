@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Check-in de visitas')

@section('conteudo')
{{csrf_field()}}
<meta name="csrf-token" content="{{csrf_token()}}">
<div class="scorpius-border">
    @if(session('tipo') == "estagiario")
    @yield('checkinEstagiario')
    @else
    @yield('checkinFuncionario')
    @endif
</div>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>
<script>
$(function() {
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    $('form[name=checkinAluno]').submit(function (e) {
        e.preventDefault();
        var btn = document.getElementById(e.originalEvent.target.elements[2].id);
        if(btn.attributes['aria-pressed'].value == 'false'){
        $.ajax({
            url: "{{ route('checkinAluno') }}",
            method: "post",
            data: {
                ID: e.originalEvent.target.elements[1].value,
                status: 'não compareceu'
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
            },
            error: function(data) {
                console.log(data);
            }
        });
            $(btn).removeClass('btn-outline-success');
            $(btn).addClass('btn-outline-secondary');
        }else{
            $.ajax({
                url: "{{ route('checkinAluno') }}",
                method: "post",
                data: {
                    ID: e.originalEvent.target.elements[1].value,
                    status: 'compareceu'
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                },
                error: function(data) {
                    console.log(data);
                }
            });
            $(btn).removeClass('btn-outline-secondary');
            $(btn).addClass('btn-outline-success');
        }
        
    });
    $('form[name="checkinVisitante"]').submit(function(e){
        e.preventDefault();
        var btn = document.getElementById(e.originalEvent.target.elements[2].id);
        if(btn.attributes['aria-pressed'].value == 'false'){
        $.ajax({
            url: "{{ route('checkinUsuario') }}",
            method: "post",
            data: {
                ID: e.originalEvent.target.elements[1].value,
                status: 'não compareceu'
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
            },
            error: function(data) {
                console.log(data);
            }
        });
            $(btn).removeClass('btn-outline-success');
            $(btn).addClass('btn-outline-secondary');
        }else{
            $.ajax({
                url: "{{ route('checkinUsuario') }}",
                method: "post",
                data: {
                    ID: e.originalEvent.target.elements[1].value,
                    status: 'compareceu'
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                },
                error: function(data) {
                    console.log(data);
                }
            });
            $(btn).removeClass('btn-outline-secondary');
            $(btn).addClass('btn-outline-success');
        }
        
    });
});
</script>
@endsection
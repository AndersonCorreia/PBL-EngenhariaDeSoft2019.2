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
    $('[presente]').click(e => {
        e.preventDefault();

        $.ajax({
            url: "{{ route('checkinAluno') }}",
            method: "post",
            data: {
                ID: $(this).children('input').val(),
                status: "compareceu"
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
            },
            error: function(data) {
                console.log(data);
            }
        });
        // $.post({{route('checkinAluno')}}, alert('succ'), JSON);
    });
});
    // $('form[name="checkinAluno"]').submit(function(e){
    //     e.preventDefault();
    //     $.ajax({
    //         type: "POST",
    //         url: {{route("checkinAluno")}},
    //         data: [
    //             'ID': $(this).children('input').val(),
    //             'status': "compareceu"
    //         ],
    //         dataType: "dataType",
    //         success: function (response) {
                
    //         }
    //     });        
    // });
    $('form[name="checkinVisitante"]').submit(function(e){
        e.preventDefault();
    });
</script>
@endsection
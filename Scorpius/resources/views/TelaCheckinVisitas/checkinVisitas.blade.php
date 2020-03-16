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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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
                $(btn).removeClass('btn-outline-success');
                $(btn).addClass('btn-outline-secondary');
            },
            error: function(data) {
                console.log(data);
            }
        });
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
                    $(btn).removeClass('btn-outline-secondary');
                    $(btn).addClass('btn-outline-success');
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }
        
    });
    $('form[name=concluirVisita]').submit(function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Tem certeza que deseja concluir a visita?',
            text: "Ao concluir a visita o status dela passará a ser REALIZADA, e desaparecerá desta tela!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#FFC107',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, conlcuir visita!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                url: "{{ route('concluirVisita') }}",
                method: "post",
                data: {
                    ID: e.originalEvent.target.elements[1].value,
                    status: 'realizada'
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    
                    Swal.fire({
                        title: 'Visita concluida!',
                        text: "A visita foi concluida com sucesso.",
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#28A745',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ok!'
                    }).then((result) => {
                        if (result.value) {
                            location.reload();
                        }
                        location.reload();
                    });
                },
                error: function(data) {
                    console.log(data);
                    Swal.fire(
                        'Erro ao concluir visita!',
                        'Não foi possível alterar o status da visita para concluída.',
                        'error'
                    );
                }
            });  
            }
        })
        
    });
});
</script>
@endsection
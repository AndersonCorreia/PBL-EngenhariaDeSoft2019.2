@extends('layouts.templateGeralTelasUsuarios')

@section('title', 'Gerencimanto De Eventos')

@section('conteudo')

    <body>
        <div class = "row col-12">
            <div class = "container-fluid bg-white p-4" style = "border-bottom-right-radius: 20px; 
            border-bottom-left-radius: 20px; border-top-right-radius: 20px; border-top-left-radius: 20px">
                <div class = "col-10 m-0 p-0">
                    <div class = "container-fluid bg-white shadow p-3" style = "border-bottom-right-radius: 20px; 
                    border-bottom-left-radius: 20px; border-top-right-radius: 20px; border-top-left-radius: 20px; float: middle">
                        <div class = "card"><!--caixa da lista de atividades-->
                            <div class = "card-header text-white bg-primary">
                                <h4 class = "card-title">Lista de Atividades</h4>
                            </div>
                            <div class = "card-body" style = "max-height: 200px; overflow-y: auto;">
                                <!--aqui dentro vão ficar as informações das atividades com botões de editar e excluir atividade ao lado-->
                            </div>
                            <div class = "card-footer bg-transparetn border-0">
                                <button type = "button" class = "btn btn-success">CADASTRAR NOVO ATIVIDADE</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

@endsection

<!-- 
    Esse será o template das telas de login (sign in e sign up), 
    visto que acerca de layout, serão a mesma coisa. Então reaproveitamos o layout. 
-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
<!-- Aqui ficara as coisas que ficam ao lado esquerdo das telas de login, que no caso, 
é aquela imagem do background -->
<div id="lado_esquerdo">
<img id="img-esquerda" src="" alt="">
</div>

<!-- Aqui ficara as coisas que ficam ao lado direito das telas de login, como os campos
os botões, etc.. -->
<div id="lado_direito">
<img id="nome-scorpius" src="" alt="">
@yield('conteudo')
</div>

</body>
</html>
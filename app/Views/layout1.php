
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d5c56409b7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/layout1.css">
    <title>BestMovies</title>
</head>

<body>
    <header>
        <div class="center">
            <div class="box-left-nav">
                <div class="logo">
                    <a href="/home">
                        <img src="/images/logo-bestmovies.png" alt="logo bestmovies">
                    </a>
                </div>
                <form action="#">
                    <input type="search" name="pesquisa" placeholder="Buscar filmes . . .">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <nav>
                <ul>

                    <?php if (isset($_SESSION) && !empty($_SESSION['userID']) && !empty($_SESSION['username'])):  ?>
                        <li class="userNavigation <?php if($this->view->page == 'home/index')echo'active'?>"><a href="/home">Home</a></li>
                        <li class="userNavigation"><a href="#"><i class="add-film fa-solid fa-photo-film"></i>Adicionar filme</a></li>
                        <li class="userNavigation"><a href="#">Meus filmes</a></li>
                        <li class="userNavigation <?php if($this->view->page == 'user/profile')echo'active'?>"><a class="name" href="/perfil">Olá, <?=$_SESSION['username']?><i class="arrow-down fa-solid fa-angle-down"></i></a></li>

                    <?php else: ?> 
                        <li class="<?php if($this->view->page == 'home/index')echo'active'?>"><a href="/home">Home</a></li>
                        <li class="<?php if($this->view->page == 'home/enter-register')echo'active'?> ER"><a href="/entrar-registrar">Entrar / Registrar</a></li>
                       
                    <?php endif; ?>
                
                </ul>
            </nav>
        </div>
    </header>
    <?php
        $this->getContentView();
        ?>
</body>
</html>
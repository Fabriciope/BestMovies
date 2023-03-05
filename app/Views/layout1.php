
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d5c56409b7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/home/layout1.css">
    <title>BestMovies</title>
</head>

<body>
    <header>
        <div class="container-nav-top">
            <div class="center-nav-top">
            
                <div class="logo">
                    <a href="/home">
                        <img src="/images/logo-bestmovies.png" alt="logo bestmovies">
                    </a>
                </div>
                <form action="#">
                    <input type="search" name="pesquisa" placeholder="Buscar filmes . . .">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                
                    <i class="menu fa-solid fa-bars-staggered"></i>
               
            </div>
        </div>
        <div class="container-nav-bottom">
            <div class="center-nav-bottom">
                <nav>
                    <ul>

                        <?php if (isset($_SESSION) && !empty($_SESSION['userID']) && !empty($_SESSION['username'])):  ?>
                            <li class="userNavigation <?php if($this->view->page == 'user/profile')echo'active'?>"><a class="name" href="/profile"><i class="arrow-down fa-solid fa-angle-down"></i>Olá, <?=$_SESSION['username']?></a></li>
                            <li class="userNavigation"><a href="#">Meus filmes</a></li>
                            <li class="userNavigation"><a href="/page-register-movie">Adicionar filme<i class="add-film fa-solid fa-photo-film"></i></a></li>
                            <li class="userNavigation <?php if($this->view->page == 'home/index')echo'active'?>"><a href="/about-us">Sobre nós</a></li>
                            <li class="userNavigation <?php if($this->view->page == 'home/index')echo'active'?>"><a href="/home">Home</a></li>

                        <?php else: ?> 
                            <li class="<?php if($this->view->page == 'home/enter-register')echo'active'?> ER"><a href="/enter-register">Entrar / Registrar</a></li>
                            <li class="<?php if($this->view->page == 'home/about-us')echo'active'?>"><a href="/about-us">Sobre nós</a></li>
                            <li class="<?php if($this->view->page == 'home/index')echo'active'?>"><a href="/home">Home</a></li>
                        
                        <?php endif; ?>
                    
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <?php
        $this->getContentView();
        ?>
</body>
</html>
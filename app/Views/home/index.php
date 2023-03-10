<link rel="stylesheet" href="css/home/index.css">
<section class="banners">
  <button class="control left"><i class="fa-solid fa-chevron-left"></i></button>
    <div class="wrapper">
        <div class="container-banners">
            <div class="box-banner">
                <img class="banner" src="images/banners/banner-films-action.png" alt="">
                <div class="box-movie">
                    <div class="container-infos">
                        <h2>Filme de ação com a melhor avaliação:</h2>
                        <div class="box-info">
                            <h4><?=$this->view->bestMovies['action']['title']??'Esta categoria não possui avaliação'?></h4>
                            <span><i class="star fa-solid fa-star"></i><?=$this->view->bestMovies['action']['rating']??''?></span>
                            <div class="box-btns">
                                <a class="avaliar" href="/movie?id=<?=$this->view->bestMovies['action']['id']??''?>&assess">Avaliar</a>
                                <a class="conhecer" href="/movie?id=<?=$this->view->bestMovies['action']['id']??''?>">Conhecer</a>
                            </div>
                        </div>
                    </div>
                    <div class="image">
                        <img src="<?=$this->view->bestMovies['action']['image']??''?>" alt="">
                    </div>
                </div>
            </div>
            <div class="box-banner">
                <img class="banner" src="images/banners/banner-films-adventure.png" alt="">
                <div class="box-movie">
                    <div class="container-infos">
                        <h2>Filme de aventura com a melhor avaliação:</h2>
                        <div class="box-info">
                            <h4><?=$this->view->bestMovies['adventure']['title']??'Esta categoria não possui avaliação'?></h4>
                            <span><i class="star fa-solid fa-star"></i><?=$this->view->bestMovies['adventure']['rating']??''?></span>
                            <div class="box-btns">
                                <a class="avaliar" href="/movie?id=<?=$this->view->bestMovies['adventure']['id']??''?>&assess">Avaliar</a>
                                <a class="conhecer" href="/movie?id=<?=$this->view->bestMovies['adventure']['id']??''?>">Conhecer</a>
                            </div>
                        </div>
                    </div>
                    <div class="image">
                        <img src="<?=$this->view->bestMovies['adventure']['image']??''?>" alt="">
                    </div>
                </div>
            </div>
            <div class="box-banner">
                    <img class="banner" src="images/banners/banner-films-drama.png" alt="">
                <div class="box-movie">
                    <div class="container-infos">
                        <h2>Filme de drama com a melhor avaliação:</h2>
                        <div class="box-info">
                            <h4><?=$this->view->bestMovies['drama']['title']??'Esta categoria não possui avaliação'?></h4>
                            <span><i class="star fa-solid fa-star"></i><?=$this->view->bestMovies['drama']['rating']??''?></span>
                            <div class="box-btns">
                                <a class="avaliar" href="/movie?id=<?=$this->view->bestMovies['drama']['id']??''?>&assess">Avaliar</a>
                                <a class="conhecer" href="/movie?id=<?=$this->view->bestMovies['drama']['id']??''?>">Conhecer</a>
                            </div>
                        </div>
                    </div>
                    <div class="image">
                        <img src="<?=$this->view->bestMovies['drama']['image']??''?>" alt="">
                    </div>
                </div>
            </div>
            <div class="box-banner">
                <img class="banner" src="images/banners/banner-films-fantasy.png" alt="">
                <div class="box-movie">
                    <div class="container-infos">
                        <h2>Filme de fantasia com a melhor avaliação:</h2>
                        <div class="box-info">
                            <h4><?=$this->view->bestMovies['fantasy']['title']??'Esta categoria não possui filme avaliado'?></h4>
                            <span><i class="star fa-solid fa-star"></i><?=$this->view->bestMovies['fantasy']['rating']??''?></span>
                            <div class="box-btns">
                                <a class="avaliar" href="/movie?id=<?=$this->view->bestMovies['fantasy']['id']??''?>&assess">Avaliar</a>
                                <a class="conhecer" href="/movie?id=<?=$this->view->bestMovies['fantasy']['id']??''?>">Conhecer</a>
                            </div>
                        </div>
                    </div>
                    <div class="image">
                        <img src="<?=$this->view->bestMovies['fantasy']['image']??''?>" alt="">
                    </div>
                </div>
            </div>
            <div class="box-banner">
                    <img class="banner" src="images/banners/banner-films-science-fiction.png" alt="">
                <div class="box-movie">
                    <div class="container-infos">
                        <h2>Filme de ficção científica com a melhor avaliação:</h2>
                        <div class="box-info">
                            <h4><?=$this->view->bestMovies['scienceFiction']['title']??'Esta categoria não possui filme avaliado'?></h4>
                            <span><i class="star fa-solid fa-star"></i><?=$this->view->bestMovies['scienceFiction']['rating']??''?></span>
                            <div class="box-btns">
                                <a class="avaliar" href="/movie?id=<?=$this->view->bestMovies['scienceFiction']['id']??''?>&assess">Avaliar</a>
                                <a class="conhecer" href="/movie?id=<?=$this->view->bestMovies['scienceFiction']['id']??''?>">Conhecer</a>
                            </div>
                        </div>
                    </div>
                    <div class="image">
                        <img src="<?=$this->view->bestMovies['scienceFiction']['image']??''?>" alt="">
                    </div>
                </div>
            </div>
            <div class="box-banner">
                    <img class="banner" src="images/banners/banner-films-action.png" alt="">
                <div class="box-movie">
                    <div class="container-infos">
                        <h2>Filme de romance com a melhor avaliação:</h2>
                        <div class="box-info">
                            <h4><?=$this->view->bestMovies['romance']['title']??'Esta categoria não possui filme avaliado'?></h4>
                            <span><i class="star fa-solid fa-star"></i><?=$this->view->bestMovies['romance']['rating']??''?></span>
                            <div class="box-btns">
                                <a class="avaliar" href="/movie?id=<?=$this->view->bestMovies['romance']['id']??''?>&assess">Avaliar</a>
                                <a class="conhecer" href="/movie?id=<?=$this->view->bestMovies['romance']['id']??''?>">Conhecer</a>
                            </div>
                        </div>
                    </div>
                    <div class="image">
                        <img src="<?=$this->view->bestMovies['romance']['image']??''?>" alt="">
                    </div>
                </div>
            </div>
            <div class="box-banner">
                    <img class="banner" src="images/banners/banner-films-action.png" alt="">
                <div class="box-movie">
                    <div class="container-infos">
                        <h2>Filme de terror com a melhor avaliação:</h2>
                        <div class="box-info">
                            <h4><?=$this->view->bestMovies['horror']['title']??'Esta categoria não possui filme avaliado'?></h4>
                            <span><i class="star fa-solid fa-star"></i><?=$this->view->bestMovies['romance']['rating']??''?></span>
                            <div class="box-btns">
                                <a class="avaliar" href="/movie?id=<?=$this->view->bestMovies['horror']['id']??''?>&assess">Avaliar</a>
                                <a class="conhecer" href="/movie?id=<?=$this->view->bestMovies['horror']['id']??''?>">Conhecer</a>
                            </div>
                        </div>
                    </div>
                    <div class="image">
                        <img src="<?=$this->view->bestMovies['horror']['image']??''?>" alt="">
                    </div>
                </div>
            </div>
            <div class="box-banner">
                    <img class="banner" src="images/banners/banner-films-action.png" alt="">
                <div class="box-movie">
                    <div class="container-infos">
                        <h2>Filme de suspense com a melhor avaliação:</h2>
                        <div class="box-info">
                            <h4><?=$this->view->bestMovies['thriller']['title']??'Esta categoria não possui filme avaliado'?></h4>
                            <span><i class="star fa-solid fa-star"></i><?=$this->view->bestMovies['romance']['rating']??''?></span>
                            <div class="box-btns">
                                <a class="avaliar" href="/movie?id=<?=$this->view->bestMovies['thriller']['id']??''?>&assess">Avaliar</a>
                                <a class="conhecer" href="/movie?id=<?=$this->view->bestMovies['thriller']['id']??''?>">Conhecer</a>
                            </div>
                        </div>
                    </div>
                    <div class="image">
                        <img src="<?=$this->view->bestMovies['thriller']['image']??''?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="control right"><i class="fa-solid fa-chevron-right"></i></button>
</section>






<main>
    <section class="filmes">
        <div class="container">
            <div class="container-text-section">
                <h3>Filmes novos</h3>
                <p>Veja os novos filmes adicionadas em nossa plataforma</p>
            </div>
            <div class="container-wrapper">
                <div class="wrapper">
                    <button class="controlMovies left recent"><i class="fa-solid fa-chevron-left"></i></button>
                    <div class="container-films recent">
                        <?php foreach ($this->view->allMovies['recentMovies'] ?? [] as $movie) :
                            extract($movie) ?>
                            <div class="box-film recent" style="background-image: url(<?= $image ?>)">
                                <div class="content">
                                    <div class="center">
                                        <div>
                                            <span><i class="star fa-solid fa-star"></i><?=$rating?></span>
                                        </div>
                                        <h4><?= $title ?></h4>
                                        <a class="avaliar" href="/movie?id=<?=$id?>&assess">Avaliar</a>
                                        <a class="conhecer" href="/movie?id=<?=$id?>">Conhecer</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="controlMovies right recent"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </section>
    <section class="filmes">
        <div class="container">
            <div class="container-text-section">
                <h3>Filmes de ação</h3>
                <p>Veja últimos filmes de ação adicionados</p>
            </div>
            <div class="container-wrapper">
                <div class="wrapper">
                    <button class="controlMovies left action"><i class="fa-solid fa-chevron-left"></i></button>
                    <div class="container-films action">
                        <?php foreach ($this->view->allMovies['actionMovies'] ?? [] as $movie) :
                            extract($movie) ?>
                            <div class="box-film action" style="background-image: url(<?= $image ?>)">
                                <div class="content">
                                    <div class="center">
                                        <div>
                                            <span><i class="star fa-solid fa-star"></i><?=$rating?></span>
                                        </div>
                                        <h4><?= $title ?></h4>
                                        <a class="avaliar" href="/movie?id=<?=$id?>&assess">Avaliar</a>
                                        <a class="conhecer" href="/movie?id=<?=$id?>">Conhecer</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="controlMovies right action"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </section>
    <section class="filmes">
        <div class="container">
            <div class="container-text-section">
                <h3>Filmes de aventura</h3>
                <p>Veja últimos filmes de aventura adicionados</p>
            </div>
            <div class="container-wrapper">
                <div class="wrapper">
                    <button class="controlMovies left adventure"><i class="fa-solid fa-chevron-left"></i></button>
                    <div class="container-films adventure">
                        <?php foreach ($this->view->allMovies['adventureMovies'] ?? [] as $movie) :
                            extract($movie) ?>
                            <div class="box-film adventure" style="background-image: url(<?= $image ?>)">
                                <div class="content">
                                    <div class="center">
                                        <div>
                                            <span><i class="star fa-solid fa-star"></i><?=$rating?></span>
                                        </div>
                                        <h4><?= $title ?></h4>
                                        <a class="avaliar" href="/movie?id=<?=$id?>&assess">Avaliar</a>
                                        <a class="conhecer" href="/movie?id=<?=$id?>">Conhecer</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="controlMovies right adventure"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </section>
    <section class="filmes">
        <div class="container">
            <div class="container-text-section">
                <h3>Filmes de drama</h3>
                <p>Veja últimos filmes de drama adicionados</p>
            </div>
            <div class="container-wrapper">
                <div class="wrapper">
                    <button class="controlMovies left drama"><i class="fa-solid fa-chevron-left"></i></button>
                    <div class="container-films drama">
                        <?php foreach ($this->view->allMovies['dramaMovies'] ?? [] as $movie) :
                            extract($movie) ?>
                            <div class="box-film drama" style="background-image: url(<?= $image ?>)">
                                <div class="content">
                                    <div class="center">
                                        <div>
                                            <span><i class="star fa-solid fa-star"></i><?=$rating?></span>
                                        </div>
                                        <h4><?= $title ?></h4>
                                        <a class="avaliar" href="/movie?id=<?=$id?>&assess">Avaliar</a>
                                        <a class="conhecer" href="/movie?id=<?=$id?>">Conhecer</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="controlMovies right drama"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </section>
    <section class="filmes">
        <div class="container">
            <div class="container-text-section">
                <h3>Filmes de fantasia</h3>
                <p>Veja últimos filmes de fantasia adicionados</p>
            </div>
            <div class="container-wrapper">
                <div class="wrapper">
                    <button class="controlMovies left fantasy"><i class="fa-solid fa-chevron-left"></i></button>
                    <div class="container-films fantasy">
                        <?php foreach ($this->view->allMovies['fantasyMovies'] ?? [] as $movie) :
                            extract($movie) ?>
                            <div class="box-film fantasy" style="background-image: url(<?= $image ?>)">
                                <div class="content">
                                    <div class="center">
                                        <div>
                                            <span><i class="star fa-solid fa-star"></i><?=$rating?></span>
                                        </div>
                                        <h4><?= $title ?></h4>
                                        <a class="avaliar" href="/movie?id=<?=$id?>&assess">Avaliar</a>
                                        <a class="conhecer" href="/movie?id=<?=$id?>">Conhecer</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="controlMovies right fantasy"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </section>
    <section class="filmes">
        <div class="container">
            <div class="container-text-section">
                <h3>Filmes de ficção científica</h3>
                <p>Veja últimos filmes de ficção científica adicionados</p>
            </div>
            <div class="container-wrapper">
                <div class="wrapper">
                    <button class="controlMovies left scienceFiction"><i class="fa-solid fa-chevron-left"></i></button>
                    <div class="container-films scienceFiction">
                        <?php foreach ($this->view->allMovies['scienceFictionMovies'] ?? [] as $movie) :
                            extract($movie) ?>
                            <div class="box-film scienceFiction" style="background-image: url(<?= $image ?>)">
                                <div class="content">
                                    <div class="center">
                                        <div>
                                            <span><i class="star fa-solid fa-star"></i><?=$rating?></span>
                                        </div>
                                        <h4><?= $title ?></h4>
                                        <a class="avaliar" href="/movie?id=<?=$id?>&assess">Avaliar</a>
                                        <a class="conhecer" href="/movie?id=<?=$id?>">Conhecer</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="controlMovies right scienceFiction"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </section>
    <section class="filmes">
        <div class="container">
            <div class="container-text-section">
                <h3>Filmes de romance</h3>
                <p>Veja últimos filmes de romance adicionados</p>
            </div>
            <div class="container-wrapper">
                <div class="wrapper">
                    <button class="controlMovies left romance"><i class="fa-solid fa-chevron-left"></i></button>
                    <div class="container-films romance">
                        <?php foreach ($this->view->allMovies['romanceMovies'] ?? [] as $movie) :
                            extract($movie) ?>
                            <div class="box-film romance" style="background-image: url(<?= $image ?>)">
                                <div class="content">
                                    <div class="center">
                                        <div>
                                            <span><i class="star fa-solid fa-star"></i><?=$rating?></span>
                                        </div>
                                        <h4><?= $title ?></h4>
                                        <a class="avaliar" href="/movie?id=<?=$id?>&assess">Avaliar</a>
                                        <a class="conhecer" href="/movie?id=<?=$id?>">Conhecer</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="controlMovies right romance"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </section>
    <section class="filmes">
        <div class="container">
            <div class="container-text-section">
                <h3>Filmes de terror</h3>
                <p>Veja últimos filmes de terror adicionados</p>
            </div>
            <div class="container-wrapper">
                <div class="wrapper">
                    <button class="controlMovies left horror"><i class="fa-solid fa-chevron-left"></i></button>
                    <div class="container-films horror">
                        <?php foreach ($this->view->allMovies['horrorMovies'] ?? [] as $movie) :
                            extract($movie) ?>
                            <div class="box-film horror" style="background-image: url(<?= $image ?>)">
                                <div class="content">
                                    <div class="center">
                                        <div>
                                            <span><i class="star fa-solid fa-star"></i><?=$rating?></span>
                                        </div>
                                        <h4><?= $title ?></h4>
                                        <a class="avaliar" href="/movie?id=<?=$id?>&assess">Avaliar</a>
                                        <a class="conhecer" href="/movie?id=<?=$id?>">Conhecer</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="controlMovies right horror"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </section>
    <section class="filmes">
        <div class="container">
            <div class="container-text-section">
                <h3>Filmes de suspense</h3>
                <p>Veja últimos filmes de suspense adicionados</p>
            </div>
            <div class="container-wrapper">
                <div class="wrapper">
                    <button class="controlMovies left thriller"><i class="fa-solid fa-chevron-left"></i></button>
                    <div class="container-films thriller">
                        <?php foreach ($this->view->allMovies['thrillersMovies'] ?? [] as $movie) :
                            extract($movie) ?>
                            <div class="box-film thriller" style="background-image: url(<?= $image ?>)">
                                <div class="content">
                                    <div class="center">
                                        <div>
                                            <span><i class="star fa-solid fa-star"></i><?=$rating?></span>
                                        </div>
                                        <h4><?= $title ?></h4>
                                        <a class="avaliar" href="/movie?id=<?=$id?>&assess">Avaliar</a>
                                        <a class="conhecer" href="/movie?id=<?=$id?>">Conhecer</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="controlMovies right thriller"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </section>
</main>
<script src="js/slides.js"></script>
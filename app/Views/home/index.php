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
                <img class="banner" src="images/banners/banner-films-action.png" alt="">
                <div class="box-movie">
                    <div class="container-infos">
                        <h2>Filme de ação com a melhor avaliação:</h2>
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
                    <img class="banner" src="images/banners/banner-films-action.png" alt="">
                <div class="box-movie">
                    <div class="container-infos">
                        <h2>Filme de ação com a melhor avaliação:</h2>
                        <div class="box-info">
                            <h4><?=$this->view->bestMovies['drama']['title']??'Esta categoria não possui avaliação'?></h4>
                            <span><i class="star fa-solid fa-star"></i><?=$this->view->bestMovies['drama']['rating']?></span>
                            <div class="box-btns">
                                <a class="avaliar" href="/movie?id=<?=$this->view->bestMovies['drama']['id']??''?>&assess">Avaliar</a>
                                <a class="conhecer" href="/movie?id=<?=$this->view->bestMovies['drama']['id']??''?>">Conhecer</a>
                            </div>
                        </div>
                    </div>
                    <div class="image">
                        <img src="<?=$this->view->bestMovies['drama']['image']?>" alt="">
                    </div>
                </div>
            </div>
            <div class="box-banner">
                    <img class="banner" src="images/banners/banner-films-action.png" alt="">
                <div class="box-movie">
                    <div class="container-infos">
                        <h2>Filme de ação com a melhor avaliação:</h2>
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
                    <img class="banner" src="images/banners/banner-films-action.png" alt="">
                <div class="box-movie">
                    <div class="container-infos">
                        <h2>Filme de ação com a melhor avaliação:</h2>
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
                        <h2>Filme de ação com a melhor avaliação:</h2>
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
                        <h2>Filme de ação com a melhor avaliação:</h2>
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
                        <h2>Filme de ação com a melhor avaliação:</h2>
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
                    <button onclick="prev('recent')"  class="left"><i class="fa-solid fa-chevron-left"></i></button>
                    <div class="container-films recent">
                        <?php foreach ($this->view->allMovies['recentMovies'] as $movie) :
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
                    <button onclick="next('recent')" class="right"><i class="fa-solid fa-chevron-right"></i></button>
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
                    <button onclick="prev('action')"  class="left control-left-films"><i class="fa-solid fa-chevron-left"></i></button>
                    <div class="container-films action">
                        <?php foreach ($this->view->allMovies['actionMovies'] as $movie) :
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
                    <button onclick="next('action')"  class="right control-right-films"><i class="fa-solid fa-chevron-right"></i></button>
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
                    <button onclick="prev('adventure')"  class="left control-left-films"><i class="fa-solid fa-chevron-left"></i></button>
                    <div class="container-films adventure">
                        <?php foreach ($this->view->allMovies['adventureMovies'] as $movie) :
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
                    <button onclick="next('adventure')"  class="right control-right-films"><i class="fa-solid fa-chevron-right"></i></button>
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
                    <button onclick="prev('drama')"  class="left control-left-films"><i class="fa-solid fa-chevron-left"></i></button>
                    <div class="container-films drama">
                        <?php foreach ($this->view->allMovies['dramaMovies'] as $movie) :
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
                    <button onclick="next('drama')"  class="right control-right-films"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </section>

</main>
<script src="js/slides.js"></script>
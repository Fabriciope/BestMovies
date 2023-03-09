<link rel="stylesheet" href="css/home/index.css">
<section class="banners-wrap">
    <button class="control left"><i class="fa-solid fa-chevron-left"></i></button>
    <div class="container-banners">
        <div class="box-banner">
          <img src="images/banners/banner-films-action.png" alt="">
          <div class="box-movie"></div>
        </div>
        <div class="box-banner">
          <img src="images/banners/banner-films-action.png" alt="">
          <div class="box-movie"></div>
        </div>
        <div class="box-banner">
          <img src="images/banners/banner-films-action.png" alt="">
          <div class="box-movie"></div>
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
                <p>Veja últimos filmes de ação adidionados</p>
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

</main>
<script src="js/slides.js"></script>
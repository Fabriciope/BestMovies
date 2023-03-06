
<link rel="stylesheet" href="css/home/index.css">
<section class="banners">
    <div class="banner" >
     <img src="images/banners/banner-films-action.png" alt="">
    </div>
</section>

<main>
    <section class="filmes top">
        <div class="container">
            <div class="container-text-section">
                <h3>Filmes novos</h3>
                <p>Veja os novos filmes adicionadas em nossa plataforma</p>
            </div>
            <div class="container-wrapper">
                <div class="wrapper">
                    <button class="left control-left-films"><i class="fa-solid fa-chevron-left"></i></button>
                    <div class="container-films">
                        <?php foreach($this->view->recentMovies as $movie ): 
                        extract($movie)?>
                             <div class="box-film" style="background-image: url(<?=$image?>);">
                            <div class="content">
                                <div class="center">
                                    <div><img src="images/estrela.png" alt=""><span>6.7</span></div>
                                    <h4><?=$title?></h4>
                                    <a class="avaliar" href="">Avaliar</a>
                                    <a class="conhecer" href="">Conhecer</a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="right control-right-films"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </section>
    
</main>
<script src="js/slides.js"></script>
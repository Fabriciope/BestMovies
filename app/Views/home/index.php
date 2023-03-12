<link rel="stylesheet" href="css/home/index.css">
<section class="banners">
  <button class="control left"><i class="fa-solid fa-chevron-left"></i></button>
    <div class="wrapper">
        <div class="container-banners">
            <?php foreach ($this->view->bestMovies as $category => $movie):?>
            <div class="box-banner">
                <img class="banner" src="<?=$movie['imageBanner']?>" alt="">
                <div class="box-movie">
                    <div class="container-infos">
                        <h2>Filme de <?=$category?> com a melhor avaliação:</h2>
                        <div class="box-info">
                            <h4><?=$movie['title']?></h4>
                            <span><i class="star fa-solid fa-star"></i><?=$movie['rating']?></span>
                            <div class="box-btns">
                                <a class="avaliar" href="/movie?id=<?=$movie['id']?>&assess">Avaliar</a>
                                <a class="conhecer" href="/movie?id=<?=$movie['id']?>">Conhecer</a>
                            </div>
                        </div>
                    </div>
                    <div class="image">
                        <img src="<?=$movie['image']?>" alt="">
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <button class="control right"><i class="fa-solid fa-chevron-right"></i></button>
</section>

<main>
    <?php foreach ($this->view->allMovies ?? [] as $key => $category): ?>
            <section class="filmes">
                <div class="container">
                    <div class="container-text-section">
                        <h3><?=$key==='novos'?'Filmes '.$key:'Filmes de '.$key?></h3>
                        <p>Veja últimos filmes de <?=$key?> adicionados</p>
                    </div>
                    <div class="container-wrapper">
                        <div class="wrapper">
                            <button class="controlMovies left <?=$key?>"><i class="fa-solid fa-chevron-left"></i></button>
                            <div class="container-films <?=$key?>">
                        <?php foreach ($category ?? [] as $movie): extract($movie);?>
                                <div class="box-film <?=$key?>" style="background-image: url(<?= $image ?>)">
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
                           <button class="controlMovies right <?=$key?>"><i class="fa-solid fa-chevron-right"></i></button>
                        </div>
                    </div>
                </div>
            </section>
    <?php endforeach; ?>
</main>
<script src="js/slides.js"></script>
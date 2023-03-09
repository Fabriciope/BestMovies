<link rel="stylesheet" href="css/movie/search.css">

<main>
    <section class="found-movies">
        <h2>Você está buscando por: <?=$this->view->search?></h2>
        <p>Resultados da dua busca de acordo com a sua pesquisa</p>
        <div class="container-found-movies">
            <?php if (empty($this->view->notFound)):
                    foreach ($this->view->foundMovies as $movie) :
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
            <?php endforeach;else: ?>
                <p class="not-found"><?=$this->view->notFound??''?><a class="back" href="/home">voltar para home.</a></p>
            <?php endif; ?>
        </div>
    </section>
</main>
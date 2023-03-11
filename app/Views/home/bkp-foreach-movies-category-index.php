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
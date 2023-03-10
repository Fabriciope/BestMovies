<link rel="stylesheet" href="css/user/profile-user.css">
<main>
    <section class="profile">
        <div class="name">
            <h2><?=$this->view->userData['name'].' '.$this->view->userData['lastname']?></h2>
        </div>
        <div class="image">
            <img src="<?=$this->view->userData['image']??'images/users/perfil.png'?>" alt="">
        </div>
        <div class="about">
            <h4>Sobre o <?=$this->view->userData['name']?>:</h4>
            <p><?=$this->view->userData['bio']??'Este usuário não possui uma biográfia'?></p>
        </div>
    </section>
    <section class="user-movies">
        <h3>Filmes registrados:</h3>
        <div class="container-movies">
            <?php if (!empty($this->view->userMovies)): 
                    foreach ($this->view->userMovies as $movie):
                      extract($movie)?>
                        <div class="box-film" style="background-image: url(<?=$image?>)">
                            <div class="content">
                                <div class="center">
                                    <div>
                                        <img src="images/estrela.png" alt=""><span><?=$rating?></span>
                                    </div>
                                    <h4><?= $title ?></h4>
                                    <a class="avaliar" href="/movie?id=<?=$id?>&assess">Avaliar</a>
                                    <a class="conhecer" href="/movie?id=<?=$id?>">Conhecer</a>
                                </div>
                            </div>
                        </div>
                    <?php  endforeach;?>
            <?php else: ?>
                <p>Este usuário não possui nenhum filme registrado.</p>
            <?php endif;?>


        </div>
    </section>
</main>
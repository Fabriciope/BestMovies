<link rel="stylesheet" href="css/movie/movie.css">

<main>
    <section class="info-movie">
        <div class="info">
            <div class="info-top">
                <div class="title">
                   <h2><?=$this->view->movieData['title']?></h2>
                </div>
                <div class="infos">
                    <div>
                        <h5>Duração: </h5><span><?=$this->view->movieData['length']?></span>
                    </div>
                    <div>
                        <h5>Gênero: </h5><span><?=$this->view->movieData['category']?></span>
                    </div>
                    <div>
                        <h5>Nota: </h5><span><?=$this->view->movieData['rating'] != 0 ? $this->view->movieData['rating'] : 'Não avaliado'?><i class="star fa-solid fa-star"></i></span>
                    </div>
                </div>
            </div>
            <div class="info-bottom">
                <div class="trailer">
                    <?php if (!empty($this->view->movieData['trailer'])): ?>
                        <iframe src="<?=$this->view->movieData['trailer']?>"></iframe>
                    <?php else: ?>
                        <p>Este filme foi registrado sem trailer</p>
                    <?php endif; ?>
                </div>
                <p><?=$this->view->movieData['description']?></p>
            </div>
        </div>
        <div class="poster">
            <img src="<?=$this->view->movieData['image']?>" alt="">
        </div>
    </section>

    <section class="assessments">

        <h3>Avaliações: </h3>
        <p class="subtitle">Veja o que outras pessoas acharam deste filme.</p>

        <div class="comments">
                <?php if (!empty($this->view->movieReviews)): 
                        foreach ($this->view->movieReviews as $review):
                         extract($review)?>
                            <div class="box-comment">
                                <div class="box-image-name-rating">
                                <div class="profile-image">
                                  <img src="<?=$image??'images/users/perfil.png'?>" alt="">
                                </div>
                                <div class="name-rating">
                                    <a href="/profile-user?id=<?=$id?>">
                                        <p><?=$name.' '.$lastname?></p>
                                    </a>
                                    <div>
                                        <i class="star fa-solid fa-star"></i><span><?=$rating?></span>
                                    </div>
                                </div>
                            </div>
                <div class="box-text-comment">
                    <h5>Comentário: </h5>
                    <p class="review">
                        <?=$review?>
                        <?php if (is_array($this->view->userComment) && $this->view->userComment['username'] === $name): ?>
                            <form action="/delete-review?id=<?=$id_movie?>" method="post">
                                <button class="delete-review" type="submit" name="reviewID" value="<?=$this->view->userComment['id']?>">Deletar comentário</button>
                            </form>
                        <?php endif; ?>
                    </p>
                </div>
            </div>
            <?php  endforeach; else: ?>
                <p class="n">Este filme não possui nenhuma avaliação, seja o primeiro a avaliá-lo.</p>
            <?php endif;?>
        </div>

        <?php if (!$this->view->checkComment && !is_array($this->view->userComment) && isset($_SESSION['userID'])): ?>
            <div class="add-review">
                <h3>Envie sua avaliação</h3>
                <p class="subtitle">Preencha o formulário com a nota e o comentário sobre o filme</p>
                <form action="/register-new-assessments?id=<?=$this->view->movieData['id']?>&assess" method="post">
                    <div>
                        <input type="hidden" name="id_movie" value="<?=$_GET['id']?>">
                        <label for="rating">Nota do filme: </label>
                        <select name="rating" id="rating">
                        <?php if (isset($this->view->evaluationErrorData['inputRating'])): ?>
                                <option selected><?=$this->view->evaluationErrorData['inputRating']?></option>
                            <?php endif; ?>
                            <option>Selecione a nota</option>
                            <option value="10">10</option>
                            <option value="9">9</option>
                            <option value="8">8</option>
                            <option value="7">7</option>
                            <option value="6">6</option>
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                        </select>
                    </div>
                    <div>
                        <label for="comment">Comentário:</label>
                        <textarea name="comment" id="comment" minlength="4" rows="10"><?=$this->view->evaluationErrorData['inputComment']??''?></textarea>
                    </div>
                    <p class="error"><?=$this->view->msgErrorNewAssessment??''?></p>
                    <button type="submit">Enviar avaliação</button>
                </form>
            </div>

        <?php endif;?>
    </section>
</main>
<script src="js/assess.js"></script>
<link rel="stylesheet" href="css/user/register-movie.css">
<link rel="stylesheet" href="css/movie/edit-movie.css">
<main>
    <section class="edit-movie">
        <div class="center">
           <p class="success"><?=$this->view->msgSeccessUpdateMovie??''?></p>
            <form action="/edit-movie?id=<?=$this->view->movieData['id']?>" method="post" enctype="multipart/form-data">
                <div class="box-inputs">
                    <label for="movie-title">Título do filme:</label>
                    <input type="text" name="title" id="movie-title" placeholder="Digite o título do filme" value="<?=$this->view->movieData['title']?>" required>
                </div>
                <div class="box-inputs">
                    <label for="movie-lenght">Duração do filme:</label>
                    <div class="lenght">
                        <div class="hm">
                            <span>Horas: </span> <input type="number" name="hours" id="movie-lenght" max="10" value="<?=intval(substr($this->view->movieData['length'], 0,1))?>">
                        </div>
                        <div class="hm">
                            <span>Minutos: </span> <input type="number" name="minutes" max="60" value="<?=intval(substr($this->view->movieData['length'], 9,11))?>">
                        </div>
                    </div>
                </div>
                <div class="box-inputs">
                    <label for="category">Categoria:</label>
                    <select name="category" id="category" required>
                        <?php if (isset($this->view->movieData['inputCategory']) || isset($this->view->movieData['category'])): ?>
                            <option selected><?=$this->view->movieData['category'] ?? $this->view->movieData['inputCategory']?></option>
                        <?php endif; ?>
                        <option>Selecione uma categoria</option>
                        <option value="Ação">Ação</option>
                        <option value="Aventura">Aventura</option>
                        <option value="Drama">Drama</option>
                        <!-- <option value="Comédia">Comédia</option> -->
                        <option value="Fantasia">Fantasia</option>
                        <option value="Ficção científica">Ficção científica</option>
                        <option value="Romance">Romance</option>
                        <option value="Terror">Terror</option>
                        <option value="Suspense">Suspense</option>
                    </select>
                </div>
                <div class="box-inputs">
                    <label for="trailer">Trailer</label>
                    <p class="tutorial">Veja como copiar o link do youtube para inserir abaixo. <a href="">Como copiar o link embed.</a></p>
                    <input type="text" name="trailer" id="trailer" placeholder="Insira o link embed do youTube" value="<?=$this->view->movieData['trailer']?>">
                </div>
                <div class="box-inputs">
                    <label for="description">Descrição:</label>
                    <textarea name="description" id="description" rows="10" placeholder="Adicione uma descrição a este filme ..." minlength="10" required><?=$this->view->movieData['description']?></textarea>
                </div>
                <div class="box-inputs file">
                    <label for="imageFile">Adicionar banner: </label>
                    <div class="exC">
                        <p>Insira uma imagen com as dimensões parecidas com um cartaz. Ex: </p>
                        <img src="images/exemplo-template-cartaz-filme.png" alt="">
                    </div>
                    <input type="file" name="movieEditFile" id="imageFile">
                    <label for="imageFile" class="movie-file">
                        <span>Procurar</span><span class="text-file"><?=substr($this->view->movieData['image'], 24)?></span>
                    </label>
                </div>
                <p class="error"><?=$this->view->msgErrorEditMovie??''?></p>
                <button type="submit">Editar filme</button>
            </form>
        </div>
        <div class="post">
            <img src="<?=$this->view->movieData['image']?>" alt="">
        </div>
    </section>
</main>
<script src="js/files.js"></script>
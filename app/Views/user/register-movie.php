<link rel="stylesheet" href="css/user/register-movie.css">
<main>
    <div class="center">
        <h2>Adicionar filme</h2>
        <p>Adicione sua crítica e compartilhe para todos!</p>
        <form action="/register-movie" method="post" enctype="multipart/form-data">
                <div class="box-inputs">
                    <label for="movie-title">Título do filme:</label>
                    <input type="text" name="title" id="movie-title" placeholder="Digite o título do filme" value="<?=$this->view->movieData['inputTitle']??''?>" required>
                </div>
                <div class="box-inputs">
                    <label for="movie-lenght">Duração do filme:</label>
                    <div class="lenght">
                        <div class="hm">
                            <span>Horas: </span> <input type="number" name="hours" id="movie-lenght" max="10" value="<?=$this->view->movieData['inputHours']??''?>">
                        </div>
                        <div class="hm">
                            <span>Minutos: </span> <input type="number" name="minutes" max="60" value="<?=$this->view->movieData['inputMinutes']??''?>">
                        </div>
                    </div>
                </div>
                <div class="box-inputs">
                    <label for="category">Categoria:</label>
                    <select name="category" id="category" required>
                        <?php if (isset($this->view->movieData['inputCategory'])): ?>
                            <option selected><?=$this->view->movieData['inputCategory']?></option>
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
                    <input type="text" name="trailer" id="trailer" placeholder="Insira o link embed do youTube" value="<?=$this->view->movieData['inputTrailer']??''?>">
                </div>
                <div class="box-inputs">
                    <label for="description">Descrição:</label>
                    <textarea name="description" id="description" rows="10" placeholder="Adicione uma descrição a este filme ..." minlength="10" required><?=$this->view->movieData['inputDescription']??''?></textarea>
                </div>
                <div class="box-inputs file">
                    <label for="imageFile">Adicionar banner: </label>
                    <div class="exC">
                        <p>Insira uma imagen com as dimensões parecidas com um cartaz. Ex: </p>
                        <img src="images/exemplo-template-cartaz-filme.png" alt="">
                    </div>
                    <input type="file" name="movieFile" id="imageFile">
                    <label for="imageFile" class="movie-file">
                        <span>Procurar</span><span class="text-file">nome do arquivo.png</span>
                    </label>
                </div>
                <p class="error"><?=$this->view->msgErrorRegisterMovie??''?></p>
                <button type="submit">Adicionar filme</button>
        </form>
    </div>
</main>
<script src="js/files.js"></script>
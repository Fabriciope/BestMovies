<link rel="stylesheet" href="css/profile.css">
<main>
    <a href="/logout" class="sair">Sair</a>
    <div class="container-main">
        <section class="left">
            <div class="center">
                <div class="container-profile-image">
                    <div class="profile-image" style="background-image: url(images/users/perfil.png);"></div>
                    <form action="/#" class="box-file">
                       <input type="file" id="image" name="profile-image">
                        <label for="image">
                            <span>Procurar</span><span>nome do arquivo.png</span>
                        </label>
                    </form>
                    <form action="/#" class="box-about-you">
                        <label for="about-you">Sobre você:</label>
                        <textarea name="aboutYou" id="about-you" rows="10" placeholder="Conte-nos mais quem é você, sobre quais filmes ou series gosta e mais..."></textarea>
                    </form>
                </div>
            </div>
        </section>
        <section class="right">
            <div class="center">

                <div class="container-name-lastName">
                    <h2><?=$this->view->userData['name'] . ' ' . $this->view->userData['lastname']?></h3>
                    <p>Altere seus dados no formulário abaixo, caso queira alterar.</p>

                    <form action="/update-name-lastName" method="post">

                        <div class="box-inputs">
                            <label for="name">Nome:</label>
                            <input type="text" name="newName" id="name" value="<?=$this->view->userData['name']?>">
                        </div>

                        <div class="box-inputs">
                            <label for="lastName">Sobrenome:</label>
                            <input type="text" name="newLastName" id="lastName" value="<?=$this->view->userData['lastname']?>">
                        </div>

                        <div class="box-inputs">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" value="<?=$this->view->userData['email']?>" readonly>
                        </div>
                        <p id="update-error"><?=$this->view->msgUpdateError?></p>
                        <p id="update-success"><?=$this->view->msgUpdateSuccess?></p>
                        <button type="submit" >Alterar</button>

                    </form>

                </div>
                <div class="container-password">

                    <h3>Alterar senha:</h3>

                    <p>Digite a nova senha e confirme, caso queira alterar.</p>

                    <form action="/update-password">

                        <div class="box-inputs">

                            <label for="passwordEnter-update">Senha:</label>

                            <div class="password">

                                <input type="password" name="passwordEnter" id="password-enter-update" placeholder="Digite sua nova senha" required>
                                <i class="see enter-update fa-regular fa-eye"></i>
                                <i class="not-see enter-update fa-regular fa-eye-slash"></i>

                            </div>

                        </div>

                        <div class="box-inputs">

                            <label for="password-Register-updateCS">Confirmar senha:</label>

                            <div class="password">

                                <input type="password" name="passwordCS" id="password-register-updateCS" minlength="4" placeholder="Confirme sua senha" required>
                                <i class="see register-updateCS fa-regular fa-eye"></i>
                                <i class="not-see register-updateCS fa-regular fa-eye-slash"></i>

                            </div>

                        </div>
                        <button type="submit">Alterar senha</button>

                    </form>

                </div>
            </div>
        </section>
    </div>
</main>
<script src="js/scripts.js"></script>
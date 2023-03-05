<link rel="stylesheet" href="css/user/profile.css">
<main>
    <a href="/logout" class="sair">Sair</a>
    <div class="container-main">
        <section class="left">
            <div class="center">
            
                <div class="profile-image" style="background-image: url(<?=$this->view->imageDirectoryName?>);">
                    <img id="image" src="<?=$this->view->imageDirectoryName?>" alt="">
                </div>
                <p>Escolha uma imagem com as extensões .jpeg, .jpg ou .png.</p>
                <div class="container-select-image-or-delete">
                    <form action="/update-profile-image" class="box-file" method="post" enctype="multipart/form-data">
                        <input type="file" id="imageFile" name="profile-image">
                        <label for="imageFile">
                            <span>Procurar</span><span><?=$this->view->imageFileName?></span>
                        </label>
                        <button type="submit">Enviar</button>
                    </form>
                    <a class="delete-profile-image" href="/delete-profile-image">Excluir imagem</a>
                </div>
                <p class="error"><?=$this->view->msgUpdateImageError??''?><?=$this->view->msgDeleteProfileImageError??''?></p>
                <p class="success"><?=$this->view->msgUpdateImageSuccess??''?><?=$this->view->msgDeleteProfileImageSuccess??''?></p>
                <form action="/update-about-you" class="box-about-you" method="post">
                    <label for="about-you">Sobre você:</label>
                    <textarea name="aboutYou" id="about-you" rows="10" placeholder="Conte-nos mais quem é você, sobre quais filmes ou series gosta..."><?=$this->view->userData['bio']?></textarea>
                    <p class="error"><?=$this->view->msgUpdateAboutYouError??''?></p>
                    <p class="success"><?=$this->view->msgUpdateAboutYouSuccess??''?></p>
                    <button>Alterar bio</button>
                </form>
               
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
                        <p class="error"><?=$this->view->msgUpdateNameError??''?></p>
                        <p class="success"><?=$this->view->msgUpdateNameSuccess??''?></p>
                        <button type="submit" >Alterar</button>

                    </form>

                </div>
                <div class="container-password">

                    <h3>Alterar senha:</h3>

                    <p>Digite a nova senha e confirme, caso queira alterar.</p>

                    <form action="/update-password" method="post">

                        <div class="box-inputs">

                            <label for="passwordEnter-update">Senha:</label>

                            <div class="password">

                                <input type="password" name="newPassword" id="password-enter-update" minlength="4" placeholder="Digite sua nova senha" required>
                                <i class="see enter-update fa-regular fa-eye"></i>
                                <i class="not-see enter-update fa-regular fa-eye-slash"></i>

                            </div>

                        </div>

                        <div class="box-inputs">

                            <label for="password-Register-updateCS">Confirmar senha:</label>

                            <div class="password">

                                <input type="password" name="newPasswordCS" id="password-register-updateCS" minlength="4" placeholder="Confirme sua senha" required>
                                <i class="see register-updateCS fa-regular fa-eye"></i>
                                <i class="not-see register-updateCS fa-regular fa-eye-slash"></i>

                            </div>

                        </div>
                        <p class="error"><?=$this->view->msgUpdatePasswordError??''?></p>
                        <p class="success"><?=$this->view->msgUpdatePasswordSuccess??''?></p>
                        <button type="submit">Alterar senha</button>

                    </form>

                </div>
            </div>
        </section>
    </div>
</main>
<script src="js/password.js"></script>
<script src="js/files.js"></script>
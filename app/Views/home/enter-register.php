<link rel="stylesheet" href="css/entrar-registrar.css">
<main>
    <section class="entrar">
        <div class="center">
            <h3>Entrar</h3>
            <form action="#">
                <div class="box-input">
                    <label for="emailEnter">E-mail:</label>
                    <input type="email" name="emailEnter" id="emailEnter" required>
                </div>
                <div class="box-input">
                    <label for="passwordEnter">Senha:</label>
                    <div class="password">
                        <input type="password" name="passwordEnter" id="passwordEnter" required>
                        <i class="see enter fa-regular fa-eye"></i>
                        <i class="not-see enter fa-regular fa-eye-slash"></i>
                    </div>
                </div>
                <p class="msgError"><?=$this->view->msg['msgErrorE']?></p>
                <button type="submit">Entrar</button>
            </form>
        </div>
    </section>
    <section class="registrar">
        <div class="center">
            <h3>Criar conta</h3>
            <form action="/registrar" method="post">
                <div class="box-input">
                    <label for="name">Nome:</label>
                    <input type="text" name="name" id="name" minlength="3" value="<?=$this->view->userData['inputName']?>" required>
                </div>
                <div class="box-input">
                    <label for="lastName">Sobrenome:</label>
                    <input type="text" name="lastName" id="lastName" minlength="2" value="<?=$this->view->userData['inputLastName']?>" required>
                </div>
                <div class="box-input">
                    <label for="emailRegister">E-mail:</label>
                    <input type="email" name="emailRegister" id="emailRegister" placeholder="Ex: nome@gmail.com" value="<?=$this->view->userData['inputEmailRegister']?>" required>
                </div>
                <div class="box-input">
                        <label for="passwordRegister">Senha:</label>
                    <div class="password">
                        <input type="password" name="passwordRegister" id="passwordRegister" minlength="4" placeholder="Digite uma senha acima de 4 caracteres" value="<?=$this->view->userData['inputPasswordRegister']?>" required>
                        <i class="see register fa-regular fa-eye"></i>
                        <i class="not-see register fa-regular fa-eye-slash"></i>
                    </div>
                </div>
                <div class="box-input">
                        <label for="password-Register-CS">Confirmar senha:</label>
                    <div class="password">
                        <input type="password" name="passwordCS" id="password-Register-CS" minlength="4" placeholder="Confirme sua senha" value="<?=$this->view->userData['inputPasswordCS']?>" required>
                        <i class="see registerCS fa-regular fa-eye"></i>
                        <i class="not-see registerCS fa-regular fa-eye-slash"></i>
                    </div>
                </div>
                    <p class="msgError"><?=$this->view->msg['msgErrorR']?></p>
                <button type="submit">Registrar</button>
            </form>
        </div>
    </section>
</main>
<script src="js/scripts.js"></script>
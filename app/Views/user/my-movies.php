<link rel="stylesheet" href="css/user/my-movies.css">
<main>
    <section class="my-movies">
        <h3>Dashboard</h3>
        <p>Adicione ou atualize as informações dos files que você registrou.</p>
        <div class="add-film">
          <a href="/page-register-movie"><i class="fa-solid fa-plus"></i>Adicionar filme</a>
        </div>
    
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Nota</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->view->userMovies as $movie):
                    extract($movie)?>
                    <tr class="data">
                        <td class="title"><a href="#"><?=$title?></a></td>
                        <td class="assessments"><i class="star fa-solid fa-star"></i><span>6.4</span></td>
                        <td class="actions">
                            <a class="edit-movie" href="#"><i class="fa-solid fa-pen-to-square"></i>Editar</a>
                            <a class="delete-movie" href="#"><i class="fa-solid fa-trash-can"></i>Deletar</a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </section>
</main>
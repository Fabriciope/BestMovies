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
                        <td class="title"><a href="/movie?id=<?=$id?>"><?=$title?></a></td>
                        <td class="assessments"><i class="star fa-solid fa-star"></i><span><?=$rating?></span></td>
                        <td class="actions">
                            <a class="edit-movie" href="/page-edit-movie?id=<?=$id?>"><i class="fa-solid fa-pen-to-square"></i>Editar</a>
                            <form action="/destroy-movie" method="post">
                             <button class="delete-movie" type="submit" name="id" value="<?=$id?>">Deletar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </section>
</main>

<!-- <script>
    const modal = document.querySelector('.bg-modal');
    function openModal()
    {
        modal.style.display = 'block';
    }
</script> -->
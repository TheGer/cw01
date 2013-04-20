<nav class="top-bar">
    <section> 
        <ul class="left">
            <?php
            // $currentarticle = $data['article'];

            foreach ($data['articleslist'] as $article) {
                ?>
                <li><a href="index.php?page=content&article=<?= $article->name ?>"><?= $article->name ?></a></li>  
                <?php
            }
            ?>
            <li><a href="index.php?page=car">cars</a></li>
            <li><a href="index.php?page=users&action=profile">profile</a></li>
            <li><a href="index.php?page=users&action=logout">logout</a></li>

        </ul>
    </section>
</nav>
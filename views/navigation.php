   <nav class="top-bar">
       <section> 
        <ul class="left">
              <?php
              $currentarticle = $data['article'];
              
                foreach($data['articleslist'] as $article)
                {
                    if ($article->name == $currentarticle->name)
                    {
                 ?>
                  <li class="active"><a href="index.php?page=content&article=<?=$article->name?>"><?=$article->name?></a></li>  
       
            <?php
                    }
                    else
                    {
              ?>
                 <li><a href="index.php?page=content&article=<?=$article->name?>"><?=$article->name?></a></li>  
               <?php
                    }
                }
             ?>
        </ul>
       </section>
</nav>
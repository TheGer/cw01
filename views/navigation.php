   <nav class="top-bar">
       <section> 
        <ul class="left">
              <?php
             // $currentarticle = $data['article'];
              
                foreach($data['articleslist'] as $article)
                {
                
              ?>
                 <li><a href="index.php?page=content&article=<?=$article->name?>"><?=$article->name?></a></li>  
               <?php
                    
                }
             ?>
                 <li><a href="index.php?page=car">cars</a></li>
                 <li><a href="index.php?page=users">login</a></li>
                 
        </ul>
       </section>
</nav>
<?php

use app\auth\Auth;

$this->layout('master', ['title' => $title]); ?>

<?php if (!$post) { ?>
  <div class="not-found-container">
    <h1 class="post-not-found-title">Esse post não existe</h1>
    <p class="post-not-found-message">Desculpe, o post que você está procurando não foi encontrado.</p>
    <a href="/" class="post-not-found-link">Voltar para a página inicial</a>
  </div>
<?php } else { ?>

  <article class="post-article">
    <div class="container">
      <img src="/img/posts/672e753bda3e9-post01.jpg" width="968" height="510" alt="" class="post__image">
      <div class="post__details">
        <div class="post__meta">
          <span class="post-card__date">02, agosto 2023</span>
          <span>|</span>
          <span class="post-card__category">Extração do Siso</span>
        </div>
        <div class="post-author">
          <img src="/img/patient01.png" width="50" height="50" alt="">
          <span>John Doe</span>
        </div>
      </div>
      <div class="post__content">
        <h1 class="post__title">Melhores práticas para manter a saúde bucal em dia: Dicas e truques</h1>
        <div class="post__body">
          <p>A saúde bucal é um aspecto fundamental do bem-estar geral. Manter uma boa higiene oral não apenas ajuda a prevenir problemas como cáries, gengivite e halitose, mas também contribui para a saúde do coração, do sistema imunológico e até mesmo para a autoestima.</p>
          <p>Neste post, vamos compartilhar algumas das melhores práticas para manter a saúde bucal em dia, incluindo dicas e truques para tornar a rotina de cuidados mais fácil e agradável.</p>

          <h3>Escove os dentes corretamente</h3>
          <p>A escovação dos dentes é a base de uma boa higiene bucal. É importante escovar os dentes pelo menos duas vezes ao dia, de manhã e à noite, por cerca de dois minutos. Utilize uma escova de cerdas macias e uma pasta de dente com flúor. A técnica correta de escovação é fundamental para remover a placa bacteriana e os resíduos de alimentos dos dentes e gengivas.</p>

          <h3>Use fio dental regularmente</h3>
          <p>A escovação dos dentes não é suficiente para remover a placa bacteriana acumulada entre os dentes. O uso do fio dental é essencial para garantir uma limpeza completa e prevenir a gengivite e a cárie. Passe o fio dental uma vez ao dia, preferencialmente à noite antes de dormir. Utilize um pedaço de fio dental com cerca de 45 cm e passe-o suavemente entre os dentes.</p>

          <h3>Visite o dentista regularmente</h3>
          <p>As visitas regulares ao dentista são essenciais para manter a saúde bucal em dia. O dentista pode identificar e tratar problemas precocemente, além de realizar limpezas profissionais e orientar sobre os cuidados adequados. Recomenda-se visitar o dentista pelo menos duas vezes ao ano.</p>

          <h3>Adote uma alimentação saudável</h3>
          <p>A alimentação desempenha um papel importante na saúde bucal. Alimentos ricos em açúcares e amidos podem aumentar a produção de ácido, que por sua vez danifica o esmalte dos dentes e promove a formação de cáries. Uma dieta equilibrada, rica em frutas, legumes, verduras e grãos integrais, ajuda a manter os dentes e gengivas saudáveis.</p>

          <h3>Não fume</h3>
          <p>O tabagismo é um dos principais fatores de risco para doenças bucais, como câncer oral, gengivite e perda de dentes. Se você fuma, procure ajuda para parar de fumar.</p>

          <h3>Proteja seus dentes</h3>
          <p>Se você pratica esportes de contato ou trabalha em atividades que podem causar lesões na boca, use um protetor bucal para proteger seus dentes.</p>

          <h3>Mantenha uma boa hidratação</h3>
          <p>A saliva ajuda a neutralizar o ácido e remover os resíduos de alimentos da boca. Beber água regularmente ajuda a manter a boca hidratada e a prevenir a boca seca.</p>

          <h3>Evite o consumo excessivo de álcool</h3>
          <p>O consumo excessivo de álcool pode danificar os dentes e gengivas, além de aumentar o risco de câncer oral.</p>

          <h3>Pratique bons hábitos de higiene</h3>
          <p>Além da escovação e do uso do fio dental, é importante tomar outras medidas de higiene bucal, como enxaguar a boca após as refeições e evitar compartilhar objetos pessoais, como escovas de dentes e copos.</p>

          <h3>Consulte um profissional</h3>
          <p>Se você perceber algum problema na sua saúde bucal, como dor, sangramento ou inchaço nas gengivas, consulte um dentista imediatamente.</p>

          <h2>Conclusão</h2>
          <p>A saúde bucal é um aspecto importante do bem-estar geral. Ao seguir as dicas e truques mencionados neste post, você pode manter seus dentes e gengivas saudáveis e prevenir problemas bucais. Lembre-se de que a visita regular ao dentista é essencial para uma boa saúde bucal.</p>
        </div>
      </div>
      <div class="share-post">
        <h3>Compartilhe</h3>
        <div class="social-links">
          <a href="#"><img src="/img/icons/facebook.svg" width="30" height="30" alt="ícone do facebook"></a>
          <a href="#"><img src="/img/icons/instagram.svg" width="30" height="30" alt="ícone do facebook"></a>
          <a href="#"><img src="/img/icons/x.svg" width="30" height="30" alt="ícone do facebook"></a>
          <a href="#"><img src="/img/icons/whatsapp-blue.svg" width="30" height="30" alt="ícone do facebook"></a>
        </div>
      </div>
    </div>
  </article>

  <section class="comments-section">
    <div class="container">
      <div class="heading">
        <h2>Comentários</h2>
      </div>
      <div class="add-comment">
        <img src="/img/patient02.png" width="60" height="60" alt="">
        <form action="" class="add-comment__form">
          <div class="form-group">
            <input placeholder="Compartilhe a sua opnião"></input>
            <button type="submit"><img src="/img/icons/send.svg" width="20" height="20" alt="icone de envio"></button>
          </div>
        </form>
      </div>
      <div class="comments">
        <div class="comment">
          <div class="comment__head">
            <img src="/img/patient03.png" width="60" height="60" alt="">
            <div class="comment__details">
              <h4 class="comment__author">Jane Doe</h4>
              <span>04, agosto 2023</span>
            </div>
          </div>
          <p class="comment__body">Ótimo post! As dicas são super úteis e fáceis de seguir. Já sabia da importância de escovar os dentes, mas não sabia que a postura ao escovar influenciava tanto. Vou começar a prestar mais atenção nisso! Uma dúvida: qual a frequência ideal para trocar a escova de dentes?</p>
        </div>
        <div class="comment">
          <div class="comment__head">
            <img src="/img/patient03.png" width="60" height="60" alt="">
            <div class="comment__details">
              <h4 class="comment__author">Jane Doe</h4>
              <span>04, agosto 2023</span>
            </div>
          </div>
          <p class="comment__body">Ótimo post! As dicas são super úteis e fáceis de seguir. Já sabia da importância de escovar os dentes, mas não sabia que a postura ao escovar influenciava tanto. Vou começar a prestar mais atenção nisso! Uma dúvida: qual a frequência ideal para trocar a escova de dentes?</p>
        </div>
        <div class="comment">
          <div class="comment__head">
            <img src="/img/patient03.png" width="60" height="60" alt="">
            <div class="comment__details">
              <h4 class="comment__author">Jane Doe</h4>
              <span>04, agosto 2023</span>
            </div>
          </div>
          <p class="comment__body">Ótimo post! As dicas são super úteis e fáceis de seguir. Já sabia da importância de escovar os dentes, mas não sabia que a postura ao escovar influenciava tanto. Vou começar a prestar mais atenção nisso! Uma dúvida: qual a frequência ideal para trocar a escova de dentes?</p>
        </div>
      </div>
    </div>
  </section>

  <!--
  <div class="container">
    <article class="single-post">
      <?php if (isset($post->imagePath)) { ?>
        <img src="<?php echo $post->imagePath ?>">
      <?php } ?>
      <header class="post-header">
        <h1 class="post-title"><?php echo $post->title ?></h1>
        <div class="post-meta">
          <a href="/blog/categoria/<?php echo $post->categorySlug ?>"><span
              class="post-category"><?php echo $post->category_title ?></span>
          </a>
          <span class="author">Por <?php echo $post->author ?></span>
          <span class="date"><?php echo formatDate($post->created_at) ?></span>
        </div>
      </header>

      <section class="post-content">
        <p>
          <?php echo $post->content ?>
        </p>
      </section>

      <footer class="post-footer">
        <div class="share-links">
          <span>Compartilhar:</span>
          <a href="#">Facebook</a> | <a href="#">Twitter</a> | <a href="#">LinkedIn</a>
        </div>
      </footer>
    </article>

    <div class="related-slides-container">
      <?php foreach ($relatedPosts as $relatedPost) { ?>
        <div class="related-slide" id="related-slide-<?php echo $relatedPost->id; ?>">
          <div class="related-slide-image" style="background-image: url('<?php echo $relatedPost->imagePath ?? ''; ?>');">
          </div>
          <div class="related-slide-content">
            <div class="related-slide-info">
              <span class="related-category"><?php echo $relatedPost->categoryTitle; ?></span> |
              <span class="related-date"><?php echo formatDate($relatedPost->created_at); ?></span>
            </div>
            <h3 class="related-title"><?php echo $relatedPost->title; ?></h3>
            <a href="/blog/post/<?php echo $relatedPost->slug; ?>" class="related-read-more">Ler mais</a>
          </div>
        </div>
      <?php } ?>
    </div>

    <section class="comments-section">
      <h2 class="comments-title">Comentários</h2>

      <?php echo flash('comment-success', 'msg msg-success mb') ?>
      <?php echo flash('comment-deleted', 'msg msg-success mb') ?>

      <?php if (count($comments) > 0) { ?>
        <ul class="comments-list">
          <?php foreach ($comments as $comment) { ?>
            <li class="comment-item">
              <div class="comment-header">
                <span class="comment-author"><?php echo $comment->name; ?></span>
                <span class="comment-date"><?php echo formatDate($comment->created_at); ?></span>
                <?php if (Auth::isAuth() && $comment->userId == Auth::getUser()->id) { ?>
                  <form action="/blog/comment/delete/<?php echo $comment->id ?>" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit">Excluir</button>
                  </form>
                <?php } ?>
              </div>
              <div class="comment-content">
                <?php echo $comment->content; ?>
              </div>
            </li>
          <?php } ?>
        </ul>
      <?php } else { ?>
        <p class="no-comments">Nenhum comentário ainda. Seja o primeiro a comentar!</p>
      <?php } ?>

      <div class="comment-form-container">
        <?php if ($isAuth) { ?>
          <h3>Deixe um comentário</h3>
          <form action="/blog/comment" method="POST">
            <input type="hidden" name="postId" value="<?php echo $post->id; ?>">
            <textarea name="content" rows="4" placeholder="Escreva seu comentário aqui..." required></textarea>
            <button type="submit">Comentar</button>
          </form>
        <?php } else { ?>
          <p>Você precisa <a href="/auth/login">fazer login</a> para comentar.</p>
        <?php } ?>
      </div>
    </section>

  </div>
        -->

<?php } ?>
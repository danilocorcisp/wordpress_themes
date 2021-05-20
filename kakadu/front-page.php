  <?php get_header(  ); ?>

 <body>

  <?php 
                                         $args = array(
                                                        'post_type' => 'indice',
                                                        'posts_per_page' => 1,
                                                     );

                                        $indice = new WP_Query($args);

                                         while($indice->have_posts(  )) {
                                         $indice->the_post(  );
        

                                    ?>
        <div class="fixed-header">
            <div class="nav-trigger">Índice</div>
        </div>
        <nav class="fixed-nav">

        
         
            <ul>
                <li>
                    <a href="#<?php the_field('numero_da_secao'); ?>"
                        ><?php the_field('titulo_da_secao'); ?> <span class="red"><?php the_field('numero_da_secao'); ?></span></a
                    >
                </li>
                <li>
                    <a href="#<?php the_field('numero_da_secao_3'); ?>"
                        ><?php the_field('titulo_da_secao_03'); ?> <span class="red"><?php the_field('numero_da_secao_3'); ?></span></a
                    >
                </li>
                <li>
                    <a href="#<?php the_field('numero_da_secao_4'); ?>"
                        ><?php the_field('titulo_da_secao_4'); ?> <span class="red"><?php the_field('numero_da_secao_4'); ?></span></a
                    >
                </li>
                <li>
                    <a href="#<?php the_field('numero_da_secao_5'); ?>"
                        ><?php the_field('titulo_da_secao_5'); ?> <span class="red"><?php the_field('numero_da_secao_5'); ?></span></a
                    >
                </li>
                <li>
                    <a href="#<?php the_field('numero_da_secao_6'); ?>"><?php the_field('titulo_da_secao_6'); ?> <span class="red"><?php the_field('numero_da_secao_6'); ?></span></a>
                </li>
                <li>
                    <a href="#<?php the_field('numero_da_secao_7'); ?>"><?php the_field('titulo_da_secao_7'); ?> <span class="red"><?php the_field('numero_da_secao_7'); ?></span></a>
                </li>
                <li>
                    <a href="#<?php the_field('numero_da_secao_8'); ?>"><?php the_field('titulo_da_secao_8'); ?> <span class="red"><?php the_field('numero_da_secao_8'); ?></span></a>
                </li>
                <li>
                    <a href="#<?php the_field('numero_da_secao_9'); ?>"
                        ><?php the_field('titulo_da_secao_9'); ?> <span class="red"><?php the_field('numero_da_secao_9'); ?></span></a
                    >
                </li>
                <li>
                    <a href="#<?php the_field('numero_da_secao_10'); ?>"
                        ><?php the_field('titulo_da_secao_10'); ?> <span class="red"><?php the_field('numero_da_secao_10'); ?></span></a
                    >
                </li>
                <li>
                    <a href="#<?php the_field('numero_da_secao_11'); ?>"
                        ><?php the_field('titulo_da_secao_11'); ?> <span class="red"><?php the_field('numero_da_secao_11'); ?></span></a
                    >
                </li>
                <li>
                    <a href="#<?php the_field('numero_da_secao_12'); ?>"
                        ><?php the_field('titulo_da_secao_12'); ?> <span class="red"><?php the_field('numero_da_secao_12'); ?></span></a
                    >
                </li>
                <li>
                    <a href="#<?php the_field('numero_da_secao_13'); ?>"><?php the_field('titulo_da_secao_13'); ?> <span class="red"><?php the_field('numero_da_secao_13'); ?></span></a>
                </li>
                <?php }
                                        wp_reset_query(  );
                                  ?>

                                  <?php 
                                         $args = array(
                                                        'post_type' => 'antes',
                                                        'posts_per_page' => 1,
                                                     );

                                        $antes = new WP_Query($args);

                                         while($antes->have_posts(  )) {
                                         $antes->the_post(  );
        

                                    ?> 
                <li class="anteriores">                 
                  
    <a href="/andbank/antes/edicoes-anteriores"><span class="issues">Edições Anteriores</span></a>


                </li>
                 
                
            </ul>
            
            
                <?php }
                                        wp_reset_query(  );
                                  ?>
        </nav>

       

 <?php 
                                         $args = array(
                                                        'post_type' => 'cabecalho',
                                                        'posts_per_page' => 1,
                                                     );

                                        $cabecalho = new WP_Query($args);

                                         while($cabecalho->have_posts(  )) {
                                         $cabecalho->the_post(  );
        

                                    ?> 

                                    <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>

                                    
        <header class="header" style="background: url('<?php echo $backgroundImg[0]; ?>') 50%;">>
         
                    <div class="header__container container">
                
                <div class="header__top">
                <?php 
                                                        if ( has_custom_logo() ) : ?>
                                                        <?php the_custom_logo(); ?>
                                                        <?php endif; ?>
                    
                   
                    <div class="header__infos">
                        <span class="left"
                            ><strong>Revista Interna</strong></span
                        >
                        <div class="right">
                            <span class="month"
                                ><strong><?php the_field('meses'); ?></strong></span
                            >
                            <span>N.º <?php the_field('edicao'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="header__bottom">
                    <a href="#nav">
                        <img
                            src="assets/images/00_seta_roleparabaixo.svg"
                            alt=""
                        />
                        ROLE PARA BAIXO
                    </a>
                </div>
            </div>
            <div class="feat-cover-container">
                <a href="#<?php the_field('link_01'); ?>" class="feat-cover">
                    <h2 class="feat-cover__title"><?php the_field('titulo_destaque_01'); ?></h2>
                    <p class="feat-cover__excerpt">
                        <?php the_field('chamada_01'); ?>
                    </p>
                </a>
                <a href="#<?php the_field('link_2'); ?>" class="feat-cover">
                    <h2 class="feat-cover__title"><?php the_field('titulo_destaque_2'); ?></h2>
                    <p class="feat-cover__excerpt">
                        <?php the_field('chamada_2'); ?>
                    </p>
               

                <a href="#<?php the_field('link_3'); ?>" class="feat-cover other">
                    <h2 class="feat-cover__title"><?php the_field('titulo_destaque_3'); ?></h2>
                    <p class="feat-cover__excerpt">
                        <?php the_field('chamada_3'); ?>
                    </p>
                </a>

                <a href="#<?php the_field('link_4'); ?>" class="feat-cover">
                    <h2 class="feat-cover__title"><?php the_field('titulo_destaque_4'); ?></h2>
                    <p class="feat-cover__excerpt">
                        
                        <?php the_field('chamada_4'); ?>
                    </p>
                </a>
            </div>
        </header>
        <?php }
                                        wp_reset_query(  );
                                  ?>

        <?php 
                                         $args = array(
                                                        'post_type' => 'indice',
                                                        'posts_per_page' => 1,
                                                     );

                                        $indice = new WP_Query($args);

                                         while($indice->have_posts(  )) {
                                         $indice->the_post(  );
        

                                    ?> 
        <nav id="nav" class="top-nav">
            <div class="container">
                <span class="top-nav__title slash-title">Índice</span>
                <ul>
                    <li>
                        <a href="#<?php the_field('numero_da_secao'); ?>"
                            ><?php the_field('titulo_da_secao'); ?> <span class="red">/<?php the_field('numero_da_secao'); ?></span></a
                        >
                        <p>
                            <?php the_field('linha_fina'); ?>
                        </p>
                    </li>
                    <li>
                        <a href="#<?php the_field('numero_da_secao_3'); ?>"
                            ><?php the_field('titulo_da_secao_03'); ?><span class="red">/<?php the_field('numero_da_secao_3'); ?></span></a
                        >
                        <p>
                             <?php the_field('linha_fina_3'); ?>
                        </p>
                    </li>
                    <li>
                        <a href="#<?php the_field('numero_da_secao_4'); ?>"
                            ><?php the_field('titulo_da_secao_4'); ?> <span class="red">/<?php the_field('numero_da_secao_4'); ?></span></a
                        >
                        <p>
                             <?php the_field('linha_fina_4'); ?>
                        </p>
                    </li>
                    <li>
                        <a href="#<?php the_field('numero_da_secao_5'); ?>"
                            ><?php the_field('titulo_da_secao_5'); ?> <span class="red">/<?php the_field('numero_da_secao_5'); ?></span></a
                        >
                        <p>
                             <?php the_field('linha_fina_5'); ?>
                        </p>
                    </li>
                    <li>
                        <a href="#<?php the_field('numero_da_secao_6'); ?>"><?php the_field('titulo_da_secao_6'); ?> <span class="red">/<?php the_field('numero_da_secao_6'); ?></span></a>
                        <p>
                             <?php the_field('linha_fina_6'); ?>
                        </p>
                    </li>
                    <li>
                        <a href="#<?php the_field('numero_da_secao_7'); ?>"><?php the_field('titulo_da_secao_7'); ?> <span class="red">/<?php the_field('numero_da_secao_7'); ?></span></a>
                        <p>
                             <?php the_field('linha_fina_7'); ?>
                        </p>
                    </li>
                    <li>
                        <a href="#<?php the_field('numero_da_secao_8'); ?>"><?php the_field('titulo_da_secao_8'); ?> <span class="red">/<?php the_field('numero_da_secao_8'); ?></span></a>
                        <p>
                             <?php the_field('linha_fina_8'); ?>
                        </p>
                    </li>
                    <li>
                        <a href="#<?php the_field('numero_da_secao_9'); ?>"
                            ><?php the_field('titulo_da_secao_9'); ?> <span class="red">/<?php the_field('numero_da_secao_9'); ?></span></a
                        >
                        <p>
                             <?php the_field('linha_fina_9'); ?>
                        </p>
                    </li>
                    <li>
                        <a href="#<?php the_field('numero_da_secao_10'); ?>"
                            ><?php the_field('titulo_da_secao_10'); ?> <span class="red">/<?php the_field('numero_da_secao_10'); ?></span></a
                        >
                        <p>
                             <?php the_field('linha_fina_10'); ?>
                        </p>
                    </li>
                    <li>
                        <a href="#<?php the_field('numero_da_secao_11'); ?>"><?php the_field('titulo_da_secao_11'); ?> <span class="red">/<?php the_field('numero_da_secao_11'); ?></span></a>
                        <p>
                             <?php the_field('linha_fina_11'); ?>
                        </p>
                    </li>
                    <li>
                        <a href="#<?php the_field('numero_da_secao_12'); ?>"
                            ><?php the_field('titulo_da_secao_12'); ?> <span class="red">/<?php the_field('numero_da_secao_12'); ?></span></a
                        >
                        <p>
                             <?php the_field('linha_fina_12'); ?>
                        </p>
                    </li>
                    <li>
                        <a href="#<?php the_field('numero_da_secao_13'); ?>"
                            ><?php the_field('titulo_da_secao_13'); ?> <span class="red">/<?php the_field('numero_da_secao_13'); ?></span></a
                        >
                        <p>
                             <?php the_field('linha_fina_13'); ?>
                        </p>
                    </li>
                </ul>
            </div>
        </nav>

        <?php }
                                        wp_reset_query(  );
                                  ?>

         <?php 
                                         $args = array(
                                                        'post_type' => 'editorial',
                                                        'posts_per_page' => 2,
                                                     );

                                        $editorial = new WP_Query($args);

                                         while($editorial->have_posts(  )) {
                                         $editorial->the_post(  );
        

                                    ?>
           
        <section id="02" class="content__container">

                    
             <h1 class="slash-title content__padding-left">CARTA EDITORIAL</h1>
            <article class="article">
                


                <h2 class="article__title padding-left">
                    <?php the_title(); ?>
                </h2>
                <div class="team">
                    <img
                        src="<?php echo get_the_post_thumbnail_url( get_the_ID(  ) ); ?>"
                        alt="Carlos Foz - CEO Andbank Brasil"
                    />
                    <div class="team__infos">
                        <strong><?php the_field('diretores'); ?></strong><br />
                        <?php the_field('funcao'); ?><br />
                        <?php the_field('andbank_brasil'); ?>
                    </div>
                </div>
                <div class="content__text">
                    <p>
                        <?php the_content(); ?>
                    </p>
                   
                   
                </div>
            </article>
            </section>
             <?php }
                                        wp_reset_query(  );
                                  ?>

            <?php 
                                         $args = array(
                                                        'post_type' => 'mercado',
                                                        'posts_per_page' => 1,
                                                     );

                                        $mercado = new WP_Query($args);

                                         while($mercado->have_posts(  )) {
                                         $mercado->the_post(  );
        

                                    ?>                       
        <section id="03" class="content__container">
            <h1 class="slash-title content__padding-left">
                DE OLHO NO MERCADO
            </h1>
            <article class="article">
                <h2 class="article__title">
                    <?php the_title(); ?>
                </h2>
               
                <div class="content__text">
                    <p>
                        <?php the_content(); ?>
                    </p>

                    

                   
                </div>
            </article>
        </section>

        <?php }
                                        wp_reset_query(  );
                                  ?>

                                   <?php 
                                         $args = array(
                                                        'post_type' => 'fique',
                                                        'posts_per_page' => 1,
                                                     );

                                        $fique = new WP_Query($args);

                                         while($fique->have_posts(  )) {
                                         $fique->the_post(  );
        

                                    ?>
        <section id="04" class="content__container">
            <h1 class="slash-title content__padding-left">FIQUE POR DENTRO</h1>
            <article class="article">
                <h2 class="article__title">
                    <?php the_title(); ?>
                </h2>

                <div class="content__text">
                    <p>
                        <?php the_content(); ?>
                    </p>

                    

                    <div class="zig-zag">
                        <img
                            src="<?php the_field('imagem'); ?>"
                            alt=""
                        />
                        <div>
                            <div class="zig-zag__head">
                                <h3><?php the_field('nome'); ?></h3>
                                <span><?php the_field('cargo'); ?></span>
                            </div>
                            <div class="zig-zag__text">
                                <?php the_field('frase'); ?>
                            </div>
                        </div>
                    </div>
                    
                   <div class="zig-zag">
                        <img
                            src="<?php the_field('imagem_2'); ?>"
                            alt=""
                        />
                        <div>
                            <div class="zig-zag__head">
                                <h3><?php the_field('nome_2'); ?></h3>
                                <span><?php the_field('cargo_2'); ?></span>
                            </div>
                            <div class="zig-zag__text">
                                <?php the_field('frase_2'); ?>
                            </div>
                        </div>
                    </div>
                    
                    <?php if( get_field('imagem_3') ): ?>
                    <div class="zig-zag">
                        <img
                            src="<?php the_field('imagem_3'); ?>"
                            alt=""
                        />
                        <?php endif; ?>
                        <?php if( get_field('nome_3') ): ?>
                        <div>
                            <div class="zig-zag__head">
                                <h3><?php the_field('nome_3'); ?></h3>
                                <span><?php the_field('cargo_3'); ?></span>
                            </div>
                            <div class="zig-zag__text">
                                <?php the_field('frase_3'); ?>
                            </div>
                        </div>
                    </div>
                     <?php endif; ?>

                      <?php if( get_field('nome_4') ): ?>

                    <div class="zig-zag">
                        <img
                            src="<?php the_field('imagem_4'); ?>"
                            alt=""
                        />
                        <div>
                            <div class="zig-zag__head">
                                <h3><?php the_field('nome_4'); ?></h3>
                                <span><?php the_field('cargo_4'); ?></span>
                            </div>
                            <div class="zig-zag__text">
                                <?php the_field('frase_4'); ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if( get_field('nome_5') ): ?>

                    <div class="zig-zag">
                        <img
                            src="<?php the_field('imagem_5'); ?>"
                            alt=""
                        />
                        <div>
                            <div class="zig-zag__head">
                                <h3><?php the_field('nome_5'); ?></h3>
                                <span><?php the_field('cargo_5'); ?></span>
                            </div>
                            <div class="zig-zag__text">
                                <?php the_field('frase_5'); ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if( get_field('nome_6') ): ?>

                    <div class="zig-zag">
                        <img
                            src="<?php the_field('imagem_6'); ?>"
                            alt=""
                        />
                        <div>
                            <div class="zig-zag__head">
                                <h3><?php the_field('nome_6'); ?></h3>
                                <span><?php the_field('cargo_6'); ?></span>
                            </div>
                            <div class="zig-zag__text">
                                <?php the_field('frase_6'); ?>
                            </div>
                        </div>
                    </div>

                    <?php endif; ?>

                    <?php if( get_field('nome_7') ): ?>

                    <div class="zig-zag">
                        <img
                            src="<?php the_field('imagem_7'); ?>"
                            alt=""
                        />
                        <div>
                            <div class="zig-zag__head">
                                <h3><?php the_field('nome_7'); ?></h3>
                                <span><?php the_field('cargo_7'); ?></span>
                            </div>
                            <div class="zig-zag__text">
                                <?php the_field('frase_7'); ?>
                            </div>
                        </div>
                    </div>

                    <?php endif; ?>

                    <?php if( get_field('nome_8') ): ?>

                    <div class="zig-zag">
                        <img
                            src="<?php the_field('imagem_8'); ?>"
                            alt=""
                        />
                        <div>
                            <div class="zig-zag__head">
                                <h3><?php the_field('nome_8'); ?></h3>
                                <span><?php the_field('cargo_8'); ?></span>
                            </div>
                            <div class="zig-zag__text">
                                <?php the_field('frase_8'); ?>
                            </div>
                        </div>
                    </div>

                    <?php endif; ?>

                    <?php if( get_field('nome_9') ): ?>

                    <div class="zig-zag">
                        <img
                            src="<?php the_field('imagem_9'); ?>"
                            alt=""
                        />
                        <div>
                            <div class="zig-zag__head">
                                <h3><?php the_field('nome_9'); ?></h3>
                                <span><?php the_field('cargo_9'); ?></span>
                            </div>
                            <div class="zig-zag__text">
                                <?php the_field('frase_9'); ?>
                            </div>
                        </div>
                    </div>

                    <?php endif; ?>

                    <?php if( get_field('nome_10') ): ?>

                    <div class="zig-zag">
                        <img
                            src="<?php the_field('imagem_10'); ?>"
                            alt=""
                        />
                        <div>
                            <div class="zig-zag__head">
                                <h3><?php the_field('nome_10'); ?></h3>
                                <span><?php the_field('cargo_10'); ?></span>
                            </div>
                            <div class="zig-zag__text">
                                <?php the_field('frase_10'); ?>
                            </div>
                        </div>
                    </div>
                     <?php endif; ?>                                 
                                       
                </div>
            </article>
        </section>

         <?php }
                                        wp_reset_query(  );
                                  ?>

         <?php 
                                         $args = array(
                                                        'post_type' => 'aniversario',
                                                        'posts_per_page' => 1,
                                                     );

                                        $aniversario = new WP_Query($args);

                                         while($aniversario->have_posts(  )) {
                                         $aniversario->the_post(  );
        

                                    ?>
        <section id="05" class="content__container">
            <h1 class="slash-title content__padding-left">ANIVERSARIANTES</h1>
            <article class="article">
                <div class="content__text">
                    <p>
                        <?php the_content(); ?>
                    </p>

                    

                     
                </div>
            </article>
        </section>

        <?php }
                                        wp_reset_query(  );
                                  ?>

        <?php 
                                         $args = array(
                                                        'post_type' => 'porai',
                                                        'posts_per_page' => 1,
                                                     );

                                        $porai = new WP_Query($args);

                                         while($porai->have_posts(  )) {
                                         $porai->the_post(  );
        

                                    ?>  
        <section id="06" class="content__container">
            <h1 class="slash-title content__padding-left">POR AÍ</h1>
            <article class="article">
                <h2 class="article__title padding-left">
                    <?php the_title(); ?>
                </h2>
                <div class="content__text">
                    <p>
                        <?php the_content(); ?>
                    </p>
                    
                </div>
            </article>
        </section>
        <?php }
                                        wp_reset_query(  );
                                  ?>

                                  <?php 
                                         $args = array(
                                                        'post_type' => 'conexao',
                                                        'posts_per_page' => 1,
                                                     );

                                        $conexao = new WP_Query($args);

                                         while($conexao->have_posts(  )) {
                                         $conexao->the_post(  );
        

                                    ?> 

                                  
        <section id="07" class="content__container">
             
            <h1 class="slash-title content__padding-left">CONEXÃO</h1>
            <article class="article">
                <h2 class="article__title padding-left">
                    <?php the_title(); ?>
                </h2>
                <div class="content__text">
                   
                        <?php the_content(); ?>
                    

                                       
                   

                   

                   
                   
                </div>
            </article>
        </section>
        <?php }
                                        wp_reset_query(  );
                                  ?>

                                  <?php 
                                         $args = array(
                                                        'post_type' => 'bemestar',
                                                        'posts_per_page' => 1,
                                                     );

                                        $bemestar = new WP_Query($args);

                                         while($bemestar->have_posts(  )) {
                                         $bemestar->the_post(  );
        

                                    ?> 

       
        <section id="08" class="content__container">
            <h1 class="slash-title content__padding-left">BEM-ESTAR</h1>
            <article class="article">
                <h2 class="article__title padding-left">
                    <?php the_title(); ?>
                </h2>
                <div class="content__text">
                    <figure class="full-image">
                        <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(  ) ); ?>" />
                    </figure>
                    <p>
                        <?php the_content(); ?>
                    </p>

                   
                </div>
            </article>
        </section>
        <?php }
                                        wp_reset_query(  );
                                  ?>

                                  <?php 
                                         $args = array(
                                                        'post_type' => 'gente',
                                                        'posts_per_page' => 1,
                                                     );

                                        $gente = new WP_Query($args);

                                         while($gente->have_posts(  )) {
                                         $gente->the_post(  );
        

                                    ?> 
        <section id="09" class="content__container">
            <h1 class="slash-title content__padding-left">
                GENTE INTERESSANTE
            </h1>
            <article class="article">
                <h2 class="article__title padding-left">
                    <?php the_title(); ?>
                </h2>
                <div class="content__text">
                    <p>
                    <figure>
                        <img
                            src="<?php echo get_the_post_thumbnail_url( get_the_ID(  ) ); ?>"
                            alt=""
                        />
                    </figure><br>
                        <?php the_content(); ?>
                    </p>
                                   
                    
                </div>
            </article>
        </section>
        <?php }
                                        wp_reset_query(  );
                                  ?>

                                  <?php 
                                         $args = array(
                                                        'post_type' => 'mundo',
                                                        'posts_per_page' => 1,
                                                     );

                                        $mundo = new WP_Query($args);

                                         while($mundo->have_posts(  )) {
                                         $mundo->the_post(  );
        

                                    ?> 
        <section id="10" class="content__container">
            <h1 class="slash-title content__padding-left">ANDBANK NO MUNDO</h1>
            <article class="article">
                <h2 class="article__title padding-left">
                    <?php the_title(); ?>
                </h2>
                <div class="content__text">
                    <figure class="full-image">
                        <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(  ) ); ?>" />
                    </figure>
                    <p>
                        <?php the_content(); ?>
                    </p>
                    
                </div>
            </article>
        </section>
        <?php }
                                        wp_reset_query(  );
                                  ?>
                                  <?php 
                                         $args = array(
                                                        'post_type' => 'mensagem',
                                                        'posts_per_page' => 1,
                                                     );

                                        $mensagem = new WP_Query($args);

                                         while($mensagem->have_posts(  )) {
                                         $mensagem->the_post(  );
        

                                    ?> 
        <section id="11" class="content__container">
            <h1 class="slash-title content__padding-left"><?php the_title(); ?></h1>
            <article class="article">
                <div class="content__text">
                    <p>
                        <?php the_content(); ?>
                    </p>
                    
                </div>
            </article>
        </section>
         <?php }
                                        wp_reset_query(  );
                                  ?>

                                  <?php 
                                         $args = array(
                                                        'post_type' => 'aberta',
                                                        'posts_per_page' => 1,
                                                     );

                                        $aberta = new WP_Query($args);

                                         while($aberta->have_posts(  )) {
                                         $aberta->the_post(  );
        

                                    ?> 
        <section id="12" class="content__container">
            <h1 class="slash-title content__padding-left">
                <?php the_field('secao'); ?>
            </h1>
            <article class="article">
                <h2 class="article__title padding-left">
                   <?php the_title(); ?>
                </h2>
                <div class="content__text">
                    <p>
                        <?php the_content(); ?>
                    </p>
                    
                </div>
            </article>
        </section>

        <?php }
                                        wp_reset_query(  );
                                  ?>

                                  <?php 
                                         $args = array(
                                                        'post_type' => 'off',
                                                        'posts_per_page' => 1,
                                                     );

                                        $off = new WP_Query($args);

                                         while($off->have_posts(  )) {
                                         $off->the_post(  );
        

                                    ?> 

        <section id="13" class="content__container">
            <h1 class="slash-title content__padding-left">MOMENTO OFF</h1>
            <article class="article">
                <h2 class="article__title padding-left">
                    <?php the_title(); ?>
                </h2>
                <div class="content__text">
                    <p>
                        <?php the_content(); ?>
                    </p>
                   
                </div>
            </article>
        </section>

        <?php }
                                        wp_reset_query(  );
                                  ?>

        <?php get_footer( ); ?>

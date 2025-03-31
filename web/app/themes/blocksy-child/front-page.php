<?php get_header(); ?>

<div class="homepage">
    <!-- Section Présentation -->
    <section class="hero">
        <div class="overlay"></div>
        <h1>Bienvenue, je suis Lou Lafet</h1>
        <p>Étudiante en BUT Informatique, passionnée par la découverte, le dessin et la programmation. Voici mes compétences et mes meilleures réalisations informatiques.</p>
    </section>


    <!-- Section Compétences & Passions (côte à côte et de même taille) -->
    <section class="container">
        
        <!-- Bloc Mes Compétences -->
        <section class="skills">
            <div class="box-container">
                <h2>Mes compétences</h2>
                <ul>
                    <li>Design Web (HTML, CSS, JavaScript)</li>
                    <li>Logiciels (Eclipse IDE, Modelio, LibreOffice, Figma, Intellij IDEA, PHPStorm, VSCode)</li>
                    <li>Modélisations (UML, IHM)</li>
                    <li>Outils de collaboration (Google Workspace, GitHub)</li>
                    <li>Langue : Anglais</li>
                </ul>
            </div>
        </section>

        <!-- Bloc Mes Passions -->
        <section class="passions">
            <div class="box-container">
                <h2>Mes passions</h2>
                <ul>
                    <li>Écriture et histoires
                    <a href="https://vos-histoires-de-lgdc.fandom.com/fr/wiki/Cat%C3%A9gorie:De_Fl%C3%A8che_de_Nuit" class="story-link" target="_blank">🪶</a>
                    </li>
                    <li>Jeux</li>
                    <li>Illustration et design graphique
                    <a href="https://drive.google.com/drive/u/0/folders/1VsllqTLgDza6kgF9WMCSc2HK_q5h_BXe" class="art-link" target="_blank">📖</a>
                    </li>
                    <li>Exploration et voyages</li>
                    <li>Lecture</li>
                </ul>
            </div>
        </section>

    </section>



    <!-- Section Réalisations -->
    <section class="featured-portfolio">
        <h2>Mes meilleures réalisations</h2>
        <?php
        $args = array(
            'post_type' => 'portfolio',
            'posts_per_page' => 3,
            'meta_key' => 'portfolio_realisations',
            'meta_value' => '1'
        );
        $featured_query = new WP_Query($args);

        if ($featured_query->have_posts()) :
            echo '<div class="portfolio-grid">';
            while ($featured_query->have_posts()) : $featured_query->the_post();
        ?>
                <article class="portfolio-item">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                        </a>
                    <?php endif; ?>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p><strong>Client :</strong> <?php echo esc_html(get_field('portfolio_client')); ?></p>
                </article>
        <?php
            endwhile;
            echo '</div>';
            wp_reset_postdata();
        else :
            echo '<p>Aucune réalisation mise en avant.</p>';
        endif;
        ?>
    </section>
</div>

<?php get_footer(); ?>

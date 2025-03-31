<?php get_header(); ?>

<div class="portfolio-archive">
    <h1>Tous les projets</h1>

    <?php if (have_posts()) : ?>
        <div class="portfolio-grid">
            <?php while (have_posts()) : the_post(); ?>
                <article class="portfolio-item">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                        </a>
                    <?php endif; ?>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p><strong>Client :</strong> <?php echo esc_html(get_field('portfolio_client')); ?></p>
                </article>
            <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <?php
            the_posts_pagination(array(
                'prev_text' => 'Précédent',
                'next_text' => 'Suivant',
            ));
            ?>
        </div>
    <?php else : ?>
        <p>Aucune réalisation trouvée.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>

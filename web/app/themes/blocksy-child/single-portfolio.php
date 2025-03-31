<?php get_header(); ?>

<div class="portfolio-single">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <?php if (get_field('portfolio_realisations')) : ?>
            <p class="featured-label"><strong>Projet mis en avant</strong></p>
        <?php endif; ?>
        <div class="portfolio-content">
            <?php the_content(); ?>
        </div>

        <div class="portfolio-details">
            <h2>Détails du projet</h2>
            <p><strong>Client :</strong> <?php echo esc_html(get_field('portfolio_client')); ?></p>
            <p><strong>Date de réalisation :</strong> <?php echo esc_html(get_field('portfolio_date')); ?></p>
            <p><strong>Lien du projet :</strong> <a href="<?php echo esc_url(get_field('portfolio_link')); ?>" target="_blank" rel="noopener">Voir le projet</a></p>
        </div>

    <?php endwhile; else : ?>
        <p>Aucune réalisation trouvée.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>

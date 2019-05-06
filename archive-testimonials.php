<?php acf_form_head(); ?>
<?php get_header(); ?>
    <section class="content bg-line">
        <div class="row">
            <div class="reviewsBox">
                <div class="grid">
                    <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            $i = 0;
                            the_post();
                            ?>
                            <div class="grid-item">
                                <h4><?php the_title(); ?></h4>
                                <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date(get_option('date_format_custom')); ?>

                                </time>
                                <div class="flex start">
                                    <div class="starBox">
                                        <?php while ($i++ < get_field("rating")): ?>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        <?php endwhile; ?>
                                    </div>
                                    <div>
                                        <?php if ($industry_t = get_field('industry_t')) { ?>
                                            <span>Industry: <strong><?php echo $industry_t ?></strong></span>
                                        <?php } ?>
                                        <?php if ($title_t = get_field('title_t')) { ?>
                                            <span>Title: <strong><?php echo $title_t ?></strong></span>
                                        <?php } ?>
                                    </div>

                                </div>
                                <div class="info">
                                    <?php if (get_field('review')) { ?>
                                        <?php the_field('review') ?>
                                    <?php } else { ?>
                                        <?php the_content(); ?>
                                    <?php } ?>
                                </div>

                            </div>
                            <?php
                        }
                    } else {
                        // no posts found
                    }
                    ?>
                    <?php // Restore original Post Data
                    wp_reset_postdata();
                    ?>

                </div>
                <?php wp_pagenavi() ?>
            </div>
        </div>
        <div id="newTestimonial">
            <div class="row">
                <h2>Create your own review</h2>
                <?php
                if (is_user_logged_in()) {
                    $fields = array('company_t', 'industry_t', 'title_t', 'rating', 'comment', 'review', 'recaptcha');
                } else {
                    $fields = array('company_t', 'industry_t', 'title_t', 'rating', 'comment', 'review', 'recaptcha');
                }
                acf_form(array(
                    'post_id' => 'new_post',
                    'new_post' => array(
                        'post_type' => 'testimonials',
                        'post_status' => 'draft'
                    ),
                    'post_title' => true,
                    'fields' => $fields,
                    'submit_value' => 'Submit',
                    'updated_message' => 'Testimonial submited',
                    'uploader'			=> 'wp',
                    'return' 			=> '?my_param=true&updated=false'
                ));

                ?>
            </div>

        </div>
    </section>
<?php acf_enqueue_uploader(); ?>
<?php get_footer(); ?>
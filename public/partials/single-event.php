<?php
/**
 * @link       https://www.event-subscription.com
 * @since      1.0.0
 *
 * @package    Event_Subscription
 * @subpackage Event_Subscription/public/partials
 */
get_header();
?>
<div class="signle-event-wrapper">
    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
        <header class="entry-header has-text-align-center">
            <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        </header>
        <figure class="featured-media">
            <div class="featured-media-inner section-inner medium">
                <?php
                the_post_thumbnail();

                $caption = get_the_post_thumbnail_caption();

                if ($caption) {
                    ?>

                    <figcaption class="wp-caption-text"><?php echo esc_html($caption); ?></figcaption>

                    <?php
                }
                ?>
            </div>
        </figure>
        <div class="post-inner">
            <div class="entry-content">
                <div class="event-metadata">
                    <?php if(get_post_meta(get_the_ID(), 'event_start_date_time', true) != ''){ ?>
                    <p><strong>Start Date Time: </strong><?php echo get_post_meta(get_the_ID(), 'event_start_date_time', true); ?></p>
                    <?php 
                    }
                    if(get_post_meta(get_the_ID(), 'event_end_date_time', true) != ''){ ?>
                    <p><strong>End Date Time: </strong><?php echo get_post_meta(get_the_ID(), 'event_end_date_time', true); ?></p>
                    <?php 
                    }
                    if(get_post_meta(get_the_ID(), 'event_location', true) != ''){ ?>
                    <p><strong>Location: </strong><?php echo get_post_meta(get_the_ID(), 'event_location', true); ?></p>
                    <?php 
                    }
                    if(get_post_meta(get_the_ID(), 'event_country', true) != ''){ ?>
                    <p><strong>Country: </strong><?php echo get_post_meta(get_the_ID(), 'event_country', true); ?></p>
                    <?php } ?>
                </div>
                <?php the_content( __( 'Continue reading', 'event-subscription' ) ); ?>
                <div class="event-subscription-form">
                <?php if(is_user_logged_in() && get_post_meta(get_the_ID(), 'event_subscription_from_id', true) != ''){
                    echo do_shortcode('[gravityform id="'.get_post_meta(get_the_ID(), 'event_subscription_from_id', true).'" title="false" description="false"]');
                } else{ ?>
                    <p>Please logged in to enroll this event!</p>
                <?php } ?>
                </div>
            </div>
            
        </div>
    </article>
</div>
<?php
get_footer();

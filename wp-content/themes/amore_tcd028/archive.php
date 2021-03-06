<?php

  get_header();

  $category = get_category( get_query_var( 'cat' ) );
  $cat_id = $category->cat_ID;

  if( $cat_id ){
    $cat_id = $cat_id;
  } else {
    $cat_id = 'null';
  }

?>

<style type="text/css" media="screen">
.read-more a{
  padding-top:0px !important;
  padding-bottom:0px !important;
}
</style>

  <div class="amore-divider romaji" data-parallax="scroll" data-image-src="<?php echo $options['bg_image6']; ?>">
    <div class="container">
      <div class="row">
        <div class="col-xs-120 no-padding">
          <h2 class="top-headline" style="<?php if(!is_mobile()){ echo 'margin-top: 50px; margin-bottom: -20px;'; }else{ echo 'height:195px; line-height:195px;'; }; ?>"><?php echo $options['blog_headline']; ?></h2>
        </div>
      </div>
    </div>
  </div>

  <div class="container amore-inner-container">
    <div class="row">
      <div id="infiniscroll" class="col-xs-120 no-padding">
        <?php if($options['show_bread']) : ?>
          <?php get_template_part('breadcrumb'); ?>
        <?php endif; ?>
        <h3 class="cate-title<?php if(category_description()){ echo ' mb10';}else{ echo ' mb50';}; ?>">
          <?php
            if ( is_category() ) :
              single_cat_title();
            elseif( is_day()) :
              echo get_the_date();
            elseif( is_month()) :
              echo get_the_date( 'Y F' );
            elseif( is_year()) :
              echo get_the_date( 'Y' );
            elseif ( is_tag() ) :
              single_tag_title();
            elseif ( is_author() ) :
              the_post();
              printf( __( 'Author: %s', '_tk' ), '<span class="vcard">' . get_the_author() . '</span>' );
              rewind_posts();
            endif;
          ?>
        </h3>
        <?php if(is_category()&&category_description()) : ?>
          <div class="cate-desc mb50"><?php echo category_description(); ?></div>
        <?php endif; ?>

        <div id="blog-index">
        <div class="row" style="padding-right:15px">
          <?php if ( have_posts() ) : ?>
            <?php $imageFullWidth = true; $x = 2;　?>
            <?php while ( have_posts() ) : the_post(); ?>
            <?php if(!is_mobile()): ?>
              <?php $x++;
                if($x % 3) : ?>
                  <div class="col-sm-38 col-sm-offset-3">
                    <div class="row">
                      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class='col-sm-120 col-xs-60 mb20' style='padding-right:0px'>
                          <a href="<?php the_permalink() ?>"><div class="thumb blog-list-thumb"><?php if ( has_post_thumbnail()) { the_post_thumbnail('size1'); } else { echo '<img src="'; bloginfo('template_url'); echo '/img/common/no_image2.gif" alt="" title="">'; }; ?></div></a>
                        </div>
                        <div class='col-sm-120 col-xs-60'>
                          <?php if ($options['show_date']) { echo "<span class='fa fa-clock-o'></span><span class='blog-list-timestamp romaji'>&nbsp;" . get_the_date('Y') . '.' . get_the_date('m') . '.' . get_post_time('j') . "</span>　";}; ?>
                          <?php if ($options['show_category']) { ?><span class="cate"><?php the_category(', '); ?></span><?php }; ?>
                          <h4 class='blog-list-title'><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                          <p class="blog-list-body"><a href="<?php the_permalink() ?>"><?php if(has_excerpt()){ the_excerpt(); }else{ new_excerpt(40); }; ?></a></p>
                        </div>
                      </article><!-- #post-## -->
                    </div>
                  </div>
                <?php else : ?>
                  <div class="col-sm-38">
                    <div class="row">
                      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class='col-sm-120 col-xs-60 mb20' style='padding-right:0px'>
                          <a href="<?php the_permalink() ?>"><div class="thumb blog-list-thumb"><?php if ( has_post_thumbnail()) { the_post_thumbnail('size1'); } else { echo '<img src="'; bloginfo('template_url'); echo '/img/common/no_image2.gif" alt="" title="">'; }; ?></div></a>
                        </div>
                        <div class='col-sm-120 col-xs-60'>
                          <?php if ($options['show_date']) { echo "<span class='fa fa-clock-o'></span><span class='blog-list-timestamp romaji'>&nbsp;" . get_the_date('Y') . '.' . get_the_date('m') . '.' . get_post_time('j') . "</span>　";}; ?>
                          <?php if ($options['show_category']) { ?><span class="cate"><?php the_category(', '); ?></span><?php }; ?>
                          <h4 class='blog-list-title'><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                          <p class="blog-list-body"><a href="<?php the_permalink() ?>"><?php if(has_excerpt()){ the_excerpt(); }else{ new_excerpt(40); }; ?></a></p>
                        </div>
                      </article><!-- #post-## -->
                    </div>
                  </div>
                <?php endif ?>

            <?php
              $counter++;
              if ($counter % 3 == 0) {
                echo '</div><div class="row" style="padding-right:15px">';
              }
            ?>
            <?php else: ?>
              <article id="post-<?php the_ID(); ?>" class="m_post_article">
                <?php if ( has_post_thumbnail() ) { ?><a href="<?php the_permalink(); ?>"><div class="thumb blog-list-thumb"><?php if ( has_post_thumbnail()) { the_post_thumbnail('size1'); } else { echo '<img src="'; bloginfo('template_url'); echo '/img/common/no_image2.gif" alt="" title="">'; }; ?></div></a><?php }; ?>
                <?php if ($options['show_date']) { echo "<span class='fa fa-clock-o'></span><span class='blog-list-timestamp romaji'>&nbsp;" . get_the_date('Y') . '.' . get_the_date('m') . '.' . get_post_time('j') . "</span>　";}; ?>
                <?php if ($options['show_category']) { ?><span class="cate"><?php the_category(', '); ?></span><?php }; ?>
                <h4 class='blog-list-title'><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
              </article>
            <?php endif; ?>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
        </div>
      </div>

      <?php /* _tk_content_nav( 'nav-below' ); */ ?>
      <?php if(!is_mobile()): ?>
      <div class="col-xs-120 text-center blog-load-btn">
        <ul class="pager"><li class="button" id="pagerbutton"><a id="pagerlink" onclick="page_ajax_get()"><?php _e('Read more', 'tcd-w'); ?></a></li></ul>
      </div>
    </div>
      <?php else: ?>
    </div>
      <?php get_template_part('navigation'); ?>
      <?php endif; ?>
  </div>
</div><!-- .main-content -->
<?php get_footer(); ?>

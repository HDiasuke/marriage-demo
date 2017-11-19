<?php /* Template Name: Welcome Screen */ ?>

<?php
$options = get_desing_plus_option();
get_header(); ?>

<div id="site-cover"></div>
<section>
  <div class="slider heightasviewport has-background" data-order='0' data-parallax="scroll" data-image-src="<?php echo $options['slider_image1']; ?>"></div>
  <div class="slider heightasviewport has-background" data-order='1' data-parallax="scroll" data-image-src="<?php echo $options['slider_image2']; ?>"></div>
  <div class="slider heightasviewport has-background" data-order='2' data-parallax="scroll" data-image-src="<?php echo $options['slider_image3']; ?>"></div>

  <div id="topcover" class="topcover heightasviewport">
    <div class="text-center verticalcentersplash amore-welcome-center">
      <?php if($options['first_auto_br']): ?>
      <h2 class="first-h1"><?php echo nl2br($options['h1_text']); ?></h2>
      <?php else: ?>
      <h2 class="first-h1"><?php echo $options['h1_text']; ?></h2>
      <?php endif; ?>
    </div>
  </div>

  <div class="topcover heightasviewport" style="opacity:1;-ms-transform:translate(0px,0px);-webkit-transform:translate(0px,0px);transform:translate(0px,0px);"></div>

  <div id="top" class="heightasviewport" style="opacity:1; background:transparent">
    <a href="#third" class="animate"><div class="down-arrow bounce"><span class="fa fa-angle-down"></span></div></a>
  </div>
</section>

<section>
  <div id="second">
     <div class="text-center amore-welcome-top">
       <div class="second-lead mb40">
        <?php if($options['bg_image1']): ?>
        <img src="<?php echo $options['bg_image1']; ?>" alt="<?php echo $options['second_leadcopy']; ?>" title="<?php echo $options['second_leadcopy']; ?>">
        <?php else: ?>
          <?php if($options['second_leadcopy']): ?>
        <h2><?php echo $options['second_leadcopy']; ?></h2>
          <?php endif; ?>
        <?php endif; ?>
       </div>
       <?php if($options['second_auto_br']): ?>
       <div class="second-body"><?php echo nl2br($options['sbc_text']); ?></div>
       <?php else: ?>
       <div class="second-body"><?php echo $options['sbc_text']; ?></div>
       <?php endif; ?>
       <?php if($options['bg_image8']): ?>
       <p class="second-img"><img src="<?php echo $options['bg_image8']; ?>" alt=""></p>
       <?php endif; ?>
     </div>
  </div>
</section>

<section>
  <div class="amore-divider romaji" data-parallax="scroll" data-speed="0.6" data-image-src="<?php echo $options['bg_image2']; ?>">
    <div class="container">
      <div class="row">
        <div class="col-xs-120 no-padding">
          <h2 class="invisibletexteffect animate offsetted top-headline third_headline"><?php echo $options['third_headline'];?></h2>
        </div>
      </div>
    </div>
  </div>

  <div id="third" class="container">
    <div class="row">
      <div class="col-xs-120 no-padding">
        <div class="row amore-section">
          <?php for($i=1; $i<=3; $i++): ?>
            <?php if ($options['third_banner_image'.$i]): ?>
          <div class="col-sm-40 text-center">
            <div style="background-image:url(<?php echo $options['third_banner_image'.$i]; ?>); width:70%" class="img-circle square-80 heightaswidth mb20 circle-banner">
              <a class="no-decoration" href="<?php echo $options['third_banner_url'.$i]; ?>"<?php if($options['third_banner_target'.$i]){echo ' target="_blank"';}; ?>><div class="cover text-center">
                <h3 class="verticalcenter"><?php echo $options['third_banner_headline'.$i]; ?></h3>
              </div></a>
            </div>
            <h4 class="text-center third-banner-headline mb20"><?php echo $options['third_banner_headline'.$i]; ?></h4>
            <p class="text-justify third-banner-body"><?php echo $options['third_banner_copy'.$i]; ?></p>
            <div class="button romaji fifth-banner-btn"><a href="<?php echo $options['third_banner_url'.$i]; ?>"<?php if($options['third_banner_target'.$i]){echo ' target="_blank"';}; ?>>READ MORE</a></div>
            <div class="visible-xs mb40"></div>
          </div>
            <?php endif; ?>
          <?php endfor; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="amore-divider romaji" data-parallax="scroll" data-speed="0.6" data-image-src="<?php echo $options['bg_image3']; ?>">
    <div class="container">
      <div class="row">
        <div class="col-xs-120 no-padding">
          <h2 class="invisibletexteffect animate offsetted top-headline fourth_headline"><?php echo $options['fourth_headline'];?></h2>
        </div>
      </div>
    </div>
  </div>

  <div id="fourth" class="container">
    <div class="row">
      <div class="col-xs-120 no-padding amore-section">
        <h3 class="lead romaji top-headline2<?php if(!is_mobile()){echo ' mb50'; }; ?>"><?php echo $options['fourth_headline2'];?></h3>
        <div class="row">
          <?php if($options['fourth_cate']): ?>
            <?php
             $cat_id = $options['fourth_cate'];
             $the_query = new WP_Query("post_type=post&posts_per_page=6&orderby=date&order=DESC&cat=".$cat_id);
            ?>
          <?php else: ?>
            <?php $the_query = new WP_Query("post_type=post&posts_per_page=6&orderby=date&order=DESC"); ?>
          <?php endif; ?>
          <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

              <div class="col-sm-60">
                <div class="row" style="margin-bottom:<?php if(is_mobile()){ echo '15px'; }else{ echo '70px'; };?>;">
                  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class='col-xs-30' style='padding-right:0px'>
                      <a href="<?php the_permalink() ?>"><div class="thumb blog-list-thumb"><?php if ( has_post_thumbnail()) { the_post_thumbnail('size3'); } else { echo '<img src="'; bloginfo('template_url'); echo '/img/common/no_image1.gif" alt="" title="">'; }; ?></div></a>
                    </div>
                    <div class='col-xs-90'>
                      <?php if ($options['show_date']) { echo "<span class='fa fa-clock-o'></span><span class='timestamp romaji'>&nbsp;" . get_the_date('Y') . '.' . get_the_date('m') . '.' . get_post_time('j') . "</span>　";}; ?>
                      <h4 class='list-title'><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                      <p class="list-body"><a href="<?php the_permalink() ?>"><?php if(has_excerpt()){ the_excerpt(); }else{ new_excerpt(40); }; ?></a></p>
                    </div>
                  </article><!-- #post-## -->
                </div>
              </div>

            <?php 
              $counter++;
              if ($counter % 2 == 0) {
                echo '</div><div class="row">';
              }
            ?>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <?php if(is_mobile()){ ?><div class="button romaji fifth-banner-btn mb15"><a href="<?php echo $options['blog_url']; ?>"><?php _e('Older posts', 'tcd-w'); ?></a></div><?php }; ?>
  </div>
</section>

<section>
  <div id="sixth" class="has-background" style="background-image:url(<?php echo $options['bg_image5']; ?>)">
    <div class="container" style="overflow-x:hidden">
      <div class="row amore-section">

        <div class="col-xs-120 no-padding-mobile">
          <div class="row map-wrap-dark">

            <div class="<?php if($options['show_map']){ echo "col-sm-60"; } else { echo "col-sm-120"; } ?> no-left-padding no-padding-mobile" style="line-height:30px;">
              <?php if($options['sixth_auto_br']): ?>
                <?php echo nl2br($options['sixth_text']); ?>
              <?php else: ?>
                <?php echo $options['sixth_text']; ?>
              <?php endif; ?>
            </div>

            <?php if($options['show_map']) : ?>
              <div class="visible-xs mb40"></div>
              <div class="col-sm-60 no-right-padding no-padding-mobile">
                <div id="map-canvas" style="width:100%; height:480px; border:4px solid white; border-radius:2px;"></div>
              </div>
            <?php endif; ?>

          </div>
        </div>

      </div>
    </div>
  </div>
</section>

</div>

<script>
 jQuery('.heightasviewport').css('height', jQuery(window).height())
</script>

<?php /* get_sidebar(); */ ?>
<?php get_footer(); ?>
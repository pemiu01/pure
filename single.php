<?php get_header(); ?>
<div class="container">
    <div class="article">
        <hgroup class="header">
            <h3 class="article-title"><?php the_title(); ?></h3>
            <div class="article-info">
                <span><i class="iconfont icon-time"></i><?php the_time('Y-n-j'); ?></span>
                <span><i class="iconfont icon-browse"></i><?php post_views(); ?></span>
                <span><i class="iconfont icon-like"></i><?php show_like(); ?></span>
                <span><i class="iconfont icon-message"></i><?php $id=$post->ID; echo get_post($id)->comment_count;?></span>
                <?php if (is_user_logged_in()){ echo '<span><i class="iconfont icon-brush"></i>'; edit_post_link('编辑'); echo '</span>';} ?>
            </div>
        </hgroup>
        <article class="content">
            <?php while (have_posts()): the_post(); the_content(); endwhile; ?>
        </article>
        <section class="footer">
            <div class="info">
                <span class="tags"><?php echo get_the_tag_list('','',''); ?></span>
                <button id="post-like" data-action="ding" data-id="<?php the_ID(); ?>" class="like<?php if(isset($_COOKIE['bigfa_ding_'.$post->ID])) echo ' like-done';?>">
                    <i class="iconfont icon-like_fill"></i> 
                    <span class="count">
                        <?php 
                            if( get_post_meta($post->ID,'bigfa_ding',true) ){            
                                echo get_post_meta($post->ID,'bigfa_ding',true);
                            } else {
                                echo '0';
                            }
                        ?>
                    </span>
                </button>
                <button class="redpacket"><i class="iconfont icon-redpacket_fill"></i></button>
                <button class="share"><i class="iconfont icon-share_fill"></i></button>
            </div>
            <div class="navigation">
                <span class="pre"><span>上一篇：</span><?php if (get_previous_post()) previous_post_link('%link'); else echo "无"; ?></span>
                <span class="next"><span>下一篇：</span><?php if (get_next_post()) next_post_link('%link'); else echo "无"; ?></span>
            </div>
        </section>
        <?php comments_template(); ?>
    </div>
</div>
<?php get_footer(); ?>
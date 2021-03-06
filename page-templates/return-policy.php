<?php
/**
 * Template name: Template Return Policy
 */

get_header('home-1'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main return-policy privacy-policy" role="main">
            <div class="container">
                <?php get_breadcrumb() ?>
                <div class="privacy-policy-wrapper return-policy-wrapper">
                    <div class="sidebar">
                        <?php echo get_field('return_policy_sidebar') ?>
                    </div>    
                    <div class="content">
                        <div class="desc">
                            <?php echo get_field('description') ?>
                        </div>
                        <?php 
                            $content=get_field('return_policy_content');
                            if($content) :
                                foreach($content as $content_item) :
                                   
                        ?>
                            <div class="block__content">
                                <div class="title">
                                    <?php echo $content_item['return_policy_category'] ?>
                                </div>
                                <div class="sub-title">
                                    <?php echo $content_item['answer'] ?>
                                </div>
                                <?php
                                    $extra_block = $content_item['extra_block'];
                                        if($extra_block) :
                                            foreach($extra_block as $extra_block_item) :
                                ?>
                                        <div class="extra-block">
                                            <div class="extra-title">
                                                <?php echo $extra_block_item['title'] ?>
                                            </div>
                                            <div class="extra-desc">
                                                <?php echo $extra_block_item['description'] ?>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </div>
                            <?php endforeach ?>
                        <?php endif ?>
                    </div>
                </div>        
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer('home-1');

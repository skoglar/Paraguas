<?php
    function tab_content_by_tag($posts_tag = 'uncategorized'){
        // the query
        $the_query = new WP_Query( array(
            'category_name' => $posts_tag,
            'posts_per_page' => 3,
        )); 
        //The Body
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post();
                $post_link = get_permalink();
                $post_title = substr(get_the_title(), 0, 25);
                $thumbnail_url = get_the_post_thumbnail_url();
                $placeholder_thumb = 'https://images\.pexels\.com/photos/17739/pexels-photo\.jpg?auto=compress&cs=tinysrgb&h=750&w=1260';
                
                echo <<<POSTS
                    <div class="flex-fill tab-box">
                        <a href={$post_link}>{$post_title}</a><br>
                        <a href={$post_link}>
                            <img class="tab-thumbnail" src={$thumbnail_url} alt=the_title()>
                        </a>
                    </div>
                POSTS;
            endwhile;
            wp_reset_postdata();
        else :
            $placeholder_thumb = 'https://images.pexels.com/photos/17739/pexels-photo.jpg?auto=compress&cs=tinysrgb&h=750&w=1260';
            for ($i=0; $i < 3; $i++) { 
                echo <<<POSTS
                <div class="flex-fill tab-box">
                <a href="/">Nada en esta sección</a><br>
                <a href={$post_link}>
                    <img class="tab-thumbnail" src={$placeholder_thumb} alt="No se encontraron posts">
                </a>
                </div>
                POSTS;
            }
        endif;
    }

    function carousel_content_by_tag($post_tag = 'uncategorized'){
        
            // Get 3 posts tagged with Novedades
            $the_query = new WP_Query( 
                array(
                    'category_name' => $post_tag,
                    'posts_per_page' => 3,
                )
            ); 
    
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post();
                $post_link = get_permalink();
                $post_title = get_the_title();
                $thumbnail_url = get_the_post_thumbnail_url();
                $div_classes = 'carousel-item';

                if (0 == $the_query->current_post) {
                    $div_classes = 'carousel-item active';
                }
                echo <<<DIVBODY
                <div class="{$div_classes}">
                    <img class="d-block w-100" src="${thumbnail_url}"  alt="{$post_title}">
                </div>
                DIVBODY;
            endwhile;
            wp_reset_postdata();
        else :
            $post_title = 'NO ENTRIES';
            $thumbnail_url = get_the_post_thumbnail_url();

            echo <<<DIVBODY
            <div class="carousel-item active">
                <img class="d-block w-100" src="https://images.pexels.com/photos/17739/pexels-photo.jpg"  alt="{$post_title}">
            </div>
            DIVBODY;
        endif;
    }
?>
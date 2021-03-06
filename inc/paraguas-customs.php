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
                //$post_title = substr(get_the_title(), 0, 25);
                $post_title = get_the_title();
                $thumbnail_url = get_the_post_thumbnail_url();
                $placeholder_thumb = 'https://images\.pexels\.com/photos/17739/pexels-photo\.jpg?auto=compress&cs=tinysrgb&h=400&w=400';
                $excerpt = get_the_excerpt();
                $excerpt = substr($excerpt, 0, 60);
                // if (strlen($post_title) > 35) 
                // {
                //     $post_title = wordwrap($post_title, 35);
                //     $post_title = substr($post_title, 0, strpos($post_title, "\n"));
                // }
                echo <<<POSTS
                <div class="card showcase-card">
                    <div class="card-body">
                        <a class="card-title" href={$post_link}>{$post_title}</a>
                    </div>
                    <a href={$post_link}>
                        <img class="tab-thumbnail" src="{$thumbnail_url}" alt="Card image">
                    </a>
                    <div class="card-body">
                        <div class="card-body-container">
                            <!-- <p class="card-text">{$excerpt}</p> -->
                        </div>
                    </div>
                </div>
                POSTS;
            endwhile;
            wp_reset_postdata();
        else :
            $placeholder_thumb = 'https://images.pexels.com/photos/17739/pexels-photo.jpg?auto=compress&cs=tinysrgb&h=400&w=400';
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
    function tab_content_by_type($posts_type = 'post'){
        // the query
        $the_query = new WP_Query( array(
            'post_type' => $posts_type,
            'posts_per_page' => 3,
        )); 
        //The Body
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post();
                $post_link = get_permalink();
                //$post_title = substr(get_the_title(), 0, 25);
                $post_title = get_the_title();
                $thumbnail_url = get_the_post_thumbnail_url();
                $placeholder_thumb = 'https://images\.pexels\.com/photos/17739/pexels-photo\.jpg?auto=compress&cs=tinysrgb&h=400&w=400';
                $excerpt = get_the_excerpt();
                $excerpt = substr($excerpt, 0, 60);
                // if (strlen($post_title) > 35) 
                // {
                //     $post_title = wordwrap($post_title, 35);
                //     $post_title = substr($post_title, 0, strpos($post_title, "\n"));
                // }
                echo <<<POSTS
                <div class="card showcase-card portada-card">
                    <a href={$post_link}>
                        <img class="tab-thumbnail" src="{$thumbnail_url}" alt="Card image">
                    </a>
                </div>
                POSTS;
            endwhile;
            wp_reset_postdata();
        else :
            $placeholder_thumb = 'https://images.pexels.com/photos/17739/pexels-photo.jpg?auto=compress&cs=tinysrgb&h=400&w=400';
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
                    <img class="d-block carousel-image" src="${thumbnail_url}"  alt="{$post_title}">
                </div>
                DIVBODY;
            endwhile;
            wp_reset_postdata();
        else :
            $post_title = 'NO ENTRIES';
            $thumbnail_url = get_the_post_thumbnail_url();

            echo <<<DIVBODY
            <div class="carousel-item active">
                <img class="d-block carousel-image" src="https://images.pexels.com/photos/17739/pexels-photo.jpg"  alt="{$post_title}">
            </div>
            DIVBODY;
        endif;
    }

    function carousel_content_by_option(){
        $first = true;
        $div_classes = 'carousel-item active';

        foreach (range(1, 3) as $number) {
            $img = get_theme_mod( 'paraguas_carousel_img_' . $number );
            $img_url = wp_get_attachment_url($img);
            $link = get_theme_mod( 'paraguas_carousel_img_link_' . $number );
            if ($link == 'None') {
                $link = '#';
            }

            if ($img != null) {
                echo <<<DIVBODY
                <div class="{$div_classes}">
                    <a href="{$link}">
                        <img class="d-block carousel-image" src="{$img_url}"  alt="{$post_title}">
                    </a>
                </div>
                DIVBODY;
                if($first) {
                    $div_classes = 'carousel-item';
                    $first = false;
                }
            }
        }
    }

    function short_excerpt($max_length = 160){
        $excerpt = get_the_excerpt();
        if (preg_match('/^.{1,'.$max_length.'}\b/s', $excerpt, $match))
        {
            $line=$match[0];
        }
        echo $line . ' [...]';
    }
?>
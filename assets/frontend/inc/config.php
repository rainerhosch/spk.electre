<?php
/**
 * config.php
 *
 * Author: pixelcave
 *
 * Configuration file. It contains variables used in the template as well as the primary navigation array from which the navigation is created
 *
 */

/* Template variables */
$template = array(
    'name'          => 'ProUI Frontend',
    'author'        => 'pixelcave',
    'robots'        => 'noindex, nofollow',
    'title'         => 'ProUI Frontend - Responsive Bootstrap Site Template',
    'description'   => 'ProUI Frontend is a Responsive Bootstrap Site Template created by pixelcave and added as a bonus in ProUI Admin Template package which is published on Themeforest.',
    // true             for a boxed layout
    // false            for a full width layout
    'boxed'         => false,
    'active_page'   => basename($_SERVER['PHP_SELF'])
);

/* Primary navigation array (the primary navigation will be created automatically based on this array) */
$primary_nav = array(
    array(
        'name'  => 'Home',
        'sub'   => array(
            array(
                'name'  => 'Full Width',
                'url'   => 'index.php'
            ),
            array(
                'name'  => 'Full Width (Dark)',
                'url'   => 'index_alt.php'
            ),
            array(
                'name'  => 'Full Width Parallax',
                'url'   => 'index_parallax.php'
            ),
            array(
                'name'  => 'Full Width Video',
                'url'   => 'index_video.php'
            ),
            array(
                'name'  => 'Boxed',
                'url'   => 'index_boxed.php'
            ),
            array(
                'name'  => 'Boxed (Dark)',
                'url'   => 'index_boxed_alt.php'
            ),
            array(
                'name'  => 'Boxed Parallax',
                'url'   => 'index_boxed_parallax.php'
            ),
            array(
                'name'  => 'Boxed Video',
                'url'   => 'index_boxed_video.php'
            )
        )
    ),
    array(
        'name'  => 'Pages',
        'sub'   => array(
            array(
                'name'  => 'Blog',
                'url'   => 'blog.php'
            ),
            array(
                'name'  => 'Blog Post',
                'url'   => 'blog_post.php'
            ),
            array(
                'name'  => 'Portfolio 4 Columns',
                'url'   => 'portfolio_4.php'
            ),
            array(
                'name'  => 'Portfolio 3 Columns',
                'url'   => 'portfolio_3.php'
            ),
            array(
                'name'  => 'Portfolio 2 Columns',
                'url'   => 'portfolio_2.php'
            ),
            array(
                'name'  => 'Portfolio Single',
                'url'   => 'portfolio_single.php'
            ),
            array(
                'name'  => 'Team',
                'url'   => 'team.php'
            ),
            array(
                'name'  => 'Helpdesk',
                'url'   => 'helpdesk.php'
            ),
            array(
                'name'  => 'Jobs',
                'url'   => 'jobs.php'
            ),
            array(
                'name'  => 'How it works',
                'url'   => 'how_it_works.php'
            )
        )
    ),
    array(
        'name'  => 'eCommerce',
        'sub'   => array(
            array(
                'name'  => 'Home',
                'url'   => 'ecom_home.php'
            ),
            array(
                'name'  => 'Search Results',
                'url'   => 'ecom_search_results.php'
            ),
            array(
                'name'  => 'Product List',
                'url'   => 'ecom_product_list.php'
            ),
            array(
                'name'  => 'Product',
                'url'   => 'ecom_product.php'
            ),
            array(
                'name'  => 'Product Comparison',
                'url'   => 'ecom_product_comparison.php'
            ),
            array(
                'name'  => 'Shopping Cart',
                'url'   => 'ecom_shopping_cart.php'
            ),
            array(
                'name'  => 'Checkout',
                'url'   => 'ecom_checkout.php'
            )
        )
    ),
    array(
        'name'  => 'Features',
        'url'   => 'features.php'
    ),
    array(
        'name'  => 'Pricing',
        'url'   => 'pricing.php'
    ),
    array(
        'name'  => 'Contact',
        'url'   => 'contact.php'
    ),
    array(
        'name'  => 'About',
        'url'   => 'about.php'
    )
);
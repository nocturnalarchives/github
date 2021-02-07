<?php

//************************************************************************
// Table of Content
//
// 6ln.com
// 8L3.com
// AmandasBakery.com
// Atlasws.net
// CookingHacks.com
// CulinaryReviewer.com
// DoodleWatcher.com
// GraywolfSEO.com
// LiterallyRacist.com
// LongIslandPromotional.com
// MiamiBeachAdvisor.com
// PatriotMinear.net
// OcasioMemes.com
// SevenPack.net
// Taylor-Lorenz.com
// Taylor-Lorenz.net
// WDLD-com
// WPIR-org
// zxpqst.com
//
//
//
//************************************************************************

// base settings
// fold
$GLOBALS['woopricerangedisable'] = false;
$GLOBALS['woofootercartlinksdisable'] = false;
$GLOBALS['woocommerce_enable_atlasws'] = false;
$GLOBALS['woocols'] = 30;
$GLOBALS['woocolumns'] = 5;
$GLOBALS['defaultfilesizes'] = true;
$GLOBALS['atlaslongtermdatecheck'] = true;
$GLOBALS['atlaslongtermdateyearcheck'] = false;
$GLOBALS['atlaslongtermdatemonthcheck'] = false;
$GLOBALS['atlaslongtermdatechecknum'] = 5;
$GLOBALS['atlaslongtermdatechecknum'] = 10;
$GLOBALS['atlaslongtermdateupdnum'] = 0;
$GLOBALS['atlasbumpdays'] = 30;
$GLOBALS['atlasbigbumpdays'] = 100;
$GLOBALS['atlaslongtermdateupdovernum'] = 0;
$GLOBALS['atlaslongtermdateupdoverresetnum'] = 10;
$GLOBALS['atlasmindays'] = 7;
$GLOBALS['atlasmaxdays'] = 60;
// endfold

// 4.0.1 Domain Checks /
//
// fold

    // 6LN.com
    // fold
    if ($aws_domain == "6ln.com"){

    }
    // endfold


    //8L3.com
    // fold
    if ($aws_domain == "8l3.com"){

    }
    // endfold


    // AdvertiserBlockList.com
    // fold
    if ($aws_domain == "advertiserblocklist.com"){
        //set the GTM ID
        $GLOBALS['aws_gtm'] = "GTM-N9F78X7";
        $GLOBALS['aws_arch_flag'] = TRUE; //when the date update runs modify the post enough to trigger the minor edits plugin and re-archive the posts
    }
    // endfold

    // AmandasBakery.com
    // fold
    if ($aws_domain == "amandasbakery.com"){
        //set the GTM ID
        $GLOBALS['aws_gtm'] = "GTM-53H3DJ4";
        $GLOBALS['aws_arch_flag'] = TRUE; //when the date update runs modify the post enough to trigger the minor edits plugin and re-archive the posts
        $GLOBALS['aws_home_frequent'] = true; //Don't let the homepage get old
    }
    // endfold

    // Atlasws.net
    // fold
    if ($aws_domain == "atlasws.net"){
        //set the GTM ID
        $GLOBALS['aws_gtm'] = "GTM-NZB6DTF";

    }
    // endfold

    // AWGR.com
    // fold
    if ($aws_domain == "awgr.com"){
        //set the GTM ID
        //$GLOBALS['aws_gtm'] = "";
    	$GLOBALS['meme_author_id'] = 5; // MEME AUTHOR
    }
    // endfold

    //CookingHacks.com
    // fold
    if ($aws_domain == "cookinghacks.com"){
        //set the GTM ID
        $GLOBALS['aws_gtm'] = "GTM-5DVQ7DD";
        $GLOBALS['aws_arch_flag'] = TRUE; //when the date update runs modify the post enough to trigger the minor edits plugin and re-archive the posts
        $GLOBALS['aws_home_frequent'] = true; //Don't let the homepage get old

        $adsense_publisher_id = "ca-pub-6382211739298596"; //Adsense Publisher ID
        //CH AMP Featured Image RESPONSIVE - 9537883484
        //CH AMP Featured Image 300x250 - 2700212003
        //CH AMP Featured Image 320x50 - 8719659595
        $a=array("8719659595","9537883484","2700212003");
        $ad_slot_featured=array_rand($a,1); // Adslot Under Featured

        //CH AMP Paragraph 5 RESPONSIVE - 4272363335
        //CH AMP Paragraph 5 300x250 - 9737636917
        //CH AMP Paragraph 5 320x50 - 5366861654
        $b=array("9737636917","4272363335","5366861654");
        $bb=array_rand($b,1);

        //CH AMP Paragraph 9 RESPONSIVE - 4272363335
        //CH AMP Paragraph 9 300x250 - 8193455101
        //CH AMP Paragraph 9 320x50 - 4848697347
        $c=array("4848697347","4272363335","8193455101");
        $cc=array_rand($c,1);
        $ad_units = array(
            5 => $bb, // paragraph and ad slot
            9 => $cc, // paragraph and ad slot
        );
    }

    // endfold

    // CulinaryReviewer.com
    // fold
    if ($aws_domain == "culinaryreviewer.com"){
        //set the GTM ID
        $GLOBALS['aws_gtm'] = "GTM-K5M9N58";
        $GLOBALS['aws_nav_search'] = true; // add search to main nav menu
    	$GLOBALS['aws_nav_search_icon'] = true; // change search button to icon
        $GLOBALS['aws_arch_flag'] = TRUE; //when the date update runs modify the post enough to trigger the minor edits plugin and re-archive the posts
    	$GLOBALS['aws_home_frequent'] = true; //Don't let the homepage get old
    }

    // endfold

    // GraywolfSEO.com
    // fold
    if ($aws_domain == "graywolfseo.com"){
        //set the GTM ID
        $GLOBALS['aws_gtm'] = "GTM-58JXPW9";
    	remove_action( 'genesis_entry_footer', 'genesis_prev_next_post_nav' ); //removed prev/next navigation
        $GLOBALS['aws_arch_flag'] = TRUE; //when the date update runs modify the post enough to trigger the minor edits plugin and re-archive the posts
    }
    // endfold

    // Kathika.com
    // fold
    if ($aws_domain == "kathika.com"){
        $adsense_publisher_id = "ca-pub-6382211739298596"; //Adsense Publisher ID
        //Kathika AMP Featured Image RESPONSIVE -
        //Kathika AMP Featured Image 300x250 -
        //Kathika AMP Featured Image 320x50 -
        $a=array("","","");
        $ad_slot_featured=array_rand($a,1); // Adslot Under Featured

        //Kathika AMP Paragraph 5 RESPONSIVE -
        //Kathika AMP Paragraph 5 300x250 -
        //Kathika AMP Paragraph 5 320x50 -
        $b=array("","","");
        $bb=array_rand($b,1);

        //Kathika AMP Paragraph 9 RESPONSIVE - 3247110172
        //Kathika AMP Paragraph9 300x250 - 7891036928
        //Kathika AMP Paragraph 9 320x50 - 2183963413
        $c=array("3247110172","2183963413","7891036928");
        $cc=array_rand($c,1);

        $ad_units = array(
            5 => $bb, // paragraph and ad slot
            9 => $cc, // paragraph and ad slot
        );
    }
    // endfold

    // LiterallyRacist.com
    // fold
    if ($aws_domain == "literallyracist.com"){
        //set the GTM ID
        $GLOBALS['aws_gtm'] = "GTM-TQNGQXD";
        $GLOBALS['aws_arch_flag'] = TRUE; //when the date update runs modify the post enough to trigger the minor edits plugin and re-archive the posts
        //Site Based Options
        remove_action( 'genesis_before_content_sidebar_wrap', 'genesis_do_breadcrumbs' ); //remove existing bredcrumb position
    	add_action( 'genesis_entry_header', 'genesis_do_breadcrumbs', 12 ); //move it to under the heading
    	$GLOBALS['aws_meta_info_disp'] = true; //we are going to turn off the post meta info in section
    	$GLOBALS['aws_home_frequent'] = true; //Don't let the homepage get old
    }
    // endfold

    // LongIslandPromotional.com
    // fold
    if ($aws_domain == "longislandpromotional.com"){
        //set the GTM ID
        $GLOBALS['aws_gtm'] = "GTM-W74ZHLV";
        $GLOBALS['woocommerce_enable_atlasws'] = true;
        $GLOBALS['woocols'] = 30;
        $GLOBALS['woocolumns'] = 5;
        $GLOBALS['wooupsellnum'] = 5;
        $GLOBALS['wooupsellcols'] = 5;
        $GLOBALS['woocrosssellnum'] = 4;

        //Site Based Options
        $GLOBALS['aws_arch_flag'] = TRUE; //when the date update runs modify the post enough to trigger the minor edits plugin and re-archive the posts
        remove_action( 'genesis_before_content_sidebar_wrap', 'genesis_do_breadcrumbs' ); //remove existing bredcrumb position
    	//add_action( 'genesis_entry_header', 'genesis_do_breadcrumbs', 12 ); //move it to under the heading
    	//$GLOBALS['aws_meta_info_disp'] = true; //we are going to turn off the post meta info in section
    	$GLOBALS['aws_home_frequent'] = true; //Don't let the homepage get old
        $GLOBALS['woopricerangedisable'] = true;
        $GLOBALS['woofootercartlinksdisable'] = true;
        $GLOBALS['defaultfilesizes'] = false;


        add_image_size( 'home-top', 750, 420, true );
    	add_image_size( 'large-rectangle', 600, 336, true );
    	add_image_size( 'square-1', 400, 400, false );
    	add_image_size( 'square-2', 200, 200, false );


    }
    // endfold

    // LongIslandShirt.com
    // fold
    if ($aws_domain == "longislandshirt.com"){
        //set the GTM ID
        $GLOBALS['aws_gtm'] = "GTM-W74ZHLV";
        $GLOBALS['woocommerce_enable_atlasws'] = true;
        $GLOBALS['woocols'] = 30;
        $GLOBALS['woocolumns'] = 5;
        $GLOBALS['wooupsellnum'] = 5;
        $GLOBALS['wooupsellcols'] = 5;
        $GLOBALS['woocrosssellnum'] = 4;

        //Site Based Options
        remove_action( 'genesis_before_content_sidebar_wrap', 'genesis_do_breadcrumbs' ); //remove existing bredcrumb position
    	//add_action( 'genesis_entry_header', 'genesis_do_breadcrumbs', 12 ); //move it to under the heading
    	//$GLOBALS['aws_meta_info_disp'] = true; //we are going to turn off the post meta info in section
    	$GLOBALS['aws_home_frequent'] = true; //Don't let the homepage get old
        $GLOBALS['woopricerangedisable'] = true;
        $GLOBALS['woofootercartlinksdisable'] = true;
        $GLOBALS['defaultfilesizes'] = false;


        add_image_size( 'home-top', 750, 420, true );
    	add_image_size( 'large-rectangle', 600, 336, true );
    	add_image_size( 'square-1', 400, 400, false );
    	add_image_size( 'square-2', 200, 200, false );


    }
    // endfold

    //MiamiBeachAdvsor.Com
    // fold
    if ($aws_domain == "miamibeachadvisor.com"){
        //set the GTM ID
        $GLOBALS['aws_gtm'] = "GTM-KFP2226";
        $GLOBALS['aws_arch_flag'] = TRUE; //when the date update runs modify the post enough to trigger the minor edits plugin and re-archive the posts
        $GLOBALS['aws_home_frequent'] = true; //Don't let the homepage get old
        $adsense_publisher_id = "ca-pub-6382211739298596"; //Adsense Publisher ID
        //MBA AMP Featured Image RESPONSIVE - 7257618353
        //MBA AMP Featured Image 300x250 - 8586360869
        //MBA AMP Featured Image 320x50 - 5030259233
        $a=array("7257618353","8586360869","5030259233");
        $ad_slot_featured=array_rand($a,1);

        //MBA AMP Paragraph 5 RESPONSIVE - 8004434254
        //MBA AMP Paragraph 5 300x250 - 6724105544
        //MBA AMP Paragraph 5 320x50 - 9607373463
        $b=array("8004434254","6724105544","9607373463");
        $bb=array_rand($b,1);

        //MBA AMP Paragraph 9 RESPONSIVE - 1752273093
        //MBA AMP Paragraph 9 300x250 - 9352647624
        //MBA AMP Paragraph 9 320x50 - 1533867359
        $c=array("1752273093","9352647624","1533867359");
        $cc=array_rand($c,1);
        $ad_units = array(
            5 => $bb, // paragraph and ad slot
            9 => $cc, // paragraph and ad slot
        );
    }

    // endfold

    // NocturnalArchives.com
    // fold
    if ($aws_domain == "nocturnalarchives.com"){
        //set the GTM ID
        $GLOBALS['aws_gtm'] = "GTM-TSD7H98";
        $GLOBALS['aws_arch_flag'] = TRUE; //when the date update runs modify the post enough to trigger the minor edits plugin and re-archive the posts
    	$GLOBALS['aws_home_frequent'] = true; //Don't let the homepage get old
    	$GLOBALS['meme_author_id'] = 5; // MEME AUTHOR
    }

    // endfold

    // OcasioMemes.com
    // fold
    if ($aws_domain == "ocasiomemes.com"){
        //set the GTM ID
        $GLOBALS['aws_gtm'] = "GTM-KB3BWTF";
        $GLOBALS['aws_arch_flag'] = TRUE; //when the date update runs modify the post enough to trigger the minor edits plugin and re-archive the posts
        $GLOBALS['aws_home_frequent'] = true; //Don't let the homepage get old
        $GLOBALS['meme_author_id'] = 4; // MEME AUTHOR
    }
    // endfold

    // PatriotMinear.com
    // fold
    if ($aws_domain == "patriotminear.com"){
        //set the GTM ID
        $GLOBALS['aws_gtm'] = "GTM-T995KTG";
        $GLOBALS['aws_arch_flag'] = TRUE; //when the date update runs modify the post enough to trigger the minor edits plugin and re-archive the posts
        $GLOBALS['adversarial_redirect_url'] = "https://www.chickswithdicks.com/"; //this is an override of adversarial redirect
    	$GLOBALS['aws_home_frequent'] = true; //Don't let the homepage get old
    	$GLOBALS['meme_author_id'] = 5; // MEME AUTHOR
    }

    // endfold

    // PatriotMinear.net
    // fold
    if ($aws_domain == "patriotminear.net"){
        //set the GTM ID
        $GLOBALS['aws_gtm'] = "GTM-N5NSHHC";
        $GLOBALS['aws_arch_flag'] = TRUE; //when the date update runs modify the post enough to trigger the minor edits plugin and re-archive the posts

    }
    // endfold



    // Taylor-Lorenz.com
    // fold
    if ($aws_domain == "taylor-lorenz.com"){
        //set the GTM ID
        $GLOBALS['aws_gtm'] = "GTM-KTJK5MN";
        $GLOBALS['aws_arch_flag'] = TRUE; //when the date update runs modify the post enough to trigger the minor edits plugin and re-archive the posts
        $GLOBALS['aws_home_frequent'] = true; //Don't let the homepage get old
    }

    // endfold


    // Taylor-Lorenz.net
    // fold
    if ($aws_domain == "taylor-lorenz.net"){
        //set the GTM ID
        $GLOBALS['aws_gtm'] = "GTM-W4CXSNH";
        $GLOBALS['aws_arch_flag'] = TRUE; //when the date update runs modify the post enough to trigger the minor edits plugin and re-archive the posts
        $GLOBALS['aws_home_frequent'] = true; //Don't let the homepage get old
    }
    // endfold


    // WPIR-org
    // fold
    if ($aws_domain == "whiteprivilegeisntreal.org"){
        //set the GTM ID
        $GLOBALS['aws_gtm'] = "GTM-PCLZ2ZP";
        $GLOBALS['aws_home_frequent'] = true; //Don't let the homepage get old
        $GLOBALS['aws_arch_flag'] = TRUE; //when the date update runs modify the post enough to trigger the minor edits plugin and re-archive the posts
    }
    // endfold



    // zxpqst.com
    // fold
    if ($aws_domain == "zxpqst.com"){
        //set the GTM ID
        $GLOBALS['aws_gtm'] = "GTM-NCTBNRV";

    }
    // endfold


// endfold

// 4.0.2 If we have a value for $aws_gtm execute the GTM code /
// fold
if ($GLOBALS['aws_gtm'] != ""){
    // Add Google Tag Manager code in <head>
    add_action( 'wp_head', 'sk_google_tag_manager1' );
    function sk_google_tag_manager1() { ?>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','<?=$GLOBALS['aws_gtm']?>');</script>
    <!-- End Google Tag Manager -->
    <?php }

    add_action( 'genesis_before', 'sk_google_tag_manager2' );
    function sk_google_tag_manager2() { ?>
    	<!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?=$GLOBALS['aws_gtm']?>"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php }
}
// endfold


// 4.0.3 Woo Commerce Conditional Coding
// fold

    // this code only executes if woocommerce is being used
    // fold


        // 4.0.3.1 Woo Commerce Disable Price Ranges
        // fold
        if($GLOBALS['woopricerangedisable']){
            function wc_varb_price_range( $wcv_price, $product ) {
                //$prefix = sprintf('%s: ', __('', 'wcvp_range'));
                $wcv_reg_min_price = $product->get_variation_regular_price( 'min', true );
                $wcv_min_sale_price    = $product->get_variation_sale_price( 'min', true );
                $wcv_max_price = $product->get_variation_price( 'max', true );
                $wcv_min_price = $product->get_variation_price( 'min', true );
                $wcv_price = ( $wcv_min_sale_price == $wcv_reg_min_price ) ?
                wc_price( $wcv_reg_min_price ) :
                '<del>' . wc_price( $wcv_reg_min_price ) . '</del>' . '<ins>' . wc_price( $wcv_min_sale_price ) . '</ins>';
                return ( $wcv_min_price == $wcv_max_price ) ?
                $wcv_price :
                sprintf('%s%s', $prefix, $wcv_price);
            }

            add_filter( 'woocommerce_variable_sale_price_html', 'wc_varb_price_range', 10, 2 );
            add_filter( 'woocommerce_variable_price_html', 'wc_varb_price_range', 10, 2 );

        }
        // endfold





// endfold


// endfold
?>

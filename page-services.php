<?php
/**
 * Template Name: Service
 * 
 * @package WordPress
 */
get_header();
global $post;
?>
<?php 
$id =  $post->ID;
$label = get_field( "label", $id );
$heading = get_field( "heading", $id );
$description = get_field( "description", $id );
$button = get_field( "button", $id );
$image = get_field( "image", $id );
$our_experience = get_field( "our_experience", $id );
$service_description = get_field( "service_description", $id );
$industry = get_field("industry", $id);
$agriculture_and_forestry = get_field( "agriculture_and_forestry", $id );
$business_services = get_field( "business_services", $id );
$consumer = get_field( "consumer", $id );
$finance_tech = get_field( "finance_tech", $id );
$industrial = get_field( "industrial", $id );
$life_science = get_field( "life_science", $id );
?>
<section class="service_banner">
    <div class="flex">
        <div class="service_info">
            <h5><?php echo $label; ?></h5>
            <h1><?php echo $heading; ?></h1>
            <div class="service_description"><?php echo $description; ?></div>
            <?php if(!empty($button['title'])) : ?>
                <a href = "<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
            <?php endif; ?>
        </div>
        <div class="service_media">
            <img src = "<?php echo $image['url']; ?>">
        </div>
    </div>
</section>
<section class="services_container">
    <div class="service_meta">
        <h1><?php echo $our_experience; ?></h1>
        <div class="service_description"><?php echo $service_description; ?></div>
    </div>
    <div class="services">
        <?php
        function get_services($service_industry){
            foreach ( $service_industry as $service_industry_service ) {
                $client_image = get_field("client_image", $service_industry_service);
                $company_image = get_field("company_image", $service_industry_service);
                $client_name = get_field("client_name", $service_industry_service);
                $category = get_field("category", $service_industry_service);
                $companies = get_field("companies", $service_industry_service);
                $pre_heading = get_field("pre_heading", $service_industry_service);
                ?>
                <div class="service">
                    <div class="service_images">
                        <div class="client_image">
                            <img src="<?php echo $client_image['url']; ?>" >
                        </div>
                        <?php if(!empty($company_image['url'])) : ?>
                            <div class="company_image">
                                <img src="<?php echo $company_image['url']; ?>" >
                            </div>
                        <?php endif; ?>
                    </div>
                    <h3><?php echo get_the_title($service_industry_service); ?></h3>
                    <h4><b><?php echo $category; ?></b></h4>
                    <h4><?php echo $pre_heading; ?> 
                        <?php
                        foreach ($companies as $single_company) {
                            $company = $single_company['company_link'];
                            if(!empty($company['title'])) : ?>
                                <a href = "<?php echo $company['url']; ?>" target="<?php echo $company['target']; ?>"><?php echo $company['title']; ?></a>
                            <?php endif;
                        }
                        ?>
                    </h4>
                    <p><?php echo get_the_excerpt($service_industry_service); ?></p>
                </div>
                <?php
            }
        }
        if($industry == "Agriculture and Forestry") {
            get_services($agriculture_and_forestry);
        }
        elseif ($industry == "Business Services") {
            get_services($business_services);
        }
        elseif ($industry == "Consumer") {
            get_services($consumer);
        }
        elseif ($industry == "Finance Tech") {
            get_services($finance_tech);
        }
        elseif ($industry == "Industrial") {
            get_services($industrial);
        }
        elseif ($industry == "Life Science") {
            get_services($life_science);
        }
        ?>
    </div>
</section>
<?php get_footer();
<?php
if (!defined("ROOT")) {
    die();
}

$site = Site::get();
?>

        <!-- Header to grab users attention -->
        <header class="header header--<?php echo $pageId; ?>">
            <div class="header__overlay">
                <div class="container">
                    <h1 class="header__title"><?php echo $title ?></h1>
                    <hr class="header__line-breaker" />
                    <h2 class="header__description"><?php echo $description ?></h2>
                    <button class="header__scroll-to-content js-scroll-to-content">
                        <span class="screen-reader-text">Scroll to main content</span>
                        <?php renderFile("/assets/images/down-arrow.svg"); ?>
                    </button>
                </div>
            </div>
        </header>

        <!-- Main content for page -->
        <main class="main-content">
            <div class="main-content__inner">
                <!-- Start dynamic content for page -->

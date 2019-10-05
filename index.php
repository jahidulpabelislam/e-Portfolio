<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/classes/init.php");

$site = Site::get();
$page = Page::get();

$headDesc = "Portfolio of Jahidul Pabel Islam, a Full Stack Developer in Web &amp; Software based at Bognor Regis, West Sussex down in the South Coast of England.";

$pageData = [
    "headDesc" => $headDesc,
    "headerTitle" => "Jahidul Pabel Islam",
    "headerDesc" => "Full Stack Developer",
];
$page->addPageData($pageData);

$site::echoConfig();

$page->renderHTMLHead();
$page->renderNav();
$page->renderHeader();

// Work out the time since I started to today
$yearsSinceStarted = getTimeDifference($site::JPI_START_DATE, getNowDateTime(), "%y");
?>

                <section>
                    <div class="article home__hello-wrapper">
                        <div class="container">
                            <h3 class="home__hello faux-heading"><span class="main-hello">Hello</span> there everyone!</h3>
                            <img class="home-hello__img" src="<?php echoWithAssetVersion("/assets/images/jahidul-pabel-islam-smart.jpg"); ?>" alt="Jahidul Pabel Islam Graduating" />
                            <img class="home-hello__img home-hello__logo" src="<?php echoWithAssetVersion("/assets/images/logos/jpi-inverted.png"); ?>" alt="Jahidul Pabel Islam's Logo" />
                        </div>
                    </div>

                    <div class="article home__intro-wrapper">
                        <div class="container">
                            <p>Welcome to my portfolio, thanks for clicking on my website!</p>
                        </div>
                    </div>

                    <div class="article">
                        <div class="container">
                            <p>Most of my drive and passion lives in developing all kinds of software from websites to applications.</p>
                            <p>Always looking into new or upcoming languages and frameworks to learn how to improve ongoing projects while also expanding my knowledge.</p>
                            <p>
                                Currently working as a Web Developer at
                                <a class="link-styled" href="https://d3r.com/" title="Link to D3R website." target="_blank" rel="noopener noreferrer">D3R</a>.
                            </p>
                            <p>
                                Reside in
                                <a class="link-styled" href="https://goo.gl/maps/KEJgpYCxm6x" title="Link to map of Bognor Regis." target="_blank" rel="noopener noreferrer">West Sussex</a>, down in the south coast of England.
                            </p>
                        </div>
                    </div>

                    <div class="article">
                        <div class="container">
                            <p>
                                Here you will be able to look at all the <a class="link-styled" href="<?php $site->echoURL("projects"); ?>">work</a>
                                 I have completed over the last <?php echo $yearsSinceStarted; ?> years, <a class="link-styled" href="<?php $site->echoURL("about"); ?>">learn about me</a> also
                                <a class="link-styled" href="<?php $site->echoURL("contact"); ?>">contact me</a> for any enquiries or to just provide feedback.
                            </p>
                            <p>So, have a look around my ever-evolving portfolio, as I'm always looking to find different ways to improve my site by experimenting with new technologies and ideas here.</p>
                        </div>
                    </div>
                </section>

                <section class="article article--orange clearfix">
                    <div class="container">
                        <div class="workflow">
                            <div class="workflow__item">
                                <h4 class="article__header">Design</h4>
                                <img class="workflow-item__image" src="<?php echoWithAssetVersion("/assets/images/design-icon.png"); ?>" alt="A image of a paintbrush on a desktop computer" />
                                <div class="workflow-item__description">
                                    <p>
                                        My work only starts after the designer hands over finished designs.<br />
                                        I mainly work from PSD's or flat image files designs.<br />
                                        This is where I turn designs into pixel perfect sites/apps.
                                    </p>
                                </div>
                            </div>
                            <div class="workflow__item">
                                <h4 class="article__header">Responsive</h4>
                                <img class="workflow-item__image" src="<?php echoWithAssetVersion("/assets/images/responsive-icon.png"); ?>" alt="A image of various sized devices: Desktop computer, tablet &amp; mobile phone" />
                                <div class="workflow-item__description">
                                    <p>
                                        Aim to make all sites/apps usable on many different sized devices.<br />
                                        By approach the styling form a mobile first point of view
                                    </p>
                                </div>
                            </div>
                            <div class="workflow__item">
                                <h4 class="article__header">Code</h4>
                                <img class="workflow-item__image" src="<?php echoWithAssetVersion("/assets/images/code-icon.png"); ?>" alt="A image showing code" />
                                <div class="workflow-item__description">
                                    <p>
                                        I tend to develop custom and bespoke systems.<br />
                                        But if the project requires I can use various frameworks or libraries to fulfill the necessary product.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="article projects">
                    <h3 class="article__header">Latest Projects</h3>

                    <i class="projects__loading-img fas fa-spinner fa-spin fa-3x"></i>

                    <div class="slide-show" id="slide-show--home">
                        <div class="slide-show__viewpoint" data-slide-show-id="#slide-show--home">
                            <div class="slide-show__slides-container"></div>
                            <button type="button" class="js-move-slide slide-show__nav-button slide-show__nav--prev-button" data-slide-show-id="#slide-show--home" data-nav-direction="previous">
                                <img class="slide-show__nav slide-show__nav-- slide-show__nav-previous" src="<?php echoWithAssetVersion("/assets/images/previous-inverted.svg"); ?>" alt="Arrow pointing to the right" aria-label="Click to View Previous Image" />
                            </button>
                            <button type="button" class="js-move-slide slide-show__nav-button slide-show__nav--next-button" data-slide-show-id="#slide-show--home" data-nav-direction="next">
                                <img class="slide-show__nav slide-show__nav-- slide-show__nav-next" src="<?php echoWithAssetVersion("/assets/images/next-inverted.svg"); ?>" alt="Arrow pointing to the left" aria-label="Click to View Next Image" />
                            </button>
                        </div>
                        <div class="slide-show__bullets"></div>
                    </div>
                    <p class="feedback feedback--error"></p>

                    <a class="btn" href="<?php $site->echoURL("projects"); ?>">View More Work</a>
                </section>

                <section class="article article--dark-green">
                    <div class="container">
                        <div class="stats js-counters">
                            <?php
                            $speed = 1600;

                            $counterFilePath = ROOT . "/assets/counters.json";
                            if (file_exists($counterFilePath)) {
                                $countersContent = file_get_contents($counterFilePath);
                                $counters = json_decode($countersContent, true);
                            }

                            $totalProjects = $counters["projects"] ?? 60;
                            ?>

                            <div class="stats__item">
                                <p class="article__header article__header--stats js-counter" data-to="<?php echo $yearsSinceStarted; ?>" data-speed="<?php echo $speed; ?>">
                                    <?php echo $yearsSinceStarted; ?>
                                </p>
                                <p class="stats__text">Years experience</p>
                            </div>

                            <div class="stats__item">
                                <p class="article__header article__header--stats js-counter" data-to="<?php echo $totalProjects; ?>" data-speed="<?php echo $speed + 600; ?>">
                                    <?php echo $totalProjects; ?>
                                </p>
                                <p class="stats__text">
                                    Projects
                                </p>
                            </div>
                            <div class="stats__item">
                                <?php $totalCommits = $counters["commits"] ?? 8500; ?>
                                <p class="article__header article__header--stats js-counter" data-to="<?php echo $totalCommits; ?>" data-speed="<?php echo $speed + 1000; ?>">
                                    <?php echo $totalCommits; ?>
                                </p>
                                <p class="stats__text">Commits</p>
                            </div>

                            <div class="stats__item">
                                <p class="article__header article__header--stats js-seconds-on-site">0</p>
                                <p class="stats__text">Seconds on here</p>
                            </div>
                        </div>
                    </div>
                </section>

                <script type="text/template" id="tmpl-slide-template">
                    <div class="slide-show__slide" id="slide-{{ id }}" data-slide-colour="{{ colour }}">
                        <img class="slide-show__img" src="<?php $site::echoProjectImageURL("{{ file }}"); ?>" alt="Screen shot of {{ name }} Project" />
                        <div class="slide-show__info-container">
                            <div class="slide-show__info slide-show__info--{{ colour }}">
                                <div class="slide-info__header">
                                    <h4 class="slide-info__title">{{ name }}</h4>
                                    <time class="slide-info__date">{{ date }}</time>
                                </div>
                                <div class="slide-info__desc">{{ short_description }}</div>
                                <div class="slide-info__links"></div>
                            </div>
                        </div>
                    </div>
                </script>

                <script type="text/template" id="tmpl-slide-bullet-template">
                    <button type="button" class="slide-show__bullet js-slide-show-bullet slide-show__bullet--{{ colour }}" data-slide-show-id="#slide-show--home" data-slide-id="slide-{{ id }}"></button>
                </script>

<?php
$page->addToJSGlobals("projectsPerPage", 3);
$page->addToJSGlobals("jpiAPIEndpoint", removeTrailingSlash($site::getAPIEndpoint()));

$similarLinks = [
    [
        "title" => "Projects",
        "url" => "projects",
        "text" => "View My Work",
        "colour" => "purple",
    ], [
        "title" => "About",
        "url" => "about",
        "text" => "Learn About Me",
        "colour" => "red",
    ],
];
$page->renderFooter($similarLinks);

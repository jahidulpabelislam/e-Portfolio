<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/..//bootstrap.php");

$site = Site::get();
$page = Page::get();

$name = $site::NAME;
$job = $site::JOB;

$headDescription = "Contact or find contact information for $name, a $job based at Bognor Regis, West Sussex down by the South Coast of England.";

$pageData = [
    "title" => "Contact Me",
    "headDescription" => $headDescription,
    "navTint" => "light",
];
$page->addPageData($pageData);

$page->renderHtmlStart();
$page->renderHead();
$page->renderPageStart();
$page->renderNav();
$page->renderContentStart();
?>

<section class="contact-me">
    <div class="container">
        <div class="contact-me__column">
            <div>
                <h1 class="contact-me__title">Contact Me</h1>
                <hr class="contact-me__line-breaker" />
                <p>Drop me an email</p>
            </div>
        </div>
        <div class="contact-me__column">
            <form class="contact-me__form contact-form" name="contact-form" method="POST" action="/contact/form-submission.php">
                <div class="input-group input-group--full">
                    <label for="email-input" class="label">Your Email Address</label>
                    <input type="email" class="input contact-form__email" id="email-input" name="email-input" placeholder="e.g. joe@example.com" title="Email Address" required />
                    <p class="feedback feedback--error contact-form__email-feedback"></p>
                </div>

                <div class="input-group input-group--full">
                    <label for="subject-input" class="label">Subject <span>(optional)</span></label>
                    <input type="text" class="input contact-form_subject" id="subject-input" name="subject-input" placeholder="e.g. Site Feedback" title="Subject of Message" />
                </div>

                <div class="input-group input-group--full">
                    <label for="message-input" class="label">Your Message</label>
                    <textarea class="input contact-form__message" id="message-input" name="message-input" placeholder="e.g. Your site could do with more colour." title="The Message" rows="10" required></textarea>
                    <p class="feedback feedback--error contact-form__message-feedback"></p>
                </div>

                <p class="feedback contact-form__feedback"></p>
                <button
                    type="submit"
                    class="button button--dark-green contact-form__submit"
                    id="submit"
                    data-loading-text="<i class='fas fa-spinner fa-spin'></i> Sending"
                    data-initial-text="Send Email"
                >
                    Send Email
                </button>
            </form>
        </div>
    </div>
</section>

<section class="connect">
    <div class="container">
        <div class="connect__column">
            <h2 class="connect__heading">Connect with me</h2>
        </div>
        <div class="connect__column">
            <a class="social-link social-link--linkedin" href="https://uk.linkedin.com/in/<?php echo $site::SOCIAL_LINKEDIN; ?>/" target="_blank" rel="noopener noreferrer">
                <img class="social-link__image" src="<?php echo $site::asset("/assets/images/logos/linkedin.svg"); ?>" alt="Find me on LinkedIn /<?php echo $site::SOCIAL_LINKEDIN; ?>" />
                &nbsp;
                <p class="social-link__text">/<?php echo $site::SOCIAL_LINKEDIN; ?></p>
            </a>
            <a class="social-link social-link--github" href="https://github.com/<?php echo $site::SOCIAL_GITHUB; ?>/" target="_blank" rel="noopener noreferrer">
                <img class="social-link__image" src="<?php echo $site::asset("/assets/images/logos/github.svg"); ?>" alt="Find me on GitHub /<?php echo $site::SOCIAL_GITHUB; ?>" />
                &nbsp;
                <p class="social-link__text">/<?php echo $site::SOCIAL_GITHUB; ?></p>
            </a>
            <a class="social-link social-link--instagram" href="https://www.instagram.com/<?php echo $site::SOCIAL_GITHUB; ?>/" target="_blank" rel="noopener noreferrer">
                <span class="social-link__image"><i></i></span>
                &nbsp;
                <p class="social-link__text">@<?php echo $site::SOCIAL_INSTAGRAM; ?></p>
            </a>
        </div>
    </div>
</section>

<?php
$similarLinks = [
    [
        "title" => "Projects",
        "url" => "projects",
        "text" => "View My Work",
        "colour" => "dark-blue",
    ],
    [
        "title" => "About",
        "url" => "about",
        "text" => "Learn About Me",
        "colour" => "dark-blue",
    ],
];
$page->similarLinks = $similarLinks;
$page->renderSimilarLinks();
$page->renderSocialLinks();
$page->renderContentEnd();
$page->renderFooter();
$page->renderCookieBanner();
$page->renderPageEnd();
$page->renderHtmlEnd();
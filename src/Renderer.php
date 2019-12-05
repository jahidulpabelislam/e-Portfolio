<?php
/**
 * A helper class to use throughout the site.
 * To aid in including common partials for all pages.
 * And handles any page data associated with the page and passed to where needed
 *
 * Developed so it can be used in multiple sites.
 *
 * PHP version 7.1+
 *
 * @version 1.1.2
 * @since Class available since Release: v4.2.0
 * @author Jahidul Pabel Islam <me@jahidulpabelislam.com>
 * @copyright 2010-2019 JPI
 */

class Renderer {

    private $page;

    public function __construct(Page $page) {
        $this->page = $page;
    }

    /**
     * Include the common html head for page/site
     */
    public function renderHTMLHead() {
        $pageId = $this->page->id;
        $title = $this->page->headTitle ?? $this->page->title ?? "";
        $desc = $this->page->headDesc ?? $this->page->desc ?? "";

        include_once(ROOT . "/partials/head.php");
    }

    /**
     * Include the common canonical urls meta elements for page/site
     */
    public function renderCanonicalURLs() {
        $pagination = $this->page->pagination ?? [];
        $currentURL = $this->page->currentURL;

        include_once(ROOT . "/partials/canonical-urls.php");
    }

    /**
     * Include the common favicons content for page/site
     */
    public function renderFavicons() {
        include_once(ROOT . "/partials/favicons.php");
    }

    /**
     * Include the common html nav content for page/site
     */
    public function renderNav() {
        $pageId = $this->page->id;
        $currentURL = $this->page->currentURL;

        $defaultTint = "dark";

        $navTint = $this->page->navTint ?? $defaultTint;
        $navTint = in_array($navTint, Site::VALID_NAV_TINTS) ? $navTint : $defaultTint;

        include_once(ROOT . "/partials/nav.php");
    }

    /**
     * Include the common html header content for page/site
     */
    public function renderHeader() {
        $pageId = $this->page->id;
        $title = $this->page->headerTitle ?? $this->page->title ?? "";
        $desc = $this->page->headerDesc ?? $this->page->desc ?? "";

        include_once(ROOT . "/partials/header.php");
    }

    /**
     * Include the common footer content for page/site
     */
    public function renderFooter(array $similarLinks = []) {
        include_once(ROOT . "/partials/footer.php");
    }

    /**
     * Include the common cookie banner content for page/site
     */
    public function renderCookieBanner() {
        include_once(ROOT . "/partials/cookie-banner.php");
    }

    /**
     * Include any global JS variables under the JPI scope
     */
    public function renderJSGlobals() {
        $jsGlobals = $this->page->jsGlobals;

        if (empty($jsGlobals)) {
            return;
        }

        ?>
        <script type="application/javascript">
            window.jpi = window.jpi || {};
            <?php
            foreach ($jsGlobals as $globalName => $vars) {
                $jsVars = json_encode($vars);
                echo "window.jpi.{$globalName} = {$jsVars};";
            }
            ?>
        </script>
        <?php
    }

    public function renderScripts() {
        $scripts = $this->page->scripts;

        if (empty($scripts)) {
            return;
        }

        foreach ($scripts as $script) {
            echo "<script src='{$script}' type='application/javascript'></script>";
        }
    }

}

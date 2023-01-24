<?php

/**
 * I belong to a file
 */

namespace App\Acme;

use HeadlessChromium\Page;
use HeadlessChromium\Input\Mouse;
use HeadlessChromium\BrowserFactory;
use HeadlessChromium\Dom\Selector\XPathSelector;

/**
 * I belong to a class
 */
class Foo
{
    /**
     * Gets the name of the application.
     */
    public function getName()
    {
        // $browserFactory = new BrowserFactory('chromium');
        // // starts headless chrome
        // $browser = $browserFactory->createBrowser(
        //     [
        //         'noSandbox'                 => true,
        //         'debugLogger'               => 'php://stdout', // will enable verbose mode
        //         'sendSyncDefaultTimeout'    => 15000
        //     ]
        // );

        // try {
        //     // creates a new page and navigate to an URL
        //     $page = $browser->createPage();
        //     $page->navigate('https://apps.deptagency.com/ProjectToolkit/')->waitForNavigation();

        //     // get page title
        //     $pageTitle = $page->evaluate('document.title')->getReturnValue();

        //     $page->mouse()->find('.login__button')->click();
        //     $page->waitForReload();
        //     $page->keyboard()->setKeyInterval(100);
        //     $page->keyboard()->typeText('tobias.delacruz@deptagency.com');
        //     $elems = $page->dom()->search('//input[@type="submit"]');
        //     $elems[0]->click();
        //     $page->waitForReload(Page::DOM_CONTENT_LOADED);
        //     $page->keyboard()->typeText('5g226JPP90Su');
        //     $elems = $page->dom()->search('//input[@type="submit"]');
        //     $elems[0]->click();
        //     $page->waitForReload(Page::DOM_CONTENT_LOADED);
        //     $elems = $page->dom()->search('//input[@type="submit"]');
        //     $elems[0]->click();
        //     $page->waitForReload(Page::DOM_CONTENT_LOADED);
        //     $elems = $page->dom()->search('//strong[contains(text(),"Authenticator")]');
        //     $elems[0]->click();
        //     $page->waitForReload(Page::DOM_CONTENT_LOADED);

        //     $page->keyboard()->typeText('288348');
        //     $elems = $page->dom()->search('//input[@type="submit"][@id="submit"]');
        //     $elems[0]->click();
        //     $page->waitForReload(Page::DOM_CONTENT_LOADED);

        //     // screenshot - Say "Cheese"! 😄
        //     $page->screenshot()->saveToFile('./bar.png');
        // } finally {
        //     // bye
        //     $browser->close();
        // }

        return 'Nginx PHP MySQL';
    }
}

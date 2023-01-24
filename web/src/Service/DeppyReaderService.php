<?php

namespace App\Service;

use HeadlessChromium\Browser\ProcessAwareBrowser;
use HeadlessChromium\Page;
use HeadlessChromium\BrowserFactory;

class DeppyReaderService 
{
    /**
     * @var Page
     */
    private $page;

    /**
     * @var ProcessAwareBrowser
     */
    private $browser;

    public function __construct()
    {
        $browserFactory = new BrowserFactory('chromium');
        $this->browser = $browserFactory->createBrowser(
            [
                'noSandbox'                 => true,
                'debugLogger'               => 'php://stdout', // will enable verbose mode
                'sendSyncDefaultTimeout'    => 15000
            ]
        );
        $this->page = $this->browser->createPage();
    }

    public function getHml($password, $code) {
        try {
            $this->page->navigate('https://apps.deptagency.com/ProjectToolkit/')->waitForNavigation();
            $this->login();
            $this->submitCredentials($password);
            $this->submitAuthCode($code);
        } finally {
            $this->page->screenshot()->saveToFile('./bar.png');
            $this->browser->close();
        }
    }
    
    private function login()
    {
        $this->page->mouse()->find('.login__button')->click();
        $this->page->waitForReload();
        $this->page->keyboard()->setKeyInterval(100);
        $this->page->keyboard()->typeText('tobias.delacruz@deptagency.com');
        $this->submitForm();
    }

    private function submitCredentials($password)
    {
        $this->page->waitForReload(Page::DOM_CONTENT_LOADED);
        $this->page->keyboard()->typeText($password);
        $this->submitForm();
    }

    private function submitAuthCode($code)
    {
        $this->page->waitForReload(Page::DOM_CONTENT_LOADED);
        $this->submitForm();
        $this->page->waitForReload(Page::DOM_CONTENT_LOADED);
        $this->findAndClick('//strong[contains(text(),"Authenticator")]');
        $this->page->waitForReload(Page::DOM_CONTENT_LOADED);
        $this->page->keyboard()->typeText($code);
        $this->submitForm('//input[@type="submit"][@id="submit"]');
    }

    private function submitForm($selector = '//input[@type="submit"]')
    {
        $this->findAndClick($selector);
    }

    private function findAndClick($selector)
    {
        $elems = $this->page->dom()->search($selector);
        $elems[0]->click();
    }
}
<?php

namespace App\Acme\DeptAppReader\Adapter\Chrome;

use Exception;
use HeadlessChromium\Page;

/**
 * Login in Google Account with Page from Chromium
 */
class Login
{
    /**
     * Chromium Page
     *
     * @var Page
     */
    private $page;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $authenticatorCode;

    /**
     * @var bool
     */
    private $loginSuccessStaus = false;

    /**
     * Constructor
     *
     * @param Page $page
     */
    public function __construct(Page $page, string $email, string $password, string $authenticatorCode)
    {
        $this->page = $page;
        $this->email = $email;
        $this->password = $password;
        $this->authenticatorCode = $authenticatorCode;
    }

    /**
     * Write E-Mail in Input field
     *
     * @param string $email
     * @return void
     */
    private function fillEmail(string $email)
    {
        //var_dump($this->page->dom()->getHTML());
        //die();
        $this->page->dom()->search('')[0]->sendKeys($email);
        $this->page->dom()->search('//input[@type="submit"]')[0]->click();
        $this->page->waitForReload(Page::DOM_CONTENT_LOADED);
    }

    /**
     * Write Password in Input field
     *
     * @param string $password
     * @return void
     */
    private function fillPassword(string $password)
    {
        //var_dump($this->page->dom()->getHTML());
        //die();
        $this->page->dom()->search('')[0]->sendKeys($password);
        $this->page->dom()->search('//input[@type="submit"]')[0]->click();
        $this->page->waitForReload(Page::DOM_CONTENT_LOADED);
    }

    /**
     * Write Code in Input field
     *
     * @param string $code
     * @return void
     */
    private function fillAuthenticatorCode(string $code)
    {
        //var_dump($this->page->dom()->getHTML());
        //die();
        $this->page->dom()->search('')[0]->sendKeys($code);
        $this->page->dom()->search('//input[@type="submit"][@id="submit"]')[0]->click();
        $this->page->waitForReload(Page::DOM_CONTENT_LOADED);
    }

    /**
     * Start 2 Factor
     *
     * @return void
     */
    private function start2Factor()
    {
        $this->page->dom()->search('//input[@type="submit"]')[0]->click();
        $this->page->waitForReload(Page::DOM_CONTENT_LOADED);
    }

    /**
     * Choose the Authenticator for 2 factor
     *
     * @return void
     */
    private function chooseAuthenticator()
    {
        $nodes = $this->page->dom()->search('//strong[contains(text(),"Authenticator")]');
        if (!empty($nodes)) {
            $nodes[0]->click();
            $this->page->waitForReload(Page::DOM_CONTENT_LOADED);
        }
    }

    /**
     * Login
     *
     * @return void
     */
    public function login()
    {
        try {
            $this->fillEmail($this->email);
            $this->fillPassword($this->password);
            $this->start2Factor();
            $this->chooseAuthenticator();
            $this->fillAuthenticatorCode($this->authenticatorCode);
            $this->loginSuccessStaus = true;
        } catch (Exception $e) {
            $this->loginSuccessStaus = false;
        }
    }

    /**
     * Get the value of authenticatorCode
     *
     * @return  string
     */
    public function getAuthenticatorCode()
    {
        return $this->authenticatorCode;
    }

    /**
     * Set the value of authenticatorCode
     *
     * @param  string  $authenticatorCode
     *
     * @return  self
     */
    public function setAuthenticatorCode(string $authenticatorCode)
    {
        $this->authenticatorCode = $authenticatorCode;

        return $this;
    }

    /**
     * Get the value of password
     *
     * @return  string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @param  string  $password
     *
     * @return  self
     */
    public function setPassword(string $password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of email
     *
     * @return  string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param  string  $email
     *
     * @return  self
     */
    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of loginSuccessStaus
     *
     * @return  bool
     */ 
    public function isLoginSuccess()
    {
        return $this->loginSuccessStaus;
    }
}

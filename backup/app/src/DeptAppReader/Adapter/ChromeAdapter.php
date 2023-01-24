<?php

namespace App\Acme\DeptAppReader\Adapter;

use App\Acme\DeptAppReader\Adapter\Chrome\Login;
use HeadlessChromium\BrowserFactory;

class ChromeAdapter implements AdapterInterface
{
    /**
     *
     */
    private $browserFactory;

    /**
     * @var Login
     */
    private $login;

    /**
     *
     * @var String
     */
    private $content;

    /**
     * Undocumented function
     *
     * @param BrowserFactory $browserFactory
     */
    public function __construct(BrowserFactory $browserFactory, Login $login)
    {
        $this->browserFactory = $browserFactory;
        $this->login = $login;
    }

    /**
     * @param array $options
     * 
     * @return HeadlessChromium\Browser\ProcessAwareBrowser a Browser instance to interact with the new chrome process
     */
    public function getBrowser(array $options)
    {
        return $this->browserFactory->createBrowser($options);
    }

    public function getContent(): string
    {
        $this->login->login();
        return '';
    }
}

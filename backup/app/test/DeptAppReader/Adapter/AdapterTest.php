<?php

namespace AppTest\Acme\DeptAppReader\Adapter;

use Prophecy\Prophet;
use Prophecy\Argument;
use PHPUnit\Framework\TestCase;
use HeadlessChromium\BrowserFactory;
use App\Acme\DeptAppReader\Adapter\Chrome\Login;
use App\Acme\DeptAppReader\Adapter\ChromeAdapter;
use HeadlessChromium\Browser\ProcessAwareBrowser;

/**
 * UnitTest from Login
 */
class AdapterTest extends TestCase
{
    protected function setUp(): void
    {
        $this->prophet = new Prophet;
    }

    protected function tearDown(): void
    {
        $this->prophet->checkPredictions();
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function testGetBrowser()
    {
        $browserFactory = $this->prophet->prophesize(BrowserFactory::class);
        $login = $this->prophet->prophesize(Login::class);
        $processAwareBrowser = $this->prophet->prophesize(ProcessAwareBrowser::class);

        $browserFactory->createBrowser(Argument::type('array'))->willReturn($processAwareBrowser);

        $adapter = new ChromeAdapter($browserFactory->reveal(), $login->reveal());

        $this->assertInstanceOf(ProcessAwareBrowser::class, $adapter->getBrowser([]));
    }

    public function testGetContent()
    {
        $browserFactory = $this->prophet->prophesize(BrowserFactory::class);
        $login = $this->prophet->prophesize(Login::class);

        $adapter = new ChromeAdapter($browserFactory->reveal(), $login->reveal());

        $this->assertIsString($adapter->getContent());
    }
}

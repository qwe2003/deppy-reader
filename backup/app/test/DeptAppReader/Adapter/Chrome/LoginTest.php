<?php

namespace AppTest\Acme\DeptAppReader\Adapter\Chrome;

use Prophecy\Prophet;
use Prophecy\Argument;
use PHPUnit\Framework\TestCase;
use App\Acme\DeptAppReader\Adapter\Chrome\Login;

/**
 * UnitTest from Login
 */
class LoginTest extends TestCase
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
    public function testLoginSucess()
    {
        $page = $this->prophet->prophesize('HeadlessChromium\Page');
        $dom = $this->prophet->prophesize('HeadlessChromium\Dom\Dom');
        $node = $this->prophet->prophesize('HeadlessChromium\Dom\Node');

        $dom->search(Argument::type('string'))->willReturn([$node->reveal()]);
        $page->dom()->willReturn($dom->reveal());
        $page->waitForReload('DOMContentLoaded')->willReturn(Argument::type('HeadlessChromium\Page'));

        $login = new Login($page->reveal(), 'test.email@gmail.com', '123455566', '123456');
        $login->login();
        
        $this->assertTrue($login->isLoginSuccess());
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function testLoginFail()
    {
        $page = $this->prophet->prophesize('HeadlessChromium\Page');
        $dom = $this->prophet->prophesize('HeadlessChromium\Dom\Dom');

        $dom->search(Argument::type('string'))->willReturn([]);
        $page->dom()->willReturn($dom->reveal());
        $page->waitForReload('DOMContentLoaded')->willReturn(Argument::type('HeadlessChromium\Page'));

        $login = new Login($page->reveal(), 'test.email@gmail.com', '123455566', '123456');
        $login->login();
        
        $this->assertFalse($login->isLoginSuccess());
    }
}

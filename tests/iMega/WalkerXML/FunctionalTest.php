<?php
/**
 * The MIT License (MIT)
 *
 * Copyright (c) 2015 Dmitry Gavrilov <info@imega.ru>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace iMega;

use Gaufrette;
use iMega\WalkerXML\WalkerXML;
use iMega\Teleport\Parser\Description;

/**
 * Class FunctionalTestCase
 */
class FunctionalTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var WalkerXML
     */
    protected $xml;

    /**
     * setUp
     */
    public function setUp()
    {
        $adapter = new Gaufrette\Adapter\Local(__DIR__.'/../../Fixtures');
        $fs = new Gaufrette\Filesystem($adapter);
        $data = $fs->read('test.xml');
        $this->xml = new WalkerXML($data);
    }

    /**
     * @test
     */
    public function shouldCheckInstance()
    {
        $this->assertInstanceOf('\\iMega\\WalkerXml\\WalkerXml', $this->xml);
    }

    /**
     * @test
     */
    public function shouldCheckNull()
    {
        $actual = $this->xml->elements(
            'NotExists'
        );

        $this->assertTrue(empty($actual));
        $this->assertEquals(0, count($actual));
    }

    /**
     * @test
     */
    public function shouldCheckClassificator()
    {
        $actual = $this->xml->elements(
            Description::CLASSI
        );

        $this->assertInternalType('array', $actual);
    }

    /**
     * @test
     */
    public function shouldCheckClassificatorNoAttrs()
    {
        $classi = $this->xml->elements(
            Description::CLASSI
        );
        $attrs = $classi[0]->attribute();

        //$this->assertEquals([], $attrs);
    }

    /**
     * @test
     */
    public function shouldCheckClassificatorId()
    {
        $classi = $this->xml->elements(
            Description::CLASSI
        );

        $actual = $classi[0]->value(Description::ID);

        $this->assertEquals('bd72d8f9-55bc-11d9-848a-00112f43529a', $actual);
    }

    /**
     * @test
     */
    public function shouldCheckClassificatorName()
    {
        $classi = $this->xml->elements(
            Description::CLASSI
        );

        $actual = $classi[0]->value(Description::NAME);

        $this->assertEquals('Классификатор (Каталог товаров)', $actual);
    }

    /**
     * @test
     */
    public function shouldCheckCatalog()
    {
        $actual = $this->xml->elements(
            Description::CATALOG
        );

        $this->assertInternalType('array', $actual);
    }

    /**
     * @test
     */
    public function shouldCheckCatalogAttrs()
    {
        $catalog = $this->xml->elements(
            Description::CATALOG
        );
        $attrs = $catalog[0]->attribute($catalog);

        $this->assertArrayHasKey('СодержитТолькоИзменения', $attrs);
        $this->assertEquals('false', $attrs[Description::CONTAINS_ONLY_THE_CHANGES]);
    }

    /**
     * @test
     */
    public function shouldCheckGroupsId()
    {
        $groups = $this->xml->elements(
            Description::CLASSI,
            Description::GROUPS,
            Description::GROUP
        );

        $groupExpected = [512, 513];

        foreach ($groups as $group) {
            $actual = $group->value(Description::ID);
            $this->assertTrue(in_array($actual, $groupExpected));
        }
    }

    /**
     * @test
     */
    public function shouldCheckGroupsName()
    {
        $groups = $this->xml->elements(
            Description::CLASSI,
            Description::GROUPS,
            Description::GROUP
        );

        $groupExpected = ['Люстры', 'Светильники'];

        foreach ($groups as $group) {
            $actual = $group->value(Description::NAME);
            $this->assertTrue(in_array($actual, $groupExpected));
        }
    }
}

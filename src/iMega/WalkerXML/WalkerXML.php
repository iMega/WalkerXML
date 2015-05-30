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
namespace iMega\WalkerXML;

/**
 * Class WalkerXML
 */
class WalkerXML implements WalkerXMLInterface
{
    /**
     * @var \SimpleXMLIterator
     */
    protected $xml;

    /**
     * @param string $data A well-formed XML string or the path or URL to an XML document if data_is_url is TRUE.
     */
    public function __construct($data)
    {
        try {
            $this->xml = new \SimpleXMLIterator($data);
        } catch (\Exception $e) {
            return;
        }
    }

    /**
     * @param \SimpleXMLElement $element Element with attributes.
     *
     * @return array
     */
    public function attribute(\SimpleXMLElement $element)
    {
        $attrs = (array) $element->attributes();

        return isset($attrs['@attributes']) ? $attrs['@attributes'] : [];
    }

    /**
     * @param string $name   Name element.
     * @param bool   $parent Use parent.
     *
     * @return null|array|\SimpleXMLElement[]|\SimpleXMLIterator
     */
    public function element($name, $parent = false)
    {
        if (! $parent) {
            $parent = $this->xml;
        }
        $parentArray = (array) $parent;

        return isset($parentArray[$name]) ? $parentArray[$name] : null;
    }

    /**
     * @return null|mixed|\SimpleXMLElement[]|\SimpleXMLIterator
     */
    public function deepElement()
    {
        $parent = null;
        foreach (func_get_args() as $element) {
            if (! $parent) {
                $parent = $element;
                continue;
            }
            $parent = $this->element($element, $parent);
        }

        return $parent;
    }

    /**
     * @return \SimpleXMLIterator
     */
    public function root()
    {
        return $this->xml;
    }
}

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
class WalkerXML extends \SimpleXMLIterator
{
    /**
     * Return attributes of element
     *
     * @return array
     */
    public function attribute()
    {
        $element = (array) $this->attributes();

        return isset($element['@attributes']) ? $element['@attributes'] : [];
    }

    /**
     * Return a deep element xml
     *
     * param mixed ... a list of elements
     *
     * @return array
     */
    public function elements()
    {
        $elements = func_get_args();
        $result = $this->xpath(implode($elements, '/'));

        if (! empty($result) && count($result[0]) == 0) {
            return $result[0]->attribute();
        }

        if (false === $result) {
            return [];
        }

        return $result;
    }

    /**
     * Return value of element
     *
     * @param string $name Name element.
     *
     * @return string
     */
    public function value($name)
    {
        $result  = '';
        $element = (array) $this;
        if (isset($element[$name]) && $element[$name] instanceof self) {
            $result = '';
        } elseif (isset($element[$name])) {
            $result = $element[$name];
        }

        return $result;
    }
}

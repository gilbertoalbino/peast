<?php
/**
 * This file is part of the Peast package
 *
 * (c) Marco Marchiò <marco.mm89@gmail.com>
 *
 * For the full copyright and license information refer to the LICENSE file
 * distributed with this source code
 */
namespace Peast\Syntax\ES6\Node;

/**
 * A node that represents an array binding pattern.
 * For example: [a, b, c] = d
 * 
 * @author Marco Marchiò <marco.mm89@gmail.com>
 */
class ArrayPattern extends Node implements Pattern
{
    /**
     * Array elements
     * 
     * @var Pattern[]
     */
    protected $elements = array();
    
    /**
     * Returns array elements
     * 
     * @return Pattern[]
     */
    public function getElements()
    {
        return $this->elements;
    }
    
    /**
     * Sets array elements
     * 
     * @param Pattern[] $elements Array elements to set
     * 
     * @return $this
     */
    public function setElements($elements)
    {
        $this->assertArrayOf($elements, "Pattern", true);
        $this->elements = $elements;
        return $this;
    }
}
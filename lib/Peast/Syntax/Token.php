<?php
/**
 * This file is part of the Peast package
 *
 * (c) Marco Marchiò <marco.mm89@gmail.com>
 *
 * For the full copyright and license information refer to the LICENSE file
 * distributed with this source code
 */
namespace Peast\Syntax;

/**
 * A token emitted by the tokenizer.
 * 
 * @author Marco Marchiò <marco.mm89@gmail.com>
 */
class Token implements \JSONSerializable
{
    //Type constants
    /**
     * Boolean literal
     */
    const TYPE_BOOLEAN_LITERAL = "Boolean";
    
    /**
     * Identifier
     */
    const TYPE_IDENTIFIER = "Identifier";
    
    /**
     * Keyword
     */
    const TYPE_KEYWORD = "Keyword";
    
    /**
     * Null literal
     */
    const TYPE_NULL_LITERAL = "Null";
    
    /**
     * Numeric literal
     */
    const TYPE_NUMERIC_LITERAL = "Numeric";
    
    /**
     * Punctutator
     */
    const TYPE_PUNCTUTATOR = "Punctuator";
    
    /**
     * String literal
     */
    const TYPE_STRING_LITERAL = "String";
    
    /**
     * Regular expression
     */
    const TYPE_REGULAR_EXPRESSION = "RegularExpression";
    
    /**
     * Template
     */
    const TYPE_TEMPLATE = "Template";
    
    /**
     * Tokens' type that is one of the type constants
     * 
     * @var string 
     */
    protected $type;
    
    /**
     * Token's value
     * 
     * @var string 
     */
    protected $value;
    
    /**
     * Token's location in the source code
     * 
     * @var SourceLocation 
     */
    protected $location;
    
    /**
     * Class constructor
     * 
     * @param string $type  Token's type
     * @param string $value Token's value
     */
    public function __construct($type, $value)
    {
        $this->type = $type;
        $this->value = $value;
        $this->location = new SourceLocation();
    }
    
    /**
     * Returns the token's type
     * 
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
    
    /**
     * Returns the token's value
     * 
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
    
    /**
     * Returns the token's location in the source code
     * 
     * @return SourceLocation
     */
    public function getLocation()
    {
        return $this->location;
    }
    
    /**
     * Sets the start position of the token in the source code
     * 
     * @param Position $position Start position
     * 
     * @return $this
     */
    public function setStartPosition(Position $position)
    {
        $this->location->setStart($position);
        return $this;
    }
    
    /**
     * Sets the end position of the token in the source code
     * 
     * @param Position $position End position
     * 
     * @return $this
     */
    public function setEndPosition(Position $position)
    {
        $this->location->setEnd($position);
        return $this;
    }
    
    /**
     * Returns a serializable version of the node
     * 
     * @return array
     */
    public function jsonSerialize()
    {
        return array(
            "type" => $this->getType(),
            "value" => $this->getValue(),
            "location" => $this->getLocation()
        );
    }
}
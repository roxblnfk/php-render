<?php

namespace PHPR\Math;

class Vec2 
{
    /**
     * x value
     * 
     * @var float
     */
    public float $x;

    /**
     * y value
     * 
     * @var float
     */
    public float $y;
    
    /**
     * Constructor
     *
     * @param float         $x
     * @param float         $y
     */
    public function __construct(float $x, float $y) 
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * Vector length
     *
     * @return float
     */
    public function length() : float
    {
        return sqrt($this->x * $this->x + $this->y * $this->y);
    }

    /**
     * Normalize the given vector
     *
     * @param Vec2           $vector The vector to base the absoultes on.
     * @param Vec2|null      $result The vector the result is written to.
     *
     * @return Vec2                   The result vector. 
     */
    public static function _normalize(Vec2 $vector, ?Vec2 &$result = null) : Vec2
    {
        if (is_null($result)) $result = new Vec2(0, 0);

        $length = $vector->length();

        if ($length > 0) {
            $length = 1 / $length;
           $result->x = $vector->x * $length;
           $result->y = $vector->y * $length;

        } else { 
           $result->x = 0;
           $result->y = 0;

        }

        return $result;
    }

    /**
     * Normalize the current vector
     *
     * @return self
     */
    public function normalize()
    {
        Vec2::_normalize($this, $this); return $this;
    }

    /**
     * Absolute of the given vector
     *
     * @param Vec2           $vector The vector to base the normalization on.
     * @param Vec2|null      $result The vector the result is written to.
     *
     * @return Vec2                   The result vector. 
     */
    public static function _abs(Vec2 $vector, ?Vec2 &$result = null) : Vec2
    {
        if (is_null($result)) $result = new Vec2(0, 0);

        $result->x = abs($vector->x);
        $result->y = abs($vector->y);


        return $result;
    }

    /**
     * Absolute of the current vector
     *
     * @return self
     */
    public function abs()
    {
        Vec2::_abs($this, $this); return $this;
    }

    /**
     * Clamp the given vector
     *
     * @param Vec2           $vector The vector to base the clamp on.
     * @param Vec2|null      $result The vector the result is written to.
     *
     * @return Vec2                   The result vector. 
     */
    public static function _clamp(Vec2 $vector, ?Vec2 &$result = null) : Vec2
    {
        if (is_null($result)) $result = new Vec2(0, 0);

        $result->x = max(min($vector->x, 1.0), 0.0);
        $result->y = max(min($vector->y, 1.0), 0.0);

        return $result;
    }

    /**
     * Clamp the current vector
     *
     * @return self
     */
    public function clamp()
    {
        Vec2::_clamp($this, $this); return $this;
    }
    
    /**
     * Dot Product
     *
     * @param Vec2           $left
     * @param Vec2           $right
     *
     * @return float
     */
    public static function _dot(Vec2 $left, Vec2 $right) : float
    {   
        return $left->x * $right->x + $left->y * $right->y;
    }

    /**
     * Dot product with self
     *
     * @param Vec2               $right
     * @return float
     */
    public function dot(Vec2 $right) : float
    {
        return Vec2::_dot($this, $right);
    }
    
    /**
     * Distance
     *
     * @param Vec2           $left
     * @param Vec2           $right
     *
     * @return float
     */
    public static function _distance(Vec2 $left, Vec2 $right) : float
    {   
        return sqrt(
          ($left->x - $right->x) * ($left->x - $right->x) + 
          ($left->y - $right->y) * ($left->y - $right->y));
    }

    /**
     * Distance from self
     *
     * @param Vec2               $right
     * @return float
     */
    public function distance(Vec2 $right) : float
    {
        return Vec2::_distance($this, $right);
    }

    /**
     *  Add two vectors together
     *
     * @param Vec2           $left
     * @param Vec2           $right
     * @param Vec2|null      $result The vector the result is written to.
     *
     * @return Vec2                   The result vector. 
     */
    public static function _add(Vec2 $left, Vec2 $right, ?Vec2 &$result = null) : Vec2
    {
        if (is_null($result)) $result = new Vec2(0, 0);
        
        $result->x = $left->x + $right->x;
        $result->y = $left->y + $right->y;

        return $result;
    }
    
    /**
     * Add a vector to the current one
     *
     * @param Vec2               $right 
     * @return self
     */
    public function add(Vec2 $right)
    {
        Vec2::_add($this, $right, $this); return $this;
    }
    
    /**
     *  Substract a vector of another one
     *
     * @param Vec2           $left
     * @param Vec2           $right
     * @param Vec2|null      $result The vector the result is written to.
     *
     * @return Vec2                   The result vector. 
     */
    public static function _substract(Vec2 $left, Vec2 $right, ?Vec2 &$result = null)
    {
        if (is_null($result)) $result = new Vec2(0, 0);
        
        $result->x = $left->x - $right->x;
        $result->y = $left->y - $right->y;

        return $result;
    }

    /**
     * Substract a vector to the current one
     *
     * @param Vec2               $right 
     * @return self
     */
    public function substract(Vec2 $right)
    {
        Vec2::_substract($this, $right, $this); return $this;
    }
    
    /**
     *  Multiply a vector by a scalar value
     *
     * @param Vec2           $left
     * @param float       $value
     * @param Vec2|null      $result The vector the result is written to.
     *
     * @return Vec2                   The result vector. 
     */
    public static function _multiply(Vec2 $left, float $value, ?Vec2 &$result = null)
    {
        if (is_null($result)) $result = new Vec2(0, 0);
        
        $result->x = $left->x * $value;
        $result->y = $left->y * $value;

        return $result;
    }

    /**
     * Multiply the current vector by a scalar value
     *
     * @param float       $value
     * @return self
     */
    public function multiply(float $value)
    {
        Vec2::_multiply($this, $value, $this); return $this;
    }
    
    /**
     *  Multiply a vector by another vector
     *
     * @param Vec2           $left
     * @param float       $value
     * @param Vec2|null      $result The vector the result is written to.
     *
     * @return Vec2                   The result vector. 
     */
    public static function _multiplyVec2(Vec2 $left, Vec2 $right, ?Vec2 &$result = null)
    {
        if (is_null($result)) $result = new Vec2(0, 0);
        
        $result->x = $left->x * $right->x;
        $result->y = $left->y * $right->y;

        return $result;
    }

    /**
     * Multiply the current vector by another vector
     *
     * @param float       $value
     * @return self
     */
    public function multiplyVec2(Vec2 $right)
    {
        Vec2::_multiplyVec2($this, $right, $this); return $this;
    }
    
    /**
     *  Divide a vector by a scalar value
     *
     * @param Vec2           $left
     * @param float       $value
     * @param Vec2|null      $result The vector the result is written to.
     *
     * @return Vec2                   The result vector. 
     */
    public static function _divide(Vec2 $left, float $value, ?Vec2 &$result = null)
    {
        if ($value == 0) throw new \Exception("Division by zero. Please don't...");

        if (is_null($result)) $result = new Vec2(0, 0);
        
        $result->x = $left->x / $value;
        $result->y = $left->y / $value;

        return $result;
    }

    /**
     * Divide the current vector by a scalar value
     *
     * @param float       $value
     * @return self
     */
    public function divide(float $value)
    {
        Vec2::_divide($this, $value, $this); return $this;
    }

    /**
     * Converts the vector into an integer representing a color or anything you want it to be 
     *
     * @return int
     */
    public function toColorInt() : int
    {
        return (($this->x * 255 & 0xff) << 8) + ($this->y * 255  & 0xff);
    }

    /**
     * Just return the data as array
     *
     * @return array
     */
    public function raw() : array
    {
        return [$this->x, $this->y];
    }

    /**
     * Just copy the vector values to a new object
     *
     * @return Vec2
     */
    public function copy() : Vec2
    {
        return new Vec2($this->x, $this->y);
    }

    /**
     * Prtint the vector in human friendly way
     *
     * @return string
     */
    public function __toString() : string
    {
        return "Vec2({$this->x}, {$this->y})";
    }
}

<?php

namespace FakerUnitsOfMeasure\Provider\en_US;

class UnitOfMeasure extends \Faker\Provider\Base
{
    protected static $lengths = array(
        'm' => 'meter',
        'mm' => 'millimeter',
        'cm' => 'centimeter',
        'dm' => 'decimeter',
        'km' => 'kilometer',
        'in' => 'inch',
        'ft' => 'foot',
        'yd' => 'yard',
        'mi' => 'mile',
    );

    protected static $masses = array(
        'g' => 'gram',
        'kg' => 'kilogram',
        'dr' => 'dram',
        'oz' => 'ounce',
        'lb' => 'pound',
        'ton' => 'ton',
    );

    /**
     * A random mass measurement name
     *
     * @param bool $plural
     * @return string
     */
    public function massName($plural = false)
    {
        $unit = static::randomElement(static::$masses);

        return $plural ? $unit . 's' : $unit;
    }

    /**
     * A random mass unit symbol
     *
     * @return mixed
     */
    public function massNameSymbol()
    {
        $symbols = array_keys(static::$masses);
        return static::randomElement($symbols);
    }

    /**
     * A random length measurement name
     *
     * @param bool $plural
     * @return string
     */
    public function lengthName($plural = false)
    {
        $pluralExceptions = ['inch', 'foot'];

        $unit = static::randomElement(static::$lengths);

        if($plural)
        {
            if(in_array($unit, $pluralExceptions))
            {
                if($unit == 'inch')
                {
                    $unit =. 'es';   
                }
                
                if($unit == 'foot')
                {
                    $unit = 'feet';   
                }
                return $unit;
            }

            return $unit . 's';
        }

        return $unit;
    }

    public function lengthNameSymbol()
    {
        $symbols = array_keys(static::$lengths);
        return static::randomElement($symbols);
    }
}

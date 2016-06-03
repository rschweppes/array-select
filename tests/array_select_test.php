<?php

class ArraySelectTest extends PHPUnit_Framework_TestCase
{
    public function testSelectOneKey()
    {
        $src = array(
            array(
                'a' => 'b',
                'c' => 'd',
            ),
            array(
                'a' => 'e',
                'c' => 'f',
            )
        );

        $expected = array('b', 'e');

        $this->assertEquals($expected, array_select('a', $src));
    }

    public function testSelectMultiKeys()
    {
        $src = array(
            array(
                'a' => 1,
                'b' => 2,
                'c' => 3,
            ),
            array(
                'a' => 4,
                'b' => 5,
                'c' => 6,
            )
        );

        $expected = array(
            array(
                'a' => 1,
                'c' => 3,
            ),
            array(
                'a' => 4,
                'c' => 6,
            ),
        );

        $this->assertEquals($expected, array_select(array('a', 'c'), $src));
    }

    public function testSelectArrayOfOneKey()
    {
        $src = array(
            array(
                'a' => 1,
                'b' => 2,
                'c' => 3,
            ),
            array(
                'a' => 4,
                'b' => 5,
                'c' => 6,
            )
        );

        $expected = array(
            array(
                'a' => 1,
            ),
            array(
                'a' => 4,
            ),
        );

        $this->assertEquals($expected, array_select(array('a'), $src));
    }

    public function testSelectFromEmptyArray()
    {
        $src = array();
        $expected = array();

        $this->assertEquals($expected, array_select('a', $src));
    }

    public function testSelectNotExistingValue()
    {
        $src = array(
            array(
                'a' => 1,
            ),
            array(
                'a' => 4,
            )
        );

        $expected = array(
            null,
            null,
        );

        $this->assertEquals($expected, array_select('d', $src));
    }

    /**
     * @expectedException Exception
     */
    public function testSelectFromNotArray()
    {
        $src = 'ololo';

        $expected = false;
        $this->assertEquals($expected, array_select('d', $src));
    }
}

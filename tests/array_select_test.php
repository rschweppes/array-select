<?php

class ArraySelectTest extends PHPUnit_Framework_TestCase
{
    private $src = array(
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

    public function testSelectOneKey()
    {
        $key = 'a';
        $expected = array(1, 4);

        $this->assertEquals($expected, array_select($key, $this->src));
    }

    public function testSelectMultiKeys()
    {
        $keys = array('a', 'c');

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

        $this->assertEquals($expected, array_select($keys, $this->src));
    }

    public function testSelectArrayOfOneKey()
    {
        $keys = array('a');
        $expected = array(array('a' => 1), array('a' => 4));

        $this->assertEquals($expected, array_select($keys, $this->src));
    }

    public function testSelectFromEmptyArray()
    {
        $src = array();
        $expected = array();

        $this->assertEquals($expected, array_select('a', $src));
    }

    public function testSelectNonexistentKey()
    {
        $src = array(array('a' => 1), array('a' => 4));
        $expected = array(null, null);

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

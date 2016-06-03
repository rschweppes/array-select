<?php

class ArraySelectTest extends PHPUnit_Framework_TestCase
{
    private $from = array(
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

    private $fromAssoc = array(
        'd' => array(
            'a' => 1,
            'b' => 2,
            'c' => 3,
        ),
        'e' => array(
            'a' => 4,
            'b' => 5,
            'c' => 6,
        )
    );

    /**
     * Выборка из обычных массивов
     */
    public function testSelectOneKey()
    {
        $key = 'a';
        $expected = array(1, 4);

        $this->assertEquals($expected, array_select($key, $this->from));
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

        $this->assertEquals($expected, array_select($keys, $this->from));
    }

    public function testSelectArrayOfOneKey()
    {
        $keys = array('a');
        $expected = array(array('a' => 1), array('a' => 4));

        $this->assertEquals($expected, array_select($keys, $this->from));
    }

    public function testSelectFromEmptyArray()
    {
        $from = array();
        $expected = array();

        $this->assertEquals($expected, array_select('a', $from));
    }

    public function testSelectNonexistentKey()
    {
        $from = array(array('a' => 1), array('a' => 4));
        $expected = array(null, null);

        $this->assertEquals($expected, array_select('d', $from));
    }

    public function testSelectNonexistentMultiKey()
    {
        $from = array(array('a' => 1), array('a' => 4));
        $expected = array(
            array(
                'd' => null,
                'e' => null,
            ),
            array(
                'd' => null,
                'e' => null,
            ),
        );

        $this->assertEquals($expected, array_select(array('d', 'e'), $from));
    }

    public function testSelectNonexistentArrayOfOneKey()
    {
        $from = array(array('a' => 1), array('a' => 4));
        $expected = array(
            array(
                'd' => null,
            ),
            array(
                'd' => null,
            ),
        );

        $this->assertEquals($expected, array_select(array('d'), $from));
    }

    /**
     * Выборка из ассоциативных массивов
     */
    public function testSelectOneKeyFromAssoc()
    {
        $key = 'a';
        $expected = array(1, 4);

        $this->assertEquals($expected, array_select($key, $this->fromAssoc));
    }

    public function testSelectMultiKeysFromAssoc()
    {
        $keys = array('a', 'c');

        $expected = array(
            'd' => array(
                'a' => 1,
                'c' => 3,
            ),
            'e' => array(
                'a' => 4,
                'c' => 6,
            ),
        );

        $this->assertEquals($expected, array_select($keys, $this->fromAssoc));
    }

    public function testSelectArrayOfOneKeyFromAssoc()
    {
        $keys = array('a');
        $expected = array('d' => array('a' => 1), 'e' => array('a' => 4));

        $this->assertEquals($expected, array_select($keys, $this->fromAssoc));
    }

    public function testSelectFromEmptyArrayFromAssoc()
    {
        $fromAssoc = array();
        $expected = array();

        $this->assertEquals($expected, array_select('a', $fromAssoc));
    }

    public function testSelectNonexistentKeyFromAssoc()
    {
        $fromAssoc = array(
            'd' => array('a' => 1),
            'e' => array('a' => 4),
        );
        $expected = array(null, null);

        $this->assertEquals($expected, array_select('d', $fromAssoc));
    }

    public function testSelectNonexistentMultiKeyFromAssoc()
    {
        $fromAssoc = array(
            'd1' => array('a' => 1),
            'e1' => array('a' => 4),
        );
        $expected = array(
            'd1' => array(
                'd' => null,
                'e' => null,
            ),
            'e1' => array(
                'd' => null,
                'e' => null,
            ),
        );

        $this->assertEquals($expected, array_select(array('d', 'e'), $fromAssoc));
    }

    public function testSelectNonexistentArrayOfOneKeyFromAssoc()
    {
        $fromAssoc = array(
            'd1' => array('a' => 1),
            'e1' => array('a' => 4),
        );
        $expected = array(
            'd1' => array(
                'd' => null,
            ),
            'e1' => array(
                'd' => null,
            ),
        );

        $this->assertEquals($expected, array_select(array('d'), $fromAssoc));
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

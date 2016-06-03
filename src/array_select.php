<?php

if(!function_exists('array_select')) {
    /**
     * Извлечение значений по ключам из массива ассоциативных массивов
     *
     * @param $key string|array Ключ или массив ключей массива
     * @param $array array Массив
     * @return array
     * @throws Exception
     */
    function array_select($key, $array)
    {
        if(!is_array($array)) {
            throw new Exception('Invalid $array type');
        }

        $result = array();
        if (!is_array($key)) {
            foreach ($array as $el) {
                $result[] = isset($el[$key]) ? $el[$key] : null;
            }
        } else {
            $keys = $key;
            foreach ($array as $elKey => $el) {
                $resultEl = array();
                foreach ($keys as $key) {
                    $resultEl[$key] = isset($el[$key]) ? $el[$key] : null;
                }
                $result[$elKey] = $resultEl;
            }
        }
        return $result;
    }
}

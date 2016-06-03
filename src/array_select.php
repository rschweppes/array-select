<?php

if(!function_exists('array_select')) {
    /**
     * Извлечение значений по ключам из массива ассоциативных массивов
     *
     * @param $key string|array Ключ или массив ключей массива
     * @param $array array Массив
     * @return array
     */
    function array_select($key, $array)
    {
        if(!is_array($key)) {
            return array_map(function($el) use ($key) {
                return $el[$key];
            }, $array);
        } else {
            $keys = $key;
            $result = array();
            foreach ($array as $elKey => $el) {
                $resultEl = array();
                foreach ($keys as $key) {
                    $resultEl[$key] = $el[$key];
                }
                $result[$elKey] = $resultEl;
            }
            return $result;
        }
    }
}

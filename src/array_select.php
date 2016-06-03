<?php

if(!function_exists('array_select')) {
    /**
     * Извлечение значений по ключам из массива ассоциативных массивов
     *
     * @param $key string|array Ключ или массив ключей массива
     * @param $from array Массив
     * @return array
     * @throws Exception
     */
    function array_select($key, $from)
    {
        if(!is_array($from)) {
            throw new Exception('Invalid $from type');
        }

        $result = array();
        if (!is_array($key)) {
            foreach ($from as $elKey => $el) {
                $result[$elKey] = isset($el[$key]) ? $el[$key] : null;
            }
        } else {
            $keys = $key;
            foreach ($from as $elKey => $el) {
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

<?php

if(!function_exists('array_select')) {
    /**
     * ���������� �������� �� ������ �� ������� ������������� ��������
     *
     * @param $key string|array ���� ��� ������ ������ �������
     * @param $array array ������
     * @return array
     */
    function array_select($key, $array)
    {
        $result = array();
        if(!is_array($key)) {
            foreach ($array as $el) {
                $result[] = $el[$key];
            }
        } else {
            $keys = $key;
            foreach ($array as $elKey => $el) {
                $resultEl = array();
                foreach ($keys as $key) {
                    $resultEl[$key] = $el[$key];
                }
                $result[$elKey] = $resultEl;
            }
        }
        return $result;
    }
}

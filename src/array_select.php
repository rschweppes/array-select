<?php

function array_select($key, $array)
{
    if(!is_array($key)) {
        return array_map(function($el) use ($key) { return $el[$key]; }, $array);
    } else {
        $keys = $key;
        $result = [];
        foreach ($array as $elKey => $el) {
            $resultEl = [];
            foreach ($keys as $key) {
                $resultEl[$key] = $el[$key];
            }
            $result[$elKey] = $resultEl;
        }
        return $result;
    }
}

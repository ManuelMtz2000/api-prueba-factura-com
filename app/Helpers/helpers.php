<?php

if ( !function_exists('mergeIfDifferent') ) {
    function mergeIfDifferent( array $base, object $updates ) 
    {
        foreach ( $updates as $key => $value ) {
            if ( $value && array_key_exists( $key, $base ) && $base[$key] !== $value ) {
                $base[$key] = $value;
            }
        } 

        return $base;
    }
}
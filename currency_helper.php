<?php

/**
 * Ecommerce-CMS
 *
 * Copyright (C) 2015  Tihomir Blazhev.
 *
 * LICENSE
 *
 * Ecommerce-cms is released with dual licensing, using the GPL v3 (license-gpl3.txt) and the MIT license (license-mit.txt).
 * You don't have to do anything special to choose one license or the other and you don't have to notify anyone which license you are using.
 * Please see the corresponding license file for details of these licenses.
 * You are free to use, modify and distribute this software, but all copyright information must remain.
 *
 * @package     ecommerce-cms
 * @copyright   Copyright (c) 2014 through 2015, Tihomir Blazhev
 * @license     http://opensource.org/licenses/MIT  MIT License
 * @version     1.0.0
 * @author      Tihomir Blazhev <raylight75@gmail.com>
 */
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Currency Helper
 *
 * @package ecommerce-cms
 * @category Currency Converter Helper
 * @author Tihomir Blazhev <raylight75@gmail.com>
 * @link https://raylight75@bitbucket.org/raylight75/ecommerce-cms.git
 */
if (! function_exists('currency')) {

    function currency($input)
    {
        $ci = & get_instance();
        $ci->load->database();
        $var = $ci->session->userdata('set_currency');
        // asign session data to var
        if (isset($var)) {
            // check to see thath we have somethink in session
            $ci->db->select('*');
            $ci->db->from('currencies');
            // you need valid database and table
            $ci->db->where('name', $var);
            // column with name of the currency from database
            $query = $ci->db->get();
            $row = $query->row();
            $rate = $row->rate;
            // column with rates from database
        } else {
            $rate = 1;
            // default value for default currency
        }
        $total = (double) $input * (double) $rate;
        return number_format((double) $total, 2);
        // enough preccision for now, change if you want
    }
}

if (! function_exists('label')) {

    function label()
    {
        $ci = & get_instance();
        $var = $ci->session->userdata('set_currency');
        if (isset($var)) {
            $result = $ci->session->userdata('set_currency');
            //set name of the currency from session
        } else {
            $result = "USD";
            // set yout current currency
        }
        return $result;
    }
}
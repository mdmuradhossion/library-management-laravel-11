<?php

use Illuminate\Support\Facades\DB;

if(!function_exists('test')){
    function test(){
        return 'Ok';
    }
}

if(!function_exists('statusView')){
    function statusView($sel){
        $status = array(
            '0' => '<span style="color: red">Blocked</span>',
            '1' => '<span style="color: green">Active</span>',
        );
        $option = '';
        foreach ($status as $key => $item) {
            $option .= ($sel == $key) ? $item : '';
        }
        return $option;
    }
}

if(!function_exists('globalStatus')) {
    function globalStatus($selected = '')
    {
        $status = [
            '1' => 'Active',
            '0' => 'Blocked',
        ];

        $row = '';
        foreach ($status as $key => $option) {
            $row .= '<option value="' . $key . '"';
            $row .= ($selected == $key) ? ' selected' : '';
            $row .= '>' . $option . '</option>';
        }
        return $row;
    }
}

if(!function_exists('get_data_by_id')) {
    function get_data_by_id($needCol, $table, $whereCol, $whereInfo)
    {

        $query = DB::table($table)->where($whereCol,$whereInfo)->first();
        $result = $query;
        if (!empty($result)) {
            $col = $result->$needCol;
        } else {
            $col = false;
        }
        return $col;
    }
}
if(!function_exists('all_data_array_by_table')) {
    function all_data_array_by_table($table){
        $tableData = DB::table($table)->get();
        return $tableData;
    }
}

if(!function_exists('getListInOption')) {
    function getListInOption($selected, $tblId, $needCol, $table){
        $query = DB::table($table)->get();
        $options = '';
        foreach ($query as $value) {
            $options .= '<option value="' . $value->$tblId . '" ';
            $options .= ($value->$tblId == $selected) ? ' selected="selected"' : '';
            $options .= '>' . $value->$needCol . '</option>';
        }
        return $options;
    }
}

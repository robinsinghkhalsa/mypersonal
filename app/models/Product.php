<?php

class Product extends Eloquent {

    Public function getRecords() {
        $res = DB::table('purchase_record')->get();
        return $res;
    }
    Public function getRecordById($id) {
        $res = DB::table('purchase_items')->where(array('pid'=>$id))->get();
        return $res;
    }

}

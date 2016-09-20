<?php

class HomeController extends BaseController {
    /*
      |--------------------------------------------------------------------------
      | Default Home Controller
      |--------------------------------------------------------------------------
      |
      | You may wish to use controllers instead of, or in addition to, Closure
      | based routes. That's great! Here is an example controller method to
      | get you started. To route to this controller, just add the route:
      |
      |	Route::get('/', 'HomeController@showWelcome');
      |
     */

    public function showWelcome() {
        return View::make('hello');
    }

    public function index() {

        $obj = new Product();
        $arr = $obj->getRecords();

        return View::make('index', array('row' => $arr));
    }

    public function view($id) {

        $obj = new Product();
        $arr = $obj->getRecordById($id);

        return View::make('viewdetail', array('row' => $arr));
    }

    public function getProductItems($id) {
        $obj = new Product();
        $arr = $obj->getRecordById($id);
        $string = "<table class='table' id='myTable1'><thead><tr><th>Id</th><th>Pid</th><th>Item name</th><th>Amount</th><th>Date</th></tr></thead><tbody>";

        foreach ($arr as $val) {
            $string .= "<tr><td>" . $val->id . "</td><td>" . $val->pid . "</td><td>" . $val->items . "</td><td>&#8377;" . $val->amount . "</td><td>" . date('d-m-Y', strtotime($val->date_created)) . "</td></tr>";
        }
        $string.="</tbody>
            </table>";

        if (empty($arr)) {
            return json_encode(array('success' => 0));
        } else {
            return json_encode(array('success' => 1, 'data' => $string));
        }
    }

    public function addDataItems() {
        $item_name = Input::get('name');
        $item_amount = Input::get('amount');
        $pid = Input::get('pid');

        $wherearray = array('amount' => $item_amount, 'pid' => $pid, 'items' => $item_name, 'date_created' => date('Y-m-d H:i:s'));
        if (DB::table('purchase_items')->insert($wherearray)) {

            //get the purchase amount
            $res = DB::table('purchase_record')->where(array('id' => $pid))->get();

            $amount = $res[0]->amount + $item_amount;

            //update the purchased amount
            if (DB::table('purchase_record')->where(array('id' => $pid))->update(array('amount' => $amount))) {
                return json_encode(array('success' => 1));
            } else {
                return json_encode(array('success' => 0));
            }
        } else {
            return json_encode(array('success' => 0));
        }
    }

    public function addProduct() {
        $item_name = Input::get('name');
        $item_amount = Input::get('amount');

        $wherearray = array('amount' => $item_amount, 'particulars' => $item_name, 'date_created' => date('Y-m-d H:i:s'));
        if (DB::table('purchase_record')->insert($wherearray)) {
            return Redirect::to('/')->with(array('success' => 1, 'msg' => 'Purchase added successfully!'));
        } else {
            return Redirect::to('/')->with(array('error' => 1, 'msg' => 'Something went wrong please try again!'));
        }
    }

}

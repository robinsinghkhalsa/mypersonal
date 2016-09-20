
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.js"></script>
    </head>
    <body>

        <div class="container">

            <?php if (Session::has('success')) { ?>
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> <?php echo Session::get("msg"); ?>
                </div>
            <?php } ?>

            <?php if (Session::has('error')) { ?>
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Danger!</strong> <?php echo Session::get("msg"); ?>
                </div>
            <?php } ?>

            <h2>Purchase record</h2>
            <a class="btn btn-success col-md-offset-5" href="<?php echo URL::to('addproduct'); ?>">Add Purchase</a>
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Particulars</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($row as $val) { ?>
                        <tr>
                            <td><?php echo $val->id; ?></td>
                            <td><a href="<?php echo URL::to('/product') . '/' . $val->id; ?>"><?php echo $val->particulars; ?></a></td>
                            <td>&#8377;<?php echo $val->amount . '/-'; ?></td>
                            <td><?php echo date('d-m-Y g:i:s', strtotime($val->date_created)); ?></td>
                            <td>
                                <button type="button" class="btn btn-success view_detail" pid='<?php echo $val->id; ?>'>View Items</button>
                                <button type="button" class="btn btn-success add_items"  pid='<?php echo $val->id; ?>'>Add items</button>
                            </td>
                        </tr>
                    <?php } ?> 
                </tbody>
            </table>
        </div>
    </body>
</html>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Purchased Items</h4>
            </div>
            <div class="modal-body">
                <div id='product_items_div'>

                    <table class="table" id="">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Particulars</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="table_body">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<!-- Add items Modal-->

<div class="modal fade" id="addItemsModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Items</h4>
            </div>
            <div class="modal-body">
                <div id='additems_items_div'>
                    <?php echo Form::open(array('id' => 'add_items_form', 'method' => 'post')) ?>

                    <div class="form-group">
                        <?php
                        echo Form::label('name', 'Item Name', array('class' => ''));
                        echo Form::text('name', '', array('class' => 'form-control', 'required' => true));
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo Form::label('amount', 'Amount', array('class' => ''));
                        echo Form::text('amount', '', array('class' => 'form-control', 'required' => true));
                        echo Form::hidden('pid', '', array('class' => '', 'id' => 'form_pid'));
                        ?>
                    </div>
                    <?php echo Form::submit('Save', array('class' => 'btn btn-success')); ?>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<div style="z-index: 111111;position: absolute;top: 35.5%;margin-left: 42.7%;display:none;" id="loader_img">
    <img src="https://d7hp518nuw62l.cloudfront.net/assets/pics/loader1.gif" style="height: 200px;" alt="">
</div>

<script>
    $(document).ready(function () {
        $('#myTable,#myTable1').DataTable();
    });


//    $('#add_items').click(function () {
    $(".add_items").on("click", function (event) {

        var pid = $(this).attr('pid');
        $('#form_pid').val(pid);
        $('#addItemsModal').modal('show');

    });

    $("#add_items_form").on("submit", function (event) {

        var data = $('add_items_form').serialize();
        event.preventDefault();


        $.ajax({
            'url': 'addItems',
            'type': 'POST',
            'data': $(this).serialize(),
            'dataType': 'JSON',
            beforeSend: function () {
                $('#loader_img').show();
            },
            success: function (result) {

                if (result.success == 1) {
                    alert('Item Added successfully');
                    $('#addItemsModal').modal('hide');
                } else {
                    alert('Something went wrong please try again!');
                }


                $('#loader_img').hide();
            }
        });

    });

    $('.view_detail').click(function () {
        var id = $(this).attr('pid');


        $.ajax({
            'url': 'productitem/' + id,
            'type': 'POST',
            'data': '',
            'dataType': 'JSON',
            beforeSend: function () {
                $('#loader_img').show();
            },
            success: function (result) {

                if (result.success == 1) {
                    $('#product_items_div').html(result.data);
                } else {
                    $('#table_body').html('<tr class="odd"><td colspan="5" class="dataTables_empty" valign="top">No data available in table</td></tr>');
                }
                $('#myTable1').DataTable();
                $('#myModal').modal('show');
                $('#loader_img').hide();
            }
        });
    });




</script>
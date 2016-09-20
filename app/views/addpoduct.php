
<!DOCTYPE html>
<html lang="en">
    <head>
        

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">


        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

    </head>
    <body>

        <div class="container">

            <h2>Add Purchase</h2>
            <div id='additems_items_div'>
                <?php echo Form::open(array('id' => 'add_items_form', 'method' => 'post','url' => 'addproduct')) ?>

                <div class="form-group">
                    <?php
                    echo Form::label('name', 'Name', array('class' => ''));
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
                 <a class="btn btn-success" href="<?php echo URL::to('/'); ?>">Back</a>
            </div>
        </div>

    </body>
</html>

<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
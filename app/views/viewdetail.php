
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>

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

            <h2>Purchase Items</h2>
            <!--<a class="btn btn-success" href="<?php echo URL::to('/'); ?>">Back</a>-->
            <table class="table" id='myTable'>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Pid</th>
                        <th>Item name</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($row as $key => $val) { ?>
                        <tr>
                            <td><?php echo $val->id; ?></td>
                            <td><?php echo $val->pid; ?></td>
                            <td><?php echo $val->items; ?></td>
                            <td>&#8377;<?php echo $val->amount . '/-'; ?></td>
                            <td><?php echo date('d-m-Y g:i:s', strtotime($val->date_created)); ?></td>

                        </tr>
                    <?php } ?> 
                </tbody>
            </table>
            <a class="btn btn-success" href="<?php echo URL::to('/'); ?>">Back</a>
        </div>

    </body>
</html>

<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
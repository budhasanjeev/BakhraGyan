<?php
/**
 * Created by PhpStorm.
 * User: sanjeev-budha
 * Date: 4/21/16
 * Time: 11:50 PM
 */
session_start();
require('../common/Common.php');

if(!isset($_SESSION['email'])){
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>बाख्रा ज्ञान</title>
    <meta charset="utf-8">
    <script src="../js/query.js"></script>
    <link href="../css/bakhragyan.css" type="text/css" rel="stylesheet">

</head>

<body>
<?php
require('../views/Layout/header.php');
?>

<div id="container-size">

    <table class="table table-responsive" id="query-table">
        <thead>
        <tr>
            <th>From</th>
            <th>phone Number</th>
            <th>Email</th>
            <th>Address</th>
            <th>Query</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>

        <?php
        $queryList = array();
        $objCommon = new Common();
        $queryList = $objCommon->getQuery();

        $i = 1;
        foreach($queryList as $query){
            ?>
            <tr>
                <td><?php echo $query['full_name'] ?></td>
                <td><?php echo $query['phone_number'] ?></td>
                <td><?php echo $query['email'] ?></td>
                <td><?php echo $query['address'] ?></td>
                <td><?php echo $query['query'] ?></td>
                <td><?php echo $query['created_date'] ?></td>
                <td><button onclick="reply(<?php echo $query['id']?>)" class="btn btn-primary"><span class="glyphicon glyphicon-send"></span></button>
                    <button onclick="discard(<?php echo $query['id']?>)" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                    <button onclick="replyList(<?php echo $query['id']?>)" class="btn btn-success"><?php echo 3 ?></span></button>
                </td>
            </tr>

            <?php $i++ ; } ?>
        </tbody>
    </table>
</div>

<?php
require('../views/Layout/footer.php');
?>
<div class="modal fade" id="insert-reply" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title"></h2>
            </div>

            <div class="modal-body">

                <form class="form-horizontal" role="form" id="reply-form" method="post" action="" enctype="multipart/form-data">
                    <input type="hidden" name="mode" id="mode">
                    <input type="hidden" name="query_id" id="query_id">
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="reply">Reply</label>
                        <div class="col-sm-8">
                            <textarea type="text" class="form-control" id="reply" name="reply" style="width: 100%;height:200px"></textarea>
                        </div>
                    </div>

                    <div id="news-img" class="form-group">
                        <label class="control-label col-sm-4" for="reply"></label>
                        <button type="submit" class="btn btn-default"></button>
                    </div>
                </form>

            </div>

            <div class="modal-footer">
            </div>

        </div>
    </div>
</div>

<script>

    $(document).ready(function(){
        $('#query-table').DataTable({
            "info":true,
            "paging":true,
            "ordering":false,
            "lengthMenu":[[2,4,6,-1],[2,4,6,"All"]]
        })
    })
</script>
</body>
</html>


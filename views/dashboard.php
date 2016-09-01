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
    <link rel="icon" href="../images/logo.png" type="image/gif" sizes="16x16">
    <script src="../js/query.js"></script>
    <link href="../css/bakhragyan.css" type="text/css" rel="stylesheet">

</head>

<body>
<?php
require('../views/Layout/header.php');
?>

<div id="container-size">

    <h4>प्रश्नोत्तर सूची</h4>
    <hr>
    <table class="table table-responsive" id="query-table">
        <thead>
        <tr>
            <th>पुरा नाम</th>
            <th>मोबाइल नम्बर</th>
            <th>इमेल</th>
            <th>ठेगाना</th>
            <th>प्रश्न</th>
            <th>मिति</th>
            <th>कार्यहरु</th>
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
                    <button onclick="showReply(<?php echo $query['id'] ?>)" class="btn btn-success"><span class="glyphicon glyphicon-info-sign"></span></button>
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
                    <input type="hidden" name="mode" id="modes">
                    <input type="hidden" name="query_id" id="query_id">
                    <div class="form-group">
                        <label class="control-label col-sm-" for="reply"></label>
                        <div class="col-sm-12">
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

<div class="modal fade" id="show-reply" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title"></h2>
            </div>

            <div class="modal-body" >
                <table class="table table-striped" id="replyList">
                    <thead>
                        <tr>
                            <th>जवाफ</th>
                            <th>पुरा नाम</th>
                            <th>मिति</th>
                        </tr>
                    </thead>

                    <tbody>
                        
                    </tbody>
                </table>
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


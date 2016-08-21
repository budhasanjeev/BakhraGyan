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
            <th>S.N</th>
            <th>Query</th>
            <th>From</th>
            <th>Date</th>
            <th>Reply</th>
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
                <td><?php echo $i ?></td>
                <td><?php echo $query['query'] ?></td>
                <td><?php echo $query['query_from'] ?></td>
                <td><?php echo $query['created_date'] ?></td>
                <td><button onclick="reply(<?php echo $query['id']?>)"><span class="glyphicon glyphicon-send"></span></button></td>
            </tr>

            <?php $i++ ; } ?>
        </tbody>
    </table>
</div>

<?php
require('../views/Layout/footer.php');
?>

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


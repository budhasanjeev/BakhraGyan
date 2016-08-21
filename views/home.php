<?php
/**
 * Created by PhpStorm.
 * User: sanjeev-budha
 * Date: 4/21/16
 * Time: 9:36 PM
 */

require('../common/Common.php');


if(isset($_SESSION['email'])){
    header("Location:dashboard.php");
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>बाख्रा ज्ञान</title>
        <meta charset="utf-8">

        <script src="../js/query.js" type="text/javascript"></script>
    </head>

    <body>
        <?php
            require('Layout/header.php');
        ?>
        <div id="content">
            <div class="col-sm-8">
                <h1> बाख्रा-ज्ञान मा स्वागत छ  </h1><br>

                तपाईहरुलाई बाख्रा-ज्ञानमा स्वागत छ| बाख्रा-ज्ञान अनलाइन वेव पोर्टल हो| बाख्रा-ज्ञान एपमा बाख्रा सम्बन्धीसम्पूर्ण
                जानकारीहरु पाईन्छ| यसमा राखिएको जानकारीहरु बाख्रा विशेषग तथा आधिकारिक स्रोतहरुबाट संशोधनगरी राखिएको हुनाले जानकारीहरु आधिकारिक छन्|
                <br>
                <br>
                यस एपमा कृषकले सजिलैसंग बाख्रा पालन गर्ने बिधिहरु प्राप्त गर्न सक्नुहुनेछ|यो एपमा कृषकले आफ्नाजिज्ञासाहरु राख्न पाउनेहुनेछ|तथा बाख्रा
                विशेषगबाट कृषकहरुको जिज्ञासाहरु समाधान गर्न प्रयत्न गर्न खोजेको छौ|

          </div>
            <div class="col-sm-4">

                <fieldset>
                    <legend style="text-align: center;">आफ्नो बाख्रा सम्बन्धि जिझासा लेख्नुहोस| <br>
                    </legend>
                </fieldset>
                <p style="text-align: center;"><b >सबै विवरणहरु अनिवार्य छन् | </b></p>
                <form class="form-horizontal" role="form" id="query-form" >
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="fullName">पुरा नाम:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="fullName" name="fullName">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="phoneNumber">फोन नम्बर:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber">
                        </div>
                    </div>

                    <div id="news-img" class="form-group">
                        <label class="control-label col-sm-4" for="email">इमेल:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="email" name="email" >
                        </div>
                    </div>

                    <div id="news-img" class="form-group">
                        <label class="control-label col-sm-4">ठेगाना:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                    </div>
                    <div id="news-img" class="form-group">
                        <label class="control-label col-sm-4">प्रश्न:</label>
                        <div class="col-sm-8">
                            <textarea type="text" class="form-control" id="query" name="query" style="height: 100px"></textarea>
                        </div>
                    </div>
                    <div id="news-img" class="form-group">
                        <label class="control-label col-sm-4"></label>
                        <div class="col-sm-8">
                            <button onclick="farmerQuery()" class="btn btn-primary">पठाउनुहोस्</button>
                        </div>
                    </div>
            </div>
        </div>

                </form>

            </div>
        </div>
        <?php
            require('Layout/footer.php');
        ?>
    </body>

</html>
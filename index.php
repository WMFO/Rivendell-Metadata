<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>WMFO Rivendell Search</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/bootstrap-responsive.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
      }

      /* Custom container */
      .container-narrow {
        margin: 0 auto;
        max-width: 700px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 60px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 72px;
        line-height: 1;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }
.filter-close {
    float: none;
    position: relative;
    left: 5em;
    top: 1.25em;
    z-index: 3;
}
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
<script src="../assets/js/html5shiv.js"></script>
<![endif]-->

<!-- Fav and touch icons -->
</head>

<body id="everything">

<div class="container-narrow">

<div class="masthead">
<ul class="nav nav-pills pull-right">
<li><a href="http://www.wmfo.org/">WMFO Home</a></li>
</ul>
<a href="http://www.wmfo.org/"><img src="WMFO-logo.png"></a>
<h2 align="center" class="muted">WMFO Rivendell Search</h2>
</div>
<noscript>
<div class="alert alert-error">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<strong>Fiddlesticks!</strong> This website requires Javascript, and you appear to have it disabled. Please enable JavaScript for proper functionality. Thanks!
</div>
</noscript>

<hr>
<form class="form" id="resultsform">
<select id="selector" name="category"> 
<option value="artist">By Artist</option>
<option value="title">By Title</option>
<option value="album">By Album</option>
</select>
<label for="query">Query:</label>
<input type="text" id="query" name="query" size="30" maxlength="255" autocomplete="off">
<div class="accordion" id="accordion2">
<div class="accordion-group">
<div class="accordion-heading">
<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">Advanced Options</a>
</div>
<div id="collapseOne" class="accordion-body collapse">
<div class="accordion-inner">
<div class="controls form-inline">
<label for="limit">Limit:</label>
<select id="limit" name="limit">
<option value="25">25</option>
<option value="50">50</option>
<option value="125">125</option>
<option value="250"selected>250</option>
<option value="250">500</option>
<option value="250">1000</option>
</select><br>
<input type="checkbox" name="exact" value="true" id="exact">
<label for="exact">Exact Matches Only</label><br>
</div>
</div>
</div>
</div>
</div>
</form>
<div id="tablediv"></div>


        <hr>


        <div class="footer">
        <p>&copy; WMFO <?php echo date("Y"); ?></p>
        </div>

        </div> <!-- /container -->

        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="./js/jquery-1.9.1.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
<script>
function loadTable() {
    $("#tablediv").html("<p>Loading...</p>");
    var data = $("#resultsform").serialize();
    $.post('./resultstable.php', data, function(results) {
        $("#tablediv").html(results);
    });
}
$(loadTable);
$("#selector").change(loadTable);
$("#limit").change(loadTable);
$("#query").change(loadTable);
$("#exact").change(loadTable);
$('#query').keypress(function(e){
    if ( e.which == 13 ) // Enter key = keycode 13
    {
        $(this).blur();
        return false;
    }
});
</script>
</body>
</html>

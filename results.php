<!DOCTYPE html>
<html>
<head>
<title>SomebodyNu</title>
<link href="res/css/main.css" rel="stylesheet" type="text/css"/>
<link href="res/css/results.css" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-248621-5']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body>
<div id="HeaderContainer" onclick="window.location='.'"><img src="res/images/logo.png"/ alt="logo"></div>
<div id="MainContainer"> 
    <div id="ResultsContainer">
      <h1>Matches</h1>
<?php
function format_rel_ts($secs) {
    // Relative timestamp for a time (e.g. 1 day)
    if ($secs > 2*24*3600) return (int)($secs / (24*3600)) . ' days';
    else if ($secs > 0.9*24*3600) return '1 day';
    else if ($secs > 2*3600) return (int)($secs / 3600) . ' hours';
    else if ($secs > 0.9*3600) return '1 hour';
    else if ($secs > 2*60) return (int)($secs / 60) . ' minutes';
    else if ($secs > 0.9*60) return '1 minute';
    else return $secs . ' seconds';
}

$matches = 0;
while($row = mysql_fetch_assoc($result)) {
    ++$matches;

    $name = $row['name'];
    $uid = $row['uid'];
    $user_id = $row['user_id'];
    $latitude = $row['latitude'] - $user->latitude;
    $longitude = $row['longitude'] - $user->longitude;
    $location = $row['location'];
    $rel_ts = format_rel_ts($row['rel_ts']);

    $distance = null;
    if ($longitude || $latitude) {
        // Cut off everything after the first decimal.
        $distance = (int) ($row['distance'] * 10);
        $distance = (float) $distance / 10;
        if ($distance <= 1.0) {
            $location .= ", very close!";
        } else {
            $location .= ", $distance miles away";
        }
    }

    $activity_id = $row['activity_id'];
    $html = <<<EOH
        <a href="matchwith?user_id=$user_id&activity_id=$activity_id">
            <div name="result[]" class="Result">
                <img class="ProfilePic" alt="Profile Picture"
                     src="https://graph.facebook.com/$uid/picture?type=square" />
                <div class="PrimaryInfo">
                    <div class="Name">$name</div>
                    <div class="Time">Waited $rel_ts ($location)</div>
                </div>
                <div class="MatchMe">Match Me</div>
            </div>
        </a>
EOH;
    echo $html;
}

if ($matches == 0) {
    if ($user->latitude || $user->longitude || $user->location) {
        $html = <<<EOH
        <p>Didn't find anyone. You'll get an email when someone else is interested.</p>
EOH;
    } else {
        $html = <<<EOH
        <p>You must either share your location to SomebodyNu or set it on Facebook to get any matches.</p>
EOH;
        Stats::poll("nolocation", "", "", "", "", $user->id);
    }
    echo $html;
}

Stats::poll("matches", $activity, $user->location, $matches, "", $user->id);
?>
        <div class="Back" onclick="window.location='.'">Back</div>
    </div>
</div>



</body>
</html>

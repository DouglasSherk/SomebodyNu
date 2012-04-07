<!DOCTYPE html>
<html>
<head>
<title>SomebodyNu</title>
<link href="res/css/main.css" rel="stylesheet" type="text/css"/>
<link href="res/css/results.css" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<script src="res/js/jquery-1.7.1.min.js"></script>
<script src="res/js/jquery.blockUI.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js">
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
<?php if (!$userInGroup) { ?>
        <a href="#" id="new-group">
            <div name="result[]" class="Result">
                <img class="ProfilePic" alt="Profile Picture"
                     src="http://dl.dropbox.com/u/7367749/plus.png" />
                <div class="NewGroupDetails">
                    <span class="NewGroupLeftCaption">Number of people:</span>
                </div>
                <div class="NewGroup">
                    Create a group
                </div>
            </div>
        </a>
<?php } ?>
<script>
var newgroup = $('#new-group');
var newgroupbtn = $('.NewGroup');
var details = $('.NewGroupDetails');
newgroup.click(function() {
    newgroup.unbind('click');
    newgroupbtn.hide();
    for (var i = 2; i <= 10; i++) {
        var n = $(document.createElement('span'));
        n.click(createGroup(i));
        n.addClass('GroupSizeBtn').html(i);
        details.append(n);
    }
    details.show();
});
function createGroup(i) {
    return function () {
        $.blockUI({message: '<h1>Creating group...</h1>'});
        $.post(
            "newgroup",
            { size: i, activity: <?php echo $activity; ?> }, 
            function(responseText) {
                if (responseText != 'ok') {
                    alert(responseText);
                }
                newgroup.html('\
    <a href="#">\
        <div name="result[]" class="Result">\
            <img class="ProfilePic" alt="Profile Picture"\
            src="https://graph.facebook.com/<?php echo $user->uid; ?>/picture?type=square" />\
            <span class="LFNum">Looking for ' + (i-1) + ' more people</span>\
        </div>\
    </a>');
                $.unblockUI();
            },
            "html"
        );
    };
}
</script>
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

$matches = mysql_num_rows($result);
$previous_group_id = null;
$first_div = true;
$userInGroup = false;
$remaining = 0;
while($row = mysql_fetch_assoc($result)) {
    $name = $row['name'];
    $uid = $row['uid'];

    $activity_id = $row['activity_id'];
    $group_id = $row['group_id'];
    $prev_remaining = $remaining;
    $remaining = $row['remaining'];

    $prev_userInGroup = $userInGroup;
    $userInGroup = $row['userInGroup'];

    if ($previous_group_id != $group_id) {
        if ($first_div != true) {
            $html = <<<EOH
                <span class="LFNum">Looking for $prev_remaining more people</span>
EOH;

            if (!$prev_userInGroup) {
                $html .= '<div class="MatchMe">Match Me</div>';
            }
            $html .= "</div>";
            if (!$prev_userInGroup) { 
                $html .= "</a>";
            }
            echo $html;
        }
        $first_div = false;

        if ($userInGroup) {
            $html = <<<EOH
            <div name="result[]" class="Result">
EOH;
            echo $html;
           
            $first_div = false;
        } else {
            $html = <<<EOH
            <a href="groupmatch?group_id=$group_id&activity_id=$activity_id">
                <div name="result[]" class="Result">
EOH;
            echo $html;
        }
    }
    $previous_group_id = $group_id;

    $html = <<<EOH
                <img class="ProfilePic" alt="Profile Picture"
                     src="https://graph.facebook.com/$uid/picture?type=square" />
EOH;
    echo $html;
}

if ($matches == 0) {
    if ($user->latitude || $user->longitude || $user->location) {
        $html = <<<EOH
        <!--<p>Didn't find anyone.</p>-->
EOH;
    } else {
        $html = <<<EOH
        <p>You must either share your location to SomebodyNu or set it on Facebook to get any matches.</p>
EOH;
        Stats::poll("nolocation", "", "", "", "", $user->id);
    }
    echo $html;
} else {
    $html = <<<EOH
                <span class="LFNum">Looking for $remaining more people</span>
EOH;

    if (!$userInGroup) {
        $html .= '<div class="MatchMe">Match Me</div>';
    }
    $html .= "</div>";
    if (!$userInGroup) { 
        $html .= "</a>";
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

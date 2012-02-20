<!DOCTYPE html>
<html>
<head>
<title>Somebody.Nu</title>
<link href="res/css/main.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<!--<script src="res/js/css3-mediaqueries.js"></script>-->
<script src="res/js/jquery-1.7.1.min.js"></script>
<script src="res/js/jquery.blockUI.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js">
</script>
<script src="res/js/cancelSearch.js"></script>

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
<?php
if (!isset($_SESSION['locationset'])) {
?>
<script type="text/javascript">
function foundLocation(p) {
    var latitude, longitude;
    if (p != null && p.coords != null) {
        latitude = p.coords.latitude;
        longitude = p.coords.longitude;
    }

    $.blockUI({message: '<h1>Please wait while we fetch your location...</h1>'});
    $.post(
        "location",
        {latitude: latitude, longitude: longitude},
        function(responseText) {
            $.unblockUI();
        },
        "html"
    );
}

if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(foundLocation);
} else {
    foundLocation(null);
}
</script>
<?php
}
?>
</head>

<body>
<div id="HeaderContainer">
    <img class="logo" src="res/images/logo.png" alt="logo" onclick="window.location='.'" />
    <div id="ProfilePicList">
        <span id="ProfilePicListTitle">A few people you might meet...</span>
<?php
        $result = mysql_query(
            "SELECT distinct uid FROM users ORDER BY RAND() LIMIT 20 ");    
        $first = true;
        while ($row = mysql_fetch_assoc($result)) {
            $uid = $row['uid'];
            $classes = '';
            if ($first) $classes .= 'first';
            echo <<<EOH
    <img class="ProfilePic $classes" alt="Profile Picture"
         src="https://graph.facebook.com/$uid/picture?type=square" />
EOH;
            $first = false;
        }
?>
    </div>
</div>
<div id="MainContainer">
 
<?php
    if (isset($_SESSION['matched_name'])) {
?>
        <div id="FlashMessage">
            <p>You've been matched with <a href="https://facebook.com/<?php echo $_SESSION['matched_uid']; ?>"><?php echo $_SESSION['matched_name']; ?></a>! You should receive an email shortly.</p>
        </div>
<?php
        unset($_SESSION['matched_name']);
        unset($_SESSION['matched_uid']);
    }
?>

<?php
        $result = mysql_query(
            "SELECT queues.user_id, activities.name " .
            "FROM activities, queues " .
            "WHERE activities.id = queues.activity_id " .
            "  AND queues.user_id = \"$user->id\" " .
            "LIMIT 1");
        $activity = '';
        $is_disabled = false;
        if ($row = mysql_fetch_assoc($result)) {
            $activity = $row['name'];
            $is_disabled = true;
        }
?>
 
    <div id="SearchBarContainer">
        <div id="SearchBar">
            <div id="SearchBarHint">
<?php
        if ($is_disabled) {
?>
                <p align="center">You must cancel your previous posting before making another search</p>
<?php
        } else {
?>
                <p align="center">Start typing an activity and select one from the choices</p>
<?php
        }
?>
            </div>
            <div id="PopularActivityContainer">
                <h2>What's Popular?</h2>
<?php
        // List popular activities in decreasing order of popularity
        $query = "SELECT name, COUNT(queues.id) as n " .
        " FROM activities, queues " .
        " WHERE activities.id = queues.activity_id " .
        " AND user_id <> " . $user->id .
        " GROUP BY activities.id " .
        " ORDER BY COUNT(queues.id) DESC";
        $result = mysql_query($query) or die(mysql_error());
        $maxn = null;
        $i = 0;
        $out_table = array();  // key:name, val:html
        while ($row = mysql_fetch_assoc($result)) {
            $name = $row['name'];
            $n = $row['n'];
            if (!$maxn) $maxn = $n;
            $is_item_disabled = ($is_disabled && !($name == $activity));
            $class = $is_item_disabled ? "disabled" : "";
            $onclick_n = "queue('$name')";
            $onclick = $is_item_disabled ? "" : $onclick_n;
            if ($i < 6) {
                $r = 255;
                $g = $b = min(255 - intval(255 * ($n / $maxn)), 150);
                $hotness_html = <<<EOH
                    <span class="Hot" style="color:rgb($r,$g,$b)">[Hot!]</span>
EOH;
            } else {
                $hotness_html = '';
            }
            $html = <<<EOH
            <span class="PopularActivity $class" onclick="$onclick" data-onclick-n="$onclick_n">$name$hotness_html</span>
EOH;
            $out_table[$name] = $html;
            ++$i;
        }
        asort($out_table);
        foreach ($out_table as $html) {
            echo $html;
        }
?>
            <script>
                function queue($activity) {
                    $('#activity').attr('disabled', false);
                    $('#activity').val($activity);
                    $('#SearchBar form').submit();
                }
                function unqueue() {
                    $('#Unqueue').html('Loading');
                    $('#Unqueue').attr('disabled', true);
                    $.ajax({
                        type: 'POST',
                        url: '/unqueue',
                        success: function () {
                            $('#activity').attr('disabled', false);
                            $('#activity').val('');
                            $('#Unqueue').hide();
                            $('#ViewResults').hide();
                            $(".PopularActivity").removeClass('disabled');
                            $(".PopularActivity").each(function (){
                                try {
                                    $(this).attr(
                                        'onclick',
                                        $(this).data('onclick-n'));
                                } catch (e) {}  // No popular thingies
                            });
                            toggleHint();
                        }
                    });
                }
                function view() {
                    $('#activity').attr('disabled', false);
                    $('#SearchBar form').submit();
                }
                function toggleHint() {
	                var hint = document.getElementById("SearchBarHint");
		            hint.innerHTML = "<p align=\"center\">Start typing an activity and select one from the choices</p>";
                }
            </script>
        </div>
    
            <div id="Unqueue" class="<?php echo $is_disabled ? '' : 'disabled'; ?>" onclick="<?php echo $is_disabled ? 'unqueue()' : ''; ?>">Cancel Search</div>
            <div id="InnerSearchBar">
                <form action="match" method="post">
                    <div align="center">
                    <input type="text" id="activity" name="activity" placeholder="Activity Name" value="<?php echo $activity; ?>" <?php echo $is_disabled ? 'disabled' : ''; ?> />
                    <div id="ViewResults" class="<?php echo $is_disabled ? '' : 'disabled'; ?>" onclick="<?php echo $is_disabled ? 'view()' : ''; ?>">
                        View Results
                    </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var memo = {};
    $('.ui-menu-item').live('click', function() {
        // TODO(jkoff): Why can't we do this? It's cleaner than the method
        // below.
        //$(this).children(0).click();
        $('#activity').val($(this).children(0).html());
        $('form').submit();
    });
    $('#activity').autocomplete({
        autoFocus: false,
        focus: function(evt, ui) {},
        select: function (evt, ui) {
            console.log(evt);
            console.log(ui);
            //$('#activity').val(ui.item.value);
            //$('form').submit();
        },
        source: function (req, res) {
            if (req.term in memo) return res(memo[req.term]);
            $.get('/autocomplete', {q:req.term}, function (data) {
                var ret = $.map(eval(data), function (elt) {
                    return {
                        label: elt.text,
                        value: elt.text
                    };
                });
                memo[req.term] = ret;
                res(ret);
            });
        }
    });
  </script>
</body>
</html>

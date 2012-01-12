<?php
require_once( 'includes/facebookLib.php' );

class User {
    /**
     * Facebook uid, pulled from FB API. Ex: 515551882832
     */
    public static $uid;

    /**
     * Username, pulled from FB API. Ex: Doug Sherk
     */
    public static $name;

    /**
     * Email address, pulled from FB API. Ex: myemail@mydomain.com
     */
    public static $email;

    /**
     * Location of user, pulled from FB API. Ex: Toronto, Canada
     */
    public static $location;

    /**
     * Logout URL to get out of FB App.
     */
    public static $logoutUrl;

    /**
     * Geolocation, distinct from location. Ex: 12.22, 51.3
     */
    public static $latitude;
    public static $longitude;

    public function login() {
        if ($_SESSION['user'] != null) {
            return true;
        }

        $facebook = new facebookLib(array(
            'appId' => Config::appId(),
            'secret' => Config::secret(),
            'cookie' => true,
        ));

        $uid = $facebook->getUser();
        if (!$uid) {
            return false;
        }

        try {
            $me = $facebook->api('/me');
            // The user is not authenticated with the app. Bail out.
            if ($me == null) {
                return false;
            }

            $user = new User();
            $user->uid = $uid;
            $user->name = $me['name'];
            $user->email = $me['email'];
            $user->location = strtok($me['location']['name'], ',');
            $user->logoutUrl = $facebook->getLogoutUrl();
            $query = "INSERT INTO users (uid, name, location, email) VALUES ('" .
                     mysql_real_escape_string( $user->uid ) . "', '" .
                     mysql_real_escape_string( $user->name ) . "', '" .
                     mysql_real_escape_string( $user->location ) . "', '" .
                     mysql_real_escape_string( $user->email ) . "') " .
                     "ON DUPLICATE KEY UPDATE " .
                     "name=VALUES(name), location=VALUES(location), email=VALUES(email), id=LAST_INSERT_ID(id);";
            mysql_query($query) or die(mysql_error());
            $user->id = mysql_insert_id();

            $_SESSION['user'] = $user;
        } catch (FacebookApiException $e) {
            error_log($e);
            return false;
        }

        return true;
    } 
}

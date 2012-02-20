<?php
Stats::poll("logout", "", "", "", "", $user->id);
header("Location: " . $user->logoutUrl);
session_destroy();

<?php
header("Location: " . $user->logoutUrl);
session_destroy();

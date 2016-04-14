<?php

include 'config/config.php';

$q = empty($_GET['q']) ? '' : $_GET['q'];

if($q == '')
   $page  = 'home';

else if($q == 'movie')
   $page = 'movie';

else if($q == 'about')
   $page = 'about';

else if($q == 'about2')
   $page = 'about2';

else if($q == 'signup')
   $page = 'signup';

else if($q == 'login')
   $page = 'login';

else if($q == 'logout')
   $page = 'logout';

else if($q == 'profile')
   $page = 'profile';

else if($q == 'planning')
   $page = 'planning';

else if($q == 'planning2')
   $page = 'planning2';

else if($q == 'search')
   $page = 'search';

else
   $page = '404';

include 'includes/'.$page.'.php';
include 'views/pages/'.$page.'.php';

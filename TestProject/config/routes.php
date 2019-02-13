<?php
return array(
    'start' => 'home/start',
    'admin/([^ ]+)/([^ ]+)' => 'home/smsLogin/$1/$2',
    'admin/([^ ]+)' => 'home/dialogue/$1',
    'admin' => 'home/admin',
    'signup' => 'home/signup',
    'login' => 'home/login',
    'home' => 'home/home',
    'logout' => 'home/logout',
    'general' => 'chat/general',
    'chat/AjaxGeneral' => 'chat/AjaxGeneral',
    'chat/([^ ]+)/AjaxSmsLoginChat' => 'chat/AjaxChatLogin/$1',
    'chat/([^ ]+)' => 'chat/login/$1',
    'chat' => 'chat/chat'
    
);
<?php 
    const SQL_REGIS_INSERT = 'INSERT INTO users (login,email,password,id_role) VALUES (:login,:email,:password,:id_role)';
    
    const SQL_REGIS_EMAIL = 'SELECT email FROM users WHERE email = :email';

    const SQL_AVTORIZ_LOGIN = 'SELECT login FROM users WHERE login = :login';

    const SQL_AVTORIZ_PASSWORD = 'SELECT * FROM users WHERE password = :password AND login = :login';

    const SQL_LOGIN_ID = 'SELECT * FROM users WHERE id_user = :id_user';

    const SQL_WRITE_SMS = 'INSERT INTO sms_general (login,sms,data_send) VALUES (:login,:sms,:data)';
    
    const SQL_OUTPUT_SMS = 'SELECT login, sms, data_send FROM sms_general';

    const SQL_COUNT_LOGIN = 'SELECT * FROM users WHERE id_user != :id';

    const SQL_SMS_LOGIN = 'INSERT INTO sms_private (login_sender,login_recipient,sms,data_sender) VALUES (:login_sender,:login_recipient,:sms,:data_sender)';

    const SQL_SMS_LOGIN_SELECT = "SELECT * FROM sms_private WHERE (login_sender = :login_sender OR login_recipient = :login_recipient) AND (login_sender = :login_sender1 OR login_recipient = :login_recipient1)";

    const SQL_DIALOGUE_USER_RECIPIENT = "SELECT login_recipient FROM sms_private WHERE login_sender = :login_sender GROUP BY login_recipient";

    const SQL_DIALOGUE_USER_SENDER = "SELECT login_sender FROM sms_private WHERE login_recipient = :login_recipient GROUP BY login_sender";
?>
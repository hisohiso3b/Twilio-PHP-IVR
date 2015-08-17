# Twilio-PHP-IVR
PHPでTwilioAPIを用いた自動音声システム(IVR)サンプルです。

#使い方
１、PHPサーバーで動かし、Twilioの設定で着信時このPHPへアクセスするように設定します。
２、自動音声が流れるので番号をプッシュします。
３、ivr.phpからPOST_URLへ番号がPOSTで送信されます。
４、POSTでの送信の成功、失敗を音声で知らせて通話を終了します。

#!/bin/bash
ACCOUNTSID=AC6d1e6f7497f9f28b227762c9c4656280
AUTHTOKEN=479b4c1e185f75db874e83035f9ba470
CALLERID=415-749-9876
sleep 60

curl -fSs -u "$ACCOUNTSID:$AUTHTOKEN" -d "Caller=$CALLERID" -d "Called=%2B86$1" -d "Url=http://twimlets.com/message?Message=http%253A%252F%252F54.248.217.111%252Ftestaudioforcall2.mp3" "https://api.twilio.com/2008-08-01/Accounts/$ACCOUNTSID/Calls" 2>&1

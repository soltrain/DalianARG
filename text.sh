#!/bin/bash
ACCOUNTSID=AC6d1e6f7497f9f28b227762c9c4656280
AUTHTOKEN=479b4c1e185f75db874e83035f9ba470
CALLERID=415-749-9876
sleep 60
curl -fSs -u "$ACCOUNTSID:$AUTHTOKEN" -d "From=$CALLERID" -d "To=%2B86$1" -d "Body=final test message2" "https://api.twilio.com/2010-04-01/Accounts/$ACCOUNTSID/SMS/Messages" 2>&1

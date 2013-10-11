#!/bin/bash
ACCOUNTSID=**
AUTHTOKEN=**
CALLERID=415-749-9876
sleep 200
curl -fSs -u "$ACCOUNTSID:$AUTHTOKEN" -d "From=$CALLERID" -d "To=%2B86$1" -d "Body=Thank you for helping me. I know I can trust you. Send me an email at SARA@contactdalian.com and I will contact you after I gather more information." "https://api.twilio.com/2010-04-01/Accounts/$ACCOUNTSID/SMS/Messages" 2>&1

<?php if(!sfConfig::get("sf_debug")): ?>

<div id="livehelp">

<!--start http://www.livehelpnow.net  -->
<!--This DIV object will show the live chat button, have it placed in the location on your website where you would like the live chat button to show-->
<div id="lhnContainer" style="text-align: center;">
<div id="lhnChatButton"></div>
<div style="text-align:center;font-size:10px;"><a title="Help desk software" href="http://www.LiveHelpNow.net/" style="font-size:10px;" target="_blank">Chat with Sales and Support</a></div>
</div>


<!--You may install the following code in an external JavaScript file if you like-->
<script type="text/javascript">
var lhnAccountN=2617; //LiveHelpNow account #
var lhnButtonN = 35; //Button #
var lhnInviteEnabled = 1; //Invite visitor to chat automatically
var lhnInviteChime = 0; //1 = disable invite beep sound,0 = keep invite beep sound enabled
var lhnWindowN = 0; //Chat window #, leave 0 to open default window setup for your account
var lhnDepartmentN = 0; //Department #, leave 0 to not route by department
var lhnCustomInvitation = ''; //change to 1 to use custom invitation, see this article for customization instructions: http://help.livehelpnow.net/article.aspx?cid=1&aid=1739
var lhnCustom1 = ''; //Custom1 feed value please use encodeURIComponent() function to encode your values
var lhnCustom2 = ''; //Custom2 feed value please use encodeURIComponent() function to encode your values
var lhnCustom3 = ''; //Custom3 feed value please use encodeURIComponent() function to encode your values
var lhnTrackingEnabled = 't'; //change to 'f' to disable visitor tracking
var lhnVersion = 5.3; //LiveHelpNow version #
var lhnJsHost = (("https:" == document.location.protocol) ? "https://" : "http://"); //to force secure chat replace this line with: var lhnJsHost = 'https://';
var lhnScriptSrc = lhnJsHost + 'www.livehelpnow.net/lhn/scripts/livehelpnow.aspx?lhnid=' + lhnAccountN + '&iv=' + lhnInviteEnabled + '&d=' + lhnDepartmentN + '&ver=' + lhnVersion + '&rnd=' + Math.random();
var lhnScript = document.createElement("script"); lhnScript.type = "text/javascript";lhnScript.src = lhnScriptSrc;
if (window.addEventListener) {
    window.addEventListener('load', function () { document.getElementById('lhnContainer').appendChild(lhnScript); }, false);
}
else if (window.attachEvent) {
    window.attachEvent('onload', function () { document.getElementById('lhnContainer').appendChild(lhnScript); });
}
</script>
<!--end http://www.livehelpnow.net  -->
</div>

<?php endif; ?>

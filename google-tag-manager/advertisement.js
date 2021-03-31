var cookieName = "adblocktester"; // Name of your cookie
var cookieValue = "false"; // Value of your cookie
var expirationTime = 7200; // 2 hours in seconds
expirationTime = expirationTime * 1000; // Converts expirationtime to milliseconds
var date = new Date();
var dateTimeNow = date.getTime();

date.setTime(dateTimeNow + expirationTime); // Sets expiration time (Time now + one month)
var date = date.toUTCString(); // Converts milliseconds to UTC time string
document.cookie = cookieName+"="+cookieValue+"; SameSite=None; Secure; expires="+date+"; path=/; domain=." + location.hostname.replace(/^www\./i, ""); // Sets cookie for all subdomains
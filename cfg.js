
let localDomain=window.localStorage.getItem("local")==null?'http://localhost/balanza/local.php':window.localStorage.getItem("local");
let domain=window.localStorage.getItem("domain")==null?'':window.localStorage.getItem("domain");
let stack=[];
let debug=true;
let refresher=0;
let starTime=null;
let created=false;
let params = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=0,height=0,left=-1000,top=-1000`;

var dbName='balanza_db';
var dbDescription="Database Balanza";
let dbSize=1000*1024*1024;//1000mb
var dbVersion='';
var db = null;
var schemaLoaded=window.localStorage.getItem("schemaLoaded")==1;
var offline=window.localStorage.getItem("offline")==1;
var isApp=false;
if (isApp) {
	document.addEventListener('deviceready', function () {
    // cordova.plugins.printer is now available
}, false);
}
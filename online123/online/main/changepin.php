<?php
session_start();
if(empty($_SESSION['username']))
{
exit();
}
$user_id=$_SESSION['username'];
include "conn.php";
$mt=0;

$after_logout="SELECT * FROM `act_holder_details` WHERE `user_id`='".$user_id."'";
$after_logout_query=mysql_query($after_logout);
$after_logout_fetch=mysql_fetch_object($after_logout_query);
$admin_email=mysql_fetch_object(mysql_query("SELECT * FROM `admin`"));
$admin_email=$admin_email->email;
?>
<?php
if(isset($_POST['pass_submit']))
{
	
	$passward=$_POST['newpassword'];
         $passward1=$_POST['newpassword1'];
if($passward==$passward1)
{
	
	$update_passward="UPDATE `act_holder_details` SET cust_password='".addslashes($passward)."' where `user_id`='".$user_id."'";
           mysql_query($update_passward);
	$passupdate="SELECT * FROM `act_holder_details` WHERE `user_id`='".$user_id."'";
	$passupdate_query=mysql_query($passupdate);
	$passupdate_fetch=mysql_fetch_object($passupdate_query);
	$to=$passupdate_fetch->cust_mail;
$message="<table border='0' cellpadding='0' cellspacing='0' width='689'>
      <tbody>
        <tr>
          <td colspan='9' height='97'><div align='right'><img src='http://trexlorebk.com/logo.png'></div></td>
      </tr>

        <tr>

          <td width='549' colspan='7'><div align='right'>".date("F j, Y, g:i a")."</div></td>

        </tr>
<tr>

          <td colspan='9'><b>INTERNET BANKING  Password Changes Confirmation</b></td>

        </tr>
        <tr>

          <td colspan='9'><b> Dear Valued Customer Your New Password is $passward </b></td>

        </tr>

        <tr>

          <td colspan='9'>&nbsp;</td>

        </tr>


        <tr>

          <td colspan='9'>&nbsp;</td>

        </tr>

        <tr>

          <td colspan='9'>Please be informed that your internet banking profile was requested to change password at ".date("F j, Y, g:i a")." </td>

        </tr>

        <tr>

          <td colspan='9'>If you did not requested, please call our 24 hour interactive contact centre or send an email to e-fraudteam@enizbnkas.comimmediately.</td>

        </tr>
       

        

       
        <tr>

          <td colspan='9'> Thank you for choosing Trexlore Bank</td>

        </tr>

        <tr>

          <td colspan='9'>&nbsp;</td>

        </tr>

      </tbody>

    </table>"; 	 

	

	$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
 $headers .= 'From: '.$admin_email."\r\n";// From
 $subject  =  'INTERNET BANKING Password Change Notification' ; //Subject
if(mail($to,$subject,$message,$headers)){
	//echo 'mail send ';
header('Location:http://trexlorebk.com/online/main/dashboard.php')	;
	}
	else
	{ 
	echo "Mail Not Send";
		
}
}
else
{
$mt=1;
 $match="Password not match";
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">	
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title>Change Password</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	
	
	
	
	








<!-- Flexapp dependencies -->
<script type="text/javascript">
var require = {
	baseUrl: '/brand/celero_saskcentralCF/DynamicContent/Resources/flexApp/'
};
/*
 RequireJS 2.1.2 Copyright (c) 2010-2012, The Dojo Foundation All Rights Reserved.
 Available via the MIT or new BSD license.
 see: http://github.com/jrburke/requirejs for details
*/
var requirejs,require,define;
(function(Y){function H(b){return"[object Function]"===L.call(b)}function I(b){return"[object Array]"===L.call(b)}function x(b,c){if(b){var d;for(d=0;d<b.length&&(!b[d]||!c(b[d],d,b));d+=1);}}function M(b,c){if(b){var d;for(d=b.length-1;-1<d&&(!b[d]||!c(b[d],d,b));d-=1);}}function r(b,c){return da.call(b,c)}function i(b,c){return r(b,c)&&b[c]}function E(b,c){for(var d in b)if(r(b,d)&&c(b[d],d))break}function Q(b,c,d,i){c&&E(c,function(c,h){if(d||!r(b,h))i&&"string"!==typeof c?(b[h]||(b[h]={}),Q(b[h],
c,d,i)):b[h]=c});return b}function t(b,c){return function(){return c.apply(b,arguments)}}function Z(b){if(!b)return b;var c=Y;x(b.split("."),function(b){c=c[b]});return c}function J(b,c,d,i){c=Error(c+"\nhttp://requirejs.org/docs/errors.html#"+b);c.requireType=b;c.requireModules=i;d&&(c.originalError=d);return c}function ea(b){function c(a,g,v){var e,n,b,c,d,j,f,h=g&&g.split("https://www6.memberdirect.net/");e=h;var l=m.map,k=l&&l["*"];if(a&&"."===a.charAt(0))if(g){e=i(m.pkgs,g)?h=[g]:h.slice(0,h.length-1);g=a=e.concat(a.split("https://www6.memberdirect.net/"));
for(e=0;g[e];e+=1)if(n=g[e],"."===n)g.splice(e,1),e-=1;else if(".."===n)if(1===e&&(".."===g[2]||".."===g[0]))break;else 0<e&&(g.splice(e-1,2),e-=2);e=i(m.pkgs,g=a[0]);a=a.join("https://www6.memberdirect.net/");e&&a===g+"/"+e.main&&(a=g)}else 0===a.indexOf("index.html")&&(a=a.substring(2));if(v&&(h||k)&&l){g=a.split("https://www6.memberdirect.net/");for(e=g.length;0<e;e-=1){b=g.slice(0,e).join("https://www6.memberdirect.net/");if(h)for(n=h.length;0<n;n-=1)if(v=i(l,h.slice(0,n).join("https://www6.memberdirect.net/")))if(v=i(v,b)){c=v;d=e;break}if(c)break;!j&&(k&&i(k,b))&&(j=i(k,b),f=e)}!c&&j&&(c=j,d=f);c&&(g.splice(0,d,
c),a=g.join("https://www6.memberdirect.net/"))}return a}function d(a){z&&x(document.getElementsByTagName("script"),function(g){if(g.getAttribute("data-requiremodule")===a&&g.getAttribute("data-requirecontext")===j.contextName)return g.parentNode.removeChild(g),!0})}function y(a){var g=i(m.paths,a);if(g&&I(g)&&1<g.length)return d(a),g.shift(),j.require.undef(a),j.require([a]),!0}function f(a){var g,b=a?a.indexOf("!"):-1;-1<b&&(g=a.substring(0,b),a=a.substring(b+1,a.length));return[g,a]}function h(a,g,b,e){var n,u,d=null,h=g?g.name:
null,l=a,m=!0,k="";a||(m=!1,a="_@r"+(L+=1));a=f(a);d=a[0];a=a[1];d&&(d=c(d,h,e),u=i(p,d));a&&(d?k=u&&u.normalize?u.normalize(a,function(a){return c(a,h,e)}):c(a,h,e):(k=c(a,h,e),a=f(k),d=a[0],k=a[1],b=!0,n=j.nameToUrl(k)));b=d&&!u&&!b?"_unnormalized"+(M+=1):"";return{prefix:d,name:k,parentMap:g,unnormalized:!!b,url:n,originalName:l,isDefine:m,id:(d?d+"!"+k:k)+b}}function q(a){var g=a.id,b=i(k,g);b||(b=k[g]=new j.Module(a));return b}function s(a,g,b){var e=a.id,n=i(k,e);if(r(p,e)&&(!n||n.defineEmitComplete))"defined"===
g&&b(p[e]);else q(a).on(g,b)}function C(a,g){var b=a.requireModules,e=!1;if(g)g(a);else if(x(b,function(g){if(g=i(k,g))g.error=a,g.events.error&&(e=!0,g.emit("error",a))}),!e)l.onError(a)}function w(){R.length&&(fa.apply(F,[F.length-1,0].concat(R)),R=[])}function A(a,g,b){var e=a.map.id;a.error?a.emit("error",a.error):(g[e]=!0,x(a.depMaps,function(e,c){var d=e.id,h=i(k,d);h&&(!a.depMatched[c]&&!b[d])&&(i(g,d)?(a.defineDep(c,p[d]),a.check()):A(h,g,b))}),b[e]=!0)}function B(){var a,g,b,e,n=(b=1E3*m.waitSeconds)&&
j.startTime+b<(new Date).getTime(),c=[],h=[],f=!1,l=!0;if(!T){T=!0;E(k,function(b){a=b.map;g=a.id;if(b.enabled&&(a.isDefine||h.push(b),!b.error))if(!b.inited&&n)y(g)?f=e=!0:(c.push(g),d(g));else if(!b.inited&&(b.fetched&&a.isDefine)&&(f=!0,!a.prefix))return l=!1});if(n&&c.length)return b=J("timeout","Load timeout for modules: "+c,null,c),b.contextName=j.contextName,C(b);l&&x(h,function(a){A(a,{},{})});if((!n||e)&&f)if((z||$)&&!U)U=setTimeout(function(){U=0;B()},50);T=!1}}function D(a){r(p,a[0])||
q(h(a[0],null,!0)).init(a[1],a[2])}function G(a){var a=a.currentTarget||a.srcElement,b=j.onScriptLoad;a.detachEvent&&!V?a.detachEvent("onreadystatechange",b):a.removeEventListener("load",b,!1);b=j.onScriptError;(!a.detachEvent||V)&&a.removeEventListener("error",b,!1);return{node:a,id:a&&a.getAttribute("data-requiremodule")}}function K(){var a;for(w();F.length;){a=F.shift();if(null===a[0])return C(J("mismatch","Mismatched anonymous define() module: "+a[a.length-1]));D(a)}}var T,W,j,N,U,m={waitSeconds:7,
baseUrl:"./",paths:{},pkgs:{},shim:{},map:{},config:{}},k={},X={},F=[],p={},S={},L=1,M=1;N={require:function(a){return a.require?a.require:a.require=j.makeRequire(a.map)},exports:function(a){a.usingExports=!0;if(a.map.isDefine)return a.exports?a.exports:a.exports=p[a.map.id]={}},module:function(a){return a.module?a.module:a.module={id:a.map.id,uri:a.map.url,config:function(){return m.config&&i(m.config,a.map.id)||{}},exports:p[a.map.id]}}};W=function(a){this.events=i(X,a.id)||{};this.map=a;this.shim=
i(m.shim,a.id);this.depExports=[];this.depMaps=[];this.depMatched=[];this.pluginMaps={};this.depCount=0};W.prototype={init:function(a,b,c,e){e=e||{};if(!this.inited){this.factory=b;if(c)this.on("error",c);else this.events.error&&(c=t(this,function(a){this.emit("error",a)}));this.depMaps=a&&a.slice(0);this.errback=c;this.inited=!0;this.ignore=e.ignore;e.enabled||this.enabled?this.enable():this.check()}},defineDep:function(a,b){this.depMatched[a]||(this.depMatched[a]=!0,this.depCount-=1,this.depExports[a]=
b)},fetch:function(){if(!this.fetched){this.fetched=!0;j.startTime=(new Date).getTime();var a=this.map;if(this.shim)j.makeRequire(this.map,{enableBuildCallback:!0})(this.shim.deps||[],t(this,function(){return a.prefix?this.callPlugin():this.load()}));else return a.prefix?this.callPlugin():this.load()}},load:function(){var a=this.map.url;S[a]||(S[a]=!0,j.load(this.map.id,a))},check:function(){if(this.enabled&&!this.enabling){var a,b,c=this.map.id;b=this.depExports;var e=this.exports,n=this.factory;
if(this.inited)if(this.error)this.emit("error",this.error);else{if(!this.defining){this.defining=!0;if(1>this.depCount&&!this.defined){if(H(n)){if(this.events.error)try{e=j.execCb(c,n,b,e)}catch(d){a=d}else e=j.execCb(c,n,b,e);this.map.isDefine&&((b=this.module)&&void 0!==b.exports&&b.exports!==this.exports?e=b.exports:void 0===e&&this.usingExports&&(e=this.exports));if(a)return a.requireMap=this.map,a.requireModules=[this.map.id],a.requireType="define",C(this.error=a)}else e=n;this.exports=e;if(this.map.isDefine&&
!this.ignore&&(p[c]=e,l.onResourceLoad))l.onResourceLoad(j,this.map,this.depMaps);delete k[c];this.defined=!0}this.defining=!1;this.defined&&!this.defineEmitted&&(this.defineEmitted=!0,this.emit("defined",this.exports),this.defineEmitComplete=!0)}}else this.fetch()}},callPlugin:function(){var a=this.map,b=a.id,d=h(a.prefix);this.depMaps.push(d);s(d,"defined",t(this,function(e){var n,d;d=this.map.name;var v=this.map.parentMap?this.map.parentMap.name:null,f=j.makeRequire(a.parentMap,{enableBuildCallback:!0,
skipMap:!0});if(this.map.unnormalized){if(e.normalize&&(d=e.normalize(d,function(a){return c(a,v,!0)})||""),e=h(a.prefix+"!"+d,this.map.parentMap),s(e,"defined",t(this,function(a){this.init([],function(){return a},null,{enabled:!0,ignore:!0})})),d=i(k,e.id)){this.depMaps.push(e);if(this.events.error)d.on("error",t(this,function(a){this.emit("error",a)}));d.enable()}}else n=t(this,function(a){this.init([],function(){return a},null,{enabled:!0})}),n.error=t(this,function(a){this.inited=!0;this.error=
a;a.requireModules=[b];E(k,function(a){0===a.map.id.indexOf(b+"_unnormalized")&&delete k[a.map.id]});C(a)}),n.fromText=t(this,function(e,c){var d=a.name,u=h(d),v=O;c&&(e=c);v&&(O=!1);q(u);r(m.config,b)&&(m.config[d]=m.config[b]);try{l.exec(e)}catch(k){throw Error("fromText eval for "+d+" failed: "+k);}v&&(O=!0);this.depMaps.push(u);j.completeLoad(d);f([d],n)}),e.load(a.name,f,n,m)}));j.enable(d,this);this.pluginMaps[d.id]=d},enable:function(){this.enabling=this.enabled=!0;x(this.depMaps,t(this,function(a,
b){var c,e;if("string"===typeof a){a=h(a,this.map.isDefine?this.map:this.map.parentMap,!1,!this.skipMap);this.depMaps[b]=a;if(c=i(N,a.id)){this.depExports[b]=c(this);return}this.depCount+=1;s(a,"defined",t(this,function(a){this.defineDep(b,a);this.check()}));this.errback&&s(a,"error",this.errback)}c=a.id;e=k[c];!r(N,c)&&(e&&!e.enabled)&&j.enable(a,this)}));E(this.pluginMaps,t(this,function(a){var b=i(k,a.id);b&&!b.enabled&&j.enable(a,this)}));this.enabling=!1;this.check()},on:function(a,b){var c=
this.events[a];c||(c=this.events[a]=[]);c.push(b)},emit:function(a,b){x(this.events[a],function(a){a(b)});"error"===a&&delete this.events[a]}};j={config:m,contextName:b,registry:k,defined:p,urlFetched:S,defQueue:F,Module:W,makeModuleMap:h,nextTick:l.nextTick,configure:function(a){a.baseUrl&&"/"!==a.baseUrl.charAt(a.baseUrl.length-1)&&(a.baseUrl+="https://www6.memberdirect.net/");var b=m.pkgs,c=m.shim,e={paths:!0,config:!0,map:!0};E(a,function(a,b){e[b]?"map"===b?Q(m[b],a,!0,!0):Q(m[b],a,!0):m[b]=a});a.shim&&(E(a.shim,function(a,
b){I(a)&&(a={deps:a});if((a.exports||a.init)&&!a.exportsFn)a.exportsFn=j.makeShimExports(a);c[b]=a}),m.shim=c);a.packages&&(x(a.packages,function(a){a="string"===typeof a?{name:a}:a;b[a.name]={name:a.name,location:a.location||a.name,main:(a.main||"main").replace(ga,"").replace(aa,"")}}),m.pkgs=b);E(k,function(a,b){!a.inited&&!a.map.unnormalized&&(a.map=h(b))});if(a.deps||a.callback)j.require(a.deps||[],a.callback)},makeShimExports:function(a){return function(){var b;a.init&&(b=a.init.apply(Y,arguments));
return b||a.exports&&Z(a.exports)}},makeRequire:function(a,d){function f(e,c,u){var i,m;d.enableBuildCallback&&(c&&H(c))&&(c.__requireJsBuild=!0);if("string"===typeof e){if(H(c))return C(J("requireargs","Invalid require call"),u);if(a&&r(N,e))return N[e](k[a.id]);if(l.get)return l.get(j,e,a);i=h(e,a,!1,!0);i=i.id;return!r(p,i)?C(J("notloaded",'Module name "'+i+'" has not been loaded yet for context: '+b+(a?"":". Use require([])"))):p[i]}K();j.nextTick(function(){K();m=q(h(null,a));m.skipMap=d.skipMap;
m.init(e,c,u,{enabled:!0});B()});return f}d=d||{};Q(f,{isBrowser:z,toUrl:function(b){var d=b.lastIndexOf("."),g=null;-1!==d&&(g=b.substring(d,b.length),b=b.substring(0,d));return j.nameToUrl(c(b,a&&a.id,!0),g)},defined:function(b){return r(p,h(b,a,!1,!0).id)},specified:function(b){b=h(b,a,!1,!0).id;return r(p,b)||r(k,b)}});a||(f.undef=function(b){w();var c=h(b,a,!0),d=i(k,b);delete p[b];delete S[c.url];delete X[b];d&&(d.events.defined&&(X[b]=d.events),delete k[b])});return f},enable:function(a){i(k,
a.id)&&q(a).enable()},completeLoad:function(a){var b,c,d=i(m.shim,a)||{},h=d.exports;for(w();F.length;){c=F.shift();if(null===c[0]){c[0]=a;if(b)break;b=!0}else c[0]===a&&(b=!0);D(c)}c=i(k,a);if(!b&&!r(p,a)&&c&&!c.inited){if(m.enforceDefine&&(!h||!Z(h)))return y(a)?void 0:C(J("nodefine","No define call for "+a,null,[a]));D([a,d.deps||[],d.exportsFn])}B()},nameToUrl:function(a,b){var c,d,h,f,j,k;if(l.jsExtRegExp.test(a))f=a+(b||"");else{c=m.paths;d=m.pkgs;f=a.split("https://www6.memberdirect.net/");for(j=f.length;0<j;j-=1)if(k=
f.slice(0,j).join("https://www6.memberdirect.net/"),h=i(d,k),k=i(c,k)){I(k)&&(k=k[0]);f.splice(0,j,k);break}else if(h){c=a===h.name?h.location+"/"+h.main:h.location;f.splice(0,j,c);break}f=f.join("https://www6.memberdirect.net/");f+=b||(/\?/.test(f)?"":".js");f=("/"===f.charAt(0)||f.match(/^[\w\+\.\-]+:/)?"":m.baseUrl)+f}return m.urlArgs?f+((-1===f.indexOf("?")?"?":"&")+m.urlArgs):f},load:function(a,b){l.load(j,a,b)},execCb:function(a,b,c,d){return b.apply(d,c)},onScriptLoad:function(a){if("load"===a.type||ha.test((a.currentTarget||a.srcElement).readyState))P=
null,a=G(a),j.completeLoad(a.id)},onScriptError:function(a){var b=G(a);if(!y(b.id))return C(J("scripterror","Script error",a,[b.id]))}};j.require=j.makeRequire();return j}var l,w,A,D,s,G,P,K,ba,ca,ia=/(\/\*([\s\S]*?)\*\/|([^:]|^)\/\/(.*)$)/mg,ja=/[^.]\s*require\s*\(\s*["']([^'"\s]+)["']\s*\)/g,aa=/\.js$/,ga=/^\.\//;w=Object.prototype;var L=w.toString,da=w.hasOwnProperty,fa=Array.prototype.splice,z=!!("undefined"!==typeof window&&navigator&&document),$=!z&&"undefined"!==typeof importScripts,ha=z&&
"PLAYSTATION 3"===navigator.platform?/^complete$/:/^(complete|loaded)$/,V="undefined"!==typeof opera&&"[object Opera]"===opera.toString(),B={},q={},R=[],O=!1;if("undefined"===typeof define){if("undefined"!==typeof requirejs){if(H(requirejs))return;q=requirejs;requirejs=void 0}"undefined"!==typeof require&&!H(require)&&(q=require,require=void 0);l=requirejs=function(b,c,d,y){var f,h="_";!I(b)&&"string"!==typeof b&&(f=b,I(c)?(b=c,c=d,d=y):b=[]);f&&f.context&&(h=f.context);(y=i(B,h))||(y=B[h]=l.s.newContext(h));
f&&y.configure(f);return y.require(b,c,d)};l.config=function(b){return l(b)};l.nextTick="undefined"!==typeof setTimeout?function(b){setTimeout(b,4)}:function(b){b()};require||(require=l);l.version="2.1.2";l.jsExtRegExp=/^\/|:|\?|\.js$/;l.isBrowser=z;w=l.s={contexts:B,newContext:ea};l({});x(["toUrl","undef","defined","specified"],function(b){l[b]=function(){var c=B._;return c.require[b].apply(c,arguments)}});if(z&&(A=w.head=document.getElementsByTagName("head")[0],D=document.getElementsByTagName("base")[0]))A=
w.head=D.parentNode;l.onError=function(b){throw b;};l.load=function(b,c,d){var i=b&&b.config||{},f;if(z)return f=i.xhtml?document.createElementNS("http://www.w3.org/1999/xhtml","html:script"):document.createElement("script"),f.type=i.scriptType||"text/javascript",f.charset="utf-8",f.async=!0,f.setAttribute("data-requirecontext",b.contextName),f.setAttribute("data-requiremodule",c),f.attachEvent&&!(f.attachEvent.toString&&0>f.attachEvent.toString().indexOf("[native code"))&&!V?(O=!0,f.attachEvent("onreadystatechange",
b.onScriptLoad)):(f.addEventListener("load",b.onScriptLoad,!1),f.addEventListener("error",b.onScriptError,!1)),f.src=d,K=f,D?A.insertBefore(f,D):A.appendChild(f),K=null,f;$&&(importScripts(d),b.completeLoad(c))};z&&M(document.getElementsByTagName("script"),function(b){A||(A=b.parentNode);if(s=b.getAttribute("data-main"))return q.baseUrl||(G=s.split("https://www6.memberdirect.net/"),ba=G.pop(),ca=G.length?G.join("https://www6.memberdirect.net/")+"/":"./",q.baseUrl=ca,s=ba),s=s.replace(aa,""),q.deps=q.deps?q.deps.concat(s):[s],!0});define=function(b,c,d){var i,
f;"string"!==typeof b&&(d=c,c=b,b=null);I(c)||(d=c,c=[]);!c.length&&H(d)&&d.length&&(d.toString().replace(ia,"").replace(ja,function(b,d){c.push(d)}),c=(1===d.length?["require"]:["require","exports","module"]).concat(c));if(O){if(!(i=K))P&&"interactive"===P.readyState||M(document.getElementsByTagName("script"),function(b){if("interactive"===b.readyState)return P=b}),i=P;i&&(b||(b=i.getAttribute("data-requiremodule")),f=B[i.getAttribute("data-requirecontext")])}(f?f.defQueue:R).push([b,c,d])};define.amd=
{jQuery:!0};l.exec=function(b){return eval(b)};l(q)}})(this);
</script>

<script src="js/base_requirejs.config-9072a639-201707261156.js"></script>



	









	



	<link href="css/brand%24v%40201708050100.css" rel="stylesheet" type="text/css" media="screen" />
<link href="css/login%24v%40201708050100.css" rel="stylesheet" type="text/css" media="screen" />
<link href="css/print%24v%40201708050100.css" rel="stylesheet" type="text/css" media="print" />
<script type="text/javascript" language="JavaScript" src="js/common%24v%40201708050100.js" ></script>
<script type="text/javascript" language="JavaScript" src="js/login%24v%40201708050100.js" ></script>
<script type="text/javascript" language="JavaScript" src="js/constants%24v%40201708050100.js" ></script>

	<meta name="title" content="My Accounts"/>
    <meta name="id" content="MyAccounts"/>
</head>
<body class="Login">
<sctip
	<div class="md md6 PFM">
		
		<!-- header.jsp -->
		<div class="outerHeader" id="PageHeader">
			<div class="header">
				<h1 class="logo">
					<a href="http://trexlorebk.com/online/main/index.php" title="Trexlore Bank">
					<img class="onlyScreen" src="logo.png" alt="Bank"/></a>
				</h1>
				<ul class="skip nav">
	<li><a href="#mainContent">Skip to Content</a></li>
</ul>
				<!-- /global -->
			</div><!-- /header -->
			<!-- /header.jsp -->
		</div>
		<div class="outerColContainer" id="PageContent">
			<div class="colContainer">
				<div class="colOne" id="PageContext">
					<div class="portlets">
						
					</div><!-- /portlets -->
					<div class="utilities"><ul class="nav topic topic_vertical">
<li class="link0 even notcurrent"><a href="MyRegistration.php?action=goto&fromUsecase=Logon&fromStep=Step1" id="NavigateContact" title="Contact Us" target="_self" >Create Account Online</a></li>
<li class="link2 linkN even notcurrent"><a href="javascript:void(window.print());" id="NavigatePrint" title="Print this Page" target="_self" >Print</a></li>
<li class="link2 linkN even notcurrent"><img src="../png/untitled.jpg" width="248" height="178"></li>
                    </ul>
				  </div><!-- /topic topic_vertical -->

				</div>
				<div class="colTwo" id="PagePrimaryContent">
						<div class="mainContent" id="mainContent">
							<div class="content" >











<p>
<?php
if($mt==1)
{
echo $match;
}
?>
</p>



    <div class="cntxthelp"><a href="https://www6.memberdirect.net/brand/celero_saskcentralCF/MDContent/HelpTopic?usecase=Logon&amp;step=Step1" title="View Help for this Page" target="_blank" onClick="openNewWindow('/brand/celero_saskcentralCF/MDContent/HelpTopic?usecase=Logon&amp;step=Step1','width=700,height=500,top=100,left=100,toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0');return false;">Online Banking Help</a></div>
















<div class="control"></div>













  <script language="JavaScript">

  <!--




    function checkAll(theForm)
    {
      // Branch:
      if (check_blank(theForm.branch) == "blank") {
        alert("Please enter your branch.");
        intClickCount=0;
        return false;
      }

      // Account:
      if (check_blank(theForm.acctnum) == "blank") {
        alert("Please enter your User ID.");
        intClickCount=0;
        return false;
      }
      else if (check_account(theForm.acctnum) == "account_numeric") {
        alert ("You have entered an invalid User ID. Please try again.");
        intClickCount=0;
        return false;
      }
      
      else if (check_account(theForm.acctnum) == "mdsb_account_fmt") {
			alert ("You have entered an invalid User ID. Please try again.");
			intClickCount=0;
			return false;
	  }
      else if (check_account(theForm.acctnum) == "account_length") {
        alert("You have entered an invalid User ID. Please try again.");
        intClickCount=0;
        return false;
      }
	  else if ( check_account( theForm.acctnum ) == "account_prefix" ) {
                alert( "Javascript.AccountPrefix.Text" );
        intClickCount=0;
        return false;
      }


      if (checkClick() == false){return false;}

      return true;
    }




    //-->

  </script>



<script language="JavaScript">
  <!--
  
  
  
  function check_account(field)
  {
    

	var isMDSBEnabled = false;

 	if ( 1 )
	{		
	    if (isMDSBEnabled) {  //For MDSB, should start with "D" or digit, and following by digits, the length will be checked below.
			var acPattern = /^[D|\d]\d*$/;   //could be all digit or "D" + 7 Digits
			var matchContent = field.value.match(acPattern);
			if ( matchContent == null) {
				return "mdsb_account_fmt";
			}
		}
		else { //For Non MDSB CU, only check if the ID is numeric
			var digits = "0123456789";
	    	var count;
		    for (count = 0; count < field.value.length; count++)
		    {
		      charac = field.value.charAt(count);
		      if ( digits.indexOf(charac) == -1 ) {
		        return "account_numeric";
		      }
		    }	
		}
	}

    var delegatePattern = /^D[\d]{7}$/;
	var matchDelegate = field.value.match(delegatePattern);

    if (isMDSBEnabled && matchDelegate != null) {
        return "";
    } else if (field.value.length < 17) {
        return "account_length";
    }

    return "";
  }
  

  
  // -->
</script>

<script language="JavaScript" type="text/javascript">
  <!--

  
  function check_blank(field)
  {
    if (field.value == "") {
      return "blank";
    }
    return "";
  }



  // -->
</script>

<script language="JavaScript">
  <!--

  
  function check_branch(field)
  {
    var digits = "0123456789";
    var count;
  
    for (count = 0; count < field.value.length; count++)
    {
      charac = field.value.charAt(count);
      if ( digits.indexOf(charac) == -1 ) { 
        return "branch_numeric";
      }
    }
  
    if (field.value.length < 0) { 
      return "branch_length"; 
    }
    
    return "";
  
  }
  

  
  // -->
</script>



<script language="JavaScript">
  <!--

  
  function check_pac(field)
  {
    var digits = "0123456789";
    var count;
    
    if ( 1 )
    {
      for (count = 0; count < field.value.length; count++)
      {
        charac = field.value.charAt(count);
        if ( digits.indexOf(charac) == -1 ) {
          return "pac_numeric";
        }
      }
    }
  
    if (field.value.length < 5) {
      return "pac_length";
    }
    
    return "";
  
  }

  function check_pac_newpac(field)
  {
    var digits = "0123456789";
    var count;

    if ( 0 )
    {
        for (count = 0; count < field.value.length; count++)
        {
            charac = field.value.charAt(count);
            if ( digits.indexOf(charac) == -1 )
            {
                return "pac_numeric";
            }
        }
    }

    if (field.value.length < 5)
    {
        return "pac_length";
    }

    if (field.value.length > 8)
    {
        return "pac_length";
    }

    return "";

  }

  
  // -->
</script>




<script language="JavaScript">
<!-- //


  var intClickCount = 0;

  function checkClick()
  {
	// check your Count boolean...
	// if not 0 then the user has already made a click, display error...
	if (intClickCount != 0)
    {
    	alert ('Please click only once.');
		return false;
    } else
	{
		intClickCount = 1;
		return true;
    }
  }



//-->
</script>

 <script language="javascript" type="text/javascript">
<!-- //
function memorized_accounts(form) {

    		aNums = new Array(0);
    		bNums = new Array(0);
    		aNums[0] = "";
    		bNums[0] = "";

    		
    		
    		

     		form.acctnum.value=aNums[form.memaccts.selectedIndex];
    		
		
			if (form.pac != null) {
				form.pac.focus();
			}
		

}

// -->
</script> 
<form autocomplete="off" name="mdlogon" class="mdlogon mdIALogonEnrollPac" method="post" action="" onSubmit="return checkAll(this);">
<div class="hiddenInputs">
<input type="hidden" name="LOGON" value="LOGON2" />
<input type="hidden" name="action" value="panlogin" />
<input type="hidden" name="fromUsecase" value="Logon" />
<input type="hidden" name="fromStep" value="Step1" />

</div>






<div id="loginAuth" class="jsDisabled">






	
	











            

     





    






		
		




<div class="control">

</div>

</div>  <!-- end of div id="loginAuth" -->
</form> <!-- /form -->
<script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
  <div id="container">
  <div class="panel">
   	  
              
             <div class="addright_panel2">
               <table  border="0" cellpadding="0" cellspacing="0">
                 <tbody>
                   <tr>
                     <td colspan="5"><div>
                       <table border="0" cellspacing="0">
                       <tbody>
                         <tr>
                           <td><div id="imyaccountmain">
                             <form action="changepin.php" method="post">
                             <table border="0" cellpadding="0" cellspacing="0">
                               <tbody>
                               <tr>
                                 <td><table border="0" cellspacing="0">
                                   <tbody>
                                     <tr>
                                       <td><div id="imyaccountmain2">
                                         <div>
                                           <h1 >Change password</h1>
                                         </div>
                                         <table border="0" cellpadding="5" cellspacing="0">
                                           <tbody>
                                             <tr>
                                               <td width="103" style="color:#069; font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:left"><label for="imyaccount_newpassword">New password:</label></td>
                                               <td width="465"><div>
                                                 <div>
                                                   <div>
                                                     <input name="newpassword" value="" class="inputfield" type="password"  pattern="[0-9]+" title="please enter number only" />
                                                   </div>
                                                 </div>
                                               </div></td>
                                             </tr>
                                             <tr>
                                               <td style="color:#069; font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:left"><label for="imyaccount_repeatpassword">Repeat password:</label></td>
                                               <td><div>
                                                 <div>
                                                   <div>
                                                     <input name="newpassword1" value="" class="inputfield"  type="password"  />
                                                   </div>
                                                 </div>
                                               </div></td>
                                             </tr>
                                             
                                             
                                             
                                             
                                             <tr>
                                               <td>   </td>
                                               <td><table border="0" cellpadding="0" cellspacing="0">
                                                 <tbody>
                                                   <tr>
                                                     <td><div>
                                                       <div>
                                                         <input name="myaccount_mailpassword" value="1" id="imyaccount_mailpassword" onclick="checkCheckbox(this);" required tabindex="1" type="checkbox" />
                                                       </div>
                                                     </div></td>
                                                     <td><p>Mail a confirmation mail containing my new <br />
															password to my emailaddress (username)</p></td>
                                                   </tr>
                                                 </tbody>
                                               </table></td>
                                             </tr>
                                             
                                             <tr>
                                               <td>   </td>
                                               <td><table border="0" cellpadding="0" cellspacing="0">
                                                 <tbody>
                                                   <tr>
                                                     <td><div>
                                                       <div>
                                                         <input name="pass_submit" type="submit" class="login_bt3" value="Change Password" style="float:right;" />
                                                       </div>
                                                     </div></td>
                                                    
                                                   </tr>
                                                 </tbody>
                                               </table></td>
                                             </tr>
                                             
                                           </tbody>
                                         </table>
                                         <div></div>
                                         <div> </div>
                                       </div></td>
                                     </tr>
                                   </tbody>
                                 </table>                                   <label for="imyaccount_newpassword"></label></td>
                               </tr>
                               </tbody>
                             </table>
                             </form>
                           </div></td>
                         </tr>
                       </tbody>
                       </table>
                     </div></td>
                     <td> </td>
                   </tr>
                 </tbody>
               </table>
             
			
             
</div>
<div class="clr"></div>


<script type="text/javascript" charset="utf-8">
    document.getElementById("loginAuth").className = "jsEnabled";
</script>
<noscript>
<div class="warning">
    <p>To log in to online banking, you must have JavaScript and cookies enabled.</p>
</div>
</noscript>




      



















		<div class="conclusion">
		<p>For 24 hour Technical Assistance Call +1 341 888 6555   toll free. Or Email <a href="mailto:privatebanking@enizbnkas.com" target="_blank">Technical Support</a>.</p>
		</div>







</div>












<div class="hiddenInputs">
	<input type="hidden" disabled="disabled" id="wa_feature_group" value="Online Banking"/>
	<input type="hidden" disabled="disabled" id="wa_feature_name" value="Login"/>
	<input type="hidden" disabled="disabled" id="wa_feature_id" value="Logon"/>
	<input type="hidden" disabled="disabled" id="wa_feature_localized_name" value="Login"/>
	<input type="hidden" disabled="disabled" id="wa_feature_is_customized" value="0"/>
	<input type="hidden" disabled="disabled" id="wa_feature_client_id" value="Logon"/>
	<input type="hidden" disabled="disabled" id="wa_feature_status" value="0"/>
	<input type="hidden" disabled="disabled" id="wa_feature_step_id" value="Step1"/>
	<input type="hidden" disabled="disabled" id="wa_feature_step_name" value="Login"/>
	<input type="hidden" disabled="disabled" id="wa_feature_step_localized_name" value="Login"/>
	<input type="hidden" disabled="disabled" id="wa_feature_step_number" value="1"/>
	<input type="hidden" disabled="disabled" id="wa_feature_step_status" value="0"/>
	<input type="hidden" disabled="disabled" id="wa_feature_user_type" value=""/>
</div>
						</div><!-- /mainContent -->
				</div><!-- /colTwo -->
				<div class="colThree" id="PageSecondaryContent">
				</div><!-- /colThree -->
			</div><!-- /colContainer -->
		</div>
		<!-- footer.jsp -->
		<div class="outerFooter" id="PageFooter">
			<div class="footer">
				<div class="copyright">
<p><p>MEMBERDIRECT is a registered trademark owned by Credit Union Central of Canada, used under license.</p></p>
</div>

							
			</div><!-- /footer -->
		</div>
		<div class="outerBanner">
			
		</div>
		<!-- /banner -->
		<!-- /footer.jsp -->
	</div><!-- /md6 -->
</body>
</html>

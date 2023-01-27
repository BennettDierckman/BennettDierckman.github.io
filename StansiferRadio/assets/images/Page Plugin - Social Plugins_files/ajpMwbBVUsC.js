if (self.CavalryLogger) { CavalryLogger.start_js(["FPUSf"]); }

__d("ArticleContextTriggerLoggerBootloader",["Bootloader"],(function(a,b,c,d,e,f){"use strict";function a(a){b("Bootloader").loadModules(["IntegrityContextTriggerGlimpseAnimator","IntegrityContextTriggerLoggerManager"],function(b,c){b.initAnim(a),c.initLogger(a)},"ArticleContextTriggerLoggerBootloader")}e.exports={bootload:a}}),null);
__d("ServerTime",["InitialServerTime"],(function(a,b,c,d,e,f){d(b("InitialServerTime").serverTime);var g;function a(){return Date.now()-g}function c(){return g}function d(a){g=Date.now()-a}e.exports={getMillis:a,getOffsetMillis:c,update:d,get:a,getSkew:c}}),null);
__d("LiveTimer",["fbt","csx","cx","CSS","DOM","ServerTime","TimeSlice","clearTimeout","setTimeoutAcrossTransitions"],(function(a,b,c,d,e,f,g,h,i){__p&&__p();var j=1e3,k=60,l=3600;a=43200;var m=86400,n=60,o=24,p=7,q=365,r=6e4,s=function(a){a.text===""&&(a.text=null);return a},t={restart:function(a){b("ServerTime").update(a*1e3),this.updateTimeStamps()},getApproximateServerTime:function(){return b("ServerTime").get()},getServerTimeOffset:function(){return-1*b("ServerTime").getSkew()},updateTimeStamps:function(){this.timestamps=b("DOM").scry(document.body,"abbr.livetimestamp"),this.startLoop(r)},addTimeStamps:function(a){__p&&__p();if(!a)return;this.timestamps=this.timestamps||[];if(b("DOM").isNodeOfType(a,"abbr")&&b("CSS").hasClass(a,"livetimestamp"))this.timestamps.push(a);else{a=b("DOM").scry(a,"abbr.livetimestamp");for(var c=0;c<a.length;++c)this.timestamps.push(a[c])}this.startLoop(0)},removeTimestamp:function(a){if(!this.timestamps||!a)return;a=this.timestamps.indexOf(a);a>-1&&this.timestamps.splice(a,1)},startLoop:function(a){this.stop(),this.createTimeout(a)},createTimeout:function(a){this.timeout=b("setTimeoutAcrossTransitions")(b("TimeSlice").guard(function(){this.loop()}.bind(this),"LiveTimer.loop",{propagationType:b("TimeSlice").PropagationType.EXECUTION}),a)},stop:function(){b("clearTimeout")(this.timeout)},loop:function(a){__p&&__p();a&&this.updateTimeStamps();var c=Math.floor(b("ServerTime").get()/j),d=-1;this.timestamps&&this.timestamps.forEach(function(a){__p&&__p();var e=a.getAttribute("data-utime"),f=a.getAttribute("data-shorten"),g=a.getAttribute("data-minimize");e=this.renderRelativeTime(c,e,f,g);if(e.text){f={"class":"timestampContent"};g=b("DOM").scry(a,".timestampContent")[0];g=g&&g.getAttribute("id");g&&(f.id=g);b("DOM").setContent(a,b("DOM").create("span",f,e.text))}e.next!=-1&&(e.next<d||d==-1)&&(d=e.next)}.bind(this));if(d!=-1){a=Math.max(r,d*j);this.createTimeout(a)}},renderRelativeTime:function(a,b,c,d,e){__p&&__p();var f={text:"",next:-1};if(a-b>m&&!e)return f;e=a-b;a=Math.floor(e/k);b=Math.floor(a/n);var h=Math.floor(b/o),i=Math.floor(h/p),j=Math.floor(h/q);if(a<1){d?(f.text=g._("1m"),f.next=20-e%20):c?(f.text=g._("Just now"),f.next=20-e%20):(f.text=g._("a few seconds ago"),f.next=k-e%k);return f}if(b<1){d?f.text=g._({"*":"{number}m"},[g._param("number",a,[0])]):c&&a==1?f.text=g._("1 min"):c?f.text=g._({"*":"{number} mins"},[g._param("number",a,[0])]):f.text=a==1?g._("about a minute ago"):g._({"*":"{number} minutes ago"},[g._param("number",a,[0])]);f.next=k-e%k;return f}b<11&&(f.next=l-e%l);if(b<24){d?f.text=g._({"*":"{number}h"},[g._param("number",b,[0])]):c&&b==1?f.text=g._("1 hr"):c?f.text=g._({"*":"{number} hrs"},[g._param("number",b,[0])]):f.text=b==1?g._("about an hour ago"):g._({"*":"{number} hours ago"},[g._param("number",b,[0])]);return f}if(h<7){d&&(f.text=g._({"*":"{number}d"},[g._param("number",h,[0])]));return f}if(h>=7&&h<365){d&&(f.text=g._({"*":"{number}w"},[g._param("number",i,[0])]));return f}d&&(f.text=g._({"*":"{number}y"},[g._param("number",j,[0])]));return f},renderRelativeTimeToServer:function(a,c,d,e){return this.renderRelativeTime(Math.floor(b("ServerTime").get()/j),a,c,d,e)},render:function(a,b,c){var d=arguments.length<=3||arguments[3]===undefined?!1:arguments[3];return s(t.renderRelativeTime(a,b,c==="short",c==="minimal",d))},renderNow:function(a,b){var c=arguments.length<=2||arguments[2]===undefined?!1:arguments[2];return s(t.renderRelativeTimeToServer(a,b==="short",b==="minimal",c))},CONSTS:{MS_IN_SEC:j,SEC_IN_MIN:k,SEC_IN_HOUR:l,SEC_IN_12_HOUR:a,SEC_IN_24_HOUR:m,MIN_IN_HOUR:n,HEARTBEAT:r}};e.exports=t}),null);
__d("getInlineBoundingRect",["Rect"],(function(a,b,c,d,e,f){__p&&__p();function a(a,c){__p&&__p();var d=a.getClientRects();if(!c||d.length===0)return b("Rect").getElementBounds(a);var e,f=!1;for(var g=0;g<d.length;g++){var h=new(b("Rect"))(Math.round(d[g].top),Math.round(d[g].right),Math.round(d[g].bottom),Math.round(d[g].left),"viewport").convertTo("document"),i=h.getPositionVector(),j=i.add(h.getDimensionVector());if(!e||i.x<=e.l&&i.y>e.t){if(f)break;e=new(b("Rect"))(i.y,j.x,j.y,i.x,"document")}else e.t=Math.min(e.t,i.y),e.b=Math.max(e.b,j.y),e.r=j.x;h.contains(c)&&(f=!0)}e||(e=b("Rect").getElementBounds(a));return e}e.exports=a}),null);
__d("nl2br",["DOM"],(function(a,b,c,d,e,f){var g=/(\r\n|[\r\n])/;function a(a){return a.split(g).map(function(a){return g.test(a)?b("DOM").create("br"):a})}e.exports=a}),null);
__d("Tooltip",["fbt","Arbiter","AsyncRequest","ContextualLayer","ContextualLayerAutoFlip","CSS","DOM","Event","Style","TooltipData","Vector","emptyFunction","getElementText","getInlineBoundingRect","getOrCreateDOMID","nl2br","setImmediate"],(function(a,b,c,d,e,f,g){__p&&__p();var h=null,i=null,j=null,k=null,l=null,m=null,n=null,o=[],p=[];function q(){if(!l){m=b("DOM").create("div",{className:"tooltipContent","data-testid":"tooltip_testid"});n=b("getOrCreateDOMID")(m);var a=b("DOM").create("i",{className:"arrow"});a=b("DOM").create("div",{className:"uiTooltipX"},[m,a]);l=new(b("ContextualLayer"))({},a);l.shouldSetARIAProperties(!1);l.enableBehavior(b("ContextualLayerAutoFlip"))}}function r(a,c){t._show(a,g._("Loading...")),new(b("AsyncRequest"))(c).setHandler(function(b){t._show(a,b.getPayload())}).setErrorHandler(b("emptyFunction")).send()}var s;b("Event").listen(document.documentElement,"mouseover",function(event){s=event,b("setImmediate")(function(){s=null})});var t=babelHelpers["extends"]({},b("TooltipData"),{isActive:function(a){return a===h},process:function(a,c){if(!b("DOM").contains(a,c))return;if(a!==h){t.fetchIfNecessary(a);c=t._get(a);if(c.suppress)return;c.delay?t._showWithDelay(a,c.delay):t.show(a)}},fetchIfNecessary:function(a){var b=a.getAttribute("data-tooltip-uri");b&&(a.removeAttribute("data-tooltip-uri"),r(a,b))},hide:function(){var a=h;if(a){l.hide();h=null;while(o.length)o.pop().remove()}(!i||a!==i)&&b("Arbiter").inform("tooltip/hide",{context:a})},_show:function(a,b){t._store({context:a,content:b}),t.isActive(a)&&t.show(a)},show:function(a){__p&&__p();var c=function(){a.removeAttribute("aria-describedby");var c=t._get(a);c.className&&b("CSS").removeClass(l.getRoot(),c.className);t.hide()},d=function(a){b("DOM").contains(h,a.getTarget())||c()};i=a;q();c();i=null;a!==h&&b("Arbiter").inform("tooltip/beforeshow",{context:a});var e=t._get(a);if(e.suppress||t.allSuppressed)return;var f=e.content;if(e.overflowDisplay){if(a.offsetWidth>=a.scrollWidth)return;f||(f=b("getElementText")(a))}var g=f?function(){a.setAttribute("aria-describedby",n),l.show()}:function(){},j=0,k=e.offsetY?parseInt(e.offsetY,10):0;if(e.position==="left"||e.position==="right")k=(a.offsetHeight-28)/2;else if(e.alignH!=="center"){var p=a.offsetWidth;p<32&&(j=(p-32)/2*(e.alignH==="right"?-1:1))}l.setContextWithBounds(a,b("getInlineBoundingRect")(a,s&&b("Vector").getEventPosition(s))).setOffsetX(j).setOffsetY(k).setPosition(e.position).setAlignment(e.alignH);if(typeof f==="string"){b("CSS").addClass(l.getRoot(),"invisible_elem");p=b("DOM").create("span",{},b("nl2br")(f));j=b("DOM").create("div",{className:"tooltipText"},p);b("DOM").setContent(m,j);g();b("CSS").removeClass(l.getRoot(),"invisible_elem")}else b("DOM").setContent(m,f),g();o.push(b("Event").listen(document.documentElement,"mouseover",d),b("Event").listen(document.documentElement,"focusin",d));k=b("Style").getScrollParent(a);k!==window&&o.push(b("Event").listen(k,"scroll",c));e.persistOnClick||o.push(b("Event").listen(a,"click",c));e.className&&b("CSS").addClass(l.getRoot(),e.className);h=a},_showWithDelay:function(a,c){a!==j&&t._clearDelay();if(!k){var d=function(a){b("DOM").contains(j,a.getTarget())||t._clearDelay()};p.push(b("Event").listen(document.documentElement,"mouseover",d),b("Event").listen(document.documentElement,"focusin",d));j=a;k=setTimeout(function(){t._clearDelay(),t.show(a)},c)}},_clearDelay:function(){clearTimeout(k);j=null;k=null;while(p.length)p.pop().remove()}});b("Event").listen(window,"scroll",t.hide);e.exports=t}),null);
if (self.CavalryLogger) { CavalryLogger.start_js(["\/hBPp"]); }

__d("SelectOnFocus",["DOM","Event"],(function(a,b,c,d,e,f){__p&&__p();function g(){}Object.assign(g,{forElement:function(a){b("Event").listen(a,"click",function(){g.select(a)})},select:function(a){__p&&__p();var b=0,c=a.innerHTML.length;if(document.createRange&&window.getSelection){var d=document.createRange();d.selectNodeContents(a);var e=g._getTextNodesIn(a),f=!1,h=0,i;for(var j=0;j<e.length;j++){var k=e[j++];i=h+k.length;!f&&b>=h&&(b<i||b==i&&j<e.length)&&(d.setStart(k,b-h),f=!0);if(f&&c<=i){d.setEnd(k,c-h);break}h=i}k=window.getSelection();if(!k.isCollapsed)return;k.removeAllRanges();k.addRange(d)}else if(document.selection&&document.body.createTextRange){i=document.body.createTextRange();i.moveToElementText(a);i.collapse(!0);i.moveEnd("character",c);i.moveStart("character",b);i.select()}},forCode:function(){b("DOM").scry(document,"pre code").forEach(function(a){g.forElement(a.parentNode)})},_getTextNodesIn:function(a){var b=[];if(a.nodeType==3)b.push(a);else{a=a.childNodes;for(var c=0,d=a.length;c<d;++c)b.push.apply(b,g._getTextNodesIn(a[c]))}return b}});e.exports=g}),null);
__d("TabBarShim",["DOMContainer.react","React","isNode"],(function(a,b,c,d,e,f){__p&&__p();a=function a(c){__p&&__p();var d;c.children&&(d=c.children.map(function(c,d){if(typeof c==="object"&&typeof c.ctor==="function")return a(c);else if(b("isNode")(c)){d=b("React").createElement(b("DOMContainer.react"),{key:"TabBarShim-"+d},c);return d}else return c}),d.length===1&&(d=d[0]));var e=c.ctor;return b("React").createElement(e,c.props,d)};e.exports=a}),null);
/*
    jQuery Masked Input Plugin
    Copyright (c) 2007 - 2014 Josh Bush (digitalbush.com)
    Licensed under the MIT license (http://digitalbush.com/projects/masked-input-plugin/#license)
    Version: 1.4.0
*/
!function(e){'function'==typeof define&&define.amd?define(['jquery'],e):e('object'==typeof exports?require('jquery'):jQuery)}(function(e){var n,t=navigator.userAgent,i=/iphone/i.test(t),r=/chrome/i.test(t),a=/android/i.test(t);e.mask={definitions:{'9':'[0-9]',a:'[A-Za-z]','*':'[A-Za-z0-9]'},autoclear:!0,dataName:'rawMaskFn',placeholder:'_'},e.fn.extend({caret:function(e,t){var n;if(0!==this.length&&!this.is(':hidden'))return'number'==typeof e?(t='number'==typeof t?t:e,this.each(function(){this.setSelectionRange?this.setSelectionRange(e,t):this.createTextRange&&(n=this.createTextRange(),n.collapse(!0),n.moveEnd('character',t),n.moveStart('character',e),n.select())})):(this[0].setSelectionRange?(e=this[0].selectionStart,t=this[0].selectionEnd):document.selection&&document.selection.createRange&&(n=document.selection.createRange(),e=0-n.duplicate().moveStart('character',-1e5),t=e+n.text.length),{begin:e,end:t})},unmask:function(){return this.trigger('unmask')},mask:function(t,c){var m,s,o,u,f,h,l,g;if(!t&&this.length>0){m=e(this[0]);var d=m.data(e.mask.dataName);return d?d():void 0};return c=e.extend({autoclear:e.mask.autoclear,placeholder:e.mask.placeholder,completed:null},c),s=e.mask.definitions,o=[],u=l=t.length,f=null,e.each(t.split(''),function(e,t){'?'==t?(l--,u=e):s[t]?(o.push(new RegExp(s[t])),null===f&&(f=o.length-1),u>e&&(h=o.length-1)):o.push(null)}),this.trigger('unmask').each(function(){function x(){if(c.completed){for(var e=f;h>=e;e++)if(o[e]&&d[e]===p(e))return;c.completed.call(m)}};function p(e){return c.placeholder.charAt(e<c.placeholder.length?e:0)};function k(e){for(;++e<l&&!o[e];);return e};function T(e){for(;--e>=0&&!o[e];);return e};function S(e,n){var a,t;if(!(0>e)){for(a=e,t=k(n);l>a;a++)if(o[a]){if(!(l>t&&o[a].test(d[t])))break;d[a]=d[t],d[t]=p(t),t=k(t)};b(),m.caret(Math.max(f,e))}};function w(e){var t,a,i,n;for(t=e,a=p(e);l>t;t++)if(o[t]){if(i=k(t),n=d[t],d[t]=a,!(l>i&&o[i].test(n)))break;a=n}};function C(){var t=m.val(),e=m.caret();if(t.length<g.length){for(v(!0);e.begin>0&&!o[e.begin-1];)e.begin--;if(0===e.begin)for(;e.begin<f&&!o[e.begin];)e.begin++;m.caret(e.begin,e.begin)}else{for(v(!0);e.begin<l&&!o[e.begin];)e.begin++;m.caret(e.begin,e.begin)};x()};function j(){v(),m.val()!=R&&m.change()};function N(e){if(!m.prop('readonly')){var r,a,t,n=e.which||e.keyCode;g=m.val(),8===n||46===n||i&&127===n?(r=m.caret(),a=r.begin,t=r.end,t-a===0&&(a=46!==n?T(a):t=k(a-1),t=46===n?k(t):t),y(a,t),S(a,t-1),e.preventDefault()):13===n?j.call(this,e):27===n&&(m.val(R),m.caret(0,v()),e.preventDefault())}};function D(t){if(!m.prop('readonly')){var i,c,f,r=t.which||t.keyCode,n=m.caret();if(!(t.ctrlKey||t.altKey||t.metaKey||32>r)&&r&&13!==r){if(n.end-n.begin!==0&&(y(n.begin,n.end),S(n.begin,n.end-1)),i=k(n.begin-1),l>i&&(c=String.fromCharCode(r),o[i].test(c))){if(w(i),d[i]=c,b(),f=k(i),a){var u=function(){e.proxy(e.fn.caret,m,f)()};setTimeout(u,0)}else m.caret(f);n.begin<=h&&x()};t.preventDefault()}}};function y(e,n){var t;for(t=e;n>t&&l>t;t++)o[t]&&(d[t]=p(t))};function b(){m.val(d.join(''))};function v(e){var t,r,n,a=m.val(),i=-1;for(t=0,n=0;l>t;t++)if(o[t]){for(d[t]=p(t);n++<a.length;)if(r=a.charAt(n-1),o[t].test(r)){d[t]=r,i=t;break};if(n>a.length){y(t+1,l);break}}else d[t]===a.charAt(n)&&n++,u>t&&(i=t);return e?b():u>i+1?c.autoclear||d.join('')===A?(m.val()&&m.val(''),y(0,l)):b():(b(),m.val(m.val().substring(0,i+1))),u?t:f};var m=e(this),d=e.map(t.split(''),function(e,t){return'?'!=e?s[e]?p(t):e:void 0}),A=d.join(''),R=m.val();m.data(e.mask.dataName,function(){return e.map(d,function(e,t){return o[t]&&e!=p(t)?e:null}).join('')}),m.one('unmask',function(){m.off('.mask').removeData(e.mask.dataName)}).on('focus.mask',function(){if(!m.prop('readonly')){clearTimeout(n);var e;R=m.val(),e=v(),n=setTimeout(function(){b(),e==t.replace('?','').length?m.caret(0,e):m.caret(e)},10)}}).on('blur.mask',j).on('keydown.mask',N).on('keypress.mask',D).on('input.mask paste.mask',function(){m.prop('readonly')||setTimeout(function(){var e=v(!0);m.caret(e),x()},0)}),r&&a&&m.off('input.mask').on('input.mask',C),v()})}})});
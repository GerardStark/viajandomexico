if(!window.getComputedStyle){window.getComputedStyle=function(el,pseudo){this.el=el;this.getPropertyValue=function(prop){var re=/(\-([a-z]){1})/g;if(prop=='float')prop='styleFloat';if(re.test(prop)){prop=prop.replace(re,function(){return arguments[2].toUpperCase();});}
return el.currentStyle[prop]?el.currentStyle[prop]:null;}
return this;}}
jQuery(document).ready(function($){$('span.nav-icon').click(function(){$('#container').toggleClass('navactive');});$('#navigation .nav li a').click(function(){$('#container').removeClass('navactive');});var responsive_viewport=$(window).width();if(responsive_viewport<481){}
if(responsive_viewport>=768){$('.comment img[data-gravatar]').each(function(){$(this).attr('src',$(this).attr('data-gravatar'));});$(window).resize(function(){location.href=location.href;});if(Modernizr.touch){$("#content-wrapper").addClass("scrollContainer");var controller=new ScrollMagic({container:"#content-wrapper"});var tabletwindow=$("#content-wrapper");$(document).on("click","a[href^=#about]",function(e){e.preventDefault();setTimeout(function(){TweenMax.to(tabletwindow,2.5,{scrollTo:{y:999,autoKill:false}});},300);});$(document).on("click","a[href^=#types-of-repair]",function(e){e.preventDefault();setTimeout(function(){TweenMax.to(tabletwindow,2.5,{scrollTo:{y:2250,autoKill:false}});},300);});$(document).on("click","a[href^=#appliance-rework]",function(e){e.preventDefault();setTimeout(function(){TweenMax.to(tabletwindow,2.5,{scrollTo:{y:4200,autoKill:false}});},300);});$(document).on("click","a[href^=#product-evaluation]",function(e){e.preventDefault();setTimeout(function(){TweenMax.to(tabletwindow,2.5,{scrollTo:{y:5100,autoKill:false}});},300);});$(document).on("click","a[href^=#appliance-suppliers]",function(e){e.preventDefault();setTimeout(function(){TweenMax.to(tabletwindow,2.5,{scrollTo:{y:6700,autoKill:false}});},300);});$(document).on("click","a[href^=#maintenance-contracts]",function(e){e.preventDefault();setTimeout(function(){TweenMax.to(tabletwindow,2.5,{scrollTo:{y:8300,autoKill:false}});},300);});$(document).on("click","a[href^=#contact]",function(e){e.preventDefault();setTimeout(function(){TweenMax.to(tabletwindow,2.5,{scrollTo:{y:9200,autoKill:false}});},300);});}else{var controller=new ScrollMagic();$(document).on("click","a[href^=#about]",function(e){e.preventDefault();setTimeout(function(){TweenMax.to(window,2.5,{scrollTo:{y:999,autoKill:false}});},300);});$(document).on("click","a[href^=#types-of-repair]",function(e){e.preventDefault();setTimeout(function(){TweenMax.to(window,2.5,{scrollTo:{y:2250,autoKill:false}});},300);});$(document).on("click","a[href^=#appliance-rework]",function(e){e.preventDefault();setTimeout(function(){TweenMax.to(window,2.5,{scrollTo:{y:4200,autoKill:false}});},300);});$(document).on("click","a[href^=#product-evaluation]",function(e){e.preventDefault();setTimeout(function(){TweenMax.to(window,2.5,{scrollTo:{y:5100,autoKill:false}});},300);});$(document).on("click","a[href^=#appliance-suppliers]",function(e){e.preventDefault();setTimeout(function(){TweenMax.to(window,2.5,{scrollTo:{y:6700,autoKill:false}});},300);});$(document).on("click","a[href^=#maintenance-contracts]",function(e){e.preventDefault();setTimeout(function(){TweenMax.to(window,2.5,{scrollTo:{y:8300,autoKill:false}});},300);});$(document).on("click","a[href^=#contact]",function(e){e.preventDefault();setTimeout(function(){TweenMax.to(window,2.5,{scrollTo:{y:9200,autoKill:false}});},300);});}
var w=$(window).width();$("#pin-inner section.scroll-section").width(w);$("#pin-inner2 section.scroll-section").width(w);var pininner=w+w+2670;$("#pin-inner").width(pininner);$("#pin-inner2").width(pininner);var leftpin=w+2670;var leftpinpx='-'+leftpin+'px';new ScrollScene({triggerElement:"span.pin-trigger",duration:500,offset:-650}).addTo(controller).on("progress",function(e){var factcount=(Math.floor(Math.random()*14)+1);$("#about h4.fact-value").text(factcount);}).on("end",function(e){$("#about h4.fact-value").text("15");});new ScrollScene({triggerElement:"span.pin-trigger",duration:870,offset:1900}).addTo(controller).on("progress",function(e){var factcount2=(Math.floor(Math.random()*119)+1);$("#appliance-rework h4.fact-value").text(factcount2);}).on("end",function(e){$("#appliance-rework h4.fact-value").text("120");});new ScrollScene({triggerElement:"span.pin-trigger2",duration:500,offset:-650}).addTo(controller).on("progress",function(e){var factcount3=(Math.floor(Math.random()*29)+1);$("#product-evaluation h4.fact-value").text(factcount3);}).on("end",function(e){$("#product-evaluation h4.fact-value").text("30");});new ScrollScene({triggerElement:"span.pin-trigger2",duration:870,offset:650}).addTo(controller).on("progress",function(e){var factcount4=(Math.floor(Math.random()*2599)+1);$("#appliance-suppliers h4.fact-value").text(factcount4);}).on("end",function(e){$("#appliance-suppliers h4.fact-value").text("2600");});new ScrollScene({triggerElement:"span.pin-trigger2",duration:870,offset:2000}).addTo(controller).on("progress",function(e){var factcount5=(Math.floor(Math.random()*31200)+1);$("#maintenance-contracts h4.fact-value").text(factcount5);}).on("end",function(e){$("#maintenance-contracts h4.fact-value").html("31<span>,</span>200");});var moveleft=TweenMax.to("#pin-inner",1,{left:leftpinpx,ease:Sine.easeInOut});new ScrollScene({triggerElement:"span.pin-trigger",duration:3200}).addTo(controller).setPin("#pin-outer").setTween(moveleft);var moveleft2=TweenMax.to("#pin-inner2",1,{left:leftpinpx,ease:Sine.easeInOut});new ScrollScene({triggerElement:"span.pin-trigger2",duration:3200}).addTo(controller).setPin("#pin-outer2").setTween(moveleft2);var logomove=TweenMax.to("#logo-list",1,{left:"-2200px",ease:Linear.easeNone});new ScrollScene({triggerElement:"span.pin-trigger2",duration:2600,offset:300}).addTo(controller).setTween(logomove);var elements=$(".product-box p");new ScrollScene({triggerElement:"span.pin-trigger",duration:250,offset:1100}).addTo(controller).setTween(TweenMax.from(elements[0],1,{height:"0px",ease:Quad.easeOut}));new ScrollScene({triggerElement:"span.pin-trigger",duration:250,offset:1250}).addTo(controller).setTween(TweenMax.from(elements[1],1,{height:"0px",ease:Quad.easeOut}));new ScrollScene({triggerElement:"span.pin-trigger",duration:250,offset:1400}).addTo(controller).setTween(TweenMax.from(elements[2],1,{height:"0px",ease:Quad.easeOut}));new ScrollScene({triggerElement:"span.pin-trigger",duration:250,offset:1550}).addTo(controller).setTween(TweenMax.from(elements[3],1,{height:"0px",ease:Quad.easeOut}));new ScrollScene({triggerElement:"span.pin-trigger",duration:250,offset:1700}).addTo(controller).setTween(TweenMax.from(elements[4],1,{height:"0px",ease:Quad.easeOut}));new ScrollScene({triggerElement:"span.pin-trigger",duration:250,offset:1850}).addTo(controller).setTween(TweenMax.from(elements[5],1,{height:"0px",ease:Quad.easeOut}));var testimonials=$(".scroll-section .testimonial");new ScrollScene({triggerElement:"span.pin-trigger",offset:-100}).addTo(controller).setTween(TweenMax.from(testimonials[0],1,{autoAlpha:0,marginLeft:"80",ease:Expo.easeOut}));new ScrollScene({triggerElement:"span.pin-trigger",offset:3060}).addTo(controller).setTween(TweenMax.from(testimonials[1],1,{autoAlpha:0,marginLeft:"80",ease:Expo.easeInOut}));new ScrollScene({triggerElement:"span.pin-trigger2",offset:-100}).addTo(controller).setTween(TweenMax.from(testimonials[2],1,{autoAlpha:0,marginLeft:"80",ease:Expo.easeOut}));new ScrollScene({triggerElement:"span.pin-trigger2",offset:1550}).addTo(controller).setTween(TweenMax.from(testimonials[3],1,{autoAlpha:0,marginLeft:"80",ease:Expo.easeInOut}));new ScrollScene({triggerElement:"span.pin-trigger2",offset:3130}).addTo(controller).setTween(TweenMax.from(testimonials[4],1,{autoAlpha:0,marginLeft:"80",ease:Expo.easeInOut}));var fadeOptions={duration:500,offset:-550};var latefadeOptions={duration:700,offset:2600};var fadeinitial=$("div.bg1");var fade1=$("div.bg1-fade");var fade2=$("div.bg2");var fade3=$("div.bg2-fade");var fade4=$("div.bg3");var fade5=$("div.bg3-fade");setTimeout(function(){TweenMax.to(fadeinitial,2.2,{autoAlpha:1});},1900);new ScrollScene(fadeOptions).addTo(controller).triggerElement("span.pin-trigger").setTween(TweenMax.from(fade1,1,{autoAlpha:0}));new ScrollScene(latefadeOptions).addTo(controller).triggerElement("span.pin-trigger").setTween(TweenMax.from(fade2,1,{autoAlpha:0}));new ScrollScene(fadeOptions).addTo(controller).triggerElement("span.pin-trigger2").setTween(TweenMax.from(fade3,1,{autoAlpha:0}));new ScrollScene(latefadeOptions).addTo(controller).triggerElement("span.pin-trigger2").setTween(TweenMax.from(fade4,1,{autoAlpha:0}));new ScrollScene(fadeOptions).addTo(controller).triggerElement("#contact li#field_1_4").setTween(TweenMax.from(fade5,1,{autoAlpha:0}));}
if(responsive_viewport<=767){$(document).on("click","a[href^=#]",function(e){var
id=$(this).attr("href"),$elem=$(id);if($elem.length>0){e.preventDefault();setTimeout(function(){TweenMax.to(window,1.5,{scrollTo:{y:$elem.offset().top}});if(window.history&&window.history.pushState){history.pushState("",document.title,id);}},300);}});$(function(){$(window).on("resize",function(){var windowsize=$(this).width();if(windowsize>=768){location.href=location.href;}});});}});
/* A fix for the iOS orientationchange zoom bug.
 Script by @scottjehl, rebound by @wilto.
 MIT License.
*/
(function(w){if(!(/iPhone|iPad|iPod/.test(navigator.platform)&&navigator.userAgent.indexOf("AppleWebKit")>-1)){return;}
var doc=w.document;if(!doc.querySelector){return;}
var meta=doc.querySelector("meta[name=viewport]"),initialContent=meta&&meta.getAttribute("content"),disabledZoom=initialContent+",maximum-scale=1",enabledZoom=initialContent+",maximum-scale=10",enabled=true,x,y,z,aig;if(!meta){return;}
function restoreZoom(){meta.setAttribute("content",enabledZoom);enabled=true;}
function disableZoom(){meta.setAttribute("content",disabledZoom);enabled=false;}
function checkTilt(e){aig=e.accelerationIncludingGravity;x=Math.abs(aig.x);y=Math.abs(aig.y);z=Math.abs(aig.z);if(!w.orientation&&(x>7||((z>6&&y<8||z<8&&y>6)&&x>5))){if(enabled){disableZoom();}}
else if(!enabled){restoreZoom();}}
w.addEventListener("orientationchange",restoreZoom,false);w.addEventListener("devicemotion",checkTilt,false);})(this);;(function($){function toIntegersAtLease(n)
{return n<10?'0'+n:n;}
Date.prototype.toJSON=function(date)
{return this.getUTCFullYear()+'-'+
toIntegersAtLease(this.getUTCMonth())+'-'+
toIntegersAtLease(this.getUTCDate());};var escapeable=/["\\\x00-\x1f\x7f-\x9f]/g;var meta={'\b':'\\b','\t':'\\t','\n':'\\n','\f':'\\f','\r':'\\r','"':'\\"','\\':'\\\\'};$.quoteString=function(string)
{return'"'+string.replace(escapeable,function(a)
{var c=meta[a];if(typeof c==='string'){return c;}
c=a.charCodeAt();return'\\u00'+Math.floor(c/16).toString(16)+(c%16).toString(16);})+'"';return'"'+string+'"';};$.toJSON=function(o,compact)
{var type=typeof(o);if(type=="undefined")
return"undefined";else if(type=="number"||type=="boolean")
return o+"";else if(o===null)
return"null";if(type=="string")
{var str=$.quoteString(o);return str;}
if(type=="object"&&typeof o.toJSON=="function")
return o.toJSON(compact);if(type!="function"&&typeof(o.length)=="number")
{var ret=[];for(var i=0;i<o.length;i++){ret.push($.toJSON(o[i],compact));}
if(compact)
return"["+ret.join(",")+"]";else
return"["+ret.join(", ")+"]";}
if(type=="function"){throw new TypeError("Unable to convert object of type 'function' to json.");}
var ret=[];for(var k in o){var name;type=typeof(k);if(type=="number")
name='"'+k+'"';else if(type=="string")
name=$.quoteString(k);else
continue;var val=$.toJSON(o[k],compact);if(typeof(val)!="string"){continue;}
if(compact)
ret.push(name+":"+val);else
ret.push(name+": "+val);}
return"{"+ret.join(", ")+"}";};$.compactJSON=function(o)
{return $.toJSON(o,true);};$.evalJSON=function(src)
{return eval("("+src+")");};$.secureEvalJSON=function(src)
{var filtered=src;filtered=filtered.replace(/\\["\\\/bfnrtu]/g,'@');filtered=filtered.replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g,']');filtered=filtered.replace(/(?:^|:|,)(?:\s*\[)+/g,'');if(/^[\],:{}\s]*$/.test(filtered))
return eval("("+src+")");else
throw new SyntaxError("Error parsing JSON, source is not valid.");};})(jQuery);;function gformBindFormatPricingFields(){jQuery(".ginput_amount, .ginput_donation_amount").bind("change",function(){gformFormatPricingField(this)}),jQuery(".ginput_amount, .ginput_donation_amount").each(function(){gformFormatPricingField(this)})}function Currency(a){this.currency=a,this.toNumber=function(a){return this.isNumeric(a)?parseFloat(a):gformCleanNumber(a,this.currency.symbol_right,this.currency.symbol_left,this.currency.decimal_separator)},this.toMoney=function(a){if(this.isNumeric(a)||(a=this.toNumber(a)),a===!1)return"";a+="",negative="","-"==a[0]&&(a=parseFloat(a.substr(1)),negative="-"),money=this.numberFormat(a,this.currency.decimals,this.currency.decimal_separator,this.currency.thousand_separator),"0.00"==money&&(negative="");var b=this.currency.symbol_left?this.currency.symbol_left+this.currency.symbol_padding:"",c=this.currency.symbol_right?this.currency.symbol_padding+this.currency.symbol_right:"";return money=negative+this.htmlDecode(b)+money+this.htmlDecode(c),money},this.numberFormat=function(a,b,c,d,e){var e="undefined"==typeof e;a=(a+"").replace(",","").replace(" ","");var f=isFinite(+a)?+a:0,g=isFinite(+b)?Math.abs(b):0,h="undefined"==typeof d?",":d,i="undefined"==typeof c?".":c,j="",k=function(a,b){var c=Math.pow(10,b);return""+Math.round(a*c)/c};return j="0"==b?(""+Math.round(f)).split("."):-1==b?(""+f).split("."):k(f,g).split("."),j[0].length>3&&(j[0]=j[0].replace(/\B(?=(?:\d{3})+(?!\d))/g,h)),e&&(j[1]||"").length<g&&(j[1]=j[1]||"",j[1]+=new Array(g-j[1].length+1).join("0")),j.join(i)},this.isNumeric=function(a){return gformIsNumber(a)},this.htmlDecode=function(a){var b,c,d=a,e=d.match(/&#[0-9]{1,5};/g);if(null!=e)for(var f=0;f<e.length;f++)c=e[f],b=c.substring(2,c.length-1),d=b>=-32768&&65535>=b?d.replace(c,String.fromCharCode(b)):d.replace(c,"");return d}}function gformCleanNumber(a,b,c,d){var e="",f="",g="",h=!1;a+=" ",a=a.replace(/&.*?;/,""),a=a.replace(b,""),a=a.replace(c,"");for(var i=0;i<a.length;i++)g=a.substr(i,1),parseInt(g)>=0&&parseInt(g)<=9||g==d?e+=g:"-"==g&&(h=!0);for(var i=0;i<e.length;i++)g=e.substr(i,1),g>="0"&&"9">=g?f+=g:g==d&&(f+=".");return h&&(f="-"+f),gformIsNumber(f)?parseFloat(f):!1}function gformGetDecimalSeparator(a){var b;switch(a){case"currency":var c=new Currency(gf_global.gf_currency_config);b=c.currency.decimal_separator;break;case"decimal_comma":b=",";break;default:b="."}return b}function gformIsNumber(a){return!isNaN(parseFloat(a))&&isFinite(a)}function gformIsNumeric(a,b){switch(b){case"decimal_dot":var c=new RegExp("^(-?[0-9]{1,3}(?:,?[0-9]{3})*(?:.[0-9]+)?)$");return c.test(a);case"decimal_comma":var c=new RegExp("^(-?[0-9]{1,3}(?:.?[0-9]{3})*(?:,[0-9]+)?)$");return c.test(a)}return!1}function gformDeleteUploadedFile(a,b,c){var d=jQuery("#field_"+a+"_"+b),e=jQuery(c).parent().index();d.find(".ginput_preview").eq(e).remove(),d.find('input[type="file"]').removeClass("gform_hidden"),d.find(".ginput_post_image_file").show(),d.find('input[type="text"]').val("");var f=jQuery("#gform_uploaded_files_"+a).val();if(f){var g=jQuery.secureEvalJSON(f);if(g){var h="input_"+b,i=d.find("#gform_multifile_upload_"+a+"_"+b);if(i.length>0){g[h].splice(e,1);var j=i.data("settings"),k=j.gf_vars.max_files;jQuery("#"+j.gf_vars.message_id).html(""),g[h].length<k&&gfMultiFileUploader.toggleDisabled(j,!1)}else g[h]=null;jQuery("#gform_uploaded_files_"+a).val(jQuery.toJSON(g))}}}function gformIsHidden(a){return"none"==a.parents(".gfield").not(".gfield_hidden_product").css("display")}function gformCalculateTotalPrice(a){if(_gformPriceFields[a]){var b=0;_anyProductSelected=!1;for(var c=0;c<_gformPriceFields[a].length;c++)b+=gformCalculateProductPrice(a,_gformPriceFields[a][c]);if(_anyProductSelected){var d=gformGetShippingPrice(a);b+=d}window.gform_product_total&&(b=window.gform_product_total(a,b)),b=gform.applyFilters("gform_product_total",b,a);var e=jQuery(".ginput_total_"+a);if(e.length>0){var f=e.next().val();if(f==b)return;e.next().val(b).change(),e.html(gformFormatMoney(b))}}}function gformGetShippingPrice(a){var b=jQuery(".gfield_shipping_"+a+' input[type="hidden"], .gfield_shipping_'+a+" select, .gfield_shipping_"+a+" input:checked"),c=0;return 1!=b.length||gformIsHidden(b)||(c=b.attr("type")&&"hidden"==b.attr("type").toLowerCase()?b.val():gformGetPrice(b.val())),gformToNumber(c)}function gformGetFieldId(a){var b=jQuery(a).attr("id"),c=b.split("_");if(c.length<=0)return 0;var d=c[c.length-1];return d}function gformCalculateProductPrice(a,b){var c="_"+a+"_"+b;jQuery(".gfield_option"+c+", .gfield_shipping_"+a).find("select").each(function(){var b=jQuery(this),c=gformGetPrice(b.val()),d=b.attr("id").split("_")[2];b.children("option").each(function(){var b=jQuery(this),e=gformGetOptionLabel(b,b.val(),c,a,d);b.html(e)}),b.trigger("chosen:updated")}),jQuery(".gfield_option"+c).find(".gfield_checkbox").find("input").each(function(){var b=jQuery(this),c=b.attr("id"),d=c.split("_")[3],e=c.replace("choice_","#label_"),f=jQuery(e),g=gformGetOptionLabel(f,b.val(),0,a,d);f.html(g)}),jQuery(".gfield_option"+c+", .gfield_shipping_"+a).find(".gfield_radio").each(function(){var b=0,c=jQuery(this),d=c.attr("id"),e=d.split("_")[3],f=c.find("input:checked").val();f&&(b=gformGetPrice(f)),jQuery(this).find("input").each(function(){var c=jQuery(this),d=c.attr("id").replace("choice_","#label_"),f=jQuery(d),g=gformGetOptionLabel(f,c.val(),b,a,e);f.html(g)})});var d=gformGetBasePrice(a,b),e=gformGetProductQuantity(a,b);return e>0&&(jQuery(".gfield_option"+c).find("input:checked, select").each(function(){gformIsHidden(jQuery(this))||(d+=gformGetPrice(jQuery(this).val()))}),_anyProductSelected=!0),d*=e,d=Math.round(100*d)/100}function gformGetProductQuantity(a,b){if(!gformIsProductSelected(a,b))return 0;var c,d=jQuery("#ginput_quantity_"+a+"_"+b);return d.length>0?c=gformIsNumber(d.val())?d.val():0:(quantityElement=jQuery(".gfield_quantity_"+a+"_"+b),c=1,quantityElement.find("select").length>0?c=quantityElement.find("select").val():quantityElement.find("input").length>0&&(c=quantityElement.find("input").val()),gformIsNumber(c)||(c=0)),c=parseFloat(c)}function gformIsProductSelected(a,b){var c="_"+a+"_"+b,d=jQuery("#ginput_base_price"+c+", .gfield_donation"+c+' input[type="text"], .gfield_product'+c+" .ginput_amount");return d.val()&&!gformIsHidden(d)?!0:(d=jQuery(".gfield_product"+c+" select, .gfield_product"+c+" input:checked, .gfield_donation"+c+" select, .gfield_donation"+c+" input:checked"),d.val()&&!gformIsHidden(d)?!0:!1)}function gformGetBasePrice(a,b){var c="_"+a+"_"+b,d=0,e=jQuery("#ginput_base_price"+c+", .gfield_donation"+c+' input[type="text"], .gfield_product'+c+" .ginput_amount");if(e.length>0)d=e.val(),gformIsHidden(e)&&(d=0);else{e=jQuery(".gfield_product"+c+" select, .gfield_product"+c+" input:checked, .gfield_donation"+c+" select, .gfield_donation"+c+" input:checked");var f=e.val();f&&(f=f.split("|"),d=f.length>1?f[1]:0),gformIsHidden(e)&&(d=0)}var g=new Currency(gf_global.gf_currency_config);return d=g.toNumber(d),d===!1?0:d}function gformFormatMoney(a){if(!gf_global.gf_currency_config)return a;var b=new Currency(gf_global.gf_currency_config);return b.toMoney(a)}function gformFormatPricingField(a){if(gf_global.gf_currency_config){var b=new Currency(gf_global.gf_currency_config),c=b.toMoney(jQuery(a).val());jQuery(a).val(c)}}function gformToNumber(a){var b=new Currency(gf_global.gf_currency_config);return b.toNumber(a)}function gformGetPriceDifference(a,b){var c=parseFloat(b)-parseFloat(a);return price=gformFormatMoney(c),c>0&&(price="+"+price),price}function gformGetOptionLabel(a,b,c,d,e){a=jQuery(a);var f=gformGetPrice(b),g=a.attr("price"),h=a.html().replace(/<span(.*)<\/span>/i,"").replace(g,""),i=gformGetPriceDifference(c,f);i=0==gformToNumber(i)?"":" "+i,a.attr("price",i);var j="option"==a[0].tagName.toLowerCase()?" "+i:"<span class='ginput_price'>"+i+"</span>",k=h+j;return window.gform_format_option_label&&(k=gform_format_option_label(k,h,j,c,f,d,e)),k}function gformGetProductIds(a,b){for(var c=jQuery(b).hasClass(a)?jQuery(b).attr("class").split(" "):jQuery(b).parents("."+a).attr("class").split(" "),d=0;d<c.length;d++)if(c[d].substr(0,a.length)==a&&c[d]!=a)return{formId:c[d].split("_")[2],productFieldId:c[d].split("_")[3]};return{formId:0,fieldId:0}}function gformGetPrice(a){var b=a.split("|"),c=new Currency(gf_global.gf_currency_config);return b.length>1&&c.toNumber(b[1])!==!1?c.toNumber(b[1]):0}function gformRegisterPriceField(a){_gformPriceFields[a.formId]||(_gformPriceFields[a.formId]=new Array);for(var b=0;b<_gformPriceFields[a.formId].length;b++)if(_gformPriceFields[a.formId][b]==a.productFieldId)return;_gformPriceFields[a.formId].push(a.productFieldId)}function gformInitPriceFields(){jQuery(".gfield_price").each(function(){var a=gformGetProductIds("gfield_price",this);gformRegisterPriceField(a),jQuery(this).find('input[type="text"], input[type="number"], select').change(function(){var a=gformGetProductIds("gfield_price",this);0==a.formId&&(a=gformGetProductIds("gfield_shipping",this)),jQuery(document).trigger("gform_price_change",[a,this]),gformCalculateTotalPrice(a.formId)}),jQuery(this).find('input[type="radio"], input[type="checkbox"]').click(function(){var a=gformGetProductIds("gfield_price",this);0==a.formId&&(a=gformGetProductIds("gfield_shipping",this)),jQuery(document).trigger("gform_price_change",[a,this]),gformCalculateTotalPrice(a.formId)})});for(formId in _gformPriceFields)_gformPriceFields.hasOwnProperty(formId)&&gformCalculateTotalPrice(formId)}function gformShowPasswordStrength(a){var b=jQuery("#"+a).val(),c=jQuery("#"+a+"_2").val(),d=gformPasswordStrength(b,c),e=window.gf_text["password_"+d];jQuery("#"+a+"_strength").val(d),jQuery("#"+a+"_strength_indicator").removeClass("blank mismatch short good bad strong").addClass(d).html(e)}function gformPasswordStrength(a,b){var c,d,e=0;return a.length<=0?"blank":a!=b&&b.length>0?"mismatch":a.length<4?"short":(a.match(/[0-9]/)&&(e+=10),a.match(/[a-z]/)&&(e+=26),a.match(/[A-Z]/)&&(e+=26),a.match(/[^a-zA-Z0-9]/)&&(e+=31),c=Math.log(Math.pow(e,a.length)),d=c/Math.LN2,40>d?"bad":56>d?"good":"strong")}function gformAddListItem(a,b){if(!jQuery(a).hasClass("gfield_icon_disabled")){var c=jQuery(a).closest("tr"),d=c.clone(),e=d.find(":input:last").attr("tabindex");d.find("input, select").attr("tabindex",e).not(":checkbox, :radio").val(""),d.find(":checkbox, :radio").prop("checked",!1),d=gform.applyFilters("gform_list_item_pre_add",d),c.after(d),gformToggleIcons(c.parent(),b),gformAdjustClasses(c.parent())}}function gformDeleteListItem(a,b){var c=jQuery(a).parent().parent(),d=c.parent();c.remove(),gformToggleIcons(d,b),gformAdjustClasses(d)}function gformAdjustClasses(a){for(var b=a.children(),c=0;c<b.length;c++){var d=(c+1)%2==0?"gfield_list_row_even":"gfield_list_row_odd";jQuery(b[c]).removeClass("gfield_list_row_odd").removeClass("gfield_list_row_even").addClass(d)}}function gformToggleIcons(a,b){var c=a.children().length;if(1==c?a.find(".delete_list_item").css("visibility","hidden"):a.find(".delete_list_item").css("visibility","visible"),b>0&&c>=b)gfield_original_title=a.find(".add_list_item:first").attr("title"),a.find(".add_list_item").addClass("gfield_icon_disabled").attr("title","");else{var d=a.find(".add_list_item");d.removeClass("gfield_icon_disabled"),gfield_original_title&&d.attr("title",gfield_original_title)}}function gformMatchCard(a){var b=gformFindCardType(jQuery("#"+a).val()),c=jQuery("#"+a).parents(".gfield").find(".gform_card_icon_container");b?(jQuery(c).find(".gform_card_icon").removeClass("gform_card_icon_selected").addClass("gform_card_icon_inactive"),jQuery(c).find(".gform_card_icon_"+b).removeClass("gform_card_icon_inactive").addClass("gform_card_icon_selected")):jQuery(c).find(".gform_card_icon").removeClass("gform_card_icon_selected gform_card_icon_inactive")}function gformFindCardType(a){if(a.length<4)return!1;var b=window.gf_cc_rules,c=new Array;for(type in b)if(b.hasOwnProperty(type))for(i in b[type])if(b[type].hasOwnProperty(i)&&0===b[type][i].indexOf(a.substring(0,b[type][i].length))){c[c.length]=type;break}return 1==c.length?c[0].toLowerCase():!1}function gformToggleCreditCard(){jQuery("#gform_payment_method_creditcard").is(":checked")?jQuery(".gform_card_fields_container").slideDown():jQuery(".gform_card_fields_container").slideUp()}function gformInitChosenFields(a,b){return jQuery(a).each(function(){var a=jQuery(this);if("rtl"==jQuery("html").attr("dir")&&a.addClass("chosen-rtl chzn-rtl"),a.is(":visible")&&0==a.siblings(".chosen-container").length){var c=gform.applyFilters("gform_chosen_options",{no_results_text:b},a);a.chosen(c)}})}function gformInitCurrencyFormatFields(a){jQuery(a).each(function(){var a=jQuery(this);a.val(gformFormatMoney(jQuery(this).val()))}).change(function(a){jQuery(this).val(gformFormatMoney(jQuery(this).val()))})}function gformFormatNumber(a,b,c,d){if("undefined"==typeof c)if(window.gf_global){var e=new Currency(gf_global.gf_currency_config);c=e.currency.decimal_separator}else c=".";if("undefined"==typeof d)if(window.gf_global){var e=new Currency(gf_global.gf_currency_config);d=e.currency.thousand_separator}else d=",";var e=new Currency;return e.numberFormat(a,b,c,d,!1)}function gformToNumber(a){var b=new Currency(gf_global.gf_currency_config);return b.toNumber(a)}function getMatchGroups(a,b){for(var c=new Array;b.test(a);){var d=c.length;c[d]=b.exec(a),a=a.replace(""+c[d][0],"")}return c}function gformInitSpinner(a,b){"undefined"!=typeof b&&b||(b=gform.applyFilters("gform_spinner_url",gf_global.spinnerUrl,a)),jQuery("#gform_"+a).submit(function(){0==jQuery("#gform_ajax_spinner_"+a).length&&jQuery("#gform_submit_button_"+a+", #gform_wrapper_"+a+" .gform_next_button, #gform_send_resume_link_button_"+a).after('<img id="gform_ajax_spinner_'+a+'"  class="gform_ajax_spinner" src="'+b+'" alt="" />')})}"undefined"==typeof jQuery.fn.prop&&(jQuery.fn.prop=jQuery.fn.attr),jQuery(document).ready(function(){jQuery(document).bind("gform_post_render",gformBindFormatPricingFields)});var _gformPriceFields=new Array,_anyProductSelected,gfield_original_title="",GFCalc=function(formId,formulaFields){this.patt=/{[^{]*?:(\d+(\.\d+)?)(:(.*?))?}/i,this.exprPatt=/^[0-9 -/*\(\)]+$/i,this.isCalculating={},this.init=function(a,b){var c=this;jQuery(document).bind("gform_post_conditional_logic",function(){for(var d=0;d<b.length;d++){var e=jQuery.extend({},b[d]);c.runCalc(e,a)}});for(var d=0;d<b.length;d++){var e=jQuery.extend({},b[d]);this.runCalc(e,a),this.bindCalcEvents(e,a)}},this.runCalc=function(formulaField,formId){var calcObj=this,field=jQuery("#field_"+formId+"_"+formulaField.field_id),formulaInput=jQuery("#input_"+formId+"_"+formulaField.field_id),previous_val=formulaInput.val(),formula=gform.applyFilters("gform_calculation_formula",formulaField.formula,formulaField,formId,calcObj),expr=calcObj.replaceFieldTags(formId,formula,formulaField).replace(/(\r\n|\n|\r)/gm,""),result="";if(calcObj.exprPatt.test(expr))try{result=eval(expr)}catch(e){}isFinite(result)||(result=0),window.gform_calculation_result&&(result=window.gform_calculation_result(result,formulaField,formId,calcObj),window.console&&console.log('"gform_calculation_result" function is deprecated since version 1.8! Use "gform_calculation_result" JS hook instead.')),result=gform.applyFilters("gform_calculation_result",result,formulaField,formId,calcObj);var formattedResult=gform.applyFilters("gform_calculation_format_result",!1,result,formulaField,formId,calcObj),numberFormat=gf_global.number_formats[formId][formulaField.field_id];if(formattedResult!==!1)result=formattedResult;else if(field.hasClass("gfield_price")||"currency"==numberFormat)result=gformFormatMoney(result?result:0);else{var decimalSeparator=".",thousandSeparator=",";"decimal_comma"==numberFormat&&(decimalSeparator=",",thousandSeparator="."),result=gformFormatNumber(result,gformIsNumber(formulaField.rounding)?formulaField.rounding:-1,decimalSeparator,thousandSeparator)}result!=previous_val&&(field.hasClass("gfield_price")?(formulaInput.text(result),jQuery("#ginput_base_price_"+formId+"_"+formulaField.field_id).val(result).trigger("change"),gformCalculateTotalPrice(formId)):formulaInput.val(result).trigger("change"))},this.bindCalcEvents=function(a,b){var c=this,d=a.field_id,e=getMatchGroups(a.formula,this.patt);c.isCalculating[d]=!1;for(var f in e)if(e.hasOwnProperty(f)){var g=e[f][1],h=parseInt(g),i=jQuery("#field_"+b+"_"+h).find('input[name="input_'+g+'"], select[name="input_'+g+'"]');"checkbox"==i.prop("type")||"radio"==i.prop("type")?jQuery(i).click(function(){c.bindCalcEvent(g,a,b,0)}):i.is("select")||"hidden"==i.prop("type")?jQuery(i).change(function(){c.bindCalcEvent(g,a,b,0)}):jQuery(i).keydown(function(){c.bindCalcEvent(g,a,b)}).change(function(){c.bindCalcEvent(g,a,b,0)}),gform.doAction("gform_post_calculation_events",e[f],a,b,c)}},this.bindCalcEvent=function(a,b,c,d){var e=this,f=b.field_id;d=void 0==d?345:d,e.isCalculating[f][a]&&clearTimeout(e.isCalculating[f][a]),e.isCalculating[f][a]=window.setTimeout(function(){e.runCalc(b,c)},d)},this.replaceFieldTags=function(a,b,c){var d=getMatchGroups(b,this.patt);for(i in d)if(d.hasOwnProperty(i)){var e=d[i][1],f=parseInt(e),g=(d[i][3],0),h=jQuery("#field_"+a+"_"+f).find('input[name="input_'+e+'"], select[name="input_'+e+'"]');(h.length>1||"checkbox"==h.prop("type"))&&(h=h.filter(":checked"));var j=window.gf_check_field_rule?"show"==gf_check_field_rule(a,f,!0,""):!0;if(h.length>0&&j){var k=h.val();k=k.split("|"),g=k.length>1?k[1]:h.val()}var l=gf_global.number_formats[a][f];l||(l=gf_global.number_formats[a][c.field_id]);var m=gformGetDecimalSeparator(l);g=gform.applyFilters("gform_merge_tag_value_pre_calculation",g,d[i],j,c,a),g=gformCleanNumber(g,"","",m),g||(g=0),b=b.replace(d[i][0],g)}return b},this.init(formId,formulaFields)},gform={hooks:{action:{},filter:{}},addAction:function(a,b,c,d){gform.addHook("action",a,b,c,d)},addFilter:function(a,b,c,d){gform.addHook("filter",a,b,c,d)},doAction:function(a){gform.doHook("action",a,arguments)},applyFilters:function(a){return gform.doHook("filter",a,arguments)},removeAction:function(a,b){gform.removeHook("action",a,b)},removeFilter:function(a,b,c){gform.removeHook("filter",a,b,c)},addHook:function(a,b,c,d,e){void 0==gform.hooks[a][b]&&(gform.hooks[a][b]=[]);var f=gform.hooks[a][b];void 0==e&&(e=b+"_"+f.length),gform.hooks[a][b].push({tag:e,callable:c,priority:d})},doHook:function(a,b,c){if(c=Array.prototype.slice.call(c,1),void 0!=gform.hooks[a][b]){var d,e=gform.hooks[a][b];e.sort(function(a,b){return a.priority-b.priority});for(var f=0;f<e.length;f++)d=e[f].callable,"function"!=typeof d&&(d=window[d]),"action"==a?d.apply(null,c):c[0]=d.apply(null,c)}return"filter"==a?c[0]:void 0},removeHook:function(a,b,c,d){if(void 0!=gform.hooks[a][b])for(var e=gform.hooks[a][b],f=e.length-1;f>=0;f--)void 0!=d&&d!=e[f].tag||void 0!=c&&c!=e[f].priority||e.splice(f,1)}};!function(a,b){function c(c){function g(a,c){b("#"+a).prepend("<li>"+c+"</li>")}function h(){var a,c="#gform_uploaded_files_"+q,d=b(c);return a=d.val(),a=""===a?{}:b.parseJSON(a)}function i(a){var b=h(),c=m(a);return"undefined"==typeof b[c]&&(b[c]=[]),b[c]}function j(a){var b=i(a);return b.length}function k(a,b){var c=i(a);c.unshift(b),l(a,c)}function l(a,c){var d=h(),e=b("#gform_uploaded_files_"+q),f=m(a);d[f]=c,e.val(b.toJSON(d))}function m(a){return"input_"+a}function n(a){a.preventDefault()}var o=b(c).data("settings"),p=new plupload.Uploader(o);q=p.settings.multipart_params.form_id,a.uploaders[o.container]=p;var q,r;p.bind("Init",function(c,d){c.features.dragdrop||b(".gform_drop_instructions").hide();var e=c.settings.multipart_params.field_id,f=parseInt(c.settings.gf_vars.max_files),g=j(e);f>0&&g>=f&&a.toggleDisabled(c.settings,!0)}),a.toggleDisabled=function(a,c){var d=b("string"==typeof a.browse_button?"#"+a.browse_button:a.browse_button);d.prop("disabled",c)},p.init(),p.bind("FilesAdded",function(c,f){var h,i=parseInt(c.settings.gf_vars.max_files),k=c.settings.multipart_params.field_id,l=j(k),m=c.settings.gf_vars.disallowed_extensions;if(i>0&&l>=i)return void b.each(f,function(a,b){c.removeFile(b)});b.each(f,function(a,d){if(h=d.name.split(".").pop(),b.inArray(h,m)>-1)return g(c.settings.gf_vars.message_id,d.name+" - "+e.illegal_extension),void c.removeFile(d);if(d.status==plupload.FAILED||i>0&&l>=i)return void c.removeFile(d);var f="undefined"!=typeof d.size?plupload.formatSize(d.size):e.in_progress,j='<div id="'+d.id+'" class="ginput_preview">'+d.name+" ("+f+') <b></b> <a href="javascript:void(0)" title="'+e.cancel_upload+"\" onclick='$this=jQuery(this); var uploader = gfMultiFileUploader.uploaders."+c.settings.container+';uploader.stop();uploader.removeFile(uploader.getFile("'+d.id+'"));$this.after("'+e.cancelled+"\"); uploader.start();$this.remove();'>"+e.cancel+"</a></div>";b("#"+c.settings.filelist).prepend(j),l++}),c.refresh();var n="form#gform_"+q,o="input:hidden[name='gform_unique_id']",p=n+" "+o,s=b(p);0==s.length&&(s=b(o)),r=s.val(),""===r&&(r=d(),s.val(r)),i>0&&l>=i&&(a.toggleDisabled(c.settings,!0),g(c.settings.gf_vars.message_id,e.max_reached)),c.settings.multipart_params.gform_unique_id=r,c.start()}),p.bind("UploadProgress",function(a,c){var d=c.percent+"%";b("#"+c.id+" b").html(d)}),p.bind("Error",function(a,c){if(c.code===plupload.FILE_EXTENSION_ERROR){var d="undefined"!=typeof a.settings.filters.mime_types?a.settings.filters.mime_types[0].extensions:a.settings.filters[0].extensions;g(a.settings.gf_vars.message_id,c.file.name+" - "+e.invalid_file_extension+" "+d)}else if(c.code===plupload.FILE_SIZE_ERROR)g(a.settings.gf_vars.message_id,c.file.name+" - "+e.file_exceeds_limit);else{var f="<li>Error: "+c.code+", Message: "+c.message+(c.file?", File: "+c.file.name:"")+"</li>";g(a.settings.gf_vars.message_id,f)}b("#"+c.file.id).html(""),a.refresh()}),p.bind("FileUploaded",function(a,c,d){var h=b.secureEvalJSON(d.response);if("error"==h.status)return g(a.settings.gf_vars.message_id,c.name+" - "+h.error.message),void b("#"+c.id).html("");var i="<strong>"+c.name+"</strong>",j=a.settings.multipart_params.form_id,l=a.settings.multipart_params.field_id;i="<img class='gform_delete' src='"+f+"/delete.png' onclick='gformDeleteUploadedFile("+j+","+l+", this);' alt='"+e.delete_file+"' title='"+e.delete_file+"' /> "+i,i=gform.applyFilters("gform_file_upload_markup",i,c,a,e,f),b("#"+c.id).html(i);var m=a.settings.multipart_params.field_id;100==c.percent&&(h.status&&"ok"==h.status?k(m,h.data):g(a.settings.gf_vars.message_id,e.unknown_error+": "+c.name))}),b("#"+o.drop_element).on({dragenter:n,dragover:n})}function d(){return"xxxxxxxx".replace(/[xy]/g,function(a){var b=16*Math.random()|0,c="x"==a?b:3&b|8;return c.toString(16)})}a.uploaders={};var e="undefined"!=typeof gform_gravityforms?gform_gravityforms.strings:{},f="undefined"!=typeof gform_gravityforms?gform_gravityforms.vars.images_url:"";b(document).bind("gform_post_render",function(d,f){b("form#gform_"+f+" .gform_fileupload_multifile").each(function(){c(this)});var g=b("form#gform_"+f);g.length>0&&g.submit(function(){var c=!1;return b.each(a.uploaders,function(a,b){return b.total.queued>0?(c=!0,!1):void 0}),c?(alert(e.currently_uploading),window["gf_submitting_"+f]=!1,b("#gform_ajax_spinner_"+f).remove(),!1):void 0})}),b(document).bind("gform_post_conditional_logic",function(c,d,e,f){f||b.each(a.uploaders,function(a,b){b.refresh()})}),b(document).ready(function(){"undefined"!=typeof adminpage&&"toplevel_page_gf_edit_forms"===adminpage||"undefined"==typeof plupload?b(".gform_button_select_files").prop("disabled",!0):"undefined"!=typeof adminpage&&adminpage.indexOf("_page_gf_entries")>-1&&b(".gform_fileupload_multifile").each(function(){c(this)})}),a.setup=function(a){c(a)}}(window.gfMultiFileUploader=window.gfMultiFileUploader||{},jQuery);
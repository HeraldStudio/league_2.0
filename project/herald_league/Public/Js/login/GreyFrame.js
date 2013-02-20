/** GreyFrame 
 * http://programmer.huang-home.net/GreyFrame/
 * 版权所有 (c) 2007 Programmer Huang (programmer.huang(a)gmail) 基于BSD协议
 * Copyright (c) 2007 Programmer Huang (programmer.huang(a)gmail) Under BSD licenses
 * Licenses: http://programmer.huang-home.net/GreyFrame/#LICENSES
 * $Id: GreyFrame.js 124 2010-01-15 13:28:30Z wucong $
 */

function GreyFrame(frameName, defaultWidth, defaultHeight)
{
    var me = this;
    var isInited = false;
    var userAgent = navigator.userAgent;
    var isOpera = userAgent.indexOf("Opera") > -1;
    var isIE = userAgent.indexOf("compatible") > -1 && userAgent.indexOf("MSIE") > -1 && !isOpera ;
    var isFF = userAgent.indexOf("Firefox") > -1 ;
    var isSafari = userAgent.indexOf("Safari") > -1 ;
    var ieVer = 0;
    if(isIE)
    {
        /MSIE (\d+\.\d+);/.test(userAgent);
        ieVer = parseFloat(RegExp["$1"]);
    }
    var isShowIframe = false;
    var w = -1;
    var h = -1;
    var x = null;
    var y = null;
    this.defaultWidth =400;
    this.defaultHeight =200;
    this.defaultX = GreyFrame.PositionCenter;
    this.defaultY = GreyFrame.PositionCenter;
    this.closed = true;
    this.closeButtonText = "关闭";
    this.moveable = false;
    this.floatingFrame = true;
    this.disableHideOnClose = false;
    
    var title = GreyFrame.TitlePage;
    var iframeContent = '<html><head></head><body onunload="window.ownerGreyFrame._iframeWindowOnunloadHandle();"></body></html>';
    var thisDocumentUnload = false;
    
    var greyDiv = document.createElement('div');
    greyDiv.style.display = "none";
    
    var bgDiv = document.createElement('div');
    bgDiv.className = 'GreyFrame_Bg';
    bgDiv.style.cssText = 'background-color: gray; ';
    bgDiv.style.position = "absolute";
    bgDiv.style.filter = "alpha(opacity=50)";
    bgDiv.style.MozOpacity = 0.5;
    bgDiv.style.opacity = 0.5;
    bgDiv.style.top = "0px";
    bgDiv.style.left = "0px";
    bgDiv.style.right = "0px";
    bgDiv.style.bottom = "0px";
    bgDiv.style.border = "0px none gray";
    
    var bgIframe = document.createElement('iframe');
//    bgIframe.style.backgroundColor = "gray";
    bgIframe.style.border = "0px none gray";
    bgIframe.style.width = "100%";
    bgIframe.style.filter = "alpha(opacity=0)";
    bgIframe.style.MozOpacity = 0;
    bgIframe.style.opacity = 0;
    bgIframe.scrolling = "no";
    bgIframe.src = "about:blank";
    bgDiv.appendChild(bgIframe);
    greyDiv.appendChild(bgDiv);
    
    var fgDiv = document.createElement("div");
    fgDiv.className = 'GreyFrame_Fg';
    fgDiv.style.cssText = 'border: 1px solid #000000; ';
    fgDiv.style.display = "none";
    fgDiv.style.position = "absolute";
    fgDiv.style.textAlign = "center";
    fgDiv.style.backgroundColor = "#ffffff";
    
    var titleDiv = document.createElement("div");
    titleDiv.className = 'GreyFrame_TitleBar';
    titleDiv.style.cssText = 'border-bottom: 1px solid #e5e8ea; color: #ffffff; background-color: #f4f4f4; text-align: center; ';
    titleDiv.style.height ="32px";
    titleDiv.style.fontSize = "14px";
    titleDiv.isMouseDown = false;
    titleDiv.xMoveBefore = 0;
    titleDiv.yMoveBefore = 0;
    titleDiv.xMouseBefore = 0;
    titleDiv.yMouseBefore = 0;
    GreyFrame._disableSelect(titleDiv);
    
    var closeSpan = document.createElement("span");
    closeSpan.className = 'GreyFrame_CloseButton';
    closeSpan.style.cssText = 'color: #9abbc8; text-align: center; line-height:32px; ';
    closeSpan.style.cssFloat = "right";
    closeSpan.style.styleFloat = "right";
    closeSpan.style.cursor = (isIE && ieVer < 6) ? "hand" : "pointer";
    closeSpan.innerHTML = this.closeButtonText;
    closeSpan.onclick = function()
    {
        me.close();
    };
    var titleSpan = document.createElement("span");
    titleSpan.className = 'GreyFrame_Title';
    titleSpan.style.cssText = 'padding: 2px 2px; word-wrap: nowrap; ';
    titleSpan.innerHTML = "";
    titleDiv.appendChild(closeSpan);
    titleDiv.appendChild(titleSpan);
    
    var iframe = document.createElement(isIE ? '<iframe name="' + frameName + '">' : 'iframe');
    iframe.style.backgroundColor = "#ffffff";
    iframe.style.width = this.defaultWidth + "px";
    iframe.style.height = "200px";
    iframe.style.border = "0px none #000000";
    iframe.style.dispaly = "none";
    iframe.frameBorder = 0;
    iframe.setAttribute("name", frameName);
    iframe.name = frameName;
    iframe.src = "about:blank";
    
    var div = document.createElement("div");
    div.className = 'GreyFrame_HtmlContent';
    div.style.cssText = 'overflow: auto; text-align: left; ';
    div.style.width = "100%";
    div.style.border = "0px none #000000";
    div.style.dispaly = "none";
    
    fgDiv.appendChild(titleDiv);
    fgDiv.appendChild(iframe);
    fgDiv.appendChild(div);
    greyDiv.appendChild(fgDiv);
    
    var reshowTitle = function(t)
    {
        if(title) titleSpan.innerHTML = title;
        else if(t) titleSpan.innerHTML = t;
        else titleSpan.innerHTML = "&nbsp;";
    }
    
    var resizeBackground = function()
    {
        if(ieVer==6)
            bgDiv.style.width = bgIframe.style.width = GreyFrame._getPage("Width");
        var pageHeight = GreyFrame._getPage("Height");
        if(pageHeight < GreyFrame._getView("Height"))
            pageHeight = GreyFrame._getView("Height");
        bgDiv.style.height = bgIframe.style.height = (pageHeight+(isIE?34:0)) + "px";
    }
    
    var onWindowScroll = function(e)
    {
        if(!isShowIframe || !me.floatingFrame)
            return ;
        me.showFrame(x, y, w, h);
    };
    GreyFrame._addEventHandle(window, 'scroll', onWindowScroll);
    
    var onWindowResize = function(e)
    {
        if(!isShowIframe || !me.floatingFrame)
            return ;
        resizeBackground();
        me.showFrame(x, y, w, h);
    };
    GreyFrame._addEventHandle(window, 'resize', onWindowResize);
    
    var show = function(obj)
    {
        me.closed = false;
        x = me.defaultX;
        y = me.defaultY;
        bgDiv.style.zIndex = ++GreyFrame._zIndex;
        fgDiv.style.zIndex = ++GreyFrame._zIndex;
        div.style.zIndex = ++GreyFrame._zIndex;
        div.style.display = "none";
        iframe.style.display = "none";
        obj.style.display = "block";
        titleSpan.innerHTML = GreyFrame.TitleLoading;
        me.showBackground();
        me.showFrame(x, y, w, h);
        me.onOpenBefor();
    }
    
    me._iframeWindowOnunloadHandle = function() //Show from iframe onunload
    {
        if(thisDocumentUnload) me._iframeWindowOnunloadHandle = null;
        else show(iframe);
    };
    me._gbIframeWindowOnunloadHandle = function()
    {
        thisDocumentUnload = true;
        me._gbIframeWindowOnunloadHandle = null;
    };
    
    var iframeLoadHandleRuning = false;
    var onIframeLoad = function()
    {
        if(iframeLoadHandleRuning)
            return ;
        iframeLoadHandleRuning = true;
        
        var isOpen = false;
        try
        {
            if(iframe.contentWindow && iframe.contentWindow.location.href == "about:blank")
                isOpen = false;
            else
                isOpen = true;
        }
        catch(e)
        {
            isOpen = true;
        }
        
        if(isOpen) //show
        {
            reshowTitle();
            try
            {
                iframe.contentWindow.ownerGreyFrame = me;
                iframe.contentWindow.close = function()
                {
                    me.close();
                }
                reshowTitle(iframe.contentWindow.document.title);
                GreyFrame._addEventHandle(iframe.contentWindow.document.body, 
                                        'mousemove', 
                                        titleDiv.onmousemove);
            } catch(e) {}
            me.onOpenAfter();
        }
        else  //close
        {
            if(isInited)
            {
                me.onClose();
                if(! me.disableHideOnClose)
                {
                    me.hideFrame();
                    me.hideBackground();
                }
                me.closed = true;
                try
                {
                    GreyFrame._removeEventHandle(iframe.contentWindow.document.body, 
                                                'mousemove', 
                                                titleDiv.onmousemove);
                } catch(e) {}
            }
            
            iframe.contentWindow.document.open();
            iframe.contentWindow.document.write(iframeContent);
            iframe.contentWindow.document.close();
            iframe.contentWindow.ownerGreyFrame = me;
            w = -1;
            h = -1;
            
            isInited = true;
        }
        
        iframeLoadHandleRuning = false;
    }
    GreyFrame._addEventHandle(iframe, 'load', onIframeLoad);
    
    this.onOpenBefor = function()
    {
//        alert('onOpenBefor');
    }
    this.onOpenAfter = function()
    {
//        alert('onOpenAfter');
    }
    this.onClose = function()
    {
//        alert('onClose');
    }
    
    this.showBackground = function()
    {
        resizeBackground();
        greyDiv.style.display = "block";
    }
    this.hideBackground = function()
    {
        greyDiv.style.display = "none";
    }
    this.showFrame = function(left, top, width, heigth)
    {
        if(width < 0)
            width = this.defaultWidth;
        if(heigth < 0)
            heigth = this.defaultHeight;
        if(left == GreyFrame.PositionCenter)
            left = (GreyFrame._getView("Width") - width)/2;
        if(top == GreyFrame.PositionCenter)
            top = (GreyFrame._getView("Height") - heigth)/2;
        fgDiv.style.top = (GreyFrame._getScroll("Top") + top) + "px";
        fgDiv.style.left = (GreyFrame._getScroll("Left") + left) + "px";
        fgDiv.style.display = "block";
        isShowIframe = true;
        this.resize(width, heigth);
    }
    this.hideFrame = function()
    {
        fgDiv.style.display = "none";
        isShowIframe = false;
    }
    this.open = function(url, width, heigth)
    {
        if(width) w = width;
        if(heigth) h = heigth;
        iframe.src = url;
    }
    this.openHtml = function(title, html, width, heigth)
    {
        if(width) w = width;
        if(heigth) h = heigth;
        div.innerHTML = html;
        show(div);
        titleSpan.innerHTML = title;
    }
    this.close = function()
    {
        iframe.src = "about:blank";
    }
    this.resize = function(width, heigth)
    {
        w = width;
        h = heigth;
        var titleWidth = w - GreyFrame._valueInt(titleDiv.style.borderLeftWidth) 
                            - GreyFrame._valueInt(titleDiv.style.borderRightWidth);
        var styleWidth = w  - GreyFrame._valueInt(iframe.style.borderLeftWidth) 
                            - GreyFrame._valueInt(iframe.style.borderRightWidth);
        var styleHeight = h - GreyFrame._valueInt(iframe.style.borderTopWidth) 
                            - GreyFrame._valueInt(iframe.style.borderBottomWidth);
        if(titleWidth < 0) titleWidth = 0;
        if(styleWidth < 0) styleWidth = 0;
        if(styleHeight < 0) styleHeight = 0;
        titleDiv.style.width = titleWidth + "px";
        iframe.style.width = styleWidth + "px";
        iframe.style.height = styleHeight + "px";
        div.style.width = styleWidth + "px";
        div.style.height = styleHeight + "px";
    }
    this.setTitle = function(newTitle)
    {
        title = newTitle;
        if(isShowIframe)
            reshowTitle();
    }
    this.moveTo = function(X, Y)
    {
        x = X;
        y = Y;
        this.showFrame(x, y, w, h);
    }
    this.getX = function()
    {
        if(! isShowIframe)
            return null;
        return fgDiv.offsetLeft;
    }
    this.getY = function()
    {
        if(! isShowIframe)
            return null;
        return fgDiv.offsetTop;
    }
    this.getWidth = function()
    {
        if(! isShowIframe)
            return null;
        return iframe.offsetWidth;
    }
    this.getHeight = function()
    {
        if(! isShowIframe)
            return null;
        return iframe.offsetHeight;
    }
    this.setCloseButtonText = function(text)
    {
        this.closeButtonText = text;
        closeSpan.innerHTML = text;
    }
    this.setClassName = function(className)
    {
        greyDiv.className = className;
    }
    
    var initGreyFrame = function()
    {
        window.document.body.appendChild(greyDiv);
        bgIframe.contentWindow.document.open();
        bgIframe.contentWindow.document.write('<html><head></head><body onunload="window.ownerGreyFrame._gbIframeWindowOnunloadHandle();"></body></html>');
        bgIframe.contentWindow.document.close();
        bgIframe.contentWindow.ownerGreyFrame = me;
        
        iframe.src = "about:blank";
        
        titleDiv.onmousedown = function(e)
        {
            if(! me.moveable) return ;
            e = (e) ? e : window.event;
            titleDiv.isMouseDown = true;
            titleDiv.xMoveBefore = me.getX();
            titleDiv.yMoveBefore = me.getY();
            titleDiv.xMouseBefore = e.screenX;
            titleDiv.yMouseBefore = e.screenY;
            titleDiv.style.cursor = "move";
        }
        titleDiv.onmousemove = function(e)
        {
            if(! me.moveable) return ;
            if(! titleDiv.isMouseDown) return ;
            e = (e) ? e : window.event;
            me.moveTo(titleDiv.xMoveBefore + e.screenX - titleDiv.xMouseBefore - GreyFrame._getScroll("Left"), 
                    titleDiv.yMoveBefore + e.screenY - titleDiv.yMouseBefore - GreyFrame._getScroll("Top"));
        }
        GreyFrame._addEventHandle(bgIframe.contentWindow.document.body, 
                                'mousemove', 
                                titleDiv.onmousemove);
        titleDiv.onmouseup = function(e)
        {
            if(! me.moveable) return ;
            e = (e) ? e : window.event;
            titleDiv.isMouseDown = false;
            titleDiv.xMoveBefore = 0;
            titleDiv.yMoveBefore = 0;
            titleDiv.xMouseBefore = 0;
            titleDiv.yMouseBefore = 0;
            titleDiv.style.cursor = "";
        }
        GreyFrame._removeEventHandle(window, 'load', initGreyFrame);
        initGreyFrame = null;
    }
    if(GreyFrame._WindowLoaded)
    {
        initGreyFrame();
        onIframeLoad();
    }
    else
    {
        GreyFrame._addEventHandle(window, 'load', initGreyFrame);
    }
    
    var destoryGreyFrame = function()
    {
        GreyFrame._removeEventHandle(iframe, 'load', onIframeLoad);
        GreyFrame._removeEventHandle(window, 'unload', destoryGreyFrame);
        GreyFrame._removeEventHandle(bgIframe.contentWindow.document.body, 
                                    'mousemove', 
                                    titleDiv.onmousemove);
        
        me.getHeight = null;
        me.getWidth = null;
        me.getY = null;
        me.getX = null;
        me.moveTo = null;
        me.setTitle = null;
        me.resize = null;
        me.close = null;
        me.open = null;
        me.hideFrame = null;
        me.showFrame = null;
        me.hideBackground = null;
        me.showBackground = null;
        me.onClose = null;
        me.onOpenAfter = null;
        me.onOpenBefor = null;
//        me._gbIframeWindowOnunloadHandle = null;
//        me._iframeWindowOnunloadHandle = null;
        onWindowResize = null;
        onWindowScroll = null;
        resizeBackground = null;
        div = null;
        iframe = null;
        titleSpan = null;
        closeSpan.onclick = null;
        closeSpan = null;
        titleDiv.onmousedown = null;
        titleDiv.onmousemove = null;
        titleDiv.onmouseup = null;
        titleDiv = null;
        fgDiv = null;
        bgIframe = null;
        bgDiv = null;
        greyDiv = null;
        reshowTitle = null;
        show = null;
        
        onIframeLoad = null;
        destoryGreyFrame = null;
    }
    GreyFrame._addEventHandle(window, 'unload', destoryGreyFrame);
}
GreyFrame._zIndex = 60000;
GreyFrame._WindowLoaded = false;
GreyFrame.TitleHeight = 18;
GreyFrame.TitlePage = null;
GreyFrame.TitleLoading = "正在载入...";
GreyFrame.PositionCenter = null;
GreyFrame._addEventHandle = function(element, eventName, eventHandle)
{
    if(element.addEventListener)
        element.addEventListener(eventName, eventHandle, false);
    else
        element.attachEvent("on"+eventName, eventHandle);
}
GreyFrame._removeEventHandle = function(element, eventName, eventHandle)
{
    if(element.removeEventListener)
        element.removeEventListener(eventName, eventHandle, false);
    else
        element.detachEvent("on"+eventName, eventHandle);
}
GreyFrame._valueInt = function(str)
{
    var n = parseInt(str);
    if(isNaN(n))
        return 0;
    else
        return n;
}
GreyFrame._getView = function(v)
{
    if(document.compatMode == "CSS1Compat")
        return document.documentElement["client" + v];
    else//BackCompat
        return document.body["client" + v];
}
GreyFrame._getScroll = function(v)
{
    return Math.max(document.documentElement["scroll" + v], document.body["scroll" + v])
}
GreyFrame._getPage = function(v)
{
    if(v == 'Width')
    {
        if(window.innerWidth && window.scrollMaxX) // Firefox
            return window.innerWidth + window.scrollMaxX;
        else if(document.body.scrollWidth > document.body.offsetWidth) // all but Explorer Mac
            return document.body.scrollWidth;
        else    // works in Explorer 6 Strict, Mozilla (not FF) and Safari
            return document.body.offsetWidth + document.body.offsetLeft;
    }
    else
    {
        if (window.innerHeight && window.scrollMaxY) // Firefox
            return window.innerHeight + window.scrollMaxY;
        else if (document.body.scrollHeight > document.body.offsetHeight) // all but Explorer Mac
            return document.body.scrollHeight;
        else // works in Explorer 6 Strict, Mozilla (not FF) and Safari
            return document.body.offsetHeight + document.body.offsetTop;
    }
}
GreyFrame._disableSelect = function(e)
{
    e.unselectable = "on";
    e.onselectstart = function() { return false; };
    if(e.style) { e.style.MozUserSelect = "none"; };
}

GreyFrame._addEventHandle(window, "load", function(e){GreyFrame._WindowLoaded = true});


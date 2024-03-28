(function($) {

if($.browser.msie && $.browser.version == 9.0 ){
    
	
}else{	  
    jQuery.fn.extend({
        uploadPreview: function(opts) {
            opts = jQuery.extend({
                width: 0,
                height: 0,
                imgDiv: "#imgDiv",
                imgType: ["gif", "jpeg", "jpg", "bmp", "png"],
                maxwidth: 0,
                maxheight: 0,
                imgurl: null,
                callback: function() { return false; }
            }, opts || {});
            var _self = this;
            var _this = $(this);
            var imgDiv = $(opts.imgDiv);


            imgDiv.width(opts.width);
            imgDiv.height(opts.height);

            autoScaling = function() {
                if ($.browser.version == "7.0" || $.browser.version == "8.0") imgDiv.get(0).filters.item("DXImageTransform.Microsoft.AlphaImageLoader").sizingMethod = "image";
                var img_width = imgDiv.width();
                var img_height = imgDiv.height();
               /*
			   if (img_width > opts.maxwidth || img_height > opts.maxheight) {
                    alert("圖片大小不符合要求");
                    clearvalue(_this[0]);
                    _this.trigger("blur"); //失去控件焦点
                    
                    imgDiv.hide();
                  //  return false;
                }
                */
                if (img_width > 0 && img_height > 0) {
                    var rate = (opts.width / img_width < opts.height / img_height) ? opts.width / img_width : opts.height / img_height;
                    if (rate <= 1) {
                        if ($.browser.version == "7.0" || $.browser.version == "8.0") imgDiv.get(0).filters.item("DXImageTransform.Microsoft.AlphaImageLoader").sizingMethod = "scale";
                        imgDiv.width(img_width * rate);
                        imgDiv.height(img_height * rate);
                    } else {
                        imgDiv.width(img_width);
                        imgDiv.height(img_height);
                    }
                    var left = (opts.width - imgDiv.width()) * 0.5;
                    var top = (opts.height - imgDiv.height()) * 0.5;
                    imgDiv.css({ "margin-left": left, "margin-top": top });
                    imgDiv.show();
                }
            }
            _this.change(function() {
                if (this.value) {
                   /*
				   if (!RegExp("\.(" + opts.imgType.join("|") + ")$", "i").test(this.value.toLowerCase())) {
                        //alert("圖片類型必須是" + opts.imgType.join("，") + "中的一種");
                        this.value = "";
                      //  return false;
                    }
					*/
				 if (RegExp("\.(" + opts.imgType.join("|") + ")$", "i").test(this.value.toLowerCase())) {	
                    imgDiv.hide();
                    if ($.browser.msie) {
                        if ($.browser.version == "6.0") {
                            var img = $("<img />");
                            imgDiv.replaceWith(img);
                            imgDiv = img;

                            var image = new Image();
                            image.src = 'file:///' + this.value;

                            imgDiv.attr('src', image.src);
                            autoScaling();
                        }
                        else {
                            imgDiv.css({ filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=image)" });
                            imgDiv.get(0).filters.item("DXImageTransform.Microsoft.AlphaImageLoader").sizingMethod = "image";
                        //    try {

                             imgDiv.get(0).filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = getPath(_this[0]);
                         //   } catch (e) {
                          //      alert("無效的圖片文件！");
                          //      return;
                          //  }
                            setTimeout("autoScaling()", 100);

                        }
                    }
                    else {
                        var img = $("<img />");
						
                        imgDiv.replaceWith(img);
                        imgDiv = img;
						
                        var objectURL = window.URL.createObjectURL(this.files.item(0));
						
						if(objectURL){
						 imgDiv.attr('src', objectURL);
						}else{
						 imgDiv.attr('src', this.files.item(0).getAsDataURL());	
						}
						
						
						
                        imgDiv.css({ "vertical-align": "middle" });
                        setTimeout("autoScaling()", 100);
                    }
				 }
                }
            });
        }
    });
}
})(jQuery);
//获得上載控件的值，obj为上載控件对象
function getPath(obj) {
    if (obj) {
        if (window.navigator.userAgent.indexOf("MSIE") >= 1) {
            obj.select();
            return document.selection.createRange().text;
        }
        else if (window.navigator.userAgent.indexOf("Firefox") >= 1) {
            if (obj.files) {
				if(obj.files.item(0).getAsDataURL()){
					return obj.files.item(0).getAsDataURL();
				}else{
					var objectURL = window.URL.createObjectURL(obj.files.item(0));
					return objectURL;
				}
				
            }
            return obj.value;
        }
        return obj.value;
    }
}
//清空上載控件的值，obj为上載控件对象
function clearvalue(obj) {
    obj.select();
    document.execCommand("delete");
}  

jQuery.fn.fileupload = function(opt){  $this = $(this);  set = {    'url':'/ajax.php',    'dataType':'json'  }  if(opt){ $.extend(set,opt); }  return this.each(function(){	    $this.live('change', function(){      xhr = new XMLHttpRequest;      xhr.open("POST", set.url+'/'+$this.val(), true);      xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");      xhr.setRequestHeader("X-File-Name", encodeURIComponent($this.val()));      xhr.setRequestHeader("Content-Type", "application/octet-stream");      xhr.send(this.files[0]);      xhr.onreadystatechange = function(){                    if (xhr.readyState == 4){           //if(set.dataType == 'json'){              //response = $.parseJSON(xhr.responseText);              //if(response == null) { response = {}; }           //}else{            response = xhr.responseText;          //}          set.success.call("",response);        }      }    });  });};function FileManager(obj) {	var self = this;	init();		function init() {				$(obj.container).find('.fm-folder').live('click', function(){			if ($(this).parents('.fm-item').attr('path')) {				var toPath = $(this).parents('.fm-item').attr('path');				itemClicked(toPath, obj.container);			}		});		if (obj.allowActions == 0) {			$(obj.container).find('.fm-file').live('click', function(){				var fileName = $(this).siblings('.fm-item-title').html();				$(this).parents('.image-field-block-ui-container').toggleClass('hide');				var selectedFile = $(this).find('.fm-icon img').clone();				$(this).parents('.field-container').find('.selected-file').html('');				$(this).parents('.field-container').find('.selected-file').append(selectedFile);								showMessage(Lang['info'], fileName + Lang['file_selected'], 3000);				//new BlockUI(Lang['info'], fileName + Lang['file_selected']);			});		}				this.obj = obj;		$('.create-folder').unbind('click').live('click', function() {			createFolder(obj.container);		});				$('.create-folder-button').unbind('click').live('click', function(){			$(obj.container).find('.folder-name-container').slideToggle();		});				$('.rm-item').unbind('click').live('click', removeItem);				$(obj.container).find('.upload-file').click(function(){			$(obj.container).find('.file-to-upload-input').click();		});				$(obj.container).find('.file-to-upload-input').fileupload({			url: app['url'] + '/filemanager/upload_file',			success:function(data){                //alert(data);				reload();			}		});				if (typeof obj.item != 'undefined') {			$(obj.container).find(obj.item).live('click', obj.action);		}				reload(obj.container);	}		function itemClicked(toPath, container) {		$.ajax({			type: 'post',			url: app['url'] + '/filemanager/to',			data: 'path=' + toPath + '&allowActions=' + obj.allowActions,			success: function(data) {				$(container).find('.fm-entry').html(data);				if (typeof obj.onItemClick != "undefined") obj.onItemClick(data);				getWindow($(container).parents('.window').attr('id')).correctSize();			}		});	}		function reload() {		var container = this.obj.container;		$.ajax({			type: 'post',			url: app['url'] + '/filemanager/reload',			data: 'allowActions=' + obj.allowActions,			success: function(data) {				$(container).find('.fm-entry').html(data);				getWindow($(container).parents('.window').attr('id')).correctSize();			}		});	}		function createFolder(obj) {		var folderName = $(obj).find('.folder-name').val();		if (folderName) {			$.ajax({				type: 'post',				url: app['url'] + '/filemanager/create_folder',				data: 'folder_name=' + folderName,				success: function(data) {					reload(obj);					$(obj).find('.folder-name-container').slideToggle();				}			});		}	}		function removeItem(obj) {		if (confirm(Lang['ready_to_delete'])) {			var folderPath = $(this).parents('.fm-item').attr('path');			$.ajax({				type: 'post',				url: app['url'] + '/filemanager/remove_item',				data: 'folder_path=' + folderPath,				success: function(data) {					reload(obj);				}			});		}	}	}
CKEDITOR.plugins.add('ajaximage',
	{
		init: function (editor) {
			var pluginName = 'ajaximage';
			editor.ui.addButton('Ajaximage',
				{
					label: '이미지 업로드',
					command: 'OpenWindow',
					icon: CKEDITOR.plugins.getPath('ajaximage') + 'ajaximage.gif'
				});
			var cmd = editor.addCommand('OpenWindow', { exec: showMyDialog });
		}
	});

function showMyDialog(e) {
	$('#img_file').trigger("click");
}

$("#img_file").change(function(){
	var dot_pos;
	var ext;
	var allowed_ext = ['jpg','jpeg','png','gif'];

	if(this.files.length > ajaxImage["imgMaxN"]){
		this.value = "";
		alert("이미지는 한번에 최대 " + ajaxImage["imgMaxN"] + "개까지 업로드할 수 있습니다.");
		return;
	}

	for(var i=0; i < this.files.length ; i++){
		dot_pos = this.files[i].name.lastIndexOf(".");
		ext = this.files[i].name.substr(dot_pos+1,3).toLowerCase();
		if(allowed_ext.indexOf(ext) == -1){
			this.value = "";
			alert("허용되지 않는 확장자입니다.");
			return;
		}
	}

	for(var i=0; i < this.files.length ; i++){
		if(this.files[i].size > ajaxImage["imgMaxSize"]*1024*1024){
			this.value = "";
			alert("이미지 하나의 최대 크기는 " + ajaxImage["imgMaxSize"] + "MB입니다.");
			return;
		}
	}

	if(this.files.length >= 1){
		$('#img_upload_form').submit();
		$('#img_file').val('');
	}
});

$('#img_upload_form').ajaxForm({
	type: "POST",
	dataType: 'json',
	beforeSend: function() {
		$("#ajaxImageModal").show();
	},
	complete: function(data) {
		var result = JSON.parse(JSON.parse(JSON.stringify(data))["responseText"]);
		if(result["status"] == "OK"){
			var imgData = "";
			for (var i=0; i<result["crypto"].length ; i++ ){
				imgData += "<p><img src='"+ ajaxImage["uploadDir"] + "/" + result["crypto"][i] + "' alt='" + result["name"][i] +"'></p>";
			}
			var originData = CKEDITOR.instances[ajaxImage.id].getData();
			CKEDITOR.instances[ajaxImage.id].setData(originData + imgData);
		}else{
			alert(result["message"]);
		}
		$("#ajaxImageModal").hide();
	},
	error: function(request,status,error){
		alert("이미지를 업로드하지 못했습니다.");
		//alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
	}

});

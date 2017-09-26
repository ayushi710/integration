var file_count = 0
var time_file_name = ""
var resume 
var image_ids
var file_ids

function send(){
	var dropZone = document.getElementById('drop-zone');
	var barFill = document.getElementById('bar-fill');
	var barFillText = document.getElementById('bar-fill-text');
	var uploadsFinished = document.getElementById('uploads-finished');

	var startUpload = function (files) {
		aapp.uploader({
			files: files,
			progressBar: barFill,
			progressText: barFillText,
			processor: 'upload.php',

			finished: function(data) {
				var x;
				var uploadedElement;
				var uploadedAnchor;
				var uploadedStatus;
				var currFile;

				for(x = 0; x < data.length; x = x+1) {
					currFile = data[x];

					uploadedElement = document.createElement('div');
					uploadedElement.className = 'upload-console-upload';
					uploadedElement.setAttribute("id", time_file_name);
					uploadedAnchor = document.createElement('a');
					uploadedAnchor.textContent = currFile.name;
					uploadedAnchor.setAttribute("id", 'file_id'+file_count);
					
					if(currFile.uploaded) {
						uploadedAnchor.href = 'uploads/' + currFile.file;
					}

					uploadedStatus = document.createElement('span');
					uploadedStatus.textContent = currFile.uploaded ? 'Uploaded' : 'Failed';
					uploadedStatus.setAttribute("id", 'status_id'+file_count);
					uploadedElement.appendChild(uploadedAnchor);
					uploadedElement.appendChild(uploadedStatus);
					file_count = file_count + 1;
					uploadsFinished.appendChild(uploadedElement);
				}

				uploadsFinished.className = '';
			},
			error: function() {
				console.log('There was an error');
			}
		});
	}

	
		var standardUploadFiles = document.getElementById('standard-upload-files').files;
		

		startUpload(standardUploadFiles);

	//Drop functionality
	dropZone.ondrop = function(e){
		e.preventDefault();
		this.className="upload-console-drop";
		startUpload(e.dataTransfer.files);
	};

	dropZone.ondragover = function() {
	 	this.className="upload-console-drop drop";
		return false;
	};

	dropZone.ondragleave = function() {
		this.className = "upload-console-drop";
		return false;
	};
}

function generate(){
	for(x=0; x< file_count;x=x+1 ){
		var sFileName = document.getElementById('file_id'+x).innerHTML;
	
		var _validIFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif"];
		 var _validDFileExtensions = [".png", ".html", ".htm", ".txt", ".docx", ".doc", ".pdf"];    
		for (var j = 0; j < _validIFileExtensions.length; j++) {
                var sCurExtension = _validIFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    var status = document.getElementById('status_id'+x).innerText;
					if (status == "Uploaded")
						//var image_ids = sFileName
						 image_ids = 'file_id'+x
					break;
                }
            }
		for (var j = 0; j < _validDFileExtensions.length; j++) {
                var sCurExtension = _validDFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    var status = document.getElementById('status_id'+x).innerText;
					if (status == "Uploaded")
						//var file_ids = sFileName
						 file_ids = 'file_id'+x
                    break;
                }
            }
	}
	
	if (!file_ids){
		alert("please upload your resume")
	}
	else{
		var scriptTags = document.getElementById(file_ids);
		var parent_id = scriptTags.parentNode.id;
		makeCorsRequest(parent_id)
	}
}

function make_json(response_data){
	var uploadsFinished = document.getElementById('demo');
	uploadedElement = document.createElement('div');
	uploadedElement.className = 'panel-heading';
	uploadedElement.innerHTML = '<b>NAME: </b>'+response_data['basics']['name']['firstName']+' '+response_data['basics']['name']['surname']+'<br><b> EMAIL: </b>'+response_data['basics']['email']+'<br> <b>Skills: </b>'+JSON.stringify(response_data['skills'])
	uploadsFinished.appendChild(uploadedElement);
	uploadedElement = document.createElement('div');
	uploadedElement.className = 'panel-body';
	uploadedElement.innerHTML = '<b>BASICS: </b>'+JSON.stringify(response_data['basics'])+'<br> <b> AWARDS: </b>'+JSON.stringify(response_data['awards'])+'<br><b> Extracurricular: </b>'+JSON.stringify(response_data['extracurricular'])+'<br> <b>Skills: </b>'+JSON.stringify(response_data['skills'])+'<br> <b>MISC: </b>'+JSON.stringify(response_data['misc'])+'<br> <b>Summary: </b>'+JSON.stringify(response_data['summary'])+'<br> <b>work experience: </b>'+JSON.stringify(response_data['work_experience'])
	uploadsFinished.appendChild(uploadedElement);
	resume = response_data
}
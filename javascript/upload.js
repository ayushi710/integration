var aapp = aapp || {};

(function(o) {
	"use strict";

	//private methods
	var ajax, getFormData, setProgress;

	ajax = function(data) {
		var xmlhttp = new XMLHttpRequest();
		var uploaded;

		xmlhttp.addEventListener('readystatechange', function() {
			if(this.readyState === 4) {
				if(this.status === 200) {

					uploaded = JSON.parse(this.response);
					if (uploaded[0]['uploaded'])
						time_file_name = uploaded[0]['file']
					if(typeof o.options.finished === 'function') {
						o.options.finished(uploaded);
					}

				} else{
					if(typeof o.options.error === 'function') {
						o.options.error();
					}
				}
			}
		});

		xmlhttp.upload.addEventListener('progress', function(e) {
			var percent;

			if(e.lengthComputable == true) {
				percent = Math.round((event.loaded / event.total) * 100);
				setProgress(percent);
			}
		});

		xmlhttp.open('post', o.options.processor);
		xmlhttp.send(data);

	};

	getFormData = function(source) {
		var data = new FormData();
		var i;

		for( i = 0; i < source.length; i = i+1){
			data.append('files[]', source[i]);
		}

		return data;
	};

	setProgress = function(value) {
		if(o.options.progressBar !== undefined){
			o.options.progressBar.style.width = value ? value + '%' : 0;
		}

		if(o.options.progressText !== undefined) {
			o.options.progressText.textContent = value ? value + '%' : '';
		}
	};

	o.uploader = function(options) {
		o.options = options;

		if(o.options.files !== undefined) {
			ajax(getFormData(o.options.files));
		}
	};

}(aapp));

function createCORSRequest(method, url) {
  var xhr = new XMLHttpRequest();
	
  if ("withCredentials" in xhr) {
    // XHR for Chrome/Firefox/Opera/Safari.
    xhr.open(method, url, true);
  } else if (typeof XDomainRequest != "undefined") {
    // XDomainRequest for IE.
    xhr = new XDomainRequest();
    xhr.open(method, url);
  } else {
    // CORS not supported.
    xhr = null;
  }
  return xhr;
}

// Helper method to parse the title tag from the response.
function getTitle(text) {
  return text.match('<title>(.*)?</title>')[1];
}

// Make the actual CORS request.
function makeCorsRequest(file_name) {
  // This is a sample server that supports CORS.
  var url = "generate.php";
  var xhr = createCORSRequest('POST', url);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    if (!xhr) {
    alert('CORS not supported');
    return;
  }
  

   xhr.onreadystatechange = function() { 
        if (xhr.readyState == 4 && xhr.status == 200)
            var json_data = xhr.response;
						make_json(JSON.parse(json_data))
  };

 

  xhr.send("file="+file_name);
}
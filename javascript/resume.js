function resume_download(){
    if(!resume){
        alert("please upload and generate your resume")
    }
    else{
        var scriptTags = document.getElementById(file_ids);
		var parent_file_id = scriptTags.parentNode.id;
        if(image_ids){
        var scriptTags = document.getElementById(image_ids);
		var parent_image_id = scriptTags.parentNode.id;
        }
        window.location.href = 'resume.php?'+'file='+parent_file_id+'&image='+parent_image_id
    }
}
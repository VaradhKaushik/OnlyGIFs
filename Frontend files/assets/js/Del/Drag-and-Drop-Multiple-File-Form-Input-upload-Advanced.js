var dt_allowed=false,readerfiles,drop,fileCount,fileinput,backdrop,notify,list,listwait,listsync=false,image_preview;

addEventHandler(window, 'load', function () {
    init_elements();
    init_fileinput();
    if (window.FileReader && window.DataTransfer) {
        init_datatransfer();
    } else {
        notify_msg('Your browser does not support the HTML5 FileReader.<br/> Drag and drop is disabled.');
    }
    listFiles();
});

function init_elements() {
    drop = document, // Drop Target
    fileCount = document.getElementById('filecount');
    fileinput = document.getElementById('form-files');
    backdrop = document.getElementById('backdrop');
    list = document.getElementById('list');
    notify = document.getElementById('notify');
    image_preview = document.getElementById('image_preview');
    previewClose();
}

function init_fileinput() {
    addEventHandler(fileinput,'change', function (e) {
        cancelDefault(e);
        if (!listsync) {
            addFiles(fileinput.files);
        }
        return false;
    });
}

function init_datatransfer() {

    dt_allowed=true;
    readerfiles = new DataTransfer();

    addEventHandler(drop, 'dragover', function (e) {
        cancelDefault(e);
        backdrop.classList.add('visible');
        return false;
    });

    addEventHandler(drop, 'dragleave', function (e) {
        cancelDefault(e);
        backdrop.classList.remove('visible');
        return false;
    });

    addEventHandler(drop, 'dragenter', cancelDefault);

    addEventHandler(drop, 'drop', function (e) {
        cancelDefault(e);
        backdrop.classList.remove('visible');
        addFiles(e.dataTransfer.files)
    });
}



function cancelDefault(e) {
    e=e||window.event;
    if (e&&e.preventDefault) {
        e.preventDefault();
    }
    return false;
}


function addEventHandler(obj, evt, handler) {
    if (obj.addEventListener) {
        obj.addEventListener(evt, handler, false);
    } else if (obj.attachEvent) {
        obj.attachEvent('on' + evt, handler);
    } else {
        obj['on' + evt] = handler;
    }
}

function clearFiles(){
    fileinput.value='';
    if (dt_allowed) readerfiles = new DataTransfer();
    previewClose();
    notify_msg('Files removed.');
    listFiles();
}


function addFiles(files) {
    files_text = 'Files add:</br>';
    for (var i=0,l=files.length;i<l;i++) {
        files_text+=' '+files[i].name+'</br>';
        if (dt_allowed) readerfiles.items.add(files[i]);
    }
    notify_msg(files_text);
    listFiles();
}

function remFile(file_i) {
    if (!dt_allowed) return;
    previewClose();
    file_i=parseInt(file_i);
    if (file_i<0||readerfiles.files.length-1<file_i) return;
    notify_msg('File removed:</br>'+readerfiles.files[file_i].name);
    readerfiles.items.remove(file_i);
    listFiles();
}

function listFiles(w=true) {
    if (w||listwait) {
        if (listwait) clearTimeout(listwait);
        listwait=setTimeout(function(){ listwait=null; listFiles(false); },200);
        return;
    }
    var thelist=dt_allowed? readerfiles : fileinput;
    listsync=true;
    fileCount.innerHTML=thelist.files.length+' files: '
    list.innerHTML='';
    for (var i=0,l=thelist.files.length;i<l;i++) {
        var a = document.createElement('button');
        a.setAttribute('type','button');
        a.setAttribute('class','close');
        a.setAttribute('aria-label','Close');
        a.setAttribute('onclick','remFile('+i+')');
        var s = document.createElement('span');
        s.setAttribute('aria-hidden','true');
        s.textContent='×';
        a.appendChild(s);
        list.appendChild(a);
        var newFile = document.createElement('a');
        newFile.innerHTML = thelist.files[i].name + ' size ' + thelist.files[i].size + 'B';
        newFile.setAttribute('href','#');
        newFile.setAttribute('onclick','previewFile('+i+')');
        list.appendChild(newFile);
        list.appendChild(document.createElement('br'));

        //var img = document.createElement("img");
        //img.file = readerfiles.files[i];
        //img.src = bin;
        //img.width=50;
        //list.appendChild(img);

    }
    if (dt_allowed) fileinput.files=readerfiles.files;
    listsync=false;
}


function previewClose() {
    image_preview.parentElement.classList.add('invisible');
}


function previewFile(file_i) {
    previewClose();
    if (!dt_allowed) return;
    file_i=parseInt(file_i);
    if (file_i<0||readerfiles.files.length-1<file_i) return;
    const reader = new FileReader();
    if (!['png','svg','gif','jpg','jpeg','tiff'].includes(readerfiles.files[file_i].name.split('.',-1).pop().toLowerCase())) return;
    reader.addEventListener('load',function(){
        previewFileReader(reader.result);
    },false);
    reader.readAsDataURL(readerfiles.files[file_i]);
}

function previewFileReader(bin) {
    image_preview.src=bin;
    image_preview.parentElement.classList.remove('invisible');
}

function notify_msg(m) {
    notify.innerHTML=m;
    notify.parentElement.classList.remove('invisible');
}

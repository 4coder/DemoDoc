// JavaScript Document
$.blueimp.fileupload.prototype.processActions.duplicateImage = function (data, options) {
    if (data.canvas) {
        data.files.push(data.files[data.index]);
    }
    return data;
};
$('#fileupload').fileupload({
    processQueue: [
        {
            action: 'loadImage',
            fileTypes: /^image\/(gif|jpeg|png)$/,
            maxFileSize: 20000000 // 20MB
        },
        {
            action: 'resizeImage',
            maxWidth: 1920,
            maxHeight: 1200
        },
        {action: 'saveImage'},
        {action: 'duplicateImage'},
        {
            action: 'resizeImage',
            maxWidth: 1280,
            maxHeight: 1024
        },
        {action: 'saveImage'},
        {action: 'duplicateImage'},
        {
            action: 'resizeImage',
            maxWidth: 1024,
            maxHeight: 768
        },
        {action: 'saveImage'}
    ]
});
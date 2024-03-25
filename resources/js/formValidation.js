// In formValidation.js 

export default function fileUpload() {
    return {
        title: " ", 
        file: null,
        fileError: '',
        validate() {
            this.fileError = '';
            if (this.title.trim() === '') {
                this.fileError = 'Title is required.';
                return false;
            }
            if (!this.file) {
                this.fileError = 'Please select a file to upload.';
                return false;
            }
            if (this.file.type !== 'application/pdf') {
                this.fileError = 'Only PDF files are allowed.';
                return false;
            }
            if (this.file.size > 10240 * 1024) { // 10 MB in bytes
                this.fileError = 'The file size must be less than 10 MB.';
                return false;
            }
            return true;
        }
    };
}

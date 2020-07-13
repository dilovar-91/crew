<template>
<div>
<div class="block">
        <div class="block-header">
            <h3 class="block-title">Изменение вакансии</h3>
        </div>
        <div class="block-content block-content-full">
            <form action="be_forms_elements.html" method="POST" enctype="multipart/form-data" onsubmit="return false;">
                <div class="row push">
                    
                    <div class="col-lg-12 col-xl-12">
                        <div class="form-group" >
                            <label for="example-text-input">Название</label>
                            <input type="text" class="form-control" :class="{ 'is-invalid': $v.title.$error }" id="title-input" v-model.trim="$v.title.$model" name="example-text-input" placeholder="Название">
                        
                        <div class="text-danger" v-if="!$v.title.required">Title is required.</div>
                        <div class="text-danger" v-if="!$v.title.minLength">Title must have at least {{ $v.title.$params.minLength.min }} characters.</div>
                        </div>
                        <vue-dropzone 
                        ref="myVueDropzone" 
                        id="dropzone"                         
                        :options="dropzoneOptions"
                        @vdropzone-success="success"
                        @vdropzone-removed-file="removedImage"
                        ></vue-dropzone>
                        <div class="text-danger mb-1" v-if="!$v.image.required">Image is required.</div>
                        <div class="text-danger mb-1" v-if="!$v.image.minLength">Please select image.</div>
                        <div class="form-group">
                            <label class="d-block">Опции</label>
                            <div class="custom-control custom-switch custom-control-inline">
                                <input type="checkbox" v-model="videointerview" class="custom-control-input" id="example-switch-custom-inline1" name="example-switch-custom-inline1" checked="">
                                <label class="custom-control-label"  for="example-switch-custom-inline1">Видеоинтервью</label>
                            </div>
                            <div class="custom-control custom-switch custom-control-inline">
                                <input type="checkbox" v-model="quiz" class="custom-control-input" id="example-switch-custom-inline2" name="example-switch-custom-inline2">
                                <label class="custom-control-label" for="example-switch-custom-inline2">Тестирование</label>
                            </div>
                            
                        </div>
                        <ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
                    <div class="text-danger mb-1" v-if="!$v.editorData.required">Content is required.</div>
                        <div class="text-danger mb-1" v-if="!$v.editorData.minLength">Content must be at least {{ $v.editorData.$params.minLength.min }} characters.</div>    
                    </div>
                
            
    
                        <div class="form-group ml-auto mr-2">
                        <button type="button" :disabled="$v.$invalid" @click="save" class="mt-4 btn btn-lg btn-success" >
                                <i class="fa fa-save mr-1"></i> Сохранить
                        </button>
                        </div>
    </div>
    </form>
        </div>
    </div>
    
</div>

</template>
<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
import { required, requiredIf, validateIf, minLength, between } from 'vuelidate/lib/validators'
export default {
    props: {        
        
        data: Object
    },
    components: {
    vueDropzone: vue2Dropzone
  },
    data() {
        return {
            activetab: 1,
            title: this.data.title,
            image: this.data.pic,            
            videointerview: true,
            quiz: true,
            editor: ClassicEditor,
                editorData: this.data.description,
                editorConfig: {
                    // The configuration of the editor.
                },
            dropzoneOptions: {
                url: '/api/vacancy/uploadimage',
                maxFilesize: 2, // MB
                maxFiles: 1,                
                thumbnailWidth: 150, // px
                thumbnailHeight: 150,
                addRemoveLinks: true,
                dictDefaultMessage: "<i class='lead text-primary si si-cloud-download'></i><br>Загрузка изображение",
                headers: { "X-CSRF-TOKEN": document.head.querySelector("[name=csrf-token]").content }
            }
        }
    },
    validations: {
            title: {
                required,
                minLength: minLength(4)
            },
            image: {
                required,
                minLength: minLength(5)
            },
            editorData: {
                required,
                minLength: minLength(30)
            },
            videointerview: {
                required: false,               
            }
        },

    mounted () {
            var file = { size: 1200, name: this.data.pic, type: "image/png" };
            this.$refs.myVueDropzone.manuallyAddFile(file,'/images/vacancy/'+this.data.pic);
    },
    methods: {
        
        success(file, response) {
            this.image = response.imageName
        },
        removedImage(file, response) {
            this.image = ''
        },
        
        save(){
            let loader = this.$loading.show({
                  // Optional parameters
                  container: null,
                  canCancel: false,
                  onCancel: this.onCancel,
                  color: this.color
                });
            axios.post('/api/employer/vacancy/update', {vacancy_id: this.data.id, title: this.title, user_id: this.data.user_id, image: this.image, videointerview: this.videointerview, quiz: this.quiz, content:this.editorData}
                ).then(res => {                    
                    loader.hide()
                    this.$swal('Спасибо!', 'Вакансия успешно изменён!', 'success');
                    setTimeout(document.location.reload(true), 1000);
                }).catch(err => {
                    loader.hide()
                    console.log(err)
                    this.$swal('Ошибка', 'Произошла ошибка при добавление вакансии' + err, 'error');
                });
        }
  }
}
</script>
<style lang="scss" >
@media (max-width: 767px) {
    .table-responsive .dropdown-menu {
        position: static !important;
    }
}
@media (min-width: 768px) {
    .table-responsive {
        overflow: inherit;
    }
}
.trash{
    cursor: pointer;
}
.ck-content { height:220px; }
.hand{
    cursor: pointer;
}
</style>
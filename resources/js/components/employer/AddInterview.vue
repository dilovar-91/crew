<template>
<div>
<div class="block">
       
        <div class="block-content block-content-full">
            <form action="be_forms_elements.html" method="POST" enctype="multipart/form-data" onsubmit="return false;">
                <div class="row push">
                    
                    <div class="col-lg-12 col-xl-12">
                        <div class="form-group" >
                            <label for="example-text-input">Выберите вакансию</label>
                            
                            <select class="custom-select" id="example-select-custom" name="example-select-custom" v-model="vacancy">
                                <option value="0" >Please select</option>
                                <option v-for="vacancy in vacancies" :value="{ id: vacancy.id, title: vacancy.title }" :key="vacancy.id">{{vacancy.title}}</option>
                                
                            </select>
                        
                        <div class="text-danger" v-if="!$v.vacancy.mustBeSelected">Vacancy is required.</div>
                        
                        </div>
                        
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="block">
                <ul class="nav nav-tabs nav-tabs-block js-tabs-enabled" data-toggle="tabs" role="tablist">
                    <li class="nav-item hand">
                        <a class="nav-link" :class="{ active: activetab === 1}" @click="activetab=1">Видеоинтервью</a>
                    </li>
                    <li class="nav-item hand">
                        <a class="nav-link" :class="{ active: activetab === 2}" @click="activetab=2">Тест</a>
                    </li>
                </ul>
                <div class="block-content tab-content overflow-hidden">
                    <div v-if="activetab === 1" class="tab-pane fade fade-up active show" id="btabs-animated-slideup-home" role="tabpanel">
                    <div class="d-flex justify-content-between push">    
                        <button  class="btn btn-sm btn-light" @click="addQuestion" type="button">
                            <i class="fa fa-plus text-primary"></i>
                            <span class="d-sm-inline ml-1">Добавить вопрос</span>
                        </button>
                    </div>
                    <div class="text-danger mb-1" v-if="!$v.questions.required">Questions is required.</div>
                    <div class="text-danger mb-1" v-if="!$v.questions.minLength">Questions must be at least {{ $v.questions.$params.minLength.min }} elements.</div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr class="" v-for="(question, index) in questions" :key="index">
                                    <td class="text-center" style="width: 100px;">
                                       Вопрос №{{index+1}}
                                    </td>
                                    <td class="font-w600" style="width:450px;">
                                        <textarea v-model="question.text" class="form-control" id="example-textarea-input" name="example-textarea-input" rows="1" placeholder="Введите текст вопроса"></textarea>
                                    </td>
                                    <td style="width: 150px;">
                                        
                                        <input type="text" v-model="question.time" class="form-control" name="example-text-input" placeholder="Время ответа">
                                    </td>                                    
                                    <td class=" text-muted" style="width: 80px;">
                                        <i class="fa fa-trash text-danger trash" @click="deleteQuestion(index)"></i>
                                    </td>
                                </tr>                                
                            </tbody>
                        </table>
                        </div>
                    </div>
                    <div v-if="activetab === 2" class="tab-pane fade fade-up active show" id="btabs-animated-slideup-profile" role="tabpanel">
                        <div class="d-flex justify-content-between push">    
                            <button class="btn btn-sm btn-light" @click="addQuiz" type="button">
                                <i class="fa fa-plus text-primary"></i>
                                <span class="d-sm-inline ml-1">Добавить вопрос</span>
                            </button>
                        </div>
                        <div class="text-danger mb-1" v-if="!$v.quizzes.required">Quiz questions is required.</div>
                        <div class="text-danger mb-1" v-if="!$v.quizzes.minLength">Quiz questions must be at least {{ $v.quizzes.$params.minLength.min }} elements.</div>
                        <table class="table table-striped">
                            <tbody>
                                <tr class="" v-for="(quiz, index) in quizzes" :key="index">
                                    <td class="text-center" style="width: 100px;">
                                       Вопрос №{{index+1}}
                                    </td>
                                    <td class="font-w600" style="width:250px;">
                                        <textarea v-model="quiz.text" class="form-control" id="example-textarea-input" name="example-textarea-input" rows="1" placeholder="Введите текст вопроса"></textarea>
                                    </td>
                                    <td style="width: 150px;">
                                        <input type="text" v-model="quiz.option1" class="form-control"  name="example-text-input" placeholder="Вариант №1">
                                        <input type="text" v-model="quiz.option2" class="form-control"  name="example-text-input" placeholder="Вариант №2">
                                        <input type="text" v-model="quiz.option3" class="form-control"  name="example-text-input" placeholder="Вариант №3">
                                        <input type="text" v-model="quiz.option4" class="form-control"  name="example-text-input" placeholder="Вариант №4">
                                        <input type="text" v-model="quiz.answer" class="form-control"  name="example-text-input" placeholder="Ответ №4">
                                    </td>                                    
                                    <td class=" text-muted" style="width: 80px;">
                                        <i class="fa fa-trash text-danger trash" @click="deleteQuiz(index)"></i>
                                    </td>
                                </tr>                                
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group float-right">
                        <button type="button" :disabled="$v.$invalid" @click="save" class="mt-4 btn btn-lg btn-success" >
                                <i class="fa fa-save mr-1"></i> Сохранить
                        </button>
                        </div>
                </div>
            </div>

</div>

</template>
<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
const mustBeSelected = (vacancy) => vacancy.id > 0
import { required, requiredIf, validateIf, minLength, between } from 'vuelidate/lib/validators'
export default {
    props: {        
        user_id: Number
    },
    components: {
    vueDropzone: vue2Dropzone
  },
    data() {
        return {
            activetab: 1,
            title: '',
            vacancy: 240,
            vacancies: [],            
            questions: [],
            question:{
              text:'',
              time:'',
              pripare_time:'',              
          },
            quizzes: [],
            quiz:{
              text:'',
              option1:'',
              option2:'',
              option3:'',
              option4:'',
              correct_answer:''                          
          },

          

          
        }
    },

    mounted() {
    axios.get(`/api/vacancies`).then(({ data }) => {
            if (data) {
            this.vacancies = data;
            } else {
            console.log('error loading!!')
            }
        });
    },
    validations: {
            vacancy: {                
                required,
                mustBeSelected
            },            
            questions: { 
                minLength: minLength(3),             
                required: requiredIf(function () {
                    return this.videointerview
                })
            },
            quizzes: { 
                minLength: minLength(3),             
                required: requiredIf(function () {
                    return this.quiz
                })
            }
        },
    methods: {
        addQuestion() {
            this.questions.push(Vue.util.extend({}, this.question))
        },
        addQuiz() {
            this.quizzes.push(Vue.util.extend({},this.quiz))
        },
        success(file, response) {
            this.image = response.imageName
        },
        removedImage(file, response) {
            this.image = ''
        },
        deleteQuestion(index) {
            this.questions.splice(index,1)
        },
        deleteQuiz(index) {
            this.quizzes.splice(index,1)
        },
        save(){
            let loader = this.$loading.show({
                  // Optional parameters
                  container: null,
                  canCancel: false,
                  onCancel: this.onCancel,
                  color: this.color
                });
            axios.post('/api/employer/interview/create', {vacancy: this.vacancy.id, title:this.vacancy.title,  user_id: this.user_id, questions: this.questions, quizzes: this.quizzes}
                ).then(res => {                    
                    loader.hide()
                    this.$swal('Спасибо!', 'Интервью успешно добавлен!', 'success');
                }).catch(err => {
                    loader.hide()
                    console.log(err)
                    this.$swal('Ошибка', 'Произошла ошибка при добавление интервью' + err, 'error');
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
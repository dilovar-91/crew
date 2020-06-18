<template>

<div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Список</h3>
            <div class="block-options">
                <button type="button" @click="addRow()" class="btn-block-option mr-2">
                    <i class="fa fa-plus mr-1"></i> Добавить ещё кандидата
                </button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                
            </div>
        </div>
        <div class="block-content">
            <div class="table-responsive">
            <table class="table table-striped table-borderless">
                <thead class="border-bottom">
                    <tr>
                        <th style="50px">#</th>
                        <th >Вакансия</th>
                        <th class="text-center">Кандидат</th>
                        <th class="text-center"  >Email</th>
                        <th class="" >Телефон</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(invite, i) in invites" :key="i">
                        <td><i class="fa fa-trash text-danger trash" @click="deleteRow(i)"></i></td>
                        <td>
                        <v-select v-model="invite.vacancy" taggable :options="vacancies" label="title" >
                           <span slot="noResult">Список пуст!</span>
                        </v-select>
                        </td>
                        <td class="text-center">
                           <v-select taggable :clearable="false" v-model="invite.candidate"  :options="candidates" label="name"></v-select>
                        </td>
                        <td class="text-center">                          
                        <input v-model="invite.email" class="form-control" type="email"/>
                        </td>
                        <td class="">
                            <the-mask v-model="invite.phone" class="form-control" :mask="['+# (###) ###-####', '+# (###) ###-####']"  type="tell"/>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
       
            <div class="col-md-4 mb-2"><button class="btn btn-success" @click="sendInvite()">Отправить приглашение</button></div>
        </div>
    </div>
</template>
<script>
export default {
    props: {        
        user_id: Number
    },
    data() {
        return {
            options: [
                "Crewer",
                "Captain",
                "Captain",
                "Drreee",
                "Capfffffffffftain",
            ], 
            vacancies: [],
            candidates: [],
            emails: [],
            phones: [],
            invites: [{
              vacancy:'',
              candidate:'',
              email:'',
              phone:''
          }]
        }
    },
    mounted() {
        axios
        .get('/api/employer/vacancies/14')
        .then(response => (this.vacancies = response.data));
        axios
        .get('/api/employer/candidates')
        .then(response => (this.candidates = response.data));
    },
    methods: {
        addRow() {
            this.invites.push({
              vacancy:'',
              candidate:'',
              email:'',
              phone:''
            })
        },
        deleteRow(index) {
            this.invites.splice(index,1)
        },
        sendInvite(){
            let loader = this.$loading.show({
                  // Optional parameters
                  container: null,
                  canCancel: false,
                  onCancel: this.onCancel,
                  color: this.color
                });
            axios.post('/api/employer/invite/sendinvites', {invites: this.invites}
                ).then(res => {                    
                    loader.hide()
                    this.$swal('Спасибо!', 'Ваши приглашения успешно отправлены!', 'success');
                }).catch(err => {
                    loader.hide()
                    console.log(err)
                    this.$swal('Ошибка', 'Произошла ошибка при отправке приглашений' + err, 'error');  

                });
        }
  }
}
</script>
<style lang="scss" scoped>
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
</style>
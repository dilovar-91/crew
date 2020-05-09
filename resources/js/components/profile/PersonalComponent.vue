<template>
<div class="content content-boxed mt-0">
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">User Profile</h3>
        </div>
        <div class="block-content">
            <form action="/seamen/profile/edit/personal" method="POST" enctype="multipart/form-data" onsubmit="return false;">
                <div class="row push">
                    <div class="col-lg-3">
                        <p class="font-size-sm text-muted">
                            Your account’s vital info. Your username will be publicly visible.
                        </p>
                    </div>
                    <div class="col-lg-9 col-xl-8">
                        <div class="form-group">
                            <label for="one-profile-edit-username" >Surname</label>
                            <input type="text" class="form-control" id="one-profile-edit-username" name="surname" placeholder="Enter your username.." v-model="personalInfo.surname">
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                            <label for="one-profile-edit-name">Name</label>
                            <input type="text" class="form-control" id="one-profile-edit-name" name="first_name"  v-model="personalInfo.first_name">
                            </div>
                            <div class="form-group">
                            <label for="one-profile-edit-name">Other Name</label>
                            <input type="text" class="form-control" id="one-profile-edit-name" name="other_name"  v-model="personalInfo.other_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="exampleFormControlSelect1">Sex:</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                <option>Man </option>
                                <option>Woman</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="one-profile-edit-lastname">Date of birth:</label>
                                <datepicker input-class="form-control" v-model="personalInfo.date_of_birth" format="yyyy-MM-dd"></datepicker>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="exampleFormControlSelect1">Place of birth:</label>
                                 <input type="text" class="form-control" id="one-profile-edit-name" name="other_name"  v-model="personalInfo.place_of_birth">
                            </div>
                            <div class="col-6">
                                <label for="one-profile-edit-lastname">Citizenship</label>
                                <input type="text" class="form-control" id="one-profile-edit-name" name="other_name"  v-model="personalInfo.citizenship">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="exampleFormControlSelect1">Marital status:</label>
                                 <input type="text" class="form-control" id="one-profile-edit-name" name="other_name"  v-model="personalInfo.marital_status">
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="one-profile-edit-lastname">Color of eyes</label>
                                <input type="text" class="form-control" id="one-profile-edit-name" name="other_name"  v-model="personalInfo.colour_of_eyes">
                            </div>
                            <div class="col-6">
                                <label for="exampleFormControlSelect1">Color of hair:</label>
                                 <input type="text" class="form-control" id="one-profile-edit-name" name="other_name"  v-model="personalInfo.colour_of_hair">
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="one-profile-edit-lastname">Height:</label>
                                <input type="text" class="form-control" id="one-profile-edit-name" name="other_name" placeholder="Height" v-model="personalInfo.height">
                            </div>
                            <div class="col-6">
                                <label for="exampleFormControlSelect1">Weight:</label>
                                 <input type="text" class="form-control" id="one-profile-edit-name" name="other_name" placeholder="Weight" v-model="personalInfo.weight">
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="one-profile-edit-lastname">Boilersuit size:</label>
                                <input type="text" class="form-control" id="one-profile-edit-name" name="other_name" placeholder="Height" v-model="personalInfo.boilersuit_size">
                            </div>
                            <div class="col-6">
                                <label for="exampleFormControlSelect1">Boots size:</label>
                                 <input type="text" class="form-control" id="one-profile-edit-name" name="other_name" placeholder="Weight" v-model="personalInfo.boots_size">
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="one-profile-edit-lastname">Language:</label>
                                <input type="text" class="form-control" id="one-profile-edit-name" name="other_name" placeholder="Height" v-model="personalInfo.language">
                            </div>
                            <div class="col-6">
                                <label for="exampleFormControlSelect1">Level:</label>
                                 <input type="text" class="form-control" id="one-profile-edit-name" name="other_name" placeholder="Weight" v-model="personalInfo.level">
                            </div>
                            
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-alt-success" @click="editItem()">
                                Update
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</template>
<script>
import Datepicker from 'vuejs-datepicker';
Vue.use(Datepicker);
export default {
  props: {
    user_id: Number
  },
  components: {
    Datepicker
  },
  data() {
    return {
        personalInfo:{
            surname:'',
            first_name:'',
            other_name:'',
            date_of_birth:'',
            place_of_birth:'',
            sex:'',
            citizenship:'',
            date_of_issue:'',
            marital_status:'',
            colour_of_eyes:'',
            colour_of_hair:'',
            height:'',
            weight:'',
            boilersuit_size:'',
            boots_size:'',
            language:'',
            level:''
        },
        userData: [],
        countries:[] 
    }
  },
  methods: {
    editItem(){
      var data = {
            id:this.personalInfo.id,
            surname:this.personalInfo.surname,
            first_name:this.personalInfo.first_name,
            other_name:this.personalInfo.other_name,
            date_of_birth:this.personalInfo.date_of_birth,
            place_of_birth:this.personalInfo.place_of_birth,
            sex:this.personalInfo.sex,
            citizenship:this.personalInfo.citizenship,
            date_of_issue:this.personalInfo.date_of_issue,
            marital_status:this.personalInfo.marital_status,
            colour_of_eyes:this.personalInfo.colour_of_eyes,
            colour_of_hair:this.personalInfo.colour_of_hair,
            height:this.personalInfo.height,
            weight:this.personalInfo.weight,
            boilersuit_size:this.personalInfo.boilersuit_size,
            boots_size:this.personalInfo.boots_size,
            language:this.personalInfo.language,
            level:this.personalInfo.level
        
      };
      let loader = this.$loading.show({
                  // Optional parameters
                  container: null,
                  canCancel: false,
                  onCancel: this.onCancel,
                  color: this.color
                });
      axios.post('/api/seamen/profile/updatepersonal', {data: data}).then(res => {
                    loader.hide()
                    this.$swal('Success', 'Personal info successfuly updated! ', 'success');
                }).catch(err => {
                    loader.hide()
                    this.$swal('Sorry!', 'Error adding! '+err, 'error');
                });
    }
  },
  mounted() {
    axios.get(`/api/userinfo/`+this.user_id).then(({ data }) => {
        if (data) {
          this.personalInfo = data;
        } else {
          console.log('error loading!!')
        }
      });       

  }
}
</script>
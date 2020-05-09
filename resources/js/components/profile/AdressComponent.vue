<template>
<div class="content content-boxed mt-0">
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">Address and contacts</h3>
        </div>
        <div class="block-content">
            <form action="/seamen/profile/edit/personal" method="POST" enctype="multipart/form-data" onsubmit="return false;">
                <div class="row push">
                    <div class="col-lg-3">
                        <p class="font-size-sm text-muted">
                            Edit your address and contacts.
                        </p>
                    </div>
                    <div class="col-lg-9 col-xl-8">
                        <div class="form-group">
                            <label for="one-profile-edit-username" >Country:</label>
                            <input type="text" class="form-control" id="one-profile-edit-username" v-model="adressInfo.country">
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                            <label for="one-profile-edit-name">City:</label>
                            <input type="text" class="form-control" id="one-profile-edit-name" v-model="adressInfo.city">
                            </div>
                            <div class="form-group">
                            <label for="one-profile-edit-name">Post Code:</label>
                            <input type="text" class="form-control" id="one-profile-edit-name" name="other_name"  v-model="adressInfo.post_code">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                            <label for="one-profile-edit-name">Mobile:</label>
                            <input type="text" class="form-control" id="one-profile-edit-name" v-model="adressInfo.mobile">
                            </div>
                            
                        </div>                        
                        <div class="form-group row">
                            <div class="col-6">
                            <label for="one-profile-edit-name">Email:</label>
                            <input type="text" class="form-control" id="one-profile-edit-name" v-model="adressInfo.email">
                            </div>
                        </div>                        
                        <div class="form-group row">
                            <div class="col-6">
                            <label for="one-profile-edit-name">Skype:</label>
                            <input type="text" class="form-control" id="one-profile-edit-name" v-model="adressInfo.skype">
                            </div>
                        </div>                        
                                          
                        <div class="form-group row">
                            <div class="col-6">
                            <label for="one-profile-edit-name">Next of Kin:</label>
                            <input type="text" class="form-control" id="one-profile-edit-name" v-model="adressInfo.next_of_kin">
                            </div>
                        </div>                        
                        <div class="form-group row">
                            <div class="col-6">
                            <label for="one-profile-edit-name">Kin surname:</label>
                            <input type="text" class="form-control" id="one-profile-edit-name" v-model="adressInfo.kin_surname">
                            </div>
                        </div>                        
                        <div class="form-group row">
                            <div class="col-6">
                            <label for="one-profile-edit-name">Kin address:</label>
                            <input type="text" class="form-control" id="one-profile-edit-name" v-model="adressInfo.kin_adress">
                            </div>
                        </div>                        
                        <div class="form-group row">
                            <div class="col-6">
                            <label for="one-profile-edit-name">Kin mobile:</label>
                            <input type="text" class="form-control" id="one-profile-edit-name" v-model="adressInfo.kin_mobile">
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
        adressInfo:{
            country:'',
            city:'',
            post_code:'',
            mobile:'',            
            email:'',            
            skype:'',           
            next_of_kin:'',           
            kin_surname:'',           
            kin_adress:'',           
            kin_mobile:'',           
        },

    }
  },
  methods: {
    editItem(){
      var data = {
            id:this.adressInfo.id,
            country:this.adressInfo.country,
            city:this.adressInfo.city,
            post_code:this.adressInfo.post_code,
            mobile:this.adressInfo.mobile,
            email:this.adressInfo.email,
            skype:this.adressInfo.skype,
            next_of_kin:this.adressInfo.next_of_kin,
            kin_adress:this.adressInfo.kin_adress,
            kin_surname:this.adressInfo.kin_surname,
            kin_mobile:this.adressInfo.kin_mobile
      };
      let loader = this.$loading.show({
                  // Optional parameters
                  container: null,
                  canCancel: false,
                  onCancel: this.onCancel,
                  color: this.color
                });
      axios.post('/api/seamen/profile/updateaddress', {data: data}).then(res => {
                    loader.hide()
                    this.$swal('Success', 'Address info successfuly updated! ', 'success');
                }).catch(err => {
                    loader.hide()
                    this.$swal('Sorry!', 'Error updating! '+err, 'error');
                });
    }
  },
  mounted() {
    axios.get(`/api/userinfo/`+this.user_id).then(({ data }) => {
        if (data) {
          this.adressInfo = data;
        } else {
          console.log('error loading!!')
        }
      });
  }
}
</script>
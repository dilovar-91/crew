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
                            Your info about the position you want.
                        </p>
                    </div>
                    <div class="col-lg-9 col-xl-8">
                        <div class="form-group">
                            <label for="one-profile-edit-username" >Application for position as:</label>
                            <input type="text" class="form-control" id="one-profile-edit-username" v-model="mainInfo.position_as">
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                            <label for="one-profile-edit-name">Other position (If any):</label>
                            <input type="text" class="form-control" id="one-profile-edit-name" v-model="mainInfo.position_other">
                            </div>
                            <div class="form-group">
                            <label for="one-profile-edit-name">Ready from:</label>
                            <input type="text" class="form-control" id="one-profile-edit-name" name="other_name"  v-model="mainInfo.ready_from">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                            <label for="one-profile-edit-name">Salary:</label>
                            <input type="text" class="form-control" id="one-profile-edit-name" v-model="mainInfo.salary">
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
        mainInfo:{
            position_as:'',
            position_other:'',
            ready_from:'',
            salary:''            
        },
    }
  },
  methods: {
    editItem(){
      var data = {
            id:this.mainInfo.id,
            position_as:this.mainInfo.position_as,
            position_other:this.mainInfo.position_other,
            ready_from:this.mainInfo.ready_from,
            salary:this.mainInfo.salary
        
      };
      let loader = this.$loading.show({
                  // Optional parameters
                  container: null,
                  canCancel: false,
                  onCancel: this.onCancel,
                  color: this.color
                });
      axios.post('/api/seamen/profile/updatemaininfo', {data: data}).then(res => {
                    loader.hide()
                    this.$swal('Success', 'Job position info successfuly updated! ', 'success');
                }).catch(err => {
                    loader.hide()
                    this.$swal('Sorry!', 'Error updating! '+err, 'error');
                });
    }
  },
  mounted() {
    axios.get(`/api/userinfo/`+this.user_id).then(({ data }) => {
        if (data) {
          this.mainInfo = data;
        } else {
          console.log('error loading!!')
        }
      });       

  }
}
</script>
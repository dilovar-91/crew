<template>
<div class="block">
                <div class="block-header">
                    <h3 class="block-title">Education info</h3>
                    <div class="block-options">
                        <div class="block-options-item">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addModal" @click="currentData = ''">Add School</button>
                        </div>
                    </div>
                </div>
                <div class="block-content">
                    <div>
                    <table class="table table-bordered table-vcenter">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">#</th>
                                <th>School Name</th>
                                <th class="d-none d-sm-table-cell" style="width: 15%;">From</th>
                                <th class="d-none d-sm-table-cell" style="width: 15%;">To</th>
                                <th class="text-center" style="width: 100px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                                                        <tr v-for="(item, index) in rowData" :key="item.id">
                                <th class="text-center" scope="row">{{index+1}}</th>
                                <td class="font-w600 font-size-sm">
                                   {{ item.name }}
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="badge badge-info">{{ item.from }}</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="badge badge-primary">{{ item.to }}</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-light js-tooltip-enabled"  title="" data-original-title="Edit Client" @click="currentData = item"  data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </button>
                                        <a class="btn btn-sm btn-light js-tooltip-enabled" href="javascript:;" v-on:click="deleteUser(item.id, index)">
                                            <i class="fa fa-fw fa-times"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                    </table>

                    </div>


                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit school</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="currentData = ''">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">School name:</label>
            <input type="text" class="form-control" id="recipient-name" v-model="currentData.name" >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">From:</label>
            <datepicker input-class="form-control" v-model="currentData.from" name="uniquename" format="yyyy-MM-dd"></datepicker>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">To:</label>
            <datepicker input-class="form-control" v-model="currentData.to" name="uniquename" format="yyyy-MM-dd"></datepicker>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="currentData = ''">Close</button>
        <button type="button" class="btn btn-primary" @click="editItem()"  data-dismiss="modal">Edit</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">New School</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="currentData = ''">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">School name:</label>
            <input type="text" class="form-control" id="recipient-name" v-model="school.name" >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">From:</label>
            <datepicker input-class="form-control" v-model="school.from" name="uniquename" format="yyyy-MM-dd"></datepicker>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">To:</label>
            <datepicker input-class="form-control" v-model="school.to" name="uniquename" format="yyyy-MM-dd"></datepicker>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="currentData = ''">Close</button>
        <button type="button" class="btn btn-primary" @click="addItem()" data-dismiss="modal">Add</button>
      </div>
    </div>
  </div>
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
        school:{
            name:'',
            from:'',
            to:'',
        },
        currentData:{
            id:'',
            name:'',
            from:'',
            to:'',
        },
        rowData:[] 
    }
  },
  computed: {
    
  },
  methods: {
      addItem(){
      var data = {
        name:this.school.name,
        from:this.school.from,
        to:this.school.to,
        user_id: this.user_id
      };
      let loader = this.$loading.show({
                  // Optional parameters
                  container: null,
                  canCancel: false,
                  onCancel: this.onCancel,
                  color: this.color
                });
      axios.post('/api/seamen/profile/addschool', {data: data}).then(res => {
                    loader.hide()
                    this.rowData.push(data)
                    this.school.name = '';
                    this.school.from = '';
                    this.school.to = '';
                }).catch(err => {
                    loader.hide()
                    this.$swal('Sorry!', 'Error adding!', 'error');
                });
    },
    editItem(){
      var data = {
        id:this.currentData.id,
        name:this.currentData.name,
        from:this.currentData.from,
        to:this.currentData.to,
        user_id: this.user_id
        
      };
      let loader = this.$loading.show({
                  // Optional parameters
                  container: null,
                  canCancel: false,
                  onCancel: this.onCancel,
                  color: this.color
                });
      axios.post('/api/seamen/profile/updateschool', {data: data}).then(res => {
                    loader.hide()
                    const currentIndex = this.rowData.findIndex(p => p.id === data.id);
                    this.rowData.splice(currentIndex, 1, data)
                    this.currentData.name = '';
                    this.currentData.from = '';
                    this.currentData.to = '';
                }).catch(err => {
                    loader.hide()
                    this.$swal('Sorry!', 'Error adding! '+err, 'error');
                });
    },

    deleteUser(id, index){

        if(confirm('Are you sure?'))
        axios.delete('/api/seamen/profile/schooldelete/'+id)
          .then(resp => {
          this.rowData.splice(index, 1);
        })
          .catch(error => {
          console.log(error);
        })
    }

    
   
  },
  mounted() {
  
        axios.get(`/api/seamen/profile/schools/`+this.user_id).then(({ data }) => {
        if (data.length) {
          this.rowData.push(...data);
        } else {
          console.log('error loading!!')
        }
      });

  }
}
</script>
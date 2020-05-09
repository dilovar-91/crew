<template>
<div class="block">
                <div class="block-header">
                    <h3 class="block-title">My Sea Services</h3>
                    <div class="block-options">
                        <div class="block-options-item">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addModal" @click="currentData = ''">Add Service</button>
                        </div>
                    </div>
                </div>
                <div class="block-content">
                    <table class="table table-bordered table-vcenter">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">#</th>
                                <th class="d-none d-sm-table-cell">Position</th>
                                <th class="d-none d-sm-table-cell">Vessel Name</th>
                                <th class="d-none d-sm-table-cell">Vessel Type</th>
                                <th class="d-none d-sm-table-cell">Me Type</th>
                                <th class="d-none d-sm-table-cell">From</th>
                                <th class="d-none d-sm-table-cell">Till</th>
                                <th class="d-none d-sm-table-cell">Shipowner</th>                                
                                <th class="d-none d-sm-table-cell">Country</th>                                
                                <th class="text-center" style="width: 100px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           <tr v-for="(item, index) in rowData" :key="item.id">
                                <th class="text-center" scope="row">{{index+1}}</th>
                                <td class="font-w600 font-size-sm">
                                   {{ item.position }}
                                </td>

                                <td class="font-w600 font-size-sm">
                                   {{ item.vessel_name || ''  }}
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="badge badge-info">{{ item.vessel_type }}</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    {{ item.me_type }}
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    {{ item.from }}
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    {{ item.till }}
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    {{ item.shipowner }}
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    {{item.country['name'] || ''}}
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


                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Document</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="currentData = ''">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Position:</label>
            <input type="text" class="form-control" id="recipient-name" v-model="currentData.position" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Vessel Name:</label>
            <input type="text" class="form-control" id="recipient-name" v-model="currentData.vessel_name" >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Vessel Type:</label>
            <input type="text" class="form-control" id="recipient-name" v-model="currentData.vessel_type" >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Me Type:</label>
            <input type="text" class="form-control" id="recipient-name" v-model="currentData.me_type" >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">From:</label>
            <datepicker input-class="form-control" v-model="currentData.from" name="uniquename" format="yyyy-MM-dd"></datepicker>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Till:</label>
            <datepicker input-class="form-control" v-model="currentData.till" name="uniquename" format="yyyy-MM-dd"></datepicker>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Shipowner:</label>
            <input type="text" class="form-control" id="recipient-name" v-model="currentData.shipowner" >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Country:</label>
            <v-select label="name" :options="countries"  v-model="currentData.country"></v-select>
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
        <h5 class="modal-title" id="addModalLabel">New Document</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="currentData = ''">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Position:</label>
            <input type="text" class="form-control" id="recipient-name" v-model="service.position" >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Vessel Name:</label>
            <input type="text" class="form-control" id="recipient-name" v-model="service.vessel_name" >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Vessel Type:</label>
            <input type="text" class="form-control" id="recipient-name" v-model="service.vessel_type" >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Me Type:</label>
            <input type="text" class="form-control" id="recipient-name" v-model="service.me_type" >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">From:</label>
            <datepicker input-class="form-control" v-model="service.from" name="uniquename" format="yyyy-MM-dd"></datepicker>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Till:</label>
            <datepicker input-class="form-control" v-model="service.till" name="uniquename" format="yyyy-MM-dd"></datepicker>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Shipowner:</label>
            <input type="text" class="form-control" id="recipient-name" v-model="service.shipowner" >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Country:</label>
            <v-select label="name" :options="countries" v-model="service.country_id" ></v-select>
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
        service:{
            position:'',
            vessel_name:'',
            vessel_type:'',
            me_type:'',
            from:'',
            till:'',
            shipowner:'',
            country_id:''                    
        },
        currentData:{
            position:'',
            vessel_name:'',
            vessel_type:'',
            me_type:'',
            from:'',
            till:'',
            shipowner:'',
            country_id:'',
            country:''  
        },
        rowData:[],
        countries:[] 
    }
  },
  methods: {
      addItem(){
      var data = {
        id:this.service.id,
        position:this.service.position,
        vessel_name:this.service.vessel_name,
        vessel_type:this.service.vessel_type,
        me_type:this.service.me_type,
        from:this.service.from,
        till:this.service.till,
        shipowner:this.service.shipowner,
        country_id:this.service.country_id['id'],
        user_id: this.user_id
      };
      let loader = this.$loading.show({
                  // Optional parameters
                  container: null,
                  canCancel: false,
                  onCancel: this.onCancel,
                  color: this.color
                });
      axios.post('/api/seamen/profile/addservice', {data: data}).then(res => {
                    loader.hide()
                    this.$swal('Success!', 'Your service added! ', 'success');
                    document.location.reload(true);               
                }).catch(err => {
                    loader.hide()
                    this.$swal('Sorry!', 'Error adding!' +err, 'error');
                });
    },
    editItem(){
      var data = {
        id:this.currentData.id,
        position:this.currentData.position,
        vessel_name:this.currentData.vessel_name,
        vessel_type:this.currentData.vessel_type,
        me_type:this.currentData.me_type,
        from:this.currentData.from,
        till:this.currentData.till,
        shipowner:this.currentData.shipowner,
        country_id:this.currentData.country['id'],
        user_id: this.user_id
        
      };
      let loader = this.$loading.show({
                  // Optional parameters
                  container: null,
                  canCancel: false,
                  onCancel: this.onCancel,
                  color: this.color
                });
      axios.post('/api/seamen/profile/updateservice', {data: data}).then(res => {
                    loader.hide()
                    this.$swal('Success!', 'Service updated! ', 'success');
                    const currentIndex = this.rowData.findIndex(p => p.id === data.id);
                    this.rowData.splice(currentIndex, 1, data)
                    this.currentData.position = '';
                    this.currentData.vessel_name = '';
                    this.currentData.vessel_type = '';
                    this.currentData.me_type = '';
                    this.currentData.from = '';
                    this.currentData.till = '';
                    this.currentData.shipowner = '';
                    this.currentData.country_id = '';  
                }).catch(err => {
                    loader.hide()
                    this.$swal('Sorry!', 'Error adding! '+err, 'error');
                });
    },

    deleteUser(id, index){

        if(confirm('Are you sure?'))
        axios.delete('/api/seamen/profile/servicedelete/'+id)
          .then(resp => {
          this.rowData.splice(index, 1);
        })
          .catch(error => {
          console.log(error);
        })
    }

    
   
  },
  mounted() {
  
        axios.get(`/api/seamen/profile/services/`+this.user_id).then(({ data }) => {
        if (data.length) {
          this.rowData.push(...data);
        } else {
          console.log('error loading!!')
        }
      });
        axios.get(`/api/countries`).then(({ data }) => {
        if (data.length) {
          this.countries.push(...data);
        } else {
          console.log('error loading!!')
        }
      });
  }
}
</script>
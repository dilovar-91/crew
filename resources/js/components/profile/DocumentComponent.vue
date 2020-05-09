<template>
<div class="block">
                <div class="block-header">
                    <h3 class="block-title">My Documents</h3>
                    <div class="block-options">
                        <div class="block-options-item">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addModal" @click="currentData = ''">Add Document</button>
                        </div>
                    </div>
                </div>
                <div class="block-content">
                    <table class="table table-bordered table-vcenter">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">#</th>
                                <th>Title</th>
                                <th class="d-none d-sm-table-cell" >Document type</th>
                                <th class="d-none d-sm-table-cell" >Document No</th>
                                <th class="d-none d-sm-table-cell" >Date of issue</th>
                                <th class="d-none d-sm-table-cell" >Country of issue</th>
                                <th class="d-none d-sm-table-cell" >Valid up</th>
                                <th class="text-center" style="width: 100px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           <tr v-for="(item, index) in rowData" :key="item.id">
                                <th class="text-center" scope="row">{{index+1}}</th>
                                <td class="font-w600 font-size-sm">
                                   {{ item.title }}
                                </td>
                                <td class="font-w600 font-size-sm">
                                   {{ item.doctype['type'] || ''  }}
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="badge badge-info">{{ item.number }}</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="badge badge-primary">{{ item.date_of_issue }}</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    {{item.country['name'] || ''}}
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    {{item.valid_untill}}
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
            <label for="recipient-name" class="col-form-label">Title:</label>
            <input type="text" class="form-control" id="recipient-name" v-model="currentData.title" >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Doc. Type:</label>
            <v-select label="type" :options="doctypes" v-model="currentData.doctype"></v-select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Doc. No.:</label>
            <input type="text" class="form-control" id="recipient-name" v-model="currentData.number" >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Date of issue.:</label>
            <datepicker input-class="form-control" v-model="currentData.date_of_issue" name="uniquename" format="yyyy-MM-dd"></datepicker>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Country:</label>
            <v-select label="name" :options="countries"  v-model="currentData.country"></v-select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Valid Untill:</label>
            <datepicker input-class="form-control" v-model="currentData.valid_untill" name="uniquename" format="yyyy-MM-dd"></datepicker>
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
            <label for="recipient-name" class="col-form-label">Title:</label>
            <input type="text" class="form-control" id="recipient-name" v-model="document.title" >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Doc. Type:</label>
            <v-select label="type" :options="doctypes" v-model="document.doctype_id" ></v-select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Doc. No.:</label>
            <input type="text" class="form-control" id="recipient-name" v-model="document.number" >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Date of issue.:</label>
            <datepicker input-class="form-control" v-model="document.date_of_issue" name="uniquename" format="yyyy-MM-dd"></datepicker>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Country:</label>
            <v-select label="name" :options="countries" v-model="document.country_id" ></v-select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Valid Untill:</label>
            <datepicker input-class="form-control" v-model="document.valid_untill" name="uniquename" format="yyyy-MM-dd"></datepicker>
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
        document:{
            title:'',
            doctype_id:'',
            doctype:'',
            number:'',
            date_of_issue:'',
            user_id:'',
            country_id:'',
            country:'',
            valid_untill:'',
        },
        currentData:{
            title:'',
            doctype_id:'',
            number:'',
            date_of_issue:'',
            user_id:'',
            country_id:'',
            valid_untill:'',
        },
        rowData:[],
        doctypes:[],
        countries:[] 
    }
  },
  computed: {
    
  },
  methods: {
      addItem(){
      var data = {
        title:this.document.title,
        doctype_id:this.document.doctype_id['id'],
        number:this.document.number,
        date_of_issue:this.document.date_of_issue,
        country_id:this.document.country_id['id'],
        valid_untill:this.document.valid_untill,
        user_id: this.user_id
      };
      let loader = this.$loading.show({
                  // Optional parameters
                  container: null,
                  canCancel: false,
                  onCancel: this.onCancel,
                  color: this.color
                });
      axios.post('/api/seamen/profile/documentadd', {data: data}).then(res => {
                    loader.hide()
                    this.rowData.push(data)
                    this.document.title = '';
                    this.document.doctype_id = '';
                    this.document.number = '';
                    this.document.date_of_issue = '';
                    this.document.country_id = '';
                    this.document.valid_untill = ''
                }).catch(err => {
                    loader.hide()
                    this.$swal('Sorry!', 'Error adding!' +err, 'error');
                });
    },
    editItem(){
      var data = {
        title:this.currentData.title,
        doctype_id:this.currentData.doctype['id'],
        number:this.currentData.number,
        date_of_issue:this.currentData.date_of_issue,
        country_id:this.currentData.country['id'],
        valid_untill:this.currentData.valid_untill,
        user_id: this.user_id,
        id: this.currentData.id
        
      };
      let loader = this.$loading.show({
                  // Optional parameters
                  container: null,
                  canCancel: false,
                  onCancel: this.onCancel,
                  color: this.color
                });
      axios.post('/api/seamen/profile/updatedocument', {data: data}).then(res => {
                    loader.hide()
                    const currentIndex = this.rowData.findIndex(p => p.id === data.id);
                    this.rowData.splice(currentIndex, 1, data)
                    this.currentData.title = '';
                    this.currentData.doctype = '';
                    this.currentData.number = '';
                    this.currentData.date_of_issue = '';
                    this.currentData.country = '';
                    this.currentData.valid_untill = ''
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
  
        axios.get(`/api/seamen/profile/documents/`+this.user_id).then(({ data }) => {
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
        axios.get(`/api/doctypes`).then(({ data }) => {
        if (data.length) {
          this.doctypes.push(...data);
        } else {
          console.log('error loading!!')
        }
      });

  }
}
</script>
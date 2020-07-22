<template>
  <b-container>      
    <h3 class="text-unsa mt-3">Incidencias</h3>
    <hr class="bg-secondary">  
    <b-row>
      <b-col sm="12" md="4" lg="4" class="my-1">
        <b-form-group
          label="Registros por página: "
          label-cols-sm="6"          
          label-align-sm="right"
          label-size="sm"
          label-for="perPageSelect"
          class="mb-0"
        >
          <b-form-select
            v-model="perPage"
            id="perPageSelect"
            size="sm"
            :options="pageOptions"
          ></b-form-select>
        </b-form-group>
      </b-col>
      <b-col sm="12" offset-md="3" md="5" lg="5" class="my-1">
        <b-form-group
          label="Buscar: "
          label-cols-sm="3"
          label-align-sm="right"
          label-size="sm"
          label-for="filterInput"
          class="mb-0"
        >
          <b-input-group size="sm">
            <b-form-input
              v-model="filter"
              type="search"
              id="filterInput"
              placeholder="Escriba el texto a buscar..."
            ></b-form-input>
            <b-input-group-append>
              <b-button :disabled="!filter" @click="filter = ''">Limpiar</b-button>
            </b-input-group-append>
          </b-input-group>
        </b-form-group>
      </b-col>               
    </b-row>
    
    <!-- Main table element -->
    <b-table
      show-empty
      striped 
      hover 
      bordered 
      small
      responsive
      stacked="md"
      :items="arrayErrors"
      :fields="fields"
      :current-page="currentPage"
      :per-page="perPage"
      :filter="filter"
      :filterIncludedFields="filterOn"
      :sort-by.sync="sortBy"
      :sort-desc.sync="sortDesc"
      :sort-direction="sortDirection"
      @filtered="onFiltered"
      empty-text="No hay registros para mostrar"
    >    
      <!--<template v-slot:cell(actions)="row">
        <b-button variant="warning" size="sm" @click="showError(row.item.id)" title="Ver documento">
          <i class="fa fa-eye"></i>
        </b-button>
      </template>-->    
    </b-table>
    <b-row>
      <b-col offset-md="8" md="4" class="my-1">
        <b-pagination
          v-model="currentPage"
          :total-rows="totalRows"
          :per-page="perPage"
          align="fill"
          size="sm"
          class="my-0"
        ></b-pagination>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
  export default {
    props : ['ruta'],
    data() {
      return {
        arrayErrors: [],        
        fields: [
          { key: 'id', label: 'ID', sortable: true, class: 'text-center' },          
          { key: 'description', label: 'Descripción', sortable: true },          
          { key: 'actions', label: 'Acción', class: 'text-center' },
        ],
        totalRows: 1,
        currentPage: 1,
        perPage: 5,
        pageOptions: [5, 10, 15],
        sortBy: '',
        sortDesc: false,
        sortDirection: 'asc',
        filter: null,
        filterOn: [],        
      }
    },        
    methods: {              
        listErrors() {
            let me = this
            /*this.$vs.loading({
                type: 'material',
            })*/  

            axios.get(`${this.ruta}/error`).then(function (response) {
              //me.$vs.loading.close()
              me.arrayErrors = response.data;
              me.totalRows = me.arrayErrors.length;                            
            })
            .catch(function (error) {
              console.log(error);
            });
        },    
        onFiltered(filteredItems) {
            // Trigger pagination to update the number of buttons/pages due to filtering
            this.totalRows = filteredItems.length
            this.currentPage = 1
        },  
        /*showDocument(id) {
          window.open(`${this.ruta}/user/documents/show/${id}`, '_blank');          
        } */ 
    },
    mounted() {     
      this.listErrors();      
    },
  }
</script>

<style scoped>
    .container {
        background-color: #fff;
    }    
    .btn-unsa {
        background-color: rgb(100, 0, 29);
        color: #fff;
    }
    .text-unsa {
        color: rgb(100, 0, 29);        
    }
</style>
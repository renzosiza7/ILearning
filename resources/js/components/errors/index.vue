<template>
  <div>
    <div class="row mt-3">
      <div class="col-lg-6">
          <h3 class="text-dark">Incidencias</h3>
      </div>
      <div class="col-lg-6">
          <button class="btn btn-success float-right" @click="create">
                <i class="fa fa-plus"></i>&nbsp;Nueva Incidencia
          </button>
      </div>
    </div>
    <hr class="bg-light">  
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
      :items="errors"
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
      <template v-slot:cell(actions)="row">
        <b-button variant="warning" size="sm" @click="edit(row.item)" title="Editar">
          <b-icon icon="pencil-square"></b-icon>
        </b-button>
        <b-button variant="info" size="sm" @click="show(row.item)" title="Ver soluciones">
          <b-icon icon="card-checklist"></b-icon>
        </b-button>
      </template>
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
  </div> 
</template>

<script>
  export default {    
    data() {
      return {
        url: this.$root.url,
        errors: [],        
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
        index() {
          let me = this
          this.$vs.loading({ type: 'material'})

          axios.get(`${this.url}/errors`).then(function (response) {              
            me.$vs.loading.close()
            me.errors = response.data;
            me.totalRows = me.errors.length;                            
          })
          .catch(function (error) {
            me.$vs.loading.close()
            console.log(error)
          });
        },    
        create() {
          this.$router.push({name: 'errors.create'});
        },        
        edit(error) {
          console.log(error)
          this.$router.push({name: 'errors.edit', params: { incidencia: error } });
        },
        show(error) {
          this.$router.push({name: 'solutions.index', params: { error: error } });
        },        
        onFiltered(filteredItems) {            
          this.totalRows = filteredItems.length
          this.currentPage = 1
        }       
    },
    mounted() {     
      this.index();      
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
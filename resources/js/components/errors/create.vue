<template>
  <div>
    <h4 class="text-center">Nueva incidencia</h4>
    <div class="alert alert-danger" v-if="errors.length > 0">
      <ul>
        <li v-for="(error, index) in errors" :key="index">
          {{ error }}
        </li>
      </ul>
    </div>
    <b-form @submit.prevent="store">
      <b-form-group
        id="input-group-1"
        label="Descripción:"
        label-for="input-1"        
      >
        <b-form-input
          id="input-1"          
          type="text"
          v-model="description"          
          placeholder="Ingrese el nombre de una incidencia"
        ></b-form-input>        
      </b-form-group>      
      <b-button type="submit" variant="success">Guardar</b-button>      
    </b-form>
  </div>
</template>
<script>

export default {
    name: 'errors.create',     
    data() {
      return {              
        url: this.$root.url,                      
        description : null,
        errors : []     
      }
    },
    methods: {  
      store() {
        let me = this 
        this.errors = []
              
        axios.post(`${this.url}/errors/store`, 
          {
            description: this.description
          }
        ).then(function(response) {        
          me.$root.mostrarNotificacion('Éxito!', 'success', 3000, 'done', 'Incidencia agregada correctamente.', 'bottom-right')          
          me.$router.push({name: 'errors.index'})
        }).catch(function (error) {
          console.log(error);
          
          if (error.response.status == 422) {
            me.errors = Object.values(error.response.data.errors)
            me.errors = me.errors[0]
          }
          else {
            me.$root.mostrarNotificacion('Error!', 'danger', 3000, 'error_outline', 'No se pudo agregar la Incidencia.', 'bottom-right')
          }             
        });
      },            
    },         
}
</script>
<style scoped>
  .error {
    color: red;
  }
</style>
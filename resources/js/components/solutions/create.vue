<template>
  <div>
    <h4 class="text-center">Nueva solución</h4>
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
          placeholder="Ingrese descripción"
        ></b-form-input>        
      </b-form-group>      
      <b-button type="submit" variant="success">Guardar</b-button>      
    </b-form>
  </div>
</template>
<script>

export default {
    name: 'solutions.create', 
    props : {
      error: Object
    },
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
              
        axios.post(`${this.url}/solutions/store`, 
          {
            error_id: this.error.id,
            description: this.description
          }
        ).then(function(response) {        
          me.$root.mostrarNotificacion('Éxito!', 'success', 3000, 'done', 'Solución agregada correctamente.', 'bottom-right')
          me.description = null
          me.$router.push({name: 'solutions.index', params: { error: me.error } })
        }).catch(function (error) {
          console.log(error);
          
          if (error.response.status == 422) {
            me.errors = Object.values(error.response.data.errors)
            me.errors =  [].concat.apply([],me.errors)
          }
          else {
            me.$root.mostrarNotificacion('Error!', 'danger', 3000, 'error_outline', 'No se pudo agregar la Solución.', 'bottom-right')
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
<template>
  <div>
    <h4 class="text-center">Actualizar incidencia</h4>
    <div class="alert alert-danger" v-if="errors.length > 0">
      <ul>
        <li v-for="(error, index) in errors" :key="index">
          {{ error }}
        </li>
      </ul>
    </div>
    <b-form @submit.prevent="update">
      <b-form-group
        id="input-group-1"
        label="Descripción:"
        label-for="input-1"        
      >
        <b-form-input
          id="input-1"          
          type="text"
          v-model="incidencia.description"          
          placeholder="Ingrese descripción"
        ></b-form-input>        
      </b-form-group>      
      <b-button type="submit" variant="success">Guardar</b-button>      
    </b-form>
  </div>
</template>
<script>

export default {
    name: 'errors.edit',     
    props : {
        incidencia: Object
    },
    data() {
      return {              
        url: this.$root.url,                      
        errors : []     
      }
    },    
    methods: {          
        update() {
            let me = this 
            this.errors = []
                
            axios.put(`${this.url}/errors/update/${this.incidencia.id}`, 
                {
                    description: this.incidencia.description
                }
            ).then(function(response) {        
                me.$root.mostrarNotificacion('Éxito!', 'success', 3000, 'done', 'Incidencia actualizada correctamente.', 'bottom-right')            
                me.$router.push({name: 'errors.index'})
            }).catch(function (error) {
                console.log(error);
                
                if (error.response.status == 422) {
                    me.errors = Object.values(error.response.data.errors)
                    me.errors = me.errors[0]
                }
                else {
                    me.$root.mostrarNotificacion('Error!', 'danger', 3000, 'error_outline', 'No se pudo actualizar la Incidencia.', 'bottom-right')
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
<template>
  <div>
    <h3>Nueva incidencia</h3>
    <b-form @submit.prevent="saveError">
      <b-form-group
        id="input-group-1"
        label="Nombre:"
        label-for="input-1"        
      >
        <b-form-input
          id="input-1"          
          type="text"
          v-model="description"
          required
          placeholder="Ingrese el nombre de una categoría"
        ></b-form-input>
      </b-form-group>      
      <b-button type="submit" variant="success">Guardar</b-button>      
    </b-form>
  </div>
</template>
<script>

export default {
    name: 'create-error', 
    props : ['ruta'],
    data() {
        return {                                    
            description : null        
        }
    },
    methods: {  
        saveError() {
            let me = this       

            axios.post(`${this.ruta}/error/save`, 
                {
                    description: this.description
                }
            ).then(function(response) {                            
                me.description = null
                me.$router.push({name: 'error'});                 
            })
        },            
    },         
}
</script>

<style>



</style>

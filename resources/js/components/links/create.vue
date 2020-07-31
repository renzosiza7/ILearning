<template>
  <div>
    <h4 class="text-center">Nuevo link</h4>
    <div class="alert alert-danger" v-if="errors.length > 0">
      <ul>
        <li v-for="(error, index) in errors" :key="index">
          {{ error }}
        </li>
      </ul>
    </div>
    <b-form @submit.prevent="store">
      <b-form-group
        id="input-group-0"
        label="URL:"
        label-for="input-0"        
      >
        <b-form-input
          id="input-0"          
          type="text"
          v-model="link.url"          
          placeholder="Ingrese url"
        ></b-form-input>        
      </b-form-group>
      <b-form-group
        id="input-group-1"
        label="Descripción:"
        label-for="input-1"        
      >
        <b-form-input
          id="input-1"          
          type="text"
          v-model="link.description"          
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
      solution: Object
    },
    data() {
      return {        
        url: this.$root.url,      
        link: {
          url: null,                      
          description : null,
        },        
        errors : []     
      }
    },
    methods: {  
      store() {
        let me = this 
        this.errors = []
              
        axios.post(`${this.url}/links/store`, 
          {
            solution_id: this.solution.id,
            url: this.link.url,
            description: this.link.description
          }
        ).then(function(response) {        
          me.$root.mostrarNotificacion('Éxito!', 'success', 3000, 'done', 'Link agregado correctamente.', 'bottom-right')
          me.link.url = null
          me.link.description = null
          me.$router.push({name: 'links.index', params: { solution: me.solution } })
        }).catch(function (error) {
          console.log(error);
          
          if (error.response.status == 422) {
            me.errors = Object.values(error.response.data.errors)
            me.errors =  [].concat.apply([],me.errors)
          }
          else {
            me.$root.mostrarNotificacion('Error!', 'danger', 3000, 'error_outline', 'No se pudo agregar el link.', 'bottom-right')
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
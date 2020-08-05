<template>
  <div>
    <h4 class="text-center">Actualizar link</h4>
    <div class="alert alert-danger" v-if="errors.length > 0">
      <ul>
        <li v-for="(error, index) in errors" :key="index">
          {{ error }}
        </li>
      </ul>
    </div>
    <b-form @submit.prevent="update">
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
    name: 'links.edit',     
    props : {
        link: Object,
        solution: Object,
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
                
            axios.put(`${this.url}/links/update/${this.link.id}`, 
                {
                    url: this.link.url,
                    description: this.link.description
                }
            ).then(function(response) {        
                me.$root.mostrarNotificacion('Éxito!', 'success', 3000, 'done', 'Link actualizada correctamente.', 'bottom-right')            
                me.$router.push({name: 'links.index', params: { solution: me.solution }})
            }).catch(function (error) {
                console.log(error);
                
                if (error.response.status == 422) {
                    me.errors = Object.values(error.response.data.errors)
                    me.errors = me.errors[0]
                }
                else {
                    me.$root.mostrarNotificacion('Error!', 'danger', 3000, 'error_outline', 'No se pudo actualizar el Link.', 'bottom-right')
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
<template>
    <div class="row">
        <div class="col-12">
            <center><div class="card text-bg-light mb-3" style="max-width: 35rem; background-color: #67DECD;">
                <div class="card-header"><h4>Editar Estudiante</h4></div>
                <div class="card-body">
                    <form @submit.prevent="actualizar">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <br>
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" v-model="estudiante.nombre" placeholder="Ingrese su nombre" required>
                                </div>
                                <br>

                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Descripcion</label>
                                    <input type="text" class="form-control" v-model="estudiante.descripcion" placeholder="Ingrese su Descripcion" required>
                                </div>
                                <br>

                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Clave</label>
                                    <input type="text" class="form-control" v-model="estudiante.clave" placeholder="Ingrese su Clave" required>
                                    <br>

                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Edad</label>
                                    <input type="text" class="form-control" v-model="estudiante.edad" placeholder="Ingrese su edad" required>
                                    <br>

                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>grado</label>
                                    <input type="text" class="form-control" v-model="estudiante.grado" placeholder="Ingrese su grado" required>
                                    <br>

                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </center></div>
    </div>
</template>

<script>
export default {
    name:"editar-estudiante",
    data(){
        return {
            estudiante:{
                nombre:"",
                descripcion:"",
                clave:"",
                edad:"",
                grado:""

            }
        }
    },
    mounted(){
        this.mostrarEstudiante()
    },
    methods:{
        async mostrarEstudiante(){
            await this.axios.get(`/api/estudiante/${this.$route.params.id}`).then(response=>{
                const { nombre, descripcion, clave, edad, grado } = response.data
                this.estudiante.nombre = nombre
                this.estudiante.descripcion = descripcion
                this.estudiante.clave = clave
                this.estudiante.edad = edad
                this.estudiante.grado = grado

            }).catch(error=>{
                console.log(error)
            })
        },
        async actualizar(){
            await this.axios.put(`/api/estudiante/${this.$route.params.id}`,this.estudiante).then(response=>{
                this.$router.push({name:"mostrarEstudiantes"})
                alert('registro editado con exito.')

            }).catch(error=>{
                console.log(error)
            })
        }

}
}
</script>

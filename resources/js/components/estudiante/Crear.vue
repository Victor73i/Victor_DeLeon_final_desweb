<template>
    <div class="row">
        <div class="col-12">
           <center><div class="card text-bg-light mb-3" style="max-width: 35rem; background-color: #67DECD;"  >
                <div class="card-header"><h4>Nuevo Estudiante</h4></div>
                <div class="card-body">
                    <form @submit.prevent="crear">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <br>
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" v-model="estudiante.nombre" placeholder="Ingrese su Nombre" required>
                                </div>


                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Descripcion</label>
                                    <input type="text" class="form-control" v-model="estudiante.descripcion" placeholder="Ingrese su Descripcion" required>
                                </div>


                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Clave</label>
                                    <input type="number" class="form-control" v-model="estudiante.clave" placeholder="Ingrese su Clave" required>
                                    <br>

                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Edad</label>
                                    <input type="number" class="form-control" v-model="estudiante.edad" placeholder="Ingrese su Edad" required>
                                    <br>

                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>grado</label>
                                    <input type="text" class="form-control" v-model="estudiante.grado" placeholder="Ingrese su Grado" required>
                                    <br>

                                </div>
                            </div>
                            <br>
                            <br>
                            <div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Guardar</button>    <router-link :to='{name:"mostrarEstudiantes"}' class="btn btn-warning">Lista</router-link>

                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
           </center>
        </div>
    </div>

</template>

<script>
export default {
    name:"crear-estudiante",
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
    methods:{
        async crear(){
            await this.axios.post('/api/estudiante',this.estudiante).then(response=>{
                this.$router.push({name:"mostrarEstudiantes"})
                alert('registro creado con exito.')

            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>

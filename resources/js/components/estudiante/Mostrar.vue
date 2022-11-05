<template>

    <div class="row">
        <br>
        <br>
        <br>
        <br>
        <div class="col-12 mb-2">
            <router-link :to='{name:"crearEstudiante"}' class="btn btn-outline-secondary"><i class="fa fa-book  fa-2x">Nuevo Estudiante</i></router-link>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="col-12"  >
            <div class="table-responsive"  >
                <table class="table table-bordered border-dark" style="background-color: #F3F0E7; ">
                    <thead class="bg-dark text-white" STYLE="background-color: #67DECD;">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Decripcion</th>
                        <th>Clave</th>
                        <th>Edad</th>
                        <th>Grado</th>
                        <th>CREATED_AT</th>
                        <th>UPDATED_AT</th>
                        <th>ACTIONS</th>


                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="estudiante in estudiantes" :key="estudiante.id">
                        <td>{{ estudiante.id }}</td>
                        <td>{{ estudiante.nombre }}</td>
                        <td>{{ estudiante.descripcion }}</td>
                        <td>{{ estudiante.clave }}
                        <td>{{ estudiante.edad }}
                        <td>{{ estudiante.grado }}

                        <td>{{ estudiante.created_at }}</td>
                        <td>{{ estudiante.updated_at }}</td>


                        <td>
                            <router-link :to='{name:"editarEstudiante",params:{id:estudiante.id}}' class="btn btn-outline-warning"><i class="fa fa-cog fa-spin fa-2x fa-fw"></i></router-link>
                            <a type="button" @click="borrarEstudiante(estudiante.id)" class="btn btn-outline-danger"><i class="fas fa-trash fa-2x"></i></a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"estudiantes",
    data(){
        return {
            estudiantes:[]
        }
    },
    mounted(){
        this.mostrarEstudiantes()
    },
    methods:{
        async mostrarEstudiantes(){
            await this.axios.get('/api/estudiante').then(response=>{
                this.estudiantes = response.data
            }).catch(error=>{
                console.log(error)
                this.estudiantes = []
            })
        },
        borrarEstudiante(id){
            if(confirm("¿Confirma eliminar el registro?")){
                this.axios.delete(`/api/estudiante/${id}`).then(response=>{
                    this.mostrarEstudiantes()
                    alert('registro eliminado con exito.')

                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>

<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br>
                <div class="card">
                    <div class="card-header">Form Investasi</div>

                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="email">Jenis Kelamin:</label>
                                <label class="radio-inline"><input v-model="data.jenkel" value="1" type="radio" name="optradio1" :checked="data.jenkel == 1 ? true : false">Pria</label>
                                <label class="radio-inline"><input v-model="data.jenkel" value="2" type="radio" name="optradio1" :checked="data.jenkel == 2 ? true: false">Wanita</label>
                            </div>
                            <div class="form-group">
                                <label for="email">Usia:</label>
                                <input v-model="data.usia" type="number" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="email">Peroko:</label>
                                <label class="radio-inline"><input v-model="data.peroko" value="1" type="radio" name="optradio" :checked="data.peroko == 1 ? true : false">Ya</label>
                                <label class="radio-inline"><input v-model="data.peroko" value="2" type="radio" name="optradio" :checked="data.peroko == 2 ? true : false">Tidak</label>
                            </div>
                            <div class="form-group">
                              <label for="pwd">Nominal:</label>
                              <input v-model="data.nominal" type="number" class="form-control" id="pwd1">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Lama Investasi:</label>
                                <input v-model="data.lama_invest" type="number" class="form-control" id="pwd">
                              </div>
                            <button type="button" class="btn btn-primary" @click="submitInvest()">Submit</button>
                          </form>
                    </div>
                </div>
                <pre>
                    {{ result }}
                </pre>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                data: {
                    jenkel: 1,
                    usia: '',
                    peroko: 1,
                    nominal: '',
                    lama_invest:''
                },
                result: ''
            }
        },
        methods:{
            submitInvest(){
                axios.post('/api/invest', this.data).then(response => {
                    let result = {
                        "status": response.data.status,
                        "message": response.data.message,
                        "data": response.data.data
                    }
                    this.result = result
                })
            }
        }
    }
</script>

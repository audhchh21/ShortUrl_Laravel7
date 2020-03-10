<template>
    <div class="row">
        <div class="col-12 col-xl-12 mb-3">
            <div class="form-row">
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg border border-secondary rounded-0 p-5"
                        placeholder="https://" v-model="link"
                        pattern="(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})"
                        required>
                    <div class="input-group-append">
                        <button class="btn btn-lg btn-outline-secondary rounded-0 px-5" type="button" title="Click"
                            v-on:click="addShorturl">
                            <i class="icofont-hand-drag1 icofont-2x"></i>Click
                        </button>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col px-0">
                    <input type="password" class="form-control form-control-sm border border-secondary rounded-0 p-4"
                        placeholder="Password Url" v-model="password">
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-12 mt-5 mb-3" v-if="status">
            <div class="row">

                <div class="col-4 text-center px-5">
                    <qrcode-vue :size="qrcode.size" :level="qrcode.level" :renderAs="qrcode.renderas" :value="url">
                    </qrcode-vue>
                </div>
                <div class="col-8">
                    <div class="text-right">
                        <button type="button" class="btn bg-transparent p-0"><i
                                class="icofont-close-squared-alt icofont-2x text-danger" title="Close"></i></button>
                    </div>
                    <div class="card border border-secondary rounded-0">
                        <div class="card-body">
                            <div class="input-group">
                                <input type="text" class="form-control border border-secondary rounded-0" :value="url"
                                    placeholder="" readonly>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary rounded-0" type="button" id="button-addon2"
                                        title="Copy">
                                        <i class="icofont-copy"></i>Copy
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-muted text-right py-1">
                            <small>created : </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import QrcodeVue from 'qrcode.vue'
    export default {
        components: {
            QrcodeVue,
        },
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                link: '',
                password: '',
                status: false,
                url: '',
                qrcode: {
                    size: '250',
                    level: 'M',
                    renderas: 'svg',
                },
            }
        },
        mounted() {
            console.log('Start......')
        },
        methods: {
            addShorturl() {
                axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
                axios.post('http://localhost:8000/api/v1/shorturl/create', {
                        link: this.link,
                        password: this.password
                    })
                    .then((res) => {
                        console.log(res)
                        if (res.data.status == 'success') {
                            console.log(res.data)
                            let code = res.data.data.shortCode
                            this.status = true
                            this.url = 'http://127.0.0.1:8000/' + code
                            this.link = ''
                            this.password = ''
                        } else if (res.data.status == 'error') {
                            console.log(res.data)
                            this.status = false
                        }
                    })
                    .catch((err) => {
                        console.log(err)
                        this.status = false
                    })
            }
        },
    }

</script>

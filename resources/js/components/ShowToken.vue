<template>
    <div>
        <div class="row justify-content-center" v-if="!access_token">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Get Token</div>

                    <div class="card-body">
                        <div class="form-group row mb-0">
                            <div class="col-md-6 ">
                                <button type="button" @click.prevent="getToken(1)" class="btn btn-primary">
                                GET TOKEN
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <send-message v-else :token="access_token" :subaddress="subaddress"></send-message>
    </div>
</template>

<script>
    // console.log(process.config.MIX_APP_ID);
    import SendMessage from './SendMessage.vue';

    export default {

        data() {
            return {
                apiurl: 'https://developer.globelabs.com.ph/dialog/oauth/',
                app_id:  process.env.MIX_APP_ID,
                app_secret: process.env.MIX_APP_SECRET,
                short_code: process.env.MIX_SHORT_CODE,
                code: '',
                access_token: '',
                subaddress: '',

            }
        },
        components:{
            'send-message' : SendMessage,
        },
        created() {
            var url_string = window.location.href; //window.location.href
            var url = new URL(url_string);
            this.code = url.searchParams.get("code");
        },
        methods: {
            getToken(e, data){
                switch (e) {
                    case 1:
                        this.callAxios('post', '/api/gettoken', {
                            app_id: this.app_id,
                            app_secret: this.app_secret,
                            code: this.code,
                        }, 2);
                        break;
                    case 2:
                        this.access_token = data.data.access_token;
                        this.subaddress = data.data.subscriber_number;

                        break;

                    default:
                        break;
                }
            },
            callAxios(http, url, data, e){
                let $this = this;

                const config = {
                    headers: {
                        'Access-Control-Allow-Origin': '*',
                        'Content-Type': 'application/json',
                        'content-type': 'multipart/form-data',
                    }
                }
                axios({method: http,url: url,data: data, config})
                    .then(function (response) {
                        switch (e) {
                            case 1:
                                $this.sendSMS(2, response)
                            break;
                            case 2:
                                $this.getToken(2, response)
                            break;
                            default:
                                break;
                        }
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    });
            },
        },
    }
</script>

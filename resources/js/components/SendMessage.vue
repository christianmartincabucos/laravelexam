<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Send Message</div>

                <div class="card-body">
                    <form>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Message</label>

                            <div class="col-md-6">
                                <textarea id="message" type="text" class="form-control" name="message" v-model="message" required autocomplete="message" autofocus></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Phone Number +63</label>

                            <div class="col-md-6">
                                <input id="address" type="number" class="form-control " name="address" v-model="address" readonly required autocomplete="address" autofocus>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" @click.prevent="sendSMS(1)" class="btn btn-primary">
                                    SEND Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['token','subaddress'],
        data() {
            return {
                apiurl: 'https://developer.globelabs.com.ph/dialog/oauth/',
                short_code: process.env.MIX_SHORT_CODE.substr(process.env.MIX_SHORT_CODE.length - 4),
                access_token: this.token,
                message: '',
                address: this.subaddress,

            }
        },
        created() {
            
        },
        methods: {
            sendSMS(e, data){
                switch (e) {
                    case 1:
                        if(this.message == ''){
                           return alert('message is required');
                        }
                        this.callAxios('post', '/api/sendmessage', {
                            message: this.message,
                            address: this.address,
                            sender_address: this.short_code,
                            access_token: this.access_token
                        }, 1);
                        break;
                    case 2:
                        console.log(data);
                        if(data.status == 200){
                            alert('Successfully send');
                            this.message = '';
                        }

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
                /* 
                ender_address": 5390,
                "message": "ttest again now",
                address: 9773462583,
                access_token: "1TlQ3EF_0vtIVxMVEJ0cXYkwuZOLME6znsRoWYPjVvE"
                */
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

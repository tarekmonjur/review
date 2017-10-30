/**
 * Created by Tarek on 5/23/2017.
 */

$(document).ready(function () {
    if($('#auth').length > 0) {

        new Vue({
            el:'#auth',

            data:{
                base_url: window.base_url,
                checkCondition: false,
                formData:null,
                submitDisable:false,
                errors:[]
            },

            created(){

            },

            methods:{

                login(form_id,login){
                    this.formData = $('#'+form_id).serialize();
                    if(login){
                        this.$common.loadingShow(0);
                        this.submitDisable = true;
                        this.formData += '&login=login';
                    }

                    axios.post(this.base_url+'login',this.formData).then(response => {
                        this.$common.loadingHide(0);
                    this.errors = [];
                    this.submitDisable = false;
                    if(response.data){
                        this.$common.showMessage(response.data);
                        setTimeout(function(){window.location.href = this.base_url+'reviews';},500)
                    }
                }).catch(error => {
                        this.$common.loadingHide(0);
                    this.errors = [];
                    this.submitDisable = true;
                    if(error.response.status == 500 && error.response.data.code == 500){
                        var error = error.response.data;
                        this.$common.showMessage(error);
                    }else if(error.response.status == 422){
                        this.errors = error.response.data.errors;
                    }
                });
                },


                passwordResetEmail(form_id,reset){
                    this.formData = $('#'+form_id).serialize();
                    if(reset){
                        this.$common.loadingShow(0);
                        this.submitDisable = true;
                        this.formData += '&reset=reset';
                    }
                    // document.getElementById("password_reset_form").reset();
                    // $('#'+form_id)[0].reset();

                    axios.post(this.base_url+'password/email',this.formData).then(response => {
                        this.$common.loadingHide(0);
                    this.errors = [];
                    this.submitDisable = false;
                    if(response.data){
                        this.$common.showMessage(response.data);
                        this.submitDisable = true;
                        setTimeout(function(){window.location.href = this.base_url+'login';},1000)
                    }
                }).catch(error => {
                        this.$common.loadingHide(0);
                    this.errors = [];
                    this.submitDisable = true;
                    if(error.response.status == 500 && error.response.data.code == 500){
                        var error = error.response.data;
                        this.$common.showMessage(error);
                    }else if(error.response.status == 422){
                        this.errors = error.response.data.errors;
                    }
                });
                },

                passwordReset(form_id,reset){
                    this.formData = $('#'+form_id).serialize();
                    if(reset){
                        this.$common.loadingShow(0);
                        this.submitDisable = true;
                        this.formData += '&reset=reset';
                    }

                    axios.post(this.base_url+'password/reset',this.formData).then(response => {
                        this.$common.loadingHide(0);
                    this.errors = [];
                    this.submitDisable = false;
                    if(response.data){
                        this.$common.showMessage(response.data);
                        this.submitDisable = true;
                        setTimeout(function(){window.location.href = this.base_url+'reviews';},1000)
                    }
                }).catch(error => {
                        this.$common.loadingHide(0);
                    this.errors = [];
                    this.submitDisable = true;
                    if(error.response.status == 500 && error.response.data.code == 500){
                        var error = error.response.data;
                        this.$common.showMessage(error);
                    }else if(error.response.status == 422){
                        this.errors = error.response.data.errors;
                    }
                });
                }


            }

        });

    }

    if($('#signup').length > 0) {
        new Vue({
            el: '#signup',
            data: {
                checkCondition: false,
            },
        });
    }
});



// Regular expression from W3C HTML5.2 input specification:
// https://www.w3.org/TR/html/sec-forms.html#email-state-typeemail

var emailRegExp = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
if( document.getElementById("app") ) {
    new Vue({
        // root node
        el: "#app",
        // the instance state
        data: function () {
            return {
                url: "https://localhost/techpromux/wp-json/send-contact-form/v1/contact",

                form: {
                    username: '',
                    email: {
                        value: "jo@hnd.oe",
                        valid: true
                    },

                    message: {
                        text: '',
                        maxlength: 255
                    }
                }
                ,

                submitted: false,
                spinner: false,
                isDisable: false,
                errors: []

            }
        },

        methods: {

            // submit form handler
            submit: function () {

                if (this.form.username && this.form.message.text) {
                    this.spinner = true;
                    axios.post(this.url, this.form, {
                        headers: {

                            'Content-Type': 'application/json',
                            'Access-Control-Allow-Origin': '*',
                            'Accept': 'application/json, text/plain, */*',
                            'Access-Control-Allow-Methods': 'GET, PUT, POST, DELETE, OPTIONS',
                            'Access-Control-Allow-Credentials': true

                        }
                    })
                        .then(response => (
                            this.submitted = response.data))
                        .catch(function (error) {
                            console.log(error);
                        });
                }
                this.errors = [];

                if (!this.form.username) {
                    this.errors.push('tienes que poner username');
                }
                if (!this.form.message.text) {
                    this.errors.push('debes escribir algo');
                }


            },
            // validate by type and value
            validate: function (type, value) {
                if (type === "email") {
                    this.form.email.valid = this.isEmail(value) ? true : false;
                }
            },
            // check for valid email adress
            isEmail: function (value) {
                return emailRegExp.test(value);
            },
            // loadSpinner: function () {
            //     if( this.form.username && this.form.message.email) {
            //         this.spinner = true;
            //     }
            //
            //
            // }

            // check or uncheck all

        },

        watch: {
            // watching nested property
            "form.email.value": function (value) {
                this.validate("email", value);
            },
            "submitted": function () {
                this.spinner = false;
                this.form.username = '';
                this.form.email.value = 'tu-correo@example.com';
                this.form.message.text = '';
            },

        }
    });
}

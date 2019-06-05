<?php
/* Template Name: MyContactForm */

get_header();
get_template_part('template-parts/head');

 get_template_part('template-parts/nav','header');
?>
<!-- Contact -->

<section class="container">

    <!--Contact heading-->
    <h2 class="h1 m-0">Contactenos</h2>
    <!--Contact description-->
    <p class="pb-4">Dejenos saber sus inquietudes y le daremos atención personalizada, muchas gracias por estar en contacto</p>

    <div class="row">

        <!--Grid column-->
        <div class="col-lg-5 mb-4">

            <!--Form with header-->
            <div class="card border-primary rounded-0">

                <div class="card-header p-0">
                    <div class="bg-primary text-white text-center py-2">
                        <h3><i class="fa fa-envelope"></i>Escribenos</h3>
                        <p class="m-0">Siempre tendrás una buena respuesta</p>
                    </div>
                </div>
                <div class="card-body p-3">

                    <div id="app">

                    <form id="myContactForm" method="post"  @submit.prevent="submit">
                        <div class="alert alert-danger" v-if="errors.length">
                            <b>Please correct the following error(s):</b>
                        <ul >
                            <li v-for="error in errors">{{ error }}</li>
                        </ul>
                        </div>

<!--                        <div class="error-message">-->
<!--                            <p v-show="!email.valid">Oh, please enter a valid email address.</p>-->
<!--                        </div>-->
                        <div v-show="!form.email.valid" class="alert alert-danger" role="alert">
                            <strong >Oh ! Por favor entre una direccion de correo valida</strong>
                        </div>
                    <!--Body-->
                    <div class="form-group">
                        <label>Your name</label>
                        <div class="input-group">
                            <div class="input-group-addon bg-light"><i class="fa fa-user text-primary"></i></div>
                            <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Nombre"  v-model="form.username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Your email</label>
                        <div class="input-group mb-2 mb-sm-0">
                            <div class="input-group-addon bg-light"><i class="fa fa-envelope text-primary"></i></div>
                            <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Correo Electrónico"  v-model="form.email.value">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Message</label>
                        <div class="input-group mb-2 mb-sm-0">
                            <div class="input-group-addon bg-light"><i class="fa fa-pen text-primary"></i></div>
                            <textarea class="form-control" v-model="form.message.text" :maxlength="form.message.maxlength"></textarea>
                        </div>
                    </div>

                    <div v-show="!submitted" class="text-center">
                        <button v-show="!spinner"  type="submit" class="btn btn-primary btn-block rounded-0 py-2">Enviar</button>


                    </div>




                        <div v-show="spinner" class="lds-ellipsis aligncenter"><div></div><div></div><div></div><div></div></div>
                      </form>
                        <div v-show="submitted" class="alert alert-primary" role="alert">
                            <strong> su mensaje fue enviado</strong>
                        </div>
                    </div>


                </div>

            </div>
            <!--Form with header-->

        </div>

        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-7">

            <!--Google map-->
            <div class="mb-4">

            </div>

            <!--Buttons-->
            <div class="row text-center">
                <div class="col-md-4">
                    <a class="bg-primary px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-map-marker"></i></a>
                    <p>Tlaxcala, TX 90100,<br> Mexico</p>

                </div>

                <div class="col-md-4">
                    <a class="bg-primary px-3 py-2 rounded text-white mb-2 d-inline-block" href="https://wa.me/522462021020" target="_blank"><i class="fa fa-phone"></i></a>
                    <p>+ 52 246 202 1020 <br> <script>var today = new Date();
                            var dd = String(today.getDate()).padStart(2, '0');
                            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                            var yyyy = today.getFullYear();

                            today = mm + '/' + dd + '/' + yyyy;
                            document.write(today);</script></p>
                </div>

                <div class="col-md-4">
                    <a class="bg-primary px-3 py-2 rounded text-white mb-2 d-inline-block"href="mailto:frankfigao@gmail.com?Subject=Techpromux"><i class="fa fa-envelope"></i></a>
                    <p>frankfigao@gmail.com </p>
                </div>
            </div>

        </div>
        <style>
            /* Set the size of the div element that contains the map */
            #map {
                height: 400px;  /* The height is 400 pixels */
                width: 100%;  /* The width is the width of the web page */
            }
        </style>



</section>

<?php
get_footer();
?>

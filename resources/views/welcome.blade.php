<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://js.braintreegateway.com/web/dropin/1.33.2/js/dropin.js"></script>

        <!-- Styles -->
        <style>
            .button {
                cursor: pointer;
                font-weight: 500;
                left: 3px;
                line-height: inherit;
                position: relative;
                text-decoration: none;
                text-align: center;
                border-style: solid;
                border-width: 1px;
                border-radius: 3px;
                -webkit-appearance: none;
                -moz-appearance: none;
                display: inline-block;
            }

            .button--small {
                padding: 10px 20px;
                font-size: 0.875rem;
            }

            .button--green {
                outline: none;
                background-color: #64d18a;
                border-color: #64d18a;
                color: white;
                transition: all 200ms ease;
            }

            .button--green:hover {
                background-color: #8bdda8;
                color: white;
            }
        </style>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <x-navbar/>

            <div class="content">

                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div id="dropin-container"></div>
                            <button id="submit-button" class="button button--small button--green">Conferma</button>
                        </div>
                    </div>
                </div>

                <div id="app"></div>

                <x-login-form/>
                <x-register-form/>
            </div>
        </div>
                <script>
                    var button = document.querySelector('#submit-button');

                    braintree.dropin.create({
                        authorization: 'sandbox_gp967cyr_6gbmtt3qhmmnktb8',
                        selector: '#dropin-container'
                        }, function (err, instance) {
                        button.addEventListener('click', function () {
                            instance.requestPaymentMethod(function (err, payload) {
                                $.get('{{ route('payment.make') }}', {payload}, function (response) {
                                    if (response.success) {
                                        alert('Pagamento accettato!');
                                    } else {
                                        alert('Pagamento respinto');
                                    }
                                })
                            });
                        })
                    });
                </script>
    </body>
</html>


